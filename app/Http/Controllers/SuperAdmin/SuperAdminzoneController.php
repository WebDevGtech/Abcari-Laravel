<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminzoneController extends Controller
{
    public function zone(){
        return view ('superAdmin.Places.Zone');
    }
}
