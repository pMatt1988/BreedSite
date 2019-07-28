@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.litter.title') }}
                </div>
                <div class="panel-body">

                    <div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.litter.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $litter->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.litter.fields.birthdate') }}
                                    </th>
                                    <td>
                                        {{ $litter->birthdate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.litter.fields.sire') }}
                                    </th>
                                    <td>
                                        {{ $litter->sire->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.litter.fields.dam') }}
                                    </th>
                                    <td>
                                        {{ $litter->dam->name ?? '' }}
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