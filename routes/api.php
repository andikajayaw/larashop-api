<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('nama', function() {
    return "Namaku Larashop API";
});

Route::post('umur', function() {
    return "17";
});

Route::get('category/{id}', function($id) {
    $categories = [
        1 => 'Programming',
        2 => 'Desain Grafis',
        3 => 'Jaringan Komputer'
    ];
    $id = (int)$id;
    if($id == 0) {
        return "Silahkan pilih kategori";
    } else {
        return "Anda memilih kategori <b>".$categories[$id]."</b>";
    }
});

Route::get('book/{id}', function() {
    return 'buku';
})->where('id', '[0-9]+');

Route::get('author/{name}', function($name) {
    return 'author';
})->where('name', '[A-Za-z]+');