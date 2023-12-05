<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    //
    public function index()
    {
        return view('superAdmin.settings.rule');
    }
}
