<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>

<?php
include_once('include/class.cryptDes.php');

$fromQR = false;
if (isset($_POST['fromQR'])) {
    $fromQR = $_POST['fromQR'] == 1 ? true : false;
}

if ($_GET) {
    $referralUsername = $_GET['qr'];
    if (!$config["isLocalHost"]) {
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

<link href="css/login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

<body  class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

    <section>
        <!-- <div class="w-100">
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
        </div> -->
        <div class="kt-container loginWrap">
            <div class="col-12">
                <div class="row h-100">
                    <div class="col-12 col-md-6" style="background-color: #F4F5F7;">
                        <div class="registrationForm mt-5">
                            <div class="col-12">
                                <div class="loginFont03 mt-2 mb-3" style="margin-top: unset;">
                                    Register New Account
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00001"><?php echo $translations['M00001'][$language]; //Username 
                                                                                ?></label>
                                            <input id="username" type="text" class="form-control" placeholder="<?php echo $translations['M00241'][$language]; //Enter Your Username 
                                                                                                                ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00035"><?php echo $translations['M00035'][$language]; //Full Name 
                                                                                ?></label>
                                            <input id="fullName" type="text" class="form-control" placeholder="<?php echo $translations['M00377'][$language]; //Enter Your Full Name 
                                                                                                                ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00037"><?php echo $translations['M00037'][$language]; //Country 
                                                                                ?></label>
                                            <select id="country" class="form-control">
                                                <option value=""><?php echo $translations['M00436'][$language]; ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00044"><?php echo $translations['M00044'][$language]; //Sponsor Username 
                                                                                ?></label>
                                            <input id="sponsorUsername" type="text" class="form-control" placeholder="<?php echo $translations['M01167'][$language]; //Enter Your Referral Username 
                                                                                                                        ?>">
                                        </div>
                                    </div>
<!--
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00038"><?php echo $translations['M00038'][$language]; //Mobile Number 
                                                                                ?></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend col-md-4 col-4 pl-0">
                                                    <input class="form-control" id="phoneCode" placeholder="<?php echo $translations['M00388'][$language]; //Country Code 
                                                                                                            ?>" disabled>
                                                </div>
                                                <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control" id="phone" placeholder="<?php echo $translations['M00380'][$language]; //Enter Your Mobile Mumber 
                                                                                                                                                                                                        ?>">
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00039"><?php echo $translations['M00039'][$language]; //Email Address 
                                                                                ?></label>
                                            <input id="email" type="text" class="form-control" placeholder="<?php echo $translations['M00201'][$language]; //Enter Your Email Address 
                                                                                                            ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00233"><?php echo $translations['M00233'][$language]; //OTP ?></label>
                                            <div style="display: flex;">
                                                <input type="text" class="form-control inputWidth" id="otpCodeInp" placeholder="<?php echo "Enter OTP"; //Enter OTP ?>">
                                                <span class="appendOTPError"></span>
                                                <div class="justify-content-center" data-lang='M01109'>
                                                    <button onclick="sendCode();" class="sendCode btn boldTxt text-center" style="color:#fff; background-color: #54F411;"><?php echo $translations['M01451'][$language]; //Send OTP ?></button>
                                                </div>
                                            </div>
                                            <div class="text-center timer mt-1" style="display: none; color: #fff; width: 100%;">
                                                <span class="" style="display:block; color: #000;"></span>
                                            </div>
                                            <div id="otpCode"></div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6 col-12 form-group fromQR" id="octopusUsernameField">
                                        <label class="formLabel register"><i class="fas fa-user-friends mr-2"></i><?php echo $translations['A00198'][$language]; //Placement Username 
                                                                                                                    ?></label>
                                        <input type="text" class="form-control beforeLoginForm" id="placementUsername" placeholder="<?php echo $translations['E00322'][$language]; //Please fill in placement username 
                                                                                                                                    ?>">
                                        <span id="octopusUsernameError" class="customError text-danger" error="error"></span>
                                        <span id="leftrightpositionalreadyexists" class="customError text-danger" error="error"></span>
                                    </div>
                                    <div class="col-md-6 fromQR">
                                        <div class="form-group">
                                            <label class="formLabel register"><i class="fas fa-user-friends mr-2"></i><?php echo $translations['A00199'][$language]; //Placement Position 
                                                                                                                        ?></label>
                                            <div class="form-group" style="margin-top: 15px; width: 50%;">
                                                <div class="kt-radio-inline loginRadio row">
                                                    <label for="leftCheckbox" class="col-md-6 col-12 otpCheckbox text-md-center text-sm-left mt_x">
                                                        <label class="kt-radio bankRadio mt_x" data-lang="M02267">
                                                            <input type="radio" name="placementPosition" value="1" id="leftCheckbox" checked>
                                                            <label class="formLabel beforeLogin boldTxt mt_x"><?php echo $translations['A00200'][$language]; //Left 
                                                                                                                ?></label>
                                                            <span></span>
                                                        </label>
                                                    </label>
                                                    <label class="col-md-6 col-12 otpCheckbox text-md-center text-sm-left mt_x" for="rightCheckbox">
                                                        <label class="kt-radio walletRadio mt_x" data-lang="M02105">
                                                            <input type="radio" name="placementPosition" value="2" id="rightCheckbox">
                                                            <label class="formLabel beforeLogin boldTxt mt_x"><?php echo $translations['A00201'][$language]; //Right 
                                                                                                                ?></label>
                                                            <span></span>
                                                        </label>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00002"><?php echo $translations['M00002'][$language]; //Password 
                                                                                ?></label>
                                            <input id="password" type="password" class="form-control" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Password 
                                                                                                                    ?>">
                                            <i class="far fa-eye eyeIcon3"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00041"><?php echo $translations['M00041'][$language]; //Retype Password 
                                                                                ?></label>
                                            <input id="checkPassword" type="password" class="form-control" placeholder="<?php echo $translations['M00383'][$language]; //Retype Your Password 
                                                                                                                        ?>">
                                            <i class="far fa-eye eyeIcon3"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00042"><?php echo $translations['M00042'][$language]; //Transaction Password 
                                                                                ?></label>
                                            <input id="tPassword" type="password" class="form-control" placeholder="<?php echo $translations['M00384'][$language]; //Enter Your Transaction Password 
                                                                                                                    ?>">
                                            <i class="far fa-eye eyeIcon3"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00043"><?php echo $translations['M00043'][$language]; //Retype Transaction Password 
                                                                                ?></label>
                                            <input id="checkTPassword" type="password" class="form-control" placeholder="<?php echo $translations['M00385'][$language]; //Retype Your Transaction Password 
                                                                                                                            ?>">
                                            <i class="far fa-eye eyeIcon3"></i>
                                        </div>
                                    </div>
                                </div>

                               <!--  <div class="row mb-4" id='a'>
                                    <div class="col-md-6">
                                        <div class="col-md-6 col-12 form-group" id="octopusUsernameField">
                                            <div class="row">
                                                <label class="formLabel register"><?php echo "OTP Code"; //OTP Code
                                                                                    ?></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="kt-radio-inline loginRadio row">
                                                    <div class="col-12" id="emailBox" style="display:inline">
                                                        <input type="text" class="form-control beforeLogin" id="emailOTPInp" placeholder="<?php echo "Enter OTP"; //Enter OTP 
                                                                                                                                            ?>">
                                                        <span class="appendOTPError"></span>
                                                        <div class="d-flex justify-content-center" data-lang='M01109'>
                                                            <a href="javascript:;" class="sendCode btn boldTxt text-center" style="color:#000;"><?php echo "Send OTP To Email"; //Send OTP Code 
                                                                                                                                                    ?></a>
                                                        </div>
                                                        <span class="form__button-wrapper text-center timer" style="display: none; color: #fff; width: 95px;">
                                                            <span class="p-3" style="display:block; color: #000"></span>
                                                        </span>
                                                    </div>
                                                    </label>
                                                    <div class="col-12 form-group">
                                                        <span id="otpCode" class="customError text-danger" error="error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div> -->

                                <div class="row mt-4 ml-1">
                                    <div class="col-12" data-lang='M00034'>
                                        <button id="signUpBtn" class="btn btn-primary w-100"><?php echo $translations['M00034'][$language]; //SIGN UP 
                                                                                        ?></button>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-center">
                                        <span style="color: #333333;"> Already have an account?</span>
                                        <a class="sign-up-text ml-1" href="login" data-lang=''>
                                            Login Now
                                        </a>
                                        
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 loginPage2">
                        <a href="login" class="logoClick">
                            <img src="images/logo/logo2.png" class="customLogo">        
                        </a>
                        <div class="loginCenterText">
                            <div class="loginFont01">
                                <?php echo $translations['M00027'][$language]; /* Registration */ ?>
                            </div>
                            <div class="loginFont02">
                                <?php echo $translations['M03666'][$language]; /* Health or Wealth? I want both! */ ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
     <div class="modal fade" id="captchaModal" tabindex="-1" role="dialog" aria-modal="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content noBackground">
            <div class="slidercaptcha card">
                <div class="card-header">
                    <span>
                      <?php echo $translations['M01626'][$language]; //Security Verification ?>
                    </span>
                </div>
                <div class="card-body">
                    <div id="captcha1"></div>
                </div>
            </div>
          </div>
            
        </div>
    </div>

<?php include 'sharejs.php'; ?>

</body>


</html>

<script>
    var url = 'scripts/reqDefault.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;

    var fullName = '<?php echo $_POST['fullName']; ?>';
    var username = '<?php echo $_POST['username']; ?>';
    var country = '<?php echo $_POST['country']; ?>';
    // var identityNumber = '<?php echo $_POST['identityNumber']; ?>';
    var dialingArea = '<?php echo $_POST['dialingArea']; ?>';
    var phone = '<?php echo $_POST['phone']; ?>';
    var email = '<?php echo $_POST['email']; ?>';
    var password = '<?php echo $_POST['password']; ?>';
    var checkPassword = '<?php echo $_POST['checkPassword']; ?>';
    var tPassword = '<?php echo $_POST['tPassword']; ?>';
    var checkTPassword = '<?php echo $_POST['checkTPassword']; ?>';
    // var dateOfBirth = '<?php echo $_POST['dateOfBirth']; ?>';
    var sponsorName = '<?php echo $_POST['sponsorName']; ?>';
    var placementUsername = '<?php echo $_POST['placementUsername']; ?>';
    var placementPosition = '<?php echo $_POST['placementPosition']; ?>';
    var referralUsername = "<?php echo $referralUsername; ?>";
    var isFromQR = '<?php echo $_POST['isFromQR']; ?>';
    var pPosition = "<?php echo $pPosition; ?>";
    var pUsername = "<?php echo $pUsername; ?>";
    var noPlacementUsername = 0;
    var noPUFromConfirmation = "<?php echo $_POST['noPlacementUsername'] ?>";
    var voucherCode;
    var sendOTPCode;

    $('.sendCode').click(function() {
        $(".invalid-feedback").remove();

        username = $('#username').val();
        phoneNumber = $('#phoneInput').val();
        dialCode = $('#phoneCode').val();
        email = $('#email').val();
        dialCode = dialCode.replace("+", "");

        // var dialCode = $('#dialingArea').val();
        // var phoneNumber = $('#phone1').val();
        // var sendType = $("input[name=radios]:checked").val();
        // var email = $('#email').val();

        var formData = {
            command: "sendOTPCode",
            type: "register",
            sendType: "email",
        };
        formData['email'] = email;

        fCallback = otpCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });
    $(document).ready(function() {

        var formData = {
            command: "getRegistrationDetailMember",
            referal: referralUsername,
            fromQR : isFromQR
        };
        var fCallback = loadCountries;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#fullName').val(fullName);
        $('#username').val(username);

        // $('#identityNumber').val(identityNumber);
        $('#phoneCode').val(dialingArea);
        $('#phone').val(phone);
        $('#email').val(email);
        $('#password').val(password);
        $('#checkPassword').val(checkPassword);
        $('#tPassword').val(tPassword);
        $('#checkTPassword').val(checkTPassword);
        // $('#dateOfBirth').val(dateOfBirth);
        $('#sponsorUsername').val(sponsorName);
        // $('#otpCode').val(otpCode);
        if (referralUsername) {
            $('#sponsorUsername').val(referralUsername)
            $('#sponsorUsername').attr('disabled', 'true');
        }

        if (isFromQR != 1) {
            if (referralUsername) {
                isFromQR = 1;
                $('.fromQR').hide();
            } else {
                isFromQR = 0;
                $('.fromQR').show();
            }
        }

        
        

        $('#dateOfBirth').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });

        $('#country').change(function() {
            var phoneCode = $('#country option:selected').attr('data-code');
            $('#phoneCode').val(phoneCode);
        });

        $("#backBtn").click(function() {
            $.redirect('login');
        });

        $('#signUpBtn').click(function() {

            $('.invalid-feedback').remove();
            $('input').removeClass('is-invalid');

            fullName = $('#fullName').val();
            username = $('#username').val();
            country = $('#country').find('option:selected').val();
            dialingArea = $('#phoneCode').val();
            phone = $('#phone').val();
            email = $('#email').val();
            password = $('#password').val();
            checkPassword = $('#checkPassword').val();
            tPassword = $('#tPassword').val();
            checkTPassword = $('#checkTPassword').val();
            // dateOfBirth = $('#dateOfBirth').val();
            sponsorName = $('#sponsorUsername').val();
            // identityNumber = $('#identityNumber').val();
            placementUsername = $('#placementUsername').val();
            placementPosition = $("input[name=placementPosition]:checked").val();
            sendOTPCode = $('#otpCodeInp').val();

            var formData = {
                'command': "publicRegistration",
                'registerType': 'free',
                'fullName': fullName,
                'username': username,
                'country': country,
                'dialingArea': dialingArea,
                'phone': phone,
                'email': email,
                'password': password,
                'checkPassword': checkPassword,
                'tPassword': tPassword,
                'checkTPassword': checkTPassword,
                'sponsorName': sponsorName,
                'isFromQR': isFromQR,
                'placementUsername': placementUsername,
		        'placementPosition': placementPosition,
                'sendOTPCode': sendOTPCode,
            };


            var fCallback = publicRegistrationSuccess;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });
    });

    function sendCode() {
    $(".invalid-feedback").remove();

        var username = $('#username').val();
        var phoneNumber = $('#phoneInput').val();
        var dialCode = $('#phoneCode').val();
        var email = $('#email').val();
        // var dialCode = dialCode.replace("+", "");

        // var dialCode = $('#dialingArea').val();
        // var phoneNumber = $('#phone1').val();
        // var sendType = $("input[name=radios]:checked").val();
        // var email = $('#email').val();

        var formData = {
            command: "sendOTPCode",
            type: "register ",
            sendType: "email",
        };
        formData['email'] = email;

        fCallback = otpCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function otpCallback(data, message) {
        // otpCode = data.otpCode;
        // if (data.remainingTime) {
        //     var second = data.remainingTime;

        //     var minutes = Math.floor(second / 60);
        //     var seconds = second - (minutes * 60);

        //     var leftTime = `${minutes==0?"":minutes + "m"} ${seconds}s.`;


        //     countDown('#sendCode', second);
        //     showMessage(`${message.replace(".", leftTime)}`, "warning", "<?php echo $translations['E00730'][$language]; /* Error */ ?>", "warning");
        // } else {
        //     countDown('#sendCode', data.resendOTPCountDown);
        //     showMessage(message, "success", "Resend Code", "success");
        // }

        countDown(data.resendOTPCountDown);

    }

    function countDown(second){
        var minutes = Math.floor(second/60);
        var seconds = second - (minutes*60);
        if(minutes == 0 && seconds == 0){
            $('.sendCode').attr("disabled", false);
            $('.timer').hide();
            return;
        }else if(minutes == 0 && seconds != 0){
            $('.sendCode').attr("disabled", true);
            $('.timer').show();
            $('.timer span').empty().append(seconds+"<?php echo $translations['M03596'][$language]; /* Sec */ ?>");
            setTimeout('countDown('+(second-1)+')',1000);
        }else{
            $('.sendCode').attr("disabled", true);
            $('.timer').show();
            $('.timer span').empty().append(minutes+"<?php echo $translations['M03595'][$language]; /* Min */ ?>"+" "+seconds+"<?php echo $translations['M03596'][$language]; /* Sec */ ?>");
            setTimeout('countDown('+(second-1)+')',1000);
        }
    }

    function publicRegistrationSuccess() {

        $.redirect('publicRegistrationConfirmation', {
            fullName: fullName,
            username: username,
            country: country,
            dialingArea: dialingArea,
            phone: phone,
            email: email,
            password: password,
            checkPassword: checkPassword,
            tPassword: tPassword,
            checkTPassword: checkTPassword,
            sponsorName: sponsorName,
            isFromQR: isFromQR,
            fromQr: '<?php echo $fromQR; ?>',
	    placementUsername: placementUsername,
	    placementPosition: placementPosition,
            sendOTPCode: sendOTPCode,
            voucherCode: voucherCode,
        });

    }



    function loadCountries(data, message) {
        var countriesList = data.countriesList;

        voucherCode = data.voucherCode;

        $('#placementUsername').val(data.placementName);
        if (data.placementPosition == 1) $("#leftCheckbox").attr('checked', 'checked');
        else if (data.placementPosition == 2) $("#rightCheckbox").attr('checked', 'checked');

        if (countriesList) {
            $.each(countriesList, function(key) {
                var selected = '';

                var countryDisplay = '';
                countryDisplay = countriesList[key]['display'];

                $('#country').append('<option value="' + countriesList[key]['id'] + '" data-code="+' + countriesList[key]['countryCode'] + '" name="' + countriesList[key]['name'] + '" ' + selected + '>' + countryDisplay + '</option>');
            });

            if (country) {
                $('#country').val(country);
            }

            var phoneCode = $('#country option:selected').attr('data-code');
            $('#phoneCode').text(phoneCode);


        }
    }
</script>

