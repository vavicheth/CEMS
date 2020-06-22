<?php

namespace App\Http\Controllers\Admin\Pharmacy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pharmacy\PhSuppliersStoreRequest;
use App\Model\Pharmacy\PhDonors;
use App\Model\Pharmacy\PhSuppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use PragmaRX\Countries\Package\Countries;
use Yajra\DataTables\Facades\DataTables;

class PhSupplierController extends Controller
{
    public function index(Request $request)
    {
        abort_if(! Gate::allows('ph_supplier_access'),403);
        if($request->ajax())
        {
            $data=PhSuppliers::query()->orderBy('id','desc');

            if (request('trash') == 1 && Gate::allows('ph_supplier_delete')){
                $data=$data->onlyTrashed()->get();
            }

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button='';
                    if (Gate::allows('ph_supplier_show')){
                        $button .='<a href="' . route('admin.pharmacy.suppliers.show', $data->id) . '" class="btn btn-sm btn-info mr-1 mb-1" data-toggle="tooltip" title="Show data"><i class="fa fa-eye"></i></a>';
                    }
                    if (Gate::allows('ph_supplier_update')){
                        $button .=' <a href="' . route('admin.pharmacy.suppliers.edit', $data->id) . '" class="btn btn-sm btn-success mr-1 mb-1" data-toggle="tooltip" title="Edit data"><i class="fa fa-edit"></i></a>';
                    }
                    if (Gate::allows('ph_supplier_delete')){
                        $button .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 delete" data-toggle="tooltip" title="Delete data"><i class="fa fa-trash-alt"></i></button>';
                    }

                    $trash =' <button type="button" name="restore" id="'.$data->id.'" class="btn btn-sm btn-success mr-1 mb-1 restore" data-toggle="tooltip" title="Restore data"><i class="fa fa-backward"></i></button>';
                    $trash .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 mb-1 delete" data-toggle="tooltip" title="Destroy data"><i class="fa fa-trash-alt"></i></button>';

                    if (request('trash') == 1 && Gate::allows('ph_supplier_delete')){
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

        return view('admin.pharmacy.suppliers.index');
    }

    public function create()
    {
        abort_if(! Gate::allows('ph_supplier_create'),403);
        $phDonors = PhDonors::get()->pluck('name', 'id')->prepend(__('general.please_select'), '');

        $all=new Countries();
        $countries=$all->all();

        return view('admin.pharmacy.suppliers.create',compact('phDonors','countries'));
    }

    public function store(PhSuppliersStoreRequest $request)
    {
        dd($request->all());
        $phSupplier = PhSuppliers::create($request->all());

        return redirect()->route('admin.pharmacy.suppliers.index')->with('message_success',__('pharmacy.supplier_create_success'));
    }

    public function show($id)
    {
        abort_if(! Gate::allows('ph_supplier_show'),403);
        $phSupplier=PhSuppliers::findOrFail($id);

        return view('admin.pharmacy.suppliers.show', compact('phSupplier'));
    }

    public function edit($id)
    {
        abort_if(! Gate::allows('ph_supplier_update'),403);
        $phDonors = PhDonors::get()->pluck('name', 'id')->prepend('Select donor', '');
        $phSupplier=PhSuppliers::findOrFail($id);

        return view('admin.pharmacy.suppliers.edit', compact('phSupplier','phDonors'));
    }

    public function update(PhSuppliers $request, $id)
    {
        abort_if(! Gate::allows('ph_supplier_update'),403);
        $phSupplier=PhSuppliers::findOrFail($id);
        $phSupplier->update($request->all());

        return redirect()->route('admin.pharmacy.suppliers.index')->with('message_success',__('pharmacy.supplier_update_success'));
    }

    public function destroy($id)
    {
        abort_if(! Gate::allows('ph_supplier_delete'),403);
        $phSupplier=PhSuppliers::findOrFail($id);
        $phSupplier->delete();

        return response(__('pharmacy.supplier_delete_success'));
    }

    public function per_del($id)
    {
        abort_if(! Gate::allows('ph_supplier_delete'),403);
        $phSupplier=PhSuppliers::onlyTrashed()->findOrFail($id);
        $phSupplier->forceDelete();

        return response(__('pharmacy.supplier_delete_success'));
    }

    public function restore($id)
    {
        abort_if(! Gate::allows('ph_supplier_delete'),403);
        $phSupplier=PhSuppliers::onlyTrashed()->findOrFail($id);
        $phSupplier->restore();

        return response(__('pharmacy.supplier_restore_success'));
    }
}
