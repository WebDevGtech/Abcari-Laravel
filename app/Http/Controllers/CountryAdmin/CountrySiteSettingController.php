<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class  CountrySiteSettingController extends Controller
{
    //

    public function sitesetting()
    {
        return view('countryAdmin.SiteSetting.site-setting');
    }
}
