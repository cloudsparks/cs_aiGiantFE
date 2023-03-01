<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<style>
    .footerPosition {
        position: unset;
    }

</style>

<section class="pageContent" style="margin-bottom: 20px;">
    <div class="kt-container">
        <?php include("sidebar.php"); ?>
        <div class="col-12 pageTitle text-left ml-3">
            <?php echo $translations['M00284'][$language]; //Reset Transaction Password ?>
        </div>
        <div class="col-12 mb-5">
            <div id="editPassword" class="row justify-content-center">

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 px-5">
                            <div class="row">
                                <div class="col-md-4 col-12 pw_banner p-5">
                                    
                                </div>
                                <div class="col-md-8 col-12 p-5">
                                    <div class="form-group">
                                        <label for="" data-lang="M02655"><?php echo $translations['M02655'][$language]; // Email ?></label>
                                        <input id="email" value="<?php echo $_SESSION['userEmail']; ?>" type="text" disabled class="form-control inputWidth">
                                    </div>
                                    <div class="form-group">
                                        <label for="" data-lang="M00089"><?php echo $translations['M00089'][$language]; //New password 
                                                                            ?></label>
                                        <input id="newTPassword" type="password" class="form-control inputWidth" placeholder="<?php echo $translations['M01972'][$language]; //Enter Your Username 
                                                                                                            ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="" data-lang="M00090"><?php echo $translations['M00090'][$language]; //retype new password 
                                                                            ?></label>
                                        <input id="newTPasswordConfirm" type="password" class="form-control inputWidth" placeholder="<?php echo $translations['M00383'][$language]; //Enter Your Username 
                                                                                                            ?>">
                                    </div>
                                    <label for="" data-lang="M00233" style="font-weight: 500;"><?php echo $translations['M00233'][$language]; //retype new password ?></label>
                                    <div class="form-group">
                                        <div id="emailBox" style="display:flex">
                                            <input type="text" class="form-control inputWidth" id="otpCode" placeholder="<?php echo "Enter OTP"; //Enter OTP ?>">
                                            <span class="appendOTPError"></span>
                                            <div class="justify-content-center" data-lang='M01109'>
                                                <a href="javascript:;" class="sendCode btn boldTxt text-center" style="color:#fff; background-color: #515151;"><?php echo "Send OTP To Email"; //Send OTP Code ?></a>
                                                <span class="form__button-wrapper text-center timer" style="display: none; color: #fff; width: 95px;">
                                                    <span class="p-3" style="display:block; color: #000"></span>
                                                </span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button id="confirmBtn" type="button" class="btn btn-primary"><?php echo $translations['M00086'][$language]; //Confirm ?></button>  
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>
</section>




</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<script>
	// Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;


    $(document).ready(function() {

        $('.sendCode').click(function() {
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
        });

        $('#nextBtn').click(function() {
        	$("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });

        	if ($('#currentTPassword').val()=="") {
        		errorDisplay("currentTPassword","<?php echo $translations['M01146'][$language]; //Please Enter Your Current Transaction Password. ?>");
        	}else if($('#newTPassword').val()==""){
        		errorDisplay("newTPassword","<?php echo $translations['M01147'][$language]; //Please Enter Your New Transaction Password. ?>");
        	}else if($('#newTPasswordConfirm').val()==""){
        		errorDisplay("newTPasswordConfirm","<?php echo $translations['M01148'][$language]; //Please Retype Your New Transaction Password. ?>");
        	}else{
        		var canvasBtnArray = {
			        Confirm: '<?php echo $translations['M00225'][$language]; /* Confirm */ ?>'
			    };

        		showMessage('<?php echo $translations["M00564"][$language]; /* This will change the settings for your changes. Are you sure that you want to proceed */ ?> ?', 'warning', '<?php echo $translations["M00563"][$language]; /* Change settings */ ?>', '', '', canvasBtnArray);

        		$('#canvasConfirmBtn').click(function() {
        			confirmModal();
        		});
        	}
        });

        // reset to default search
        $('#resetBtn').click(function() {
            $('#editPassword').find('input').each(function() {
                $(this).val('');
            });
            $("input").each(function(){
                $(this).removeClass('is-invalid');
                $('.invalid-feedback').html("");
            });
        });

        $('#confirmBtn').click(function(){
            var currentTPassword    = $('#currentTPassword').val();
            var newTPassword        = $('#newTPassword').val();
            var newTPasswordConfirm = $('#newTPasswordConfirm').val();
            var otpCode = $('#otpCode').val();
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
        });
    });

    function submitCallback(data, message) {
    	showMessage('<?php echo $translations["M00579"][$language]; /* Successful changed password */ ?>.', 'success', '<?php echo $translations["M00122"][$language]; /* Change Password */ ?>', '', 'changeLoginPassword.php');
    }

    function confirmModal() {
        var currentTPassword    = $('#currentTPassword').val();
        var newTPassword        = $('#newTPassword').val();
        var newTPasswordConfirm = $('#newTPasswordConfirm').val();
        var otpCode = $('#otpCode').val();
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
            $('.sendCode').show();
            $('.timer').hide();
            return;
        }else if(minutes == 0 && seconds != 0){
            $('.sendCode').hide();
            $('.timer').show();
            $('.timer span').empty().append(seconds+"<?php echo $translations['M03596'][$language]; /* Sec */ ?>");
            setTimeout('countDown('+(second-1)+')',1000);
        }else{
            $('.sendCode').hide();
            $('.timer').show();
            $('.timer span').empty().append(minutes+"<?php echo $translations['M03595'][$language]; /* Min */ ?>"+" "+seconds+"<?php echo $translations['M03596'][$language]; /* Sec */ ?>");
            setTimeout('countDown('+(second-1)+')',1000);
        }
    }

</script>
