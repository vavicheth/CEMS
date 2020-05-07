<?php

namespace App\Http\Controllers\Admin\PatientManagements;

use App\Http\Controllers\Controller;
use App\Patient;
use App\PatientAccompany;
use App\Traits\UploadBySlim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
        if ( $request->photo )
        {
            $image=UploadBySlim::uploadSlimTo64($request->photo);
            $pa->addMediaFromBase64($image['image'])
                ->usingFileName(str_random(3).'_'.$pa->id.'_'.$image['name'])
                ->toMediaCollection('patient_accompany');
        }
        return response(__('patient.patient_accompany_create_success'));
    }

    public function show($id)
    {
        //
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
}
