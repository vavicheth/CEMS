<?php

namespace App\Http\Controllers\Admin\PatientManagements;

use App\Http\Controllers\Controller;
use App\Patient;
use App\PatientAccompany;
use App\Traits\UploadBySlim;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use phpDocumentor\Reflection\Types\Compound;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\Facades\DataTables;

class PatientAccompanyController extends Controller
{

    public function index(Request $request)
    {

//        return route('admin.patient_managements.patients.show', $data->id);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        abort_if(!Gate::allows('patient_accompany_create'), 403);
        $patient = Patient::findOrFail($request->patient_id);

        if($patient->patient_accompanies()->count() >= config('panel.total_patient_accompany')){
          return  response(__('patient.patient_accompany_create_error_over'));
        }

        $pa=$patient->patient_accompanies()->create($request->all());
        if ( $request->photo ){
            $image=UploadBySlim::uploadSlimTo64($request->photo);
            $pa->addMediaFromBase64($image['image'])
                ->usingFileName(str_random(3).'_'.$pa->id.'_'.$image['name'])
                ->toMediaCollection('patient_accompany');
        }
        if ($request->patient_accompany_idcard){
            $image=UploadBySlim::uploadSlimTo64($request->photo);
            $pa->addMediaFromBase64($image['image'])
                ->usingFileName(str_random(3).'_'.$pa->id.'_'.$image['name'])
                ->toMediaCollection('patient_accompany_idcard');
        }

        return response(__('patient.patient_accompany_create_success'));
    }

    public function show($id)
    {
//        abort_if(!Gate::allows('patient_accompany_show'), 403);
        $patient_accompany=PatientAccompany::findOrFail($id);
//        $patient=$patient_accompany->patient;

        return response($patient_accompany->id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        abort_if(!Gate::allows('patient_accompany_update'), 403);
        $pa=PatientAccompany::findOrFail($id);
        $pa->update($request->all());
        if ( $request->photo ){
            $image=UploadBySlim::uploadSlimTo64($request->photo);
            $pa->addMediaFromBase64($image['image'])
                ->usingFileName(str_random(3).'_'.$id.'_'.$image['name'])
                ->toMediaCollection('patient_accompany');
        }
        if ($request->patient_accompany_idcard){
            $image=UploadBySlim::uploadSlimTo64($request->patient_accompany_idcard);
            $pa->addMediaFromBase64($image['image'])
                ->usingFileName('idcard'.'_'.$pa->id.'_'.$image['name'])
                ->toMediaCollection('patient_accompany_idcard');
        }
        return response(__('patient.patient_accompany_update_success'));
    }

    public function destroy($id)
    {
        abort_if(! Gate::allows('patient_accompany_delete'),403);
        $user=PatientAccompany::findOrFail($id);
        $user->delete();

        return response(__('patient.patient_accompany_delete_success'));
    }

    public function per_del($id)
    {
        abort_if(! Gate::allows('patient_accompany_delete'),403);
        $permission=PatientAccompany::onlyTrashed()->findOrFail($id);
        $permission->forceDelete();

        return response(__('patient.patient_accompany_delete_success'));
    }

    public function restore($id)
    {
        abort_if(! Gate::allows('patient_accompany_delete'),403);
        $permission=PatientAccompany::onlyTrashed()->findOrFail($id);
        $permission->restore();

        return response(__('patient.patient_accompany_restore_success'));
    }

    public function get_record($id)
    {
//        return response($id);
        $pa=PatientAccompany::findOrFail($id);
        $pa->image= asset($pa->getFirstMediaUrl('patient_accompany'));
        $pa->pic_idcard= asset($pa->getFirstMediaUrl('patient_accompany_idcard'));
//        dd($pa);
//        $pa->only('name');
        return response($pa);
    }

    public function pre_scan()
    {
        return view('admin.patient_managements.patient_accompanies.pre_scan');
    }

    public function scan_qr()
    {
        return view('admin.patient_managements.patient_accompanies.scan_qr');
    }

    public function show_data(Request $request,$id)
    {
        $patient_accompany=PatientAccompany::findOrFail($id);
        $patient=$patient_accompany->patient;
        if ($patient['active'] != '1'){
         return redirect()->route('admin.patient_managements.patient_accompanies.scan_qr')->with('message_error',__('អ្នកជំងឺ មិននៅក្នុងមន្ទីររេទ្យទេ!'));
        }

        if ($request->ajax()) {
//            abort_if(!Gate::allows('patient_accompany_access'), 403);
            $data = PatientAccompany::whereId($id);

            if (Gate::allows('patient_access')) {
                $data = $patient->patient_accompanies;
            }

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '';
                    if (Gate::allows('qr_checkin_hospital')) {
                        $button .= '<button class="btn btn-sm btn-square btn-warning m-1" onclick="saveData('. $data->id .',\'1\')"><i class="fa fa-file-import"></i> ចូលបរិវេណ </button><br>';
                        $button .= '<button class="btn btn-sm btn-square btn-info m-1" onclick="saveData('. $data->id .',\'0\')"><i class="fa fa-file-export"></i>​ចេញបរិវេណ</button><br>';
                    }
                    if (Gate::allows('qr_checkin_room')) {
                        $button .= '<button class="btn btn-sm btn-square btn-danger m-1" onclick="saveData('. $data->id .',\'2\')"><i class="fa fa-file-import"></i> ចូលបន្ទប់ជំងឺ</button><br>';
                        $button .= '<button class="btn btn-sm btn-square btn-warning m-1" onclick="saveData('. $data->id .',\'1\')"><i class="fa fa-file-export"></i>​ចេញបន្ទប់ជំងឺ</button>';
                    }
                    return $button;
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
                    $text = '<div class="row items-push js-gallery img-fluid-100"><a class="img-link img-link-simple img-link-zoom-in img-lightbox" href="' . asset($data->getFirstMediaUrl('patient_accompany')) . '"><img width="130" src="' . asset($data->getFirstMediaUrl('patient_accompany')) . '"/></a></div><div class="mt-1"><h5>'.$data->name .'</h5></div>';
                    return $text;
                })
                ->rawColumns(['action', 'photo'])
                ->make(true);
        }

        return view('admin.patient_managements.patient_accompanies.after_scan',compact('patient','patient_accompany'));
    }

    public function print_qr($id)
    {
        $patient_accompany=PatientAccompany::findOrFail($id);
        return view('admin.patient_managements.patient_accompanies.print_qr',compact('patient_accompany'));
    }

    public function change_status(Request $request,$id)
    {
        $patient_accompany=PatientAccompany::findOrFail($id);
        $patient_accompany->update(['status'=>$request->status]);
        $text='';
        if ($request->status == 1){
            $text='(ក្នុងបរិវេណ)';
        }elseif ($request->status == 2){
            $text='(ក្នុងបន្ទប់)';
        }else{
            $text='(ក្រៅបរិវេណ)';
        }

        return response($text);
    }
}
