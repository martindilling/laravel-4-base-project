@extends('admin.layouts.master')

@section('title', 'Users')
@section('page-header-title', 'New User')
@section('page-header-description', 'Create a new user')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                {{ Form::open(array('route' => 'admin.users.store', 'class' => 'form-horizontal', 'role' => 'form')) }}
                    <div class="box-body">
                        @include('admin.users._form')
                    </div>
                    <div class="box-footer">
                        {{ Form::submit('Create User', array('class' => 'btn btn-primary')) }}
                    </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>

@stop
