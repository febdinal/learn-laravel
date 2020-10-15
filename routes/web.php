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

Auth::routes();

/*
|---------------------------------------------------------
| Blog
|---------------------------------------------------------
*/
Route::put('/blog/restore/{id}', [BlogController::class, 'restore'])
    ->name('blog.restore');
Route::delete('/blog/force-delete/{id}', [BlogController::class, 'forceDelete'])
    ->name('blog.force-delete');
Route::get('/blog/trash', [BlogController::class, 'trash'])
    ->name('blog.trash');
    
Route::resource('/blog/category', BlogCategoryController::class);
Route::resource('/blog', BlogController::class);

Route::get('/home', function () {
    return view('dashboard');
});