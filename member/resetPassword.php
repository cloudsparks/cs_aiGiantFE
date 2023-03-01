<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>

<?php
include_once('include/class.cryptDes.php');

$fromQR = false;
if(isset($_POST['fromQR'])) {
    $fromQR = $_POST['fromQR']==1?true:false;
}

if($_GET){
    $referralUsername = $_GET['qr'];
    if(!$config["isLocalHost"]){
        $crypt = new cryptDes();
        $encryptedUsername = $referralUsername;
        $referralUsername = $crypt->decrypt($referralUsername);
    }

    $pPosition = $_GET['p'];
    $pUsername = $_GET['pu'];

    $fromQR = true;

    // $language = "chineseSimplified";

    // $_SESSION['language'] = "chineseSimplified";
}

if (isset($_SESSION["userID"]) && isset($_SESSION["sessionID"])) {
    session_destroy();
}


?>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link href="css/login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

<input type="hidden" name="" class="hideFunction">
<body class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading registrationPage">

    <section class="registrationPage">
        <div class="kt-container loginWrap">
            <div class="col-12">
                <div class="row h-100">
                    <div class="col-12 col-md-6 forgotPasswordPage">
                        <div class="btn-group languageDropdown">
                            <span type="" class="languageFont" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;">
                                <img class="mr-3" src="images/project/globe.png" alt="" width="20px">
                                <span><?php echo $config["languages"][$language]['displayName'] ?></span>
                                <span><i class="fa fa-angle-down ml-3" style="color: black;"></i></span>
                            </span>
                            <div class="dropdown-menu dropdown_language">
                                <?php $languages = $config['languages']; ?>
                                <?php foreach($languages as $key => $value) { 
                                    if ($key=="chineseSimplified" || $key=="chineseTraditional") {
                                        $flag="chinese";
                                    }else if ($key == "korean"){
                                        $flag="korean";
                                    }else if ($key == "vietnam"){
                                        $flag="vietnam";
                                    }else if ($key == "japanese"){
                                        $flag="japanese";
                                    }else if($key == 'english'){
                                        $flag="english";
                                    }else if ($key == "thailand"){
                                        $flag="thai";
                                    }
                                    ?>
                                    <a href="javascript:void(0)" class="changeLanguage dropdown-item" language="<?php echo $key; ?>" style="margin-top: 0;margin-bottom: 0;">
                                        <img style="width: 20px;margin-right: 5px;" src ="images/language/<?php echo $flag; ?>.png">
                                        <?php echo $languages[$key]['displayName']; ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="loginCenterText">
                            <div class="loginFont01" style="text-align:center;">
                                Forgot Password?
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6" style="background-color: #F4F5F7;">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-md-11">
                                <div class="loginBox register">
                                    <div class="logoWrapper mb-3">
                                        <a href="/login.php">
                                            <img src="images/logo/logo.png" alt="" class="loginLogo registration">
                                        </a>
                                    </div>
                                    <div class="loginBorder">
                                        <div class="registrationForm">
                                            <div class="col-12">
                                                <p class="formTitle" data-lang="M00289"><?php echo $translations['M00289'][$language]; //Reset Password ?></p>
                                                <div class="row mb-2">
                                                    <div class="col-md-12 mb-5">
                                                        <div class="form-group">
                                                            <label for="" data-lang="M00001"><?php echo $translations['M00001'][$language]; //Username ?></label>
                                                            <input id="username" type="text" class="form-control" placeholder="<?php echo $translations['M00241'][$language]; //Enter Your Username ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="" data-lang="M00039"><?php echo $translations['M00039'][$language]; //Email Address ?></label>
                                                            <input id="email" type="text" class="form-control" placeholder="<?php echo $translations['M00201'][$language]; //Enter Your Email Address ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="row mb-2">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="" data-lang="M00037"><?php echo $translations['M00037'][$language]; //Country ?></label>
                                                            <select id="country" class="form-control">  
                                                                <option value=""><?php echo $translations['M00436'][$language]; ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="" data-lang="M00038"><?php echo $translations['M00038'][$language]; //Mobile Number ?></label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend col-md-4 col-4 pl-0">
                                                                    <input class="form-control" id="phoneCode" placeholder="<?php echo $translations['M00388'][$language]; //Country Code ?>" disabled>
                                                                </div>
                                                                <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control" id="phone" placeholder="<?php echo $translations['M00380'][$language]; //Enter Your Mobile Mumber ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="separateLine"></div>
                                                <div class="row mb-2">
                                                    <div class="col-md-12 mb-5">
                                                        <div class="form-group">
                                                            <label for="" data-lang="M00083"><?php echo $translations['M00083'][$language]; //Password ?></label>
                                                            <input id="password" type="password" class="form-control" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Password ?>">
                                                            <i class="far fa-eye eyeIcon3"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="" data-lang="M01322"><?php echo $translations['M01322'][$language]; //Retype New Password ?></label>
                                                            <input id="retypePassword" type="password" class="form-control" placeholder="<?php echo $translations['M00383'][$language]; //Retype Your Password ?>">
                                                            <i class="far fa-eye eyeIcon3"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="kt-radio-inline loginRadio form-group row mt-5">
                                                <label class="col-12 otpCheckbox active" for="emailCheckbox" >
                                                    <label class="kt-radio walletRadio pl-0">
                                                        <input type="radio" name="otpType" value="email" id="emailCheckbox" checked>
                                                        <label class="" data-lang='M00390'><?php echo $translations['M00390'][$language]; //OTP Code ?></label>
                                                        <!-- <span></span> -->
                                                    </label>
                                                    <div class="row">
                                                        <div class="col-7 pl-0" id="emailBox" style="display:none">
                                                            <input type="text" class="form-control beforeLogin" id="emailOTPInp" placeholder="<?php echo $translations['M01323'][$language]; //Enter OTP ?>">
                                                            <span class="appendOTPError"></span>
                                                        </div>
                                                        <div class="col-5 text-left">
                                                            <div class="sendOtpBox" data-lang='M01324'>
                                                                <a href="javascript:;"><button class="ml-3 ml-md-0 sendCode btn btn-primary boldTxt " style="color:#fff;width:100%;"><?php echo $translations['M01324'][$language]; //Send OTP Code ?></button></a>
                                                            </div>
                                                            <span class="form__button-wrapper timer" style="display: none; color: #fff; width: 95px;">
                                                                <span class="p-3" style="display:block; color: #fff"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                </label>
                                                

                                                <div class="col-12 mt-5 ml-3 text-left">
                                                    <div class="row">
                                                        <div class="col-xs-2 mr-2" data-lang='M00163'>
                                                            <button id="backBtn" class="btn btn-default" style="width: 100%;"><?php echo $translations['M00163'][$language]; //Back ?></button>
                                                        </div>
                                                        <div class="col-xs-2" data-lang='M00077'>
                                                            <button id="signUpBtn" class="btn btn-primary"><?php echo $translations['M00077'][$language]; //Confirm ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <label for="phoneCheckbox" class="col-md-6 col-12 otpCheckbox" id="otpHide">
                                                    <label class="kt-radio bankRadio" data-lang="M02267">
                                                        <input type="radio" name="otpType" value="phone" id="phoneCheckbox">
                                                        <label class="otpCheckFont" data-lang='M00381'><?php echo $translations['M00381'][$language]; //Mobile Number ?></label>
                                                        <span></span>
                                                    </label>
                                                    <div class="col-12" id="phoneBox" style="display:none">
                                                        <input type="text" class="form-control beforeLogin" id="phoneOTPInp" placeholder="<?php echo $translations['M03453'][$language]; //Enter OTP ?>">
                                                        <span class="appendOTPError"></span>
                                                        <div class="d-flex justify-content-center" data-lang='M01109'>
                                                            <a href="javascript:;" class="sendCode btn boldTxt text-center" style="color:#fff;"><?php echo $translations['M01451'][$language]; //Send OTP Code ?></a>
                                                        </div>
                                                        <span class="form__button-wrapper text-center timer" style="display: none; color: #fff; width: 95px;">
                                                            <span class="p-3" style="display:block; color: #000"></span>
                                                        </span> 
                                                    </div>
                                                </label> -->
                                            </div>
                                            </div>
                                        </div>

                                        
                                        <?php include 'footerLogin.php'; ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

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

    var fullName = '<?php echo $_POST['fullName']; ?>';
    var username = '<?php echo $_POST['username']; ?>';
    var country = '<?php echo $_POST['country']; ?>';
    // var identityNumber = '<?php echo $_POST['identityNumber']; ?>';
    var dialingArea = '<?php echo $_POST['dialingArea']; ?>';
    var phone = '<?php echo $_POST['phone']; ?>';
    var email = '<?php echo $_POST['email']; ?>';
    var password = '<?php echo $_POST['password']; ?>';
    var retypePassword = '<?php echo $_POST['retypePassword']; ?>';
    var tPassword = '<?php echo $_POST['tPassword']; ?>';
    var checkTPassword = '<?php echo $_POST['checkTPassword']; ?>';
    // var dateOfBirth = '<?php echo $_POST['dateOfBirth']; ?>';
    var sponsorName = '<?php echo $_POST['sponsorName']; ?>';

    var referralUsername = "<?php echo $referralUsername; ?>";
    var isFromQR = '<?php echo $_POST['isFromQR']; ?>';
    var pPosition = "<?php echo $pPosition; ?>";
    var pUsername = "<?php echo $pUsername; ?>";
    var otpType;


    $(document).ready(function(){
    var formData  = {
        command   : "getRegistrationDetailMember"
    };
    var fCallback = loadCountries;
    // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    $('#country').change(function(){
        var phoneCode = $('#country option:selected').attr('data-code');
        $('#phoneCode').val(phoneCode);
        getCurrCountry = $('#country').find('option:selected').val();
        if (getCurrCountry == 44 || getCurrCountry == 208) {
            $("#otpHide").hide();
        }else{
            $("#otpHide").show();
        }
    });

    $("#backBtn").click(function() {
        $.redirect('login');
    });

    otpType = $('input:radio[name="otpType"]').val();
    if(otpType == 'email'){
        $('#emailBox').show();
        $('#phoneBox').hide();
        $('.appendOTPError').empty('');
        $('#emailBox .appendOTPError').append('<span id="verificationCode" class="text-danger"></span>');
    }else{
        $('#emailBox').hide();
        $('#phoneBox').show();
        $('.appendOTPError').empty('');
        $('#phoneBox .appendOTPError').append('<span id="verificationCode" class="text-danger"></span>');
    }

  $('input:radio[name="otpType"]').change(function(){
    $(this).prop('checked',true);
    $('.otpCheckbox').removeClass('active')
    $(this).parent().parent().addClass('active');

    otpType = $(this).val();
    if(otpType == 'email'){
        $('#emailBox').show();
        $('#phoneBox').hide();
        $('.appendOTPError').empty('');
        $('#emailBox .appendOTPError').append('<span id="verificationCode" class="text-danger"></span>');
    }else{
        $('#emailBox').hide();
        $('#phoneBox').show();
        $('.appendOTPError').empty('');
        $('#phoneBox .appendOTPError').append('<span id="verificationCode" class="text-danger"></span>');
    }
  })
});

