<!doctype html>
<html>
<head>

	<title>@yield('title','Comments')</title>
	
	@yield('head')
	
</head>

<body>

	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

	@yield('content')
	
	@yield('body')
</body>

</html>