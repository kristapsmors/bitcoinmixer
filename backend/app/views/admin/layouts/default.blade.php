<!DOCTYPE html>
<html class="login-bg">
<head>
	<title>
		@section('title')
			Administration
		@show
		 | MaxTraffic</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	{{ Basset::show('application.css') }}

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	<!-- navbar -->
    <header class="navbar navbar-inverse" role="banner">
        <div class="navbar-header text-center">
            <a class="navbar-brand" href="{{{ URL::to('admin/users') }}}"><img height="24" src="{{ asset('assets/img/logo.png') }}"></a>
        </div>
        <ul class="nav navbar-nav pull-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    {{{ Lang::get('main.super_admin') }}}
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{{ URL::to('admin/users') }}}">{{{ Lang::get('main.users') }}}</a></li>
                </ul>
            </li>
            <li class="settings">
                <a href="{{{ URL::to('admin/users') }}}" role="button">
                    <i class="icon-cog"></i>
                </a>
            </li>
            <li class="settings">
                <a href="{{{ URL::to('logout') }}}" role="button">
                    <i class="icon-share-alt"></i>
                </a>
            </li>
        </ul>
    </header>
    <!-- end navbar -->

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li {{ (Request::is('admin/orders') ? ' class="active"' : '') }}>
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="{{{ URL::to('admin/orders') }}}">
                    <i class="icon-usd"></i>
                    <span>Transactions</span>
                </a>
            </li>
            <li {{ (Request::is('admin/users') ? ' class="active"' : '') }}>
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="{{{ URL::to('admin/users') }}}">
                    <i class="icon-group"></i>
                    <span>{{{ Lang::get('main.users') }}}</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->


    <!-- main container -->
    <div class="content">

	    <!-- Content -->
		@yield('content')
		<!-- ./ content -->

	</div>

	<!-- scripts -->
    {{ Basset::show('application.js') }}
    
    @section('scripts')
	@show

</body>
</html>