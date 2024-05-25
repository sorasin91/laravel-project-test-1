<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('products.index');
});

// Routes for product operations
Route::resource('products', ProductController::class);
