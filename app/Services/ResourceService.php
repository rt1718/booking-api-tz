<?php

namespace App\Services;

use App\Models\Resource;
use App\Repositories\ResourceRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
class ResourceService
{
    protected ResourceRepository $resourceRepository;

    public function __construct(ResourceRepository $resourceRepository)
    {
        $this->resourceRepository = $resourceRepository;
    }

    public function getAllResources(): LengthAwarePaginator
    {
        return $this->resourceRepository->getAll();
    }

    public function createResource(array $data): Resource
    {
        return $this->resourceRepository->create($data);
    }

    public function getResourceById(int $id): Resource
    {
        return $this->resourceRepository->getById($id);
    }
}
