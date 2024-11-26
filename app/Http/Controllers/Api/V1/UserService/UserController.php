<?php

namespace App\Http\Controllers\Api\V1\UserService;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserService\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     *  Display the specified resource.
     *
     *  @param string $id
     *  @return UserResource
     *  @throws NotFoundException
     */
    public function show(string $id): UserResource
    {
        try
        {
            $user = User::where("id", $id)->firstOrFail();
            return new UserResource($user);
        }
        catch (\Exception $e)
        {
            throw new NotFoundException(['details' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
