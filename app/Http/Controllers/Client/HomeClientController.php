<?php

namespace App\Http\Controllers\Client;

use App\Models\Cars;
use App\Models\CarAlbum;
use App\Models\CarColor;
use App\Models\CarBranch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\User;

class HomeClientController extends Controller
{

    protected $v, $carBranch, $car, $album, $car_color, $blogs, $users, $banner;

    public function __construct()
    {
        $this->v = [];
        $this->carBranch = new CarBranch();
        $this->album = new CarAlbum();
        $this->car = new Cars();
        $this->car_color = new CarColor();
        $this->blogs = new Blog();
        $this->users = new User();
        $this->banner = new Banner();
    }
    public function index()
    {
        $this->v['listCarBranch'] = $this->carBranch->index(null, false, null);
        $this->v['car'] = $this->car->index(null, false, null);
        $this->v['blogs'] = $this->blogs->index(null, false, null);
        $this->v['users'] = $this->users->index(null, false, null);
        $this->v['banner'] = $this->banner->index(null, false, null);

        // dd($this->v['car']);
        $this->v['album'] = $this->album->index(null, false, null);

        $this->v['origin'] = $this->car->origin();
        $this->v['engine'] = $this->car->engine();
        $this->v['mileage'] = $this->car->mileage();

        return view('client.home', $this->v);
    }

    public function filter_home(Request $request)
    {
        $params = [];

        $params['keywords'] = array_map(function ($item) {
            return $item;
        }, $request->post());

        unset($params['keywords']['_token']);
        $params['keywords']['price'] = (int) $params['keywords']['price'];

        $this->v['listCarBranch'] = $this->carBranch->index(null, false, null);
        $this->v['car_color'] = $this->car_color->index(null, false, null);
        $this->v['blogs'] = $this->blogs->index(null, false, null);
        $this->v['users'] = $this->users->index(null, false, null);
        $this->v['banner'] = $this->banner->index(null, false, null);

        $this->v['car'] = $this->car->filter_car($params, true, 5);

        $this->v['origin'] = $this->car->origin();
        $this->v['engine'] = $this->car->engine();
        $this->v['mileage'] = $this->car->mileage();

        return view('client.home', $this->v);
    }
}