@extends('frontend.master_dashboard')
@section('main')

<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span>Verify Email Page
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-md-12 m-auto">
                        <div class="row">
                            <div class="heading_s1">
                                <img class="border-radius-15" src="{{'backend'}}/assets/imgs/page/reset_password.svg" alt=""style="margin-right:20px" /><b><span style="font-size:40px">Verify Your Email</span></b><br><br>
                                <div class="mb-4 text-sm text-gray-600">
                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </div>
                               
                             
                            </div>
                            <div class="row">
                            <div class="col-md-4">
                              @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600" style="color:green">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                              @endif
                            <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <button  type="submit" class="btn btn-sm" style="font-size:14px;background:#ECF0F1;color:#000">Resend Verification Email</button>
                           </form>
                           </div>
                           <div class="col-md-8">
                           <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button class="btn btn-sm" style="font-size:14px;background:#FEF9E7;color:#000" type="submit" >
                                {{ __('Log Out') }}
                            </button>
                        </form>
                        </div>
                        </div>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection