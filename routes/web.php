<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\OrderManager;
use App\Http\Controllers\ProductsManager;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

Route::get("/", [ProductsManager::class, "index"])->name("home");

Route::post("login", [AuthManager::class, "loginPost"])->name("login.post");
Route::get("login", [AuthManager::class, "login"])->name("login");
Route::get("register", [AuthManager::class, "register"])->name("register");
Route::post("register", [AuthManager::class, "registerPost"])->name("register.post");

Route::get("logout", [AuthManager::class, "logout"])->name("Logout");

//Products Route
Route::get("/product/{slug}", [ProductsManager::class, "details"])->name("products.details");

Route::middleware(["auth"])->group(function () {
    Route::get("/carts/{id}", [ProductsManager::class, "addToCart"])->name("carts.add");
    Route::get("/carts", [ProductsManager::class, "showCart"])->name("carts.show");
    Route::get("/checkout", [OrderManager::class, "showCheckout"])->name("checkout.show");
    Route::post("/checkout", [OrderManager::class, "checkoutPost"])->name("checkout.post");

});