<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RegisterController extends Controller
{

  

    public function register(Request $request)

    {
    
        $request->validate([
    
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'pincode' => 'required|string|min:4|max:6', // Adjust validation as needed
    
        ]);
    
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Ensure password is hashed
            'pincode' => $request->input('pincode'), // Ensure pincode is hashed
            'email_verified_at' => now(),
            'remember_token' => Str::random(10), // Generate a secure token
        ]);
    
    
        return response()->json(['message' => 'User  registered successfully'], 201);
    
    }

}
