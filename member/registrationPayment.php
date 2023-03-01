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
      <?php echo $translations['M00063'][$language]; //Credit Registration Payment ?>
    </div>
	    <div class="col-12">
	        <div class="row">

	            <div class="col-md-6 col-12">
	                <div id="buildCredit" class="row"></div>
	            </div>


	            <div class="col-md-6 col-12 paymentSummaryBoxOutside">
	                <div class="row">
	                	<div class="col-12 paymentSummaryBox">
	                		<div class="row">

			                    <div class="col-12 paymentTitle">
			                        <?php echo $translations['M00008'][$language]; //Price Summary ?>
			                    </div>
			                    <div class="col-12">
			                    	<div class="paymentSummaryLine"></div>
			                    </div>
			                    <div class="col-12">
			                    	<div id="buildCreditAmount" class="row"></div>
			                    </div>
			                  
			                    <div class="col-12">
			                    	<div class="paymentSummaryLine"></div>
			                    </div>
			                    <div class="col-12 paymentSummary">
			                    	<div class="row">
			                    		<div class="col-xl-4 col-lg-4 col-12">
			                    			<?php echo $translations['M01685'][$language]; //Total Amount ?> :
			                    		</div>
			                    		<div id="totalAmt" class="col-xl-8 col-lg-8 col-12">0.00</div>
			                    		<div class="col-12">
			                    			<div id="totalAmount"></div>
			                    		</div>
			                    	</div>
			                    </div>
	                		</div>
	                	</div>

	                </div>
	            </div>

	           
	        </div>
	    </div>

	    <div class="col-md-6 col-12 registrationBtnPosition" style="margin-top: 20px;">
	    	<label class="registrationLabel"><?php echo $translations['M00192'][$language]; //Transaction Password ?> <span class="mustFill">*</span></label>
	    	<input id="transactionPassword" class="form-control inputDesign" type="password">
	    </div>

	    <div class="col-12 registrationBtnPosition" style="margin-top: 20px;">
	    	<button id="backBtn" type="button" class="btn btn-default" style="text-transform: uppercase;"><?php echo $translations['M00218'][$language]; //BACK ?></button>
	    	<button id="submitBtn" type="button" class="btn btn-primary" style="text-transform: uppercase;"><?php echo $translations['M00155'][$language]; //NEXT ?></button>
	    </div>

	</div>
</section>

