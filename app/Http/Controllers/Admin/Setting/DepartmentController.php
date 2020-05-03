<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentsStoreRequest;
use App\Http\Requests\DepartmentsUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
{

    public function index(Request $request)
    {
        abort_if(! Gate::allows('department_access'),403);
        if($request->ajax())
        {
            $data=Department::query()->orderBy('name','asc');

            if (request('trash') == 1 && Gate::allows('department_delete')){
                $data=$data->onlyTrashed()->get();
            }

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button='';
                    if (Gate::allows('department_show')){
                        $button .='<a href="' . route('admin.setting.departments.show', $data->id) . '" class="btn btn-sm btn-info mr-1 mb-1" data-toggle="tooltip" title="Show data"><i class="fa fa-eye"></i></a>';
                    }
                    if (Gate::allows('department_update')){
                        $button .=' <a href="' . route('admin.setting.departments.edit', $data->id) . '" class="btn btn-sm btn-success mr-1 mb-1" data-toggle="tooltip" title="Edit data"><i class="fa fa-edit"></i></a>';
                    }
                    if (Gate::allows('department_delete')){
                        $button .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 delete" data-toggle="tooltip" title="Delete data"><i class="fa fa-trash-alt"></i></button>';
                    }

                    $trash =' <button type="button" name="restore" id="'.$data->id.'" class="btn btn-sm btn-success mr-1 mb-1 restore" data-toggle="tooltip" title="Restore data"><i class="fa fa-backward"></i></button>';
                    $trash .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 mb-1 delete" data-toggle="tooltip" title="Destroy data"><i class="fa fa-trash-alt"></i></button>';

                    if (request('trash') == 1 && Gate::allows('department_delete')){
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

        return view('admin.setting.departments.index');
    }

    public function create()
    {
        abort_if(! Gate::allows('department_create'),403);

        return view('admin.setting.departments.create');
    }

    public function store(DepartmentsStoreRequest $request)
    {
        $permission = Department::create($request->all());
        return redirect()->route('admin.setting.departments.index')->with('message_success',__('setting.department_create_success'));
    }

    public function show($id)
    {
        abort_if(! Gate::allows('department_show'),401);

        $department = Department::findOrFail($id);
        return view('admin.setting.departments.show', compact('department'));
    }

    public function edit($id)
    {
        abort_if(! Gate::allows('department_update'),401);

        $department = Department::findOrFail($id);
        return view('admin.setting.departments.edit', compact('department'));
    }

    public function update(DepartmentsUpdateRequest $request, Department $department)
    {
        abort_if(! Gate::allows('permission_update'),403);
        $department->update($request->all());

        return redirect()->route('admin.setting.departments.index');
    }

    public function destroy($id)
    {
        abort_if(! Gate::allows('department_delete'),403);
        $user=Department::findOrFail($id);
        $user->delete();

        return response(__('setting.department_delete_success'));
    }

    public function per_del($id)
    {
        abort_if(! Gate::allows('department_delete'),403);
        $permission=Department::onlyTrashed()->findOrFail($id);
        $permission->forceDelete();

        return response(__('setting.department_delete_success'));
    }

    public function restore($id)
    {
        abort_if(! Gate::allows('department_delete'),403);
        $permission=Department::onlyTrashed()->findOrFail($id);
        $permission->restore();

        return response(__('setting.department_restore_success'));
    }
}
