<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

public function addproduct()
{
    return view('barAdmin.add-product');
}


public function viewproduct()
{
    return view('barAdmin.view-product');
}


}
