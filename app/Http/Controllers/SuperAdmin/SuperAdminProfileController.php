<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminProfileController extends Controller
{
public function index()
{
    return view('superAdmin.super-admin-profile.super-admin-profile');
}
}
