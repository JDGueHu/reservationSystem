<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class registrationController extends Controller
{
    public function register(){

    	return view('auth.register');

    }
}
