<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function login()
    {
        echo 'Login';
    }
    public function register()
    {
        echo 'Register';
    }
}
