<?php

use App\Http\Controllers\Core\HandleModule\HandleModuleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('module')->group(function () {
    Route::post('create', [HandleModuleController::class, 'store']);
    Route::post('append-code', [HandleModuleController::class, 'appendCodeToFile']);
    Route::post('remove-function', [HandleModuleController::class, 'removeFunctionFromFile']);
    Route::post('deploy', [HandleModuleController::class, 'deployModule']);
    Route::get('model/{moduleName}', [HandleModuleController::class, 'getModuleDetails']);
});

Route::get('modules', [HandleModuleController::class, 'listModules']);
