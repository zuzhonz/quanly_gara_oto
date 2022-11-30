<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\CarBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    protected $v, $carBranch;

    public function __construct()
    {
        $this->v = [];
        $this->carBranch = new CarBranch();
    }


    public function Login(LoginRequest $request)
    {
        // dd(123);
        $this->v['listCarBranch'] = $this->carBranch->index(null, false, null);
        if ($request->isMethod('POST')) { 
            $params  = [];
            $params['cols'] = array_map(function ($item) {
                if ($item == '') {
                    $item = null;
                } 
                if (is_string($item)) {
                    $item = trim($item);
                }
                return $item;
            }, $request->post());

            unset($params['cols']['_token']);
            // dd($params);
            $email =  $params['cols']['email'];
            $password  = $params['cols']['password']; 
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                Session::flash('successLoign'  , "Đăng nhập thành công");
                return redirect()->route('route_FE_Client_Home');

            } else {
    
                return back();
            }
        }
        return view('client.user.login', $this->v);
    }


    public function Logout()
    {
        Auth::logout();
        return redirect()->route('route_FE_Client_Home');
    }
}
