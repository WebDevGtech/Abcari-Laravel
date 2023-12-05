<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminProductSubCategoryController extends Controller
{
    public function addsubcategory(){
        return view('superAdmin.Product.ProductSubCategory');
    }
}
