<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarWaiterDetailsController extends Controller
{
    public function barwaiter(){
        return view('countryAdmin/BarSettings/BarWaiterDetails');
    }
}
