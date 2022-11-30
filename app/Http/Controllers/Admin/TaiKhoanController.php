<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaiKhoanController extends Controller
{

    protected $v;
    protected $taikhoan;
    protected $role;

    public function __construct()
    {
        $this->v = [];
        $this->taikhoan = new User();
        $this->role = new Role();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->v['params'] = $request->all();
        $this->v['list'] = $this->taikhoan->index($this->v['params'], true, 3);
        $this->v['role'] = $this->role->index(null, false, null);
        // dd($this->v['role']);
        return view('backend.pages.taikhoan.index', $this->v);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->v['role'] = $this->role->index(null, false, null);

        if ($request->isMethod('POST')) {
            $params = [];
            $params['cols'] = array_map(function ($item) {
                if ($item == '') {
                    $item = null;
                }
                if (is_string($item)) {
                    $item = trim($item);
                }
                return $item;
            }, $request->post());
            if ($request->file('avatar')) {
                $params['cols']['avatar'] = $this->uploadFile($request->file('avatar'));
            }
            unset($params['cols']['_token']);
            // dd($params['cols']);
            $res = $this->taikhoan->create($params);
            if ($res > 0) {
                Session::flash('success', 'Thêm tài khoản thành công');
                return redirect()->route('route_BE_Admin_Tai_Khoan');
            } else {
                Session::flash('error', 'Thêm tài khoản không thành công');
                return redirect()->route('route_BE_Admin_Tai_Khoan');
            }
        }
        return view('backend.pages.taikhoan.add', $this->v);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        if ($id) {
            $request->session()->put('id', $id);
            $this->v['role'] = $this->role->index(null, false, null);
            $res = $this->taikhoan->show($id);
            // dd($res)
            if ($res) {
                $this->v['res'] = $res;
                return view('backend.pages.taikhoan.update', $this->v);
            } else {
                Session::flash('error', 'Lỗi chỉnh sửa');
                return back();
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (session('id')) {
            $id = session('id');
            // dd($id);
            $params = [];
            $params['cols'] = array_map(function ($item) {
                if ($item == '') {
                    $item = null;
                }
                if (is_string($item)) {
                    $item = trim($item);
                }
                return $item;
            }, $request->post());
            if ($request->file('avatar')) {
                $params['cols']['avatar'] = $this->uploadFile($request->file('avatar'));
            }
            unset($params['cols']['_token']);
            $params['cols']['id'] = $id;

            $res = $this->taikhoan->saveupdate($params);
            if ($res > 0) {
                Session::flash('success', "Update thành công");
                return redirect()->route('route_BE_Admin_Tai_Khoan');
            } else {
                Session::flash('success', "Update không thành công");
                return redirect()->route('route_BE_Admin_Tai_Khoan');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id) {
            $res = $this->taikhoan->remove($id);
            if ($res > 0) {
                Session::flash('success', "Xóa thành công");
                return back();
            } else {
                Session::flash('error', "Xóa không thành công");
                return back();
            }
        }
    }

    public function uploadFile($file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('imgUser', $filename, 'public');
    }
}
