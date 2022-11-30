<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeesRequest;
use App\Models\Employees;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeesController extends Controller
{
    protected $v;
    protected $employees;

    public function  __construct()
    {
        $this->v = [];
        $this->employees = new Employees();
        $this->services = new Services();
        // $this->car_album = new CarAlbum();
    }

    public function index(Request $request)
    {
        $this->v['params'] = $request->all();
        $this->v['list'] = $this->employees->index($this->v['params'], true, 10);
        $this->v['services'] = $this->services->index(null, false, null);
        return view('backend.pages.employees.list', $this->v,);
    }

    // hàm thêm mới 
    public function store(EmployeesRequest $request)
    {
        $this->v['services'] = $this->services->index(null, false, null);
        //$this->v['car_album'] = $this->car_album->index(null, false, null);
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
            $res =  $this->employees->create($params);
            if ($res > 0) {
                // thêm thành công
                Session::flash('success', "Thêm thành công");
                return redirect()->route('route_BE_Admin_Employees');
            } else {
                // thêm không thành công
                Session::flash('error', "Thêm không thành công");
                return redirect()->route('route_BE_Admin_Employees');
            }
        }
        return view('backend.pages.employees.add', $this->v);
    }

    public function edit($id, Request $request)
    {
        if ($id) {
            $request->session()->put('id', $id);
            $this->v['services'] = $this->services->index(null, false, null);
            $res = $this->employees->show($id);
            // dd($res)
            if ($res) {
                $this->v['res'] = $res;
                return view('backend.pages.employees.edit', $this->v);
            } else {
                Session::flash('error', 'Lỗi chỉnh sửa');
                return back();
            }
        }
    }

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

            unset($params['cols']['_token']);
            $params['cols']['id'] = $id;

            $res = $this->employees->saveupdate($params);
            if ($res > 0) {
                Session::flash('success', "Update thành công");
                return redirect()->route('route_BE_Admin_Employees');
            } else {
                Session::flash('success', "Update không thành công");
                return redirect()->route('route_BE_Admin_Employees');
            }
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $res = $this->employees->remove($id);
            if ($res > 0) {
                Session::flash('success', "Xóa thành công");
                return back();
            } else {
                Session::flash('error', "Xóa không thành công");
                return back();
            }
        }
    }
}
