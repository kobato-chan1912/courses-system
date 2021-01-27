<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from gambolthemes.net/html-items/cursus_demo_f12/sign_up.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jun 2020 12:56:25 GMT -->
@include('loading.header', ["title"=> "Register"])

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
                    <h2>Welcome to Edututs+</h2>
                    <p>Sign Up and Start Learning!</p>
                    <form action="" method="post">
                        @csrf
                        <div class="ui search focus">
                            <div class="ui left icon input swdh11 swdh19">
                                <input class="prompt srch_explore" type="text" name="phone" value="" id="id_fullname" required="" maxlength="64" placeholder="Your Phone">
                            </div>

                        </div>
                        <div class="ui search focus mt-15">
                            <div class="ui left icon input swdh11 swdh19">
                                <input class="prompt srch_explore" type="email" name="email" value="" id="id_email" required="" maxlength="64" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="ui search focus mt-15">
                            <div class="ui left icon input swdh11 swdh19">
                                <input class="prompt srch_explore" type="text" name="name" value="" id="id_email" required="" maxlength="64" placeholder="Your full name ">
                            </div>
                        </div>

                        <div class="ui search focus mt-15">
                            <div class="ui left icon input swdh11 swdh19">
                                <input class="prompt srch_explore" type="password" name="password" value="" id="id_password" required="" maxlength="64" placeholder="Password">
                            </div>
                        </div>

                        <div class="ui search focus mt-15">
                            <div class="ui left icon input swdh11 swdh19">
                                <input class="prompt srch_explore" type="password" name="re_password" value="" id="id_password" required="" maxlength="64" placeholder="Retype Password">
                            </div>
                        </div>

                        <div class="ui form mt-30 checkbox_sign">
                            <div class="inline field">
                                <div class="ui checkbox mncheck">
                                    <input type="checkbox" tabindex="0" class="hidden">
                                    <label>I’m in for emails with exciting discounts and personalized recommendations</label>
                                </div>
                            </div>
                        </div>
                        <button class="login-btn" type="submit">Next</button>
                    </form>
                    <p class="sgntrm145">By signing up, you agree to our <a href="terms_of_use.html">Terms of Use</a> and <a href="terms_of_use.html">Privacy Policy</a>.</p>
                    <p class="mb-0 mt-30">Already have an account? <a href="sign_in.html">Log In</a></p>
                </div>
                <div class="sign_footer"><img src="images/sign_logo.png" alt="">© 2020 <strong>Cursus</strong>. All Rights Reserved.</div>
            </div>
        </div>
    </div>
</div>
<!-- Signup End -->

@include("loading.js")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@error("phone")
<script>
    @include("Alert.errors", ["message"=> $message])
</script>
@enderror

@error("email")
<script>
    @include("Alert.errors", ["message"=> $message])
</script>
@enderror

@error("name")
<script>
    @include("Alert.errors", ["message"=> $message])
</script>
@enderror

@error("password")
<script>
    @include("Alert.errors", ["message"=> $message])
</script>
@enderror

@error("re-password")
<script>
    @include("Alert.errors", ["message"=> $message])
</script>
@enderror
@if(isset($message_password))
    <script>
        @include("Alert.errors", ["message"=> $message_password])
    </script>
    @endif
</body>

<!-- Mirrored from gambolthemes.net/html-items/cursus_demo_f12/sign_up.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jun 2020 12:56:25 GMT -->
</html>
