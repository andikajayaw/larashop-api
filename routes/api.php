<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Models\Book;
use App\Http\Resources\Book as BookResource;

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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user(); //1hsAoBXQtdm3bh5O5SAtaRKa0ROST5Uwc8d2QToRrom3Srrf8ixSw8X061GU
});


// Route::get('nama', function() {
//     return "Namaku Larashop API";
// });

// Route::post('umur', function() {
//     return "17";
// });

// Route::get('category/{id}', function($id) {
//     $categories = [
//         1 => 'Programming',
//         2 => 'Desain Grafis',
//         3 => 'Jaringan Komputer'
//     ];
//     $id = (int)$id;
//     if($id == 0) {
//         return "Silahkan pilih kategori";
//     } else {
//         return "Anda memilih kategori <b>".$categories[$id]."</b>";
//     }
// });

// Route::get('book/{id}', function() {
//     return 'buku';
// })->where('id', '[0-9]+');

// Route::get('author/{name}', function($name) {
//     return 'author';
// })->where('name', '[A-Za-z]+');

// Route::prefix('v1')->group(function () {
//     Route::get('books', function() {
//         // Match dengan v1/books
//     });

//     Route::get('categories', function() {

//     });
// });

// Route::get('buku/{judul}', [BookController::class, 'cetak']);

// Route::middleware('throttle:10,1')->group(function () {
//     Route::get('buku/{judul}', [BookController::class, 'cetak']);
// });

// Route::middleware(['cors'])->group(function () {
//     Route::get('buku/{judul}', [BookController::class, 'cetak']);
// });

Route::prefix('v1')->group(function () {
    // Route::get('books', [BookController::class, 'index']);
    // Route::get('book/{id}', [BookController::class, 'view'])->where('id', '[0-9]+');
    Route::apiResources([
        'categories' => CategoryController::class,
        'books' => BookController::class,
    ]);
    Route::post('login', [AuthController::class, 'login']);

    // tambahkan sekalian untuk register dan logout :
    Route::post('register', [AuthController::class, 'register']);
    // Route::post('logout', [AuthController::class, 'logout']);

    //private logout
    Route::middleware('auth:api')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

// Route::apiResources([
//     'categories' => CategoryController::class,
//     'books' => BookController::class,
// ]);
// Route::get('/book', function() {
//     return new BookResource(Book::find(1));
// });
