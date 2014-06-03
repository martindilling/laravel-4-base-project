@extends('admin.layouts.master')

@section('title', 'Dashboard')
@section('page-header-title', 'Dashboard')
@section('page-header-description', '')

@section('scripts')
    <script type="text/javascript">
        $(function() {
            "use strict";

            // LINE CHART
            var line = new Morris.Line({
                element: 'line-chart',
                resize: true,
                data: [
                    {y: '2011 Q1', item1: 2666},
                    {y: '2011 Q2', item1: 2778},
                    {y: '2011 Q3', item1: 4912},
                    {y: '2011 Q4', item1: 3767},
                    {y: '2012 Q1', item1: 6810},
                    {y: '2012 Q2', item1: 5670},
                    {y: '2012 Q3', item1: 4820},
                    {y: '2012 Q4', item1: 15073},
                    {y: '2013 Q1', item1: 10687},
                    {y: '2013 Q2', item1: 8432}
                ],
                xkey: 'y',
                ykeys: ['item1'],
                labels: ['Item 1'],
                lineColors: ['#3c8dbc'],
                hideHover: 'auto'
            });

        });
    </script>
@stop

@section('content')
    <div class="row">

        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $user_count }}</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('admin.users.index') }}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>
                        14
                    </h3>
                    <p>
                        Notifications (dummy)
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios7-alarm-outline"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
                <div class="inner">
                    <h3>
                        160
                    </h3>
                    <p>
                        Products (dummy)
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios7-pricetag-outline"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Line Chart</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="line-chart" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>
@stop
