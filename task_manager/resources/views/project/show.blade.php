@extends('layout.layout', ['navbar_menu' => 'users'])

@section('title', 'User - edit')

@section('header', 'Edit user')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit user</strong>
                </div>
                <div class="card-body">
                    @include ('layout.error')
                    @include ('layout.flash')

                </div>
            </div>
        </div>
@endsection
