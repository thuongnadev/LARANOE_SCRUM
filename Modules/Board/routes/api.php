<?php

use Illuminate\Support\Facades\Route;
use Modules\Board\Http\Controllers\BoardController;

Route::middleware(['auth:sanctum'])->prefix('modules')->group(function () {
    Route::apiResource('board', BoardController::class)->names('board');
});