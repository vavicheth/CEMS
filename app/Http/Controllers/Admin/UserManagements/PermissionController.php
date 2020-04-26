<?php

namespace App\Http\Controllers\Admin\UserManagements;

use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    public function index()
    {
//        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all();

        return view('admin.user_managements.permissions.index', compact('permissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.user_managements.permissions.create');
    }

    public function store(Request $request)
    {
        $permission = Permission::create($request->all());

        return redirect()->route('admin.permissions.index');

    }

    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.user_managements.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect()->route('admin.user_managements.permissions.index');

    }

    public function show(Permission $permission)
    {
        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.user_managements.permissions.show', compact('permission'));
    }

    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->delete();

        return back();

    }

    public function massDestroy(Request $request)
    {
        Permission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}