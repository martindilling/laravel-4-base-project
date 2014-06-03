@extends('admin.layouts.clean')

@section('title', 'Register')

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
        <div class="header">Register New Membership</div>
        {{ Form::open(array('route' => 'users.postRegister')) }}
            <div class="body bg-gray">
                @include('admin.layouts.partials.messages')
                <div class="form-group">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Full name']) }}
                </div>
                <div class="form-group">
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                </div>
                <div class="form-group">
                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                </div>
                <div class="form-group">
                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Retype password']) }}
                </div>
            </div>
            <div class="footer">
    
                {{ Form::submit('Sign up', array('class' => 'btn bg-olive btn-block')) }}
    
                <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
            </div>
        {{ Form::close() }}
    
        <div class="margin text-center">
            <span>Register using social networks</span>
            <br/>
            <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
            <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
            <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>
    
        </div>
    </div>

@stop
