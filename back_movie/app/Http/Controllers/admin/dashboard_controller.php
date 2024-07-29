<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class dashboard_controller extends Controller
{
    public function dashboard(){
        $admin = Auth::user();
        $user=User::count();
        return view('admins.dashboard',compact('admin','user'));
    }
}
