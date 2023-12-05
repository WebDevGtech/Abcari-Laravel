<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;

class DashBoardController extends Controller
{

    public function index()
    {
        return view('barAdmin/dashboard');
    }
    public function changePassword()
    {
        for($i=1;$i<=23;$i++)
        {
            $password=AdminUser::where('id',$i)->first();
            $password->password=bcrypt('password');
            $password->save();
        }
    }
}
