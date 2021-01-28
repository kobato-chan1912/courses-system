<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from gambolthemes.net/html-items/cursus_demo_f12/forgot_password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jun 2020 12:59:15 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=9">
    <meta name="description" content="Gambolthemes">
    <meta name="author" content="Gambolthemes">
    <title>Cursus - Forgot Password</title>

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="images/fav.png">

    <!-- Stylesheets -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet'>
    <link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
    <link href="css/vertical-responsive-menu.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/night-mode.css" rel="stylesheet">

    <!-- Vendor Stylesheets -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">

</head>

<body class="sign_in_up_bg">
<!-- Signup Start -->
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
                <h2>Request a Password Reset</h2>
                <form action="" method="post">
                    @csrf
                    <div class="ui search focus mt-50">
                        <div class="ui left icon input swdh95">
                            <input class="prompt srch_explore" type="email" name="email" value="" id="id_email" required="" maxlength="64" placeholder="Email Address">
                            <i class="uil uil-envelope icon icon2"></i>
                        </div>
                        @if(isset($message))
                            <p class="text-danger">{{$message}}</p>
                        @endif
                    </div>
                    <button class="login-btn" type="submit">Reset Password</button>
                </form>
                <p class="mb-0 mt-30">Go Back <a href="sign_up.html">Sign In</a></p>
            </div>
            <div class="sign_footer"><img src="images/sign_logo.png" alt="">© 2020 <strong>Cursus</strong>. All Rights Reserved.</div>
        </div>
    </div>
</div>
<!-- Signup End -->

<script src="js/jquery-3.3.1.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/OwlCarousel/owl.carousel.js"></script>
<script src="vendor/semantic/semantic.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/night-mode.js"></script>

</body>

<!-- Mirrored from gambolthemes.net/html-items/cursus_demo_f12/forgot_password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jun 2020 12:59:15 GMT -->
</html>
