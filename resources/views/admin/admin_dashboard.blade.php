<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
     <!-- CSS File -->
     @include('admin.body.css')
	<title>Rukada - Responsive Bootstrap 5 Admin Template</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
        @include('admin.body.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
        @include('admin.body.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			@yield('admin')
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!-- Footer Part -->
        @include('admin.body.footer')

	</div>
	<!--end wrapper-->
	<!--start switcher-->
    @include('admin.body.switcher')
	<!--end switcher-->
     <!-- JS File -->
	@include('admin.body.js')
</body>

</html>