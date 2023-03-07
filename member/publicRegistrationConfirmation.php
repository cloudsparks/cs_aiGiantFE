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

    $language = "chineseSimplified";

    $_SESSION['language'] = "chineseSimplified";
}

if (isset($_SESSION["userID"]) && isset($_SESSION["sessionID"])) {
    session_destroy();
}


?>

<link href="css/login.css" rel="stylesheet" type="text/css" />

<input type="hidden" name="" class="hideFunction">
<body class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

    <section class="registrationPage">
        
        
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
                                            <input id="username" type="text" class="form-control" disabled placeholder="<?php echo $translations['M00241'][$language]; //Enter Your Username 
                                                                                                                ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00035"><?php echo $translations['M00035'][$language]; //Full Name 
                                                                                ?></label>
                                            <input id="fullName" type="text" class="form-control" disabled placeholder="<?php echo $translations['M00377'][$language]; //Enter Your Full Name 
                                                                                                                ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00037"><?php echo $translations['M00037'][$language]; //Country 
                                                                                ?></label>
                                            <select id="country" class="form-control" disabled>
                                                <option value=""><?php echo $translations['M00436'][$language]; ?></option>
                                            </select>
                                        </div>
                                    </div>
<!--
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00038"><?php echo $translations['M00038'][$language]; //Mobile Number 
                                                                                ?></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend col-md-4 col-4 pl-0">
                                                    <input class="form-control" disabled id="phoneCode" placeholder="<?php echo $translations['M00388'][$language]; //Country Code 
                                                                                                            ?>" disabled>
                                                </div>
                                                <input oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" type="text" class="form-control" disabled id="phone" placeholder="<?php echo $translations['M00380'][$language]; //Enter Your Mobile Mumber 
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
                                            <input id="email" type="text" class="form-control" disabled placeholder="<?php echo $translations['M00201'][$language]; //Enter Your Email Address 
                                                                                                            ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00044"><?php echo $translations['M00044'][$language]; //Sponsor Username 
                                                                                ?></label>
                                            <input id="sponsorUsername" type="text" class="form-control" disabled placeholder="<?php echo $translations['M01167'][$language]; //Enter Your Referral Username 
                                                                                                                        ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4 fromQR">
                                    <div class="col-md-6 col-12 form-group" id="octopusUsernameField">
                                        <label class="formLabel register"><i class="fas fa-user-friends mr-2"></i><?php echo $translations['A00198'][$language]; //Placement Username 
                                                                                                                    ?></label>
                                        <input type="text" class="form-control beforeLoginForm" disabled id="placementUsername" placeholder="<?php echo $translations['E00322'][$language]; //Please fill in placement username 
                                                                                                                                    ?>">
                                        <span id="octopusUsernameError" class="customError text-danger" error="error"></span>
                                        <span id="leftrightpositionalreadyexists" class="customError text-danger" error="error"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="formLabel register"><i class="fas fa-user-friends mr-2"></i><?php echo $translations['A00199'][$language]; //Placement Position 
                                                                                                                        ?></label>
                                            <div class="form-group" style="margin-top: 15px; width: 50%;">
                                                <div class="kt-radio-inline loginRadio row">
                                                    <label for="leftCheckbox" class="col-md-6 col-12 otpCheckbox text-md-center text-sm-left mt_x">
                                                        <label class="kt-radio bankRadio mt_x" data-lang="M02267">
                                                            <input type="radio" name="placementPosition" value="1" id="leftCheckbox" checked disabled>
                                                            <label class="formLabel beforeLogin boldTxt mt_x"><?php echo $translations['A00200'][$language]; //Left 
                                                                                                                ?></label>
                                                            <span></span>
                                                        </label>
                                                    </label>
                                                    <label class="col-md-6 col-12 otpCheckbox text-md-center text-sm-left mt_x" for="rightCheckbox">
                                                        <label class="kt-radio walletRadio mt_x" data-lang="M02105">
                                                             <input type="radio" name="placementPosition" value="2" id="rightCheckbox" disabled>
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
                                            <input id="password" type="password" class="form-control" disabled placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Password 
                                                                                                                    ?>">
                                            <i class="far fa-eye eyeIcon3"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00041"><?php echo $translations['M00041'][$language]; //Retype Password 
                                                                                ?></label>
                                            <input id="checkPassword" type="password" class="form-control" disabled placeholder="<?php echo $translations['M00383'][$language]; //Retype Your Password 
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
                                            <input id="tPassword" type="password" class="form-control" disabled placeholder="<?php echo $translations['M00384'][$language]; //Enter Your Transaction Password 
                                                                                                                    ?>">
                                            <i class="far fa-eye eyeIcon3"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" data-lang="M00043"><?php echo $translations['M00043'][$language]; //Retype Transaction Password 
                                                                                ?></label>
                                            <input id="checkTPassword" type="password" class="form-control" disabled placeholder="<?php echo $translations['M00385'][$language]; //Retype Your Transaction Password 
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

                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button class="btn btn-default goToPublicReg" style="width: 100%;"><?php echo $translations['A00115'][$language]; //Back ?></button>
                                    </div>
                                    <div class="col-md-6">
                                        <button id="signUpBtn" class="btn btn-primary" style="width: 100%;"><?php echo $translations['M00034'][$language]; //SIGN UP ?></button>
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
                            <img src="images/logo/logo2.jpeg" class="customLogo">        
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
    var checkPassword = '<?php echo $_POST['checkPassword']; ?>';
    var tPassword = '<?php echo $_POST['tPassword']; ?>';
    var checkTPassword = '<?php echo $_POST['checkTPassword']; ?>';
    // var dateOfBirth = '<?php echo $_POST['dateOfBirth']; ?>';
    var sponsorName = '<?php echo $_POST['sponsorName']; ?>';
    // var sponsorCode = '<?php echo $_POST['sponsorCode']; ?>';
    var sendOTPCode = '<?php echo $_POST['sendOTPCode']; ?>';
    var placementUsername = '<?php echo $_POST['placementUsername']; ?>';
    var placementPosition = '<?php echo $_POST['placementPosition']; ?>';                         
    var referralUsername = "<?php echo $referralUsername; ?>";
    var isFromQR = '<?php echo $_POST['isFromQR']; ?>';
    var pPosition = "<?php echo $pPosition; ?>";
    // var pUsername = "<?php echo $pUsername; ?>";

    $(document).ready(function(){
        

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
        // $('#sponsorCode').val(sponsorCode);
        $('#sponsorUsername').val(sponsorName);
        $('#placementUsername').val(placementUsername);
        $("input[name=placementPosition][value='"+placementPosition+"']").prop("checked", true);

        var formData  = {
            command   : "getRegistrationDetailMember",
            // sponsorName : autoFillSponsor,
        };
        var fCallback = loadCountries;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        if (isFromQR == 1) {
            $('.fromQR').hide();
        } else {
            $('.fromQR').show();
        }

        //if (voucherCodeFromQr != '-') {
        //    $("#voucherCodeInput").attr("disabled", true);
        //    $("#voucherCode").hide();
        //}

    let autoFillSponsor;
    if (isFromQR) autoFillSponsor = sponsorName;

        

        // $('#dateOfBirth').datepicker({
        //     autoclose: true,
        //     format: "yyyy-mm-dd"
        // });

        // $('#country').change(function(){
        //     var phoneCode = $('#country option:selected').attr('data-code');
        //     $('#phoneCode').val(phoneCode);
        // });

        $('#signUpBtn').click(function(){

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
            sponsorCode = $('#sponsorCode').val();
            // identityNumber = $('#identityNumber').val();
            placementUsername = $('#placementUsername').val();
            placementPosition = $("input[name=placementPosition]:checked").val();
            
            // dialingArea = dialingArea.replace('+','');

            $.redirect('survey', {
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
		placementUsername: placementUsername,
		placementPosition: placementPosition,
                isFromQR: isFromQR,
                sendOTPCode : sendOTPCode,
                fromQr: '<?php echo $fromQR; ?>',
            });
        });

        $('.goToPublicReg').click(function() {
            $.redirect('publicRegistration', {
                fullName : fullName,
                username : username,
                country : country,
                dialingArea : dialingArea,
                phone : phone,
                email : email,
                password : password,
                checkPassword : checkPassword,
                tPassword : tPassword,
                checkTPassword : checkTPassword,
                // dateOfBirth : dateOfBirth,
                // sponsorName : sponsorName,
                // identityNumber : identityNumber,
                isFromQR : isFromQR,
                placementUsername: placementUsername,
                placementPosition : placementPosition,
                // sponsorCode : sponsorCode,
                fromQR: '<?php echo $_POST['fromQr'] ?>'
            });
        });

        $('#sendCode').click(function(){

            $(".invalid-feedback").remove();

            dialingArea = $('#dialingArea').val();
            phone = $('#phone1').val();
            email = $('#email').val();

              // var getCountry = $("#country option:selected").attr('data-code');
              registerMethod = $("input[name=radios]:checked").val();
              dialingArea = dialingArea.replace("+", "");

              if(registerMethod == 'email') {
                dialingArea = "";
              }
              // else{
              //   dialingArea ='+' dialingArea;
              // }

              var formData  = {
                  command : "sendOTPCode",
                  type : "register",
                  sendType : registerMethod,
                  dialCode : dialingArea,
                  phone : phone,
                  email : email
            };
                
            fCallback = otpCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
          });
});

