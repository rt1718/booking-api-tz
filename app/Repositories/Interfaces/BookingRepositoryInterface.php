<?php

namespace App\Repositories\Interfaces;

use App\Models\Booking;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface BookingRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;

    public function getByResourceId(int $resourceId): LengthAwarePaginator;

    public function create(array $data): Booking;

    public function cancel(int $id): void;
}
