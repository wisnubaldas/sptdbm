<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

// sesuaikan dulu kontroller nya

Route::prefix('custom')->middleware(['web'])->group(function () {
    Route::prefix('inventory')->group(function(){
        Route::get('/', [\App\Http\Controllers\Custom\InventoryController::class,'index']);
        Route::get('/get-data', [\App\Http\Controllers\Custom\InventoryController::class,'get_data'])->name('custom.inventory.get-data');
        Route::match(['get', 'post'],'/find-data', [\App\Http\Controllers\Custom\InventoryController::class,'find_data'])->name('custom.inventory.find-data');
    });
    Route::get('abandon', [\App\Http\Controllers\Custom\AbandonController::class,'index']);
    Route::get('carrent-now', [\App\Http\Controllers\Custom\CarrentNowController::class,'index']);
    Route::get('custom-module', [\App\Http\Controllers\Custom\CustomModuleController::class,'index']);
    Route::get('inventory', [\App\Http\Controllers\Custom\InventoryController::class,'index']);
    Route::get('stock-opname', [\App\Http\Controllers\Custom\StockOpnameController::class,'index']);
});
