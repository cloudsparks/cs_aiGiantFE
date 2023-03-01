<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent hideSection2FA" id="enableSection">
    <div class="kt-container">
        <div class="text-center">
            <div class="pageTitle" data-lang='M03632'>
                <span><?php echo $translations['M03632'][$language]; //Two Factor Authentication ?></span>
            </div>
        </div>

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10">
                    <div class="listingWrapper">
                        <div class="col-12">
                            <div class="redBox">
                                <div class="innerRedBox">
                                    <div class="imgContainer2FA">
                                        <div class="imgInnerContainer2FA">
                                            <img src="/images/project/warning-icon.png" class="warningImg2FA" alt="red warning image">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="warningMsg2FA" data-lang="M03637"><?php echo $translations['M03637'][$language] //Two factor authentication not enabled ?></p>
                                        <p class="secondWarningMsg2FA" data-lang="M03638"><?php echo $translations['M03638'][$language] //We recommend enabling two-factor authentication to provide an extra layer of security to your account. ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row partCampForm">
                                <div class="col-md-12 pt-20">
                                    <div class="form-group">
                                        1. <label class="qrTitle2FA" data-lang="M03639"><?php echo $translations['M03639'][$language] //Install a two-factor authentication app ?></label>
                                        <p class="secondWarningMsg2FA" data-lang="M03640"><?php echo $translations['M03640'][$language] //We recommend using Google Authenticator of Microsoft Authenticator for iPhone or Android. ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        2. <label class="qrTitle2FA" data-lang="M03641"><?php echo $translations['M03641'][$language] //Configure the app ?></label>
                                        <p class="secondWarningMsg2FA" data-lang="M03642"><?php echo $translations['M03642'][$language] //Add your Joint Cap Venture account to your two-factor authentication app by doing one of the following: ?> </p>
                                    </div>
                                </div>

                                <!-- start qr section -->
                                <div class="pl-3">
                                    <div class="row text-center justify-content-center">
                                        <div class="col-md-5 col-sm-12 qrBox">
                                            <div class="mt-4 qrTitle2FA" style="padding: 20px;" data-lang="M03643">
                                                <?php echo $translations['M03643'][$language] //Scan the QR Code: ?>
                                                <div id="QRreferralLink2" class="mt-4"></div>
                                            </div>
                                            <div id="">
                                                <div class="col-12 iconQRposition1">
                                                <!-- company logo<img class="iconQR" src="<?php echo $config['favicon']; ?>"> -->
                                                </div>
                           
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2 code py-2 orContainer2FA" style="">
                                            <p class="orContent2FA">OR</p>
                                        </div>
                                        <div class="col-md-5 col-sm-12 qrBox">
                                            <div class="row code2FA">
                                                <div class="code mt-4 qrTitle2FA" data-lang="M01676" style="padding: 20px;" data-lang="M03644">
                                                    <?php echo $translations['M03644'][$language] //Manually enter the code below into the app: ?>
                                                </div>
                                                <div class="" style="background-color:#F9F9F9; padding: 15px; color:black;">
                                                    <strong><div id="keyInput"></div> </strong>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <!-- end of qr section -->
                                <div class="col-md-12 pt-20" >
                                    <div class="form-group">
                                        3. <label class="qrTitle2FA" data-lang="M03645"><?php echo $translations['M03645'][$language] //Enter the 6-digit code that the app generates ?></label>
                                        <p class="secondWarningMsg2FA" data-lang="M03646"><?php echo $translations['M03646'][$language] //Click the "Enable 2FA" button to enable the two-factor authentication ?></p>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-6 col-12 form-group">
                                        <input 
                                            id="codeInput" 
                                            class="form-control inputDesign" 
                                            type="number" 
                                            placeholder="<?php echo $translations['M03635'][$language] //Enter 6 digit OTP ?>"
                                        />
                                    </div>
                                    <div class="col-xs-2 mr-2">
                                        <button 
                                            onclick="enabledButton()" 
                                            type="button" 
                                            class="btn btn-primary w-100"
                                            data-toggle="modal" 
                                            data-target="#successParticipationModal" 
                                            data-lang="M03647"
                                        >
                                            <?php echo $translations['M03647'][$language] //Enabled 2FA ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pageContent hideSection2FA" id="disableSection">
    <div class="kt-container">
        <div class="text-center">
            <div class="pageTitle">
                <span data-lang="M03632"><?php echo $translations['M03632'][$language]; //Two Factor Authentication ?></span>
            </div>
        </div>
        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10">
                    <div class="listingWrapper">
                        <div class="col-12">
                            <div class="greenBox">
                                <div class="innerRedBox">
                                    <div class="imgContainer2FA">
                                        <div class="imgInnerContainer2FA">
                                            <img src="/images/project/successIcon.png" class="warningImg2FA" alt="red warning image">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="warningMsg2FA" data-lang="M03648"><?php echo $translations['M03648'][$language] //Your two-factor authenticaton is activated.?></p>
                                        <p class="secondWarningMsg2FA" data-lang="M03649"><?php echo $translations['M03649'][$language] //Your account is now protected with an extra layer of security. ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 col-3">
                            <div class="col-xs-2 mr-2">
                                <button 
                                    onclick="showModal()" 
                                    type="button" 
                                    class="btn btn-primary disableBtn2FA w-100"
                                    data-toggle="modal" 
                                    data-target="#successParticipationModal" 
                                    data-lang="M03650"
                                >
                                    <?php echo $translations['M03650'][$language] //Disable 2FA ?>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade successModal" id="disableModal" tabindex="-1" role="dialog" aria-labelledby="confirmParticipationLabel" style="padding-left: 17px; padding-right: 18.9884px; display: none;" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row text-center">
                    <div class="col-12">
                        <img src="images/project/warningIcon.png" alt="" width="65">
                    </div>
                    <div class="col-12">
                        <span class="modal-title" style="font-size:24px;" data-lang="M03651"><?php echo $translations['M03651'][$language] //Disable Two-Factor Authentication ?></span>
                    </div>
                </div>
                <div class="modalCloseWrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>   
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont px-5 pb-4 pt-2">
                <div class="row justify-content-center">
                    <div class="col-8 partCampModalLabel text-center" data-lang="M03652">
                        <?php echo $translations['M03652'][$language] //Are you sure you want to disable two-factor authentication? ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            	<button id="backParticipationBtn" type="button" class="btn btn-default" 
                    data-dismiss="modal" data-lang="M00163"><?php echo $translations['M00163'][$language]; //Back ?></button>
            	<button id="confirmParticipationBtn" onclick="disableButton()" type="button" class="btn btn-primary"
                 data-dismiss="modal" data-lang="M00086"><?php echo $translations['M00086'][$language]; //Confirm ?></button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>
