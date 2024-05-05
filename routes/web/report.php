<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Report\DataScanController;
// sesuaikan dulu kontroller nya
Route::prefix('report')->middleware(['web','auth'])->group(function () {
    Route::prefix('data-scan')->group(function(){
        Route::get('/', [DataScanController::class,'index']);
    });
});