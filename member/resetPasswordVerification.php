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
                    <div class="login_negative_spacing_18"></div>
                    <div class="kt-login__wrapper" style="z-index: 100;">
                        <div class="kt-login__container">
                            <div class="kt-login__body">
                                <div class="kt-login__logo text-right">
                                    <a href="#">
                                        <img src="images/qtn/qtn_logo_black.png" style="height: 90px;">      
                                    </a>
                                </div>

                                <div class="kt-login__signin">

                                    <div class="kt-login__head">
                                        <span class="kt-login__title text-left signinTitleFont">RESET PASSWORD</span>
                                        <span class="ProductSansStyle signinLanguageFont">
                                            <div class="btn-group">
                                                <span type="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;">
                                                    LANGUAGES
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right dropdown_language" x-placement="bottom-end" style="position: absolute; top: 0px; left: 0px; transform: translate3d(-52px, 38px, 0px);overflow: hidden;">
                                                    <button class="dropdown-item" type="button">ENGLISH</button>
                                                    <button class="dropdown-item" type="button">TRADITIONAL CHINESE</button>
                                                    <button class="dropdown-item" type="button">CHINESE</button>
                                                </div>
                                            </div>
                                        </span>
                                    </div>

                                    <div class="kt-login__form mt-4">
                                        <form class="kt-form" action="">

                                            <div class="form-group">
                                                <label class="" style="font-size: 17px; color: #E6E6E6; letter-spacing: 1px;">Verfication Code</label>
                                                <div class="input-group">
                                                    <input id="verificationCode" class="form-control ProductSansStyle" type="text" style="margin-right: 10px;">

                                                    <button class="btn btn-brand btn-pill btn-elevate resendBtn ProductSansBoldStyle" id="sendCode" type="button" style="">Resend a Code</button>

                                                    <span id="timer" class="form__button-wrapper" style="display: none; color: #A67B54;">
                                                        <span class="p-3" style="display:block"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="kt-login__actions row">
                                                <button id="resetSuccessBtn" type="button" class="btn btn-brand btn-pill btn-elevate loginBtn ProductSansBoldStyle" onclick="window.location='resetPasswordSuccess.php'">RESET PASSWORD</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="login_negative_spacing_7"></div>
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
    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var fCallback = "";
    var username = "<?php echo $_POST['username'] ?>";

    $(document).ready(function(){
        $('body').keyup(function(event){
            if(event.keyCode == 13)
            {
                $('#resetSuccessBtn').click();
            }
        });

        $('#sendCode').click(function(){
            var formData  = {
                command : "sendOTPCode",
                type : "resetPassword",
                username : username
            };
            fCallback = otpCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        function otpCallback(data, message) {
            otpCode = data.otpCode;
            countDown('#sendCode', 600);
        }

        function countDown(id, second){
            var minutes = Math.floor(second/60);
            var seconds = second - (minutes*60);
            if(minutes == 0 && seconds == 0){
                $('#sendCode').show();
                $('#timer').hide();
                return;
            }else if(minutes == 0 && seconds != 0){
                $('#sendCode').hide();
                $('#timer').show();
                $('#timer span').empty().append(seconds+"<?php echo $translations['M00995'][$language]; /* Sec */ ?>");
                setTimeout('countDown(sendCode,'+(second-1)+')',1000);
            }else{
                $('#sendCode').hide();
                $('#timer').show();
                $('#timer span').empty().append(minutes+"<?php echo $translations['M00994'][$language]; /* Min */ ?>"+" "+seconds+"<?php echo $translations['M00995'][$language]; /* Sec */ ?>");
                setTimeout('countDown(sendCode,'+(second-1)+')',1000);
            }
        }

        $('#resetSuccessBtn').click(function(){
            $('#verificationError').hide();
            var verificationCode = $('#verificationCode').val();
            if (verificationCode == "")
            {
                $('#verificationError').show();
                $('#errorContent').html('<span>Please Enter Your Verification Code</span>');
                $('#verificationCode').focus();
            }
            else
            {
                showCanvas();

                var formData  = {
                    'command' : 'resetSuccessPassword',
                    'username' : username,
                    'verificationCode' : verificationCode
                };
                $.ajax({
                    type     : 'POST', 
                    url      : url, 
                    data     : formData, 
                    dataType : 'text',
                    encode   : true
                }).done(function(data) {
                    var obj = JSON.parse(data);
                    hideCanvas();
                    if(obj.status == "ok")
                    {
                        window.location.href="login.php";
                    }
                    else
                    {
                        message = obj.statusMsg;
                        $('#forgetPasswordError').html('<span>' +message+ '</span>').css('display', 'block');
                    }
                });
            }
        });
    });

</script>
