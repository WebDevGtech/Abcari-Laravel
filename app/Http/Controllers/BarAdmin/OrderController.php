<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function order()
{
    return view('barAdmin.order');
}
public function prepare_order()
{
    return view('barAdmin.prepare-order');
}
public function ready_to_serve()
{
    return view('barAdmin.ready-to-serve-order');
}
public function served_order()
{
    return view('barAdmin.served-order');
}
public function cancel_order()
{
    return view('barAdmin.cancel-order');
}
}
