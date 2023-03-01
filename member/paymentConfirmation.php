<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Account Registration", $_SESSION['blockedRights']['Registration'])){
     header("Location: dashboard");
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
					                <!-- <div class="row creditHide mt-5">
			                			<div class="col-4">
			                				<span data-lang="M01097"><?php echo $translations['M01097'][$language]; //Contract Amount ?></span>
			                			</div>
			                			<div class="col-1">:</div>
			                			<div class="col-7">
			                				<span id="contractAmount"></span>
			                			</div>
			                		</div> -->
			                		<div class="row mt-2">
										<div class="col-4">
											<?php echo $translations['M00553'][$language]; //Total Amount ?>
										</div>
										<div class="col-1">
											:
										</div>
										<div class="col-4">
											<span id="totalPayment"></span>
										</div>
									</div>
			                		<div class="row trancheHide mt-2" style="display: none;">
										<div class="col-4">
											<span data-lang="M01098"><?php echo $translations['M01098'][$language]; /* Remaining Amount */ ?></span>
										</div>
										<div class="col-1">
											:
										</div>
										<div class="col-4">
											<span id="remaining"></span>
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

    var creditUnit = "<?php echo $_POST['creditUnit']; ?>";
    var tPassword = "<?php echo $_POST['tPassword']; ?>";

    var spendCredit = JSON.parse('<?php echo $_POST['spendCredit'] ?>');
    var packageID = "<?php echo $_POST['packageID']; ?>";
    var type = "<?php echo $_POST['type']; ?>";
    var quantity = "<?php echo $_POST['quantity']; ?>";
	var lockDays = "<?php echo $_POST['lockDays']; ?>";
    var depositPercentage = "<?php echo $_POST['depositPercentage']; ?>";

    $(document).ready(function() {

    	var formData  = {
    	    command: 'reentryVerification',
    	    step : 2,
    	    tPassword : tPassword,
    	    spendCredit : spendCredit,
    	    type : type,
    	    creditUnit : creditUnit,
            packageID : packageID

    	};

		if(packageID == 2) {
            formData = {
                ...formData,
                lockDays: lockDays
            }
        }

    	var fCallback = goPayment;
    	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    	$('#submitBtn').click(function() {
    		$('#submitBtn').attr('disabled', true);
    		
    		var formData  = {
    		    command: 'reentryConfirmation',
    		    type : type,
    		    step : "2",
    		    tPassword : tPassword,
    		    spendCredit : spendCredit,
    		    type : type,
    		    creditUnit : creditUnit,
                packageID : packageID
    		};

			if(packageID == 2) {
				formData = {
					...formData,
					lockDays: lockDays
				}
			}
			
    		var fCallback = goToSuccess;
    		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    	});

    	$('#backBtn').click(function() {
    		$.redirect('payment',{
    			creditUnit : creditUnit,
	            type : type,
	            packageID : packageID
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
	    		$.redirect('payment',{
					creditUnit : creditUnit
				});
            }
        }, 1000);

		// $('#contractAmount').html(addCommas(Number(data.creditUnit).toFixed(2)));  
		var creditUnit = data.creditUnit;
		var totalPayment = 0;

		var buildConfirmation = "";

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
									<?php echo $translations['M00343'][$language]; //Enter Price ?>
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
								<div class="col-4">
									<?php echo $translations['M01056'][$language]; //Converted Amount ?>
								</div>
								<div class="col-1">
									:
								</div>
								<div class="col-7">
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
						<div class="col-12 paymentBalance">
							<div class="row mt-2">
								<div class="col-4">
									<?php echo $translations['M00343'][$language]; //Enter Price ?>
								</div>
								<div class="col-1">
									:
								</div>
								<div class="col-4">
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

		var totalPrice = 0;
		if(type == 'tranche'){
			totalPrice = data.displayTotal;
		}else{
			totalPrice = creditUnit;
		}
		var remaining = totalPrice - totalPayment;
		$('#remaining').html(addCommas(Number(remaining).toFixed(2)));   

		$('#buildConfirmation').html(buildConfirmation);
		$('#totalPayment').html(addCommas(Number(totalPayment).toFixed(2))); 
		// $('#backBtn').attr('disabled', false);
		$('#submitBtn').attr('disabled', false);
	}

	function goToSuccess(data, message) {
	    showMessage(message, 'success', '<?php echo $translations['M00072'][$language]; //Congratulation ?>', '', 'dashboard');
	    $('#submitBtn').attr('disabled', false);
	}

</script>
