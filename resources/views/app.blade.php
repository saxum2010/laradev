 <!DOCTYPE html>
 <html lang="en" dir="ltr" class="no-js">
 <head>
 	<title>The Title</title>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 	<meta name="description" content="" />
 	<meta name="keywords" content="" />
 	<meta name="robots" content="index,follow" />
 	
 	<link rel="stylesheet" type="text/css" href="{{elixir('css/all.css')}}" />
 </head>
 <body>

	@include('partials.nav')
    
 	<div id="content">
 		<div class="main-content">

			<!--@include('partials.flash')-->
			@include('flash::message')

 			@yield('content')
 		</div>
 	</div>
 	<aside></aside>
 	<footer>

		<script src="/js/all.js" type="text/javascript"></script>
	 	<script>
		 	$('#flash-overlay-modal').modal();
		 	//$('div.alert').not('.alert-important').delay(3000).slideUp(300);
	 	</script>
 		
 		@yield('footer')
 	</footer>

 </body>
 </html>