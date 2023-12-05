<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarCategorySuperAdminController extends Controller
{
    public function category(){
        return view('superAdmin.BarSettings.BarCategory');
    }
}
