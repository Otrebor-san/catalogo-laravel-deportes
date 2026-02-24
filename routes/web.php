<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeporteController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('deportes', DeporteController::class);