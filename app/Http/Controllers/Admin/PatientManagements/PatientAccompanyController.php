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
        if ( $request->photo )
        {
            $image=UploadBySlim::uploadSlimTo64($request->photo);
            $pa->addMediaFromBase64($image['image'])
                ->usingFileName(str_random(3).'_'.$id.'_'.$image['name'])
                ->toMediaCollection('patient_accompany');
        }
        return response(__('patient_accompany_update_success'));
    }

    public function destroy($id)
    {
        abort_if(! Gate::allows('patient_accompany_delete'),403);
        $user=PatientAccompany::findOrFail($id);
        $user->delete();

        return response(__('patient_accompany_delete_success'));
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

    public function show_data($id)
    {
        $patient_accompany=PatientAccompany::findOrFail($id);
        $patient=$patient_accompany->patient;

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
        return response(__('patient.patient_accompany_update_success'));
    }
}
