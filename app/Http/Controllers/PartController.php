<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartRequest;
use App\Services\PartService;
use Exception;
use Illuminate\Http\JsonResponse;

class PartController extends Controller
{
    protected $partService;

    public function __construct(PartService $partService)
    {
        $this->middleware('auth:api');
        $this->partService = $partService;
    }

    public function index(): JsonResponse
    {
        try {
            $parts = $this->partService->getParts();
            return response()->json(['data' => $parts], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to fetch parts'], 500);
        }
    }

    public function store(PartRequest $request): JsonResponse
    {
        try {
            $part = $this->partService->addPart($request->validated());
            return response()->json(['data' => $part], 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to create part'], 500);
        }
    }

    public function update(PartRequest $request, string $id): JsonResponse
    {
        try {
            $part = $this->partService->updatePart($id, $request->validated());
            if ($part) {
                return response()->json(['data' => $part], 200);
            }
            return response()->json(['error' => 'Part not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update part'], 500);
        }
    }

    public function destroy(string $id): JsonResponse
    {
        try {
            $this->partService->deletePart($id);
            return response()->json(['message' => 'Part deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete part'], 500);
        }
    }
}
