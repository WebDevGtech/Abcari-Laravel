<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RatingReviewController extends Controller
{
    //
    public function rating()
    {
        return view('barAdmin.rating-and-review');
    }
}
