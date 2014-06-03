@extends('admin.layouts.master')

@section('title', $user->present()->fullName)
@section('page-header-title', 'Show User')
@section('page-header-description', '')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.users.edit', array('id' => $user->id)) }}" class="btn btn-app">
                <span class="glyphicon glyphicon-pencil"></span>
                Edit
            </a>

            <a href="{{ route('admin.users.destroy', array('id' => $user->id)) }}" class="btn btn-app" data-method="delete" data-confirm="Are you sure?">
                <span class="glyphicon glyphicon-remove"></span>
                Delete
            </a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
    
                {{ Form::open(array('class' => 'form-horizontal', 'role' => 'form')) }}
                <div class="box-body">
                    @include('form.static', [
                        'label' => 'Name:',
                        'text'  => $user->present()->fullName,
                    ])

                    @include('form.static', [
                        'label' => 'Email:',
                        'text'  => $user->present()->email,
                    ])
                </div>
                {{ Form::close() }}
    
            </div>
        </div>
    </div>

@stop
