<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLitterRequest;
use App\Http\Requests\UpdateLitterRequest;
use App\Litter;

class LitterApiController extends Controller
{
    public function index()
    {
        $litters = Litter::all();

        return $litters;
    }

    public function store(StoreLitterRequest $request)
    {
        return Litter::create($request->all());
    }

    public function update(UpdateLitterRequest $request, Litter $litter)
    {
        return $litter->update($request->all());
    }

    public function show(Litter $litter)
    {
        return $litter;
    }

    public function destroy(Litter $litter)
    {
        $litter->delete();

        return response("OK", 200);
    }
}
