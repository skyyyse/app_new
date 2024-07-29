<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class category_controller extends Controller
{
    public function  index(){
        $category=category::with('movie')->get();
        return response()->json([
            'category'=>$category,
            'status'=>true,
        ]);
    }
}
