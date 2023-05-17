@extends('layout.layout', ['navbar_menu' => 'tasks'])

@section('title', 'Edit task')

@section('header', 'Edit task')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <strong>Task: {{ $task->title }}</strong>
                </div>
                <div class="card-body">
                    @include ('layout.error')
                    @include ('layout.flash')
                    <fieldset>
                        <div class="row mb-3 required">
                            <div class="col-sm-2 col-form-label">Title:</div>
                            <div class="col-sm-10 p-2">{{ $task->title }}</div>
                        </div>
                        <div class="row mb-3 required">
                            <div class="col-sm-2 col-form-label">Description:</div>
                            <div class="col-sm-10 p-2">{!! html_entity_decode($task->description, ENT_QUOTES, 'UTF-8') !!}</div>
                        </div>
                        <div class="row mb-3 required">
                            <div class="col-sm-2 col-form-label">Project:</div>
                            <div class="col-sm-10 p-2">{{ $task->project->title }}</div>
                        </div>
                        <div class="row mb-3 required">
                            <div class="col-sm-2 col-form-label">Status:</div>
                            <div class="col-sm-10 p-2">{{ $task->status->name }}</div>
                        </div>
                    </fieldset>
                    <div class="button-group col-sm-12">
                        <div class="text-end">
                            <a class="btn btn-secondary" href="{{ route('tasks.index') }}">
                                <i class="fas fa-arrow-left"></i> go back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
