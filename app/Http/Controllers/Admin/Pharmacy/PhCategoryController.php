<?php

namespace App\Http\Controllers\Admin\Pharmacy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pharmacy\PhCategoriesStoreRequest;
use App\Model\Pharmacy\PhCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class PhCategoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(! Gate::allows('ph_category_access'),403);
        if($request->ajax())
        {
            $data=PhCategories::query()->orderBy('id','desc');

            if (request('trash') == 1 && Gate::allows('ph_category_delete')){
                $data=$data->onlyTrashed()->get();
            }

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button='';
                    if (Gate::allows('ph_category_show')){
                        $button .='<a href="' . route('admin.pharmacy.categories.show', $data->id) . '" class="btn btn-sm btn-info mr-1 mb-1" data-toggle="tooltip" title="Show data"><i class="fa fa-eye"></i></a>';
                    }
                    if (Gate::allows('ph_category_update')){
                        $button .=' <a href="' . route('admin.pharmacy.categories.edit', $data->id) . '" class="btn btn-sm btn-success mr-1 mb-1" data-toggle="tooltip" title="Edit data"><i class="fa fa-edit"></i></a>';
                    }
                    if (Gate::allows('ph_category_delete')){
                        $button .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 delete" data-toggle="tooltip" title="Delete data"><i class="fa fa-trash-alt"></i></button>';
                    }

                    $trash =' <button type="button" name="restore" id="'.$data->id.'" class="btn btn-sm btn-success mr-1 mb-1 restore" data-toggle="tooltip" title="Restore data"><i class="fa fa-backward"></i></button>';
                    $trash .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 mb-1 delete" data-toggle="tooltip" title="Destroy data"><i class="fa fa-trash-alt"></i></button>';

                    if (request('trash') == 1 && Gate::allows('ph_category_delete')){
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

        return view('admin.pharmacy.categories.index');
    }

    public function create()
    {
        abort_if(! Gate::allows('ph_category_create'),403);

        return view('admin.pharmacy.categories.create');
    }

    public function store(PhCategoriesStoreRequest $request)
    {
        $phCategory = PhCategories::create($request->all());

        return redirect()->route('admin.pharmacy.categories.index')->with('message_success',__('pharmacy.category_create_success'));
    }

    public function show($id)
    {
        abort_if(! Gate::allows('ph_category_show'),403);
        $phCategory=PhCategories::findOrFail($id);

        return view('admin.pharmacy.categories.show', compact('phCategory'));
    }

    public function edit($id)
    {
        abort_if(! Gate::allows('ph_category_update'),403);
        $phCategory=PhCategories::findOrFail($id);

        return view('admin.pharmacy.categories.edit', compact('phCategory'));
    }

    public function update(PhCategoriesStoreRequest $request, $id)
    {
        abort_if(! Gate::allows('ph_category_update'),403);
        $phCategory=PhCategories::findOrFail($id);
        $phCategory->update($request->all());

        return redirect()->route('admin.pharmacy.categories.index')->with('message_success',__('pharmacy.category_update_success'));
    }

    public function destroy($id)
    {
        abort_if(! Gate::allows('ph_category_delete'),403);
        $phCategory=PhCategories::findOrFail($id);
        $phCategory->delete();

        return response(__('pharmacy.category_delete_success'));
    }

    public function per_del($id)
    {
        abort_if(! Gate::allows('ph_category_delete'),403);
        $phCategory=PhCategories::onlyTrashed()->findOrFail($id);
        $phCategory->forceDelete();

        return response(__('pharmacy.category_delete_success'));
    }

    public function restore($id)
    {
        abort_if(! Gate::allows('ph_category_delete'),403);
        $phCategory=PhCategories::onlyTrashed()->findOrFail($id);
        $phCategory->restore();

        return response(__('pharmacy.category_restore_success'));
    }
}
