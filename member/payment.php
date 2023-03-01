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
                <?php echo $translations['M00262'][$language]; //Payment ?>
            </div>
        </div>

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10">
                    <div class="listingWrapper">
						<!-- <div class="col-12">
							<a href="reentry" class="pageBackBtn"><i class="fa fa-arrow-left"></i> <?php echo $translations['M00163'][$language]; //Back ?></a>
						</div> -->
					    <div class="col-12">
					        <div class="row">

					            <div class="col-md-6 col-12">
					                <div id="buildCredit" class="row"></div>
                                    <div id="buildCredit2" class="row"></div>
					            </div>


					            <div class="col-md-6 col-12 paymentSummaryBoxOutside">
                            		<div class="paymentSummaryBox">
            	                		<div class="row">

            			                    <div class="col-12 paymentTitle">
            			                        <span><?php echo $translations['M00551'][$language]; //Price Summary ?></span>
            			                    </div>
            			                    <div class="col-12 my-3">
            			                    	<div class="paymentTotal">
            			                    		<div class="d-flex justify-content-between">
            			                    			<div class="">
            			                    				<?php echo $translations['M01097'][$language]; /* Contract Amount */ ?> :
            			                    			</div>
            			                    			<div class="displayUnit">
                                                            <span id="totalPrice"></span>
                                                     <!--        <?php echo $translations['M00983'][$language]; /* Unit */ ?> -->
                                                                
                                                        </div>
            			                    		</div>
            			                    	</div>
            			                    </div>
            			                    <div class="col-12">
            			                    	<div id="buildCreditAmount" class="row"></div>
            			                    </div>
            			                    <div class="col-12">
            			                    	<div class="paymentSummary total">
            			                    		<div class="d-flex justify-content-between">
            			                    			<div class="">
            			                    				<?php echo $translations['M00553'][$language]; //Total Amount ?> :
            			                    			</div>
            			                    			<div id="totalAmt" class="displayUnit">0.00 </div>
            			                    		</div>
            			                    	</div>            			                
            			                    </div>
            	                    		<div class="col-12">
            	                    			<div id="totalAmount"></div>
            	                    		</div>
            	                		</div>
            	                	</div>
					            </div>

					           
					        </div>
					    </div>

					    <div class="col-md-6 col-12 registrationBtnPosition" style="margin-top: 20px;">
					    	<label class="registrationLabel"><?php echo $translations['M00042'][$language]; //Transaction Password ?> <span class="mustFill">*</span></label>
					    	<input id="transactionPassword" class="form-control inputDesign" type="password">
					    </div>

					    <div class="col-6 registrationBtnPosition d-flex" style="margin-top: 20px;">
					    	<button id="backBtn" onclick="location.href='dashboard'" type="button" class="btn btn-default w-100 py-3 mr-3" disabled><?php echo $translations['M00163'][$language]; //BACK ?></button>
					    	<button id="submitBtn" type="button" class="btn btn-primary w-100 py-3" disabled><?php echo $translations['M00034'][$language]; //NEXT ?></button>
					    </div>
					</div>
				</div>
			</div>
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

    var creditUnit = "<?php echo $_POST['creditUnit']; ?>";
    var packageID = "<?php echo $_POST['packageID']; ?>";
    var type = "<?php echo $_POST['type']; ?>";
    var quantity = "<?php echo $_POST['quantity']; ?>";
    var lockDays = "<?php echo $_POST['lockDays']; ?>";
    var depositPercentage = "<?php echo $_POST['depositPercentage']; ?>";
    var tPassword;
    var spendCredit;


    $(document).ready(function() {

    	var formData  = {
    	    command: 'reentryVerification',
    	    step : 1,
            type : type,
            packageID : packageID,
            creditUnit : creditUnit,
    	};

        if(packageID == 2) {
            formData = {
                ...formData,
                lockDays: lockDays
            }
        }

    	var fCallback = goPayment;
    	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

  		$('#submitBtn').click(function(){

  			$('.invalid-feedback').remove();
  			$('input').removeClass('is-invalid');

  			tPassword = $('#transactionPassword').val();

  			spendCredit = {};

  			$('.paymentField').each(function() {
  			    // var getName = $(this).parent().parent().find('.paymentName').text();
  			    var getName = $(this).attr('data-credit');
  			    var getAmount = $(this).val();
  			    spendCredit[getName] = {amount: getAmount};
  			});

  			var formData  = {
  			    command: 'reentryVerification',
  			    type : "credit",
  			    step : 2,
  			    tPassword : tPassword,
  			    spendCredit : spendCredit,
                type : type,
                packageID : packageID
  			};

            if(packageID == 2) {
                formData = {
                    ...formData,
                    lockDays: lockDays
                }
            }

            if(type == 'tranche'){
                formData['quantity'] = quantity;
                formData['depositPercentage'] = depositPercentage;
            }else{
                formData['creditUnit'] = creditUnit;
            }

  			var fCallback = goConfirmation;
  			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
  		});

       
    });

    function goConfirmation (data,message) {
        let newForm = {
            tPassword : tPassword,
    		creditUnit : creditUnit,
            type : type,
            packageID : packageID,
    		spendCredit : JSON.stringify(spendCredit)
        }

        if(packageID == 2) {
            newForm = {
                ...newForm,
                lockDays: lockDays
            }
        }

    	$.redirect('paymentConfirmation',newForm);
    }

	function goPayment(data, message) {

        $('#totalPrice').text(numberThousand(data.totalPrice || 0, 2))

        var timer = data.spTokenRateExpiryTime;
        var tempMin, tempSec;
        tempMin = timer/60;
        tempSec = timer%60;
        tempMin = tempMin.toString().split('.')[0];
        tempSec = Number(tempSec).toFixed(0);
        tempSec = (tempSec < 10) ? '0' + tempSec : tempSec;

        var timer2;
        timer2 = tempMin+":"+tempSec;
        var interval = setInterval(function() {
            var timer = timer2.split(':');
            var minutes = parseInt(timer[0], 10);
            var seconds = parseInt(timer[1], 10);

            --seconds;

            minutes = (seconds < 0) ? --minutes : minutes;

            seconds = (seconds < 0) ? 59 : seconds;
            seconds = (seconds < 10) ? '0' + seconds : seconds;
            timer2 = minutes + ':' + seconds;

            if(timer2 === "0:00") {
                clearInterval(interval);
                window.location.reload();
            }
        }, 1000);

		var buildCredit = "";
        var buildCredit2 = "";
		var buildCreditAmount = "";

		$.each(data.paymentCredit, function(k, v) {
            if(k.includes('usdt')){
                buildCredit +=`
                    <div class="col-12 paymentBox" style="margin-top: 10px">
                        <div class="row">
                            <div class="col-12"><span class="paymentName">${v['creditDisplay']}</span></div>
                            <div class="col-12 paymentBalance">
                                <?php echo $translations['M00097'][$language]; //Balance ?> : <span>${addCommas(Number(v['balance']).toFixed(2))}</span>
                                 <div>
                                  <?php echo $translations['M00515'][$language]; //Minimum ?> : <span>${addCommas(Number(v['minPrice']).toFixed(2))}</span>
                                </div>
                                <div>
                                  <?php echo $translations['M01057'][$language]; //Maximum ?> : <span>${addCommas(Number(v['maxPrice']).toFixed(2))}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- <label class="registrationLabel">${v['creditDisplay']} <span class="mustFill">*</span></label> -->
                                <input id="${v['creditType']}" data-credit="${v['creditType']}" class="form-control inputDesign paymentField" type="text" getCal="${v['formula']}" getRate="${v['rate']}">
                            </div>
                            <div class="col-12 paymentCalculation">
                                <?php echo $translations['M00262'][$language]; //Payment ?> : <span class="getCalculation">0.00</span>
                                <input type="hidden" class="getTotalCalculation">
                            </div>
                            <!-- <div class="col-12">
                                <span id="${v['creditType']}"></span>
                            </div> -->
                        </div>
                    </div>
                `;
            }
            else{
                buildCredit2 +=`
                    <div class="col-12 paymentBox" style="margin-top: 10px">
                        <div class="row">
                            <div class="col-12"><span class="paymentName">${v['creditDisplay']}</span></div>
                            <div class="col-12 paymentBalance">
                                <?php echo $translations['M00097'][$language]; //Balance ?> : <span>${addCommas(Number(v['balance']).toFixed(2))}</span>
                                 <div>
                                  <?php echo $translations['M00515'][$language]; //Minimum ?> : <span>${addCommas(Number(v['minPrice']).toFixed(2))}</span>
                                </div>
                                <div>
                                  <?php echo $translations['M01057'][$language]; //Maximum ?> : <span>${addCommas(Number(v['maxPrice']).toFixed(2))}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- <label class="registrationLabel">${v['creditDisplay']} <span class="mustFill">*</span></label> -->
                                <input id="${v['creditType']}" data-credit="${v['creditType']}" class="form-control inputDesign paymentField" type="text" getCal="${v['formula']}" getRate="${v['rate']}">
                            </div>
                            <div class="col-12 paymentCalculation">
                                <?php echo $translations['M00262'][$language]; //Payment ?> : <span class="getCalculation">0.00</span>
                                <input type="hidden" class="getTotalCalculation">
                            </div>
                            <!-- <div class="col-12">
                                <span id="${v['creditType']}"></span>
                            </div> -->
                        </div>
                    </div>
                `;
            }
    			
			
			

			buildCreditAmount += `
				<div class="col-12 paymentSummary">
					<div class="d-flex justify-content-between">
						<div class="">
							${v['creditDisplay']} :
						</div>
						<div class="displayUnit">
							<span id="${v['creditType']}amount" getCal="${v['formula']}">0.00</span>
						</div>
					</div>
				</div>
			`;
			

		});

		$('#buildCredit').html(buildCredit);
        $('#buildCredit2').html(buildCredit2);
		$('#buildCreditAmount').html(buildCreditAmount);

		$('.paymentField').on('input', function () {
			var getThisName = $(this).attr('id');
			this.value = this.value.match(/^[0-9]+\.?[0-9]{0,8}/);

            var getFormula = $(this).attr('getCal');
            var getValue = $(this).val();
            var getRate = $(this).attr('getRate');

            // if (getThisName == "BTC" || getThisName == "USDT") {
            // 	$('#'+getThisName+'amount').html(addCommas(Number(getValue).toFixed(2)));
            // } else {
            // 	$('#'+getThisName+'amount').html(addCommas(Number(getValue).toFixed(2)));
            // }
            
            $('#'+getThisName+'amount').html(addCommas(Number(getValue).toFixed(2)));

            if (getFormula == "divide") {
            	var getCalculation = getValue * getRate;
            	$(this).parent().parent().find('.getTotalCalculation').val(getCalculation);
            	$(this).parent().parent().find('.getCalculation').html(addCommas(Number(getCalculation).toFixed(2)));
            	 // $('#'+getThisName+'amount2').html(addCommas(Number(getCalculation).toFixed(2)));
            	
            }

            if (getFormula == "multiply") {
            	var getCalculation = getValue / getRate;
            	$(this).parent().parent().find('.getTotalCalculation').val(getCalculation);
            	$(this).parent().parent().find('.getCalculation').html(addCommas(Number(getCalculation).toFixed(2)));
            	// $('#'+getThisName+'amount2').html(addCommas(Number(getCalculation).toFixed(2)));
            }

            if (getThisName == "spCredit") {
                var getCalculation = getValue * data.spRate / data.unitPrice;
                // console.log(getCalculation)
                // getCalculation = Math.trunc(getCalculation*Math.pow(10, 2))/Math.pow(10, 2)
                // console.log(getCalculation)
                $(this).parent().parent().find('.getTotalCalculation').val(getCalculation);
                $(this).parent().parent().find('.getCalculation').html(addCommas(Number(getCalculation).toFixed(2)));
                $('#'+getThisName+'amount').html(addCommas(Number(getCalculation).toFixed(2)));
            }
            
            var totalAmt = 0;
    		$.each($(".getTotalCalculation"), function(k,v){
    			var amount = $(v).val();
    			amount = parseFloat(amount || 0);

    			totalAmt += amount;
    		});
    		$("#totalAmt").html(addCommas(Number(totalAmt).toFixed(2)));  

        });

        $('#backBtn').attr('disabled', false);
        $('#submitBtn').attr('disabled', false);
	}

</script>
