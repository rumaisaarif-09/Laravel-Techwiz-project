
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Farmer ke product CRUD routes
Route::resource('products', ProductController::class);

