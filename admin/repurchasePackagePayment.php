<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    // $_SESSION['lastVisited'] = $thisPage;
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include("topbar.php"); ?>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <!-- Start container -->
                <div class="container">
                    <!-- Start row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <?php echo $translations['A00212'][$language]; /* Payment */ ?>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-4 text-center">
                                                        <div class="m-t-rem1 mobileBox">
                                                            <span>
                                                                <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                            </span><br>
                                                            <label id="username" style="color: #059607;">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-sm-4 text-center mobileBorderLess" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                                                        <div class="m-t-rem1 mobileBox">    
                                                            <span>
                                                                <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                            </span><br>
                                                            <label id="memberId" style="color: #059607;"></label>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-sm-4 text-center">
                                                        <div class="m-t-rem1 mobileBox">    
                                                            <span>
                                                                <?php echo $translations['A00301'][$language]; /* Type */ ?>
                                                            </span><br>
                                                            <label id="pacName" style="color: #059607;"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 m-t-rem2 m-b-rem2" style="border-bottom: 1px solid #ddd;"></div>
                                                <!-- Payment Form Start -->
                                                <div class="col-sm-12"> 
                                                    <!-- div package Details Form End -->
                                                    <div class="col-sm-6">
                                                        <div class="col-sm-12 m-b-rem2" style="background-color: #f7f7f7;">
                                                            <div class="p-t-rem2 p-b-rem2" style="padding: 10px;">
                                                                <span class="repurchasePackagePriceSubject text-16">
                                                                    <strong>
                                                                        <?php echo $translations['A00718'][$language]; /* Package Summary */ ?>
                                                                    </strong>
                                                                </span><br>
                                                                <div class="p-l-rem2">
                                                                    <div class="m-t-rem1">    
                                                                        <span>
                                                                            <?php echo $translations['A00301'][$language]; /* Type */ ?>
                                                                        </span><br>
                                                                        <label id="reentrytType" step="0.01" style="color: #059607;"></label>
                                                                    </div> 
                                                                    <div class="m-t-rem1">    
                                                                        <span>
                                                                            <?php echo $translations['A00218'][$language]; /* Price */ ?>
                                                                        </span><br>
                                                                        <label id="packagePrice" step="0.01" style="color: #059607;"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="p-t-rem3">  
                                                                    <label class="text-16">
                                                                        <?php echo $translations['A00212'][$language]; /* Payment */ ?>
                                                                    </label>
                                                                    <div class="table-responsive">
                                                                        <table class="table mb-none table-borderless" style="border-bottom: 1px solid #163440;">
                                                                            <tbody id="creditTypeForm"></tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div align="right" style="color: #FF7B6A;">
                                                                    <label>
                                                                        <h4>
                                                                            <strong>
                                                                                <?php echo $translations['A00221'][$language]; /* Total */ ?> : 
                                                                            </strong>
                                                                        </h4>
                                                                    </label>
                                                                    <label id="total" step="0.01" maxlength="18" style="font-size: 18px;">0</label>
                                                                    <label>
                                                                        <h4>
                                                                            <strong>
                                                                                <?php echo $translations['A00724'][$language]; /* Credit(s) */ ?>
                                                                            </strong>
                                                                        </h4>
                                                                    </label>
                                                                </div>
                                                                <span id="totalError" class="customError text-danger pull-right" error="error"></span>    
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- div package Details Form End -->
                                                    <!-- div credit Type Form Start -->
                                                    <div id="creditForm" class="col-sm-6"></div>
                                                    <!-- div credit Type Form End -->
                                                </div>
                                                <!-- Payment Form End -->
                                            </form>
                                            <div class="col-xs-12 col-sm-12 m-t-rem3">
                                                <button id="backBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00115'][$language]; /* Back */ ?>
                                                </button>
                                                <button id="nextBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00205'][$language]; /* Next */ ?>
                                                </button>
                                              <!--   <button id="resetBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                                </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->
                </div>
                <!-- End container -->
            </div>
            <!-- End content -->

            <?php include("footer.php"); ?>

        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>

    <div class="modal stick-up" id="confirmationPurchasePackage" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="pg-close fs-14"></i>
                    </button>
                    <h3>
                       <?php echo $translations['M00667'][$language]; /* Payment Confirmation */ ?>
                   </h3>
               </div>
               <div class="modal-body">
                 <div class="pull-in row">
                    <!-- Package Details div Start -->
                    <div class="col-lg-12">
                        <div id="packageDiv" class="col-lg-12">
                         <!--    <hr> -->
                         <!--    <h4>
                                <?php echo $translations['M00376'][$language]; /* Package */ ?>
                            </h4> -->
                            <div class="col-lg-12 px-0">
                                <div class="m-t-rem1">
                                    <span>
                                        <?php echo $translations['M00377'][$language]; /* Name */ ?>
                                    </span><br>
                                    <div class="col-lg-12 px-0">
                                        <label id="pacNameModal" style="color: #059607;"></label>
                                    </div>
                                </div>
                            </div>
                           <!--  <div class="col-lg-12 px-0">
                                <div class="m-t-rem1">
                                    <span>
                                        <?php echo $translations['M00378'][$language]; /* Price */ ?>
                                    </span><br>
                                    <div class="col-lg-12 px-0">
                                        <label id="pacPrice" style="color: #059607;"></label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-lg-12 px-0">
                                <div class="m-t-rem1">
                                    <span>
                                        <?php echo $translations['M00379'][$language]; /* Value */ ?> (USD)
                                    </span><br>
                                    <div class="col-lg-12 px-0">
                                        <label id="pacValue" style="color: #059607;"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Package Details div End -->
                    <!-- Payment Details div Start -->
                    <!-- <div class="col-lg-12 px-0">
                        <div id="packageDiv" class="col-lg-12">
                            <hr>
                            <label>
                                <?php echo $translations['M00380'][$language]; /* Payment */ ?>
                            </label>
                            <div id="payment" class="col-lg-12 px-0 table-responsive">
                                <table id="paymentTable" class="table tabel-borderless no-footer m-0" step="0.01">
                                    
                                </table>
                            </div>
                        </div>
                    </div> -->
                    <!-- Payment Details div End -->
                </div>
            </div>
            <div class="modal-footer">
                <button id="confirmButton" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                    <span>
                        <?php echo $translations["M00565"][$language]; /* Confirm */ ?>
                    </span>
                </button>
                <button type="button" class="btn btn-default btn-cons no-margin inline" data-dismiss="modal">
                    <?php echo $translations["M00566"][$language]; /* Cancel */ ?>
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<div id="storeLiveRateDIV" class="hide">
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>

    // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqClient.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var clientID        = "<?php echo $_POST['clientID']; ?>";
        var invesmentAmount = "<?php echo $_POST['invesmentAmount'] ?>";
        var callbackData = JSON.parse('<?php echo $_POST['callbackData'] ?>');
        var portfolioType = callbackData['portfolioType'];
        // alert(packageName);
        // alert(portfolioTypeDisplay);
        // alert(portfolioType);
        // alert(packageId);
        // alert(clientID);

        $(document).ready(function() {
            // $('#confirmationPurchasePackage').modal('show');
            // if id empty return back reentryPinPackage.php 
            if(!clientID) {
                var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
                showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'reentryPackageListing.php');
                return;
            }

            /*var formData    = {
                command     :  "getRepurchasePackagePaymentDetailAdmin",
                packageId   :  packageId,
                clientID    :  clientID,
                reentryAmount : reentryAmount
            };
            var fCallback = paymentDetails;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);*/

            loadDefaultData(callbackData);

            $('#nextBtn').click(function() {
                verifyPayment();
            });

            $('#confirmButton').click(function() {
                confirmationModal();
            });

            $('#backBtn').click(function() {
                $.redirect('repurchasePackage.php', { clientID : clientID });
            });
        });

        function loadDefaultData(data) {
            console.log(data);
            if(!data) {
                // package not found/ client does not exist
                var message = '<?php echo $translations['A00726'][$language]; /* Package not found/ Client does not exist */ ?>';
                showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'reentryPinPackage.php');
            }

            if(portfolioType == "NBVR Registration"){
            	reentryType = "Purchase Pre-order scheme NBVR";
        	}else if(portfolioType == "NBV Registration"){
        		reentryType = "Purchase Pre-order scheme NBV";
        	}else{
        		reentryType = "<?php echo $translations['M02009'][$language];?>";
        	}

            $('#reentrytType').html(reentryType);
            // var creditData = data.creditData;
            var paymentData = data.paymentSetting.paymentData;
            // var coinRate = data.liveRate.data.rate;
            // var balance       = data.balance;
            // var resultPackage = data.resultPackage;
            var username      = data.client.username;
            var packagePrice = addCormer(data.paymentSetting.totalPrice);
            $('#username').text(username);
            $('#memberId').text(clientID);

            $("#pacName").text(reentryType);
            $("#packagePrice").text(packagePrice);

            if(paymentData) {
                var c = "";
                $.each(paymentData, function(k,v) {   
                 var creditType = v.creditDisplay;

                    c += `
                        <div class="col-sm-12 m-t-rem1" style="padding: 0;">
                            <b class="text-16">${v.creditDisplay}</b>

                            <div class="m-t-rem1">
                                <span class="text-15">(Balance : <b></b>${addCormer(parseFloat(v.balance).toFixed(2))}<b> Credit(s)</b>)</span><br>
                            </div>

                            <div class="m-t-rem1 paymentBox" style="background-color: #ebebeb; padding: 10px; width: 80%;">
                                <span>Amount to Pay :</span>
                                <input id="${v.creditType}" type="text" step="0.01" class="form-control paymentInput" placeholder="Credit(s)" maxlength="18">
                                <span id="unitCreditError" class="customError text-danger" error="error"></span>
                            </div>
                        </div>
                    `;
                });

                $("#creditForm").html(c);

            }

            $('.paymentInput').on('input', function (event) {

                this.value = this.value.match(/^[0-9]+\.?[0-9]*/);
                var dataCredit = $(this).attr("id");

                var totalAmt = 0;
                $.each($(".paymentInput"), function(k,v){
                    var amount = $(v).val();
                    amount = parseFloat(amount || 0);

                    totalAmt += amount;
                });
                
                var totalAmount = addCormer(parseFloat(totalAmt).toFixed(2));
                $("#total").text(totalAmount);

             });
        }

        function verifyPayment() {
            var creditData = {};

            $.each($(".paymentInput"), function(k,v){
                var type = $(v).attr('id');
                var amount = $(v).val();

                if(amount != 0) {
                    creditData[type] = {
                        amount: amount
                    };
                }
            });

            var formData    = {
                command     :  "reentryPackageValidate",
                invesmentAmount: invesmentAmount,
                clientID: clientID,
                step:2,
                portfolioType:portfolioType,
                creditData: creditData
            };
            var fCallback = loadVerifyStepTwo;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function loadVerifyStepTwo(data, message) {
        	var totalPrice = addCormer(data.paymentSetting.totalPrice);
            $("#pacNameModal").text(data.product.name);
            $("#pacValue").text(totalPrice);
            $("#confirmationPurchasePackage").modal('show');
        }

        function confirmationModal() {
            var creditData = {};

            $.each($(".paymentInput"), function(k,v){
                var type = $(v).attr('id');
                var amount = $(v).val();

                if(amount != 0) {
                    creditData[type] = {
                        amount: amount
                    };
                }
            });

            var formData    = {
                command     :  "reentryPackage",
                invesmentAmount: invesmentAmount,
                clientID: clientID,
                portfolioType:portfolioType,
                creditData: creditData
            };
            var fCallback = loadConfimationSuccess;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function loadConfimationSuccess(data, message) {
            $("#repurchaseConfirmationModal").modal('hide');
            showMessage(message, 'success', 'Congratulations', 'success', 'reentryPackageListing.php');
        }


</script>
</body>
</html>
