<?php

use App\Http\Controllers\AccountActivationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartHistoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [ProductController::class, "homePage"])->name("home");


Route::prefix('/account')->name("account.")->middleware(['auth'])->group(function () {
    Route::get("/activation", [AccountActivationController::class, "show"])->name("show");
    Route::post("/enable/{id}", [AccountActivationController::class, "enable"])->name("enable");
    Route::post("/disable/{id}", [AccountActivationController::class, "disable"])->name("disable");
});

Route::middleware(['auth', 'userStatusCheck'])->group(function () {

    Route::prefix("/product")->name("product.")->group(function () {

        Route::get('/create', [ProductController::class, "create"])->name("create");
        Route::post("/create", [ProductController::class, "store"])->name("store");

        Route::get("/edit/{product}", [ProductController::class, "edit"])->name("edit");
        Route::post("/edit/{product}", [ProductController::class, "update"])->name("update");

        Route::get("/delete/{product}", [ProductController::class, "delete"])->name("delete");

    });

    Route::prefix("/cart")->name("cart.")->group(function() {
        Route::get("/show", [CartController::class, "show"])->name("show");
        Route::post("/add/{product}", [CartController::class, "add"])->name("add");

        Route::post("/delete/{product}", [CartController::class, "delete"])->name("delete");
        Route::get("/history", [CartHistoryController::class, "show"])->name("history");
    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
