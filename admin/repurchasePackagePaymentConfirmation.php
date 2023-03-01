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
                                        <?php echo $translations['A00640'][$language]; /* Payment Confirmation*/ ?>
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
                                                <div class="col-sm-4 text-center mobileBorderLess" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                                                    <div class="m-t-rem1 mobileBox">
                                                            <span>
                                                                <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                            </span><br>
                                                        <label id="memberId" style="color: #059607;"></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-center">
                                                    <div class="m-t-rem1 mobileBox">
                                                            <span>
                                                                <?php echo $translations['A00203'][$language]; /* Package */ ?>
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
                                                                <div class="m-t-rem2">
                                                                        <span>
                                                                            <?php echo $translations['A00719'][$language]; /* Package Name */ ?>
                                                                        </span><br>
                                                                    <label id="packageName" style="color: #059607;"></label>
                                                                </div>
                                                                <div class="m-t-rem1">
                                                                        <span>
                                                                            <?php echo $translations['A00218'][$language]; /* Price */ ?>
                                                                        </span><br>
                                                                    <label id="packagePrice" step="0.01" style="color: #059607;"></label>
                                                                </div>
                                                                <div class="m-t-rem1">
                                                                        <span>
                                                                            <?php echo $translations['A00206'][$language]; /* Bonus Value */ ?>
                                                                        </span><br>
                                                                    <label id="packageBonus" style="color: #059607;"></label>
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
                                                                <label id="total" step="0.01" maxlength="18"></label>
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
    var decimalPlaces   = "<?php echo $_SESSION['decimalPlaces']; ?>";
    var packageId       = "<?php echo $_POST['packageId']; ?>";
    var clientId        = "<?php echo $_POST['clientId']; ?>";
    var creditData     = <?php echo json_encode($_POST['creditData']); ?>;

    $(document).ready(function() {
        // if id empty return back reentryPinPackage.php
        if(!clientId && !packageId) {
            var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'reentryPinPackage.php');
            return;
        }

        var formData    = {
            command     :  "getRepurchasePackagePaymentDetailAdmin",
            packageId   :  packageId,
            clientId    :  clientId
        };
        var fCallback = paymentDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        var total = 0;

        if (creditData) {
            $.each(creditData, function (key, value) {
                $('#creditForm').append('<div class="col-sm-12 m-t-rem1" style="padding: 0;"><b class="text-16">' + value['creditType'] + '</b><div class="m-t-rem1"><br><span class="text-11 hidden"><span class="text-danger">*</span>Min Usage: 12,000, Max Usage: 24,000</span></div><div class="m-t-rem1 paymentBox" style="background-color: #ebebeb; padding: 10px; width: 80%;"><span><?php echo $translations["M00370"][$language]; /* Amount to Pay */ ?> :</span><input id="' + value['creditType'] + '" type="text" step="0.01" value=' + value['paymentAmount'] + ' class="form-control paymentInput" readonly placeholder="<?php echo $translations['M00371'][$language]; /* Credit(s) */ ?>" maxlength="18" onkeyup="synCredit(this, this.value)"><span id="' + value['creditType'] + 'Error" class="customError text-danger" error="error"></span></div></div>');

                $('#creditTypeForm').append('<tr><td>' + value['creditType'] + '</td><td align="right"><label id="' + value['creditType'] + '" step="0.01" maxlength="18"></label></td></tr>');
                $('td #' + value['creditType']).text(value['paymentAmount']);

                total = total + parseFloat(value['paymentAmount']);
            });
        }

        $('#total').text(total.toFixed(decimalPlaces));

        $('#nextBtn').click(function() {
            $('.customError').text('');
            var wallets    = [];
            clientId   = clientId;
            packageId  = packageId;
            tPassword  = $('#tPassword').find('input').val();

            var formData   = {
                command    : "reentryPackageAdmin",
                clientId   : clientId,
                packageId  : packageId,
                creditData : creditData,
            };
            var fCallback = redirect;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#backBtn').click(function() {
            $.redirect('repurchasePackagePayment.php', { clientId : clientId, packageId: packageId });
        });
    });

    function paymentDetails(data, message) {
        if(!data) {
            // package not found/ client does not exist
            var message = '<?php echo $translations['A00726'][$language]; /* Package not found/ Client does not exist */ ?>';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'reentryPinPackage.php');
        }

        var balance       = data.balance;
        var resultPackage = data.resultPackage;
        var username      = data.username;
        $('#username').text(username);
        $('#memberId').text(clientId);

        if(resultPackage) {
            $('#pacName').text(resultPackage.name);
            $('#packageName').text(resultPackage.name);
            $('#packagePrice').text(resultPackage.price);
            $('#packageBonus').text(resultPackage.value);
        }
    }

    function synCredit(element, value) {
        var creditBalance = 0;
        if(value)
            creditBalance = parseFloat(value);
        $('td #'+element.id).text(creditBalance.toFixed(decimalPlaces));

        var balance = 0;
        $('#creditForm').find('input').each(function() {
            if($(this).val())
                balance += parseFloat($(this).val());
        });
        $('#total').text(balance.toFixed(decimalPlaces));
    }

    function redirect(data, message) {
        $.redirect('repurchasePackageSuccess.php', {
            clientId     : clientId,
            packageId    : packageId,
            creditData   : creditData,
            invoiceId    : data
        });
    }


</script>
</body>
</html>
