<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Resources\BookingResource;
use App\Services\BookingService;
use Illuminate\Http\Request;
/**
 * @OA\Tag(
 *     name="Bookings",
 *     description="Управление бронированиями"
 * )
 */
class BookingController extends Controller
{
    protected BookingService $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookingResource::collection($this->bookingService->getAllBookings());
    }

    public function getByResource($resourceId)
    {
        return $this->bookingService->getBookingsByResource($resourceId);
    }

    /**
     * @OA\Post(
     *     path="/api/bookings",
     *     summary="Создать бронирование",
     *     tags={"Bookings"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"resource_id", "user_id", "start_time", "end_time"},
     *             @OA\Property(property="resource_id", type="integer", example=1),
     *             @OA\Property(property="user_id", type="integer", example=2),
     *             @OA\Property(property="start_time", type="string", format="date-time", example="2024-02-21T14:00:00"),
     *             @OA\Property(property="end_time", type="string", format="date-time", example="2024-02-21T16:00:00")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Бронирование создано"
     *     )
     * )
     */
    public function store(BookingRequest $request)
    {
        return response()->json($this->bookingService->createBooking($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * @OA\Delete(
     *     path="/api/bookings/{id}",
     *     summary="Отменить бронирование",
     *     tags={"Bookings"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Бронирование отменено"
     *     )
     * )
     */
    public function destroy(string $id)
    {
        $this->bookingService->cancelBooking($id);
        return response()->json(['message' => 'Booking canceled'], 200);
    }
}
