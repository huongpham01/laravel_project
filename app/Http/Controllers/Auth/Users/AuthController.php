<?php

namespace App\Http\Controllers\Auth\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    // get login form
    public function login()
    {
        return view('auth.login');
    }

    // post login
    public function loginUser(LoginRequest $request)
    {
        // User login before, return text
        if (Auth::check() || Auth::viaRemember()) {
            return $this->redirectToIndex();
        }
        //Check infor user login
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {
            return $this->redirectToIndex();
        }
        //When infor user import equal in DB
        Session::flash('success', 'Login failed. Please check your credentials.');
        return redirect()->back();
    }
    // Sign up
    public function register()
    {
        return view('auth.register');
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
            return $this->redirectToIndex()->with('success', 'Sign up successful! Welcome, ' . $user->name . '!');
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            Log::error('User registration failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['message' => 'Sign up failed. Please try again.']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.get.login');
    }

    protected function redirectToIndex()
    {
        return redirect()->route('user.index');
    }
}
