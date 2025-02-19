<?php

use App\Http\Controllers\Api\V1\BookingController;
use App\Http\Controllers\Api\V1\ResourceController;
use Illuminate\Support\Facades\Route;
use L5Swagger\Http\Controllers\SwaggerController;

// Основные API-ресурсы
Route::apiResource('resources', ResourceController::class);
Route::apiResource('bookings', BookingController::class)->only(['store', 'destroy']);

// Получение бронирований для конкретного ресурса
Route::get('resources/{id}/bookings', [BookingController::class, 'index']);

// Группа маршрутов для бронирований
Route::prefix('bookings')->group(function () {
    Route::get('/', [BookingController::class, 'index']);
    Route::get('/resource/{id}', [BookingController::class, 'getByResource']);
    Route::post('/', [BookingController::class, 'store']);
    Route::delete('/{id}', [BookingController::class, 'destroy']);
});

// Документация API (Swagger)
Route::get('/api/documentation', [SwaggerController::class, 'api'])->name('swagger.docs');
