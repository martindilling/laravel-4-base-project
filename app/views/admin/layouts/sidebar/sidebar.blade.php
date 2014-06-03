<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        @include('admin.layouts.sidebar.userpanel')
        @include('admin.layouts.sidebar.searchbar')

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            @include('admin.layouts.sidebar.menuitems')
        </ul>
    </section>
</aside>
