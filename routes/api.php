<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;
use App\Mail\RecoverPassword;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/m', function (){ 
    return (new RecoverPassword("123"));
});

Route::get('/users/all', [user::class, 'allUsers']);
Route::get('/users/{id}', [user::class, 'users']);
Route::post('/users/login', [user::class, 'login']);
Route::post('/users/forgotpass', [user::class, 'forgotpass']);
Route::delete('/users/{id}',[user::class, 'delete']);
Route::post('/users/create',[user::class, 'create']);
Route::put('/update/{id}', [user::class, 'update']);