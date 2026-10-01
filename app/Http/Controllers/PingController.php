<?php

namespace App\Http\Controllers;

use App\Services\PingService;
use Illuminate\Http\JsonResponse;

class PingController extends Controller
{
    public function __construct(private readonly PingService $pingService)
    {
    }

    // El controller solo delega; la logica vive en el service.
    public function __invoke(): JsonResponse
    {
        return response()->json($this->pingService->ping());
    }
}
