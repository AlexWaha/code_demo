@extends('layout.layout', ['navbar_menu' => 'users'])

@section('title', 'Edit user')

@section('header', 'Edit user')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit user - {{ $user->email }}</strong>
                </div>
                <div class="card-body">
                    @include ('layout.error')
                    @include ('layout.flash')
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <fieldset>
                            <div class="row mb-3 required">
                                <label for="input-name" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                           placeholder="Username"
                                           id="input-name" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3 required">
                                <label for="input-email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                           placeholder="Email"
                                           id="input-email" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3 required">
                                <label for="input-password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" value="{{ old('password') }}"
                                           placeholder="Password" id="input-password" class="form-control"/>
                                </div>
                            </div>
                            <div class="row mb-3 required">
                                <label for="input-password-confirmation" class="col-sm-2 col-form-label">Confirm
                                    password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password_confirmation"
                                           value="{{ old('password_confirmation') }}"
                                           placeholder="Password" id="input-password-confirmation"
                                           class="form-control"/>
                                </div>
                            </div>
                        </fieldset>
                        <div class="button-group col-sm-12">
                            <div class="text-end">
                                <a class="btn btn-secondary" href="{{ route('users.index') }}">
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
