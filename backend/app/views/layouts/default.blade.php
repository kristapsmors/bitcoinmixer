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
	
	{{ Basset::show('auth.css') }}

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	<!-- navbar -->
    <header class="navbar navbar-inverse" role="banner">
        <div class="navbar-header text-center">
            <a class="navbar-brand" href="maxtraffic-dashboard.html"><img src="{{ asset('assets/img/maxtraffic-logo.png') }}"></a>
        </div>
        <ul class="nav navbar-nav pull-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Choose website
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="maxtraffic-dashboard.html">doublesun.lv</a></li>
                    <li><a href="maxtraffic-dashboard.html">bestclothes.lv</a></li>
                </ul>
            </li>
            <li class="settings">
                <a href="maxtraffic-manage-websites.html" role="button">
                    <i class="icon-cog"></i>
                </a>
            </li>
            <li class="settings">
                <a href="maxtraffic-signin.html" role="button">
                    <i class="icon-share-alt"></i>
                </a>
            </li>
        </ul>
    </header>
    <!-- end navbar -->

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="maxtraffic-dashboard.html">
                    <i class="icon-signal"></i>
                    <span>doublesun.lv</span>
                </a>
            </li>
            <li>
                <a href="maxtraffic-dashboard.html">
                    <i class="icon-signal"></i>
                    <span>bestclothes.lv</span>
                </a>
            </li>
            <li>
                <a href="maxtraffic-manage-websites.html">
                    <i class="icon-cog"></i>
                    <span>Manage websites</span>
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
    {{ Basset::show('auth.js') }}
    
    @section('javascript')
	@show

</body>
</html>