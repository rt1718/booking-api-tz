<?php

namespace App\Services;

use App\Models\Booking;
use App\Repositories\BookingRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class BookingService
{
    protected BookingRepository $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function getAllBookings(): LengthAwarePaginator
    {
        return $this->bookingRepository->getAll(10);
    }

    public function getBookingsByResource(int $resourceId): LengthAwarePaginator
    {
        return $this->bookingRepository->getByResourceId($resourceId, 10);
    }

    public function createBooking(array $data): Booking
    {
        return $this->bookingRepository->create($data);
    }

    public function cancelBooking(int $id): void
    {
        $this->bookingRepository->cancel($id);
    }
}
