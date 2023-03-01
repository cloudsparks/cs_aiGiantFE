<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent" style="margin-bottom: 20px;">
	<div class="kt-container">
		<div class="col-12 pageTitle">
			<span id="walletName"></span> - <?php echo $translations['M00027'][$language]; //Withdrawal Confirmation ?>
		</div>
	    <div class="col-12">
	        <div class="row">

	            <div class="col-md-6 col-12">
	                <div class="row">
	                	<div class="col-12" style="margin-top: 10px">
	                		<label class="registrationLabel">
		                		<?php echo $translations['M00219'][$language]; //Credit Balance ?> : <span id="balance"></span>
		                	</label>
	                	</div>

	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00457'][$language]; //WITHDRAW AMOUNT ?></label>
	                        <input id="amount" type="text" class="form-control inputDesign" disabled value="<?php echo $_POST['amount']; ?>">
	                    </div>

	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M01117'][$language]; //ADMIN CHARGES ?></label>
	                        <input id="totalAdminFee" type="text" class="form-control inputDesign" disabled value="<?php echo $_POST['totalAdminFee']; ?>">
	                    </div>

	                  
	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00465'][$language]; //TOTAL DEDUCTIBLE ?></label>
	                        <input id="totalDeductible" type="text" class="form-control inputDesign" disabled value="<?php echo $_POST['totalDeductible']; ?>">
	                    </div>

	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00909'][$language]; //WALLET ADDRESS ?></label>
	                        <input type="text" class="form-control inputDesign" disabled value="<?php echo $_POST['walletAddress']; ?>">
	                    </div>

	                    <!-- <?php if ($_POST['uploadQR']) { ?>
						<div class="col-12" style="margin-top: 20px;">
							<div class="row">
								<div class="form-group col-lg-6 col-sm-6 col-12">
									<label class="formLable"><?php echo $translations['M00599'][$language]; //Upload QR Code ?></label><br>
									<input type="text" class="form-control formDesign" disabled value="<?php echo $_POST['uploadQR']['imageName']; ?>">
									 <input id="upload" type="file" accept="image/*" disabled value="<?php echo $_POST['uploadQR'][0]['imageData']; ?>">
									<input id="trID" type="hidden" name="" value="">
				                    <input id="imgData" type="hidden" name="" value="">
				                    <input id="imgName" type="hidden" name="" value="">
				                    <input id="imgSize" type="hidden" name="" value="">
				                    <input id="imgType" type="hidden" name="" value="">
								</div>
							</div>
						</div>
						<?php } ?> -->

	            
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="col-12 registrationBtnPosition" style="margin-top: 20px;">
	    	<button id="backBtn" type="button" class="btn btn-default"><?php echo $translations['M00218'][$language]; //Back ?></button>
	    	<button id="confirmBtn" type="button" class="btn btn-primary"><?php echo $translations['M00225'][$language]; //Confirm ?></button>
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
	var fCallback = "";
	var type;
	var walletAddress,amount,transactionPassword;
	var creditType		= "<?php echo $_POST['creditType']; ?>";
	var balance  		= "<?php echo $_POST['balance']; ?>";
	var type 			= "<?php echo $_POST['type']; ?>";
	var amount 			= "<?php echo $_POST['amount']; ?>";
	var walletAddress 	= "<?php echo $_POST['walletAddress']; ?>";
	var transactionPassword 	= "<?php echo $_POST['transactionPassword']; ?>";
	var totalDeductible 	= "<?php echo $_POST['totalDeductible']; ?>";
	var uploadQR = <?php echo json_encode($_POST['uploadQR']) ?>;
	var cryptoType 	= "<?php echo $_POST['cryptoType']; ?>";
	var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";
	var minAmount,maxAmount;

	$(document).ready(function(){

		$('#walletName').html(creditDisplay);
		
		$('#balance').text(addCommas(Number(balance).toFixed(2)));
 
		// $("#input-file-now").val(qrImg);

		$("body").keyup(function(event) {
			if (event.keyCode == 13) {
				$("#confirmBtn").click();
			}
		});

		$("#backBtn").click(function(){
			$.redirect('withdrawal',{
				creditType : creditType,
				balance : balance,
				creditDisplay : creditDisplay
			});
		});

		$("#confirmBtn").click(function(){

			var formData = {
				'command' : "memberAddNewWithdrawalConfirmation",
				creditType: creditType,
				type : type,
				amount : amount,
				walletAddress: walletAddress,
				// uploadQR : uploadQR,
				cryptoType : cryptoType,
				transactionPassword: transactionPassword
			};

			var fCallback = withdrawConfirmation;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		});
	});

	function withdrawConfirmation(data, message)
	{
		// var canvasBtnArray = {
		//         WithdrawalList: '<?php echo $translations['M00314'][$language]; //Withdrawal Listing ?>'
		//         // NewWithdrawal: '<?php echo $translations['M00315'][$language]; //New Withdrawal ?>'
		// };

	    showMessage('<?php echo $translations['A00918'][$language]; //Your credit withdrawal successful! ?>', "success", "<?php echo $translations['B00263'][$language]; //Thanks ?>","", "withdrawalListing");

	 //    $('#canvasWithdrawalListBtn').click(function() {
		// 	window.location="withdrawalListing.php";
		// });

		// $('#canvasNewWithdrawalBtn').click(function() {
		// 	$.redirect("withdrawal.php", {
	 //        	creditType: creditType,
	 //        	balance: balance
	 //        });
		// });
	}


</script>
