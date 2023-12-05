<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarBucketPointController extends Controller
{
    public function barbucketpoint(){
       return view('countryAdmin.BarSettings.BarBucketPoint');
    }
}