$('.sendCode').click(function(){
    $(".invalid-feedback").remove();

    var username = $('#username').val();
    var phoneNumber = $('#phone').val();
    var dialCode = $('#phoneCode').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var retypePassword = $('#retypePassword').val();
    // dialingArea = dialingArea.replace("+", "");

      // var dialCode = $('#dialingArea').val();
      // var phoneNumber = $('#phone1').val();
      // var sendType = $("input[name=radios]:checked").val();
      // var email = $('#email').val();

    var formData  = {
        command     : "sendOTPCode",
        type        : "resetPassword",
        sendType    : otpType,
        username    : username,
        password            : password,
        retypePassword      : retypePassword,
	dialCode : dialCode,
	phoneNumber : phoneNumber
    };
    if(otpType == 'phone'){
        formData['phoneNumberIn'] = phoneNumber;
        formData['dialCodeIn'] = dialCode;
    }else{
        formData['email'] = email;
    }
    
    fCallback = otpCallback;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
});


$('#signUpBtn').click(function(){
    $(".invalid-feedback").remove();
    var username = $('#username').val();
    var phoneNumber = $('#phone').val();
    var dialCode = $('#phoneCode').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var retypePassword = $('#retypePassword').val();
    if(otpType == 'phone'){
        var verificationCode = $('#phoneOTPInp').val();
    }else{
        var verificationCode = $('#emailOTPInp').val();
    }

    var formData  = {
        command             : "memberResetPasswordConfirmation",
        username            : username,
        password            : password,
        retypePassword      : retypePassword,
        otpType             : otpType,
        verificationCode    :verificationCode
    };

    if(otpType == 'phone'){
        formData['phoneNumber'] = phoneNumber;
        formData['dialCode'] = dialCode;
    }else{
        formData['email'] = email;
    }
    
    fCallback = resetPwdSuccess;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
});

