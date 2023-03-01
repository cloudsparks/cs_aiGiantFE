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
            <div class="pageTitle" data-lang="M03609">
                <?php echo $translations['M03609'][$language] /*VISA/MASTER CARD PURCHASE*/ ?>
            </div>
        </div>

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10">
                    <div class="listingWrapper">
                        <div class="col-md-6 col-12">
                            <p class="purchaseUSDTTitle" id="cryptoTitle"></p>
                        </div>
                        <div class="col-md-6 col-12" style="margin-top: 20px;">
                            <p class="purchaseUSDTLabel" data-lang="M03610">
                            <?php echo $translations['M03610'][$language] /*Enter Amount*/ ?>
                            </p>
                        </div>
					    <div class="col-md-6 col-12 input-group purchaseUSDTInputContainer" >
					    	<input id="amount" class="form-control inputDesign paymentField" type="number" >
                            <div class="input-group-append">
                                <span class="input-group-text amountTxt">USD</span> 
                            </div>
                            <div id="quantityError"></div>
                            <span class="text-danger purchaseUSDTWarning" data-lang="M03611">
                            *<?php echo $translations['M03611'][$language] /*Disclaimer: Final amount of coin received may vary from the amount of coin you have input due to rate fluctuations.*/ ?> </span>
                        </div>

                        <div class="col-md-6 col-12 purchaseUSDTInputContainer">
                            <div class="formLabel mb-1" data-lang="M03612">
                                <?php echo $translations['M03612'][$language] /*Payment Method*/ ?>
                            </div>
                            <div class="col-6 paymentMethodBox text-center">
                                <span data-lang="M03613">
                                    <?php echo $translations['M03613'][$language] /*Credit Card*/ ?> 
                                </span>
                                <img src="/images/project/creditCard.png" width="100%">
                            </div>
                        </div>

					    <div class="col-3 registrationBtnPosition d-flex" style="margin-top: 20px;">
					    	<button id="submitBtn" type="button" class="btn btn-primary w-100 py-3" onclick="confirmPayment()" ><?php echo $translations['M00034'][$language]; //NEXT ?></button>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
<div class="col-12 mt-4">
    <form>
        <div id="basicwizard" class="pull-in col-12 px-0">
            <div class="tab-content b-0 m-b-0 p-t-0">
                <div id="alertMsg" class="text-center" style="display: block;"></div>
                <div id="transactionHistoryDiv" class="table-responsive"></div>
                <span id="paginateText"></span>
                <div class="text-center">
                    <ul class="pagination pagination-md" id="pagerList"></ul>
                </div>
            </div>
        </div>
    </form>
</div>
</section>

<div class="modal fade successModal" id="purchaseModal" tabindex="-1" role="dialog" aria-labelledby="confirmParticipationLabel" style="padding-left: 17px; padding-right: 18.9884px; display: none;" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row text-center">
                    <div class="col-12">
                        <img src="images/project/warningIcon.png" alt="" width="65">
                    </div>
                    <div class="col-12" data-lang="M03614">
                        <span class="modal-title">
                            <?php echo $translations['M03614'][$language] /*Purchase Confirmation*/ ?> 
                        </span>
                    </div>
                </div>
                <div class="modalCloseWrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>   
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont px-5 pb-4 pt-2">
                <div class="row">
                    <div class="col-12 text-left padding-none" >
                        <span data-lang="M00050">
                            <?php echo $translations['M00050'][$language] /*Amount*/ ?> 
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-left row" data-lang="M03590">
                        <p id="modalAvail" class="purchaseModalBold"></p>
                        <span class="purchaseModalBold purchaseModalSuffix">USD</span>
                    </div>
                </div>
                
                <div class="row">
                    <div class="partCampModalLabel purchaseModalWarning" data-lang="M03615">
                        <?php echo $translations['M03615'][$language] /*You will be redirect to Simplex website to make payment. Do you want to proceed?*/ ?> 
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            	<button id="confirmParticipationBtn"  type="button" class="btn btn-primary" data-dismiss="modal" onclick="purchaseCrypto()">Ok</button>
            </div>
        </div>
    </div>
