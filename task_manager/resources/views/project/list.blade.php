@extends('layout.layout', ['navbar_menu' => 'projects'])

@section('title', 'Home - Users list')

@section('header', 'Users list')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <strong>Users list</strong>
                </div>
                <div class="card-body">
                    @include ('layout.error')
                    @include ('layout.flash')
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-start">Name</th>
                            <th class="text-start">Email</th>
                            <th class="text-center">Is Admin</th>
                            <th class="text-center">Created at</th>
                            <th class="text-center">Updated at</th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($users))
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center"><a
                                            href="{{ route('users.show', $user) }}">{{ $user->id }}</a></td>
                                    <td class="text-start">{{ $user->name }}</td>
                                    <td class="text-start">{{ $user->email }}</td>
                                    <td class="text-center">
                                        @if($user->is_admin)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-danger">No</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $user->created_at }}</td>
                                    <td class="text-center">{{ $user->updated_at }}</td>
                                    <td class="text-end">
                                        @if(auth()->user()->is_admin)
                                            <form method="POST"
                                                  action="{{ route('users.destroy', $user) }}"
                                                  class="form-inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                                   href="{{ route('users.edit', $user) }}">
                                                    <i class="fa fa-pencil"></i></a>
                                                <button type="submit" class="btn btn-danger"
                                                        data-bs-toggle="tooltip" title="Delete"
                                                        onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        @else
                                            <a class="btn btn-primary" data-bs-toggle="tooltip" title="Edit"
                                               href="{{ route('users.edit', $user) }}">
                                                <i class="fa fa-pencil"></i></a>
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
@endsection
