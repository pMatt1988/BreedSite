@extends('layouts.admin')
@section('content')
<div class="content">
    @can('dog_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.dogs.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.dog.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.dog.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.dog.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dog.fields.picture') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dog.fields.birthdate') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dog.fields.gender') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dogs as $key => $dog)
                                    <tr data-entry-id="{{ $dog->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $dog->name ?? '' }}
                                        </td>
                                        <td>
                                            @if($dog->picture)
                                                @foreach($dog->picture as $key => $media)
                                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                                        <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            {{ $dog->birthdate ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Dog::GENDER_SELECT[$dog->gender] ?? '' }}
                                        </td>
                                        <td>
                                            @can('dog_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.dogs.show', $dog->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan
                                            @can('dog_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.dogs.edit', $dog->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
                                            @can('dog_delete')
                                                <form action="{{ route('admin.dogs.destroy', $dog->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dogs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('dog_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection