<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<input type="hidden" name="" class="hideFunction">
<!-- begin:: Content -->
<div class="kt-container kt-grid__item kt-grid__item--fluid standardPageMargin form_bg">
	<div class="row">
		<div id="walletName" class="col-12 PageTitleSub" style="color: #1B75BB;text-transform: uppercase;">
		</div>
		<div class="col-12 PageTitleSub">
			<?php echo $translations['M00273'][$language]; //CREDIT TRANSFER ?>
		</div>
		<div class="col-12" style="margin-top: 5px; margin-bottom: 5px;">
			<hr>
		</div>
		<div class="col-12 PageTitle" style="margin-top: 30px;">
			<?php echo $translations['M00274'][$language]; //Credit Balance ?> : <span id="balance"></span>
		</div>
		<div class="col-12" style="margin-top: 20px;">
			<div class="row">
				<div class="form-group col-lg-5 col-sm-6 col-12">
					<label class="formLable"><?php echo $translations['M00275'][$language]; //TRANSFER AMOUNT ?><span class="kt-font-danger">*</span></label>
					<input id="transferAmount" type="text" class="form-control formDesign" disabled>
				</div>
			</div>
		</div>
		<div class="col-12" style="margin-top: 20px;">
			<div class="row">
				<div class="form-group col-lg-5 col-sm-6 col-12">
					<label class="formLable"><?php echo $translations['M00276'][$language]; //USERNAME ?><span class="kt-font-danger">*</span></label>
					<input id="receiverUsername" type="text" class="form-control formDesign" disabled="disabled">
				</div>
			</div>
		</div>
		<div class="col-12" style="margin-top: 20px;">
			<div class="row">
				<div class="form-group col-lg-5 col-sm-6 col-12">
					<label class="formLable"><?php echo $translations['M00225'][$language]; //REMARK ?></label>
					<input id="remark" type="text" class="form-control formDesign" disabled="disabled">
				</div>
			</div>
		</div>

		<div class="col-12" style="margin-top: 20px;">
                    <button id="backBtn" type="button" class="btn btn-default mr-3 btnMarginB"><?php echo $translations['M00278'][$language]; //Back ?></button>
                    <button id="nextBtn" type="button" class="btn btn-primary"><?php echo $translations['M00279'][$language]; //Confirm ?></button>
        </div>



	</div>
</div>
<!-- end:: Content -->

<?php include 'footer.php'; ?>
</body>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<?php include 'backToTop.php' ?>
<!-- end::Scrolltop -->

<?php include 'sharejs.php'; ?>



<!-- end::Body -->
</html>

<script>
	var url             = 'scripts/reqDefault.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 0;
	var fCallback 		= "";

	var type = "<?php echo $_POST['type']; ?>";
	var creditType    = "<?php echo $_POST['creditType']; ?>";
	var balance = "<?php echo $_POST['balance']; ?>";
	var transferAmount		= "<?php echo $_POST['transferAmount']; ?>";
	var receiverUsername	= "<?php echo $_POST['receiverUsername']; ?>";
	var remark        		= "<?php echo $_POST['remark']; ?>";
	var transactionPassword  = "<?php echo $_POST['transactionPassword']; ?>";
	var walletName = "<?php echo $_POST['walletName']; ?>";

	$(document).ready(function(){

		if (!creditType) {
			var message  = '<?php echo $translations['M00467'][$language]; //You don’t have permission to access. ?>';
            showMessage(message, 'warning', '<?php echo $translations['M00591'][$language]; //Failed ?>', '', 'dashboard.php');
            return;
		}

		$("#walletName").html(walletName);

		$('#balance').text(currencyFormat(parseFloat(balance),2));

		$('#transferAmount').val(transferAmount);
		$('#receiverUsername').val(receiverUsername);
		$('#remark').val(remark);

		$("body").keyup(function(event) {
			if (event.keyCode == 13) {
				$("#nextBtn").click();
			}
		});

		$("#backBtn").click(function(){
			$.redirect('transfer.php',{
				type : type,
				creditType : creditType,
				balance : balance
			});
		});

		$("#nextBtn").click(function(){

			showCanvas();

			var formData = {
					'command' : 'memberTransferCreditConfirmation',
					'type' : type,
					'creditType' : creditType,
					'transferAmount' : transferAmount,
					'receiverUsername' : receiverUsername,
					'remark' : remark,
					transactionPassword: transactionPassword
				};

				var fCallback = transferSuccess;
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		});
	});

	function transferSuccess(data,message)
	{
        showMessage('<?php echo $translations['M00280'][$language]; //Your ?> '+walletName+' <?php echo $translations['M00281'][$language]; //credit has been successfully transferred. ?>', "success", "<?php echo $translations['M00434'][$language]; //Thanks ?>","", "dashboard.php");
	}


</script>
