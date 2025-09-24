<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('addresses', [AddressController::class, 'index'])->middleware('auth:api')->name('addresses.index');
Route::get('addresses/{address}', [AddressController::class, 'show'])->name('addresses.show');
Route::post('addresses', [AddressController::class, 'store'])->middleware('auth:api')->name('addresses.store');
Route::match(['put', 'patch'], 'addresses/{address}', [AddressController::class, 'update'])->middleware('auth:api')->name('addresses.update');
Route::delete('addresses/{address}', [AddressController::class, 'destroy'])->middleware('auth:api')->name('addresses.destroy');


