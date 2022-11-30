<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{

    protected $v, $banner;
    public function __construct()
    {
        $this->v = [];
        $this->banner = new Banner();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->v['params']  = $request->all();
        $this->v['list'] = $this->banner->index($this->v['params'], true, 10);

        return view('backend.pages.banner.index', $this->v);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            $params  = [];
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
            if ($request->file('image')) {
                $params['cols']['image'] = $this->uploadFile($request->file('image'));
            }
            // dd($params); 
            $res =  $this->banner->create($params);
            if ($res > 0) {
                Session::flash('success', "Thêm thành công");
            } else {
                Session::flash('error', "Thêm không thành công");
            }
            return redirect()->route('route_BE_Admin_Banner');
        }


        return view('backend.pages.banner.add');
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
            $this->v['res'] = $this->banner->show($id);
            // dd($this->v['res']);

            return view('backend.pages.banner.update', $this->v);
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
            $params  = [];
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
            $params['cols']['id'] = session('id');
            if ($request->file('image')) {
                $params['cols']['image'] = $this->uploadFile($request->file('image'));
            }
            // dd($params); 
            $res =  $this->banner->saveupdate($params);
            if ($res > 0) {
                Session::flash('success', "Update thành công");
            } else {
                Session::flash('error', "Update không thành công");
            }
            return redirect()->route('route_BE_Admin_Banner');
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
            $res = $this->banner->remove($id);
            // dd($res);
            if ($res > 0) {
                Session::flash('success', "Xóa thành công");
            } else {
                Session::flash('error', "Xóa không thành công");
            }
            return back();
        }
    }

    public function uploadFile($file)
    {
        $filename =  time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('imageBanner', $filename,  'public');
    }
}
