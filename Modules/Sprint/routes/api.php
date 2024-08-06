<?php

use Illuminate\Support\Facades\Route;
use Modules\Sprint\Http\Controllers\SprintController;

Route::middleware(['auth:sanctum'])->prefix('modules')->group(function () {
    Route::apiResource('sprint', SprintController::class)->names('sprint');
});