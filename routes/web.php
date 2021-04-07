<?php

use App\Http\Controllers\CartController;
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


Route::get('/', [ProductController::class, "homePage"])->name("/");


Route::prefix("/product")->name("product.")->middleware("auth")->group(function () {

    Route::get('/create', [ProductController::class, "create"])->name("create");
    Route::post("/create", [ProductController::class, "store"])->name("store");

    Route::get("/edit/{product}", [ProductController::class, "edit"])->name("edit");
    Route::post("/edit/{product}", [ProductController::class, "update"])->name("update");

    Route::get("/delete/{product}", [ProductController::class, "delete"])->name("delete");

});

Route::prefix("/cart")->name("cart.")->middleware("auth")->group(function() {
    Route::get("/show", [CartController::class, "show"])->name("show");
    Route::post("/add/{product}", [CartController::class, "add"])->name("add");
    Route::post("/delete/{product}", [CartController::class, "delete"])->name("delete");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
