<!DOCTYPE html>
<html lang="en" class="@yield('html-class', '')">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Martin Dilling-Hansen">
    <title>@yield('title', 'Martin Dilling-Hansen')</title>

    <!-- Styles -->
    @yield('layout-styles')
    @yield('styles')


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {{ HTML::script('//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
    {{ HTML::script('//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
    <![endif]-->
</head>
<body class="@yield('body-class', 'skin-blue')">

    @yield('body')

    <!-- Scripts -->
    @yield('layout-scripts')
    @yield('scripts')
</body>
</html>
