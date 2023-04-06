<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function register(){
        return view ('auth.register');
    }
    public function login(){
        return view ('auth.login');
    }
    public function dashboard(){
        return view ('auth.dashboard');
    }
    public function home(){
        return view ('auth.home');
    }
}
