<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section id="kycForm" class="pageContent" style="margin-bottom: 20px;display: none;">
	<div class="kt-container">
		<div class="col-12 pageTitle">
			<?php echo $translations['M00035'][$language]; //KYC ?>
		</div>
	    <div class="col-12">
	        <div class="row">

	        	<div class="col-md-6 col-12">
	                <div class="row">

                		<div class="col-12" style="margin-top: 10px">
                		    <label class="registrationLabel"><?php echo $translations['M00177'][$language]; //Full Name ?> <span class="mustFill">*</span></label>
                	        <input id="name" type="text" class="form-control inputDesign">
                		</div>

                		<div class="col-12" style="margin-top: 10px">
                		    <label class="registrationLabel"><?php echo $translations['M00036'][$language]; //Gender ?> <span class="mustFill">*</span></label>
                	        <div class="kt-radio-inline">
                	        	<label class="kt-radio selectPackage">
                	        		<input type="radio" name="gender" value="male" checked><?php echo $translations['B00257'][$language]; //Male ?>
                	        		<span></span>
                	        	</label>
                	        	<label class="kt-radio selectPackage">
                	        		<input type="radio" name="gender" value="female"><?php echo $translations['B00258'][$language]; //Female ?>
                	        		<span></span>
                	        	</label>
                	        </div>
                		</div>
                		



                			<div class="col-12" style="margin-top: 10px">
                			    <label class="registrationLabel"><?php echo $translations['M00178'][$language]; //Country ?> <span class="mustFill">*</span></label>
                			    <select id="country" class="form-control inputDesign"></select>
                			</div>

	                	<div class="col-12" style="margin-top: 10px">
	                	    <label class="registrationLabel"><?php echo $translations['M01956'][$language]; //Identity Number ?> <span class="mustFill">*</span></label>
	                	    <input id="nric" class="form-control inputDesign" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
	                	</div>

	                	<div class="col-12" style="margin-top: 20px">
	                		<label class="registrationLabel"><?php echo $translations['M00037'][$language]; //Photo IC/Passport Front ?> <span class="mustFill">*</span></label>
	                		<div class="col-12 mustFill px-0">
	                			<?php echo $translations['M00038'][$language]; //(Maximum File Size: 5MB) ?>
	                		</div>

	                		<div>
	                	        <button type="button" class="btn btn-primary" style="margin-top: 10px;" onclick="$('#uploadImage').click();"><?php echo $translations['M01350'][$language]; //Upload ?></button>
	                	        <span id="frontImgError" style="display: block;"></span>
	                	        <input type="hidden" id="storeImageData1">
	                	        <input type="hidden" id="storeImageName1">
	                	        <input type="hidden" id="storeImageType1">

	                	        <div style="margin-top: 10px;">
	                	            <span id="imageName1" class="fileName"></span>
	                	            <button id="viewImage1" type="button" class="btn uploadBtn" style="display: none;" onclick="showImage('1')">
	                	                <i class="fa fa-eye"></i>
	                	            </button>
	                	          
	                	            <button id="deleteImage1" type="button" class="btn uploadDeleteBtn" style="display: none;" onclick="deleteImage('1')">
	                	                <i class="fa fa-times"></i>
	                	            </button>
	                	        </div>
	                	        

	                	        <form style="display:none" name="form" method="post" target="" action="" enctype="multipart/form-data" >
	                	            <input id='uploadImage' class="videoUpload" type="file" name="my_file" accept="image/png, image/jpeg" onchange="displayImageName('1', this)" required/><br /><br />
	                	        </form>
	                	    </div>
	                	</div>

	                	<div class="col-12" style="margin-top: 20px">
	                		<label class="registrationLabel"><?php echo $translations['M00039'][$language]; //Photo IC/Passport Back ?> <span class="mustFill">*</span></label>
	                		<div class="col-12 mustFill px-0">
	                			<?php echo $translations['M00038'][$language]; //(Maximum File Size: 5MB) ?>
	                		</div>

	                		<div>
	                	        <button type="button" class="btn btn-primary" style="margin-top: 10px;" onclick="$('#uploadImage2').click();"><?php echo $translations['M01350'][$language]; //Upload ?></button>
	                	        <span id="backImgError" style="display: block;"></span>
	                	        <input type="hidden" id="storeImageData2">
	                	        <input type="hidden" id="storeImageName2">
	                	        <input type="hidden" id="storeImageType2">

	                	        <div style="margin-top: 10px;">
	                	            <span id="imageName2" class="fileName"></span>
	                	            <button id="viewImage2" type="button" class="btn uploadBtn" style="display: none;" onclick="showImage('2')">
	                	                <i class="fa fa-eye"></i>
	                	            </button>
	                	          
	                	            <button id="deleteImage2" type="button" class="btn uploadDeleteBtn" style="display: none;" onclick="deleteImage('2')">
	                	                <i class="fa fa-times"></i>
	                	            </button>
	                	        </div>
	                	        

	                	        <form style="display:none" name="form" method="post" target="" action="" enctype="multipart/form-data" >
	                	            <input id='uploadImage2' class="videoUpload" type="file" name="my_file" accept="image/png, image/jpeg" onchange="displayImageName2('2', this)" required/><br /><br />
	                	        </form>
	                	    </div>
	                	</div>

	                 	<div class="col-12" style="margin-top: 20px">
	                 		<label class="registrationLabel"><?php echo $translations['M00040'][$language]; //Selfie holding IC/Passport ?> <span class="mustFill">*</span></label>
	                 		<div class="col-12 mustFill px-0">
	                 			<?php echo $translations['M00038'][$language]; //(Maximum File Size: 5MB) ?>
	                 		</div>

	                 		<div>
	                 	        <button type="button" class="btn btn-primary" style="margin-top: 10px;" onclick="$('#uploadImage3').click();"><?php echo $translations['M01350'][$language]; //Upload ?></button>
	                 	        <span id="selfieImgError" style="display: block;"></span>
	                 	        <input type="hidden" id="storeImageData3">
	                 	        <input type="hidden" id="storeImageName3">
	                 	        <input type="hidden" id="storeImageType3">

	                 	        <div style="margin-top: 10px;">
	                 	            <span id="imageName3" class="fileName"></span>
	                 	            <button id="viewImage3" type="button" class="btn uploadBtn" style="display: none;" onclick="showImage('3')">
	                 	                <i class="fa fa-eye"></i>
	                 	            </button>
	                 	          
	                 	            <button id="deleteImage3" type="button" class="btn uploadDeleteBtn" style="display: none;" onclick="deleteImage('3')">
	                 	                <i class="fa fa-times"></i>
	                 	            </button>
	                 	        </div>
	                 	        

	                 	        <form style="display:none" name="form" method="post" target="" action="" enctype="multipart/form-data" >
	                 	            <input id='uploadImage3' class="videoUpload" type="file" name="my_file" accept="image/png, image/jpeg" onchange="displayImageName3('3', this)" required/><br /><br />
	                 	        </form>
	                 	    </div>
	                 	</div>


	                </div>
	            </div>

	                	
	          
	          

	           
	        </div>
	    </div>

	    <div class="col-12 registrationBtnPosition" style="margin-top: 20px;">
	    	<button id="submitBtn" type="button" class="btn btn-primary"><?php echo $translations['M00346'][$language]; //Submit ?></button>
	    	<div id="selfImage" class="invalid-feedback" style="display:block;"></div>
	    </div>	
	</div>
