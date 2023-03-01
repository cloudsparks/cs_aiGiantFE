<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Registration", $_SESSION['blockedRights']['Registration'])){
     header("Location: dashboard");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
    <div class="kt-container">
        <div class="text-center">
            <div class="pageTitle">
                <span data-lang="M00027"><?php echo $translations['M00027'][$language]; //Registration ?></span>
            </div>
        </div>

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10">
                    <div class="listingWrapper">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00035"><?php echo $translations['M00035'][$language]; //Full Name ?></label>
                                        <input id="fullName" class="form-control inputDesign" type="text" placeholder="<?php echo $translations['M00377'][$language]; //Enter your full name ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00036"><?php echo $translations['M00036'][$language]; //Username ?></label>
                                        <input id="username" class="form-control inputDesign" type="text" placeholder="<?php echo $translations['M00241'][$language]; //Enter Your Username ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00037"><?php echo $translations['M00037'][$language]; //Country ?></label>
                                       <select id="country" class="form-control inputDesign">
                                           <option value=""><?php echo $translations['M00436'][$language]; ?></option>
                                       </select>
                                    </div>
                                </div>
<!--
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00038"><?php echo $translations['M00038'][$language]; //Mobile Number ?>
                                        </label>
                                        <div class="input-group phoneGroup">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="phoneCode"> <?php echo $_POST['dialingArea']; ?> </span>
                                            </div>
                                            <input id="phoneNo" class="form-control inputDesign" type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="<?php echo $translations['M00380'][$language]; //Enter Your Mobile Number ?>">
                                        </div>
                                        <span id="phone"></span>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00039"><?php echo $translations['M00039'][$language]; //Email Address ?>
                                        </label>
                                        <input id="email" class="form-control inputDesign" type="text" placeholder="<?php echo $translations['M00201'][$language]; //Enter Your Email Address ?>">
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

                                <div class="goldLine mt-4 mb-5"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00002"><?php echo $translations['M00002'][$language]; //Password ?></label>
                                        <input id="password" class="form-control inputDesign" type="password" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Password ?>">
                                        <i class="far fa-eye eyeIcon3"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00041"><?php echo $translations['M00041'][$language]; //Retype Password ?></label>
                                        <input id="checkPassword" class="form-control inputDesign" type="password" placeholder="<?php echo $translations['M00383'][$language]; //Retype Your Password ?>">
                                        <i class="far fa-eye eyeIcon3"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00042"><?php echo $translations['M00042'][$language]; //Transaction Password ?></label>
                                        <input id="tPassword" class="form-control" type="password" placeholder="<?php echo $translations['M00384'][$language]; //Enter Your Transaction Password ?>">
                                        <i class="far fa-eye eyeIcon3"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00043"><?php echo $translations['M00043'][$language]; //Retype Transaction Password ?></label>
                                        <input id="checkTPassword" class="form-control inputDesign" type="password" placeholder="<?php echo $translations['M00385'][$language]; //Retype Transaction Password ?>">
                                        <i class="far fa-eye eyeIcon3"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00044"><?php echo $translations['M00044'][$language]; //Sponsor Username ?></label>
                                        <input id="sponsorUsername" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Placement Username
                                            <span class="text-danger">
                                                *
                                            </span>
                                        </label>
                                        <input id="placementUsername" type="text" class="form-control" required style="margin-bottom: 10px;">
                                        <input id="left" type="radio" name="placementPosition" value="1"> 
                                        <label for="left" style="margin-right: 15px;"><?php echo $translations['A00200'][$language]; /* Left */ ?></label>

                                        <input id="right" type="radio" name="placementPosition" value="2"> 
                                        <label for="right" style="margin-right: 15px;"><?php echo $translations['A00201'][$language]; /* Right */ ?></label>
                                        <span id="placementPositionError" class="customError text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-0">
                                <div class="col-xs-2 mr-2" data-lang='M00163'>
                                    <button id="backBtn" class="btn btn-default" style="width: 100%;"><?php echo $translations['M00163'][$language]; //Back ?></button>
                                </div>
                                <div class="col-xs-2 mr-2" data-lang='M00034'>
                                    <button id="signUpBtn" type="button" class="btn btn-primary w-100">
                                        <?php echo $translations['M00034'][$language]; //Next ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>

