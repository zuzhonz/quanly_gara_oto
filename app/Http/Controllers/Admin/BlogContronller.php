<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\Blogrequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BlogContronller extends Controller
{
    private $v;
    protected $blog;

    public function __construct()
    {
        $this->v = [];
        $this->blog = new Blog();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->v["params"] = $request->all();
        $this->v['list'] = $this->blog->index($this->v["params"], true, 5);

        // dd($this->v['list']);
        return view('backend.pages.car_blog.index', $this->v);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.car_blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Blogrequest $request)
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
            if ($request->file('image')) {
                // hàm uploadFile này đc định nghĩa ra để upload ảnh bản ghi nếu có 
                $params['cols']['image'] = $this->uploadFile($request->file('image'));
            }
            $params['cols']['users_id'] = 1;

            $res =  $this->blog->create($params);
            if ($res > 0) {
                // thêm thành công
                Session::flash('success', "Thêm thành công");
                return redirect()->route('route_BE_Admin_blog_create');
            } else {
                // thêm không thành công
                Session::flash('error', "Thêm không thành công");
                return redirect()->route('route_BE_Admin_blog_create');
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
    public function edit($id, Request $request)
    {
        if ($id) {
            $request->session()->put('id', $id); // gán id vào session để đảm bảo bảo mật
            $result = $this->blog->show($id);
            if ($result) {
                // hiển thị dữ liện vào form chỉnh sửa
                $this->v['detail'] = $result;
                return view('backend.pages.car_blog.update', $this->v);
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
    public function update(Blogrequest $request)
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
            if ($request->file('image')) {
                // nếu có trường ảnh thì thêm ảnh vào mảng $params
                $params['cols']['image'] = $this->uploadFile($request->file('image'));
            }


            $params['cols']['id'] = $id;
            $res  = $this->blog->saveupdate($params);
            if ($res > 0) {
                Session::flash('success', 'Cập nhập thành công');
                return redirect()->route('route_BE_Admin_blog_edit', $id);
            } else {
                Session::flash('error', 'Cập nhập không thành công');
                return redirect()->route('route_BE_Admin_blog_edit', $id);
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
            $res = $this->blog->remove($id);
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
        return $file->storeAs('image/blog', $filename,  'public');
    }
}