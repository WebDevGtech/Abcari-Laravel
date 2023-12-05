<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarSettingController extends Controller
{
    //
    public function rule()
    {
        return view('barAdmin.rule');
    }

    public function waiterdetail()
    {
        return view('barAdmin.waiter-detail');
    }


    
}
