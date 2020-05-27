<?php

namespace App\Http\Controllers\Admin\UserManagements;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Traits\UploadBySlim;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public function index(Request $request)
    {
        abort_if(! Gate::allows('user_access'),403);
        if($request->ajax())
        {
            $data=User::query()->orderBy('created_at','desc');

            if (request('trash') == 1 && Gate::allows('user_delete')){
                $data=$data->onlyTrashed()->get();
            }

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button='';
                    if (Gate::allows('user_show')){
                        $button .='<a href="' . route('admin.user_managements.users.show', $data->id) . '" class="btn btn-sm btn-info mr-1 mb-1" data-toggle="tooltip" title="Show data"><i class="fa fa-eye"></i></a>';
                    }
                    if (Gate::allows('user_update')){
                        $button .=' <a href="' . route('admin.user_managements.users.edit', $data->id) . '" class="btn btn-sm btn-success mr-1 mb-1" data-toggle="tooltip" title="Edit data"><i class="fa fa-edit"></i></a>';
                    }
                    if (Gate::allows('user_delete')){
                        if ($data->username != 'admin'){
                            $button .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 delete" data-toggle="tooltip" title="Delete data"><i class="fa fa-trash-alt"></i></button>';
                        }
                    }

                    $trash =' <button type="button" name="restore" id="'.$data->id.'" class="btn btn-sm btn-success mr-1 mb-1 restore" data-toggle="tooltip" title="Restore data"><i class="fa fa-backward"></i></button>';
                    $trash .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 mb-1 delete" data-toggle="tooltip" title="Destroy data"><i class="fa fa-trash-alt"></i></button>';

                    if (request('trash') == 1 && Gate::allows('user_delete')){
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

        return view('admin.user_managements.users.index');
    }

    public function create()
    {

//        Role::create(['name'=> 'Admin']);
//        Permission::create(['name' => 'user_access']);
//        Permission::create(['name' => 'user_show']);
//        Permission::create(['name' => 'user_create']);
//        Permission::create(['name' => 'user_update']);
//        Permission::create(['name' => 'user_delete']);
//        $role = Role::findOrFail(1);
//        $role->givePermissionTo([1,2,3,4,5]);
//        auth()->user()->assignRole([1,2,5]);

//        return auth()->user()->getPermissionsViaRoles();

//        $user=User::findOrFail(1);
//        return $user->roles->pluck('id');

        abort_if(! Gate::allows('user_create'),403);
        $roles=Role::get()->pluck('name', 'id');

        return view('admin.user_managements.users.create',compact('roles'));
    }

    public function store(UsersStoreRequest $request)
    {
        abort_if(! Gate::allows('user_create'),403);

        if ( $request->avatar )
        {
            $avatar= UploadBySlim::uploadPhoto('avatar','media/avatars');
            $request->request->set('avatar', $avatar['name']);
        }
        $user=User::create($request->all());
        $user->syncRoles($request['roles']);

        return redirect(route('admin.user_managements.users.index'))->with('message_success',__('user.user_create_success'));
    }

    public function show($id)
    {
        abort_if(! Gate::allows('user_show'),403);

        $user = User::findOrFail($id);
        return view('admin.user_managements.users.show', compact('user'));
    }

    public function edit($id)
    {
        abort_if(! Gate::allows('user_update'),403);

        $user=User::findOrFail($id);
        $roles=Role::get()->pluck('name', 'id');

        return view('admin.user_managements.users.edit',compact('user','roles'));
    }

    public function update(UsersUpdateRequest $request, $id)
    {
        abort_if(! Gate::allows('user_update'),403);

        $user=User::findOrFail($id);
        if ( $request->avatar )
        {
            UploadBySlim::deleteAvatarPhoto($user->avatar,'media/avatars');
            $avatar= UploadBySlim::uploadPhoto('avatar','media/avatars');
            $request->request->set('avatar', $avatar['name']);
        }else{
           $request->request->remove('avatar');
        }
        if (!$request->password) {$request->request->remove('password');}

        $user->update($request->all());
        $user->syncRoles($request['roles']);

        return redirect(route('admin.user_managements.users.index'))->with('message_success',__('user.user_create_success'));
    }

    public function destroy($id)
    {
        abort_if(! Gate::allows('user_delete'),403);
        $user=User::findOrFail($id);
        $user->delete();

        return response(__('user.user_delete_success'));
    }

    public function per_del($id)
    {
        abort_if(! Gate::allows('user_delete'),403);
        $permission=User::onlyTrashed()->findOrFail($id);
        UploadBySlim::deleteAvatarPhoto($permission->avatar,'media/avatars');
        $permission->forceDelete();

        return response(__('user.user_delete_success'));
    }

    public function restore($id)
    {
        abort_if(! Gate::allows('permission_delete'),403);
        $permission=User::onlyTrashed()->findOrFail($id);
        $permission->restore();

        return response(__('user.user_restore_success'));
    }
}
