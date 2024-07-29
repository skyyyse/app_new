<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;

class slider_controller extends Controller
{
    public function index(){
        $slider=slider::all();
        return response()->json([
            'slider'=>$slider,
            'status'=>true,
        ]);
    }
}
