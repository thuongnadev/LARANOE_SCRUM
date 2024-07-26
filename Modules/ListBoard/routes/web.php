<?php

use Illuminate\Support\Facades\Route;
use Modules\ListBoard\Http\Controllers\ListBoardController;

Route::prefix('admin')->group(function(){
    Route::resource('list-board', ListBoardController::class)->names('listboard');
});
