@extends('layout.layout', ['navbar_menu' => 'projects'])

@section('title', 'Project details')

@section('header', 'Project details')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <strong>Project: {{ $project->title }}</strong>
                </div>
                <div class="card-body">
                    @include ('layout.error')
                    @include ('layout.flash')
                    <fieldset>
                        <div class="row mb-3 required">
                            <div class="col-sm-2 col-form-label">Title:</div>
                            <div class="col-sm-10 p-2">{{ $project->title }}</div>
                        </div>
                        <div class="row mb-3 required">
                            <div class="col-sm-2 col-form-label">Description:</div>
                            <div class="col-sm-10 p-2">
                                {!! html_entity_decode($project->description, ENT_QUOTES, 'UTF-8') !!}
                            </div>
                        </div>
                        <div class="row mb-3 required">
                            <div class="col-sm-2 col-form-label">Tasks:</div>
                            <div class="col-sm-10 p-2">
                                @if($project->tasks)
                                    <ul class="list-unstyled">
                                        @foreach($project->tasks as $task)
                                            <li><a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </fieldset>
                    <div class="button-group col-sm-12">
                        <div class="text-end">
                            <a class="btn btn-secondary" href="{{ route('projects.index') }}">
                                <i class="fas fa-arrow-left"></i> go back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
