@extends('admin.layouts.master')

@section('title', 'Users')
@section('page-header-title', 'Users')
@section('page-header-description', 'List of all users')

@section('scripts')
    <script type="text/javascript">
        $(function() {
            $("#userlist").dataTable();
        });
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.users.create') }}" class="btn btn-app btn-primary">
                <span class="glyphicon glyphicon-plus"></span>
                New user
            </a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body table-responsive">

                    @include('admin.AdminLTE.data_table', [
                        'table_id'       => 'userlist',
                        'table_row_view' => 'admin.users._table_row',
                        'table_data'     => $users,
                        'table_header'   => [
                            '#',
                            'Name',
                            'Email',
                            'Created at',
                            'Actions',
                        ],
                    ])

                </div>
            </div>

        </div>
    </div>
@stop
