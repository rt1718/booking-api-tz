<?php

namespace App\Repositories\Interfaces;

use App\Models\Resource;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ResourceRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;

    public function create(array $data): Resource;

    public function getById(int $id): Resource;
}
