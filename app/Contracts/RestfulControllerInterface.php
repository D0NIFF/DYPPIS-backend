<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface RestfulControllerInterface
{
    /**
     *  [GET] - Return the <elements>
     *
     *  @param Request $request
     *  @return mixed
     */
    public function index(Request $request) : mixed;

    /**
     *  [GET] - Return the <element> by id
     *
     *  @param string $id
     *  @return mixed
     */
    public function show(string $id) : mixed;

    /**
     *  [POST] - Create the <element>
     *
     *  @param Request $request
     *  @return mixed
     */
    public function store(Request $request) : mixed;

    /**
     *  [PATCH] - Update the product
     *
     *  @param string $id
     *  @return mixed
     */
    public function update(string $id) : mixed;


    /**
     *  [DELETE] - Delete the product
     *
     *  @param string $id
     *  @return mixed
     */
    public function destroy(string $id) : mixed;
}
