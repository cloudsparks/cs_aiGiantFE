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
                <!-- container -->
                <div class="container">
                    <!-- Start row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <form id="registrationSuccessForm" role="form">
                                                <div class="pull-in row">
                                                    <div class="p-l-rem2 p-r-rem2">
                                                        <h3>
                                                            <?php echo $translations['A00250'][$language]; /* Confirmation */ ?>
                                                        </h3>
                                                    </div>
                                                    <div class="col-sm-12" id="congratulations" style="display: block; padding-left: 20px; padding-right: 20px;" align="center">
                                                        <div class="alert alert-success">
                                                            <strong>
                                                                <?php echo $translations['A00732'][$language]; /* Congratulations! */ ?>
                                                            </strong>
                                                            <span class="m-l-rem1">
                                                                <?php echo $translations['A00733'][$language]; /* Your purchase package are successful! */ ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!-- Package Details div Start -->
                                                    <div class="col-lg-12 p-t-rem1 p-l-rem3">
                                                        <div id="packageDiv" class="col-lg-12 m-t-rem1">
                                                            <hr>
                                                            <label>
                                                                <?php echo $translations['A00203'][$language]; /* Package */ ?>
                                                            </label>
                                                            <div class="col-lg-12">
                                                                <div class="m-t-rem1">    
                                                                    <span>
                                                                        <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                                    </span><br>
                                                                    <div class="col-lg-12">
                                                                        <label id="pacName" style="color: #059607;"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="m-t-rem1">    
                                                                    <span>
                                                                        <?php echo $translations['A00218'][$language]; /* Price */ ?>
                                                                    </span><br>
                                                                    <div class="col-lg-12">
                                                                        <label id="pacPrice" style="color: #059607;"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="m-t-rem1">    
                                                                    <span>
                                                                        <?php echo $translations['A00265'][$language]; /* Value */ ?>
                                                                    </span><br>
                                                                    <div class="col-lg-12">
                                                                        <label id="pacValue" style="color: #059607;"></label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Package Details div End -->
                                                    <!-- Payment Details div Start -->
                                                    <div class="col-lg-12 p-t-rem1 p-l-rem3">
                                                        <div id="packageDiv" class="col-lg-12 m-t-rem1">
                                                            <hr>
                                                            <label>
                                                                <?php echo $translations['A00212'][$language]; /* Payment */ ?>
                                                            </label>
                                                            <div id="payment" class="col-lg-12">
                                                                <table id="paymentTable" class="table tabel-borderless table-responsive no-footer m-0" step="0.01">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>
                                                                                <?php echo $translations['A00267'][$language]; /* Credit Type */ ?>
                                                                            </th>
                                                                            <th>
                                                                                <?php echo $translations['A00268'][$language]; /* Available Balance */ ?>
                                                                            </th>
                                                                            <th>
                                                                                <?php echo $translations['A00741'][$language]; /* Amount To Pay */ ?>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Payment Details div End -->
                                                </div>
                                            </form>
                                            <div class="col-xs-12 col-sm-12">
                                                <button id="nextBtn" class="btn btn-default waves-effect w-md waves-light m-b-20 m-t-rem3">
                                                    <?php echo $translations['A00742'][$language]; /* Close */ ?>
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
        var url            = 'scripts/reqClient.php';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;

        var decimalPlaces  = "<?php echo $_SESSION['decimalPlaces']; ?>";
        var clientId       = "<?php echo $_POST['clientId']; ?>";
        var packageId      = "<?php echo $_POST['packageId']; ?>";
        var invoiceid      = "<?php echo $_POST['invoiceId']; ?>";
        var creditData     = <?php echo json_encode($_POST['creditData']); ?>;

    $(document).ready(function() {
        var formData  = {
            command   : "getRepurchasePackageSuccessDetailAdmin",
            clientId  : clientId,
            packageId : packageId,
        };
        var fCallback = registerDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#nextBtn').click(function() {
            $.redirect("viewInvoice.php", {invoiceId: invoiceid});
        });
    });

    function registerDetails(data, message) {
        if(!data) {
            // package not found/ client does not exist
            var message = '<?php echo $translations['A00726'][$language]; /* Package not found/ Client does not exist */ ?>';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'reentryPinPackage.php');
        }

        var result = data.result;
        var credit = data.credit;
        if(result) {
                    $('#pacName').text(result.name);
                    $('#pacPrice').text(result.price);
                    $('#pacValue').text(result.value);
        }

        if(credit) {
            var paymentMethod = new FormData();
            var paidBy = {};
            $.each(creditData, function() {
                paidBy[this.creditType] = parseFloat(this.paymentAmount).toFixed(decimalPlaces);
            });
            $.each(credit, function(key, value) {
                var paid = paidBy[value['name']] ? paidBy[value['name']] : "0";

                $('#paymentTable').append("<tr><td>" +value["name"]+ "</td><td align='right' step='0.01'>" +value["value"]+ "</td><td align='right' step='0.01'>" +paid+ "</td></tr>");
            });
        }
    }


</script>
</body>
</html>