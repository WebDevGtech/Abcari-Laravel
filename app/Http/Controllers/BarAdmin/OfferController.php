<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    //
    
    public function offer()
    {
        return view('barAdmin.offer');
    }

    public function combo()
    {
        return view('barAdmin.combo');
    }

    public function coupon()
    {
        return view('barAdmin.coupon');
    }

    public function banner()
    {
        return view('barAdmin.banner');
    }
}
