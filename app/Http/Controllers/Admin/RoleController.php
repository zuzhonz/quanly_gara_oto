<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{

    protected $v, $role;

    public function __construct()
    {
        $this->v = [];
        $this->role = new  Role();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->v['params'] = $request->all();
        $this->v['list'] = $this->role->index($this->v['params'], true, 10);
        return view('backend.pages.role.index', $this->v);
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
            $res = $this->role->create($params);
            if ($res  > 0) {
                Session::flash('success', "Thêm thành công");
                return redirect()->route('route_BE_Admin_List_Role');
            } else {
                Session::flash('error', "Thêm không thành công");
                return redirect()->route('route_BE_Admin_List_Role');
            }
        }


        return view('backend.pages.role.add');
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
            // dd($id);
            $request->session()->put('id', $id);
            $res = $this->role->show($id);
            $this->v['res'] = $res;
            // dd($res);
            if ($res) {
                return view('backend.pages.role.update', $this->v);
            } else {
                Session::flash('error', 'Lỗi chỉnh sửa');
                return redirect()->route('route_BE_Admin_List_Role');
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
                $params['cols']['id'] = $id;
                $res = $this->role->saveupdate($params);
                if ($res  > 0) {
                    Session::flash('success', "Cập nhập thành công");
                    return redirect()->route('route_BE_Admin_List_Role');
                } else {
                    Session::flash('error', "Cập nhập không thành công");
                    return redirect()->route('route_BE_Admin_List_Role');
                }
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
            // nếu tồn tại id thì mới cho xóa
            $res = $this->role->remove($id);
            if ($res > 0) {
                Session::flash('success', 'Xóa thành công');
                return back();
            } else {
                Session::flash('error', 'Xóa không thành công');
            }
        } else {
            Session::flash('success', "Xóa không thành công");
            return back();
        }
    }
}
