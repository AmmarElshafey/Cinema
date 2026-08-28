<?php

use App\Http\Controllers\Api\MovieApiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('movies', MovieApiController::class)
    ->names('api.movies');
