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
Route::get('/', [ProductController::class => "homePage"])->name("home");


/*
*   Product prefix
*/
Route::prefix("/product")->name("product.")->group(function () {
    /*
    *   Creating and storing products
    */
    Route::get('/create', [ProductController::class => "productCreate"])->name("create");
    Route::post("/create", [ProductController::class => "productStore"])->name("store");


    /*
    *   Editing and updating products
    */
    Route::get("/edit/{id}", [ProductController::class => "productEdit"])->name("edit");
    Route::post("/edit/{id}", [ProductController::class => "productUpdate"])->name("update");

    /*
    *   Delete product route
    */
    Route::get("/delete/{id}", [ProductController::class => "deleteProduct"])->name("delete");
});

