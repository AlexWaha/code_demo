@extends('layout.layout')

@section('body_class', 'login_container')
@section('title', 'Dashboard Login')

@section('header', 'Dashboard Login')

@section('content')
    <div class="row justify-content-sm-center">
        <div class="col-sm-6 col-md-6 col-lg-4">
            @include('layout.flash')
            @include('layout.error')
            <div class="card">
                <div class="card-header"><i class="fa-solid fa-lock"></i> Login</div>
                <div class="card-body">
                    <form id="form-login" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="input-email" class="form-label">{{ 'Email' }}</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
                                <input type="text" name="email" value="" placeholder="{{ 'Email' }}"
                                       id="input-email" class="form-control"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input-password" class="form-label">{{ 'Password' }}</label>
                            <div class="input-group mb-2">
                                <div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
                                <input type="password" name="password" value="" placeholder="{{ 'Password' }}"
                                       id="input-password" class="form-control"/>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-key"></i> {{ 'Login' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