// function resetConfirm(data, message) {
//     showMessage('<?php echo $translations['M01105'][$language]; //Are you sure want to reset password? ?>', 'warning', '<?php echo $translations['M00199'][$language]; //Confirmation ?>', 'warning', '',{Confirm:"<?php echo $translations['M00086'][$language]; //Confirm ?>"});
//     $('#canvasConfirmBtn').click(function(){
//         var formData  = {
//             command             : "memberResetPasswordConfirmation",
//             username            : username,
//             password            : password,
//             retypePassword      : retypePassword,
//             otpType             : otpType,
//             verificationCode    :verificationCode
//         };

//         if(otpType == 'phone'){
//             formData['phoneNumber'] = phoneNumber;
//             formData['dialCode'] = dialCode;
//         }else{
//             formData['email'] = email;
//         }
        
//         fCallback = resetPwdSuccess;
//         ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
//     });
// }

function resetPwdSuccess(data,message){
    showMessage(message, 'success', '<?php echo $translations['M00289'][$language]; //Reset Password?>', 'success', "login.php")
}

function otpCallback(data, message) {
    showMessage(message, 'success', '<?php echo $translations['M01324'][$language]; //Send OTP Code?>', 'success')
    // otpCode = data.resendOTPCountDown;
    countDown(data.resendOTPCountDown);
}

