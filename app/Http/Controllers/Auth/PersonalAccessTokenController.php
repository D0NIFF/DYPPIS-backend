<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserService\AuthUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PersonalAccessTokenController extends Controller
{

    /**
     *  Create a new authorization token
     *
     *  @param AuthUserRequest $request
     *  @return array
     *  @throws ValidationException
     */
    public function store(AuthUserRequest $request): array
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password))
        {
            throw ValidationException::withMessages([
                'credentials' => ['The provided credentials are incorrect.'],
            ]);
        }

        return ['token' => $user->createToken($request->device_name)->plainTextToken];
    }


    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response([
            'status' => 'Success',
            'message' => 'Token successfully removed.',
        ], 204);

    }
}
