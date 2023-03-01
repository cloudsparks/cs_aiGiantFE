<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("ParticipateCampaign", $_SESSION['blockedRights']['ParticipateCampaign'])){
     header("Location: dashboard");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
    <div class="kt-container">
        <div class="text-center">
            <div class="pageTitle" data-lang='M03580'>
                <span><?php echo $translations['M03580'][$language] /*Participate Campaign*/ ?></span>
            </div>
        </div>

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10">
                    <div class="listingWrapper">
                        <div class="col-12">
                            <div class="row partCampForm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang='M03581'><?php echo $translations['M03581'][$language] /*Total Bid Required */ ?> :</label>
                                        <input id="totalBidRequired" class="form-control partCampInput" type="text" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label data-lang='M03582'><?php echo $translations['M03582'][$language] /*Total Bid Received*/ ?> :</label>
                                        <input id="totalBidReceived" class="form-control partCampInput" type="text"  disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label data-lang='M03583'><?php echo $translations['M03583'][$language] /*Available Amount */ ?> :</label>
                                        <input id="availableAmount" class="form-control partCampInput" type="text" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label data-lang='M03584'><?php echo $translations['M03584'][$language] /*Available Venture Credit Amount */ ?></label>
                                        <input id="availableVentureCreditAmount" class="form-control partCampInput" type="text"  disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang='M03577'><?php echo $translations['M03577'][$language] /*Participating Amount*/ ?> :</label>
                                        <input 
                                            id="participatingAmount" 
                                            class="form-control inputDesign" 
                                            type="number" 
                                            onkeydown="if(event.key==='.'){event.preventDefault();}" 
                                            onpaste="let pasteData = event.clipboardData.getData('text'); if(pasteData){pasteData.replace(/[^0-9]*/g,'');} "
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label data-lang="M00042"><?php echo $translations['M00042'][$language]; //Transaction Password ?></label>
                                        <input id="transactionPassword" class="form-control inputDesign" type="password" >
                                        <i class="far fa-eye eyeIcon3"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-0">
                                <div class="col-xs-2 mr-2" data-lang='M00163'>
                                    <button id="backPartCampBtn" class="btn btn-default" style="width: 100%;" 
                                        data-lang="M00163" onclick="history.back()"><?php echo $translations['M00163'][$language]; //Back ?></button>
                                </div>
                                <div class="col-xs-2 mr-2">
                                    <button onclick="cofirmPayment()" type="button" class="btn btn-primary w-100"
                                         data-toggle="modal" data-target="#successParticipationModal" 
                                         data-lang="M00086"><?php echo $translations['M00086'][$language]; //Confirm ?>
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

<div class="modal fade successModal" id="successParticipation" tabindex="-1" role="dialog" aria-labelledby="successParticipationLabel" style="padding-left: 17px; padding-right: 18.9884px; display: none;" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row text-center">
                    <div class="col-12">
                        <img src="images/project/successIcon.png" alt="" width="65">
                    </div>
                    <div class="col-12" data-lang='M00072'>
                        <span class="modal-title"><?php echo $translations['M00072'][$language] /*Congratulations*/ ?></span>
                    </div>
                </div>
                <div class="modalCloseWrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont p-2" data-lang='M03587'>
                <span><?php echo $translations['M03587'][$language] /*You have participated the campaign successful!*/ ?></span>
            </div>
            <div class="modal-footer">
            	<button id="successParticipationBtn" type="button" class="btn btn-primary" 
                    data-dismiss="modal" data-lang="M00086"><?php echo $translations['M00086'][$language]; //Confirm ?>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade successModal" id="confirmParticipation" tabindex="-1" role="dialog" aria-labelledby="confirmParticipationLabel" style="padding-left: 17px; padding-right: 18.9884px; display: none;" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row text-center">
                    <div class="col-12">
                        <img src="images/project/successIcon.png" alt="" width="65">
                    </div>
                    <div class="col-12" data-lang="M03589">
                        <span class="modal-title"><?php echo $translations['M03589'][$language] /*Participation Confirmation*/ ?></span>
                    </div>
                </div>
                <div class="modalCloseWrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>   
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont px-5 pb-4 pt-2">
                <div class="row">
                    <div class="col-8 partCampModalLabel text-left" data-lang="M03590">
                        <?php echo $translations['M03590'][$language] /*Available Venture Credit Amount */ ?> :
                    </div>
                    <div class="col-4 partCampModalFont text-right" data-lang="M03591">
                        <span id="modalAvail"></span>
                    </div>
                    <div class="col-8 partCampModalLabel text-left" data-lang='A01685'>
                        <?php echo $translations['A01685'][$language] /*Participating Amount*/ ?> :
                    </div>
                    <div class="col-4 partCampModalFont text-right" data-lang="M03592">
                        <span id="modalAmount"></span>
                    </div>
                    <div class="col-8 partCampModalLabel text-left" data-lang="M03593">
                        <?php echo $translations['M03593'][$language] /*Total Venture Credit Balance */ ?> :
                    </div>
                    <div class="col-4 partCampModalFont text-right" data-lang="M03592">
                        <span id="modalBalance"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            	<button id="backParticipationBtn" type="button" class="btn btn-default" 
                    data-dismiss="modal" data-lang="M00163"><?php echo $translations['M00163'][$language]; //Back ?></button>
            	<button id="confirmParticipationBtn" onclick="recofirmPayment()" type="button" class="btn btn-primary"
                 data-dismiss="modal" data-lang="M00086"><?php echo $translations['M00086'][$language]; //Confirm ?></button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>

</body>

</html>

<script>
    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;

    var totalBidRequired = '<?php echo $_POST['totalBidRequired']; ?>';
    var totalBidReceived = '<?php echo $_POST['totalBidReceived']; ?>';
    var availableAmount = '<?php echo $_POST['availableAmount']; ?>';
    var participatingAmount = '<?php echo $_POST['participatingAmount']; ?>';
    var availableVentureCreditAmount = '<?php echo $_POST['userBalance']; ?>';
    var campaignId = '<?php echo $_POST['campaignId']; ?>';
    var amount;
    var balance;

    var btnArr = ['Confirm'];

    $('#confirmPartCampBtn').click(() => {
        if($('#transactionPassword').val()=='') {
            errorDisplay("transactionPassword","Enter Transaction Password");
        }else {
            
        }
        
    });

$(document).ready(function(){
    $('#totalBidRequired').val(numberThousand(totalBidRequired,2))
    $('#totalBidReceived').val(numberThousand(totalBidReceived,2))
    $('#availableAmount').val(numberThousand(availableAmount,2))
    $('#availableVentureCreditAmount').val(numberThousand(availableVentureCreditAmount,2))
});

$("#participatingAmount").on("change keyup paste", function(){
    amount = $('#participatingAmount').val()
    amount = parseInt(amount)
    balance = availableVentureCreditAmount - $('#participatingAmount').val()
    $('#ventureCreditBalances').val(balance)
})

function cofirmPayment() {
    var spendCredit = $('#participatingAmount').val()
    spendCredit = parseInt(spendCredit)
    var transactionPassword = $('#transactionPassword').val()
    var spendWallet = {};
    spendWallet['rewardCredit'] = {amount: spendCredit};

	var formData  = {
	    command: 'enrollCampaign',
		step: 1,
		id: campaignId,
        amount: spendCredit,
        transactionPassword: transactionPassword,
        spendCredit: spendWallet,
        checking: 1,
        check: 1
	};
	var fCallback = showModal;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function recofirmPayment() {
    var spendCredit = $('#participatingAmount').val()
    spendCredit = parseInt(spendCredit)
    var transactionPassword = $('#transactionPassword').val()
    var spendWallet = {};
    spendWallet['rewardCredit'] = {amount: spendCredit};

	var formData  = {
	    command: 'enrollCampaign',
		step: 2,
		id: campaignId,
        amount: spendCredit,
        transactionPassword: transactionPassword,
        spendCredit: spendWallet,
        confirm: 1
	};
	var fCallback = goToSuccess;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function showModal() {
    $('#modalAvail').text(numberThousand(availableVentureCreditAmount,2))
        $('#modalAmount').text(numberThousand(amount,2))
        $('#modalBalance').text(numberThousand(balance,2))
        $('#confirmParticipation').modal('toggle');
}

function goToSuccess(data, message) {
	showMessage(message, 'success', '<?php echo $translations['M00072'][$language]; //Congratulation ?>', '', 'dashboard');
	$('#submitBtn').attr('disabled', false);
}
</script>
