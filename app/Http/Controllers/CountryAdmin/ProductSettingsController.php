<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductSettingsController extends Controller
{
    public function productsettings(){
        return view('countryAdmin.Product.ProductSettings');
    }
}
