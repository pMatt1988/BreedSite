@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.dog.title') }}
                </div>
                <div class="panel-body">

                    <div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dog.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $dog->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dog.fields.picture') }}
                                    </th>
                                    <td>
                                        @foreach($dog->picture as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dog.fields.birthdate') }}
                                    </th>
                                    <td>
                                        {{ $dog->birthdate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dog.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $dog->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dog.fields.slug') }}
                                    </th>
                                    <td>
                                        {{ $dog->slug }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dog.fields.gender') }}
                                    </th>
                                    <td>
                                        {{ App\Dog::GENDER_SELECT[$dog->gender] }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection