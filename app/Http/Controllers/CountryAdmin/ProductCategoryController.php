<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function category(){
        return view('countryAdmin.Product.ProductCategory');
    }

    public function brand(){
        return view('countryAdmin.Product.brand');
    }
}
