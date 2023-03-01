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
				<span id="walletName"></span>
				<span data-lang="M00981"><?php echo $translations["M00981"][$language]; //Fund In QR Code ?></span>
			</div>
		</div>

		<div class="col-12">
			<div class="row justify-content-center">
				<div class="col-md-11 col-lg-10">
					<div class="listingWrapper">
					    <div class="col-12">
					        <div class="row text-center">

					            <div class="col-lg-6 col-12">
					                <div class="row">
					                    <!-- <div class="col-12 normalText">
					                        <?php echo $translations['M00506'][$language]; //Send ?>
					                    </div> -->

					                    <div class="col-12">
					                    	<div class="input-group qrDesign">
					                    	    <input id="QRreferralLink2" type="text" class="form-control" readonly="readonly">
					                    	    <div class="input-group-append">
					                    	        <span class="input-group-text"><a href="javascript:;" onclick="myFunction()"><i class="fa fa-clipboard" aria-hidden="true"></i></a></span>
					                    	    </div>
					                    	</div>
					                    </div>

					                    <div class="col-12 mt-3 text-left" data-lang="M01065">
					                    	<?php echo $translations['M01065'][$language]; /* Coin will be deposited after 3 network confirmations */ ?>
					                    </div>

					                    <div id="walletCheck" class="col-12" style="margin-top: 10px;display: none;margin-bottom: 10px;color: green">
					                        <i class="fa fa-check fa-lg ml-2 mr-2" aria-hidden="true"></i>
					                        <span data-lang="M00880"><?php echo $translations['M00880'][$language]; //Copied To Clipboard ?></span>
					                    </div>

					                    <div class="mt-5 col-12 d-flex justify-content-center">
					                        <div id="payPaymentQR" class="depositQR">
					                        	<div class="col-12 depositQRposition">
					                        	    <img src="<?php echo $config['favicon']; ?>" class="QRLogo">
					                        	</div>
					                        </div>
					                    </div>

					                    <div class="mt-5 col-12">
					                    	<a id="saveQRCode" class="btn btn-primary w-100 text-white" data-lang="M00447"><?php echo $translations['M00447'][$language]; //Save QR Code ?></a>
					                    </div>

					                    <!-- <div class="col-12 normalText">
					                        <?php echo $translations['M00275'][$language]; //Wallet Address ?>
					                    </div> -->
					                    
					                    <!-- <div class="col-12" style="color:#666666;">
					                      <li><?php echo $translations['M00507'][$language]; //Coin will be deposited after 3 network confirmations ?></li>
					                    </div> -->
					                </div>
					            </div>

					            <div class="col-lg-6 col-12">
					                <div class="row">
					                    <div class="col-12 depositAlertBox2">
					                        <div class="row">
					                            <div class="col-12 depositAlertBox">
					                                <div class="row">
					                                    <div class="row">
					    	                                <div class="col-md-2 col-12 align-self-center text-center">
					    	                                    <img src="images/alertIcon.png" class="alertIcon">
					    	                                </div>
					    	                                <div class="col-md-9 col-12 text-left">
					    	                                    <div class="row mt-3 mt-md-0" id="appendNotice">
					    	                                    </div>
					    	                                </div>
					    	                            </div>
					    	                            <div class="mt-3 mb-2" data-lang="M01060">
					    	                            	<b><?php echo $translations['M01060'][$language]; //Disclaimer ?>:</b>
					    	                            </div>
					    	                            <div id="appendDisclaimer" class="text-left"></div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
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
=

