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

Route::get('/', [ProductController::class, "index"])->name("home");

// Route::get("products", [ProductController::class, "index"]);
// Route::get("products/{id}", [ProductController::class, "show"]);
// Route::get("products/create", [ProductController::class, "create"]);
// Route::post("products/store", [ProductController::class, "store"]);

Route::resource("products", ProductController::class);