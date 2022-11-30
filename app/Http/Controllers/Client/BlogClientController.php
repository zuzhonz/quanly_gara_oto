<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CarAlbum;
use App\Models\CarBranch;
use App\Models\carColor;
use App\Models\Cars;
use App\Models\User;
use Illuminate\Http\Request;

class BlogClientController extends Controller
{
    protected $v, $carBranch, $car, $album, $car_color, $blogs, $users;

    public function __construct()
    {
        $this->v = [];
        $this->carBranch = new CarBranch();
        $this->album = new CarAlbum();
        $this->car = new Cars();
        $this->car_color = new carColor();
        $this->blogs = new Blog();
        $this->users = new User();
    }

    public function index()
    {
        $this->v['listCarBranch'] = $this->carBranch->index(null, false, null);
        $this->v['car'] = $this->car->index(null, false, null);
        $this->v['blogs'] = $this->blogs->index(null, false, null);
        $this->v['users'] = $this->users->index(null, false, null);

        // dd($this->v['car']);
        $this->v['album'] = $this->album->index(null, false, null);

        $this->v['origin'] = $this->car->origin();
        $this->v['engine'] = $this->car->engine();
        $this->v['mileage'] = $this->car->mileage();

        return view('client.blogs.blogs', $this->v);
    }

    public function list()
    {
        $this->v['listCarBranch'] = $this->carBranch->index(null, false, null);
        $this->v['car'] = $this->car->index(null, false, null);
        $this->v['blogs'] = $this->blogs->index(null, true, 5);
        $this->v['users'] = $this->users->index(null, false, null);
        $this->v['origin'] = $this->car->origin();
        $this->v['engine'] = $this->car->engine();
        $this->v['mileage'] = $this->car->mileage();

        $this->v['album'] = $this->album->index(null, false, null);

        $this->v['car_color'] = $this->car_color->index(null, false, null);

        return view('client.products.blogs', $this->v);
    }

    public function detail($id)
    {
        $this->v['listCarBranch'] = $this->carBranch->index(null, false, null);
        $this->v['car'] = $this->car->index(null, false, null);
        $this->v['blogs'] = $this->blogs->index(null, false, null);
        $this->v['users'] = $this->users->index(null, false, null);
        $this->v['detail_blog'] = $this->blogs->show($id);


        // dd($this->v['detail_blog']);

        $this->v['album'] = $this->album->index(null, false, null);
        $this->v['origin'] = $this->car->origin();
        $this->v['engine'] = $this->car->engine();
        $this->v['mileage'] = $this->car->mileage();

        return view('client.blogs.blogs_detail', $this->v);
    }
}