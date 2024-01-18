@include('frontend.body.css')
    
    <!-- Quick view -->
    @include('frontend.body.quick_view')

    <!-- Header  -->
    @include('frontend.body.header')

    <!--End header-->

    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> Vendor Account
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Create an Account</h1>
                                            <p class="mb-30">Already have an  account? <a href="{{ route('vendor.login') }}">Vendor Login</a></p>
                                        </div>
                                        <form method="POST" action="{{ route('vendor.store.register') }}" >
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required id="name"  name="name" autocomplete="name"   placeholder="Shop Name" />
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required id="name"  name="username" autocomplete="name"   placeholder="User Name" />
                                                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <input id="email" type="email" name="email" required  placeholder="Enter Your Email" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <input id="email" type="text" name="phone" required autocomplete="username" placeholder="Enter Your Number" />
                                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <input id="email" type="text" name="address" required autocomplete="username" placeholder="Your Address" />
                                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                            </div>
                                            <div class="form-group inputAddress2">
                                                <textarea class="form-control"  name ="vendor_details"id="inputAddress2" placeholder="Vendor Details" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                            <select class="form-select mb-3" name="vendor_join" aria-label="Default select example">
                                                <option selected="" value ="">Vendor Join Year</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password" />
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>

                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="" />
                                                        <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                                    </div>
                                                </div>
                                                <a href="#"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                            </div>
                                            <div class="form-group mb-30">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" name="login">Submit &amp; Register</button>
                                            </div>
                                            <p class="font-xs text-muted"><strong>Note:</strong>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy</p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <div class="card-login mt-115">
                                    <a href="#" class="social-login facebook-login">
                                        <img src="{{'backend'}}/assets/imgs/theme/icons/logo-facebook.svg" alt="" />
                                        <span>Continue with Facebook</span>
                                    </a>
                                    <a href="#" class="social-login google-login">
                                        <img src="{{'backend'}}/assets/imgs/theme/icons/logo-google.svg" alt="" />
                                        <span>Continue with Google</span>
                                    </a>
                                    <a href="#" class="social-login apple-login">
                                        <img src="{{'backend'}}/assets/imgs/theme/icons/logo-apple.svg" alt="" />
                                        <span>Continue with Apple</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!--Footer and Preloader Start -->
    @include('frontend.body.footer')

    <!-- Vendor JS-->
    @include('frontend.body.js')

</body>

</html>