</html>
<script type="text/javascript" src="js/qrcode.js"></script>
<script>

    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;

    var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";
    var amount = '<?php echo $_POST['amount']; ?>';
    var coin_type = '<?php echo $_POST['coin_type']; ?>';
    var tPassword = '<?php echo $_POST['tPassword']; ?>';
    var coinTypeDisplay = '<?php echo $_POST['coinTypeDisplay']; ?>';
    var creditType = '<?php echo $_POST['creditType']; ?>';

    console.log(coinTypeDisplay)


    $(document).ready(function(){
    	$("#walletName").html(creditDisplay + ' -');
    	// $('.getCoinType').html(creditDisplay);

        var formData  = {
            command   	: "getTheNuxTransactionToken",
            amount 	    : amount,
            coin_type 	: coin_type,
            tPassword 	: tPassword,
            creditType  : creditType
        };

        var fCallback = submitCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        var noticeHTML = "";
	    var disclaimerHTML = "";

	    noticeHTML = `
		    <div class="col-12 normalText" data-lang="M01058">
		        <i class="fas fa-circle mr-2"></i><?php echo $translations['M01058'][$language]; //Send only %%cryptoType%% to this deposit address. ?>
		    </div>
		    <div class="col-12 normalText" data-lang="M01063">
		        <i class="fas fa-circle mr-2"></i><?php echo $translations['M01063'][$language]; //Sending coin or token other than ?> <b><?php echo $_POST['coinTypeDisplay']; ?></b> <?php echo $translations['M01064'][$language]; //to this address may result in the loss of your deposit. ?>
		    </div>
		    <div class="col-12 normalText" data-lang="M01059">
		        <i class="fas fa-circle mr-2"></i><?php echo $translations['M01059'][$language]; //Amount will be deposited after 3 network confirmations. ?>
		    </div>
	    `.replace("%%cryptoType%%","<b><?php echo $_POST['coinTypeDisplay']; ?></b>","coin","");

	    disclaimerHTML = `
		    <div class="normalText" data-lang="M01061">
		        <i class="fas fa-circle mr-2"></i><?php echo $translations['M01061'][$language]; //First Union will not be liable for any issues arising from the transfers of cryptocurrencies including transferring of wrong coins like USDT Omni instead of %%cryptoType%%, transferring to wrong address or any other issues that results in First Union not receiving the full value of the transaction. ?>
		    </div>
		    <div class="normalText" data-lang="M01062">
		        <i class="fas fa-circle mr-2"></i><?php echo $translations['M01062'][$language]; //"First Union will only credit to your account in accordance to the value we receive for your funding in if any. You are solely liable for ensuring that you have input the correct details when you perform a fund in or a withdrawal." ?>
		    </div>
	    `.replace("%%cryptoType%%","<b><?php echo $_POST['coinTypeDisplay']; ?></b>","coin","");

	    $('#appendNotice').html(noticeHTML);
	    $('#appendDisclaimer').html(disclaimerHTML);

        $("#saveQRCode").click(function(){
        	var canvas = document.querySelector("#payPaymentQR canvas");
        	document.getElementById("saveQRCode").download = "image.png";
            document.getElementById("saveQRCode").href = canvas.toDataURL("image/png").replace(/^data:image\/[^;]/, 'data:application/octet-stream');
        });      
	});

	function submitCallback(data, message) {
		
	    var walletAddress = data.walletAddress;
	    var QRCODE_CONTENT = walletAddress;

	    // alert(QRCODE_CONTENT);
	    $('#QRreferralLink2').val(data.walletAddress);
	    var form = document.forms['qrForm'];    
	    var typeNumber = 5;
	    var errorCorrectLevel = 'M';
	    var qrcode = new QRCode(document.getElementById("payPaymentQR"), {
	        text: QRCODE_CONTENT,
	        width: 200,
	        height: 200,
	        colorDark : "#000000",
	        colorLight : "#ffffff",
	        correctLevel : QRCode.CorrectLevel.H,
	        render: "canvas"
	    });
	}

	function myFunction() {
	    $("#walletCheck").show();
	    var copyText = document.getElementById("QRreferralLink2");
	    copyText.select();
	    document.execCommand("copy");

	    setTimeout(function () {
	      $("#walletCheck").hide();
	    }, 1000);
	}

</script>