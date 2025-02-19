<?php

namespace App\Observers;

use App\Models\Booking;
use Illuminate\Support\Facades\Log;

class BookingObserver
{
    public function created(Booking $booking)
    {
        Log::info("Новое бронирование создано: ID {$booking->id}, ресурс ID {$booking->resource_id}");
    }

    public function updated(Booking $booking)
    {
        if ($booking->status === 'canceled') {
            Log::info("Бронирование ID {$booking->id} отменено.");
        }
    }
}
