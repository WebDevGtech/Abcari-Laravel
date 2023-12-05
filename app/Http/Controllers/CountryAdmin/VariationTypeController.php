<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VariationTypeController extends Controller
{
    public function variation(){
        return view('countryAdmin.Product.VariationType');
    }
}
