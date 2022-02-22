<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTagController;
use App\Http\Controllers\TagController;
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

Route::prefix('/products')->group(function () {
    Route::post('/', [ProductController::class, 'create'])->name('createProduct');

    Route::post('/{id}/tags', [ProductTagController::class, 'addTagToProduct'])->name('addTagToProduct');
    Route::get('/{id}/tags', [ProductTagController::class, 'getTagsByProduct'])->name('getTagsByProduct');
    Route::delete('/{id}/tags', [ProductTagController::class, 'removeTagFromProduct'])->name('removeTagFromProduct');

    Route::get('/', [ProductController::class, 'getAll'])->name('getProducts');
    Route::get('/filter', [ProductController::class, 'getAllByField'])->name('getProductsByByField');
    
    Route::get('/{id}', [ProductController::class, 'get'])->name('getProductById');

    Route::patch('/{id}', [ProductController::class, 'update'])->name('updateProduct');

    Route::delete('/{id}', [ProductController::class, 'delete'])->name('deleteProducts');
});

Route::prefix('/tags')->group(function () {
    Route::post('/', [TagController::class, 'create'])->name('createTag');

    Route::get('/', [TagController::class, 'getAll'])->name('getTags');
    
    Route::get('/{id}', [TagController::class, 'get'])->name('getTagById');
    Route::get('/{id}/products', [ProductTagController::class, 'getProductsByTag'])->name('getTagsByProduct');
    
    Route::patch('/{id}', [TagController::class, 'update'])->name('updateTag');

    Route::delete('/{id}', [TagController::class, 'delete'])->name('deleteTags');
});