<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function transaction()
    {
        return view('barAdmin.transaction');
    }
}
