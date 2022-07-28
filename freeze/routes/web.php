<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FlavourController;
use App\Http\Controllers\ToppingController;



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

/* Flavour */
Route::get('/flavour',[FlavourController::class, 'index']);
Route::get('/add_flavour',[FlavourController::class, 'add_flavour']);
Route::post('/save_flavour',[FlavourController::class, 'store_flavour']);
Route::get('/active_flavour/{id}',[FlavourController::class, 'active_flavour']);
Route::get('/inactive_flavour/{id}',[FlavourController::class, 'inactive_flavour']);
Route::get('/delete_flavour/{id}',[FlavourController::class, 'delete_flavour']);

/* Toppings */
Route::get('/topping',[ToppingController::class, 'index']);
Route::get('/add_topping',[ToppingController::class, 'add_topping']);
Route::post('/save_topping',[ToppingController::class, 'store_topping']);
Route::get('/active_topping/{id}',[ToppingController::class, 'active_topping']);
Route::get('/inactive_topping/{id}',[ToppingController::class, 'inactive_topping']);
Route::get('/delete_topping/{id}',[ToppingController::class, 'delete_topping']);
