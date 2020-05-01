<?php

namespace App\Http\Controllers\Admin\UserManagements;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesStoreRequest;
use App\Http\Requests\RolesUpdateRequest;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        abort_if(! Gate::allows('role_access'),403);

        if($request->ajax())
        {
            $data=Role::query();

            if (request('trash') == 1 && Gate::allows('role_delete')){
                $data=$data->onlyTrashed()->get();
            }

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button='';
                    if (Gate::allows('role_show')){
                        $button .='<a href="' . route('admin.user_managements.roles.show', $data->id) . '" class="btn btn-sm btn-info mr-1 mb-1" data-toggle="tooltip" title="Show data"><i class="fa fa-eye"></i></a>';
                    }
                    if (Gate::allows('role_update')){
                        $button .=' <a href="' . route('admin.user_managements.roles.edit', $data->id) . '" class="btn btn-sm btn-success mr-1 mb-1" data-toggle="tooltip" title="Edit data"><i class="fa fa-edit"></i></a>';
                    }
                    if (Gate::allows('role_delete')){
                        $button .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 mb-1 delete" data-toggle="tooltip" title="Delete data"><i class="fa fa-trash-alt"></i></button>';
                    }

                    $trash =' <button type="button" name="restore" id="'.$data->id.'" class="btn btn-sm btn-success mr-1 mb-1 restore" data-toggle="tooltip" title="Restore data"><i class="fa fa-backward"></i></button>';
                    $trash .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 mb-1 delete" data-toggle="tooltip" title="Destroy data"><i class="fa fa-trash-alt"></i></button>';

                    if (request('trash') == 1 && Gate::allows('role_delete')){
                        return $trash;
                    }else{
                        return $button;
                    }

                })
                ->addColumn('permissions_role', function ($data) {
                    $text='';
                    foreach ($data->permissions as $permission){
                        $text .= '<span class="badge badge-primary mr-1">'. $permission->name .'</span>';
                    }
                    return $text;
                })
                ->rawColumns(['action','permissions_role'])
                ->make(true);
        }

        return view('admin.user_managements.roles.index');
    }

    public function create()
    {
        abort_if(! Gate::allows('role_create'),403);

        $permissions = Permission::all()->sortBy('name')->pluck('name', 'id');

        return view('admin.user_managements.roles.create', compact('permissions'));
    }

    public function store(RolesStoreRequest $request)
    {
        abort_if(! Gate::allows('role_create'),403);
        $role = Role::create(['name'=> $request->name,'description'=> $request->description]);
        $role->givePermissionTo($request->input('permissions'));

        return redirect()->route('admin.user_managements.roles.index')->with('message_success',__('user.role_create_success'));
    }

    public function edit($id)
    {
        abort_if(! Gate::allows('role_update'),403);
        $permissions = Permission::all()->sortBy('name')->pluck('name', 'id');
        $role=Role::findOrFail($id);

        return view('admin.user_managements.roles.edit', compact('permissions', 'role'));
    }

    public function update(RolesUpdateRequest $request, $id)
    {
        abort_if(! Gate::allows('role_update'),403);
        $role=Role::findOrFail($id);
        $role->update(['name'=> $request->name,'description'=> $request->description]);
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('admin.user_managements.roles.index')->with('message_success',__('user.role_update_success'));

    }

    public function show($id)
    {
        abort_if(! Gate::allows('role_show'),403);

        $role=Role::findOrFail($id);
        return view('admin.user_managements.roles.show', compact('role'));
    }

    public function destroy($id)
    {
        abort_if(! Gate::allows('role_delete'),403);
        $role = Role::findOrFail($id);
        $role->delete();

        return response(__('role.delete_success'));
    }

    public function per_del($id)
    {
        abort_if(! Gate::allows('role_delete'),403);
        $role=Role::onlyTrashed()->findOrFail($id);
        $role->forceDelete();

        return response(__('user.role_delete_success'));
    }

    public function restore($id)
    {
        abort_if(! Gate::allows('role_delete'),403);
        $role=Role::onlyTrashed()->findOrFail($id);
        $role->restore();

        return response(__('user.role_restore_success'));
    }
}
