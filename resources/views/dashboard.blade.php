<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>User Dasshboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{'backend'}}/assets/imgs/theme/favicon.svg" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{'backend'}}/assets/css/main.css?v=5.3" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body>
 
   @include('frontend.body.quick_view')
 
    <!-- Header  -->
    @include('frontend.body.header')
    <!--End header-->

    <main class="main pages">
       @yield('user')
    </main>
    
    <!--Footer and  Preloader Start -->
    @include('frontend.body.footer')
    <!-- Vendor JS-->
   @include('frontend.body.js')
</body>

</html>