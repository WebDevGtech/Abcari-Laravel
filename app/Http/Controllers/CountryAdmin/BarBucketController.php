<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarBucketController extends Controller
{
    public function barbucket(){
        return view('countryAdmin.BarSettings.BarBucket');
    }
}
