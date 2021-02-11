<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Auth')->group(function(){
    // Register
    Route::post('register', 'RegisterController');
    // Login
    Route::post('login', 'LoginController');
    // Logout
    Route::post('logout', 'LogoutController');
});

Route::middleware('auth:api')->group(function(){
    // Get data user login
    Route::get('user', 'UserController');
});