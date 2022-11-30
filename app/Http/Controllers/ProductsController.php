<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //list 
    public function index()
    {
        return view('backend.pages.products.list');
    }
}
