<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class movie_controller extends Controller
{
    
    public function index(){
        $category=category::all();
        $movie=movie::select('movie.*','users.name','category.category_title')->join('users','users.id','movie.create_by')->join('category','category.id','movie.movie_type')->get();
        return view('admins.page.movie.index',compact('movie','category'));
    }
    public function create(){
        $category=category::all();
        return view('admins.page.movie.create',compact('category'));
    }
    public function store(Request $request){
        // $admin = Auth::user();
        // echo $admin->id;
        $request->validate([
            "movie_title"=>"required",
            "movie_subtitle"=>"required",
            "movie_description"=>"required",
            "movie_type"=>"required",
            "movie_active"=>"required",
            "fileInput"=>"required",
            "file_mp4"=>"required",
        ]);
        $admin = Auth::user();
        $imageName = Str::random(40) . '.' . $request->fileInput->getClientOriginalExtension();
        $mp4Name = Str::random(40) . '.' . $request->file_mp4->getClientOriginalExtension();
        $request->fileInput->move(public_path('file/movie/image'), $imageName);
        $request->file_mp4->move(public_path('file/movie/mp4'), $mp4Name);
        $movie=movie::create([
            "movie_title"=>$request->movie_title,
            "movie_subtitle"=>$request->movie_subtitle,
            "movie_description"=>$request->movie_description,
            "movie_type"=>$request->movie_type,
            "movie_active"=>$request->movie_active,
            "movie_image"=>$imageName,
            "movie_mp4"=>$mp4Name,
            "create_by"=>$admin->id,
        ]);
        if($movie){
            return redirect()->route('admin.movie.index')->with('sucess','Create movie sucessfully');
        }
    }
    public function delete(Request $request){
        $movie=movie::find($request->movie_id);
        $imagePath = public_path('file/movie/image') . '/' . $movie->movie_image;
        $mp4Path = public_path('file/movie/mp4') . '/' . $movie->movie_mp4;
        if (file_exists($imagePath)||file_exists($mp4Path)) {
            unlink($imagePath);
            unlink($mp4Path);
            if ($movie->delete()) {
                return redirect()->route('admin.movie.index')->with('sucess','Delete slider sucessfully');
            }
        }
    }
    public function update(Request $request){
        $admin = Auth::guard('admin')->user();
        $movie=movie::find($request->id);
        if ($request->hasFile('fileInput')||$request->hasFile('file_mp4')) {
            $imagePath = public_path('file/movie/image') . '/' . $movie->movie_image;
            $mp4Path = public_path('file/movie/mp4') . '/' . $movie->movie_mp4;
            if ($$request->file('fileInput')->isValid()||$$request->file('file_mp4')->isValid()) {
                if (file_exists($imagePath)||file_exists($mp4Path)) {
                    unlink($imagePath);unlink($mp4Path);
                    $image = $request->fileInput;
                    $mp4 = $request->file_mp4;
                    $imageName = Str::random(20) .'.'. $image->getClientOriginalExtension();
                    $mp4Name = Str::random(20) . '.' . $mp4->getClientOriginalExtension();
                    $image->move(public_path('file/movie/image'), $imageName);
                    $mp4->move(public_path('file/movie/mp4'), $mp4Name);
                    $movie->movie_title=$request->movie_title;
                    $movie->movie_subtitle=$request->movie_subtitle;
                    $movie->movie_description=$request->movie_description;
                    $movie->movie_type=$request->movie_type;
                    $movie->movie_active=$request->movie_active;
                    $movie->movie_image=$imageName;
                    $movie->movie_mp4=$mp4Name;
                    $movie->users_id=$admin->id;
                    if($movie->update()){
                        return redirect()->route('admin.movie.index')->with('sucess','Update slider sucessfully');
                    }
                }
            }
        } else {
            $movie->movie_title=$request->movie_title;
            $movie->movie_subtitle=$request->movie_subtitle;
            $movie->movie_description=$request->movie_description;
            $movie->movie_type=$request->movie_type;
            $movie->movie_active=$request->movie_active;
            $movie->users_id=$admin->id;
            if($movie->update()){
                return redirect()->route('admin.movie.index')->with('sucess','Update slider sucessfully');
            }
        }
    }
}
