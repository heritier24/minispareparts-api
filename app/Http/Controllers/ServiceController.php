<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Services\ServiceService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $serviceService;

       public function __construct(ServiceService $serviceService)
       {
           $this->middleware('auth:api');
           $this->serviceService = $serviceService;
       }

       public function index(): JsonResponse
       {
           try {
               $services = $this->serviceService->getServices();
               return response()->json(['data' => $services], 200);
           } catch (Exception $e) {
               return response()->json(['error' => 'Failed to fetch services'], 500);
           }
       }

       public function store(ServiceRequest $request): JsonResponse
       {
           try {
               $service = $this->serviceService->addService($request->validated());
               return response()->json(['data' => $service], 201);
           } catch (Exception $e) {
               return response()->json(['error' => 'Failed to create service'], 500);
           }
       }

       public function update(ServiceRequest $request, string $id): JsonResponse
       {
           try {
               $service = $this->serviceService->updateService($id, $request->validated());
               if ($service) {
                   return response()->json(['data' => $service], 200);
               }
               return response()->json(['error' => 'Service not found'], 404);
           } catch (Exception $e) {
               return response()->json(['error' => 'Failed to update service'], 500);
           }
       }
}
