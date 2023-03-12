<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<?php 
    session_start();

    if (in_array("Edit Profile", $_SESSION['blockedRights'])){
     header("Location: dashboard");
    } 
?>

<style>
	.sideBarContent {
		margin-top:0px;
	}
</style>

<section class="pageContent" style="padding-top:0;">
	<div class="kt-container">
		<div class="col-12 px-0">
            <img src="/images/profile_bg.png" class="w-100">
            <img src="/images/project/user.png" class="profileAvatar" style="display:block;object-fit: cover;width:80%;margin:auto;border-radius: 50%;width:117px;height:117px;" />
        </div>
        <div class="col-12 px-0 profileContainer">
        	<div class="profile_margin">
        		<div class="profileFont01">
	    			<span id="fullName"></span>
	    		</div>
	    		<div class="profileFont02">
	    			@<span id="username"></span>
	    		</div>
        	</div>
        	
        </div>

		
		<div class="col-12">
			<div class="row" style="padding:30px;">
				<div class="col-md-6 col-12">
					<div class="profileWrapper">
						<div class="listingWrapper profileBgRight">
						    <div class="col-12">
						    	<!-- <div class="d-flex justify-content-between align-items-center pfWrap">
						    		<span class="subTitle subProfile" data-lang="M00417"><?php echo $translations['M00417'][$language]; //Edit Profile ?></span>
						    		<a href="recentLogin.php" class="link" data-lang="M00990"><?php echo $translations['M00990'][$language]; //View Recent Login ?> ></a> ->
						    	</div> -->
						    	<div class="profile_text01 mb-4">
			                    	<?php echo $translations['M03748'][$language]; /* My Details */ ?>
			                    </div>
						    	<div class="col-12 editField2">
									<div class="d-flex justify-content-between align-items-start editField">
										<div class="d-flex">
											<!-- <div class="pfIcon">
												<img src="/images/project/user.png">
											</div> -->
											<div>
												<div class="pfTitle" data-lang="A00103">
													<?php echo $translations['M00001'][$language]; //Username ?>
												</div>
											</div>
										</div>
										<div class="d-flex">
											<div class="pfDes">
												<span id="usernameDisplay"></span>
											</div>
										</div>
									</div>
								</div>

								<div class="profileLine mb-3"></div>

								<div class="col-12 editField2">
									<div class="d-flex justify-content-between align-items-start editField">
										<div class="d-flex">
											<!-- <div class="pfIcon">
												<img src="/images/project/user.png">
											</div> -->
											<div>
												<div class="pfTitle" data-lang="A00103">
													<?php echo $translations['M00035'][$language]; //Name ?>
												</div>
											</div>
										</div>
										<div class="d-flex">
											<div class="pfDes">
												<span id="nameDisplay"></span>
											</div>
										</div>
									</div>
								</div>

								<div class="profileLine mb-3"></div>

								<div class="col-12 editField2">
									<div class="d-flex justify-content-between align-items-start editField">
										<div class="d-flex">
											<!-- <div class="pfIcon">
												<img src="/images/project/user.png">
											</div> -->
											<div>
												<div class="pfTitle" data-lang="A00103">
													<?php echo $translations['A00103'][$language]; //Email ?>
												</div>
											</div>
										</div>
										<div class="d-flex">
											<div class="pfDes">
												<span id="email"></span>
											</div>
										</div>
									</div>
								</div>
									
								<div class="profileLine mb-3"></div>

								<div class="col-12 editField2">
									<div class="d-flex justify-content-between align-items-start editField">
										<div class="d-flex">
											<!-- <div class="pfIcon">
												<img src="/images/project/user.png">
											</div> -->
											<div>
												<div class="pfTitle" data-lang="A00153">
													<?php echo $translations['A00153'][$language]; //Country ?>
												</div>
											</div>
										</div>
										<div class="d-flex">
											<div class="pfDes">
												<span id="country_d"></span>
											</div>
										</div>
									</div>
								</div>

								<div class="profileLine mb-3"></div>

								<div class="col-12 editField2">
									<div class="d-flex justify-content-between align-items-start editField">
										<div class="d-flex">
											<!-- <div class="pfIcon">
												<img src="/images/project/user.png">
											</div> -->
											<div>
												<div class="pfTitle" data-lang="M00363">
													<?php echo $translations['M00363'][$language]; //Phone Number ?>
												</div>
											</div>
										</div>
										<div class="d-flex">
											<div class="pfDes">
												<span id="phoneNumber"></span>
											</div>
										</div>
									</div>
								</div>
								
								<!-- <div class="col-12 editField2">
									<div class="d-flex justify-content-between align-items-start editField">
										<div class="d-flex">
											<div>
												<div class="pfTitle" data-lang="M03711">
													<?php echo $translations['M03711'][$language]; //Highest Package ?>
												</div>
											</div>
										</div>
										<div class="d-flex">
											<div class="pfDes">
												<span id="highestPackage"></span>
											</div>
										</div>
									</div>
								</div> -->
								
						     </div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12 mt-md-0 mt-4">
					<div class="profileWrapper">
						<div class="listingWrapper profileBgRight">
							<div class="profile_text01">
		                    	<?php echo $translations['M00561'][$language]; //my referral ?>
		                    </div>
		                    <div class="row">
		                        <div class="col-md-6 col-12 mt-3">
		                            <div class="text-center" id="qrcode2">
		                                <!-- <img class="iconQR" src="<?php echo $config['favicon']; ?>"> -->
		                                <img class="iconQR" src="/images/logo/favicon2.ico">
		                            </div>
		                        </div>
		                        <div class="col-md-6 col-12 mt-5">
		                        	<div class="col-12">
					                    <div class="col-12 text-center mb-3" style="background-color: transparent;padding-bottom: 5px;">
					                        <a href="javascript:;" class="btn btnSocial fb" onclick="shareFacebook('qrInput')">
					                            <img class="" src="images/fb-icon.png">
					                        </a>
					                        <a href="javascript:;" class="btn btnSocial twitter" onclick="shareTwitter('qrInput')">
					                            <img class="" src="images/tw-icon.png">
					                        </a>
					                        <a href="javascript:;" class="btn btnSocial whatsapp" onclick="shareWhatsapp('qrInput')">
					                            <img class="" src="images/wa-icon.png">
					                        </a>
					                    </div>
					                </div>
		                            <div class="form-group mt-5 ml-4">
		                                <input type="text" class="form-control qrcodeInp" value="" id="qrInput2" readonly="readonly">
		                            </div>
		                            <div class="text-center mt-3">
		                                <button type="button" class="btn btn-primary" onclick="copyQR2()"><?php echo $translations['M00137'][$language]; //Copy Link ?></button>
		                            </div>
		                        </div>
		                    </div>
		                   </div>
		               </div>

                    <div class="copiedMsg mt-2" style="display: none;">
		                <i class="fa fa-check" aria-hidden="true"></i><?php echo $translations['M00880'][$language]; //Copied to Clipboard ?>
		            </div>
                </div>
			</div>
		</div>
		
	</div>
</section>
<?php include 'footer.php'; ?>


</body>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true" style="z-index: 1041; ">
    <div class="modal-dialog" role="document">
        <div class="modal-content center">
        	<div style="display: flex;justify-content: center;">
        	<img id="canvasAlertIcon" src="images/project/phone1.png" alt="" width="50">
        </div>
            <div class="modal-header canvasheader" style="justify-content: center;">              
              <span id="modalTitle" class="modal-title"></span>
              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button> -->
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont">
                <div id="appendForm"></div>
            </div>
            <div class="modal-footer">
            	<button type="submit" class="btn btnDefaultModal" data-dismiss="modal" data-lang="M00163"><?php echo $translations['M00163'][$language]; //Back ?></button>
            	<button id="confirmBtn" type="button" class="btn btnThemeModal" data-lang="M00086"><?php echo $translations['M00086'][$language]; //Confirm ?></button>
            </div>
        </div>
    </div>
</div>


<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var currentEmail;
var currentPhone;
var countryList;

$(document).ready(function(){
	var formData  = {
		command   : "getMemberDetails"
	};
	var fCallback = loadMemberDetail;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	var text = "<?php echo $qrCodeRegistrationUrl; ?>"
		$('#qrInput2').val(text);
		$('#qrcode2').qrcode({

		  render: "canvas",
		  text: "<?php echo $qrCodeRegistrationUrl; ?>",
		  width: 200,
		  height: 200,
		  background: "#ffffff",
		  foreground: "#000000",
		  src: '',
		  imgWidth: 40,
		  imgHeight: 40
	});

	// $('#datepicker').datepicker({
	// 	autoclose: true,
	// 	format: "yyyy-mm-dd"
	// });

	// $('#save').click(function() {
	// 	$("input").each(function(){
	// 		$(this).removeClass('is-invalid');
	// 		$('.invalid-feedback').html("");
	// 	});

	// 	var realName = $('#realName').val();
	// 	var passport = $('#passport').val();
	// 	var datepicker = $('#datepicker').val();
	// 	var weChat = $('#weChat').val();
	// 	var whatsApp = $('#whatsApp').val();
	// 	var country = $('#country').val();
	// 	var address = $('#address').val();
	// 	var memberId = $('#memberId').val();
	// 	var username = $('#username').val();
	// 	var email = $('#email').val();
	// 	var dialCode = $('#dialCode').text();
	// 	var phoneNumber = $('#phone').val();
	// 	var introducer = $('#introducer').val();
	// 	var transactionPassword = $('#transactionPassword').val();

	// 	var formData = {
	// 		command      : "editMemberDetails",
	// 		fullName	: realName,
	// 		passport	: passport,
	// 		dob			: datepicker,
	// 		weChat		: weChat,
	// 		whatsApp	: whatsApp,
	// 		country		: country,
	// 		address		: address,
	// 		email		: email,
	// 		dialCode	: dialCode,
	// 		phoneNumber	: phoneNumber,
	// 		tPassword	: transactionPassword
	// 	};
	// 	var fCallback = successChange;
	// 	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	// });

	$('#confirmBtn').click(function() {
		$("input").each(function(){
			$(this).removeClass('is-invalid');
			$('.invalid-feedback').html("");
		});

		var type = $('#confirmBtn').attr('data-type');
		var transactionPassword = $("#transactionPassword").val();

		if(type == "password"){

			var currentPassword = $('#currentPassword').val();
			var newPassword = $('#newPassword').val();
			var newPasswordConfirm = $('#newPasswordConfirm').val();

			var formData           = {
			    command            : 'memberChangePassword',
			    currentPassword    : currentPassword,
			    newPassword        : newPassword,
			    newPasswordConfirm : newPasswordConfirm,
			    passwordCode 		: "1",
			};

		}else if(type == "tPassword"){

			var currentTPassword = $('#currentTPassword').val();
			var newTPassword = $('#newTPassword').val();
			var newTPasswordConfirm = $('#newTPasswordConfirm').val();

			var formData           = {
			    command            : 'memberChangePassword',
			    currentPassword    : currentTPassword,
			    newPassword        : newTPassword,
			    newPasswordConfirm : newTPasswordConfirm,
			    passwordCode 		: "2",
			};

		}else if(type == "email"){

			var email = $("#email").val();

			var formData = {
			    command: "updateMemberDetails",
			    editType: type,
			    email: email,
			    transaction_password: transactionPassword 
			    // password: password,
			    // otpType: type,
			    // otpCode: otpCode,
			};

		}else if(type == "phone"){

			var dialingArea = $('#country option:selected').val();
			var phone = $("#phone").val();

			var formData = {
			    command: "updateMemberDetails",
			    editType: type,
			    // dialingArea: dialingArea,
			    phone: phone,
			    transaction_password: transactionPassword 
			    // password: password,
			    // otpType: type,
			    // otpCode: otpCode,
			};
		}
		var fCallback = successChange;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});
});


