<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
class category_controller extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view("admins.page.category.index", compact("categories"));
    }
    public function create()
    {
        return view("admins.page.category.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "active" => "required",
            "fileInput" => "required",
        ]);
        if ($request->hasFile('fileInput')) {
            $file = $request->file('fileInput');
            if ($file->isValid()) {
                $imageName = Str::random(40) . '.' . $request->fileInput->getClientOriginalExtension();
                $request->fileInput->move(public_path('file/category/image'), $imageName);
                $category = new Category();
                $category->Category_Title = $request->title;
                $category->Category_active = $request->active;
                $category->Category_image = $imageName;
                $category->save();
                if ($category) {
                    return redirect()->route("admin.category.index")->with("sucess", "can not Create Category sucessfully....");
                }
            }
        }
    }
    public function delete(Request $request){
        $category = category::find($request->id);
        $imagePath = public_path('file/category/image') . '/' . $category->category_image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
            if ($category->delete()) {
                return redirect()->route('admin.category.index')->with('sucess', 'Delete slider sucessfully');
            }
        }
    }
    public function update(Request $request)
    {
        $category = category::find($request->category_id);
        $imagePath = public_path('file/category/image') . '/' . $category->category_image;
        if ($request->hasFile('fileInput')) {
            $file = $request->file('fileInput');
            if ($file->isValid()) {
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                    $imageName = Str::random(40) . '.' . $request->fileInput->getClientOriginalExtension();
                    $request->fileInput->move(public_path('file/category/image'), $imageName);
                    $slider = category::where('id', $request->slider_id)->update([
                        'category_title' => $request->title,
                        'category_active' => $request->active,
                        'category_image' => $imageName
                    ]);
                    return redirect()->route('admins.slider.index')->with('sucess', 'Update slider sucessfully');
                }
            }
        } else {
            $category->category_title = $request->title;
            $category->category_active = $request->active;
            if ($category->save()) {
                return redirect()->route('admins.slider.index')->with('sucess', 'Update slider sucessfully');
            }
        }
    }
}
