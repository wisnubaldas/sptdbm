<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
Route::prefix('dashboard')->middleware(['web','auth'])->group(function () {
    Route::get('card', [HomeController::class,'get_dashboard'])->name('card-data');
    Route::get('get-data-chart', [HomeController::class,'get_data_chart'])->name('get-data-chart');
});