<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController 
{
    public function index(){
        return view('welcome');
    }

   
    public function login(Request $request){
        $rules = [ 
            'email'      => 'required|email',
            'password'   => 'required',
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'code' => 400,
                'message' => $validator->errors()->first(),
                'status' => 'error',
            ], 400);
        }

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard')->with('status', 'Login successful.');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password.')->withInput();
        }
    }
}
