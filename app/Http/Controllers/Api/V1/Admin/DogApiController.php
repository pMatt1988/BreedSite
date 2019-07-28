<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Dog;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDogRequest;
use App\Http\Requests\UpdateDogRequest;

class DogApiController extends Controller
{
    public function index()
    {
        $dogs = Dog::all();

        return $dogs;
    }

    public function store(StoreDogRequest $request)
    {
        return Dog::create($request->all());
    }

    public function update(UpdateDogRequest $request, Dog $dog)
    {
        return $dog->update($request->all());
    }

    public function show(Dog $dog)
    {
        return $dog;
    }

    public function destroy(Dog $dog)
    {
        $dog->delete();

        return response("OK", 200);
    }
}
