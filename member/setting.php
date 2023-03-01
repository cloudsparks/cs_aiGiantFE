<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<link href="css/dashboard.css?v=<?php echo filemtime('css/dashboard.css'); ?>" rel="stylesheet" type="text/css" />

<section class="pageContent">
    <div class="kt-container">
        <div class="text-center">
            <div class="pageTitle">
                 <span data-lang="M00434">Security</span>
            </div>
        </div>
        <div class="bgContainer p-5">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="tabs">
                          <input name="tabs" type="radio" id="tab-1" checked="checked" class="input"/>
                          <label for="tab-1" class="label tab1">Change Login Password</label>
                          <div id="panel1" class="panel">
                            <div class="settingFont01">Change Login Password</div>
                            <div class="col-12 text-left">
                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label for="" data-lang="M01152" style="color: #fff;"><?php echo $translations['M01152'][$language]; //Old password 
                                                                            ?></label>
                                            <input id="currentPassword" type="password" class="form-control" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Username 
                                                                                                            ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label for="" data-lang="M00083" style="color: #fff;"><?php echo $translations['M00083'][$language]; //New password 
                                                                            ?></label>
                                            <input id="newPassword" type="password" class="form-control" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Username 
                                                                                                            ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label for="" data-lang="M01322" style="color: #fff;"><?php echo $translations['M01322'][$language]; //retype new password 
                                                                            ?></label>
                                            <input id="newPasswordConfirm" type="password" class="form-control" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Username 
                                                                                                            ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button onclick="confirmBtnChangePassword();" type="button" class="btn btn-primary"><?php echo $translations['M00086'][$language]; //Confirm ?></button>  
                                </div>
                            </div>
                            
                          </div>

                          <input name="tabs" type="radio" id="tab-2" class="input"/>
                          <label for="tab-2" class="label">Change Transaction Password</label>
                          <div id="panel2" class="panel">

                          </div>

                          <input name="tabs" type="radio" id="tab-3" class="input"/>
                          <label for="tab-3" class="label">Reset Transaction Password</label>
                          <div id="panel3" class="panel">
                          
                            
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
</html>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var fCallback = "";
var withdrawalData,bankData,walletData,unitRate, exchangeRateDisplay; //display
var balance,adminFee,minAmount,adminFeePerc,exchangeRate,adminFeeFixed; //calculation
var passData;
var creditType		= "<?php echo $_POST['creditType']; ?>";
var userId = '<?php echo $_SESSION['userID'] ?>';
var googleAuth;
var responseArr;

// var walletName = "<?php echo $_POST['walletName']; ?>";
// var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";
// var balance  		= "<?php echo $_POST['balance']; ?>";

