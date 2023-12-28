<?php

namespace App\Http\Controllers\Auth\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function loginUser(LoginRequest $request)
    {
        // User login before, return text
        if (Auth::check() || Auth::viaRemember()) {
            // return view('auth.users.dashboard');
            return $this->redirectToDashboard();
        }
        //Check infor user login
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            // return view('auth.users.dashboard');
            return $this->redirectToDashboard();
        }
        //When infor user import equal in DB
        Session::flash('success', 'Login failed. Please check your credentials.');
        return redirect()->back();
    }

    public function registation()
    {
        return view('auth.registation', [
            'title' => 'Registation'
        ]);
    }


    public function registerUser(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            Auth::login($user);

            return $this->redirectToDashboard();
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            return redirect()->back()->withErrors(['message' => 'Registration failed. Please try again.']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.get.login');
    }

    protected function redirectToDashboard()
    {
        return redirect()->route('user.index');
    }
}
