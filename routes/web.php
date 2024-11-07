<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;


Route::get("/", [HomeController::class, "client_index"])->name("home");
Route::view('/about', 'about');


Route::prefix("admin")->middleware("auth")->name("admin.")->group(function () {
    Route::get("/", [HomeController::class, "admin_index"])->name("home");
    Route::get("/settings", [SettingsController::class, "index"])->name("settings");
    Route::post("/settings/store", [SettingsController::class, "store"])->name("settings.store");
    Route::get("categories", [CategoryController::class, "index"])->name("categories");
    Route::post('/categories/save-order', [CategoryController::class, 'saveOrder'])->name("save_order");
    Route::post('/categories/{id}/toggle-enabled', [CategoryController::class, 'toggleEnabled'])->name("toggle_enable");
    Route::post('/categories/{id}/toggle-featured', [CategoryController::class, 'toggleFeatured'])->name("toggle_feature");
    Route::post("/categories", [CategoryController::class, "store"])->name("categories.store");
    Route::get("/categories/{category}", [CategoryController::class, "show"])->name("categories.show");
    Route::delete("/categories/{category}", [CategoryController::class, "delete"])->name("categories.delete");
    Route::post("/categories/{id}/restore", [CategoryController::class, "restore"])->name("categories.restore");
    Route::delete("/categories/{id}/destroy", [CategoryController::class, "destroy"])->name("categories.destroy");
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

    Route::prefix("products")->name("products.")->group(function () {
        Route::get('/create', action: [ProductController::class, 'create'])->name('create');
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit'); // Edit route
        Route::put('/{product}', [ProductController::class, 'update'])->name('update'); // Update route
        Route::post('/{product}/update-category', [ProductController::class, 'updateCategory']);
        Route::post('/{product}/toggle-enabled', [ProductController::class, 'toggleEnabled']);
        Route::post('/{product}/toggle-featured', [ProductController::class, 'toggleFeatured']);
        Route::get('/{product}', [ProductController::class, 'show'])->name('show');
        Route::post('', [ProductController::class, 'store'])->name('store');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
        Route::delete("/{product}/image/delete", [ProductController::class, 'delete_image'])->name('delete.image');
    });
});


Route::get('/logout', action: [authController::class, 'logout'])->name("logout");
Route::match(['get', 'post'], "/login", [authController::class, "login"])->name("login");
