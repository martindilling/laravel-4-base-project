{{--
@param  string  $table_id
@param  string  $table_row_view
@param  array   $table_data
@param  array   $table_header
--}}

@if (count($table_data))
    <table id="{{ $table_id }}" class="table table-bordered table-striped">
        <thead>
            <tr>
                @foreach ($table_header as $item)
                    <th>{{ $item }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($table_data as $item)
                @include($table_row_view)
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                @foreach ($table_header as $item)
                    <th>{{ $item }}</th>
                @endforeach
            </tr>
        </tfoot>
    </table>
@else
    <br>
    <div class="alert alert-info">
        <i class="fa fa-info"></i>
        <b>Sorry!</b> It looks like there isn't anything here yet :(
    </div>
@endif
