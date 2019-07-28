<?php

namespace App\Http\Controllers\Admin;

use App\Dog;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLitterRequest;
use App\Http\Requests\StoreLitterRequest;
use App\Http\Requests\UpdateLitterRequest;
use App\Litter;

class LitterController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('litter_access'), 403);

        $litters = Litter::all();

        return view('admin.litters.index', compact('litters'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('litter_create'), 403);

        $dogs = Dog::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');


        return view('admin.litters.create', compact('dogs'));
    }

    public function store(StoreLitterRequest $request)
    {
        abort_unless(\Gate::allows('litter_create'), 403);

        $litter = Litter::create($request->all());

        return redirect()->route('admin.litters.index');
    }

    public function edit(Litter $litter)
    {
        abort_unless(\Gate::allows('litter_edit'), 403);

        $dogs = Dog::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $litter->load('sire', 'dam');

        return view('admin.litters.edit', compact('dogs', 'litter'));
    }

    public function update(UpdateLitterRequest $request, Litter $litter)
    {
        abort_unless(\Gate::allows('litter_edit'), 403);

        $litter->update($request->all());

        return redirect()->route('admin.litters.index');
    }

    public function show(Litter $litter)
    {
        abort_unless(\Gate::allows('litter_show'), 403);

        $litter->load('sire', 'dam');

        return view('admin.litters.show', compact('litter'));
    }

    public function destroy(Litter $litter)
    {
        abort_unless(\Gate::allows('litter_delete'), 403);

        $litter->delete();

        return back();
    }

    public function massDestroy(MassDestroyLitterRequest $request)
    {
        Litter::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
