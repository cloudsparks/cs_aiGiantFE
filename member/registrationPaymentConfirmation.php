<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Account Registration", $_SESSION['blockedRights']['Registration'])){
     header("Location: dashboard.php");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent" style="margin-bottom: 20px;">
	<div class="kt-container">
		<div class="col-12 pageTitle">
			<?php echo $translations['M00064'][$language]; //Credit Registration Payment Confirmation ?>
		</div>
	    <div class="col-12">
	        <div class="row">

	            <div class="col-md-6 col-12">
	                <div id="buildConfirmation" class="row"></div>
	            </div>
	            <div class="col-12" style="margin-top: 20px">
	            	<?php echo $translations['M01685'][$language]; //Total Principal Amount (USDT) ?> : <span id="totlaAmount"></span>
	            </div>
	        </div>
	    </div>
	</div>
</section>

<section class="pageContent">
	<div class="kt-container">
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
	                        <input id="country" class="form-control inputDesign" type="text" disabled>
	                    </div>

	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00187'][$language]; //Email Address ?></label>
	                        <input id="email" class="form-control inputDesign" type="text" disabled>
	                    </div>

	                </div>
	            </div>

	            <div class="col-md-6 col-12">
	                <div class="row">
	                    <div class="col-12" style="margin-top: 10px;">
	                        <label class="registrationLabel"><?php echo $translations['M00036'][$language]; //username ?></label>
	                        <input id="username" class="form-control inputDesign" type="text" disabled>
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

	            <!-- <div class="col-12">
	                <div class="row">
	                    <div class="col-md-6 col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00051'][$language]; //Registration Type ?> <span class="mustFill">*</span></label>
	                        <div id="RegistrationType" class="kt-radio-inline loginRadio" style="margin-top: 5px;">
	                            <label class="kt-radio">
	                                <input type="radio" name="regType" value="free" disabled><?php echo $translations['M00061'][$language]; //Free ?>
	                                <span></span>
	                            </label>
	                            <label class="kt-radio">
	                                <input type="radio" name="regType" value="credit" disabled><?php echo $translations['M00543'][$language]; //Credit ?>
	                                <span></span>
	                            </label>
	                        </div>
	                        
	                    </div>

	                </div>
	            </div> -->


	        </div>
	    </div>
	    <div class="col-12 registrationBtnPosition" style="margin-top: 20px;">
	    	<button id="backBtn" type="button" class="btn btn-default" style="text-transform: uppercase;"><?php echo $translations['M00218'][$language]; //BACK ?></button>
	    	<button id="submitBtn" type="button" class="btn btn-primary" style="text-transform: uppercase;"><?php echo $translations['M00225'][$language]; //CONFIRM ?></button>
	    </div>
	</div>
</section>

<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>


<script>

    var url            = 'scripts/reqDefault.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    var registerType = '<?php echo $_POST['registerType']; ?>';
    var fullName = '<?php echo $_POST['fullName']; ?>';
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

    var payerTPassword = '<?php echo $_POST['payerTPassword']; ?>';
    var spendCredit = JSON.parse('<?php echo $_POST['spendCredit'] ?>');
    var fromSponsorDiagram = '<?php echo $_POST['fromSponsorDiagram']; ?>';


    $(document).ready(function() {

    	$('#fullName').val(fullName);
    	$('#username').val(username);
    	
    	$('#identityNumber').val(identityNumber);
    	$('#phoneCode').text(dialingArea);
    	$('#phone').val(phone);
    	$('#email').val(email);
    	$('#password').val(password);
    	$('#checkPassword').val(checkPassword);
    	$('#tPassword').val(tPassword);
    	$('#checkTPassword').val(checkTPassword);
    	$('#dateOfBirth').val(dateOfBirth);
    	$('#sponsorUsername').val(sponsorName);
    	$('#placementUsername').val(placementUsername);


    	$("input[name=placementPosition][value='"+placementPosition+"']").prop("checked", true);
    	$("input[name=regType][value='"+registerType+"']").prop("checked", true);


    	var formData  = {
    	    command: 'memberRegisterDownlinePackageVerification',

    	    registerType : registerType,
    	    fullName : fullName,
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

    	    payerTPassword : payerTPassword,
    	    spendCredit : spendCredit,
    	    step : 2
    	};
    	var fCallback = goPayment;
    	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    	$('#submitBtn').click(function() {
    		
    		var formData  = {
    		    command: 'memberRegisterDownlinePackageConfirmation',
    		    registerType : registerType,
    		    fullName : fullName,
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

    		    payerTPassword : payerTPassword,
    		    spendCredit : spendCredit,
    		    step : 2
    		};
    		var fCallback = goToSuccess;
    		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    	});

    	$('#backBtn').click(function() {
    		$.redirect('registrationPayment.php',{
    			fullName : fullName,
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
    			fromDiagram : fromDiagram,
    			fromSponsorDiagram : fromSponsorDiagram
    		});
    	});
    });

    

	function goPayment(data, message) {

		let productPrice = data && data.productData && data.productData.price;
		$('#totlaAmount').html(addCommas(Number(productPrice).toFixed(2)));  


		$('#country').val(data.countryDisplay);

		var buildConfirmation = "";

		$.each(data.invoiceSpendData, function(k, v) {
			buildConfirmation +=`
				<div class="col-12 paymentBox" style="margin-top: 10px">
					<div class="row">
						<div class="col-12 paymentName">
							${translations[v['display']]['<?php echo $language?>']}
						</div>
						<div class="col-12 paymentBalance">
							<div class="row">
								<div class="col-3">
									<?php echo $translations['M00343'][$language]; //Rate ?>
								</div>
								<div class="col-1">
									:
								</div>
								<div class="col-8">
									${addCommas(Number(v['rate']).toFixed(8))}
								</div>
							</div>
						</div>
						<div class="col-12 paymentBalance">
							<div class="row">
								<div class="col-3">
									<?php echo $translations['M00208'][$language]; //Payment ?>
								</div>
								<div class="col-1">
									:
								</div>
								<div class="col-8">
									${addCommas(Number(v['creditUnit']).toFixed(8))}
								</div>
							</div>
						</div>
						<div class="col-12 paymentBalance">
							<div class="row">
								<div class="col-3">
									${translations[v['display']][language]} <?php echo $translations['M00009'][$language]; //To Pay ?>
								</div>
								<div class="col-1">
									:
								</div>
								<div class="col-8">
									${addCommas(Number(v['paymentAmount']).toFixed(8))}
								</div>
							</div>
						</div>


					</div>
				</div>
				
			`;
		});

		$('#buildConfirmation').html(buildConfirmation);
	}

	function goToSuccess(data, message) {
	    showMessage(message, 'success', '<?php echo $translations['M00228'][$language]; //Congratulation ?>', '', 'dashboard.php');
	}

</script>
