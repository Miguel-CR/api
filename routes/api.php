<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
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

//http://127.0.0.1:8000/api/Home/producto

        //-------------------------------------------------------------------


Route::group(['prefix' => 'Home'], function () {
    Route::group(['prefix' => 'producto'], function () {
        //Rutas de categoria
        Route::group([
            'prefix' => 'categoria'
        ], function ($router) {
            Route::get('', [CategoriaController::class, 'index']);
            Route::get('/{id}', [CategoriaController::class, 'show']);
        });

    // Rutas de Producto
        Route::get('', [ProductoController::class, 'index']);
        Route::get('show/{id}', [ProductoController::class, 'show']);
        Route::get('indexCategoria/{id}', [ProductoController::class, 'getProductosByCategoria']);
        Route::post('create', [ProductoController::class, 'store']);
        Route::patch('update/{id}', [ProductoController::class, 'update']);
        Route::post('delete/{id}', [ProductoController::class, 'delete']);
    });
});


//    Route::group([
//             'prefix' => 'categoria'
//         ], function ($router) {
//             Route::get('', [CategoriaController::class, 'index']);
//             Route::get('/{id}', [CategoriaController::class, 'show']);
//         });

// Route::get('/categoria', [CategoriaController::class, 'index']);
// Route::get('/categoria/{id}', [CategoriaController::class,'show']);
