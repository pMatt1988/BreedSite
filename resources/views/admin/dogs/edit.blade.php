@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.edit') }} {{ trans('cruds.dog.title_singular') }}
                    </div>
                    <div class="panel-body">

                        <form action="{{ route("admin.dogs.update", [$dog->id]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="menu">Show in Menu</label>
                                <input type="checkbox" id="menu" name="menu" value="1"
                                       class="form-check" {{ isset($dog) && $dog->menu ? 'checked' : old('menu') }}>
                            </div>


                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">{{ trans('cruds.dog.fields.name') }}*</label>
                                <input type="text" id="name" name="name" class="form-control"
                                       value="{{ old('name', isset($dog) ? $dog->name : '') }}" required>
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.dog.fields.name_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                                <label for="slug">{{ trans('cruds.dog.fields.slug') }}*</label>
                                <input type="text" id="slug" name="slug" class="form-control"
                                       value="{{ old('slug', isset($dog) ? $dog->slug : '') }}" required>


                                @if($errors->has('slug'))
                                    <p class="help-block">
                                        25 \ {{ $errors->first('slug') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.dog.fields.slug_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('birthdate') ? 'has-error' : '' }}">
                                <label for="birthdate">{{ trans('cruds.dog.fields.birthdate') }}</label>
                                <input type="text" id="birthdate" name="birthdate" class="form-control date"
                                       value="{{ old('birthdate', isset($dog) ? $dog->birthdate : '') }}">
                                @if($errors->has('birthdate'))
                                    <p class="help-block">
                                        {{ $errors->first('birthdate') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.dog.fields.birthdate_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                                <label for="gender">{{ trans('cruds.dog.fields.gender') }}*</label>
                                <select id="gender" name="gender" class="form-control" required>
                                    <option value=""
                                            disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                    @foreach(App\Dog::GENDER_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('gender', $dog->gender) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('gender'))
                                    <p class="help-block">
                                        {{ $errors->first('gender') }}
                                    </p>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('picture_path') ? 'has-error' : '' }}">
                                <label for="picture_path">Thumbnail</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                         <a id="lfm" data-input="picture_path" data-preview="holder"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>

                                    </span>
                                    <input type="text" id="picture_path" name="picture_path" class="form-control"
                                           value="{{ old('picture_path', isset($dog) ? $dog->picture_path : '') }}">
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;">
                                    @if((isset($dog) && $dog->picture_path) || old('picture_path'))
                                        <img src="{{ old('picture_path', isset($dog) && $dog->picture_path ? $dog->picture_path : '') }}" style="height:100px;" alt="">
                                        @endif
                                </div>

                                @if($errors->has('picture_path'))
                                    <p class="help-block">
                                        {{ $errors->first('picture_path') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{--{{ trans('cruds.dog.fields.name_helper') }}--}}
                                </p>

                            </div>

                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label for="description">{{ trans('cruds.dog.fields.description') }}</label>
                                <textarea id="description" name="description"
                                          class="form-control ckeditor">{{ old('description', isset($dog) ? $dog->description : '') }}</textarea>
                                @if($errors->has('description'))
                                    <p class="help-block">
                                        {{ $errors->first('description') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.dog.fields.description_helper') }}
                                </p>
                            </div>


                            <div class="form-group {{ $errors->has('litter_id') ? 'has-error' : '' }}">
                                <label for="litter">Litter</label>
                                <select name="litter_id" id="litter" class="form-control select2">
                                    @foreach($litters as $id => $litter)
                                        <option value="{{$id}}" {{ (isset($dog) && $dog->litter ? $dog->litter->id : old('dam_id')) == $id ? 'selected' : '' }}>{{ $litter }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('sire_id'))
                                    <p class="help-block">
                                        {{ $errors->first('sire_id') }}
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

@section('scripts')
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
        var editor = CKEDITOR.replace('description', {
            extraPlugins: 'image2',
            removePlugins: 'image',
            height: 450,
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });
    </script>
    {{--<script>--}}
    {{--var uploadedPictureMap = {}--}}
    {{--Dropzone.options.pictureDropzone = {--}}
    {{--url: '{{ route('admin.dogs.storeMedia') }}',--}}
    {{--maxFilesize: 2, // MB--}}
    {{--acceptedFiles: '.jpeg,.jpg,.png,.gif',--}}
    {{--addRemoveLinks: true,--}}
    {{--headers: {--}}
    {{--'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
    {{--},--}}
    {{--params: {--}}
    {{--size: 2,--}}
    {{--width: 1024,--}}
    {{--height: 1024--}}
    {{--},--}}
    {{--success: function (file, response) {--}}
    {{--$('form').append('<input type="hidden" name="picture[]" value="' + response.name + '">')--}}
    {{--uploadedPictureMap[file.name] = response.name--}}
    {{--},--}}
    {{--removedfile: function (file) {--}}
    {{--console.log(file)--}}
    {{--file.previewElement.remove()--}}
    {{--var name = ''--}}
    {{--if (typeof file.file_name !== 'undefined') {--}}
    {{--name = file.file_name--}}
    {{--} else {--}}
    {{--name = uploadedPictureMap[file.name]--}}
    {{--}--}}
    {{--$('form').find('input[name="picture[]"][value="' + name + '"]').remove()--}}
    {{--},--}}
    {{--init: function () {--}}
    {{--@if(isset($dog) && $dog->picture)--}}
    {{--var files =--}}
    {{--{!! json_encode($dog->picture) !!}--}}
    {{--for (var i in files) {--}}
    {{--var file = files[i]--}}
    {{--this.options.addedfile.call(this, file)--}}
    {{--this.options.thumbnail.call(this, file, file.url)--}}
    {{--file.previewElement.classList.add('dz-complete')--}}
    {{--$('form').append('<input type="hidden" name="picture[]" value="' + file.file_name + '">')--}}
    {{--}--}}
    {{--@endif--}}
    {{--},--}}
    {{--error: function (file, response) {--}}
    {{--if ($.type(response) === 'string') {--}}
    {{--var message = response //dropzone sends it's own error messages in string--}}
    {{--} else {--}}
    {{--var message = response.errors.file--}}
    {{--}--}}
    {{--file.previewElement.classList.add('dz-error')--}}
    {{--_ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')--}}
    {{--_results = []--}}
    {{--for (_i = 0, _len = _ref.length; _i < _len; _i++) {--}}
    {{--node = _ref[_i]--}}
    {{--_results.push(node.textContent = message)--}}
    {{--}--}}

    {{--return _results--}}
    {{--}--}}
    {{--}--}}
    {{--</script>--}}
@stop