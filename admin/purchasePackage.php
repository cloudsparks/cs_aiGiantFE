<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page  
    
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
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-body">
                                    <form id="getBalForm" role="form">
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Username
                                                    </label>
                                                    <input type="text" class="form-control" id="username" dataName="username" dataType="text">
                                                </div>
                                                <div class="col-sm-1 form-group">
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="col-xs-12">
                                        <button id="getBalBtn" class="btn btn-primary waves-effect waves-light">
                                            Get Balance
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End row -->

                    <!-- Start row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="purchaseForm" role="form" style="display: none;">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-body">
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Product Type
                                                    </label>
                                                    <select class="form-control" id="productType" dataName="productType" dataType="select">
                                                        <?php foreach($_SESSION["reentryType"] as $value){ ?>
                                                            <option value="<?php echo $value['type']; ?>">
                                                                <?php echo $value['display']; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-sm-4 form-group" id="rebateLockSelector" style="display: none;">
                                                    <label class="control-label">
                                                        Rebate Lock
                                                    </label>
                                                    <select class="form-control" id="rebateLock">
                                                        <option value="on">On</option>
                                                        <option value="off">Off</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-4 form-group" id="goldmineLockSelector" style="display: none;">
                                                    <label class="control-label">
                                                        Goldmine Lock
                                                    </label>
                                                    <select class="form-control" id="goldmineLock">
                                                        <option value="on">On</option>
                                                        <option value="off">Off</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-4 form-group contractTypeSelector" style="display: none;">
                                                    <label class="control-label">
                                                        Contract Type (days)
                                                    </label>
                                                    <select class="form-control" id="contractType">
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 form-group contractTypeSelector" style="display: none;">
                                                     <div>
                                                        <span class="text-15">
                                                            Total AUM : <label id="totalAum" class="control-label"></label>
                                                        </span>
                                                    </div>
                                                    <div class="m-t-10">
                                                        <span class="text-15">
                                                            Purchase Limit : <label id="purchaseLimit" class="control-label"></label>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <div class="row" id="appendCredit">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Unit Amount
                                                    </label>
                                                    <div><br></div>
                                                    <input type="text" id="creditUnit" class="form-control" dataName="creditUnit" dataType="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                </div>

                                                
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <div class="row">
                                                <span id="totalAmountError" class="text-danger"></span>
                                                <span id="creditUnitError" class="text-danger"></span>
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <button id="backBtn" class="btn btn-default waves-effect waves-light" type="button">
                                                Back
                                            </button>
                                            <button id="purchaseBtn" class="btn btn-primary waves-effect waves-light" type="button">
                                                Purchase
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End row -->

                    <!-- Start row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="paymentForm" role="form" style="display: none;">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            Purchase Package Confirmation
                                        </h4>
                                    </div>

                                    <div class="panel-body">
                                        <div class="col-sm-12">
                                            <div class="col-sm-4 text-center">
                                                <div class="m-t-rem1 mobileBox">
                                                    <span>
                                                        Sponsor ID
                                                    </span><br>
                                                    <label id="sponsorID" style="color: #059607;"></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 text-center mobileBorderLess" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                                                <div class="m-t-rem1 mobileBox">    
                                                    <span>
                                                        Sponsor Name
                                                    </span><br>
                                                    <label id="sponsorName" style="color: #059607;"></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <div class="m-t-rem1 mobileBox">    
                                                    <span>
                                                        Tier Value
                                                    </span><br>
                                                    <label id="tierValue" style="color: #059607;"></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="col-sm-4 text-center">
                                                <div class="m-t-rem1 mobileBox">
                                                    <span>
                                                        Bonus Value
                                                    </span><br>
                                                    <label id="bonusValue" style="color: #059607;"></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 text-center mobileBorderLess" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                                                <div class="m-t-rem1 mobileBox">    
                                                    <span>
                                                        Client ID
                                                    </span><br>
                                                    <label id="clientID" style="color: #059607;"></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <div class="m-t-rem1 mobileBox">    
                                                    <span>
                                                        Client Username
                                                    </span><br>
                                                    <label id="clientUsername" style="color: #059607;"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 m-t-rem2 m-b-rem2" style="border-bottom: 1px solid #ddd;"></div>

                                        <div class="col-sm-12"> 
                                            <div class="col-sm-6">
                                                <div class="col-sm-12 m-b-rem2" style="background-color: #f7f7f7;">
                                                    <div class="p-t-rem2 p-b-rem2" style="padding: 10px;">
                                                        <div class="p-t-rem1">  
                                                            <label class="text-16">
                                                                Payment
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
                                                                        Total : 
                                                                    </strong>
                                                                </h4>
                                                            </label>
                                                            <label id="total" step="0.01" maxlength="18"></label>
                                                            <label>
                                                                <h4>
                                                                    <strong>
                                                                        Credit(s)
                                                                     </strong>
                                                                </h4>
                                                            </label>
                                                        </div>
                                                        <span id="totalError" class="customError text-danger pull-right" error="error"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="creditForm" class="col-sm-6"></div>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="col-xs-12">
                                            <button id="confirmBtn" class="btn btn-primary waves-effect waves-light" type="button">
                                                Confirm Purchase
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End row -->

                </div>
                <!-- container -->
            </div>
            <!-- content -->
            <?php include("footer.php"); ?>
        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>
        
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var clientID = "";
    var purchaseData = {};
    var passData;
    // var pageNumber     = 1;

    $(document).ready(function() {

        // var formData = {
        //     'command'   : 'getContractList',
        // };

        // fCallback = loadContract;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#getBalBtn').click(function() {
            var username = $("#username").val();

            var formData = {
                'command'   : 'getAdminPurchaseDetail',
                'username'  : username
            };

            fCallback = loadBalance;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#backBtn').click(function() {
            $("#username").removeAttr('disabled');
            $('#purchaseForm').hide();
            $('#paymentForm').hide();
        });

        $("#productType").change(function() {
            if (this.value == 'nbvr') {
                $('#rebateLockSelector').show();
                $('#goldmineLockSelector').show();
            } else {
                $('#rebateLockSelector').hide();
                $('#goldmineLockSelector').hide();
            }
        });

        $('#purchaseBtn').click(function() {
            var productType = $("#productType").val();

            var creditUnit = $("#creditUnit").val();
            // var purchaseCredit = $("#purchaseCredit").val()?$("#purchaseCredit").val():"0";
            // var cashCredit = $("#cashCredit").val()?$("#cashCredit").val():"0";
            var spendCredit = {};

            $.each($(".creditInp"), function(k,v){
                var creditType = $(v).attr("data-credit");
                var amt = $(v).val();
                amt = amt==""?0:amt;

                spendCredit[creditType] = {amount: amt}
            });

            var formData = {
                command       : 'reentryVerification',
                clientID      : clientID,
                productType   : productType,
                type          : 'credit',
                creditUnit    : creditUnit,
                rebateLock    : rebateLock,
                goldmineLock  : goldmineLock,
                spendCredit   : spendCredit,
                packageID     : packageID
            };

            if (productType == 'nbvr') {
                var rebateLock = $("#rebateLock").val();
                var goldmineLock = $("#goldmineLock").val();

                formData['rebateLock'] = rebateLock;
                formData['goldmineLock'] = goldmineLock;
            } else if (productType == 'contract') {
                var packageID = $("#contractType").val();

                formData['packageID'] = packageID;
            }

            passData = formData;

            fCallback = sendPurchase;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#confirmBtn').click(function() {
            showMessage("Confirm Purchase Package?", 'warning', "Purhcase Package", '', '', ['Confirm']);
            $('#canvasConfirmBtn').click(function() {
                var purchaseCredit = $("#purchaseCredit").val()?$("#purchaseCredit").val():"0";
                var cashCredit = $("#cashCredit").val()?$("#cashCredit").val():"0";

                var formData = passData;
                formData['command'] = "reentryConfirmation";

                fCallback = confirmPurchase;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        });
    });

    function loadBalance(data, message) {
        // var contractSetting = data.contractSetting;
        $("#username").attr('disabled', 'disabled');
        if(data) {
            clientID = data.clientID;
            $('#purchaseForm').show();
            // $('#paymentForm').hide();
            // $('#purchaseCreditBalance').html(data.walletData.purchaseCredit.balance);
            // $('#cashCreditBalance').html(data.walletData.cashCredit.balance);

            if(data['walletData']) {
                $(".creditBlock").remove();
                $.each(data['walletData'], function(k,v){
                // $.each(data['walletData']['credit'], function(k,v){
                    $("#appendCredit").append(`
                        <div class="col-sm-4 form-group creditBlock">
                            <label class="control-label">
                                ${v['creditDisplay']}
                            </label>
                            <div>
                                <span class="text-15">
                                    Balance : <label class="control-label" style="float: right;">${addCormer(v['balance'])}</label>
                                </span><br>
                            </div>
                            <input type="text" class="form-control creditInp" data-credit="${v['creditType']}" />
                        </div>
                    `);
                });
            }

            $(".creditInp").on("input", function(){
                this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
            });
        }

        // $('#totalAum').html(numberThousand(contractSetting[0].maxTotalAUM, 2));
        // $('#purchaseLimit').html(numberThousand(contractSetting[0].purchaseLimit, 2));

        // $("#contractType").change(function() {
        //     if (this.value == 2001) {
        //         $('#totalAum').html(numberThousand(contractSetting[0].maxTotalAUM, 2));
        //         $('#purchaseLimit').html(numberThousand(contractSetting[0].purchaseLimit, 2));
        //     } else if (this.value == 2002) {
        //         $('#totalAum').html(numberThousand(contractSetting[1].maxTotalAUM, 2));
        //         $('#purchaseLimit').html(numberThousand(contractSetting[1].purchaseLimit, 2));
        //     } else if (this.value == 2003) {
        //         $('#totalAum').html(numberThousand(contractSetting[2].maxTotalAUM, 2));
        //         $('#purchaseLimit').html(numberThousand(contractSetting[2].purchaseLimit, 2));
        //     }
        // });
    }
    
    function sendPurchase(data, message) {
        $('#sponsorID').html(data.sponsorID);
        $('#sponsorName').html(data.sponsorName);
        $('#tierValue').html(data.tierValue);
        $('#bonusValue').html(data.bonusValue);
        $('#clientID').html(data.client.clientID);
        $('#clientUsername').html(data.client.username);

        if(data.paymentCredit) {
            $.each(data.paymentCredit, function(key, value) {
                $('#creditForm').append(`
                    <div class="col-sm-12 m-t-rem1" style="padding: 0;">
                        <b class="text-16">${value['creditDisplay']}</b>
                        <div class="m-t-rem1">
                            <span class="text-15">
                                Balance : ${addCommas(Number(value['balance']).toFixed(2))} <b>Unit(s)</b>
                            </span><br>
                        </div>
                        <div class="m-t-rem1 paymentBox" style="background-color: #ebebeb; padding: 10px; width: 80%;">
                            <span>Amount to Pay :</span>
                            <label id="${value['creditType']}Label" class="form-control inputDesign paymentField"></label>
                        </div>
                    </div>
                `);
            });
        }
        

        var totalCredit = 0;
        if(data.invoiceSpendData){
            $.each(data.invoiceSpendData, function(key, value) {
                $('#'+key+'Label').html(addCommas(Number(value['amount']).toFixed(2)));
                $('#creditTypeForm').append(`
                    <tr>
                        <td name="${value['display']}">${value['display']}<br></td>
                        <td align="right">
                            <label id="${key}Amount" step="0.01" maxlength="18">${addCommas(Number(value['paymentAmount']).toFixed(2))}</label>
                        </td>
                    </tr>
                `);
                totalCredit += Number(value['paymentAmount']);
            });
        }
        

        $('#total').html(addCommas(Number(totalCredit).toFixed(2)));
        $('#purchaseForm').hide();
        $('#paymentForm').show();
        
    }

    function confirmPurchase(data, message) {
        showMessage(message, 'success', 'Congratulations', '', 'purchasePackage.php');
    }

    function loadContract (data, message) {
        var contractType = '';
        if (data) {
                $.each(data, function(k, v) {

                contractType += `
                            <option value="${v['maturityDays']['product_id']}">${v['maturityDays']['value']}</option>
                    `

            });
            $('#contractType').html(contractType);

            $("#productType").change(function() {
                if (this.value == 'contract') {
                    $('.contractTypeSelector').show();
                } else {
                    $('.contractTypeSelector').hide();
                }
            });

        } else {
            $('.contractTypeSelector').hide();
        }
        

    }

</script>
</body>
</html>