<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarBucketPointSuperAdminController extends Controller
{
    public function bucketpoint(){
        return view('superAdmin.BarSettings.BarBucketPoint');
    }
}
