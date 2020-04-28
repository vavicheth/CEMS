<?php

namespace App\Http\Controllers\Admin\UserManagements;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Traits\UploadBySlim;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data=User::query()->orderBy('created_at','desc');

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button='<button type="button" name="show" id="'.$data->id.'" class="btn btn-sm btn-info mr-1 mb-1" data-toggle="tooltip" title="Show data"><i class="fa fa-eye"></i></button>';
                    $button .=' <a href="' . route('admin.user_managements.users.edit', $data->id) . '" class="btn btn-sm btn-success mr-1 mb-1" data-toggle="tooltip" title="Edit data"><i class="fa fa-edit"></i></a>';
                    $button .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1 " data-toggle="tooltip" title="Delete data"><i class="fa fa-trash-alt"></i></button>';
                    return $button;
                })
                ->editColumn('active', function ($data) {
                    return $data->active == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>';
                })
                ->rawColumns(['action','active'])
                ->make(true);
        }

        return view('admin.user_managements.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        abort_if(! Gate::allows('user_create'),401);

        $roles=Role::get()->pluck('name', 'id');

        return view('admin.user_managements.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {
        abort_if(! Gate::allows('user_create'),401);

        if ( $request->avatar )
        {
            $avatar= UploadBySlim::uploadPhoto('avatar','media/avatars');
            $request->request->set('avatar', $avatar['name']);
        }
        $user=User::create($request->all());
        $user->syncRoles($request['roles']);

        return redirect(route('admin.user_managements.users.index'))->with('message_success',__('user.create_success'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(! Gate::allows('user_update'),401);

        $user=User::findOrFail($id);
        $roles=Role::get()->pluck('name', 'id');

//        dd($user->avatar);

        return view('admin.user_managements.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdateRequest $request, $id)
    {
        abort_if(! Gate::allows('user_update'),401);
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

        return redirect(route('admin.user_managements.users.index'))->with('message_success',__('user.update_success'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
