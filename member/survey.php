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
                    <div class="col-12" style="background-color: #F4F5F7;">
                        <div class="registrationForm2 mt-3">
                            <div>
                                <img src="images/logo/logo.png" class="customLogo">
                            </div>
                            <div class="col-12 mt-5">
                                <div class="loginFont03 mt-2 mb-3" style="margin-top: unset;">
                                    Survey
                                </div>
                                <div id="surveyQuestion" class="row">
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
                                        <button id="signUpBtn" class="btn btn-primary" style="width: 100%;"><?php echo $translations['M00200'][$language]; //SIGN UP ?></button>
                                    </div>
                                </div>
                                <!-- <div class="col-12 mt-3 text-center">
                                        <span style="color: #333333;"> Already have an account?</span>
                                        <a class="sign-up-text ml-1" href="login" data-lang=''>
                                            Login Now
                                        </a>
                                        
                                    </div> -->
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
    var translations = <?php echo json_encode($translations)?>;
    var language = "<?php echo $language?>";

    $(document).ready(function(){

        var formData = {
            command: "getSurveyQuestionAnswer",
        };
        var fCallback = loadSurvey;
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

        // if (isFromQR != 1) {
        //     if(referralUsername) {
        //         isFromQR = 1;
        //     } else {
        //         isFromQR = 0;
        //     }
        // }

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
        //     var phoneCode = $('#country option:selected').attr('data-code');<span class="invalid-feedback"></span>
        //     $('#phoneCode').val(phoneCode);
        // });

        $('#signUpBtn').click(function(){

            var survey = [];

            $('.surveyLoop').each(function(){
                var surveyAry = {};
                var answer = $(this).children('.surveyInput').val();
                var question_id = $(this).attr('questionID');
                var type = $(this).attr('questionType');
                var multipleOption = $(this).attr('multipleOption');

                if (multipleOption == 1) {
                    var multipleAns = [];

                     $(this).children('.surveyInput2').each(function() {
                        var answerAry = this.value;
                        multipleAns.push(answerAry)
                    });

                    surveyAry = {
                        question_id : question_id,
                        answer : multipleAns,
                        type : type
                    };

                    survey.push(surveyAry);
                } else {
                    surveyAry = {
                        question_id : question_id,
                        answer : answer,
                        type : type
                    };

                    survey.push(surveyAry);
                }

            });

                var formData = {
                    'command' : "publicRegistrationConfirmation",
                    'registerType' : 'free',
                    'fullName' : fullName,
                    'username' : username,
                    'country' : country,
                    'dialingArea' : dialingArea,
                    'phone' : phone,
                    'email' : email,
                    'password' : password,
                    'checkPassword' : checkPassword,
                    'tPassword' : tPassword,
                    'checkTPassword' : checkTPassword,
                    // 'dateOfBirth' : dateOfBirth,
                    'sponsorName' : sponsorName,
		    'placementUsername' : placementUsername,
		    'placementPosition' : placementPosition,
                    'isFromQR' : isFromQR,
                    placementUsername: placementUsername,
                    placementPosition : placementPosition,
                    survey : survey,
                    // 'sponsorCode' : sponsorCode,
                    'sendOTPCode' : sendOTPCode,
                    // 'identityNumber' : identityNumber
                };


                var fCallback = publicRegistrationSuccess;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('.goToPublicReg').click(function() {
            $.redirect('publicRegistrationConfirmation', {
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
                sponsorName : sponsorName,
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

function loadSurvey (data, message) {

    var surveyQuestion = "";
    

    $.each(data.listing, function(k,v){
        k++;

        var selectInput = "";

        if (v['questionType'] == "select") {
            var optionList = `<option value=""><?php echo $translations['A00054'][$language]; //Please Select ?></option>`;

            $.each(v['answerList'], function(k2,v2){
                optionList += `
                        <option value="${v2['id']}">${v2['titleDisplay']}</option>
                `
            });
            
            var maxSelect = v['maxSelect'];
            maxSelect = parseInt(maxSelect);

            if (v['maxSelect'] > 1) {

                $.each(new Array(maxSelect), function(k3,v3) {
                    selectInput += `
                            <select id="" class="form-control surveyInput2 mb-3">
                                ${optionList}
                            </select>
                    `
                });

                surveyQuestion += `
                        <div class="col-md-6 mb-4">
                            <div class="form-group surveyLoop" multipleOption="1" questionID="${v['id']}" questionType="select">
                                <label for="">${translations[v['translation_code']][language]}</label>
                                ${selectInput}
                            </div>
                            <span id="q${k}" class="questionError" style="color: #fd397a; font-size:12px;"></span>
                        </div>
                `
            } else {
                surveyQuestion += `
                    <div class="col-md-6 mb-4">
                        <div class="form-group surveyLoop" questionID="${v['id']}" questionType="select">
                            <label for="">${translations[v['translation_code']][language]}</label>
                            <select id="" class="form-control surveyInput">
                                ${optionList}
                            </select>
                        </div>
                        <span id="q${k}" class="questionError" style="color: #fd397a; font-size:12px;"></span>
                    </div>
            `
            }
        } else if (v['fillType'] == "integer") {
            surveyQuestion += `
                    <div class="col-md-6 mb-4">
                        <div class="form-group surveyLoop" questionID="${v['id']}" questionType="fill">
                            <label for="">${translations[v['translation_code']][language]}</label>
                             <input id="" type="text" class="form-control surveyInput mb-3" oninput="this.value = this.value.match(/^[0-9]+\.?[0-9]{0,0}/);">
                        </div>
                        <span id="q${k}" class="questionError" style="color: #fd397a; font-size:12px;"></span>
                    </div>
            `
        } else {
            surveyQuestion += `
                    <div class="col-md-6 mb-4">
                        <div class="form-group surveyLoop" questionID="${v['id']}" questionType="fill">
                            <label for="">${translations[v['translation_code']][language]}</label>
                             <input id="" type="text" class="form-control surveyInput mb-3" oninput="this.value = this.value.match(/^[0-9]+\.?[0-9]{0,2}/);">
                        </div>
                        <span id="q${k}" class="questionError" style="color: #fd397a; font-size:12px;"></span>
                    </div>
            `
        }
        
    });

    $('#surveyQuestion').html(surveyQuestion);
    
}
</script>
