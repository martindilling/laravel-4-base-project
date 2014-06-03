@extends('admin.layouts.master')

@section('title', 'Users')
@section('page-header-title', 'Edit User')
@section('page-header-description', 'Edit an existing user')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                {{ Form::model($user, array('route' => array('admin.users.update', $user->id), 'class' => 'form-horizontal', 'role' => 'form')) }}
                    <div class="box-body">
                        @include('admin.users._form')
                    </div>
                    <div class="box-footer">
                        {{ Form::submit('Save User', array('class' => 'btn btn-primary')) }}
                    </div>
                {{ Form::close() }}

            </div>
        </div>
    </div>

@stop
