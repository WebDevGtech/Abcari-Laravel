<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    public function productvariation(){

        return view('countryAdmin.Product.ProductVariation');
    }
}
