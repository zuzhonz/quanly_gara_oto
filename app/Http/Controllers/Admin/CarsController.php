<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cars;
use App\Models\CarAlbum;
use App\Models\carColor;
use App\Models\CarBranch;
use Illuminate\Http\Request;
use App\Http\Requests\CarsRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CarsController extends Controller
{
    protected $v;
    protected $cars;

    public function  __construct()
    {
        $this->v = [];
        $this->cars = new Cars();
        $this->car_branch = new CarBranch();
        $this->car_color = new carColor();
        $this->car_album = new CarAlbum();
    }

    public function index(Request $request)
    {
        $this->v['params'] = $request->all();
        $this->v['list'] = $this->cars->index($this->v['params'], true, 10);
        $this->v['car_branch'] = $this->car_branch->index(null, false, null);

        return view('backend.pages.cars.list', $this->v,);
    }

    // hàm thêm mới 
    public function store(CarsRequest $request)
    {
        $this->v['car_album'] = $this->car_album->index(null, false, null);
        $this->v['car_branch'] = $this->car_branch->index(null, false, null);
        $this->v['car_color'] = $this->car_color->index(null, false, null);
        $this->v['exParam'] = $request->all();
        if ($request->isMethod('POST')) {

            // dd($request->all());
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
            if ($request->file('car_image')) {
                // hàm uploadFile này đc định nghĩa ra để upload ảnh bản ghi nếu có 
                $params['cols']['car_image'] = $this->uploadFile($request->file('car_image'));
            }
            if ($request->file('car_list_image')) {
                // hàm uploadFile này đc định nghĩa ra để upload ảnh bản ghi nếu có 
                $array = $request->file(('car_list_image'));
                // dd($array);

                // dd(implode("|", ));
                $file = [];
                foreach ($array as $key => $item) {
                    // dd($item[$key]);
                    // dd($item->getClientOriginalName());
                    $filename =  time() . '_' .  $item->getClientOriginalName();
                    $item->storeAs('CarListImage', $filename,  'public');
                    $file[] =    $item->storeAs('CarListImage', $filename,  'public');
                }

                // dd($file);
                // dd(implode("|", $file));


                $params['cols']['car_list_image'] = implode("|", $file);
            }
            unset($params['cols']['_token']);
            // dd($params);
            $res =  $this->cars->create($params);
            if ($res > 0) {
                // thêm thành công
                Session::flash('success', "Thêm thành công");
                return redirect()->route('route_BE_Admin_Cars');
            } else {
                // thêm không thành công
                Session::flash('error', "Thêm không thành công");
                return redirect()->route('route_BE_Admin_Cars');
            }
        }
        return view('backend.pages.cars.add', $this->v);
    }

    public function edit($id, Request $request)
    {
        if ($id) {
            $request->session()->put('id', $id);
            $this->v['car_branch'] = $this->car_branch->index(null, false, null);
            $this->v['car_color'] = $this->car_color->index(null, false, null);
            $res = $this->cars->show($id);
            $album = explode('|', $res->car_list_image);
            $this->v['album'] = $album;
            // dd($res);
            if ($res) {
                $this->v['res'] = $res;
                return view('backend.pages.cars.edit', $this->v);
            } else {
                Session::flash('error', 'Lỗi chỉnh sửa');
                return back();
            }
        }
    }

    public function update(CarsRequest $request)
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

            if ($request->file('car_image') != null) {
                // hàm uploadFile này đc định nghĩa ra để upload ảnh bản ghi nếu có 
                $params['cols']['car_image'] = $this->uploadFile($request->file('car_image'));
            }
            if ($request->file('car_list_image')) {
                // dd($request->file('car_list_image'));
            }
            $carCurrent  = Cars::find($id);
            // dd($carCurrent->car_list_image);
            $arrayLIstImg = explode('|', $carCurrent->car_list_image);
            // dd($arrayLIstImg);
            for ($i = 0; $i < count($arrayLIstImg); $i++) {
                // dd($arrayLIstImg);
                if ($request->file('car_list_image' . $i)) {

                    $filename =  time() . '_' . ($request->file('car_list_image' . $i))->getClientOriginalName();
                    // dd($filename);
                    $fileNameCurrent = $request->file('car_list_image' . $i)->storeAs('CarListImage', $filename,  'public');
                    $arrayLIstImg[$i] = $fileNameCurrent;



                    // $filename =  time() . '_' .  $item->getClientOriginalName();
                    // $item->storeAs('CarListImage', $filename,  'public');
                    // $file[] =    $item->storeAs('CarListImage', $filename,  'public');
                }
            }
            // dd($arrayLIstImg);
            $params['cols']['car_list_image'] = implode("|", $arrayLIstImg);

            // dd($params);
            unset($params['cols']['_token']);
            $params['cols']['id'] = $id;

            $res = $this->cars->saveupdate($params);
            if ($res > 0) {
                Session::flash('success', "Update thành công");
                return redirect()->route('route_BE_Admin_Cars');
            } else {
                Session::flash('success', "Update không thành công");
                return redirect()->route('route_BE_Admin_Cars');
            }
        }
    }

    public function updateCarHot ($id){
        $cars = Cars::select("car_hot")->where("id", $id)->first();
        if($cars->car_hot == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        Cars::where('id', $id)->update(['car_hot'=>$status]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        if ($id) {
            $res = $this->cars->remove($id);
            if ($res > 0) {
                Session::flash('success', "Xóa thành công");
                return back();
            } else {
                Session::flash('error', "Xóa không thành công");
                return back();
            }
        }
    }
    public function uploadFile($file)
    {
        $filename =  time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('imageDanhMuc', $filename,  'public');
    }
}
