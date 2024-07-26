<?php

use Illuminate\Support\Facades\Route;
use Modules\Project\Http\Controllers\ProjectController;

Route::prefix('admin')->group(function(){
    Route::resource('project', ProjectController::class)->names('project');
});
