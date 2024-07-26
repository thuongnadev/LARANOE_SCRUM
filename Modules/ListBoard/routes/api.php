<?php

use Illuminate\Support\Facades\Route;
use Modules\ListBoard\Http\Controllers\ListBoardController;

Route::middleware(['auth:sanctum'])->prefix('modules')->group(function () {
    Route::apiResource('listboard', ListBoardController::class)->names('listboard');
});