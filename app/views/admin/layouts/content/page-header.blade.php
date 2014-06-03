<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('page-header-title', 'Unknown')
        <small>
            @yield('page-header-description', '')
        </small>
    </h1>
    @include('admin.layouts.content.breadcrumb')
</section>
