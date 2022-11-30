<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarBranchRequest;
use App\Models\CarBranch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\RequestStack;

class CarBranchController extends Controller
{
    protected $v;
    protected $car_branch;

    public function  __construct()
    {
        $this->v = [];
        $this->car_branch = new CarBranch();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $this->v['params'] = $request->all();
        $this->v['list'] = $this->car_branch->index($this->v['params'], true, 2);
        // dd($this->v['list']);
        return view('backend.pages.carbranch.index', $this->v);
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


    // hàm thêm mới 
    public function store(CarBranchRequest $request)
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
            if ($request->file('anh')) {
                // hàm uploadFile này đc định nghĩa ra để upload ảnh bản ghi nếu có 
                $params['cols']['anh'] = $this->uploadFile($request->file('anh'));
            }
            $res =  $this->car_branch->create($params);
            if ($res > 0) {
                // thêm thành công
                Session::flash('success', "Thêm thành công");
                return redirect()->route('route_BE_Admin_Car_Branch');
            } else {
                // thêm không thành công
                Session::flash('error', "Thêm không thành công");
                return redirect()->route('route_BE_Admin_Car_Branch');
            }
        }

        return view('backend.pages.carbranch.add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // hảm lấy dữ liệu bản ghi và hiển thị dữ liệu đó ra form edit
    public function edit($id, Request $request)
    {
        //
        if ($id) {
            $request->session()->put('id', $id); // gán id vào session để đảm bảo bảo mật
            $result = $this->car_branch->show($id);
            if ($result) {
                // hiển thị dữ liện vào form chỉnh sửa
                $this->v['detail'] = $result;
                return view('backend.pages.carbranch.update', $this->v);
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

    // cập nhập dữ liệu sau khi đã edit ở form edit
    public function update(CarBranchRequest $request)
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
            // dd($params);
            $res  = $this->car_branch->saveupdate($params);
            if ($res > 0) {
                Session::flash('success', 'Cập nhập thành công');
                return redirect()->route('route_BE_Admin_Car_Branch');
            } else {
                Session::flash('error', 'Cập nhập không thành công');
                return redirect()->route('route_BE_Admin_Car_Branch');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // hàm xóa bản ghi theo id 
    public function destroy($id)
    {
        //
        if ($id) {
            $res = $this->car_branch->remove($id);
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

    // hàm upload file ảnh 
    public function uploadFile($file)
    {
        $filename =  time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('imageDanhMuc', $filename,  'public');
    }
}