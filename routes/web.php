<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
$p = "App\Http\Controllers";

/*
*   Home page route
*/
Route::get('/', "App\Http\Controllers\ProductController@homePage")->name("home");


/*
*   Product prefix
*/
Route::prefix("/product")->name("product.")->group(function () {
    /*
    *   Creating and storing products
    */
    Route::get('/create', "App\Http\Controllers\ProductController@productCreate")->name("create");
    Route::post("/create", "App\Http\Controllers\ProductController@productStore")->name("store");


    /*
    *   Editing and updating products
    */
    Route::get("/edit/{id}", "App\Http\Controllers\ProductController@productEdit")->name("edit");
    Route::post("/edit/{id}", "App\Http\Controllers\ProductController@productUpdate")->name("update");

    /*
    *   Delete product route
    */
    Route::get("/delete/{id}", "App\Http\Controllers\ProductController@deleteProduct")->name("delete");
});

