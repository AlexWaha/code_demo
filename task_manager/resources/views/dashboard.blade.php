@extends('layout.layout')

@section('title', 'Home - Dashboard')

@section('header', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <strong>Most recent Projects</strong>
                </div>
                <div class="card-body">
                    @if(!empty($projects))
                        <div class="row">
                            @foreach($projects as $project)
                                <div class="col-sm-4">
                                    <div class="card mb-2">
                                        <div class="card-header"><a
                                                href="{{ route('projects.show', $project) }}">{{ $project->title }}</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3 required">
                                                <div class="col-sm-2 col-form-label">Tasks:</div>
                                                <div class="col-sm-10 p-2">
                                                    @if($project->tasks)
                                                        <ul class="list-unstyled">
                                                            @foreach($project->tasks as $task)
                                                                <li>
                                                                    <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
