@include('frontend.body.css')
 
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