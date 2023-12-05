<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarBucketSuperAdminController extends Controller
{
    public function barbucket(){
        return view('superAdmin.BarSettings.BarBucket');
    }
}
