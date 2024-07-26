<?php

use Illuminate\Support\Facades\Route;
use Modules\Board\Http\Controllers\BoardController;

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::resource('board', BoardController::class)->names('board');
});
