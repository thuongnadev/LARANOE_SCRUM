<?php

use Illuminate\Support\Facades\Route;
use Modules\Sprint\Http\Controllers\SprintController;

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::resource('sprint', SprintController::class)->names('sprint');
});
