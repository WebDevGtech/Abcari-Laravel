<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddAdminController extends Controller
{
    public function addadmin(){
        return view('superAdmin.admin.AddAdmin');
    }
}
