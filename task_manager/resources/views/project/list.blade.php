@extends('layout.layout', ['navbar_menu' => 'projects'])

@section('title', 'Projects')

@section('header', 'Projects')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <strong>Projects</strong>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{ route('projects.create') }}" class="btn btn-success" data-bs-toggle="tooltip"
                               title="Add Status"><i class="fas fa-Status-plus"></i> <span
                                    class="d-none d-md-inline">Add project</span> </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include ('layout.error')
                    @include ('layout.flash')
                    <div class="table-responsive">
                        <table class="table table-responsive-lg">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center align-top">ID</th>
                                <th scope="col" class="text-start align-top">Title</th>
                                <th scope="col" class="text-center align-top d-none d-lg-table-cell">Created at</th>
                                <th scope="col" class="text-center align-top d-none d-lg-table-cell">Updated at</th>
                                <th scope="col" class="text-end align-top">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($projects->items()))
                                @foreach ($projects as $project)
                                    <tr>
                                        <th scope="row" class="text-center align-middle"><a
                                                href="{{ route('projects.show', $project) }}">{{ $project->id }}</a>
                                        </th>
                                        <td class="text-start">{{ $project->title }}</td>
                                        <td class="text-center">{{ $project->created_at }}</td>
                                        <td class="text-center d-none d-lg-table-cell">{{ $project->updated_at }}</td>
                                        <td class="text-end">
                                            @if(auth()->user()->is_admin)
                                                <form method="POST" action="{{ route('projects.destroy', $project) }}"
                                                      class="form-inline">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a class="btn btn-primary" data-bs-toggle="tooltip" title="Show"
                                                       href="{{ route('projects.show', $project) }}">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                       href="{{ route('projects.edit', $project) }}">
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
                                                   href="{{ route('projects.show', $project) }}">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                   href="{{ route('projects.edit', $project) }}">
                                                    <i class="fas fa-pencil"></i>
                                                </a>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        <div class="p-2 text-center h5">Projects not found!</div>
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
