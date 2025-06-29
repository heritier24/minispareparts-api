<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    protected $userService;

       public function __construct(UserService $userService)
       {
           $this->userService = $userService;
       }

       public function login(LoginRequest $request): JsonResponse
       {
           try {
               $credentials = $request->only('email', 'password');
               $result = $this->userService->authenticate($credentials['email'], $credentials['password']);
               if ($result) {
                   return response()->json(['data' => $result], 200);
               }
               return response()->json(['error' => 'Invalid credentials'], 401);
           } catch (Exception $e) {
               return response()->json(['error' => 'Authentication failed'], 500);
           }
       }

       public function logout(): JsonResponse
       {
           try {
               $this->userService->logout();
               return response()->json(['message' => 'Logged out successfully'], 200);
           } catch (Exception $e) {
               return response()->json(['error' => 'Logout failed'], 500);
           }
       }
}
