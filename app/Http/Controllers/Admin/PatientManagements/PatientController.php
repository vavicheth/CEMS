<?php

namespace App\Http\Controllers\Admin\PatientManagements;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientsStoreRequest;
use App\Patient;
use App\PatientAccompany;
use App\Traits\Slim;
use App\Traits\UploadBySlim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        abort_if(!Gate::allows('patient_access'), 403);
        if ($request->ajax()) {
            $data = Patient::query()->orderBy('name', 'asc');

            if (request('trash') == 1 && Gate::allows('patient_delete')) {
                $data = $data->onlyTrashed()->get();
            }

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '';
                    if (Gate::allows('patient_show')) {
                        $button .= '<a href="' . route('admin.patient_managements.patients.show', $data->id) . '" class="btn btn-sm btn-info mr-1" data-toggle="tooltip" title="Show data"><i class="fa fa-eye"></i></a>';
                    }
                    if (Gate::allows('patient_update')) {
                        $button .= ' <a href="' . route('admin.patient_managements.patients.edit', $data->id) . '" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" title="Edit data"><i class="fa fa-edit"></i></a>';
                    }
                    if (Gate::allows('patient_delete')) {
                        $button .= ' <button type="button" name="delete" id="' . $data->id . '" class="btn btn-sm btn-danger mr-1 delete" data-toggle="tooltip" title="Delete data"><i class="fa fa-trash-alt"></i></button>';
                    }

                    $trash = ' <button type="button" name="restore" id="' . $data->id . '" class="btn btn-sm btn-success mr-1 mb-1 restore" data-toggle="tooltip" title="Restore data"><i class="fa fa-backward"></i></button>';
                    $trash .= ' <button type="button" name="delete" id="' . $data->id . '" class="btn btn-sm btn-danger mr-1 mb-1 delete" data-toggle="tooltip" title="Destroy data"><i class="fa fa-trash-alt"></i></button>';

                    if (request('trash') == 1 && Gate::allows('patient_delete')) {
                        return $trash;
                    } else {
                        return $button;
                    }
                })
