<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Repositories\Interfaces\BookingRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookingRepository implements BookingRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Booking::paginate(10);
    }

    public function getByResourceId(int $resourceId): LengthAwarePaginator
    {
        return Booking::where('resource_id', $resourceId)->paginate(10);
    }

    public function create(array $data): Booking
    {
        return Booking::create($data);
    }

    public function cancel(int $id): void
    {
        Booking::where('id', $id)->update(['status' => 'canceled']);
    }
}