function loadMemberDetail(data, message){
	var member = data.memberDetails;

	currentEmail = member['email'];
	currentPhone = '+'+member['dial_code'] + member['phone'];
	countryList = data.countryList;
	$('#memberEmail').text(member['email']);

	$('#fullName').text(member.name)
	$('#username').text(member.username)
	$('#usernameDisplay').text(member.name)
	$('#nameDisplay').text(member.username)
	$('#referralName').text(member.sponsorUsername)
	$('#user').text(member['name']);
	$('#email').text(member['email']);
	$('#phoneNumber').text('+'+member['dial_code'] + member['phone']);
	$('#dob').text(member['dob']);
	$('#address').text(member['address'] || '-');
	$('#city').text('-');
	$('#state').text('-');
	$('#postcode').text('-');
	$('#country_d').text(member['country']);
	$('#bankName').text('-');
	$('#bankAccount').text('-');
	$('#bankBranches').text('-');
	$('#highestPackage').text(numberThousand(member['highestPackage'], 2));

	if(data && data.rank && data.rank.default && data.rank.default.display){
		$('#rankDisplay').text(data.rank.default.display)
	}

}

function openModal(type, n) {
	var modalTitle = $(n).parent().parent().find('.pfTitle').text();

	$('#modalTitle').text(modalTitle);
	$('#confirmBtn').attr('data-type', type);
	
	if(type == 'email'){
		$('#appendForm').empty().append(`
			<div class="form-group">
			    <label data-lang="M00476"><?php echo $translations['M00476'][$language]; //Current Email Address ?>:</label>
			    <input class="form-control inputDesign" type="text" value="${currentEmail}" disabled>
			</div>
			<div class="form-group">
			    <label data-lang="M00477"><?php echo $translations['M00477'][$language]; //New Email Address ?>:</label>
			    <input id="email" class="form-control inputDesign" type="text">
			</div>
			<div class="form-group">
			    <label data-lang="M00042"><?php echo $translations['M00042'][$language]; //Transaction Password ?>:</label>
			    <input id="transactionPassword" class="form-control inputDesign" type="password" value="">
			    <i id="eyeOpen" class="fa fa-eye eyeIcon2" onclick="hidePassword()" style="display:none"></i>
                <i id="eyeClose" class="fa fa-eye-slash eyeIcon2" onclick="showPassword()"></i>
			</div>	
		`);
	}else if(type == 'phone'){
		$('#appendForm').empty().append(`			
			<div class="form-group row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-8" align="left">
					      <label data-lang="M01150"><?php echo $translations['M01150'][$language]; //Old Number ?>:</label>
					    </div>
					    <input class="col-4" value="123" align="right" style="border:none;background-color:transparent"> 
					</div>
					<div class="row">
					    <div class="col-8" align="left">
					      <label data-lang="M01151"><?php echo $translations['M01151'][$language]; //New Number ?>:</label>
					    </div>
					    <input class="col-4" value="123" align="right" style="border:none;background-color:transparent"> 
				    </div>				    
				</div>
			 </div>			
		`);

	}else if(type == 'password'){
		$('#appendForm').empty().append(`
			<div class="form-group row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-8" align="left">
					      <label data-lang="M01152"><?php echo $translations['M01152'][$language]; //Old Password ?>:</label>
					    </div>
					    <input class="col-4" value="123" align="right" style="border:none;background-color:transparent" > 
					</div>
					<div class="row">
					    <div class="col-8" align="left">
					      <label data-lang="M00083"><?php echo $translations['M00083'][$language]; //New Password ?>:</label>
					    </div>
					    <input class="col-4" value="123" align="right" style="border:none;background-color:transparent" > 
				    </div>
				    <div class="row">
					    <div class="col-8" align="left">
					      <label data-lang="M01153"><?php echo $translations['M01153'][$language]; //Re-type New Password ?>:</label>
					    </div>
					    <input class="col-4" value="123" align="right" style="border:none;background-color:transparent"> 
				    </div>
				</div>
			 </div>		
		`);
	}else if(type == 'tPassword'){
		$('#appendForm').empty().append(`
			<div class="form-group row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-12" >
					     <label data-lang="M01152"><?php echo $translations['M00088'][$language]; //Old Transaction Password ?>:</label>
					    </div>
				       <div class="position-relative col-12"">
                            <input id="currentTPassword" class="form-control inputDesign" type="password">
                     		 <i id="eyeOpen1" class="far fa-eye eyeIcon2 profile" onclick="hidePassword1()" style="display:none"></i>
               				 <i id="eyeClose1" class="far fa-eye-slash eyeIcon2 profile" onclick="showPassword1()"></i>
                        </div>
					</div>
					<div class="row">
					    <div class="col-12" >
					      <label data-lang="M00083"><?php echo $translations['M00089'][$language]; //New Transaction Password ?>:</label>
					    </div>
					    <div class="position-relative col-12"">
                            <input id="newTPassword" class="form-control inputDesign" type="password">
                             <i id="eyeOpen2" class="far fa-eye eyeIcon2 profile" onclick="hidePassword2()" style="display:none"></i>
               				 <i id="eyeClose2" class="far fa-eye-slash eyeIcon2 profile" onclick="showPassword2()"></i>
                        </div>
				    </div>
				    <div class="row">
					    <div class="col-12">
					      <label data-lang="M01153"><?php echo $translations['M00090'][$language]; //Retype New Transaction Password ?>:</label>
					    </div>

					    <div class="position-relative col-12"">
                            <input id="newTPasswordConfirm" class="form-control inputDesign" type="password">
                             <i id="eyeOpen3" class="far fa-eye eyeIcon2 profile" onclick="hidePassword3()" style="display:none"></i>
              				  <i id="eyeClose3" class="far fa-eye-slash eyeIcon2 profile" onclick="showPassword3()"></i>
                        </div>
				    </div>
				</div>
			 </div>	
		`);
	}else{
		$('#appendForm').empty();
	}

	$('#confirmationModal').modal('show');
}

