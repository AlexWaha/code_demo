@extends('layout.layout', ['navbar_menu' => 'statuses'])

@section('title', 'Statuses')

@section('header', 'Statuses')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <strong>Statuses</strong>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{ route('statuses.create') }}" class="btn btn-success" data-bs-toggle="tooltip"
                               title="Add Status"><i class="fas fa-Status-plus"></i> <span
                                    class="d-none d-md-inline">Add Status</span> </a>
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
                                <th scope="col" class="text-start align-top">Name</th>
                                <th scope="col" class="text-center align-top">Created at</th>
                                <th scope="col" class="text-center align-top d-none d-lg-table-cell">Updated at</th>
                                <th scope="col" class="text-end align-top">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($statuses->items()))
                                @foreach ($statuses as $status)
                                        <tr @if($status->deleted_at) class="bg-danger bg-opacity-25" @endif>
                                        <th scope="row" class="text-center align-middle">{{ $status->id }}</th>
                                        <td class="text-start">{{ $status->name }} @if($status->deleted_at) <b class="text-danger">(Deleted)</b> @endif</td>
                                        <td class="text-center">{{ $status->created_at }}</td>
                                        <td class="text-center d-none d-lg-table-cell">{{ $status->updated_at }}</td>
                                        <td class="text-end">
                                            @if(auth()->user()->is_admin && !$status->deleted_at)
                                                <form method="POST" action="{{ route('statuses.destroy', $status) }}"
                                                      class="form-inline">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                       href="{{ route('statuses.edit', $status) }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger"
                                                            data-bs-toggle="tooltip" title="Delete"
                                                            onclick="return confirm('Are you sure?')">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                   href="{{ route('statuses.edit', $status) }}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        <div class="p-2 text-center h5">Statuses not found!</div>
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
