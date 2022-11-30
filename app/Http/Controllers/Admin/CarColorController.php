<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CarColorController extends Controller
{
    private $v;
    protected $car_color;

    public function __construct()
    {
        $this->v = [];
        $this->car_color = new CarColor;
    }

    public function index(Request $request)
    {
        $this->v["params"] = $request->all();
        $this->v['list'] = $this->car_color->index($this->v["params"], true, 5);

        return view('backend.pages.car_color.index', $this->v);
    }

    public function create()
    {
        return view('backend.pages.car_color.add', $this->v);
    }

    public function store(Request $request)
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
            if ($request->file('anh')) {
                // hàm uploadFile này đc định nghĩa ra để upload ảnh bản ghi nếu có 
                $params['cols']['anh'] = $this->uploadFile($request->file('anh'));
            }

            if ($params['cols']['desc'] == null) {
                $params['cols']['desc'] = $params['cols']['color'];
            }
            $res =  $this->car_color->create($params);
            if ($res > 0) {
                // thêm thành công
                Session::flash('success', "Thêm thành công");
                return redirect()->route('route_BE_Admin_color_create');
            } else {
                // thêm không thành công
                Session::flash('error', "Thêm không thành công");
                return redirect()->route('route_BE_Admin_color_create');
            }
        }

        return view('backend.pages.car_color.add');
    }

    public function destroy($id)
    {
        if ($id) {
            $res = $this->car_color->remove($id);
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
    public function edit($id, Request $request)
    {
        if ($id) {
            $request->session()->put('id', $id); // gán id vào session để đảm bảo bảo mật
            $result = $this->car_color->show($id);
            if ($result) {
                // hiển thị dữ liện vào form chỉnh sửa
                $this->v['detail'] = $result;
                return view('backend.pages.car_color.update', $this->v);
            }
        }
    }

    public function update(Request $request)
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
            if ($request->file('anh')) {
                // nếu có trường ảnh thì thêm ảnh vào mảng $params
                $params['cols']['anh'] = $this->uploadFile($request->file('anh'));
            }
            if ($params['cols']['desc'] == null) {
                $params['cols']['desc'] = $params['cols']['color'];
            }
            $res  = $this->car_color->saveupdate($params);
            if ($res > 0) {
                Session::flash('success', 'Cập nhập thành công');
                return redirect()->route('route_BE_Admin_car_color');
            } else {
                Session::flash('error', 'Cập nhập không thành công');
                return redirect()->route('route_BE_Admin_car_edit');
            }
        }
    }
}