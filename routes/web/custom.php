<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

// sesuaikan dulu kontroller nya

Route::prefix('custom')->middleware(['web','auth'])->group(function () {
    Route::get('/download-pdf', [\App\Http\Controllers\Custom\InventoryController::class,'inventory_pdf'])->name('download-pdf');

    Route::prefix('inventory')->group(function(){
        Route::get('/', [\App\Http\Controllers\Custom\InventoryController::class,'index']);
        Route::get('/get-data-in', [\App\Http\Controllers\Custom\InventoryController::class,'get_data_in'])->name('inventory.get_data_in');
        Route::get('/get-data-out', [\App\Http\Controllers\Custom\InventoryController::class,'get_data_out'])->name('inventory.get_data_out');
        Route::get('/get-export-in', [\App\Http\Controllers\Custom\InventoryController::class,'export_in'])->name('inventory.export_in');
        Route::get('/get-export-out', [\App\Http\Controllers\Custom\InventoryController::class,'export_out'])->name('inventory.export_out');
        Route::get('/download-excel', [\App\Http\Controllers\Custom\InventoryController::class,'inventory_excel'])->name('inventory.download-excel');
    });
    Route::prefix('abandon')->group(function(){
        Route::get('/', [\App\Http\Controllers\Custom\AbandonController::class,'index'])->name('abandon');
        Route::get('/import-data-in', [\App\Http\Controllers\Custom\AbandonController::class,'import_in'])->name('abandon.import-in');
        Route::get('/export-data-in', [\App\Http\Controllers\Custom\AbandonController::class,'export_in'])->name('abandon.export-in');
        Route::get('/download-excel', [\App\Http\Controllers\Custom\AbandonController::class,'abandon_excel'])->name('abandon.download-excel');

    });
    Route::prefix('carrent-now')->group(function(){
        Route::get('/', [\App\Http\Controllers\Custom\CarrentNowController::class,'index'])->name('carrent-now');
        Route::get('/get-data-current-now',[\App\Http\Controllers\Custom\CarrentNowController::class,'get_data_carrent_now'])->name('custom.carnow.get-data');
        Route::post('/get-data-current-search',[\App\Http\Controllers\Custom\CarrentNowController::class,'get_data_carrent_now_serch'])->name('custom.carnow.get-data-search');
        Route::get('/get-data-tegah/{awb}',[\App\Http\Controllers\Custom\CarrentNowController::class,'get_data_tegah'])->name('custom.carnow.get-data-tegah');
        Route::post('/post-data-tegah',[\App\Http\Controllers\Custom\CarrentNowController::class,'post_tegah'])->name('custom.carnow.post-data-tegah');
        Route::get('/download-excel', [\App\Http\Controllers\Custom\CarrentNowController::class,'currentnow_excel'])->name('currentnow.download-excel');
    });
    Route::prefix('custom-module')->group(function(){
        Route::get('/', [\App\Http\Controllers\Custom\CustomModuleController::class,'index'])->name('custom-module');
        Route::get('/get-data-release/{awb}', [\App\Http\Controllers\Custom\CustomModuleController::class,'get_data_release'])->name('custom-module.get-release');
        Route::post('/post-data-release',[\App\Http\Controllers\Custom\CustomModuleController::class,'post_data_release'])->name('custom-module.post-release');
        Route::get('/detail-release/{awb}',[\App\Http\Controllers\Custom\CustomModuleController::class,'detail_release'])->name('custom-module.detail-release');
        Route::get('/download-excel', [\App\Http\Controllers\Custom\CustomModuleController::class,'custom_excel'])->name('custom.download-excel');

    });
});
