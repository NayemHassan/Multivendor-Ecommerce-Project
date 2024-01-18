<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
     <!-- CSS File -->
     @include('vendor.body.css')
	<title> Venvor Page</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        @include('vendor.body.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
        @include('vendor.body.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			@yield('vendor')
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!-- Footer Part -->
        @include('vendor.body.footer')

	</div>
	<!--end wrapper-->
	<!--start switcher-->
    @include('vendor.body.switcher')
	<!--end switcher-->
     <!-- JS File -->
	@include('vendor.body.js')
</body>

</html>