<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductSubCategoryController extends Controller
{
    public function subcategory(){
        return view('countryAdmin.Product.ProductSubCategory');
    }
}
