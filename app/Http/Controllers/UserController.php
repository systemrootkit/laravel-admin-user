<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function authenticated(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // return redirect()->intended('dashboard')
            //             ->withSuccess('Signed in');
            if(Auth::user()->role_as == '1') //1 = Admin Login
            {
                return redirect('admin/dashboard')->with('status','Welcome to admin-dashboard');
            }
            elseif(Auth::user()->role_as == '0') // Normal or Default User Login
            {
                return redirect('home')->with('status','user Logged in successfully');
            }
        }
        return redirect("login")->withSuccess('Login details are not valid');


    }

    public function register(Request $request){
        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
          ]);

          return redirect("login")->withSuccess('You have signed-in');
    }


}
