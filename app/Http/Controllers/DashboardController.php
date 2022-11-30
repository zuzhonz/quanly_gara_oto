<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Booking;
use App\Models\Cars;
use App\Models\Employees;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $v, $car, $employees, $blogs, $booking;

    public function __construct()
    {
        $this->v = [];
        $this->car = new Cars();
        $this->employees = new Employees();
        $this->blogs = new Blog();
        $this->booking = new Booking();
    }

    public function index(){
        $this->v['cars_total'] = $this->car->count();
        $this->v['employees_total'] = $this->employees->count();
        $this->v['blogs_total'] = $this->blogs->count();
        $this->v['booking_total'] = $this->booking->count();
        return view('backend/dashboard/index', $this->v);
    }
}
