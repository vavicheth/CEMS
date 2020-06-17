<?php

namespace App\Http\Controllers\Admin\Pharmacy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pharmacy\PhDonorsStoreRequest;
use App\Http\Requests\Pharmacy\PhDonorsUpdateRequest;
use App\Model\Pharmacy\PhDonors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class PhDonorController extends Controller
{
    public function index(Request $request)
    {
        abort_if(! Gate::allows('ph_donor_access'),403);
        if($request->ajax())
        {
            $data=PhDonors::query()->orderBy('id','desc');

            if (request('trash') == 1 && Gate::allows('ph_donor_delete')){
                $data=$data->onlyTrashed()->get();
            }

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button='';
                    if (Gate::allows('ph_donor_show')){
                        $button .='<a href="' . route('admin.pharmacy.donors.show', $data->id) . '" class="btn btn-sm btn-info mr-1 mb-1" data-toggle="tooltip" title="Show data"><i class="fa fa-eye"></i></a>';
                    }
                    if (Gate::allows('ph_donor_update')){
                        $button .=' <a href="' . route('admin.pharmacy.donors.edit', $data->id) . '" class="btn btn-sm btn-success mr-1 mb-1" data-toggle="tooltip" title="Edit data"><i class="fa fa-edit"></i></a>';
                    }
                    if (Gate::allows('ph_donor_delete')){
                        $button .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 delete" data-toggle="tooltip" title="Delete data"><i class="fa fa-trash-alt"></i></button>';
                    }

                    $trash =' <button type="button" name="restore" id="'.$data->id.'" class="btn btn-sm btn-success mr-1 mb-1 restore" data-toggle="tooltip" title="Restore data"><i class="fa fa-backward"></i></button>';
                    $trash .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 mb-1 delete" data-toggle="tooltip" title="Destroy data"><i class="fa fa-trash-alt"></i></button>';

                    if (request('trash') == 1 && Gate::allows('ph_donor_delete')){
                        return $trash;
                    }else{
                        return $button;
                    }
                })
                ->editColumn('active', function ($data) {
                    return $data->active == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
                })
                ->rawColumns(['action','active'])
                ->make(true);
        }

        return view('admin.pharmacy.donors.index');
    }

    public function create()
    {
        abort_if(! Gate::allows('ph_donor_create'),403);

        return view('admin.pharmacy.donors.create');
    }

    public function store(PhDonorsStoreRequest $request)
    {
        $permission = PhDonors::create($request->all());

        return redirect()->route('admin.pharmacy.donors.index')->with('message_success',__('pharmacy.donor_create_success'));
    }

    public function show($id)
    {
        abort_if(! Gate::allows('ph_donor_show'),403);
        $phDonor=PhDonors::findOrFail($id);

        return view('admin.pharmacy.donors.show', compact('phDonor'));
    }

    public function edit($id)
    {
        abort_if(! Gate::allows('ph_donor_update'),403);
        $phDonor=PhDonors::findOrFail($id);

        return view('admin.pharmacy.donors.edit', compact('phDonor'));
    }

    public function update(PhDonorsUpdateRequest $request, $id)
    {
        abort_if(! Gate::allows('ph_donor_update'),403);
        $phDonors=PhDonors::findOrFail($id);
        $phDonors->update($request->all());

        return redirect()->route('admin.pharmacy.donors.index')->with('message_success',__('pharmacy.donor_update_success'));
    }

    public function destroy($id)
    {
        abort_if(! Gate::allows('ph_donor_delete'),403);
        $user=PhDonors::findOrFail($id);
        $user->delete();

        return response(__('pharmacy.donor_delete_success'));
    }

    public function per_del($id)
    {
        abort_if(! Gate::allows('ph_donor_delete'),403);
        $permission=PhDonors::onlyTrashed()->findOrFail($id);
        $permission->forceDelete();

        return response(__('pharmacy.donor_delete_success'));
    }

    public function restore($id)
    {
        abort_if(! Gate::allows('ph_donor_delete'),403);
        $permission=PhDonors::onlyTrashed()->findOrFail($id);
        $permission->restore();

        return response(__('pharmacy.donor_restore_success'));
    }
}
