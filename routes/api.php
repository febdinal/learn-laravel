<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\BlogCategoryController;

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



/*
|---------------------------------------------------------
| Blog
|---------------------------------------------------------
*/
Route::get('/blog/trash', [BlogController::class, 'trash'])
    ->name('blog.trash');
Route::put('/blog/restore/{id}', [BlogController::class, 'restore'])
    ->name('blog.restore');
Route::delete('/blog/force-delete/{id}', [BlogController::class, 'forceDelete'])
    ->name('blog.force-delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/blog/category', BlogCategoryController::class);
Route::apiResource('/blog', BlogController::class);