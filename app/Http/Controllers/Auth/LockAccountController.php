<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LockAccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware(['auth']);
        $this->middleware('guest')->except([
            'lockscreen',
            'unlock'
        ]);
    }

    public function lockscreen()
    {
        session(['locked' => 'true', 'uri' => url()->previous()]);

        return view('auth.locked')
            ->with('flash', 'Account Locked Successfully!');
    }

    public function unlock(Request $request)
    {

        $password = $request->password;

        $this->validate($request, [
            'password' => 'required|string',
        ]);


        if(Hash::check($password, Auth::user()->password)){
            $uri = $request->session()->get('uri');

            $request->session()->forget(['locked']);
            if ($uri == route('login.locked'))
            {
                return redirect()->route('/')->with('message_info','Welcome back '.auth()->user()->name.' !');
            }
            else
            {
                return redirect($uri)->with('message_info','Welcome back '.auth()->user()->name.' !');
            }

        }

        return back()->with('message_error','Password is not correct, please try again!');;
    }
}
