@extends('admin.layouts.clean')

@section('title', 'Login')

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
        <div class="header">Sign In</div>
        {{ Form::open(array('route' => 'sessions.store')) }}
            <div class="body bg-gray">
                @include('admin.layouts.partials.messages')
                <div class="form-group">
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'autofocus']) }}
                </div>
                <div class="form-group">
                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                </div>
                <div class="form-group">
                    <label>
                        {{ Form::checkbox('remember-me', 'false') }}
                        Remember me
                    </label>
                </div>
            </div>
            <div class="footer">
                {{ Form::submit('Sign in', array('class' => 'btn bg-olive btn-block')) }}
    
                <p><a href="{{ route('password.getRemind') }}">I forgot my password</a></p>
    
                <a href="{{ route('users.register') }}" class="text-center">Register a new membership</a>
            </div>
        {{ Form::close() }}
    
        <div class="margin text-center">
            <span>Sign in using social networks</span>
            <br/>
            <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
            <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
            <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>
        </div>
    </div>

@stop
