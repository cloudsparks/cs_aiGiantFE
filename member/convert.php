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
            <span id="walletName"></span> - <?php echo $translations['M00017'][$language]; //Convert ?>
        </div>
	    <div class="col-12">
	        <div class="row">

	            <div class="col-md-6 col-12">
	                <div class="row">

	                	<div class="col-12" style="margin-top: 10px">
	                	    <label class="registrationLabel"><?php echo $translations['M00219'][$language] /*Balance*/; ?> : </label>
                            <label id="balance"></label>
	                	</div>

                        <div class="col-12" style="margin-top: 10px">
                            <label class="registrationLabel"><?php echo $translations['M02077'][$language] /*Convert From*/; ?></label>
                            <input id="fromCredit" class="form-control inputDesign" type="text" disabled>
                        </div>

	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M02079'][$language] /*Convert Amount*/; ?> <span class="mustFill">*</span></label>
	                        <input id="amount" class="form-control inputDesign" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');calConvertAmount(this.value);">
	                    </div>

	                    


	                    <div class="col-12" style="margin-top: 10px;">
	                        <label class="registrationLabel"><?php echo $translations['M02080'][$language] /*Convert To*/; ?></label>
	                        <select id="convertTo" class="form-control inputDesign" onchange="changeRate(this.value)">
	                        </select>
	                    </div>

	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00343'][$language] /*Rate*/; ?></label>
	                        <input id="rate" class="form-control inputDesign" type="text" disabled>
	                    </div>

	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M01707'][$language] /*Converted Amount*/; ?></label>
	                        <input id="convertedAmount" class="form-control inputDesign" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" disabled>
	                    </div>

                        <div class="col-12" style="margin-top: 10px">
                            <label class="registrationLabel"><?php echo $translations['M00192'][$language] /*Transaction Password*/; ?><span class="mustFill">*</span></label>
                            <input id="transactionPassword" class="form-control inputDesign" type="password">
                        </div>


	                </div>
	            </div>


	            

	           
	        </div>
	    </div>

	    <div class="col-12 registrationBtnPosition" style="margin-top: 20px;">
	    	<button id="nextBtn" type="button" class="btn btn-primary"><?php echo $translations['M00155'][$language] /*NEXT*/; ?></button>
	    </div>	
	</div>
</section>



<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


</html>

<div class="modal fade warningModal" id="convertComfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 17px; display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span id="canvasTitle" class="modal-title"><?php echo $translations['M02081'][$language] /*Convert Confirmation*/; ?></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div class="col-12">
                	<div class="row">

                		<div class="col-12">
                			<div class="row">
                				<div class="col-md-5 col-12">
                					<label class="registrationLabel"><?php echo $translations['M02079'][$language] /*Convert Amount*/; ?></label>
                				</div>
                				<div class="col-2 d-none d-sm-block">
                					:
                				</div>
                				<div id="modalAmount" class="col-md-5 col-12">
                				</div>
                			</div>
                		</div>

                		<div class="col-12">
                			<div class="row">
                				<div class="col-md-5 col-12">
                					<label class="registrationLabel"><?php echo $translations['M02080'][$language] /*Convert To*/; ?></label>
                				</div>
                				<div class="col-2 d-none d-sm-block">
                					:
                				</div>
                				<div id="modalConvertTo" class="col-md-5 col-12">
                					USDT
                				</div>
                			</div>
                		</div>

                		<div class="col-12">
                			<div class="row">
                				<div class="col-md-5 col-12">
                					<label class="registrationLabel"><?php echo $translations['M00343'][$language] /*Rate*/; ?></label>
                				</div>
                				<div class="col-2 d-none d-sm-block">
                					:
                				</div>
                				<div id="modalRate" class="col-md-5 col-12">
                				</div>
                			</div>
                		</div>

                		<div class="col-12">
                			<div class="row">
                				<div class="col-md-5 col-12">
                					<label class="registrationLabel"><?php echo $translations['M01707'][$language] /*Converted Amount*/; ?></label>
                				</div>
                				<div class="col-2 d-none d-sm-block">
                					:
                				</div>
                				<div id='modalConvertedAmount' class="col-md-5 col-12">
                				</div>
                			</div>
                		</div>

                	</div>
                </div>
            </div>
            <div class="modal-footer">
                 <button type="button" class="btn btnDefaultModal" data-dismiss="modal"><?php echo $translations['M00112'][$language]; //Close ?></button>
                 <button id="canvasYesBtn" type="button" class="btn btnThemeModal" data-dismiss="modal"><?php echo $translations['M00225'][$language] //Confirm ?></button>

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
    var creditType      = "<?php echo $_POST['creditType']; ?>";
    var rateAry         = [];
    var creditDisplay = "<?php echo $_POST['creditDisplay']; ?>";

    $(document).ready(function(){
        $("#walletName").html(creditDisplay);
        var formData  = {
            command   	: "getCreditData",
            type 	    : "convert",
            creditType 	: creditType
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


        $('#nextBtn').click(function() {

            $('.invalid-feedback').remove();
            $('input').removeClass('is-invalid');
            
        	// $('#convertComfirmation').modal('show');
            var toCredit    = $('#convertTo').val();
            var amount      = $('#amount').val();
            var tpassword   = $('#transactionPassword').val();

             var formData  = {
                command             : "convertCreditVerify",
                fromCredit          : creditType,
                toCredit            : toCredit,
                amount              : amount,
                transactionPassword : tpassword,
            };

            var fCallback = verifyConvert;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#canvasYesBtn').click(function(){
            var toCredit    = $('#convertTo').val();
            var amount      = $('#amount').val();
            var tpassword   = $('#transactionPassword').val();

             var formData  = {
                command             : "convertCreditConfirmation",
                fromCredit          : creditType,
                toCredit            : toCredit,
                amount              : amount,
                transactionPassword : tpassword,
            };

            var fCallback = convertSuccess;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
	});
    function loadDefaultListing(data, message) {
        console.log(data);
        $('#balance').text(data.balance);

        $('#fromCredit').val(translations[data.creditTypeDisplay][language]);

        var convertToHtml = "";
        if(data.convertData){
            $.each(data.convertData, function(key,value) {
                convertToHtml += '<option value='+value['toCredit']+'>'+value['toCreditDisplay']+'</option>';
                $('#convertTo').empty().append(convertToHtml);
                $('#rate').val(value['rate']);

                rateAry[value['toCredit']] = value['rate'];

                changeRate(value['toCredit']);
            });
        }
    }

    function changeRate(value){
        $('#rate').val(rateAry[value]);

        var currentRate = $('#rate').val();
        var amount = $('#amount').val();
        var convertedAmount = amount * currentRate;

        $('#convertedAmount').val(convertedAmount);
    }

    function calConvertAmount(amount){
        var currentRate = $('#rate').val();
        var convertedAmount = amount * currentRate;

        $('#convertedAmount').val(convertedAmount);
    }

    function verifyConvert(data, message) {

        $('#convertComfirmation').modal('show');
        $('#modalAmount').text(data.amount);
        $('#modalConvertTo').text(data.toCredit);
        $('#modalRate').text(data.coinRate);
        $('#modalConvertedAmount').text(data.convertAmount);
    }

    function convertSuccess(data, message) {
        $('#convertComfirmation').modal('hide');
        showMessage(translations['M02082'][language], 'success', translations["M00228"][language], '', 'dashboard.php');
    }

</script>