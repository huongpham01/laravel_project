<?php

namespace App\Http\Controllers\Auth\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.users.login', [
            'title' => 'Login'
        ]);
    }

    public function store(LoginRequest $request)
    {
        // User login before, return text
        if (Auth::check() || Auth::viaRemember()) {
            return view('auth.main');
            die;
        }
        //Check infor user login
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            return view('auth.main');
        }
        //When infor user import equal in DB
        Session::flash('success', 'Login success!!!');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.get.login');
    }
}