</div>

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

    var cryptoType;
    var amount;
    var divId    = 'transactionHistoryDiv';
	var tableId  = 'transactionHistoryTable';
	var pagerId  = 'pagerList';
	var btnArray = {};

    var thArray  = Array(
		'<span data-lang="M00058"><?php echo $translations['M00058'][$language]; //Created At ?></span>',
        '<span data-lang="M03616"><?php echo $translations['M03616'][$language]; //Reference ID ?></span>',
        '<span data-lang="M00107"><?php echo $translations['M00107'][$language]; //Status ?></span>',
        '<span data-lang="M03617"><?php echo $translations['M03617'][$language]; //Wallet Option ?></span>',
        '<span data-lang="M03618"><?php echo $translations['M03618'][$language]; //Flat Symbol ?></span>',
        '<span data-lang="M03619"><?php echo $translations['M03619'][$language]; //Flat Amount ?></span>',
        '<span data-lang="M03620"><?php echo $translations['M03620'][$language]; //Amount?>(USDT)</span>',
        '<span data-lang="M00109"><?php echo $translations['M00109'][$language]; //Fee ?></span>',
        '<span data-lang="M01009"><?php echo $translations['M01009'][$language]; //Receivable Amount ?>(USDT)</span>',
        '<span data-lang="M03621"><?php echo $translations['M03621'][$language]; //Payment ID ?></span>'
    );

    $(document).ready(function() {
        var formData = {
	        command      : "getCryptoOrderData"
        };
        
        var fCallback = loadCryptoOrderData;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        var formData2 = {
            'command' : "getCryptoOrderPurchaseList"
        };
        var fCallback2 = loadDefaultListing;
        ajaxSend(url, formData2, method, fCallback2, debug, bypassBlocking, bypassLoading, 0);
        
    })

    function loadCryptoOrderData(data,message) {
        cryptoType = data.coin[0].name
        $('#cryptoTitle').html(data.coin[0].display)
    }

    function loadDefaultListing(data,message) {
        console.log(data,'listing')
        var list = data.orderListing;
		var tableNo;
		var grandTotal = data.grandTotal;
		var htmlContent = "";

		if(list){
			var newList = [];
			$.each(list, function(k, v) {
				var rebuildData = {
					created_at 		    : v['created_at'],
					reference_id 		: v['reference_id'],
					status 		        : v['status'],
                    walletOption 		: v['walletOption'],
					fiat_symbol     	: v['fiat_symbol'],
					fiat_amount         : numberThousand(v['fiat_amount'],2),
					amount 		        : numberThousand(v['amount'],2),
                    adminCharged        : numberThousand(v['adminCharged'],3),
                    receivableAmount    : numberThousand(v['receivableAmount'],2),
                    payment_id          : v['payment_id']

				};
				newList.push(rebuildData);
			});
		} 

		buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
		pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId+' th:nth-child(1)').before('<th></th>');
        $('#'+tableId+' td:nth-child(1)').before('<td style="width:30px;"></td>');

        $('#'+tableId).DataTable({
            "paging":   false,
            "ordering": false,
            "info":     false,
            "bFilter": false,
            "language": {
                "zeroRecords": "", 
                "emptyTable": ""
            },
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            buttons: [
            'colvis'
        ],
            columnDefs: [
                { className: 'control', orderable: false, targets: 0 },
                { responsivePriority: 1, targets: 1 },
                { responsivePriority: 2, targets: 2 },
                { responsivePriority: 3, targets: 3 },
            ]
        });
    }

    function confirmPayment() {
        $("input").each(function(){
            $(this).removeClass('is-invalid');
            $('.invalid-feedback').html("");
        });

        amount = $('#amount').val()

        if(amount == "") {
            errorDisplay('quantityError', '<?php echo $translations['E00828'][$language]; /* Invalid Amount */ ?>');
        }else {
            $('#modalAvail').html(amount)
            $('#purchaseModal').modal()
        }
     
    }

    function purchaseCrypto() {
        var formData = {
            command  : "sendCryptoOrderRequest",
            amount : amount,
            coinType : cryptoType ,
        };

        
        fCallback = successRedirect;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    } 

    function successRedirect(data,message) {
        var transaction_token = data['transaction_token'];
        var redirect_url = data['redirect_url'];

        document.cookie = `sessionData=<?php echo json_encode($_SESSION) ; ?>`;

        window.location.href = redirect_url;
    }

</script>
