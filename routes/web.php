<?php

use Illuminate\Support\Facades\Route;

// Sabse pehle Login Page khulega
Route::get('/', function () { 
    return view('login'); 
});

// Authentication Routes
Route::get('/login', function () { return view('login'); });
Route::get('/register', function () { return view('register'); });

// Main App Pages (Login hone ke baad)
Route::get('/home', function () { return view('index'); });
Route::get('/markets', function () { return view('markets.index'); });
Route::get('/products', function () { return view('products.index'); });

// Role Dashboards
Route::get('/customer/dashboard', function () { return view('dashboards.customer'); });
Route::get('/farmer/dashboard', function () { return view('dashboards.farmer'); });
Route::get('/admin/dashboard', function () { return view('dashboards.admin'); });