$(document).ready(function(){

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#nextBtn").click();
		}
	});

    var date = new Date();
    var currentDate = date.getDate();
    var currentMonth = date.getMonth() + 1; 
    var currentYear = date.getFullYear();
    var todayDate = (currentDate + "-" + currentMonth + "-" + currentYear);
    /*
    $('.sendCode').click(function(){
        $(".invalid-feedback").remove();

        var cryptoType          = $('#crypto').find('option:selected').val();
        // var walletAddress       = $("#walletAddress").val();
        var walletAddress       =  $('#selectedWalletDropDown').find('option:selected').val();
        var amount              = $("#amount").val();
        var withdrawalDetails = {};

        withdrawalDetails = {
            amount : amount,
            walletAddress : walletAddress,
            cryptoType : cryptoType,
            creditType : creditType
        }

        var formData  = {
            command     : "sendOTPCode",
            type        : "withdrawal",
            sendType    : "email",
            username    : "<?php echo $_SESSION['username'] ?>",
            email       : "<?php echo $_SESSION['userEmail'] ?>",
            withdrawalDetails : withdrawalDetails,
        };
        
        fCallback = otpCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }); */

    $('#todayDate').text(todayDate);

    if (creditType == "capitalCredit") {
        $('.capitalHide').hide();
    } else {
        $('.capitalHide').show();
    }

    /*
    $('.verifiedBtn').click(function() {
        $('.invalid-feedback').remove();
        $('input').removeClass('is-invalid');
        
        var code = $(window).width() <= 800 ? $('#mobileFACode').val() : code = $('#webFACode').val();

        var Secret_key   = $("#keyInput").val();
        var formData     = {
            command            : "getGoogleAuth",
            email              : userId,
            code               : code,  
        };
        var fCallback = hidingModal;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });*/

	$("#nextBtn").click(function(){

        $('.invalid-feedback').remove();
        $('input').removeClass('is-invalid');

        var type = $('#withdrawalType').find('option:selected').val();

        var cryptoType 			= $('#crypto').find('option:selected').val();
        var walletAddress 		= $('#selectedWalletDropDown').find('option:selected').val();
        var amount 				= $("#amount").val();
        var transactionPassword = $("#transactionPassword").val();
        var addNewAddress		= $("#addAdress:checked").val();

        var bankID 				= $('#bankType').find('option:selected').val();
        var accountNumber 		= $("#accountNo").val();
        var branch 				= $("#branch").val();
        var accountHolder 		= $("#accountHolder").val();
        var province 			= $("#province").val();
        var otpCode             = $('#otpCode').val();

        if(type == 'bank'){
            var formData = {
                'command' : "memberAddNewWithdrawal",
                creditType: creditType,
                type : type,
                amount : amount,
                bankID : bankID,
                accountNumber: accountNumber,
                accountHolder: accountHolder,
                branch: branch,
                province: province,
                transactionPassword : transactionPassword,
                //otpType : "email",
                //otpCode : otpCode,
            };

            passData = formData;
        }else{
            var formData = {
                'command' : "memberAddNewWithdrawal",
                creditType: creditType,
                type : type,
                amount : amount,
                cryptoType : cryptoType,
                walletAddress: walletAddress,
                transactionPassword : transactionPassword,
                addNewAddress: addNewAddress,
                //otpType : "email",
                //otpCode : otpCode,
            };

            passData = formData;
        }

        var fCallback = googleAuth == 1 ? myf : withdrawConfirmation

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    })

    $('#tab-1').click(function() {

        $('#panel2').empty();
        $('#panel3').empty();

        var buildHtml = "";

        buildHtml = `
                <div class="settingFont01">Change Login Password</div>
                    <div class="col-12 text-left">
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="" data-lang="M01152" style="color: #fff;"><?php echo $translations['M01152'][$language]; //Old password 
                                                                    ?></label>
                                    <input id="currentPassword" type="password" class="form-control" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Username 
                                                                                                    ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="" data-lang="M00083" style="color: #fff;"><?php echo $translations['M00083'][$language]; //New password 
                                                                    ?></label>
                                    <input id="newPassword" type="password" class="form-control" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Username 
                                                                                                    ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="" data-lang="M01322" style="color: #fff;"><?php echo $translations['M01322'][$language]; //retype new password 
                                                                    ?></label>
                                    <input id="newPasswordConfirm" type="password" class="form-control" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Username 
                                                                                                    ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button onclick="confirmBtnChangePassword();" type="button" class="btn btn-primary"><?php echo $translations['M00086'][$language]; //Confirm ?></button>  
                        </div>
                    </div>
        `;

        $("#panel1").html(buildHtml);
       
    });

    $('#tab-2').click(function() {

        $('#panel1').empty();
        $('#panel3').empty();

        var buildHtml = "";

        buildHtml = `
                <div class="settingFont01">Change Transaction Password</div>
                    <div class="col-12 text-left">
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="" data-lang="M00088" style="color: #fff;"><?php echo $translations['M00088'][$language]; //Old password 
                                                                    ?></label>
                                    <input id="currentTPassword" type="password" class="form-control" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Username 
                                                                                                    ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="" data-lang="M00089" style="color: #fff;"><?php echo $translations['M00089'][$language]; //New password 
                                                                    ?></label>
                                    <input id="newTPassword" type="password" class="form-control" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Username 
                                                                                                    ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="" data-lang="M00090" style="color: #fff;"><?php echo $translations['M00090'][$language]; //retype new password 
                                                                    ?></label>
                                    <input id="newTPasswordConfirm" type="password" class="form-control" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Username 
                                                                                                    ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button onclick="confirmBtnChangeTxPassword();" type="button" class="btn btn-primary"><?php echo $translations['M00086'][$language]; //Confirm ?></button>  
                        </div>
                    </div>
        `;

        $("#panel2").html(buildHtml);
       
    });

    $('#tab-3').click(function() {

        $('#panel1').empty();
        $('#panel2').empty();

        var buildHtml = "";

        buildHtml = `
                <div class="settingFont01">Reset Transaction Password</div>
                  <div class="col-12 text-left">
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="" data-lang="M02655" style="color: #fff;"><?php echo $translations['M02655'][$language]; //Email ?></label>
                                    <input id="email" disabled type="text" class="form-control" value="<?php echo $_SESSION['userEmail'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="" data-lang="M00089" style="color: #fff;"><?php echo $translations['M00089'][$language]; //New password 
                                                                    ?></label>
                                <input id="tPassword" type="password" class="form-control" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Username 
                                                                                                    ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="" data-lang="M00090" style="color: #fff;"><?php echo $translations['M00090'][$language]; //retype new password 
                                                                    ?></label>
                                    <input id="retypeTPassword" type="password" class="form-control" placeholder="<?php echo $translations['M00382'][$language]; //Enter Your Username 
                                                                                                    ?>">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="form-group">
                                    <label for="" data-lang="M00090" style="color: #fff;"><?php echo $translations['M00231'][$language]; //OTP ?></label>
                                    <div style="display: flex;">
                                        <input type="text" class="form-control inputWidth" id="otpCodeInp" placeholder="<?php echo "Enter OTP"; //Enter OTP ?>">
                                        <span class="appendOTPError"></span>
                                        <div class="justify-content-center" data-lang='M01109'>
                                            <button onclick="sendCode();" class="sendCode btn boldTxt text-center" style="color:#fff; background-color: #54F411;"><?php echo $translations['M01451'][$language]; //Send OTP ?></button>
                                        </div>
                                    </div>
                                    <div class="text-center timer mt-1" style="display: none; color: #fff; width: 100%;">
                                        <span class="" style="display:block; color: #fff;"></span>
                                    </div>
                                    <div id="otpCode"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button onclick="confirmBtnResetTxPassword()" type="button" class="btn btn-primary"><?php echo $translations['M00086'][$language]; //Confirm ?></button>  
                        </div>
                    </div>
        `;

        $("#panel3").html(buildHtml);
       
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
            type: "resetPassword ",
            sendType: "email",
            username: "<?php echo $_SESSION['username']; ?>"
        };
        formData['email'] = email;

        fCallback = otpCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function confirmBtnChangePassword() {
    var currentPassword    = $('#currentPassword').val();
    var newPassword        = $('#newPassword').val();
    var newPasswordConfirm = $('#newPasswordConfirm').val();
    var formData           = {
                                command            : "memberChangePassword",
                                currentPassword    : currentPassword,
                                newPassword        : newPassword,
                                newPasswordConfirm : newPasswordConfirm,
                                passwordCode       : 1
    };
    var fCallback = submitCallback;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function confirmBtnChangeTxPassword() {
    var currentTPassword    = $('#currentTPassword').val();
    var newTPassword        = $('#newTPassword').val();
    var newTPasswordConfirm = $('#newTPasswordConfirm').val();
    var formData           = {
                                command            : "memberChangeTransactionPassword",
                                currentPassword    : currentTPassword,
                                newPassword        : newTPassword,
                                newPasswordConfirm : newTPasswordConfirm,
                                passwordCode       : 2
    };
    var fCallback = submitCallback;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function confirmBtnResetTxPassword() {
    var newTPassword        = $('#tPassword').val();
    var newTPasswordConfirm = $('#retypeTPassword').val();
    var otpCode = $('#otpCodeInp').val();
    var formData           = {
                                command            : "memberResetTransactionPassword",
                                memberId: "<?php echo $_SESSION['userID']; ?>",
                                tPassword        : newTPassword,
                                retypeTPassword : newTPasswordConfirm,
                                username: "<?php echo $_SESSION['username']; ?>",
                                otpType : "email",
                                otpCode : otpCode

    };
    var fCallback = submitCallback;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function submitCallback(data, message) {
    showMessage('<?php echo $translations["M00283"][$language]; //Successful changed password ?>.', 'success', '<?php echo $translations["M00331"][$language]; //Change Password ?>', '', 'setting');
}

function verifyBtn() {
    $('.invalid-feedback').remove();
    $('input').removeClass('is-invalid');
    
    var code = $('#code').val();

    var Secret_key   = $("#keyInput").val();
    var formData     = {
        command            : "getGoogleAuth",
        email              : userId,
        code              : code,  
    };
    var fCallback = withdrawConfirmation;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function myf(data,message) {

    responseArr = data

    $('#code').val('');

    if($(window).width() <= 990) {
        $(".slideout-sidebar1").css("top","250px");
        $('.webView').html('')
    }else {
        $(".slideout-sidebar").css("right","0px");
        $('.mobileView').html('')
    }

    $("body").append('<div id="sidenav-overlay" style="opacity: 1;" class=""></div>');

    $("#sidenav-overlay").click(function(){
        $(".slideout-sidebar").css("right","-450px");
        $(".slideout-sidebar1").css("top","1000px");
        $("#sidenav-overlay").remove();
        //$(".mobileView").hide()
    });
}
/*
function otpCallback(data, message) {
    showMessage(message, 'success', '<?php echo $translations['M01324'][$language]; //Send OTP Code?>', 'success')
    // otpCode = data.resendOTPCountDown;
    countDown(data.resendOTPCountDown);
} */

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

</script>
