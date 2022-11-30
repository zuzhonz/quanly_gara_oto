<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserClientController extends Controller
{
    public function index(){   
        return view('client.user.dashboard');
    } 
    public function login(){   
        return view('client.user.login');
    } 
}
