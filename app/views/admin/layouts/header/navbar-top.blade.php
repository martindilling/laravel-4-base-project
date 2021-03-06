<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-right">
        <ul class="nav navbar-nav">
            @include('admin.layouts.header.navbar-messages')
            @include('admin.layouts.header.navbar-notifications')
            @include('admin.layouts.header.navbar-tasks')
            @include('admin.layouts.header.navbar-account')
        </ul>
    </div>
</nav>

