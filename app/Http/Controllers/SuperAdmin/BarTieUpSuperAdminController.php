<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarTieUpSuperAdminController extends Controller
{
    public  function tieup(){
        return view('superAdmin.BarSettings.barTieUp');
    }
}
