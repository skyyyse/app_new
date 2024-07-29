<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\commune;
use App\Models\district;
use App\Models\movie;
use App\Models\slider;
use App\Models\User;
use App\Models\village;
use Illuminate\Http\Request;

class script_controller extends Controller
{
    public function district(Request $request)
    {
        $district = district::WHERE("province_id", $request->id)->GET();
        return response()->json([
            'status' => 200,
            'district' => $district,
        ]);
    }
    public function commune(Request $request)
    {
        $commune = commune::WHERE("district_id", $request->id)->GET();
        return response()->json([
            'status' => 200,
            'commune' => $commune,
        ]);
    }
    public function village(Request $request)
    {
        $village = village::WHERE("commune_id", $request->id)->GET();
        return response()->json([
            'status' => 200,
            'village' => $village,
        ]);
    }
    public function category(Request $request)
    {
        $category = category::where("id", $request->id)->GET();
        return response()->json([
            'status' => 200,
            'category' => $category,
        ]);
    }
    public function users(Request $request)
    {
        $users = User::where('id',$request->id)->get();
        return response()->json([
            'status' => 200,
            'users' => $users,
        ]);
    }
    public function slider(Request $request){
        $slider=slider::where("id",$request->id)->GET();
        return response()->json([
            'status' => 200,
            'slider' => $slider,
        ]);
    }
    Public function movie(Request $request){
        $movie=movie::select('movie.*','users.name','category.category_title')->join('users','users.id','movie.create_by')->join('category','category.id','movie.movie_type')->get();
        return response()->json([
            'status' => 200,
            'movie' => $movie,
        ]);
    }
}
