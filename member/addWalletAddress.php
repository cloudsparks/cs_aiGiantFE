<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Add Wallet Address", $_SESSION['blockedRights']['Registration'])){
     header("Location: dashboard.php");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
    <div class="kt-container">
        <div class="text-center">
            <div class="pageTitle">
                 <span data-lang="M00468"><?php echo $translations['M00468'][$language]; //Add Wallet Address ?></span>
            </div>
        </div>
        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10">
                    <div class="listingWrapper">
                        <div class="row">
                            <div class="col-lg-6 col-md-7 col-12">
                                <div class="form-group">
                                    <label data-lang="M00974"><?php echo $translations['M00974'][$language]; //Please select crypto type ?></label>
                                    <select id="creditType" class="form-control inputDesign"></select>
                                </div>
                                <div class="form-group">
                                    <label data-lang="M00275"><?php echo $translations['M00275'][$language]; //Wallet Address ?></label>
                                    <input id="walletAddress" class="form-control inputDesign" type="text" placeholder="<?php echo $translations['M00525'][$language]; //Enter Your Wallet Address ?>">
                                </div>
                                <div class="form-group">
                                    <label data-lang="M00279"><?php echo $translations['M00279'][$language]; //Retype Wallet Address ?></label>
                                    <input id="retypeWalletAddress" class="form-control inputDesign" type="text" placeholder="<?php echo $translations['M01171'][$language]; //Retype Your Wallet Address ?>">
                                </div>
                                <div class="form-group">
                                    <label data-lang="M00042"><?php echo $translations['M00042'][$language]; //Transaction Password ?></label>
                                    <div class="position-relative">
                                        <input id="transactionPassword" class="form-control inputDesign" type="password">
                                        <i class="far fa-eye eyeIcon"></i>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button onclick="goBack();" type="button" class="btn btn-default w-100 py-3 mr-3" data-lang="M00163"><?php echo $translations['M00163'][$language]; /* Back */?></button>
                                    <button id="nextBtn" type="button" class="btn btn-primary w-100 py-3" data-lang="M00280">
                                        <?php echo $translations['M00280'][$language]; //Add ?>
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

<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<script>

// Initialize the arguments for ajaxSend function
var method         = 'POST';
var url            = 'scripts/reqDefault.php';
var debug          = 0;
var bypassBlocking = 0;
var bypassLoading  = 0;
var pageNumber     = 1;
var offsetSecs     = getOffsetSecs();

$(document).ready(function() {

	var formData = {
    	command   : 'getAvailableCreditWalletAddress'
    };
    var fCallback = buildCreditType;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    $('#nextBtn').click(function() {

        $('.invalid-feedback').remove();
        $('input').removeClass('is-invalid');

        var creditType =  $("#creditType").val();
        var walletAddress =  $("#walletAddress").val();
        var retypeWalletAddress =  $("#retypeWalletAddress").val();
        var transactionPassword = $("#transactionPassword").val();

        if(walletAddress == retypeWalletAddress){
            var formData  = {
                command   : 'addWalletAddress',
                walletAddress   : walletAddress,
                creditType  : creditType,
                retypeWalletAddress : retypeWalletAddress,
                transactionPassword : transactionPassword
            };
            var fCallback = addWalletAddressAction;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }else{
            errorDisplayCustom('retypeWalletAddress',`<?php echo $translations['M01025'][$language]; /* Wallet address not match */ ?>`);
        }
    });
});

function errorDisplayCustom(type,errorMsg){
    $("#"+type).addClass('is-invalid');
    $("#"+type).after('<div class="invalid-feedback">'+errorMsg+'</div>');
    $("#"+type).focus();
}

// add wallet address plugin here
// function showTagField() {
// 	var cType = $("#creditType").val();
// 	if( cType == 'ripple' || cType == 'eos') {
// 		$("#tagWrapper").removeClass("hide");
// 		var tagName = '';

// 		switch (cType) {
// 			case 'ripple' : tagName = 'XRP Tag'
// 				break;
// 			case 'eos' : tagName = 'EOS Memo'
// 				break;
// 			default : 
// 		}

// 		$("#tagDisplay").text(tagName);
// 	}else {
// 		$("#tagWrapper").addClass("hide");
// 	}
// }

function addWalletAddressAction(data, message) {
	showMessage(message, 'success', '<?php echo $translations['M00072'][$language]; /* Congratulations */ ?>', 'edit', 'addWalletAddressListing.php');
}

function buildCreditType(data, message){
	var html = "";
	$.each(data.creditList, function(i, obj) {
        html+=`<option value="${obj.value}">${obj.display}</option>`;
	});
	$("#creditType").html(html);
}

</script>