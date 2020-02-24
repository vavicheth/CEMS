<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Ui;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UiController extends Controller
{
    public function index()
    {
        $uis=Ui::all();
        $ui_user=Auth::user()->uis;

        return view('admin.ui.update',compact('uis','ui_user'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');
        /**
         * default pay-content-layout is ''
         */
        if ($request['pay-content-layout'] ==null)
        {
            $data=$request->except(['pay-content-layout','_token']);
        }
        $a=[];
        foreach ($data as $id => $value) {
            array_push($a,$value);
        }
        $user=Auth::user();
        $user->uis()->sync($a);

        return redirect()->back();

    }
}
