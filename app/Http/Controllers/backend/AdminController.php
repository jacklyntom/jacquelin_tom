<?php

namespace App\Http\Controllers\backend;

// use App\Models\Role;
// use App\Models\Site;
use App\Models\User;
// use App\Models\Product;
// use App\Models\Category;
// use App\Models\Subcategory;
use Illuminate\Http\Request;
// use App\Models\Mastercompany;
// use App\Models\Subsubcategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller

{
    public function View()

    {

        return view('backend.dashboard');
    }

    public function LoginView()
    {
        return view('backend.login');
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

                return redirect()->route('admin.admin-dashboard')->with('error', 'Login Successfully');
            }
        } else {
            return back()->with('error', 'User does not exist');
        }
    }

    public function Logout(Request $request)
    {
        Session::flush();
        return redirect()->route('login.view')->with('error', 'Logout Successfully');
    }



}
