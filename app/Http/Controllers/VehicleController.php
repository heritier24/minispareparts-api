<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Services\VehicleService;
use Exception;
use Illuminate\Http\JsonResponse;

class VehicleController extends Controller
{
    protected $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->middleware('auth:api');
        $this->vehicleService = $vehicleService;
    }

    public function index(): JsonResponse
    {
        try {
            $vehicles = $this->vehicleService->getVehicles();
            return response()->json(['data' => $vehicles], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to fetch vehicles'], 500);
        }
    }

    public function store(VehicleRequest $request): JsonResponse
    {
        try {
            $vehicle = $this->vehicleService->addVehicle($request->validated());
            return response()->json(['data' => $vehicle], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to create vehicle'], 500);
        }
    }
}
