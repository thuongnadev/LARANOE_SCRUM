<?php

use App\Http\Controllers\Core\HandleModule\HandleModuleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::prefix('module')->group(function () {
    Route::post('create', [HandleModuleController::class, 'store']);
    Route::post('append-code', [HandleModuleController::class, 'appendCodeToFile']);
    Route::post('remove-function', [HandleModuleController::class, 'removeFunctionFromFile']);
    Route::post('deploy', [HandleModuleController::class, 'deployModule']);
    Route::get('model/{moduleName}', [HandleModuleController::class, 'getModuleDetails']);
});

Route::get('/heo', [HandleModuleController::class, 'listModules']);

Route::get('/admin', function () {
    return view('pages.admin.index');
})->middleware('auth');

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
})->name('logout');
