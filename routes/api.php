<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\AlwaysAcceptJson;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware([AlwaysAcceptJson::class])->group(function () {
    Route::resource('tasks', TaskController::class);
});
