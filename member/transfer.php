<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<input type="hidden" name="" class="hideFunction">
<!-- begin:: Content -->
<section class="pageContent">
    <div class="kt-container">
        <div class="text-center">
            <div class="pageTitle">
                 <span data-lang="M00435"><?php echo $translations['M00435'][$language]; //Transfer ?></span>
            </div>
        </div>
        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10">
                    <div class="listingWrapper">
                        <div class="row">
                            <div class="col-lg-6 col-md-7 col-12">
                                <div class="form-group">
                                    <label data-lang="M00415"><?php echo $translations['M00415'][$language]; //My Wallet ?></label>
                                    <div id="walletName" class="formValue"></div>
                                </div>
                                <div class="form-group">
                                    <label data-lang="M00050" class="d-flex justify-content-between"><?php echo $translations['M00050'][$language]; //Amount ?>
                                        <div>
                                            <?php echo $translations['M00490'][$language]; //Available ?>: <span id="balance"></span>
                                        </div>
                                    </label>
                                    <input id="transferAmount" class="form-control inputDesign" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '');">
                                    <span id="minTransferAmount" class="invalid-feedback"></span>
                                </div>
                                <div class="form-group">
                                    <label data-lang="M00100"><?php echo $translations['M00100'][$language]; //Receiver Username ?></label>
                                    <input id="receiverUsername" class="form-control inputDesign" type="text">
                                </div>
                                <div class="form-group">
                                    <label data-lang="M00099"><?php echo $translations['M00099'][$language]; //Remark ?></label>
                                    <input id="remark" class="form-control inputDesign" type="text">
                                </div>
                                <div class="form-group">
                                    <label data-lang="M00042"><?php echo $translations['M00042'][$language]; //Transaction Password ?></label>
                                    <div class="position-relative">
                                        <input id="transactionPassword" class="form-control inputDesign" type="password">
                                        <!-- <i class="far fa-eye eyeIcon"></i> -->
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button onclick="goBack();" type="button" class="btn btn-default w-100 py-3 mr-3" data-lang="M00163"><?php echo $translations['M00163'][$language]; /* Back */?></button>
                                    <button id="nextBtn" type="button" class="btn btn-primary w-100 py-3" data-lang="M00034">
                                        <?php echo $translations['M00034'][$language]; //Next ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end:: Content -->
<?php include 'footer.php'; ?>
</body>

<div class="modal fade" id="transferConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header canvasheader">
                <div class="row text-center">
                    <div class="col-12"><img id="canvasAlertIcon" src="images/project/warningIcon.png" alt="" width="65"></div>
                    <div class="col-12"><span id="canvasTitle" class="modal-title" data-lang="M00199"><?php echo $translations['M00199'][$language]; //Confirmation ?></span></div>
                </div>
                <div class="modalCloseWrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>                
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont">
                <div>
                    <div data-lang="M00415"><?php echo $translations['M00415'][$language]; //My Wallet ?></div>
                    <div id="walletName_c" class="modalValue"></div>
                </div>
                <div class="mt-4">
                    <div data-lang="M00184"><?php echo $translations['M00184'][$language]; //Balance ?></div>
                    <div id="balance_c" class="modalValue"></div>
                </div>
                <div class="mt-4">
                    <div data-lang="M00050"><?php echo $translations['M00050'][$language]; //Amount ?></div>
                    <div id="transferAmount_c" class="modalValue"></div>
                </div>
                <div class="mt-4">
                    <div data-lang="M00100"><?php echo $translations['M00100'][$language]; //Receiver Username ?></div>
                    <div id="receiverUsername_c" class="modalValue"></div>
                </div>
                <div class="mt-4">
                    <div data-lang="M00099"><?php echo $translations['M00099'][$language]; //Remark ?></div>
                    <div id="remark_c" class="modalValue"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="canvasCloseBtn" type="button" class="btn btn-default" data-dismiss="modal" data-lang="M00114"><?php echo $translations['M00114'][$language]; //Cancel ?></button>
                <button id="transferConfirmBtn" type="button" class="btn btn-primary" data-dismiss="modal" data-lang="M00086"><?php echo $translations['M00086'][$language]; //Confirm ?></button>
            </div>
        </div>
    </div>
</div>



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
var fCallback = "";
var type = 1;
var transferAmount,receiverUsername,remark,transactionPassword;
var creditType    = "<?php echo $_POST['creditType']; ?>";
var passData;

// var balance = "<?php echo $_POST['balance']; ?>";
// var walletName = "<?php echo $_POST['walletName']; ?>";

$(document).ready(function(){

	if (!creditType) {
		var message  = '<?php echo $translations['M00115'][$language]; //You don’t have permission to access. ?>';
          showMessage(message, 'warning', '<?php echo $translations['M00197'][$language]; //Failed ?>', '', 'dashboard');
          return;
	}

	var formData = {
		'command' : "getCreditData",
		type: 'transfer',
		creditType : creditType
	};
	var fCallback = loadTransferData;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	// $('#walletName').html(walletName);

	// $('#balance').text(currencyFormat(parseFloat(balance),2));

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#nextBtn").click();
		}
	});

	$("#nextBtn").click(function(){
		$("input").each(function(){
            $(this).removeClass('is-invalid');
            $('.invalid-feedback').html("");
        });

		transferAmount = $("#transferAmount").val();
		receiverUsername = $("#receiverUsername").val();
		remark = $("#remark").val();
		transactionPassword = $("#transactionPassword").val();

		var formData = {
			'command' : 'memberTransferCredit',
			'creditType' : creditType,
			'amount' : transferAmount,
			'receiverUsername' : receiverUsername,
			'remark' : remark,
			'transactionPassword' : transactionPassword
		};

		passData = formData;

		var fCallback = transferConfirmation;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});

	$("#transferConfirmBtn").click(function(){

		var formData = passData;
		formData['command'] = "memberTransferCreditConfirmation";

		var fCallback = transferSuccess;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});
});

function loadTransferData(data, message) {
	$('#walletName').text(data.creditTypeDisplay);
	$('#balance').text(numberThousand(data.balance, 2));
	
}

function transferConfirmation(data, message) {

	$('#walletName_c').text(data.creditDisplay);
	$('#receiverUsername_c').text(data.receiverUsername);
	$('#balance_c').text($('#balance').text());
	$('#transferAmount_c').text(numberThousand(transferAmount, 2));
	$('#remark_c').text(remark || '-');

	$('#transferConfirmation').modal('show');
}

function transferSuccess(data, message) {
	showMessage(message, "success", `<span data-lang='M00215'><?php echo $translations['M00215'][$language]; /* Success */ ?></span>`,"", ['dashboard', {creditType: creditType}]);
}

function errorDisplay(type,errorMsg) {

	$("#"+type).addClass('is-invalid');
	$("#"+type).after('<div class="invalid-feedback">'+errorMsg+'</div>');
	$("#"+type).focus();

}
</script>