//                ->editColumn('gender', function ($data) {
//                    return trans_choice('patient.gender',$data);
//                })
                ->editColumn('active', function ($data) {
                    return $data->active == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
                })
                ->rawColumns(['action', 'active'])
                ->make(true);
        }

        return view('admin.patient_managements.patients.index');
    }

    public function create()
    {
        abort_if(!Gate::allows('department_create'), 403);

        return view('admin.patient_managements.patients.create');
    }

    public function store(PatientsStoreRequest $request)
    {
        abort_if(!Gate::allows('patient_create'), 403);

        $patient = Patient::create($request->all());
        if ($request->photo) {
            $image = UploadBySlim::uploadSlimTo64($request->photo);
            $patient->addMediaFromBase64($image['image'])
                ->usingFileName(str_random(3) . '_' . $patient->id . '_' . $image['name'])
                ->toMediaCollection('patient_photo');
        }
        if ($request->patient_idcard) {
            $image = UploadBySlim::uploadSlimTo64($request->patient_idcard);
            $patient->addMediaFromBase64($image['image'])
                ->usingFileName('idcard_' . $patient->id . '_' . $image['name'])
                ->toMediaCollection('patient_id_card');
        }

//        if ($request->patient_idcard){
//            $filename = $request->file('patient_idcard')->getClientOriginalName();
//            $patient->addMedia($request->patient_idcard)
//                ->usingFileName('idcard_' . $patient->id.'_'.$filename)
//                ->toMediaCollection('patient_id_card');
//        }

        return redirect()->route('admin.patient_managements.patients.index')->with('message_success', __('patient.patient_create_success'));
    }

    public function show(Patient $patient, Request $request)
    {
        abort_if(!Gate::allows('patient_show'), 403);

        if ($request->ajax()) {
            abort_if(!Gate::allows('patient_accompany_access'), 403);
            $data = $patient->patient_accompanies();
            if (request('trash') == 1 && Gate::allows('patient_accompany_delete')) {
                $data = $data->onlyTrashed()->get();
            }
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '';
                    if (Gate::allows('patient_accompany_update')) {
                        $button .= ' <button type="button" name="update" id="' . $data->id . '" class="btn btn-sm btn-success mr-1 update" data-toggle="tooltip" title="Edit data"><i class="fa fa-edit"></i></button>';
                    }
                    if (Gate::allows('patient_accompany_delete')) {
                        $button .= ' <button type="button" name="delete" id="' . $data->id . '" class="btn btn-sm btn-danger mr-1 delete" data-toggle="tooltip" title="Delete data"><i class="fa fa-trash-alt"></i></button>';
                    }
                    if (Gate::allows('patient_accompany_show')){
                        $button .='<a href="' . route('admin.patient_managements.patient_accompanies.print_qr', $data->id) . '" target="_blank" class="btn btn-sm btn-info m-1" data-toggle="tooltip" title="Show data"><i class="fa fa-print"></i> QR</a>';
                    }

                    $trash = ' <button type="button" name="restore" id="' . $data->id . '" class="btn btn-sm btn-success mr-1 mb-1 restore" data-toggle="tooltip" title="Restore data"><i class="fa fa-backward"></i></button>';
                    $trash .= ' <button type="button" name="delete" id="' . $data->id . '" class="btn btn-sm btn-danger mr-1 mb-1 delete" data-toggle="tooltip" title="Destroy data"><i class="fa fa-trash-alt"></i></button>';

                    if (request('trash') == 1 && Gate::allows('patient_accompany_delete')) {
                        return $trash;
                    } else {
                        return $button;
                    }
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == 1){
                        $status='<span class="badge badge-warning">In Hospital</span>';
                    }elseif ($data->status == 2){
                        $status='<span class="badge badge-danger">In Room</span>';
                    }else{
                        $status='<span class="badge badge-info">Outside</span>';
                    }
                    return $status;
                })
                ->setRowClass(function ($data) {
                    $row_class='';
                    if ($data->status == 1){
                        $row_class='bg-warning-light';
                    }elseif ($data->status == 2){
                        $row_class='bg-danger-light';
                    }else{
                        $row_class='bg-info-light';
                    }
                    return $row_class;
                })
                ->addColumn('photo', function ($data) {
//                    $text='<div class="row items-push js-gallery img-fluid-100 "><a style="width: 150px" class="img-link img-link-simple img-link-zoom-in img-lightbox" href="' . asset($data->getFirstMediaUrl('patient_accompany')) . '"><img href="" class="img-fluid" src="' . asset($data->getFirstMediaUrl('patient_accompany')) . '" alt=""></a></div>';
                    $text = '<div class="row items-push js-gallery img-fluid-100"><a class="img-link img-link-simple img-link-zoom-in img-lightbox" href="' . asset($data->getFirstMediaUrl('patient_accompany')) . '"><img width="130" src="' . asset($data->getFirstMediaUrl('patient_accompany')) . '"/></a></div>';
                    return $text;
                })
                ->editColumn('id_card', function ($data) {
                    $text='';

                    if ($data->id_card){
                        $text= '<a class="img-link img-link-simple" href="'. $data->getMedia('avatar')->count() > 0 ? asset($data->getFirstMediaUrl('patient_accompany_idcard')) : ""  .'">'. $data->id_card.'<i class="fa fa-image"></i></a></div>';
                    }
                    return $text;
                })
                ->rawColumns(['action', 'status','photo','id_card'])
                ->make(true);
        }

        return view('admin.patient_managements.patients.show', compact('patient'));
    }

    public function edit($id)
    {
        abort_if(!Gate::allows('patient_update'), 403);

        $patient = Patient::findOrFail($id);
        return view('admin.patient_managements.patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        abort_if(!Gate::allows('patient_update'), 403);
        $patient->update($request->all());
        if ($request->photo) {
            $image = UploadBySlim::uploadSlimTo64($request->photo);
            $patient->addMediaFromBase64($image['image'])
                ->usingFileName(str_random(3) . '_' . $patient->id . '_' . $image['name'])
                ->toMediaCollection('patient_photo');
        }
        if ($request->patient_idcard) {
            $image = UploadBySlim::uploadSlimTo64($request->patient_idcard);
            $patient->addMediaFromBase64($image['image'])
                ->usingFileName('idcard_' . $patient->id . '_' . $image['name'])
                ->toMediaCollection('patient_id_card');
        }else{$patient->clearMediaCollection('patient_id_card');}

        return redirect()->route('admin.patient_managements.patients.index')->with('message_success', __('patient.patient_update_success'));
    }

    public function destroy($id)
    {
        abort_if(!Gate::allows('patient_delete'), 403);
        $user = Patient::findOrFail($id);
        $user->delete();

        return response(__('patient.patient_delete_success'));
    }

    public function per_del($id)
    {
        abort_if(!Gate::allows('patient_delete'), 403);
        $permission = Patient::onlyTrashed()->findOrFail($id);
        $permission->forceDelete();

        return response(__('patient.patient_delete_success'));
    }

    public function restore($id)
    {
        abort_if(!Gate::allows('patient_delete'), 403);
        $permission = Patient::onlyTrashed()->findOrFail($id);
        $permission->restore();

        return response(__('patient.patient_restore_success'));
    }


}