</section>

<section id="kycProcessing" class="pageContent" style="margin-bottom: 20px;display: none;">
	<div class="kt-container">
	    <div class="col-12 text-center">
	        <div class="row">
	        	<div class="col-12">
	        		<i class="fa fa-exclamation-triangle kycIcon" aria-hidden="true" style="color: #fdc953"></i>
	        	</div>
	        	<div class="col-12" style="margin-top: 10px;">
	        		<label class="registrationLabel"><?php echo $translations['M00041'][$language]; //Pending: Your KYC information are pending to be verified. ?></label>
	        	</div>
	        	<div class="col-12" style="margin-top: 20px;">
	        		<button onclick="window.location='dashboard.php'" type="button" class="btn btn-primary"><?php echo $translations['M00126'][$language]; //Dashboard ?></button>
	        	</div>
	        </div>
	    </div>

	</div>
</section>

<section id="kycRejected" class="pageContent" style="margin-bottom: 20px;display: none;">
	<div class="kt-container">
	    <div class="col-12 text-center">
	        <div class="row">
	        	<div class="col-12">
	        		<i class="fa fa-times-circle kycIcon" aria-hidden="true" style="color: #cc3232"></i>
	        	</div>
	        	<div class="col-12" style="margin-top: 10px;">
	        		<label class="registrationLabel"><?php echo $translations['M00042'][$language]; //Rejected: Your KYC information failed to be verified. ?></label>
	        	</div>
	        	<div class="col-12" style="margin-top: 10px;">
	        		<label class="registrationLabel"><?php echo $translations['M00044'][$language]; //Reason ?> : <span class="kycRemark"></span></label>
	        	</div>
	        	<div class="col-12" style="margin-top: 20px;">
	        		<button id="resubmitBtn" type="button" class="btn btn-primary"><?php echo $translations['M00045'][$language]; //Resubmit ?></button>
	        	</div>
	        </div>
	    </div>

	</div>
