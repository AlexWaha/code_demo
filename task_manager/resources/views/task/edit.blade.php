@extends('layout.layout', ['navbar_menu' => 'tasks'])

@section('title', 'Edit task')

@section('header', 'Edit task')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <strong>Task - {{ $task->title }}</strong>
                </div>
                <div class="card-body">
                    @include ('layout.error')
                    @include ('layout.flash')
                    <form action="{{ route('tasks.update', $task) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <fieldset>
                            <div class="row mb-3 required">
                                <label for="input-name" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ old('name', $task->title) }}"
                                           placeholder="Name"
                                           id="input-name" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3 required">
                                <label for="input-description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea id="input-description" name="description"
                                              class="form-control">{{ old('description', $task->description) }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3 required">
                                <label class="col-sm-2 col-form-label" for="projects">Projects
                                    <span class="required" title="This field is required">*</span>
                                </label>
                                <div class="col-sm-10">
                                    @if($projects->isNotEmpty())
                                        <select name="project_id" id="projects" class="form-control"
                                                required="required">
                                            @foreach ($projects as $project)
                                                <option
                                                    value="{{ $project->id }}" {{ $project->id == $task->project->id ? "selected" : "" }}>{{ $project->title }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p class="alert alert-danger">Projects are required to create
                                            a task. Create project first!</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3 required">
                                <label class="col-sm-2 col-form-label" for="statuses">Statuses <span
                                        class="required" title="This field is required">*</span></label>
                                <div class="col-sm-10">
                                    @if($statuses->isNotEmpty())
                                        <select name="status_id" id="statuses" class="form-control" required="required">
                                            @foreach ($statuses as $status)
                                                <option
                                                    value="{{ $status->id }}" {{ $status->id == $task->status->id ? "selected" : "" }}>{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p class="alert alert-danger">Statuses are required to create a task. Create
                                            status first!</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3 required">
                                <label for="input-priority" class="col-sm-2 col-form-label">Priority</label>
                                <div class="col-sm-10">
                                    <input type="number" name="priority" value="{{ old('priority', $task->priority) }}"
                                           placeholder="Priority" id="input-priority" class="form-control"/>
                                </div>
                            </div>
                        </fieldset>
                        <div class="button-group col-sm-12">
                            <div class="text-end">
                                <a class="btn btn-secondary" href="{{ route('tasks.index') }}">
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
