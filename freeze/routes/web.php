<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
/**********           frontend            *********/
Route::get('/',[IndexController::class, 'index']);


/**********           Backend            *********/
Route::get('/admin',[AdminController::class, 'index']);
Route::get('/admin_signup',[AdminController::class, 'signup']);
Route::post('/admin_register',[AdminController::class, 'admin_register']);
Route::post('/admin_login',[AdminController::class, 'admin_login']);
Route::get('/dashboard',[AdminController::class, 'dashboard']);

/* Category */
Route::get('/category',[CategoryController::class, 'index']);
Route::get('/add_category',[CategoryController::class, 'add_category']);
Route::post('/save_category',[CategoryController::class, 'store_category']);
Route::get('/active_category/{id}',[CategoryController::class, 'active_category']);
Route::get('/inactive_category/{id}',[CategoryController::class, 'inactive_category']);
Route::get('/delete_category/{id}',[CategoryController::class, 'delete_category']);