function countDown(second){
    var minutes = Math.floor(second/60);
    var seconds = second - (minutes*60);
    if(minutes == 0 && seconds == 0){
        $('.sendCode').text('<?php echo $translations['M03558'][$language]; //Resend OTP?>')
        $('.sendCode').show();
        $('.timer').hide();
        return;
    }else if(minutes == 0 && seconds != 0){
        $('.sendCode').hide();
        $('.timer').show();
        $('.timer span').empty().append(seconds+" "+"<?php echo $translations['M01095'][$language]; /* Sec */ ?>");
        setTimeout('countDown('+(second-1)+')',1000);
    }else{
        $('.sendCode').hide();
        $('.timer').show();
        $('.timer span').empty().append(minutes+" "+"<?php echo $translations['M01094'][$language]; /* Min */ ?>"+" "+seconds+" "+"<?php echo $translations['M01095'][$language]; /* Sec */ ?>");
        setTimeout('countDown('+(second-1)+')',1000);
    }
}

function loadCountries(data,message){
    var countriesList = data.countriesList;

    if(countriesList) {
        $.each(countriesList, function(key) {
            var selected = '';

            var countryDisplay = '';
            countryDisplay = countriesList[key]['display'];

            $('#country').append('<option value="'+countriesList[key]['id']+'" data-code="+'+countriesList[key]['countryCode']+'" name="'+countriesList[key]['name']+'" '+selected+'>'+countryDisplay+'</option>');
        });

        if (country) {
            $('#country').val(country);
        }
        
        var phoneCode = $('#country option:selected').attr('data-code');
        $('#phoneCode').text(phoneCode);
    }
}
</script>
