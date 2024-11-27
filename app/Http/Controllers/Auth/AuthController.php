<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserService\LoginUserRequest;
use App\Http\Requests\UserService\RegisterUserRequest;
use App\Http\Resources\UserService\UserResource;
use App\Utils\UuidHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Utils\ApiResponse;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    use HasApiTokens;

    /**
     *  User registration
     *
     *  @param RegisterUserRequest $request
     *  @return JsonResponse
     */
    public function registration(RegisterUserRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $validatedData['id'] = UuidHelper::generateUuid();
        $validatedData['password'] = Hash::make($request->password);
        $user = User::create($validatedData);

        $token = $user->createToken($request->device_name ?? 'undefined')->plainTextToken;
        return ApiResponse::created(['user' => new UserResource($user), 'token' => $token], 'User registered successfully.');
    }

    /**
     *  User authorization
     *
     *  @param LoginUserRequest $request
     *  @return JsonResponse
     *  @throws ValidationException
     */
    public function authorization(LoginUserRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'credentials' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->device_name)->plainTextToken;
        return ApiResponse::success(['user' => new UserResource($user), 'token' => $token], 'User logged in successfully.');
    }

    /**
     *  User logout
     *
     *  @param Request $request
     *  @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::deleted('User logged out successfully.');
    }
}
