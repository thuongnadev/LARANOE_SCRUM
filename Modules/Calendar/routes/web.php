<?php

use Illuminate\Support\Facades\Route;
use Modules\Calendar\Http\Controllers\CalendarController;

Route::prefix('admin')->group(function(){
    Route::resource('calendar', CalendarController::class)->names('calendar');
});

