<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('customers',CustomerController::class);
Route::resource('packages', PackageController::class);
