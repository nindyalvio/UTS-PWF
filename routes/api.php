<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
// });

Route::get('/products',[ProductController::class,'show']);
//Buat route untuk menambahkan data product
Route::post('/product',[ProductController::class,'store']);
//Buat route untuk mengupdate data product
Route::put('/product/{id}',[ProductController::class,'update']);
//Buat route untuk menghapus data product
Route::delete('/product/{id}',[ProductController::class,'destroy']);
