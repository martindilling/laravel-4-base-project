@extends('layouts.master')

@section('title', $user->present()->fullName)

@section('content')

    <div class="row">
        <div class="col-md-12">
            <article>
                <h1>{{ $user->present()->fullName }}</h1>
                <div class="email">{{ $user->present()->email }}</div>
            </article>
        </div>
    </div>

@stop
