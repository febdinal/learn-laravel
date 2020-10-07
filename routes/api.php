<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BlogController;

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


Route::get('/blog/sampah', [BlogController::class, 'sampah'])
->name('blog.sampah');
Route::put('/blog/restore/{id}', [BlogController::class, 'restore'])
->name('blog.restore');
Route::delete('/blog/deletepermanent/{id}', [BlogController::class, 'deletepermanent'])
->name('blog.deletepermanent');

Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
});
Route::apiResource('/blog', BlogController::class);