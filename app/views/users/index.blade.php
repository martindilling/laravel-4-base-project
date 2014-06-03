@extends('layouts.master')

@section('title', 'Users')

@section('content')

    @if ($users->count())
        <div class="row">
            @foreach ($users as $user)
                @include('users._preview')
            @endforeach
        </div>
        
        <div class="pagination-center">
            {{ $pagination }}
        </div>
    @else
        There are no posts
    @endif

@stop
