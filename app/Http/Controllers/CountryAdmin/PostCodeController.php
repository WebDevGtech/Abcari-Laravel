<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostCodeController extends Controller
{
    public function postcode(){
        return view('countryAdmin.Places.PostCode');
    }
}
