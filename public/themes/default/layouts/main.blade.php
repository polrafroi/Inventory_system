
<!DOCTYPE html>
<html>
<head>
    <title>{!! Theme::get('title') !!}</title>
    <meta charset="utf-8">
    <meta name="keywords" content="{!! Theme::get('keywords') !!}">
    <meta name="description" content="{!! Theme::get('description') !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    {!! Theme::asset()->styles() !!}
    {!! Theme::asset()->scripts() !!}
</head>
<body>
<div id="wrapper">
    <div class="overlay"></div>

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Lorem Ipsum
                </a>
            </li>
            <li>
                <a href="{{ URL::to('dashboard') }}"><i class="fa fa-fw fa-home"></i> Dashboard</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-user"></i>Users<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Action</li>
                    <li><a href="{{ URL::to('user') }}">Manage Users</a></li>
                    <li><a href="#">Change Password</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-shopping-cart"></i>Products<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Action</li>
                    <li><a href="">Manage Products</a></li>
                    <li><a href="#">Product In</a></li>
                    <li><a href="#">Product Out</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-line-chart"></i>Reports<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Action</li>
                    <li><a href="#">aa</a></li>
                    <li><a href="#">aa</a></li>
                    <li><a href="#">aa</a></li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="user-online">
            <div class="name-online">{!! Auth::user()->store_name.'-'.Auth::user()->firstname.' '.Auth::user()->lastname !!}</div>
            <div class="img-online">
                <img class="slide-image" src="http://placehold.it/1344x523" alt="">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {!! Theme::content() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
</div>
</body>
</html>

