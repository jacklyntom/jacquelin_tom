<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */

    //  public function Homeview()
    //  {
    //      $products   = Product::where('is_deleted','<>',1)->get();
    //      $categories = Category::where('is_deleted','<>',1)->get();
    //      return view('frontend.dashboard',compact('products','categories'));
    //  }

     public function HomeProductDetails($id){

         $product = Product::findOrFail($id);
         return response()->json($product);
     }

    public function index()
    {
        return view('auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect()->route('home.dashboard')->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {

        $products   = Product::where('is_deleted','<>',1)->get();
        $categories = Category::where('is_deleted','<>',1)->get();
        if(Auth::check()){


            return view('frontend.dashboard',compact('products','categories'));
            // return view('frontend.dashboard');
        }

        // return redirect("login")->withSuccess('Opps! You do not have access');
        return redirect()->route('login')->withSuccess('Opps! You do not have access');


    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
