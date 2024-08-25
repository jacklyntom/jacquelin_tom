<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function View()

    {

        return view('frontend.dashboard');
    }

    public function LoginView()
    {
        return view('frontend.login');
    }

    public function Login(Request $request)
    {
        // dd($request->all());
        $user = User::where('user_name', $request->user_name)->where('is_active', '<>', 0)->exists();

        if ($user == 1) {
            $user_result = User::where('user_name', $request->user_name)->first();


            if( !$user_result || !Hash::check($request->password,$user_result->password))


            {

                return back()->with('error', 'Invalid Email Or Password');
            }

            else {

                $request->session()->put('user', $user_result);

                return redirect()->route('frontend.dashboard')->with('error', 'Login Successfully');
            }
        } else {

            redirect()->route('frontend.dashboard');
        }
    }

    public function Logout(Request $request)
    {
        Session::flush();
        return redirect()->route('userlogin.view')->with('error', 'Logout Successfully');
    }

}
