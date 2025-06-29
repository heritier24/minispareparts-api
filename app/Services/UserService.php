<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserService
{
    public function authenticate(string $email, string $password): ?array
    {
        $user = User::where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            $token = JWTAuth::fromUser($user);
            return ['user' => $user, 'token' => $token];
        }
        return null;
    }

    public function logout(): void
    {
        JWTAuth::invalidate(JWTAuth::getToken());
    }

    public function getUsers(): array
    {
        return User::all()->toArray();
    }
}
