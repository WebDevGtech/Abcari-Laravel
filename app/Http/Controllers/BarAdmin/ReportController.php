<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function totalsale()
    {
        return view('barAdmin.total-sale');
    }

    public function brand()
    {
        return view('barAdmin.brand');
    }

    public function liquor()
    {
        return view('barAdmin.liquor');
    }

    public function food()
    {
        return view('barAdmin.food');
    }
}
