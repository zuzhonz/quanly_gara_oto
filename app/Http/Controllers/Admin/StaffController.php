<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\Staff; 
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StaffRequest;

class StaffController extends Controller
{
    protected $v;
    protected $Staff; 
    protected $user; 
    public function  __construct()
    {
        $this->v = [];
        $this->Staff = new Staff(); 
        $this->user = new User(); 
    }
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->v['params'] = $request->all();
        $this->v['list'] = $this->Staff->index($this->v['params'], true, 5); 
        $this->v['user'] = $this->user->index(null, false, null); 
        // dd($this->v['list']);
        return view('backend.pages.Staff.index', $this->v);
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
    public function store(Request $request)
    {
        $this->v['user'] = $this->user->index(null, false, null);
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
            unset($params['cols']['_token']);  
            $res =  $this->Staff->create($params);  
            if ($res > 0) {
                // thêm thành công
                Session::flash('success', "Thêm thành công");
                return redirect()->route('route_BE_Admin_Staff');
            } else {
                // thêm không thành công
                Session::flash('error', "Thêm không thành công");
                return redirect()->route('route_BE_Admin_Staff');
            }
        }
        return view('backend.pages.Staff.add ', $this->v);
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
        if ($id) {
        $this->v['user'] = $this->user->index(null, false, null);
            $request->session()->put('id', $id); // gán id vào session để đảm bảo bảo mật
            $result = $this->Staff->show($id); 
            if ($result) {
                // hiển thị dữ liện vào form chỉnh sửa
                $this->v['detail'] = $result;
                return view('backend.pages.Staff.update', $this->v);
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
            $res  = $this->Staff->saveupdate($params);
            if ($res > 0) {
                Session::flash('success', 'Cập nhập thành công');
                return redirect()->route('route_BE_Admin_Staff');
            } else {
                Session::flash('error', 'Cập nhập không thành công');
                return redirect()->route('route_BE_Admin_Staff');
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
            $res = $this->Staff->remove($id);
            // dd($res);
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