<input id="buildCreditValue" type="hidden">

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
    var registerType = '<?php echo $_POST['registerType']; ?>';

    var fromDiagram = '<?php echo $_POST['fromDiagram']; ?>';
    var fromSponsorDiagram = '<?php echo $_POST['fromSponsorDiagram']; ?>';

    var payerTPassword;
    var spendCredit;

    $(document).ready(function() {

    	var formData = {
    	    'command' : "memberRegisterDownlinePackageVerification",
    	    'registerType' : registerType,
    	    'fullName' : fullName,
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
    	    'placementPosition' : placementPosition,
    	    'step' : 1
    	};

    	var fCallback = goPayment;
    	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

  		$('#submitBtn').click(function(){

  			$('.invalid-feedback').remove();
  			$('input').removeClass('is-invalid');

  			payerTPassword = $('#transactionPassword').val();

  			spendCredit = {};

  			$('.paymentField').each(function() {
  			    var getName = $(this).attr('id');
  			    var getAmount = $(this).val();
  			    spendCredit[getName] = {amount: getAmount};
  			});

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
  			var fCallback = goConfirmation;
  			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
  		});

  		$('#backBtn').click(function() {
  			$.redirect('registration.php', {
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

    function goConfirmation (data,message) {
    	$.redirect('registrationPaymentConfirmation.php',{
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

        fromDiagram : fromDiagram,
        fromSponsorDiagram : fromSponsorDiagram,

    		payerTPassword : payerTPassword,
    		spendCredit : JSON.stringify(spendCredit)
    	});
    }

	function goPayment(data, message) {
		var buildCredit = "";
		var buildCreditAmount = "";

		$.each(data.paymentCredit, function(k, v) {

        buildCredit +=`
          <div class="col-12 paymentBox" style="margin-top: 10px">
            <div class="row">
              <div class="col-12 paymentName">${v['creditDisplay']}</div>
              <div class="col-12 paymentBalance">
                <?php echo $translations['M00219'][$language]; //Balance ?> : ${addCommas(Number(v['balance']).toFixed(8))}
              </div>
              <div class="col-12 paymentBalance">
                <?php echo $translations['M00343'][$language]; //Rate ?> : ${addCommas(Number(v['rate']).toFixed(8))}
              </div>
              <div class="col-12">
                <label class="registrationLabel">${v['creditDisplay']} <?php echo $translations['M00009'][$language]; //To Pay ?> <span class="mustFill">*</span></label>
                <input id="${v['creditType']}" class="form-control inputDesign paymentField" type="text" getCal="${v['formula']}" getRate="${v['rate']}" disabled>
              </div>
              <div class="col-12 paymentBalance">
                <?php echo $translations['M00208'][$language]; //Payment ?> : <span class="getCalculation"></span>
                <input type="hidden" class="getTotalCalculation">
              </div>
            </div>
          </div>
        `;
      
      

      buildCreditAmount += `
        <div class="col-12 paymentSummary">
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-12">
              ${v['creditDisplay']} :
            </div>
            <div class="col-xl-8 col-lg-8 col-12">
            <span id="${v['creditType']}amount" getCal="${v['formula']}">0.00</span>
            (<span id="${v['creditType']}amount2">0.00</span> USDT)
            </div>
          </div>
        </div>
      `;
      

    });

		$('#buildCredit').html(buildCredit);
		$('#buildCreditAmount').html(buildCreditAmount);

		$.each(data.spendCredit, function(k, v) {
			var getThisName = k;
			$('#'+getThisName).val(v.amount);
			var getFormula = $('#'+getThisName).attr('getCal');
			var getValue = $('#'+getThisName).val();
			var getRate = $('#'+getThisName).attr('getRate');

			$('#'+getThisName+'amount').html(addCommas(Number(getValue).toFixed(8)));
			if (getFormula == "divide") {
				var getCalculation = getValue * getRate;
				$('#'+getThisName).parent().parent().find('.getTotalCalculation').val(getCalculation);
				$('#'+getThisName).parent().parent().find('.getCalculation').html(addCommas(Number(getCalculation).toFixed(8)));
				$('#'+getThisName+'amount2').html(addCommas(Number(getCalculation).toFixed(8)));
				
			}

			if (getFormula == "multiply") {
				var getCalculation = getValue / getRate;
				$('#'+getThisName).parent().parent().find('.getTotalCalculation').val(getCalculation);
				$('#'+getThisName).parent().parent().find('.getCalculation').html(addCommas(Number(getCalculation).toFixed(8)));
				$('#'+getThisName+'amount2').html(addCommas(Number(getCalculation).toFixed(8)));
			}
			
			var totalAmt = 0;
            $.each($(".getTotalCalculation"), function(k,v){
              var amount = $(v).val();
              amount = parseFloat(amount || 0);

              totalAmt += amount;
            });
            $("#totalAmt").html(addCommas(Number(totalAmt).toFixed(8)));  
		});

		    // $('.paymentField').on('input', function () {
		    $('.paymentField').change(function () {
          var getThisName = $(this).attr('id');
          this.value = this.value.match(/^[0-9]+\.?[0-9]{0,8}/);

                var getFormula = $(this).attr('getCal');
                var getValue = $(this).val();
                var getRate = $(this).attr('getRate');
                
                $('#'+getThisName+'amount').html(addCommas(Number(getValue).toFixed(8)));
                if (getFormula == "divide") {
                  var getCalculation = getValue * getRate;
                  $(this).parent().parent().find('.getTotalCalculation').val(getCalculation);
                  $(this).parent().parent().find('.getCalculation').html(addCommas(Number(getCalculation).toFixed(8)));
                   $('#'+getThisName+'amount2').html(addCommas(Number(getCalculation).toFixed(8)));
                  
                }

                if (getFormula == "multiply") {
                  var getCalculation = getValue / getRate;
                  $(this).parent().parent().find('.getTotalCalculation').val(getCalculation);
                  $(this).parent().parent().find('.getCalculation').html(addCommas(Number(getCalculation).toFixed(8)));
                  $('#'+getThisName+'amount2').html(addCommas(Number(getCalculation).toFixed(8)));
                }
                
                var totalAmt = 0;
            $.each($(".getTotalCalculation"), function(k,v){
              var amount = $(v).val();
              amount = parseFloat(amount || 0);

              totalAmt += amount;
            });
            $("#totalAmt").html(addCommas(Number(totalAmt).toFixed(8)));  

            });
	}




</script>
