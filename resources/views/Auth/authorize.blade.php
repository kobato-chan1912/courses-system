<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from gambolthemes.net/html-items/cursus_demo_f12/sign_in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jun 2020 12:56:11 GMT -->
@include("loading.header", ["title" => "Login"])

<body>
<!-- Signup Start -->
<div class="sign_in_up_bg">
    <div class="container">
        <div class="row justify-content-lg-center justify-content-md-center">
            <div class="col-lg-12">
                <div class="main_logo25" id="logo">
                    <a href="index.html"><img src="images/logo.svg" alt=""></a>
                    <a href="index.html"><img class="logo-inverse" src="images/ct_logo.svg" alt=""></a>
                </div>
            </div>

            <div class="col-lg-6 col-md-8">
                <div class="sign_form">
                    <h2>Your authorize url has been sent to your email.</h2>
                    <p>Login to your email and go to the url.</p>

                    {{--                    <button class="social_lnk_btn color_btn_fb"><i class="uil uil-facebook-f"></i>Continue with Facebook</button>--}}
                    {{--                    <button class="social_lnk_btn mt-15 color_btn_tw"><i class="uil uil-twitter"></i>Continue with Twitter</button>--}}
                    {{--                    <button class="social_lnk_btn mt-15 color_btn_go"><i class="uil uil-google"></i>Continue with Google</button>--}}

                    <a href=""><button class="login-btn"  type="submit">Resend</button></a>
                    <p class="sgntrm145">Or <a href="forgot_password.html">Forgot Password</a>.</p>
                    <p class="mb-0 mt-30 hvsng145">Don't have an account? <a href="{{route('getRegister')}}">Sign Up</a></p>
                </div>
                <div class="sign_footer"><img src="images/sign_logo.png" alt="">© 2020 <strong>Cursus</strong>. All Rights Reserved.</div>
            </div>
        </div>
    </div>
</div>
<!-- Signup End -->

@include("loading.js")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@if(session()->get('success'))
<script>
    @include("Alert.success")
</script>
@endif

</body>

<!-- Mirrored from gambolthemes.net/html-items/cursus_demo_f12/sign_in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jun 2020 12:56:11 GMT -->
</html>
