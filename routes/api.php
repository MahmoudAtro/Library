<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthFlutter;

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


Route::post('/login' , [AuthFlutter::class , 'login']);

Route::post('/register' , [AuthFlutter::class , 'register']);

Route::post('/logout' , [AuthFlutter::class , 'logout']);

Route::get('/book' , [AuthFlutter::class , "AllBook"]);

Route::get("/categorie" , [AuthFlutter::class , "AllCat"]);

Route::get('/img/{url}' , [AuthFlutter::class , "showImg"]);