</section>

<section id="kycSuccess" class="pageContent" style="margin-bottom: 20px;display: none;">
	<div class="kt-container">
	    <div class="col-12 text-center">
	        <div class="row">
	        	<div class="col-12">
	        		<i class="fa fa-check-circle kycIcon" aria-hidden="true" style="color: #5ddc09"></i>
	        	</div>
	        	<div class="col-12" style="margin-top: 10px;">
	        		<label class="registrationLabel"><?php echo $translations['M00043'][$language]; //Verified: Your KYC information has been verified. ?></label>
	        	</div>
	        	<div class="col-12" style="margin-top: 20px;">
	        		<button onclick="window.location='dashboard.php'" type="button" class="btn btn-primary"><?php echo $translations['M00126'][$language]; //Dashboard ?></button>
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

<div class="modal fade" id="showImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span id="canvasTitle" class="modal-title"><?php echo $translations['M00046'][$language]; //Preview ?></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <img id="modalImg" style="width: 100%;">
            </div>
            <div class="modal-footer">
                 <button id="canvasCloseBtn" type="button" class="btn btnDefaultModal" data-dismiss="modal"><?php echo $translations['M00112'][$language]; //Close ?></button>
             </div>
        </div>
    </div>
</div>

<script>

    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;


    $(document).ready(function(){
    	var formData = {
    		command            : "getKYCDetails"
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function(){
        	$('.invalid-feedback').remove();
        	$('input').removeClass('is-invalid');
        	var fullname = $('#name').val();
        	var gender = $("input[name='gender']:checked").val();
        	var identityType = "nric";
            var country = $('#country').find('option:selected').val();
            var cardNumber = $('#nric').val();
            var imageData = [
            					{ 
            						imageName : $('#storeImageName1').val(),
            						imageData : $('#storeImageData1').val(),
            						imageType : $('#storeImageType1').val()
            					},
            					{ 
            						imageName : $('#storeImageName2').val(),
            						imageData : $('#storeImageData2').val(),
            						imageType : $('#storeImageType2').val()
            					}
            				];

            var selfImage = 
            					{
            						imageName : $('#storeImageName3').val(),
            						imageData : $('#storeImageData3').val(),
            						imageType : $('#storeImageType3').val()
            				};

            var formData =	{
            					command         : "addKYC",
            					name	   		: fullname,
            					gender	   		: gender,
            					countryID	   	: country,
            					nric	   		: cardNumber,
            					documentType	: identityType,
            					imageData	   	: imageData,
            					selfImageData  	: selfImage
            				};
	        var fCallback = successfulSendKYC;
	        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });

        $('#resubmitBtn').click(function() {
        	$('#kycForm').show();
        	$('#kycProcessing').hide();
        	$('#kycRejected').hide();
        	$('#kycSuccess').hide();
        });
	});

	function loadDefaultListing (data,message) {
		var getStatus = data.memberKycStatus;
		if (getStatus == "Waiting Approval") {
			$('#kycForm').hide();
			$('#kycProcessing').show();
			$('#kycRejected').hide();
			$('#kycSuccess').hide();
		} else if (getStatus == "Approved") {
			$('#kycForm').hide();
			$('#kycProcessing').hide();
			$('#kycRejected').hide();
			$('#kycSuccess').show();
		} else if (getStatus == "Rejected") {
			$('#kycForm').hide();
			$('#kycProcessing').hide();
			$('#kycRejected').show();
			$('#kycSuccess').hide();
		} else {
			$('#kycForm').show();
			$('#kycProcessing').hide();
			$('#kycRejected').hide();
			$('#kycSuccess').hide();
		}

		$('.kycRemark').html(data.memberKycRemark);

		if(data.countryIDAry) {
	        $.each(data.countryIDAry, function(k, v) {

	            $('#country').append('<option id="'+v['id']+'" value="'+v['id']+'" name="'+v['name']+'">'+translations[v['languageCode']][language]+'</option>');
	        });

	        $('#country').val('107');
	    }
	}

	function displayImageName(id, n) {
	    var dFileName = $("#imageName"+id);

	    if (n.files && n.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	var imageSize = n.files[0]["size"];

	        	if (imageSize < 5000000) {
		        	dFileName.text(n.files[0]["name"]);
		        	$("#storeImageData"+id).val(reader["result"]);
		        	$("#storeImageName"+id).val(n.files[0]["name"]);
		        	$('[name=imageSize]').val(n.files[0]["size"]);
		        	$("#storeImageType"+id).val(n.files[0]["type"]);
		        	$("#viewImage"+id).css('display', 'inline-block');
		        	$("#deleteImage"+id).css('display', 'inline-block');
		        	$('#frontImgError').html('')
	        	} else {
	        		$('#frontImgError').html('<span class="mustFill"><?php echo $translations['M00096'][$language]; //*Image size does not meet the requirements ?></span>');
	        	}
	        };

	        reader.readAsDataURL(n.files[0]);
	    }
	}

	function displayImageName2(id, n) {
	    var dFileName = $("#imageName"+id);

	    if (n.files && n.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	var imageSize = n.files[0]["size"];

	        	if (imageSize < 5000000) {
		        	dFileName.text(n.files[0]["name"]);
		        	$("#storeImageData"+id).val(reader["result"]);
		        	$("#storeImageName"+id).val(n.files[0]["name"]);
		        	$('[name=imageSize]').val(n.files[0]["size"]);
		        	$("#storeImageType"+id).val(n.files[0]["type"]);
		        	$("#viewImage"+id).css('display', 'inline-block');
		        	$("#deleteImage"+id).css('display', 'inline-block');
		        	$('#backImgError').html('')
	        	} else {
	        		$('#backImgError').html('<span class="mustFill"><?php echo $translations['M00096'][$language]; //*Image size does not meet the requirements ?></span>');
	        	}
	        };

	        reader.readAsDataURL(n.files[0]);
	    }
	}

	function displayImageName3(id, n) {
	    var dFileName = $("#imageName"+id);

	    if (n.files && n.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	var imageSize = n.files[0]["size"];

	        	if (imageSize < 5000000) {
		        	dFileName.text(n.files[0]["name"]);
		        	$("#storeImageData"+id).val(reader["result"]);
		        	$("#storeImageName"+id).val(n.files[0]["name"]);
		        	$('[name=imageSize]').val(n.files[0]["size"]);
		        	$("#storeImageType"+id).val(n.files[0]["type"]);
		        	$("#viewImage"+id).css('display', 'inline-block');
		        	$("#deleteImage"+id).css('display', 'inline-block');
		        	$('#selfieImgError').html('')
	        	} else {
	        		$('#selfieImgError').html('<span class="mustFill"><?php echo $translations['M00096'][$language]; //*Image size does not meet the requirements ?></span>');
	        	}
	        };

	        reader.readAsDataURL(n.files[0]);
	    }
	}

	function showImage(n) {
	    $("#modalImg").attr('style','display: block');
	    $("#modalImg").attr('src', $("#storeImageData"+n).val());
	    $("#modalVideo").attr('style','display:none');
	    $("#showImage").modal();
	}

	function deleteImage(id) {
	    $("#imageUpload"+id).val("");
	    $('#imageName'+id).text('');
	    $("#storeImageData"+id).val("");
	    $("#storeImageName"+id).val("");
	    $("#storeImageSize"+id).val("");
	    $("#storeImageType"+id).val("");
	    $("#storeImageFlag"+id).val("");

	    $("#viewImage"+id).hide();
	    $("#deleteImage"+id).hide();
	}

	function successfulSendKYC (data, message){
	     showMessage(message, 'success', '<?php echo $translations['M00451'][$language]; /* Congratulations */ ?>', '', 'kyc.php');
	}

</script>