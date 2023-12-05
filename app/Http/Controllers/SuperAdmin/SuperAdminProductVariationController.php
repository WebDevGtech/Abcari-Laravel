<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminProductVariationController extends Controller
{
    public function addproductvariation(){
        return view('superAdmin.Product.ProductVariation');
    }
}
