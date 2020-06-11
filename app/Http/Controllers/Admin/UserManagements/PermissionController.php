<?php

namespace App\Http\Controllers\Admin\UserManagements;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionsStoreRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
//        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        abort_if(! Gate::allows('permission_access'),403);

        if($request->ajax())
        {
            $data=Permission::query();

            if (request('trash') == 1 && Gate::allows('permission_delete')){
                $data=$data->onlyTrashed()->get();
            }

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button='';
                    if (Gate::allows('permission_show')){
                        $button .='<a href="' . route('admin.user_managements.permissions.show', $data->id) . '" class="btn btn-sm btn-info mr-1 mb-1" data-toggle="tooltip" title="Show data"><i class="fa fa-eye"></i></a>';
                    }
                    if (Gate::allows('permission_update')){
                        $button .=' <a href="' . route('admin.user_managements.permissions.edit', $data->id) . '" class="btn btn-sm btn-success mr-1 mb-1" data-toggle="tooltip" title="Edit data"><i class="fa fa-edit"></i></a>';
                    }
                    if (Gate::allows('permission_delete')){
                        $button .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 mb-1 delete" data-toggle="tooltip" title="Delete data"><i class="fa fa-trash-alt"></i></button>';
                    }

                    $trash =' <button type="button" name="restore" id="'.$data->id.'" class="btn btn-sm btn-success mr-1 mb-1 restore" data-toggle="tooltip" title="Restore data"><i class="fa fa-backward"></i></button>';
                    $trash .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 mb-1 delete" data-toggle="tooltip" title="Destroy data"><i class="fa fa-trash-alt"></i></button>';

                    if (request('trash') == 1 && Gate::allows('permission_delete')){
                        return $trash;
                    }else{
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.user_managements.permissions.index');
    }

    public function create()
    {
        abort_if(! Gate::allows('permission_create'),403);

        return view('admin.user_managements.permissions.create');
    }

    public function store(PermissionsStoreRequest $request)
    {
        abort_if(! Gate::allows('permission_create'),403);
        $permission = Permission::create(['name'=>$request->name,'description'=>$request->description]);
        return redirect()->route('admin.user_managements.permissions.index')->with('message_success',__('user.permission_create_success'));
    }

    public function edit($id)
    {
        abort_if(! Gate::allows('permission_update'),403);
        $permission=Permission::findOrFail($id);
        return view('admin.user_managements.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        abort_if(! Gate::allows('permission_update'),403);
        $permission->update($request->all());

        return redirect()->route('admin.user_managements.permissions.index')->with('message_success',__('user.permission_update_success'));
    }

    public function show($id)
    {
        abort_if(! Gate::allows('permission_show'),403);
        $permission=Permission::findOrFail($id);

        return view('admin.user_managements.permissions.show', compact('permission'));
    }

    public function destroy($id)
    {
        abort_if(! Gate::allows('permission_delete'),403);
        $permission=Permission::findOrFail($id);
        $permission->delete();

        return response(__('user.permission_delete_success'));
    }

    public function per_del($id)
    {
        abort_if(! Gate::allows('permission_delete'),403);
        $permission=Permission::onlyTrashed()->findOrFail($id);
        $permission->forceDelete();

        return response(__('user.permission_delete_success'));
    }

    public function restore($id)
    {
        abort_if(! Gate::allows('permission_delete'),403);
        $permission=Permission::onlyTrashed()->findOrFail($id);
        $permission->restore();

        return response(__('user.permission_restore_success'));
    }
}
