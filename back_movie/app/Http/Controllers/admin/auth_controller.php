<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class auth_controller extends Controller
{
    public function page_login(){
        return view('admins.auth.page_login');
    }
    public function page_register(){
        return view('admins.auth.page_register');
    }
    public function register(Request $request){
        $request->validate([
            'username'=>'required|string',
            "email" => "required|unique:users",
            'password'=>'required',
        ]);
        $user=User::create([
            'name'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        if($user){
            return redirect()->route('admin.auth.page.login');
        }
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 1) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.auth.login');
            }
        } else {
            return redirect()->route('admin.auth.login');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.auth.login');
    }
}
