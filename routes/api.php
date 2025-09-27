<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Mortezaa97\Addresses\Http\Controllers\AddressController;

Route::prefix('api/addresses')->middleware('api')->group(function () {
    Route::get('/', [AddressController::class, 'index'])->middleware('auth:api')->name('addresses.index');
    Route::get('/{address}', [AddressController::class, 'show'])->name('addresses.show');
    Route::post('/', [AddressController::class, 'store'])->middleware('auth:api')->name('addresses.store');
    Route::match(['put', 'patch'], '/{address}', [AddressController::class, 'update'])->middleware('auth:api')->name('addresses.update');
    Route::delete('/{address}', [AddressController::class, 'destroy'])->middleware('auth:api')->name('addresses.destroy');
});

