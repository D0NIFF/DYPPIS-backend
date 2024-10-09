<?php

namespace App\Contracts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

interface RestfulControllerInterface
{
    /**
     *  [GET] - Return the <resources>.
     *  Display a listing of the resource.
     *
     *  @param Request $request
     *  @return mixed
     */
    public function index(Request $request) : mixed;


    /**
     *  [GET] - Return the <resource> by id
     *  Display the specified resource.
     *
     *  @param Request $request
     *  @param string $id
     *  @return mixed
     */
    public function show(Request $request, string $id) : mixed;


    /**
     *  [POST] - Create the <resource>
     *  Store a newly created resource in storage.
     *
     *  @param Request $request
     *  @return mixed
     */
    public function store(Request $request) : mixed;


    /**
     *  [PATCH] - Update the <resource>
     *  Update the specified resource in storage.
     *
     *  @param string $id
     *  @return mixed
     */
    public function update(string $id) : mixed;


    /**
     *  [DELETE] - Delete the <resource>
     *  Remove the specified resource from storage.
     *
     *  @param string $id
     *  @return mixed
     */
    public function destroy(string $id) : mixed;
}
