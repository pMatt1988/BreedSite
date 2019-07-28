@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-header">Integration Demo Page</h1>
        <div class="row">

            <div class="col-md-6">
                <h2 class="mt-4">Standalone Image Button</h2>
                <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
                    <input id="thumbnail" class="form-control" type="text" name="filepath" title="None">
                </div>
                <div id="holder" style="margin-top:15px;max-height:100px;"></div>
            </div>
        </div>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

    <script>
        $('#lfm').filemanager('image');
    </script>

@endsection