<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Booking_Time;
use App\Models\Cars;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    protected $v;
    protected $booking;

    public function  __construct()
    {
        $this->v = [];
        $this->booking = new Booking();
        $this->booking_time = new Booking_Time();
        $this->services = new Services();
        $this->cars = new Cars();
    }

    public function index(Request $request)
    {
        $this->v['params'] = $request->all();
        $this->v['list'] = $this->booking->index($this->v['params'], true, 10);
        $this->v['booking_time'] = $this->booking_time->index(null, false, null);
        $this->v['services'] = $this->services->index(null, false, null);
        $this->v['cars'] = $this->cars->index(null, false, null);
        return view('backend.pages.booking.list', $this->v,);
    }

    // hàm thêm mới 
    public function store(BookingRequest $request)
    {
        $this->v['booking_time'] = $this->booking_time->index(null, false, null);
        $this->v['services'] = $this->services->index(null, false, null);
        $this->v['cars'] = $this->cars->index(null, false, null);
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
            $res =  $this->booking->create($params);
            if ($res > 0) {
                // thêm thành công
                Session::flash('success', "Thêm thành công");
                return redirect()->route('route_BE_Admin_Booking');
            } else {
                // thêm không thành công
                Session::flash('error', "Thêm không thành công");
                return redirect()->route('route_BE_Admin_Booking');
            }
        }
        return view('backend.pages.booking.add', $this->v);
    }

    public function edit($id, Request $request)
    {
        if ($id) {
            $request->session()->put('id', $id);
            $this->v['booking_time'] = $this->booking_time->index(null, false, null);
            $this->v['services'] = $this->services->index(null, false, null);
            $this->v['cars'] = $this->cars->index(null, false, null);
            $res = $this->booking->show($id);
            // dd($res)
            if ($res) {
                $this->v['res'] = $res;
                return view('backend.pages.booking.edit', $this->v);
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

            $res = $this->booking->saveupdate($params);
            if ($res > 0) {
                Session::flash('success', "Update thành công");
                return redirect()->route('route_BE_Admin_Booking');
            } else {
                Session::flash('success', "Update không thành công");
                return redirect()->route('route_BE_Admin_Booking');
            }
        }
    }

    // change status
    public function updateStatus ($id){
        $booking = Booking::select("is_active")->where("id", $id)->first();
        if($booking->is_active == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        Booking::where('id', $id)->update(['is_active'=>$status]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        if ($id) {
            $res = $this->booking->remove($id);
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
