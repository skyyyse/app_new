<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class auth_controller extends Controller
{
    public function register(Request $request){
        $validate=validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required',
        ]);
        if($validate->fails()){
            return response()->json([
                'create'=>false,
                "message" => $validate->errors()->all(),
            ]);
        }else{
            $user=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password' => Hash::make($request->password),
            ]);
            return response()->json([
                'data'=>$user,
                'token' => $user->createToken('secret')->plainTextToken
            ]);
        }
    }
    public function login(Request $request)
    {
        $attrs = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if (!Auth::attempt($attrs)) {
            return response([
                'message' => 'Invalid Credentials.'
            ], 403);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        return response([
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ], 200);
    }
}
