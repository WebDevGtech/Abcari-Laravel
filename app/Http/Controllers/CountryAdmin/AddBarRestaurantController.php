<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddBarRestaurantController extends Controller
{
   
     public function addbarrestaurant(){

        return view ('countryAdmin.BarRestaurant.AddBarRestaurant');
    }
    public function editbarrestaurant(){

        return view ('countryAdmin.BarRestaurant.EditBarRestaurant');
    }
}
