<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Booking;

class BookingTest extends TestCase
{
    public function test_create_booking_model()
    {
        $booking = new Booking([
            'resource_id' => 1,
            'user_id' => 1,
            'start_time' => '2024-02-21 14:00:00',
            'end_time' => '2024-02-21 16:00:00',
            'status' => 'active',
        ]);

        $this->assertEquals(1, $booking->resource_id);
        $this->assertEquals(1, $booking->user_id);
        $this->assertEquals('active', $booking->status);
    }

    public function test_booking_has_correct_dates()
    {
        $booking = new Booking([
            'start_time' => '2024-02-21 14:00:00',
            'end_time' => '2024-02-21 16:00:00',
        ]);

        $this->assertEquals('2024-02-21 14:00:00', $booking->start_time);
        $this->assertEquals('2024-02-21 16:00:00', $booking->end_time);
    }
}
