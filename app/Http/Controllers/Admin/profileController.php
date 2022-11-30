<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class profileController extends Controller
{
    protected $v, $users, $blog;
    public function __construct()
    {
        $this->users = new User();
        $this->blog = new Blog();
    }

    public function index()
    {
        $this->v['user'] = Auth::user();
        $this->v['role'] =  Auth::user()->role_id == 1 ? "Admin" : "Nhân viên";

        if ($this->v['user']->gender == 1) {
            $this->v['gender'] = 'Nam';
        } else if ($this->v['user']->gender == 2) {
            $this->v['gender'] = 'Nữ';
        } else {
            $this->v['gender'] = 'Khác';
        }

        $this->v['count_bolg'] = $this->blog->show_auth_blog($this->v['user']->id)->count();

        // dd($this->v);
        return view('backend.pages.profile.index', $this->v);
    }

    // hàm upload file ảnh 
    public function uploadFile($file)
    {
        $filename =  time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('imageDanhMuc', $filename,  'public');
    }

    public function update(Request $request)
    {
        if (Auth::user()->id) {
            $id = Auth::user()->id; // lấy id chính là session()->put('id' , '$id') đc gán ở hàm edit
            $params = []; // định nghĩa ra mảng params để chứa dữ liệu update sau khi đc lọc
            $params['cols'] = array_map(function ($item) {
                if ($item == '') {
                    $item  = null;
                }
                if (is_string($item)) {
                    $item = $item;
                }

                return $item;
            }, $request->post());
            unset($params['cols']['_token']);
            $params['cols']['id'] = $id;


            if ($request->file('avatar') != null) {
                $params['cols']['avatar'] = $this->uploadFile($request->file('avatar'));
            }

            $res  = $this->users->saveupdate($params);

            if ($res > 0) {
                Session::flash('success', 'Cập nhập thành công');
                return redirect()->route('Profile');
            } else {
                Session::flash('error', 'Cập nhập không thành công');
                return redirect()->route('Profile');
            }
        }
    }
}