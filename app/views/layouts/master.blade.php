<!DOCTYPE html>
<html lang="en">
<head>
    @section('title',       Config::get('meta.default.title'))
    @section('description', Config::get('meta.default.description'))
    @section('image',       asset(Config::get('meta.default.image')))

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description')">
    <link rel="author" href="">
    <link type="text/plain" rel="author" href="{{ asset('humans.txt') }}">
    <title>@yield('title') | Base</title>

    @yield('meta')

    <!-- Styles -->
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/alert.css') }}
    {{ HTML::style('assets/css/main.css') }}
    @yield('styles')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ url('assets/vendor/js/html5shiv.js') }}"></script>
    <script src="{{ url('assets/vendor/js/respond.min.js') }}"></script>
    <![endif]-->

    <!-- Google Analytics -->
    @include('layouts.partials.analytics')
</head>
<body>

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <ul class="nav nav-pills" role="navigation">
                        @include('layouts.partials.navbar')
                    </ul>
                </nav>
                <hr>
            </div>
        </div>
    
        @include('layouts.partials.messages')
    
        <main role="main">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    {{ HTML::script('//code.jquery.com/jquery-1.11.1.min.js') }}
    {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/main.js') }}
    @yield('scripts')
</body>
</html>
