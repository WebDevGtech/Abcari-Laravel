<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryTaxTypeController extends Controller
{
    //
    public function taxtype()
    {
        return view('countryAdmin.Settings.tax-type');
    }
}
