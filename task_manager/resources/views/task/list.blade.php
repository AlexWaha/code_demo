@extends('layout.layout', ['navbar_menu' => 'tasks'])

@section('title', 'Tasks')

@section('header', 'Tasks')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <strong>Tasks</strong>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{ route('tasks.create') }}" class="btn btn-success" data-bs-toggle="tooltip"
                               title="Add Status"><i class="fas fa-Status-plus"></i> <span
                                    class="d-none d-md-inline">Add task</span> </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include ('layout.error')
                    @include ('layout.flash')
                    <div class="table-responsive">
                        <table id="task-list" class="table table-responsive-lg">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center align-top">ID</th>
                                <th scope="col" class="text-start align-top">Title</th>
                                <th scope="col" class="text-center align-top">Project</th>
                                <th scope="col" class="text-center align-top">User</th>
                                <th scope="col" class="text-center align-top">Priority</th>
                                <th scope="col" class="text-center align-top">Status</th>
                                <th scope="col" class="text-center align-top d-none d-lg-table-cell">Created at</th>
                                <th scope="col" class="text-center align-top d-none d-lg-table-cell">Updated at</th>
                                <th scope="col" class="text-end align-top">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($tasks->items()))
                                @foreach ($tasks as $task)
                                    <tr data-id="{{ $task->id }}">
                                        <th scope="row" class="text-center align-middle">
                                            <a href="{{ route('tasks.show', $task) }}">{{ $task->id }}</a>
                                        </th>
                                        <td class="text-start">{{ $task->title }}</td>
                                        <td class="text-center">{{ $task->project->title }}</td>
                                        <td class="text-center">{{ $task->user->name }}</td>
                                        <td class="text-center">{{ $task->priority }}</td>
                                        <td class="text-center">{{ $task->status->name }}</td>
                                        <td class="text-center">{{ $task->created_at }}</td>
                                        <td class="text-center d-none d-lg-table-cell">{{ $task->updated_at }}</td>
                                        <td class="text-end">
                                            @if(auth()->user()->is_admin)
                                                <form method="POST" action="{{ route('tasks.destroy', $task) }}"
                                                      class="form-inline">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a class="btn btn-primary" data-bs-toggle="tooltip" title="Show"
                                                       href="{{ route('tasks.show', $task) }}">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                       href="{{ route('tasks.edit', $task) }}">
                                                        <i class="fas fa-pencil"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger"
                                                            data-bs-toggle="tooltip" title="Delete"
                                                            onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <a class="btn btn-primary" data-bs-toggle="tooltip" title="Show"
                                                   href="{{ route('tasks.show', $task) }}">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                   href="{{ route('tasks.edit', $task) }}">
                                                    <i class="fas fa-pencil"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">
                                        <div class="p-2 text-center h5">Tasks not found!</div>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
