<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PersonalAccessTokenController extends Controller
{

    /**
     *
     *
     *  @param StoreUserRequest $request
     *  @return array
     */
    public function store(StoreUserRequest $request)
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
            'message' => 'Token removido com sucesso!',
        ], 204);

    }
}
