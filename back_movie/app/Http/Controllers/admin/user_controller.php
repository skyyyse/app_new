<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class user_controller extends Controller
{
    public function index()
    {
        $users = User::all();
        $province = province::all();
        return view('admins.page.users.index', compact('users', 'province'));
    }
    public function create()
    {
        $province = province::all();
        return view('admins.page.users.create', compact('province'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'gender' => 'required',
            'position' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'fileInput' => 'required',
            "province" => "required",
            "district" => "required",
            "commune" => "required",
            "village" => "required",
            'address' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);
        if ($request->password != $request->confirm_password) {
            return redirect()->route('admin.user.create')->with('sucess', 'can not create user');
        } else {
            $imageName = Str::random(40) . '.' . $request->fileInput->getClientOriginalExtension();
            $request->fileInput->move(public_path('file/user/image'), $imageName);
            $user = User::create([
                'name' => $request->username,
                'gender' => $request->gender,
                'role' => $request->position,
                'phone' => $request->phone,
                'email' => $request->email,
                'image' => $imageName,
                'address' => $request->address,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('admin.user.index')->with('sucess', 'create user sucessfull');
        }
    }
    public function delete(Request $request)
    {
        $users = User::find($request->id);
        $imagePath = public_path('file/user/image') . '/' . $users->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
            if ($users->delete()) {
                return redirect()->route("admin.user.index")->with("sucess", "Delete employee sucessfully...");
            }
        }
    }
    public function update(Request  $request)
    {
        // dd($request->all());
        $user = User::find($request->user_id);
        echo $request->user_id;
        if ($user->image == null) {
            if ($request->hasFile('fileInput')) {
                $imageName = Str::random(20) . '.' . $request->fileInput->getClientOriginalExtension();
                $request->fileInput->move(public_path('file/user/image'), $imageName);
                $user->name = $request->username;
                $user->gender = $request->gender;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->image = $imageName;
                $user->role = $request->position;
                $user->email = $request->email;
                if ($user->update()) {
                    return redirect()->route('admin.user.index')->with('sucess', 'Update slider sucessfully');
                }
            }else{
                $user->name = $request->username;
                $user->gender = $request->gender;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->role = $request->position;
                $user->email = $request->email;
                if ($user->update()) {
                    return redirect()->route('admin.user.index')->with('sucess', 'Update slider sucessfully');
                }
            }
        } else {
            $user->name = $request->username;
            $user->gender = $request->gender;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->role = $request->position;
            $user->email = $request->email;
            if ($user->update()) {
                return redirect()->route('admin.user.index')->with('sucess', 'Update slider sucessfully');
            }
        }
    }
}
