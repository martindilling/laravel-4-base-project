{{ Notification::group('danger', 'warning', 'info', 'success')->showAll() }}

@if ($errors->any())

        <div class="alert alert-dismissable alert-danger" style="margin: 15px 15px 5px;">
            <button type="button" class="close" data-close="alert" aria-hidden="true">&times;</button>
            @if ($errors->any())
            @foreach ($errors->all() as $message)
            <div>
                <i class="fa fa-fw fa-caret-right"></i> {{ $message }}
            </div>
            @endforeach
            @endif
        </div>

@endif
