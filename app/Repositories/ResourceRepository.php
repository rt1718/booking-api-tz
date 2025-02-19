<?php

namespace App\Repositories;

use App\Models\Resource;
use App\Repositories\Interfaces\ResourceRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ResourceRepository implements ResourceRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Resource::paginate(10);
    }

    public function create(array $data): Resource
    {
        return Resource::create($data);
    }

    public function getById(int $id): Resource
    {
        return Resource::findOrFail($id);
    }
}

