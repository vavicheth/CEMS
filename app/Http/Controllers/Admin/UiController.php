<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UiController extends Controller
{
    public function index()
    {
        return view('admin.ui.update');
    }

    public function update(Request $request, $user_id)
    {
        return view('admin.ui.update');
    }
}
