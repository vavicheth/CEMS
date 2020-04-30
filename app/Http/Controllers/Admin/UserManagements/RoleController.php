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
//        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($request->ajax())
        {
            $data=Role::query();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button='<a href="' . route('admin.user_managements.roles.show', $data->id) . '" class="btn btn-sm btn-info mr-1 mb-1" data-toggle="tooltip" title="Show data"><i class="fa fa-eye"></i></a>';
                    $button .=' <a href="' . route('admin.user_managements.roles.edit', $data->id) . '" class="btn btn-sm btn-success mr-1 mb-1" data-toggle="tooltip" title="Edit data"><i class="fa fa-edit"></i></a>';
                    $button .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 delete" data-toggle="tooltip" title="Delete data"><i class="fa fa-trash-alt"></i></button>';
                    return $button;
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
//        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('name', 'id');

        return view('admin.user_managements.roles.create', compact('permissions'));
    }

    public function store(RolesStoreRequest $request)
    {

        $role = Role::create(['name'=> $request->name]);
        $role->givePermissionTo($request->input('permissions'));

        return redirect()->route('admin.user_managements.roles.index')->with('message_success',__('user.role_create_success'));
    }

    public function edit($id)
    {
//        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all()->pluck('name', 'id');
        $role=Role::findOrFail($id);
//        $role->load('permissions');

        return view('admin.user_managements.roles.edit', compact('permissions', 'role'));
    }

    public function update(RolesUpdateRequest $request, $id)
    {

        $role=Role::findOrFail($id);
        $role->update(['name'=> $request->name]);
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('admin.user_managements.roles.index')->with('message_success',__('user.role_update_success'));

    }

    public function show($id)
    {
//        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role=Role::findOrFail($id);
        return view('admin.user_managements.roles.show', compact('role'));
    }

    public function destroy($id)
    {
//        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $role = Role::findOrFail($id);
        $role->delete();

        return response(__('role.delete_success'));

    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
