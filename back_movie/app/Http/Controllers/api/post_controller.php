<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\post_model;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class post_controller extends Controller
{
    public function index(Request $request)
    {
        $post = post_model::orderBy('created_at', 'desc')->with('user:id,name,image')->withCount('Comment','like')
        ->with('like', function ($like) {
            return $like->where('user_id', auth()->user()->id)
                ->select('id', 'user_id', 'post_id')->get();
        })
        ->with('favorite', function ($favorite) {
            return $favorite->where('user_id',Auth()->user()->id)
                ->select('id', 'user_id', 'post_id')->get();
        })->get();
        return response()->json([
            'post' => $post,
            'status' => true,
        ]);
    }
}