function hidePassword() {
	$("#eyeOpen").hide();
	$("#eyeClose").show();
	$("#transactionPassword").attr("type","password");
}

function showPassword() {
	$("#eyeClose").hide();
	$("#eyeOpen").show();
	$("#transactionPassword").attr("type","text");
}
function hidePassword1() {
	$("#eyeOpen1").hide();
	$("#eyeClose1").show();
	$("#currentTPassword").attr("type","password");
}

function showPassword1() {
	$("#eyeClose1").hide();
	$("#eyeOpen1").show();
	$("#currentTPassword").attr("type","text");
}
function hidePassword2() {
	$("#eyeOpen2").hide();
	$("#eyeClose2").show();
	$("#newTPassword").attr("type","password");
}

function showPassword2() {
	$("#eyeClose2").hide();
	$("#eyeOpen2").show();
	$("#newTPassword").attr("type","text");
}
function hidePassword3() {
	$("#eyeOpen3").hide();
	$("#eyeClose3").show();
	$("#newTPasswordConfirm").attr("type","password");
}

function showPassword3() {
	$("#eyeClose3").hide();
	$("#eyeOpen3").show();
	$("#newTPasswordConfirm").attr("type","text");
}

function successChange(data, message) {
	$('#confirmationModal').modal('hide');
	showMessage(message, 'success', '<?php echo $translations['M00042'][$language]; // transaction password ?>', '', 'editProfile');
}

function copyQR2() {
  /* Get the text field */
  var copyText = document.getElementById("qrInput2");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  // alert("Copied QR Link: " + copyText.value);
  $(".copiedMsg").show();
}

</script>
