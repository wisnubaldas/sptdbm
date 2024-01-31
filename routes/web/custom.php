<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

// sesuaikan dulu kontroller nya

Route::prefix('custom')->middleware(['web','auth'])->group(function () {
    Route::prefix('inventory')->group(function(){
        Route::get('/', [\App\Http\Controllers\Custom\InventoryController::class,'index']);
        Route::get('/get-data', [\App\Http\Controllers\Custom\InventoryController::class,'get_data'])->name('custom.inventory.get-data');
        Route::match(['get', 'post'],'/find-data', [\App\Http\Controllers\Custom\InventoryController::class,'find_data'])->name('custom.inventory.find-data');
    });
    Route::prefix('abandon')->group(function(){
        Route::get('/', [\App\Http\Controllers\Custom\AbandonController::class,'index'])->name('abandon');
    });
    Route::prefix('carrent-now')->group(function(){
        Route::get('/', [\App\Http\Controllers\Custom\CarrentNowController::class,'index'])->name('carrent-now');
        Route::get('/get-data-current-now',[\App\Http\Controllers\Custom\CarrentNowController::class,'get_data_carrent_now'])->name('custom.carnow.get-data');
    });
    Route::prefix('custom-module')->group(function(){
        Route::get('/', [\App\Http\Controllers\Custom\CustomModuleController::class,'index'])->name('custom-module');
    });
    Route::prefix('stock-opname')->group(function(){
        Route::get('/', [\App\Http\Controllers\Custom\StockOpnameController::class,'index'])->name('stock-opname');        
    });
});
