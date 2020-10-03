<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::put('/blog/restore/{id}', [BlogController::class, 'restore'])
        ->name('blog.restore');
Route::delete('/blog/permanentdelete/{id}', [BlogController::class, 'permanentdelete'])
        ->name('blog.permanentdelete');
Route::get('/blog/sampah', [BlogController::class, 'sampah'])
        ->name('blog.sampah');
Route::resource('/blog', BlogController::class);
Route::resource('/blogcategory', BlogCategoryController::class);