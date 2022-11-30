<?php

namespace App\Http\Controllers\Client;

use App\Models\Cars;
use App\Models\Booking;
use App\Models\CarAlbum;
use App\Models\CarColor;
use App\Models\Services;
use App\Models\CarBranch;
use App\Models\Booking_Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\Session;

class ProductsClientController extends Controller
{
    protected $v, $carBranch, $car, $album, $booking_time, $services, $booking, $car_color;

    public function __construct()
    {
        $this->v = [];
        $this->carBranch = new CarBranch();
        $this->album = new CarAlbum();
        $this->car = new Cars();
        $this->booking_time = new Booking_Time();
        $this->services = new Services();
        $this->booking = new Booking();
        $this->car_color = new CarColor();
    }

    public function index()
    {
        $this->v['listCarBranch'] = $this->carBranch->index(null, false, null);
        $this->v['car'] = $this->car->index(null, false, null);
        $this->v['album'] = $this->album->index(null, false, null);
        $this->v['car_color'] = $this->car_color->index(null, false, null);


        return view('client.products.products_grid', $this->v);
    }

    public function list()
    {
        $this->v['listCarBranch'] = $this->carBranch->index(null, false, null);
        $this->v['car'] = $this->car->index(null, true, 5);
        $this->v['origin'] = $this->car->origin();
        $this->v['engine'] = $this->car->engine();
        $this->v['mileage'] = $this->car->mileage();

        $this->v['album'] = $this->album->index(null, false, null);

        $this->v['car_color'] = $this->car_color->index(null, false, null);

        return view('client.products.products_list', $this->v);
    }

    public function filter_car(Request $request)
    {
        $params = [];

        $params['keywords'] = array_map(function ($item) {
            return $item;
        }, $request->post());
        $params['keywords']['price'] = (int) $params['keywords']['price'];
        unset($params['keywords']['_token']);

        $this->v['listCarBranch'] = $this->carBranch->index(null, false, null);
        $this->v['car_color'] = $this->car_color->index(null, false, null);
        $this->v['car'] = $this->car->filter_car($params, true, 5);
        $this->v['origin'] = $this->car->origin();
        $this->v['engine'] = $this->car->engine();
        $this->v['mileage'] = $this->car->mileage();


        return view('client.products.products_list', $this->v);

        // return response()->json(['success' => true, 'car' => $this->v['car']]);
    }

    public function detail(Request $request, $id)
    {
        // dd(123);
        $this->v['listCarBranch'] = $this->carBranch->index(null, false, null);
        $this->v['car'] = $this->car->show($id);
        $this->v['car_branch'] = $this->car->search_branch(null, true, 5, $this->v['car']->car_branch_id);


        $album = explode('|', $this->v['car']->car_list_image);
        $this->v['album'] = $album;
        // dd($album);
        $request->session()->put('id', $id);
        $this->v['time'] = $this->booking_time->index(null, false, null);
        $this->v['services'] = $this->services->index(null, false, null);



        return view('client.products.products_detail', $this->v);
    }
    public function add_booking(BookingRequest $request)
    {
        // dd(123);

        if (session('id')) {
            $id = session('id');

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

            $params['cols']['car_id'] = (int) $id;
            //dd($params['cols']);


            $res =  $this->booking->create($params);
            if ($res > 0) {
                // thêm thành công
                Session::flash('success', "Thêm thành công");
                return redirect()->route('route_FE_Client_Products_detail', $id);
            } else {
                // thêm không thành công
                Session::flash('error', "Thêm không thành công");
                return redirect()->route('route_FE_Client_Products_detail', $id);
            }
        }
    }

    public function list_car_branch($branch)
    {
        $this->v['listCarBranch'] = $this->carBranch->index(null, false, null);
        $this->v['car'] = $this->car->search_branch(null, true, 5, $branch);
        $this->v['car_color'] = $this->car_color->index(null, false, null);
        $this->v['origin'] = $this->car->origin();
        $this->v['engine'] = $this->car->engine();
        $this->v['mileage'] = $this->car->mileage();


        // dd($this->v['car']);

        $this->v['album'] = $this->album->index(null, false, null);
        return view('client.products.products_list', $this->v);
    }
}