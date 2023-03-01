<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>

<!--begin::Page Custom Styles(used by this page) -->
<link href="css/login.css" rel="stylesheet" type="text/css" />
<!--end::Page Custom Styles -->


<!-- begin::Body -->
<body  class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading"  >

    <!-- begin::Page loader -->

    <!-- end::Page Loader -->        
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v6 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
                <div class="kt-grid__item  kt-grid__item--order-tablet-and-mobile-2  kt-grid kt-grid--hor kt-login__aside p-0">
                    <img src="images/qtn/qtnTopLeftBKG.png" class="imgTopLeft">

                    <div class="login_negative_spacing_18_success"></div>

                    <div class="kt-login__wrapper" style="z-index: 100;">
                        <div class="kt-login__container">
                            <div class="kt-login__body">
                                <div class="kt-login__signin">
                                    <div class="text-center">
                                        <img src="/images/qtn/success_checkmark.png" style="height: 115px;">
                                    </div>
                                    <div class="kt-login__head text-center" style="margin-top: 35px;">
                                        <span class="kt-login__title signinTitleFont successCongratzFont">CONGRATULATION</span>
                                    </div>

                                    <div class="text-center">
                                        <span class="signupSuccessFont">Your password is reset successful</span>
                                    </div>

                                    <div class="kt-login__form mt-3">
                                        <form class="kt-form" action="">


                                            <div class="kt-login__actions">
                                                <button type="button" class="btn btn-brand btn-pill btn-elevate loginBtn" onclick="window.location='login.php'">Back To Login</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="login_negative_spacing_7_success"></div>
                    <img src="images/qtn/qtnBottomLeftBKG.png" class="imgBottomRight">

                </div>

                <div class="kt-grid__item kt-grid__item--fluid kt-grid__item--center kt-grid kt-grid--ver kt-login__content hidden-xs hidden-sm signupBG">
                    <div class="kt-login__section"></div>
                </div>
            </div>
        </div>          
    </div>

    <!-- end:: Page -->

    <?php include 'sharejs.php'; ?>


</body>

<!-- end::Body -->
</html>

<script>


</script>
