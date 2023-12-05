<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    //

    public function sitesetting()
    {
        return view('superAdmin.SiteSetting.site-setting');
    }
}
