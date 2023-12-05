<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewBarRestaurantController extends Controller
{
    public function viewbarrestaurant(){
        return view('countryAdmin.BarRestaurant.ViewBarRestaurant');
    }
}
