<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarCategoryController extends Controller
{
    public function barcategory(){

          return view('countryAdmin.BarSettings.BarCategory');
    }
}
