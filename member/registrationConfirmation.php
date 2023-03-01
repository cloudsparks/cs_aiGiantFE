<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Account Registration", $_SESSION['blockedRights']['Registration'])){
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
                                        <input id="fullName" class="form-control inputDesign" disabled type="text" placeholder="<?php echo $translations['M00377'][$language]; //Enter your full name ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00036"><?php echo $translations['M00036'][$language]; //Username ?></label>
                                        <input id="username" class="form-control inputDesign" disabled type="text" placeholder="<?php echo $translations['M00241'][$language]; //Enter Your Username ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00037"><?php echo $translations['M00037'][$language]; //Country ?></label>
                                       <select id="country" class="form-control inputDesign" disabled>
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
                                            <input id="phoneNo" class="form-control inputDesign" disabled type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="<?php echo $translations['M00380'][$language]; //Enter Your Mobile Number ?>">
                                        </div>
                                        <span id="phone"></span>
                                    </div>
                                </div>-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00039"><?php echo $translations['M00039'][$language]; //Email Address ?>
                                        </label>
                                        <input id="email" class="form-control inputDesign" disabled type="text" placeholder="<?php echo $translations['M00201'][$language]; //Enter Your Email Address ?>">
                                    </div>
                                </div>
                                <div class="goldLine mt-4 mb-5"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00044"><?php echo $translations['M00044'][$language]; //Sponsor Username ?></label>
                                        <input id="sponsorUsername" class="form-control" type="text" disabled>
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
                                        <input id="placementUsername" type="text" class="form-control" disabled required style="margin-bottom: 10px;">
                                        <input id="left" type="radio" name="placementPosition" value="1" disabled> 
                                        <label for="left" style="margin-right: 15px;"><?php echo $translations['A00200'][$language]; /* Left */ ?></label>

                                        <input id="right" type="radio" name="placementPosition" value="2" disabled> 
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
                                    <button id="confirmBtn" type="button" class="btn btn-primary w-100">
                                        <?php echo $translations['M00077'][$language]; //Next ?>
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
    var placementUsername = '<?php echo $_POST['placementUsername']; ?>';
    var placementPosition = '<?php echo $_POST['placementPosition']; ?>';
    var registerType = '<?php echo $_POST['registerType']; ?>';
    var sendOTPCode = '<?php echo $_POST['sendOTPCode']; ?>';
    // var creditUnit = '<?php echo $_POST['creditUnit']; ?>';

    // var fromDiagram = '<?php echo $_POST['fromDiagram']; ?>';
    // var fromSponsorDiagram = '<?php echo $_POST['fromSponsorDiagram']; ?>';

    $(document).ready(function(){


        $('#fullName').val(fullName);
        $('#username').val(username);
        // $('#identityNumber').val(identityNumber);
        $('#phoneCode').text('+'+dialingArea);
        $('#phoneNo').val(phone);
        $('#email').val(email);
        $('#password').val(password);
        $('#checkPassword').val(checkPassword);
        $('#tPassword').val(tPassword);
        $('#checkTPassword').val(checkTPassword);
        // $('#dateOfBirth').val(dateOfBirth);
        $('#sponsorUsername').val(sponsorName);
        $('#placementUsername').val(placementUsername);

        $("input[name=placementPosition][value='"+placementPosition+"']").prop("checked", true);
        $("input[name=regType][value='"+registerType+"']").prop("checked", true);
        // $('#creditUnit').val(creditUnit);

        $('input[type=radio][name=regType]').change(function() {
            if (this.value == 'credit') {
                $('#creditAmountDisplay').show();
            } else {
                $('#creditAmountDisplay').hide();
            }
        });

        var formData  = {
            command   : "getRegistrationDetailMember"
        };
        var fCallback = loadCountries;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


        $('#dateOfBirth').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });

        $('#country').change(function(){
            var phoneCode = $('#country option:selected').attr('data-code');
            $('#phoneCode').text(phoneCode);
        });

        $('#confirmBtn').click(function(){

	        	dialingArea = dialingArea.replace("+", "");

                var formData = {
                    'command' : "publicRegistrationConfirmation",
                    'registerType' : 'free',
                    'fullName' : fullName,
                    'username' : username,
                    'country' : country,
                    // 'identityNumber' : identityNumber,
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
                    'sendOTPCode' : sendOTPCode,
                    'fromMember' : 1
                };


                var fCallback = publicRegistrationSuccess;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        });

        $('.goToPublicReg').click(function() {
            $.redirect('registration', {
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
                sponsorName : sponsorName
            });
        });
});

function publicRegistrationSuccess(data, message) {
    var fromTree = sessionStorage.getItem("fromTree");

    if (fromTree == "sponsor") {
        showMessage('<?php echo $translations['M00389'][$language]; //Your registration is successful. ?>', 'success', '<?php echo $translations['M00072'][$language]; //Congratulations ?>', '', 'sponsorDiagram.php');
    } else {
        showMessage('<?php echo $translations['M00389'][$language]; //Your registration is successful. ?>', 'success', '<?php echo $translations['M00072'][$language]; //Congratulations ?>', '', 'placementDiagram.php');
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

        $('#country').val(country);
    }
}


</script>
