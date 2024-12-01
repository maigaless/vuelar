<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthenController;





// ------ Route to Register------------
Route::post('/register', [RegisterController::class, 'register']);

//---------Route to login ------------
Route::post('/login', [AuthenController::class, 'login']);

//----------Route Login by pincode ----------------
Route::post('/loginpincode', [AuthenController::class, 'loginByPincode']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
