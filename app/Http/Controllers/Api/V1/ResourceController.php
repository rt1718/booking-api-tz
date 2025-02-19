<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceRequest;
use App\Http\Resources\ResourceResource;
use App\Models\Resource;
use App\Services\ResourceService;

/**
 * @OA\Info(
 *      title="API бронирования",
 *      version="1.0",
 *      description="Документация API бронирования ресурсов"
 * )
 *
 * @OA\Tag(
 *     name="Resources",
 *     description="Управление ресурсами"
 * )
 */
class ResourceController extends Controller
{
    protected ResourceService $resourceService;

    public function __construct(ResourceService $resourceService)
    {
        $this->resourceService = $resourceService;
    }

    /**
     * @OA\Get(
     *     path="/api/resources",
     *     summary="Получить список ресурсов",
     *     tags={"Resources"},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ"
     *     )
     * )
     */
    public function index()
    {
        return ResourceResource::collection($this->resourceService->getAllResources());
    }

    /**
     * @OA\Post(
     *     path="/api/resources",
     *     summary="Создать ресурс",
     *     tags={"Resources"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "type"},
     *             @OA\Property(property="name", type="string", example="Велосипед"),
     *             @OA\Property(property="type", type="string", example="bike"),
     *             @OA\Property(property="description", type="string", example="Велосипед 21 скорость")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Ресурс создан"
     *     )
     * )
     */
    public function store(ResourceRequest $request)
    {
        $resource = $this->resourceService->createResource($request->validated());
        return response()->json(new ResourceResource($resource), 201);
    }


    /**
     * @OA\Get(
     *     path="/api/resources/{id}",
     *     summary="Получить ресурс по ID",
     *     tags={"Resources"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID ресурса",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный ответ"
     *     )
     * )
     */
    public function show(string $id)
    {
        return new ResourceResource($this->resourceService->getResourceById($id));
    }
}
