
    @include('frontend.body.css')
    <!-- Modal -->
 
    <!-- Quick view -->
    @include('frontend.body.quick_view')
    <!-- Header  -->
    
    @include('frontend.body.header')
   <!-- End Header  -->

    
    <!--End header-->
    <main class="main">
       @yield('main')
    </main>

    @include('frontend.body.footer')

    <!-- Preloader Start -->
   
    <!-- Vendor JS-->
    @include('frontend.body.js')
</body>

</html>