<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class user_controller extends Controller
{
    public function index(){
        $user=User::all();
        return response()->json([
            'data'=>$user,
            "status"=>true,
        ]);
    }
}
