<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\movie;
use Illuminate\Http\Request;

class movie_controller extends Controller
{
    public function index(){
        // $movie=movie::select('movie.*',"category.category_title")->join('category','category.id','movie.movie_type')->get();
        $movie=movie::with('favorite')->get();
        return response()->json([
            'movie'=>$movie,
            'status'=>true,
        ]);
    }
    public function movie_id(Request $request){
        $movie=movie::select('movie.*',"category.category_title")->join('category','category.id','movie.movie_type')->where('movie.movie_type',$request->id)->get();
        return response()->json([
            'movie'=>$movie,
            'status'=>true,
        ]);
    }
}
