<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">COMPANY NAME</a>
    </div>

    <div class="header-right">
        
        <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>

    </div>
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
                <a class="active-menu" href="index.html"><i class="fa fa-dashboard "></i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop "></i>Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="panel-tabs.html"><i class="fa fa-toggle-on"></i>Add Post</a>
                    </li>
                    <li>
                        <a href="notification.html"><i class="fa fa-bell "></i>List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="table.html"><i class="fa fa-flash "></i>Profile</a>

            </li>
        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->