<script type="text/javascript" src="js/qrcode.js"></script>
<script>
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var userId = '<?php echo $_SESSION['userID'] ?>';
    var key;
    var code;


    $(document).ready(function() {

        var formData  = {
            command   : "getGoogleAuth",
                email: userId,
                qr: "1",
         };

        var fCallback =  getDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    
    });

    function showModal() {
        $('#disableModal').modal('toggle');
    }

    function disableButton() {
        var formData   = {
            command            : "getGoogleAuthDisable",
            email             : userId,
        };

        var fCallback = submitCallback1;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function getDetails(data, message) {
            
        if(data.flag ==='1'){
              $('#disableSection').show();
            
        }else{
            $('#enableSection').show();
        }
        key = data.SecretKey;
        code = data.qrCodeUrl;
        $("#keyInput").html(key);

        var createQr = "";

        createQr = `
                <div class="d-flex justify-content-center" id="qrCODE" title="${code}">
                    <canvas width="200" height="200" style="display: none;"></canvas>
                    <img alt="Scan me!" src="${code}" style="display: block;">
                </div>
        `

        $('#QRreferralLink2').html(createQr);

    }
    function enabledButton(){
        var code       = $("#codeInput").val();
        var formData   = {
        command            : "getGoogleAuth",
            email               : userId,
            code                :code,
            secret_key          :key,
        };
        var fCallback = submitCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    };


    function submitCallback(data, message) {
        showMessage(message, 'success', '<?php echo $translations['M03653'][$language] //Enable Two-Factor Authentication ?>', '', 'twoFactorAuth.php');
    }

    function submitCallback1(data, message) {
        showMessage(message, 'success', '<?php echo $translations['M03651'][$language] //Disable Two-Factor Authentication ?>', '', 'twoFactorAuth.php');
    }

     $('#disabledButton').click(function() {
           $('#disabledModal').modal('show');
    });
</script>
