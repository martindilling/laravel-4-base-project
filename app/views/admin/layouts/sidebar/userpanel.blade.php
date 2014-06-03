<!-- Sidebar user panel -->
<div class="user-panel">
    <div class="pull-left image">
        <img src="{{ asset('assets/img/avatars/avatar5.png') }}" class="img-circle" alt="User Image"/>
    </div>
    <div class="pull-left info">
        <p>{{ $current_user->present()->fullName }}</p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>
