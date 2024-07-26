<?php

use Illuminate\Support\Facades\Route;
use Modules\Calendar\Http\Controllers\CalendarController;

Route::middleware(['auth:sanctum'])->prefix('modules')->group(function () {
    Route::apiResource('calendar', CalendarController::class)->names('calendar');
});