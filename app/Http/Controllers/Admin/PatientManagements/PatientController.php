<?php

namespace App\Http\Controllers\Admin\PatientManagements;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientsStoreRequest;
use App\Patient;
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
        abort_if(! Gate::allows('patient_access'),403);
        if($request->ajax())
        {
            $data=Patient::query()->orderBy('name','asc');

            if (request('trash') == 1 && Gate::allows('patient_delete')){
                $data=$data->onlyTrashed()->get();
            }

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button='';
                    if (Gate::allows('patient_show')){
                        $button .='<a href="' . route('admin.patient_managements.patients.show', $data->id) . '" class="btn btn-sm btn-info mr-1 mb-1" data-toggle="tooltip" title="Show data"><i class="fa fa-eye"></i></a>';
                    }
                    if (Gate::allows('patient_update')){
                        $button .=' <a href="' . route('admin.patient_managements.patients.edit', $data->id) . '" class="btn btn-sm btn-success mr-1 mb-1" data-toggle="tooltip" title="Edit data"><i class="fa fa-edit"></i></a>';
                    }
                    if (Gate::allows('patient_delete')){
                        $button .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 delete" data-toggle="tooltip" title="Delete data"><i class="fa fa-trash-alt"></i></button>';
                    }

                    $trash =' <button type="button" name="restore" id="'.$data->id.'" class="btn btn-sm btn-success mr-1 mb-1 restore" data-toggle="tooltip" title="Restore data"><i class="fa fa-backward"></i></button>';
                    $trash .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 mb-1 delete" data-toggle="tooltip" title="Destroy data"><i class="fa fa-trash-alt"></i></button>';

                    if (request('trash') == 1 && Gate::allows('patient_delete')){
                        return $trash;
                    }else{
                        return $button;
                    }
                })
//                ->editColumn('gender', function ($data) {
//                    return trans_choice('patient.gender',$data);
//                })
                ->editColumn('active', function ($data) {
                    return $data->active == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
                })
                ->rawColumns(['action','active'])
                ->make(true);
        }

        return view('admin.patient_managements.patients.index');
    }

    public function create()
    {
        abort_if(! Gate::allows('department_create'),403);

        return view('admin.patient_managements.patients.create');
    }

    public function store(PatientsStoreRequest $request)
    {
        abort_if(! Gate::allows('patient_create'),403);

        $patient=Patient::create($request->all());
        if ( $request->photo )
        {
            $photo= UploadBySlim::uploadPhoto('photo','media/avatars');
            $patient->addMedia(public_path('media/avatars/'.$photo['name']))->toMediaCollection('patient_photo');
        }

        return redirect()->route('admin.patient_managements.patients.index')->with('message_success',__('patient.patient_create_success'));
    }

    public function show(Patient $patient)
    {
        abort_if(! Gate::allows('patient_show'),403);
        return view('admin.patient_managements.patients.show', compact('patient'));
    }

    public function edit($id)
    {
        abort_if(! Gate::allows('patient_update'),403);

        $patient = Patient::findOrFail($id);
        return view('admin.patient_managements.patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        abort_if(! Gate::allows('patient_update'),403);
        $patient->update($request->all());
        if ( $request->photo )
        {
            $photo= UploadBySlim::uploadPhoto('photo','media/avatars');
            $patient->addMedia(public_path('media/avatars/'.$photo['name']))->toMediaCollection('patient_photo');
        }

        return redirect()->route('admin.patient_managements.patients.index')->with('message_success',__('patient.patient_update_success'));
    }

    public function destroy($id)
    {
        abort_if(! Gate::allows('patient_delete'),403);
        $user=Patient::findOrFail($id);
        $user->delete();

        return response(__('patient.patient_delete_success'));
    }

    public function per_del($id)
    {
        abort_if(! Gate::allows('patient_delete'),403);
        $permission=Patient::onlyTrashed()->findOrFail($id);
        $permission->forceDelete();

        return response(__('patient.patient_delete_success'));
    }

    public function restore($id)
    {
        abort_if(! Gate::allows('patient_delete'),403);
        $permission=Patient::onlyTrashed()->findOrFail($id);
        $permission->restore();

        return response(__('patient.patient_restore_success'));
    }
}