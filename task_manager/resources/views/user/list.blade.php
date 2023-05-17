@extends('layout.layout', ['navbar_menu' => 'users'])

@section('title', 'Users list')

@section('header', 'Users list')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <strong>Users list</strong>
                        </div>
                        <div class="col-4 text-end">
                            <a href="{{ route('users.create') }}" class="btn btn-success" data-bs-toggle="tooltip"
                               title="Add User"><i class="fas fa-user-plus"></i> <span
                                    class="d-none d-md-inline">Add User</span> </a>
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
                                <th scope="col" class="text-center align-middle">ID</th>
                                <th scope="col" class="text-start align-top">Name</th>
                                <th scope="col" class="text-start align-top">Email</th>
                                <th scope="col" class="text-center  align-top d-none d-lg-table-cell">Is Admin</th>
                                <th scope="col" class="text-center align-top">Created at</th>
                                <th scope="col" class="text-center align-top d-none d-lg-table-cell">Updated at</th>
                                <th scope="col" class="text-end align-top">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($users->items()))
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $user->id }}</th>
                                        <td class="text-start">{{ $user->name }}</td>
                                        <td class="text-start">{{ $user->email }}</td>
                                        <td class="text-center d-none d-lg-table-cell">
                                            @if($user->is_admin)
                                                <span class="badge bg-success">Yes</span>
                                            @else
                                                <span class="badge bg-danger">No</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $user->created_at }}</td>
                                        <td class="text-center d-none d-lg-table-cell">{{ $user->updated_at }}</td>
                                        <td class="text-end">
                                            @if(auth()->user()->is_admin)
                                                <form method="POST" action="{{ route('users.destroy', $user) }}"
                                                      class="form-inline">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                       href="{{ route('users.edit', $user) }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    @if($user->id !== auth()->user()->id)
                                                        <button type="submit" class="btn btn-danger"
                                                                data-bs-toggle="tooltip" title="Delete"
                                                                onclick="return confirm('Are you sure?')">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    @else
                                                        <button type="button" class="btn btn-danger"
                                                                data-bs-toggle="tooltip" title="Delete" disabled>
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                            @else
                                                <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                   href="{{ route('users.edit', $user) }}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        <div class="p-2 text-center h5">Users not found!</div>
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
