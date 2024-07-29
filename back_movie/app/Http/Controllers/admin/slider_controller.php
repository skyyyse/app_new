<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slider;
use Illuminate\Support\Str;

class slider_controller extends Controller
{
    public function index()
    {
        $slider = slider::all();
        return view('admins.page.slider.index', compact('slider'));
    }
    public function create()
    {
        return view('admins.page.slider.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "active" => "required",
            "fileInput" => "required",
        ]);
        $imageName = Str::random(40) . '.' . $request->fileInput->getClientOriginalExtension();
        $request->fileInput->move(public_path('file/slider/image'), $imageName);
        $slider = slider::create([
            'slider_title' => $request->title,
            'slider_active' => $request->active,
            'slider_image' => $imageName
        ]);
        if ($slider->save()) {
            return redirect()->route('admins.slider.index')->with('sucess', 'Create slider sucessfully');
        }
    }
    public function delete(Request $request)
    {
        $slider = slider::find($request->id);
        $imagePath = public_path('file/slider/image') . '/' . $slider->slider_image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
            if ($slider->delete()) {
                return redirect()->route('admins.slider.index')->with('sucess', 'Delete slider sucessfully');
            }
        }
    }
    public function update(Request $request)
    {
        $slider = slider::find($request->slider_id);
        $imagePath = public_path('file/slider/image') . '/' . $slider->slider_image;
        if ($request->hasFile('fileInput')) {
            $file = $request->file('fileInput');
            if ($file->isValid()) {
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                    $imageName = Str::random(40) . '.' . $request->fileInput->getClientOriginalExtension();
                    $request->fileInput->move(public_path('file/slider/image'), $imageName);
                    $slider = slider::where('id', $request->slider_id)->update([
                        'slider_title' => $request->title,
                        'slider_active' => $request->active,
                        'slider_image' => $imageName
                    ]);
                    return redirect()->route('admins.slider.index')->with('sucess', 'Update slider sucessfully');
                }
            }
        } else {
            $slider->slider_title = $request->title;
            $slider->slider_active = $request->active;
            if ($slider->save()) {
                return redirect()->route('admins.slider.index')->with('sucess', 'Update slider sucessfully');
            }
        }
    }
}
