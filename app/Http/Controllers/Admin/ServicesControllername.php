<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ServicesControllername extends Controller
{
    protected $v;
    protected $services;

    public function  __construct()
    {
        $this->v = [];
        $this->services = new Services();
    }

    public function index(Request $request)
    {
        $this->v['params'] = $request->all();
        $this->v['list'] = $this->services->index($this->v['params'], true, 10);
        return view('backend.pages.service.list', $this->v);
    }

    public function store(ServicesRequest $request)
    {
        //
        $this->v['exParam'] = $request->all();
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
            // dd($params['cols']);
            unset($params['cols']['_token']);
            $res =  $this->services->create($params);
            if ($res > 0) {
                // thêm thành công
                Session::flash('success', "Thêm thành công");
                return redirect()->route('route_BE_Admin_Services');
            } else {
                // thêm không thành công
                Session::flash('error', "Thêm không thành công");
                return redirect()->route('route_BE_Admin_Services');
            }
        }

        return view('backend.pages.service.add');
    }

    public function edit($id, Request $request)
    {
        if ($id) {
            $request->session()->put('id', $id);
            $res = $this->services->show($id);
            if ($res) {
                $this->v['res'] = $res;
                return view('backend.pages.service.edit', $this->v);
            } else {
                Session::flash('error', 'Lỗi chỉnh sửa');
                return back();
            }
        }
    }

    public function update(ServicesRequest $request)
    {
        if (session('id')) {
            $id = session('id'); // lấy id chính là session()->put('id' , '$id') đc gán ở hàm edit
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
            // dd($params);
            $res  = $this->services->saveupdate($params);
            if ($res > 0) {
                Session::flash('success', 'Cập nhập thành công');
                return redirect()->route('route_BE_Admin_Services');
            } else {
                Session::flash('error', 'Cập nhập không thành công');
                return redirect()->route('route_BE_Admin_Services');
            }
        }
    }

    public function destroy($id)
    {
        //
        if ($id) {
            $res = $this->services->remove($id);
            if ($res > 0) {
                // xóa thành công
                Session::flash('success', "Xóa thành công");
                return back();
            } else {
                Session::flash('error', "Xóa không thành công");
                return back();
            }
        }
    }
}
