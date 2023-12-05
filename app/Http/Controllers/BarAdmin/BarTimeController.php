<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;

class BarTimeController extends Controller
{


    public function happyhour()
    {
        return view('barAdmin.happy-hour');
    }

    public function peakhour()
     {
    return view('barAdmin.peak-hour');
     }

   


}
