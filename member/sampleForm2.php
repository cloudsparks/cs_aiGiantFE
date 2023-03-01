<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Account Registration", $_SESSION['blockedRights']['Registration'])){
     header("Location: dashboard.php");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
	<div class="kt-container">
		<div class="col-12 pageTitle">
			<?php echo $translations['M00005'][$language]; //Registration Confirmation ?>
		</div>
	    <div class="col-12">
	        <div class="row">

	            <div class="col-md-6 col-12">
	                <div class="row">
	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00177'][$language]; //Full Name ?></label>
	                        <input id="fullName" class="form-control inputDesign" type="text" disabled>
	                    </div>


	                    <div class="col-12" style="margin-top: 10px;">
	                        <label class="registrationLabel"><?php echo $translations['M00178'][$language]; //Country ?></label>
	                        <select id="country" class="form-control inputDesign" disabled>
	                        </select>
	                    </div>

	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00188'][$language]; //Mobile Number ?></label>
	                        <div class="input-group">
	                            <div class="input-group-append signupMobileFormRight"><span class="input-group-text phoneCodeStyle" id="phoneCode"></span></div>
	                            <input id="phone" class="form-control inputDesign" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" disabled>
	                        </div>
	                        
	                    </div>

	                </div>
	            </div>

	            <div class="col-md-6 col-12">
	                <div class="row">
	                    <div class="col-12" style="margin-top: 10px;">
	                        <label class="registrationLabel"><?php echo $translations['M01956'][$language]; //Identity Number ?></label>
	                        <input id="identityNumber" class="form-control inputDesign" type="text" disabled>
	                    </div>

	                    <div class="col-12" style="margin-top: 10px;">
	                        <label class="registrationLabel"><?php echo $translations['M01058'][$language]; //Date Of Birth ?></label>
	                        <input type="text" class="form-control inputDesign" id="dateOfBirth" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" disabled>
	                    </div>
	                </div>
	            </div>


	            

	           
	        </div>
	    </div>
	</div>
</section>