</body>

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
    var dialingArea = '<?php echo $_POST['dialingArea']; ?>';
    var phone = '<?php echo $_POST['phone']; ?>';
    var email = '<?php echo $_POST['email']; ?>';
    var password = '<?php echo $_POST['password']; ?>';
    var checkPassword = '<?php echo $_POST['checkPassword']; ?>';
    var tPassword = '<?php echo $_POST['tPassword']; ?>';
    var checkTPassword = '<?php echo $_POST['checkTPassword']; ?>';
    var placementUsername = '<?php echo $_POST['placementUsername']; ?>';
    var placementPosition = '<?php echo $_POST['placementPosition']; ?>';

    var fromDiagram = '<?php echo $_POST['fromDiagram']; ?>';

    let startProductID = 1;

    var getSponserUsername = '<?php echo $_POST['getSponsorUsername'] ?: $_SESSION['username']; ?>';
    var getPlacementName = '<?php echo $_POST['getPlacementName']; ?>';
    var getPlacementPosition = '<?php echo $_POST['placementPosition']; ?>';
    var fromTree = sessionStorage.getItem("fromTree");
    var sendOTPCode;

    $(document).ready(function(){
        $('#sponsorUsername').val(getSponserUsername);

        if (fromTree == "sponsor") {
            $('#sponsorUsername').prop("disabled", true);
        } else {
            $('#sponsorUsername').prop("disabled", false);
        }

        if (fromDiagram) {
            $('#placementUsername').val(getPlacementName);
            $('#placementUsername').prop( "disabled", true );
            if (getPlacementPosition == 1) {
                $("#left").attr('checked', 'checked');
                $('input[name="placementPosition"]').attr('disabled', 'disabled');
            } else if (getPlacementPosition == 2) {
                $("#right").attr('checked', 'checked');
                $('input[name="placementPosition"]').attr('disabled', 'disabled');
            } 
            
        }
        $('#fullName').val(fullName);
        $('#username').val(username);
        $('#phoneCode').val(dialingArea);
        $('#phoneNo').val(phone);
        $('#email').val(email);
        $('#password').val(password);
        $('#checkPassword').val(checkPassword);
        $('#tPassword').val(tPassword);
        $('#checkTPassword').val(checkTPassword);

        var formData  = {
            command   : "getRegistrationDetailMember"
        };
        var fCallback = loadCountries;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("#backBtn").click(function() {
            $.redirect('dashboard');
        });

        $('#country').change(function(){
            var phoneCode = $('#country option:selected').attr('data-code');
            $('#phoneCode').text(phoneCode);
        });

        $('#signUpBtn').click(function(){

            $('.invalid-feedback').remove();
            $('input').removeClass('is-invalid');

            fullName = $('#fullName').val();
            username = $('#username').val();
            country = $('#country').find('option:selected').val();
            identityNumber = $('#identityNumber').val();
            dialingArea = $('#phoneCode').text();
            phone = $('#phoneNo').val();
            email = $('#email').val();
            password = $('#password').val();
            checkPassword = $('#checkPassword').val();
            tPassword = $('#tPassword').val();
            checkTPassword = $('#checkTPassword').val();
            sponsorName = $('#sponsorUsername').val();
            placementUsername = $('#placementUsername').val();
            placementPosition = $("input[name=placementPosition]:checked").val();
            registerType = 'package';
            dialingArea = dialingArea.replace("+", "");

            sendOTPCode = $('#otpCodeInp').val();

            if (registerType == "package") {
                var formData = {
                    'command' : "publicRegistration",
                    'registerType' : 'free',
                    'fullName' : fullName,
                    'username' : username,
                    'country' : country,
                    // 'identityNumber' : identityNumber,
                    'dialingArea' : dialingArea,
                    'phone' : phone,
                    'email' : email,
                    'productID' : startProductID,
                    'password' : password,
                    'checkPassword' : checkPassword,
                    'tPassword' : tPassword,
                    'checkTPassword' : checkTPassword,
                    // 'dateOfBirth' : dateOfBirth,
                    'sponsorName' : sponsorName,
                    'placementUsername' : placementUsername,
                    'placementPosition' : placementPosition,
                    'sendOTPCode' : sendOTPCode,
                    'fromMember' : 1,
                    'step' : 1
                };

                var fCallback = publicRegistrationSuccess;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
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
    $.redirect('registrationConfirmation', {
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
        sponsorName : sponsorName,
        registerType : registerType,
        placementUsername : placementUsername,
        placementPosition : placementPosition,
        sendOTPCode : sendOTPCode,
    });
}

function publicRegistrationCredit() {
    $.redirect('registrationPayment', {
        fullName : fullName,
        username : username,
        country : country,
        identityNumber : identityNumber,
        dialingArea : dialingArea,
        phone : phone,
        email : email,
        product : product,
        password : password,
        checkPassword : checkPassword,
        tPassword : tPassword,
        checkTPassword : checkTPassword,
        dateOfBirth : dateOfBirth,
        sponsorName : sponsorName,
        placementUsername : placementUsername,
        placementPosition : placementPosition,
        registerType : registerType,
        creditUnit : creditUnit,
    });
}

function publicRegistrationPackage() {
    $.redirect('registrationPayment', {
        fullName : fullName,
        username : username,
        country : country,
        // identityNumber : identityNumber,
        dialingArea : dialingArea,
        phone : phone,
        email : email,
        productID : startProductID,
        password : password,
        checkPassword : checkPassword,
        tPassword : tPassword,
        checkTPassword : checkTPassword,
        // dateOfBirth : dateOfBirth,
        sponsorName : sponsorName,
        placementUsername : placementUsername,
        placementPosition : placementPosition,
        registerType : registerType,
    });
}


function loadCountries(data,message){
    var countriesList = data.countriesList;
    var productList = data.product;

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

    if(productList) {
        var productHTML = "";

        $.each(productList, function(k,v){
            productHTML += `
                <label class="kt-radio">
                    <input type="radio" name="product" value="${k}"> ${v}
                    <span></span>
                </label>
            `;
        });

        $("#productID").html(productHTML);
        $("input[name=product][value='"+product+"']").prop("checked", true);
    }
}

</script>
