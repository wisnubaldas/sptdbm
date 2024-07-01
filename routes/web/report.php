<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Report\DataScanController;
use App\Http\Controllers\Report\DataTimbunController;
// sesuaikan dulu kontroller nya
Route::prefix('report')->middleware(['web','auth'])->group(function () {
    Route::prefix('data-scan')->group(function(){
        Route::get('/', [DataScanController::class,'index']);
    });
    Route::prefix('data-timbun')->group(function(){
        Route::get('/', [DataTimbunController::class,'index']);
    });
    Route::prefix('data-current-now')->group(function(){
        Route::get('/', [App\Http\Controllers\Report\DataCurrentNowController::class,'index']);
        Route::get('/table-curent-now', [App\Http\Controllers\Report\DataCurrentNowController::class,'tbl_current_now'])->name('table-curent-now');
        Route::get('/detail-current-now',[App\Http\Controllers\Report\DataCurrentNowController::class,'detail_current_now'])->name('detail-current-now');
    });
});