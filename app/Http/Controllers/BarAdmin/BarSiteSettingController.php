<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class  BarSiteSettingController extends Controller
{
    //

    public function sitesetting()
    {
        return view('barAdmin.site-setting');
    }
}
