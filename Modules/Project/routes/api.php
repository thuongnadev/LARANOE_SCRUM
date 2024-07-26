<?php

use Illuminate\Support\Facades\Route;
use Modules\Project\Http\Controllers\ProjectController;

Route::middleware(['auth:sanctum'])->prefix('modules')->group(function () {
    Route::apiResource('project', ProjectController::class)->names('project');
});