<section class="pageContent" style="margin-bottom: 20px;">
	<div class="kt-container">
	    <div class="col-12">
	        <div class="row">
	            <div class="col-12 pageSubTitle">
	                <?php echo $translations['M00003'][$language]; //ADDITIONAL INFORMATION ?>
	            </div>

	            <div class="col-12">
	                <div class="row">
	                    <div class="col-md-6 col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00104'][$language]; //Username ?></label>
	                        <input id="username" class="form-control inputDesign" type="text" disabled>
	                    </div>
	                    <div class="col-md-6 col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00187'][$language]; //Email Address ?></label>
	                        <input id="email" class="form-control inputDesign" type="text" disabled>
	                    </div>
	                </div>
	            </div>


	          

	            <div class="col-12">
	                <div class="row">
	                    <div class="col-md-6 col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M01651'][$language]; //Sponsor Username ?></label>
	                        <input id="sponsorUsername" class="form-control inputDesign" type="text" disabled>

	                    </div>
	                    <div class="col-md-6 col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00196'][$language]; //Placement Username ?></label>
	                        <input id="placementUsername" class="form-control inputDesign" type="text" disabled>
	                        <div id="placementPosition" class="kt-radio-inline loginRadio" style="margin-top: 5px;">
	                            <label class="kt-radio">
	                                <input type="radio" name="placementPosition" value="1" disabled><?php echo $translations['M00198'][$language]; //Left ?>
	                                <span></span>
	                            </label>
	                            <label class="kt-radio">
	                                <input type="radio" name="placementPosition" value="2" disabled><?php echo $translations['M00200'][$language]; //Right ?>
	                                <span></span>
	                            </label>
	                        </div>
	                    </div>

	                </div>
	            </div>

	            <div class="col-12">
	                <div class="row">
	                    <div class="col-md-6 col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00051'][$language]; //Registration Type ?><span class="mustFill">*</span></label>
	                        <div id="RegistrationType" class="kt-radio-inline loginRadio" style="margin-top: 5px;">
	                            <label class="kt-radio">
	                                <input type="radio" name="regType" value="free" disabled><?php echo $translations['M02122'][$language]; //Free ?>
	                                <span></span>
	                            </label>
	                            <label class="kt-radio">
	                                <input type="radio" name="regType" value="credit" disabled><?php echo $translations['M00543'][$language]; //Credit ?>
	                                <span></span>
	                            </label>
	                        </div>
	                        
	                    </div>

	                    <div id="creditAmountDisplay" class="col-md-6 col-12" style="margin-top: 10px; display: none;">
	                        <label class="registrationLabel">Credit Amount <span class="mustFill">*</span></label>
	                        <input id="creditUnit" type="text" class="form-control inputDesign" autocomplete="off" disabled>
	                    </div>

	                </div>
	            </div>


	        </div>
	    </div>
	    <div class="col-12 registrationBtnPosition" style="margin-top: 20px;">
	        <div class="row">
	            <div class="col-md-6 col-12 text-right d-none d-sm-block">
	                <button type="button" class="btn btn-default goToPublicReg" style="text-transform: uppercase;"><?php echo $translations['M00218'][$language]; //BACK ?></button>
	            </div>
	            <div class="col-md-6 col-12 registrationBtnPosition">
	                <button id="confirmBtn" type="button" id="loginBtn" class="btn btn-primary"><?php echo $translations['M00225'][$language]; //CONFIRM ?></button>
	            </div>
	            <div class="col-md-6 col-12 text-center d-block d-sm-none">
	                <button type="button" class="btn btn-default goToPublicReg" style="text-transform: uppercase;"><?php echo $translations['M00218'][$language]; //BACK ?></button>
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
	//receive data from previous page
    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;

    var fullName3 = '<?php echo $_POST['fullName2']; ?>';
    var username = '<?php echo $_POST['username']; ?>';
    var country = '<?php echo $_POST['country']; ?>';
    var identityNumber = '<?php echo $_POST['identityNumber']; ?>';
    var dialingArea = '<?php echo $_POST['dialingArea']; ?>';
    var phone = '<?php echo $_POST['phone']; ?>';
    var email = '<?php echo $_POST['email']; ?>';
    var password = '<?php echo $_POST['password']; ?>';
    var checkPassword = '<?php echo $_POST['checkPassword']; ?>';
    var tPassword = '<?php echo $_POST['tPassword']; ?>';
    var checkTPassword = '<?php echo $_POST['checkTPassword']; ?>';
    var dateOfBirth = '<?php echo $_POST['dateOfBirth']; ?>';
    var sponsorName = '<?php echo $_POST['sponsorName']; ?>';
    var placementUsername = '<?php echo $_POST['placementUsername']; ?>';
    var placementPosition = '<?php echo $_POST['placementPosition']; ?>';

    //display on confirmation page
    $(document).ready(function(){
        $('#fullName').val(fullName3);
        $('#username').val(username);
        $('#identityNumber').val(identityNumber);
        $('#phoneCode').text(dialingArea);
        $('#phone').val(phone);
        $('#email').val(email);
        $('#dateOfBirth').val(dateOfBirth);
        $('#sponsorUsername').val(sponsorName);
        $('#placementUsername').val(placementUsername);
        $("input[name=placementPosition][value='"+placementPosition+"']").prop("checked", true);
        $("input[name=regType][value='"+registerType+"']").prop("checked", true);
        $('#creditUnit').val(creditUnit);


        //call for load countries (change command only)
        var formData  = {
            command   : "getRegistrationDetailMember"
        };
        var fCallback = loadCountries;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        //send to backend (left side is backend param)
        $('#confirmBtn').click(function(){
                var formData = {
                    'command' : "memberRegistrationConfirmation",
                    'registerType' : "free",
                    'fullName' : fullName3,
                    'username' : username,
                    'country' : country,
                    'identityNumber' : identityNumber,
                    'dialingArea' : dialingArea,
                    'phone' : phone,
                    'email' : email,
                    'password' : password,
                    'checkPassword' : checkPassword,
                    'tPassword' : tPassword,
                    'checkTPassword' : checkTPassword,
                    'dateOfBirth' : dateOfBirth,
                    'sponsorName' : sponsorName,
                    'placementUsername' : placementUsername,
                    'placementPosition' : placementPosition
                };

                var fCallback = publicRegistrationSuccess;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        });
        //back button with previous input data
        $('.goToPublicReg').click(function() {
            $.redirect('registration.php', {
                fullName : fullName3,
                username : username,
                country : country,
                identityNumber : identityNumber,
                dialingArea : dialingArea,
                phone : phone,
                email : email,
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
                fromDiagram : fromDiagram,
                fromSponsorDiagram : fromSponsorDiagram
            });
        });
});

//if success will run this function
function publicRegistrationSuccess(data, message) {
    showMessage(message, 'success', '<?php echo $translations['M00228'][$language]; //Congratulation ?>', '', 'dashboard.php');
}

//build country list and display
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