@extends('admin.layouts.clean')

@section('layout-styles')
    <!-- Bootstrap -->
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
    <!-- font Awesome -->
    {{ HTML::style('assets/AdminLTE/css/font-awesome.min.css') }}
    <!-- Ionicons -->
    {{ HTML::style('assets/AdminLTE/css/ionicons.min.css') }}
    <!-- jQuery UI -->
    {{ HTML::style('assets/AdminLTE/css/jQueryUI/jquery-ui-1.10.3.custom.css') }}
    <!-- fullCalendar -->
    {{ HTML::style('assets/AdminLTE/css/fullcalendar/fullcalendar.css') }}
    {{ HTML::style('assets/AdminLTE/css/fullcalendar/fullcalendar.print.css', ['media' => 'print']) }}
    <!-- Ion Slider -->
    {{ HTML::style('assets/AdminLTE/css/ionslider/ion.rangeSlider.css') }}
    <!-- ion slider Nice -->
    {{ HTML::style('assets/AdminLTE/css/ionslider/ion.rangeSlider.skinNice.css') }}
    <!-- bootstrap slider -->
    {{ HTML::style('assets/AdminLTE/css/bootstrap-slider/slider.css') }}
    <!-- DATA TABLES -->
    {{ HTML::style('assets/AdminLTE/css/datatables/dataTables.bootstrap.css') }}
    <!-- Morris chart -->
    {{ HTML::style('assets/AdminLTE/css/morris/morris.css') }}
    <!-- jvectormap -->
    {{ HTML::style('assets/AdminLTE/css/jvectormap/jquery-jvectormap-1.2.2.css') }}
    <!-- Daterange picker -->
    {{ HTML::style('assets/AdminLTE/css/daterangepicker/daterangepicker-bs3.css') }}
    <!-- iCheck for checkboxes and radio inputs -->
    {{ HTML::style('assets/AdminLTE/css/iCheck/all.css') }}
    <!-- Bootstrap Color Picker -->
    {{ HTML::style('assets/AdminLTE/css/colorpicker/bootstrap-colorpicker.min.css') }}
    <!-- Bootstrap time Picker -->
    {{ HTML::style('assets/AdminLTE/css/timepicker/bootstrap-timepicker.min.css') }}
    <!-- bootstrap wysihtml5 - text editor -->
    {{ HTML::style('assets/AdminLTE/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
    <!-- Theme style -->
    {{ HTML::style('assets/AdminLTE/css/AdminLTE.css') }}
@stop

@section('layout-scripts')
    <!-- jQuery 2.0.2 -->
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js') }}
    <!-- jQuery UI 1.10.3 -->
    {{ HTML::script('assets/AdminLTE/js/jquery-ui-1.10.3.min.js') }}
    <!-- Bootstrap -->
    {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
    <!-- InputMask -->
    {{ HTML::script('assets/AdminLTE/js/plugins/input-mask/jquery.inputmask.js') }}
    {{ HTML::script('assets/AdminLTE/js/plugins/input-mask/jquery.inputmask.date.extensions.js') }}
    {{ HTML::script('assets/AdminLTE/js/plugins/input-mask/jquery.inputmask.extensions.js') }}
    <!-- Ion Slider -->
    {{ HTML::script('assets/AdminLTE/js/plugins/ionslider/ion.rangeSlider.min.js') }}
    <!-- Bootstrap slider -->
    {{ HTML::script('assets/AdminLTE/js/plugins/bootstrap-slider/bootstrap-slider.js') }}
    <!-- DATA TABES SCRIPT -->
    {{ HTML::script('assets/AdminLTE/js/plugins/datatables/jquery.dataTables.js') }}
    {{ HTML::script('assets/AdminLTE/js/plugins/datatables/dataTables.bootstrap.js') }}
    <!-- Morris.js charts -->
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') }}
    {{ HTML::script('assets/AdminLTE/js/plugins/morris/morris.min.js') }}
    <!-- Sparkline -->
    {{ HTML::script('assets/AdminLTE/js/plugins/sparkline/jquery.sparkline.min.js') }}
    <!-- jvectormap -->
    {{ HTML::script('assets/AdminLTE/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}
    {{ HTML::script('assets/AdminLTE/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}
    <!-- fullCalendar -->
    {{ HTML::script('assets/AdminLTE/js/plugins/fullcalendar/fullcalendar.min.js') }}
    <!-- jQuery Knob Chart -->
    {{ HTML::script('assets/AdminLTE/js/plugins/jqueryKnob/jquery.knob.js') }}
    <!-- daterangepicker -->
    {{ HTML::script('assets/AdminLTE/js/plugins/daterangepicker/daterangepicker.js') }}
    <!-- bootstrap color picker -->
    {{ HTML::script('assets/AdminLTE/js/plugins/colorpicker/bootstrap-colorpicker.min.js') }}
    <!-- bootstrap time picker -->
    {{ HTML::script('assets/AdminLTE/js/plugins/timepicker/bootstrap-timepicker.min.js') }}
    <!-- CK Editor -->
    {{ HTML::script('assets/AdminLTE/js/plugins/ckeditor/ckeditor.js') }}
    <!-- Bootstrap WYSIHTML5 -->
    {{ HTML::script('assets/AdminLTE/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
    <!-- iCheck -->
    {{ HTML::script('assets/AdminLTE/js/plugins/iCheck/icheck.min.js') }}
    <!-- AdminLTE App -->
    {{ HTML::script('assets/AdminLTE/js/AdminLTE/app.js') }}
    <!-- Easy delete buttons -->
    {{ HTML::script('assets/js/laravel-restful.js') }}
@stop

@section('body-class', 'skin-blue')

@section('body')

    @include('admin.layouts.header.header')

    <div class="wrapper row-offcanvas row-offcanvas-left">
        @include('admin.layouts.sidebar.sidebar')

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
            @include('admin.layouts.content.page-header')
            @include('admin.layouts.partials.messages')

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
        </aside>
    </div>

@stop
