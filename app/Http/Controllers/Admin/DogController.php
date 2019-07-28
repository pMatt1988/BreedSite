<?php

namespace App\Http\Controllers\Admin;

use App\Dog;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDogRequest;
use App\Http\Requests\StoreDogRequest;
use App\Http\Requests\UpdateDogRequest;
use App\Litter;

class DogController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_unless(\Gate::allows('dog_access'), 403);

        $dogs = Dog::all();

        return view('admin.dogs.index', compact('dogs'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('dog_create'), 403);
        $litters = Litter::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dogs.create', compact('litters'));
    }

    public function store(StoreDogRequest $request)
    {
        abort_unless(\Gate::allows('dog_create'), 403);

        $dog = Dog::create($request->all());

        foreach ($request->input('picture', []) as $file) {
            $dog->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('picture');
        }

        return redirect()->route('admin.dogs.index');
    }

    public function edit(Dog $dog)
    {
        abort_unless(\Gate::allows('dog_edit'), 403);
        $litters = Litter::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dogs.edit', compact('dog', 'litters'));
    }

    public function update(UpdateDogRequest $request, Dog $dog)
    {
        abort_unless(\Gate::allows('dog_edit'), 403);

        $dog->update($request->all());

        if (count($dog->picture) > 0) {
            foreach ($dog->picture as $media) {
                if (!in_array($media->file_name, $request->input('picture', []))) {
                    $media->delete();
                }
            }
        }

        $media = $dog->picture->pluck('file_name')->toArray();

        foreach ($request->input('picture', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $dog->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('picture');
            }
        }

        return redirect()->route('admin.dogs.index');
    }

    public function show(Dog $dog)
    {
        abort_unless(\Gate::allows('dog_show'), 403);

        return view('admin.dogs.show', compact('dog'));
    }

    public function destroy(Dog $dog)
    {
        abort_unless(\Gate::allows('dog_delete'), 403);

        $dog->delete();

        return back();
    }

    public function massDestroy(MassDestroyDogRequest $request)
    {
        Dog::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
