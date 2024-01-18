@include('backend.body.css')
    <!-- Quick view -->
    @include('backend.body.quick_view')
    <!-- Header  -->
    @include('backend.body.header')

   <!-- End Header  -->


    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-12 m-auto">
                        <div class="row">
                            <div class="heading_s1">
                                <img class="border-radius-15" src="{{'backend'}}/assets/imgs/page/reset_password.svg" alt="" />
                                <h2 class="mb-15 mt-15"> Email Password Reset</h2>
                                <p class="mb-30">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <form method="post" action="{{ route('password.email') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input id="email"  type="email" name="email" required autofocus placeholder=" Email " />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                            
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Email Password Reset Link</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pl-50">
                                <h6 class="mb-15">Password must:</h6>
                                <p>Be between 9 and 64 characters</p>
                                <p>Include at least tow of the following:</p>
                                <ol class="list-insider">
                                    <li>An uppercase character</li>
                                    <li>A lowercase character</li>
                                    <li>A number</li>
                                    <li>A special character</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
  
    <!-- Preloader Start -->
    @include('backend.body.footer')

    <!-- Vendor JS-->
    @include('backend.body.js')
</body>

</html>