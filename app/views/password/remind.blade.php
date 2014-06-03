@extends('admin.layouts.clean')

@section('title', 'Reset password')

@section('styles')
    <!-- Bootstrap -->
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
    <!-- font Awesome -->
    {{ HTML::style('assets/AdminLTE/css/font-awesome.min.css') }}
    <!-- Theme style -->
    {{ HTML::style('assets/AdminLTE/css/AdminLTE.css') }}
@stop

@section('layout-scripts')
    <!-- jQuery 2.0.2 -->
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js') }}
    <!-- Bootstrap -->
    {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
@stop

@section('html-class', 'bg-black')
@section('body-class', 'bg-black')

@section('body')

<div class="form-box" id="login-box">
    <div class="header">Reset Password</div>
    {{ Form::open(array('route' => 'password.postRemind')) }}
    <div class="body bg-gray">
        @include('admin.layouts.partials.messages')
        <div class="form-group">
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'autofocus']) }}
        </div>
    </div>
    <div class="footer">
        {{ Form::submit('Reset', array('class' => 'btn bg-olive btn-block')) }}

        <p><a href="{{ route('login') }}" class="text-center">I already have a membership</a></p>

        <a href="{{ route('users.register') }}" class="text-center">Register a new membership</a>
    </div>
    {{ Form::close() }}
</div>

@stop
