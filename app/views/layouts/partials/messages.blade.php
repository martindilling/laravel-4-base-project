<div class="alerts">

    {{ Notification::group('danger', 'warning', 'info', 'success')->showAll() }}

    @if ($errors->any())
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-close="alert" aria-hidden="true">&times;</button>
        <ul>
            @if ($errors->any())
            @foreach ($errors->all('<li>:message</li>') as $message)
            {{ $message }}
            @endforeach
            @endif
        </ul>
    </div>
    @endif

</div>
