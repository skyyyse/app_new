<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\like_model;
use App\Models\post_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class like_controller extends Controller
{
    public function like(Request $request){
        $post=post_model::find($request->id);
        if(!$post){
            return response()->json([
                'message'=>'not fount',
                'srtatus'=>true,
            ]);
        }else{
            $like=$post->like()->where('user_id',Auth()->user()->id)->first();
            if(!$like){
                like_model::create([
                    'post_id'=>$request->id,
                    'user_id'=>Auth()->user()->id,
                ]);
                return response()->json([
                    'message'=>'Like sucessfull',
                    'srtatus'=>true,
                ]);
            }else{
                $like->delete();
                return response()->json([
                    'message'=>'unLike sucessfull',
                    'srtatus'=>true,
                ]);
            }
        }
    }
}
