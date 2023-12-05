<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminProductCategoryController extends Controller
{
    public function addcategory(){
        return view('superAdmin.Product.ProductCategory');
    }
}
