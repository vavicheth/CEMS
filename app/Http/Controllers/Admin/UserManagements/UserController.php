<?php

namespace App\Http\Controllers\Admin\UserManagements;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
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
                    $button='<button type="button" name="show" id="'.$data->id.'" class="btn btn-sm btn-info mr-1" data-toggle="tooltip" title="Show data"><i class="fa fa-eye"></i></button>';
                    $button .=' <a href="' . route('admin.user_managements.users.edit', $data->id) . '" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" title="Edit data"><i class="fa fa-edit"></i></a>';
                    $button .=' <button type="button" name="delete" id="'.$data->id.'" class="btn btn-sm btn-danger mr-1" data-toggle="tooltip" title="Delete data"><i class="fa fa-trash-alt"></i></button>';
                    return $button;
                })
//                ->editColumn('active', function ($data) {
//                    return $data->active == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
//                })
                ->rawColumns(['action'])
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
//        Role::create(['name'=> 'Users']);
//        Permission::create(['name' => 'users_delete']);
//        $role = Role::findOrFail(2);
//        $role->givePermissionTo([1,2]);
//        auth()->user()->assignRole([1,2]);

//        return auth()->user()->getPermissionsViaRoles();

        abort_if(! Gate::allows('users_create'),401);
        return view('admin.user_managements.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {

//        dd($request->all());

        $user=User::create($request->all());



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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
