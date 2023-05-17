@extends('layout.layout', ['navbar_menu' => 'projects'])

@section('title', 'Create project')

@section('header', 'Create project')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <strong>Create project</strong>
                </div>
                <div class="card-body">
                    @include ('layout.error')
                    @include ('layout.flash')
                    <form action="{{ route('projects.store') }}" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="row mb-3 required">
                                <label for="input-title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Title"
                                           id="input-title" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3 required">
                                <label for="input-description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="input-description" name="description"
                                              class="form-control">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </fieldset>
                        <div class="button-group col-sm-12">
                            <div class="text-end">
                                <a class="btn btn-secondary" href="{{ route('projects.index') }}">
                                    <i class="fas fa-arrow-left"></i> go back</a>
                                <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/ckeditor/config.js') }}"></script>

    <script>
        $(document).ready(function () {
            CKEDITOR.replace('input-description');
        });
    </script>
@endsection
