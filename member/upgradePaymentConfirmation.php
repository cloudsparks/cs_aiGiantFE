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
		<div class="text-center">
		    <div class="pageTitle">
		        <?php echo $translations['M00265'][$language]; //Pledge Principle Payment Confirmation ?>
		    </div>
		</div>
        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10">
                    <div class="listingWrapper">
					    <div class="col-12">
					        <div class="row">
					        	<div class="col-lg-6 col-md-7 col-12" style="margin: auto;">
					                <div id="buildConfirmation" class="row"></div>

			                		<div class="mt-4">
		                        		<div class="row">
		                        			<div class="col-4">
		                        				<span data-lang="M01098"><?php echo $translations['M01098'][$language]; //Remaining Amount ?></span>
		                        			</div>
		                        			<div class="col-1">:</div>
		                        			<div class="col-7">
		                        				<span id="contractAmount"></span>
		                        			</div>
		                        		</div>
		                	        </div>
		                        	<div class="mt-2">
		                        		<div class="row">
		                        			<div class="col-4">
		                        				<?php echo $translations['M00553'][$language]; //Total Amount ?>
		                        			</div>
		                        			<div class="col-1">:</div>
		                        			<div class="col-7">
		                        				<span id="totlaAmount"></span>
		                        			</div>
		                        		</div>
		                	        </div>
		                	        <div class="mt-2 trancheHide" style="display: none;">
		                        		<div class="row">
		                        			<div class="col-4">
		                        				<span data-lang="M01098"><?php echo $translations['M01098'][$language]; /* Remaining Amount */ ?></span>
		                        			</div>
		                        			<div class="col-1">:</div>
		                        			<div class="col-7">
		                        				<span id="remaining"></span>
		                        			</div>
		                        		</div>
		                	        </div>

					                <div class="registrationBtnPosition d-flex" style="margin-top: 20px;">
					                	<button id="backBtn" type="button" class="btn btn-default w-100 py-3 mr-3"><?php echo $translations['M00163'][$language]; //BACK ?></button>
					                	<button id="submitBtn" type="button" class="btn btn-primary w-100 py-3" disabled><?php echo $translations['M00077'][$language]; //CONFIRM ?></button>
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

    var tPassword = "<?php echo $_POST['tPassword']; ?>";
    var spendCredit = JSON.parse('<?php echo $_POST['spendCredit'] ?>');
    var portfolioID = "<?php echo $_POST['portfolioID']; ?>";
    var passData = JSON.parse('<?php echo $_POST['passData'] ?>');


    $(document).ready(function() {

    	goPayment(passData);

    	// var formData  = {
    	//     command: 'updateTrancheActivationVerification',
    	//     step : 2,
    	//     tPassword : tPassword,
    	//     spendCredit : spendCredit,
     //        portfolioID : portfolioID

    	// };

    	// var fCallback = goPayment;
    	// ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    	$('#submitBtn').click(function() {
    		$('#submitBtn').attr('disabled', true);
    		
    		var formData  = {
    		    command: 'updateTrancheActivationConfirmation',
    		    step : "2",
    		    tPassword : tPassword,
    		    spendCredit : spendCredit,
                portfolioID : portfolioID
    		};

    		var fCallback = goToSuccess;
    		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    	});

    	$('#backBtn').click(function() {
    		$.redirect('upgradePayment.php',{
    			portfolioID : portfolioID,
    		});
    	});
    });

    

	function goPayment(data, message) {

		var timer = data.spTokenRateExpiryTime;
        var tempMin, tempSec;
        tempMin = timer/60;
        tempSec = timer%60;
        tempMin = Number(tempMin).toFixed(0);
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
	    		$.redirect('payment.php',{
					creditUnit : creditUnit
				});
            }
        }, 1000);

		// $('#totlaAmount').html(addCommas(Number(data.creditUnit).toFixed(2)));  
		$('#contractAmount').html(addCommas(Number(data.creditUnit).toFixed(2))); 
		var buildConfirmation = "";
		var totalPayment = 0;
		$.each(data.invoiceSpendData, function(k, v) {
			if(v['convertedAmount']){
				buildConfirmation +=`
				<div class="col-12 paymentBox" style="margin-top: 10px">
					<div class="row">
						<div class="col-12 paymentName">
							${v['display']}
						</div>
						<div class="mt-4 col-12 paymentBalance">
							<div class="row">
								<div class="col-4">
									<?php echo $translations['M00343'][$language]; //Principal Amount (USDT) Top Up ?>
								</div>
								<div class="col-1">
									:
								</div>
								<div class="col-7">
									${addCommas(Number(v['paymentAmount']).toFixed(2))}
								</div>
							</div>
							<div class="row">
								<div class="col-4">
									<?php echo $translations['M01055'][$language]; //SP Rate ?>
								</div>
								<div class="col-1">
									:
								</div>
								<div class="col-7">
									${data.spRate}
								</div>
							</div>
							<div class="row">
								<div class="col-3">
									<?php echo $translations['M01056'][$language]; //Converted Amount ?>
								</div>
								<div class="col-1">
									:
								</div>
								<div class="col-8">
									${v['convertedAmount']}
								</div>
							</div>
						</div>


					</div>
				</div>
				
			`;
			}
			else{
				buildConfirmation +=`
				<div class="col-12 paymentBox" style="margin-top: 10px">
					<div class="row">
						<div class="col-12 paymentName">
							${v['display']}
						</div>
						<div class="mt-4 col-12 paymentBalance">
							<div class="row">
								<div class="col-4">
									<?php echo $translations['M00343'][$language]; //Principal Amount (USDT) Top Up ?>
								</div>
								<div class="col-1">
									:
								</div>
								<div class="col-7">
									${addCommas(Number(v['paymentAmount']).toFixed(2))}
								</div>
							</div>
						</div>


					</div>
				</div>
				`;

				totalPayment += parseFloat(v['paymentAmount']);
			}
			
		});
		var remaining = data.creditUnit - totalPayment;
		$('#remaining').html(addCommas(Number(remaining).toFixed(2)));  

		$('#buildConfirmation').html(buildConfirmation);
		$('#totlaAmount').html(addCommas(Number(totalPayment).toFixed(2))); 
		// $('#backBtn').attr('disabled', false);
		$('#submitBtn').attr('disabled', false);

		if (totalPayment >= data.creditUnit) {
			$('.trancheHide').hide();
		} else {
			$('.trancheHide').show();
		}
	}

	function goToSuccess(data, message) {
	    showMessage(message, 'success', '<?php echo $translations['M00072'][$language]; //Congratulation ?>', '', 'contractSubscriptionPortfolio.php');
	    $('#submitBtn').attr('disabled', false);
	}

</script>