function otpCallback(data, message) {
  // otpCode = data.otpCode;
  if(data.remainingTime) {
    var second = data.remainingTime;

    var minutes = Math.floor(second/60);
    var seconds = second - (minutes*60);

    var leftTime = `${minutes==0?"":minutes + "m"} ${seconds}s.`;


    countDown('#sendCode', second);
    showMessage(`${message.replace(".", leftTime)}`, "warning", "<?php echo $translations['E00730'][$language]; /* Error */ ?>", "warning");
  }else{
    countDown('#sendCode', data.resendOTPCountDown);
    showMessage(message, "success", "Resend Code", "success");
  }
  
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
    // $('#sendCode').show();
    $('#timer span').empty().append(seconds+"s");
    setTimeout('countDown(sendCode,'+(second-1)+')',1000);
  }else{
    $('#sendCode').hide();
    $('#timer').show();
    $('#timer span').empty().append(minutes+"m"+" "+seconds+"s");
    setTimeout('countDown(sendCode,'+(second-1)+')',1000);
  }
}

function publicRegistrationSuccess(data, message) {
    showMessage(message, 'success', '<?php echo $translations['M00072'][$language]; //Congratulation ?>', '', 'login');
}


function loadCountries(data,message){

    voucherCodeFromQr = data.voucherCode;
        if (voucherCodeFromQr != '-') {
        $('#voucherCodeInput').val(voucherCodeFromQr);
            $("#voucherCodeInput").attr("disabled", true);
            $("#voucherCode").hide();
        memberRedeemVoucher();
        }

    if (data.productData) {
        totalPayableAmount = data.productData[0]['price'] || 0;
        $('#totalPayableAmount').val(totalPayableAmount);
    }

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
