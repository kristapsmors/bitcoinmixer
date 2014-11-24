<!DOCTYPE html>
<html class="login-bg">
<head>
	<title>
		@section('title')
		@show
		MaxTraffic</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	{{ Basset::show('auth.css') }}

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>

    <!-- Content -->
	@yield('content')
	<!-- ./ content -->

	<!-- scripts -->
   {{ Basset::show('auth.js') }}
</body>
</html>