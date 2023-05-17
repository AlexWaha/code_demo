@extends('layout.layout', ['navbar_menu' => 'statuses'])

@section('title', 'Edit status')

@section('header', 'Edit status')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit status - {{ $status->name }}</strong>
                </div>
                <div class="card-body">
                    @include ('layout.error')
                    @include ('layout.flash')
                    <form action="{{ route('statuses.update', $status) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <fieldset>
                            <div class="row mb-3 required">
                                <label for="input-name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ old('name', $status->name) }}"
                                           placeholder="Name"
                                           id="input-name" class="form-control"/>
                                </div>
                            </div>
                        </fieldset>
                        <div class="button-group col-sm-12">
                            <div class="text-end">
                                <a class="btn btn-secondary" href="{{ route('statuses.index') }}">
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
