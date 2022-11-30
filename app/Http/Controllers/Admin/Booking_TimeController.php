<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking_TimeRequest;
use App\Models\Booking_Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Booking_TimeController extends Controller
{
    protected $v;
    protected $booking_time;

    public function  __construct()
    {
        $this->v = [];
        $this->booking_time = new Booking_Time();
    }

    public function index(Request $request)
    {
        $this->v['params'] = $request->all();
        $this->v['list'] = $this->booking_time->index($this->v['params'], true, 10);
        return view('backend.pages.booking_time.list', $this->v,);
    }

    // hàm thêm mới 
    public function store(Booking_TimeRequest $request)
    {
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
            $res =  $this->booking_time->create($params);
            if ($res > 0) {
                // thêm thành công
                Session::flash('success', "Thêm thành công");
                return redirect()->route('route_BE_Admin_Booking_Time');
            } else {
                // thêm không thành công
                Session::flash('error', "Thêm không thành công");
                return redirect()->route('route_BE_Admin_Booking_Time');
            }
        }
        return view('backend.pages.booking_time.add', $this->v);
    }

    public function edit($id, Request $request)
    {
        if ($id) {
            $request->session()->put('id', $id);
            $res = $this->booking_time->show($id);
            // dd($res)
            if ($res) {
                $this->v['res'] = $res;
                return view('backend.pages.booking_time.edit', $this->v);
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

            $res = $this->booking_time->saveupdate($params);
            if ($res > 0) {
                Session::flash('success', "Update thành công");
                return redirect()->route('route_BE_Admin_Booking_Time');
            } else {
                Session::flash('success', "Update không thành công");
                return redirect()->route('route_BE_Admin_Booking_Time');
            }
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $res = $this->booking_time->remove($id);
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
