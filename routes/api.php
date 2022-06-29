<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Models\Book;
use App\Http\Resources\Book as BookResource;
use App\Http\Resources\Category;

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
//     return $request->user();
// });
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user(); //1hsAoBXQtdm3bh5O5SAtaRKa0ROST5Uwc8d2QToRrom3Srrf8ixSw8X061GU
// });

Route::prefix('v1')->group(function () {

    Route::post('login', [AuthController::class, 'login']);

    // tambahkan sekalian untuk register dan logout :
    Route::post('register', [AuthController::class, 'register']);
    // Route::post('logout', [AuthController::class, 'logout']);

    Route::get('categories/random/{count}', [CategoryController::class, 'random']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/slug/{slug}', [CategoryController::class, 'slug']);


    Route::get('books/top/{count}', [BookController::class, 'top']);
    Route::get('books', [BookController::class, 'index']);
    Route::get('books/slug/{slug}', [BookController::class, 'slug']);
    Route::get('books/search/{keyword}', [BookController::class, 'search']);

    //private logout
    Route::middleware('auth:api')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
    });
});
