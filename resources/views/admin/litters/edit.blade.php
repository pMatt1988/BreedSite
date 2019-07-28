@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.litter.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.litters.update", [$litter->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.litter.fields.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($litter) ? $litter->name : '') }}" required>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.litter.fields.name_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('birthdate') ? 'has-error' : '' }}">
                            <label for="birthdate">{{ trans('cruds.litter.fields.birthdate') }}</label>
                            <input type="text" id="birthdate" name="birthdate" class="form-control date" value="{{ old('birthdate', isset($litter) ? $litter->birthdate : '') }}">
                            @if($errors->has('birthdate'))
                                <p class="help-block">
                                    {{ $errors->first('birthdate') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.litter.fields.birthdate_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('sire_id') ? 'has-error' : '' }}">
                            <label for="sire">{{ trans('cruds.litter.fields.sire') }}*</label>
                            <select name="sire_id" id="sire" class="form-control select2" required>
                                @foreach($dogs as $id => $sire)
                                    <option value="{{ $id }}" {{ (isset($litter) && $litter->sire ? $litter->sire->id : old('sire_id')) == $id ? 'selected' : '' }}>{{ $sire }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sire_id'))
                                <p class="help-block">
                                    {{ $errors->first('sire_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('dam_id') ? 'has-error' : '' }}">
                            <label for="dam">{{ trans('cruds.litter.fields.dam') }}*</label>
                            <select name="dam_id" id="dam" class="form-control select2" required>
                                @foreach($dogs as $id => $dam)
                                    <option value="{{ $id }}" {{ (isset($litter) && $litter->dam ? $litter->dam->id : old('dam_id')) == $id ? 'selected' : '' }}>{{ $dam }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dam_id'))
                                <p class="help-block">
                                    {{ $errors->first('dam_id') }}
                                </p>
                            @endif
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection