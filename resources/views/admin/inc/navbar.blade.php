<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">Blog</a>
    </div>

    <div class="header-right">
        <a class="btn btn-danger" title="Logout" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-exclamation-circle fa-2x"></i></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
</nav>
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <img src="{{ asset('img/user.png') }}" class="img-thumbnail" />
                    <div class="inner-text">
                        Jhon Deo Alex
                        <br />
                        <small>Last Login : 2 Weeks Ago </small>
                    </div>
                </div>

            </li>


            <li>
                <a class="active-menu" href="{{ route('admin-panel.dashboard') }}"><i class="fa fa-dashboard "></i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop "></i>Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin-panel.add-post') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Add Post</a>
                    </li>
                    <li>
                        <a href="{{ route('admin-panel.list-post') }}"><i class="fa fa-list" aria-hidden="true"></i>
                            List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-list-alt"></i>Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin-panel.add-category') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Add Category</a>
                    </li>
                    <li>
                        <a href="{{ route('admin-panel.list-category') }}"><i class="fa fa-list" aria-hidden="true"></i>
                            List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-users" aria-hidden="true"></i>Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin-panel.add-user') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i>Add Users</a>
                    </li>
                    <li>
                        <a href="{{ route('admin-panel.list-user') }}"><i class="fa fa-list" aria-hidden="true"></i>List Users</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin-panel.profile') }}"><i class="fa fa-user" aria-hidden="true"></i>
                    Profile</a>

            </li>
        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->