<?php

use App\Http\Controllers\PingController;
use Illuminate\Support\Facades\Route;

// El prefijo "api" lo agrega bootstrap/app.php.
Route::get('/ping', PingController::class);
