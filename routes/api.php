<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DvdController;

Route::apiResource('dvds', DvdController::class);
