<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenController extends Controller
{
    // In your AuthController or equivalent
public function loginByPincode(Request $request)
{
    $token = $request->get('token');

    $pincode = $request->get('pincode');

    $user = User::where('remember_token', $token)->first();

    if (!$user) {
        return response()->json(['error' => 'Invalid token'], 401);
    }

    if ($user->pincode === $pincode ) {
            $resp['success'] = true;
            $resp['token'] = $user->remember_token;
            $resp['message'] = 'Logged in successfully';
            $resp['user'] =$user;
            return response()->json($resp,200);
    }else{
        $resp['success'] = false;
        $resp['message'] = 'login failed, please verify your pincode';
        
        return response()->json($resp,201);
    }


    

  
}


public function login(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    $user = User::where('email', $email)->first();

   

    if (!$user) {
        return response()->json(['error' => 'Invalid email'], 401);
    }

    if (!Hash::check($password, $user->password)) {
        return response()->json(['error' => 'Invalid password'], 401);
    }

   $login = Auth::attempt(['email' => $email, 'password' => $password]);

    $resp['success'] = $login;
    $resp['token'] = $user->remember_token;
    $resp['message'] = 'Logged in successfully';
    $resp['user'] =$user;

    return response()->json($resp,200);


    
}


}
