@extends('layout.layout', ['navbar_menu' => 'users'])

@section('title', 'User - create')

@section('header', 'Create user')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <strong>Create user</strong>
                </div>
                <div class="card-body">
                    @include ('layout.error')
                    @include ('layout.flash')

                </div>
            </div>
        </div>
@endsection
