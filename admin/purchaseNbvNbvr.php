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
                                                        <?php echo $translations['A00102'][$language] //Username ?>
                                                    </label>
                                                    <input type="text" class="form-control" id="username" dataName="username" dataType="text">
                                                </div>
                                                <div class="col-sm-1 form-group">
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="col-xs-12">
                                        <button id="getDataBtn" class="btn btn-primary waves-effect waves-light">
                                            <?php echo $translations['A01760'][$language] //Get Data ?>
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
                                                        <?php echo $translations['A00819'][$language] //Type ?>
                                                    </label>
                                                    <select class="form-control" id="productType" dataName="productType" dataType="select">
                                                        <option value="nbv">
                                                            NBV
                                                        </option>
                                                        <option value="nbvr">
                                                            NBVR
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00630'][$language] //Products ?>
                                                            </label>
                                                            <select class="form-control" id="productSelect" dataName="productSelect" dataType="select"></select>
                                                            <span id="productError" class="text-danger"></span>
                                                        </div>                                                        
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <div class="checkbox checkbox-primary" style="padding-left: 40px!important;">
                                                                <input type="checkbox" id="gvVoucher">
                                                                    <label><?php echo $translations['M03631'][$language] //Give voucher ?></label>
                                                                </input>
                                                            </div>  
                                                        </div>                                                        
                                                    </div>
                                                </div>

                                                <!-- <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A01761'][$language] //Total Investment ?>
                                                            </label>
                                                            <input type="text" id="creditUnit" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                            <span id="totalAmountError" class="text-danger"></span>
                                                            <span id="creditUnitError" class="text-danger"></span>
                                                        </div>                                                        
                                                    </div>
                                                </div> -->

                                                <!-- <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Matching AUM
                                                            </label>
                                                            <input type="text" id="matchingAum" disabled class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                        </div>                                                        
                                                    </div>
                                                </div> -->

                                                <!-- <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                               Total AUM
                                                            </label>
                                                            <input type="text" id="totalAum" disabled class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                        </div>                                                        
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <button id="purchaseBtn" class="btn btn-primary waves-effect waves-light" type="button">
                                                <?php echo $translations['A01258'][$language] //Purchase ?>
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

    <div class="modal fade" id="confirmModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <h4 class="modal-title">
                        <?php $translations['A01762'][$language] //Purchase Confirmation ?>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="alert">
                        <?php echo $translations['A01763'][$language] //Are you sure to purchase?>?
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="canvasCloseBtn" type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                    <button id="confirmBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
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
    var clientID;
    let productID;
    let gvVoucher;
    // var pageNumber     = 1;

    $(document).ready(function() {

        $('#getDataBtn').click(function() {
            var username = $("#username").val();

            var formData = {
                'command'   : 'getAdminPurchaseDetail',
                'username'  : username
            };

            fCallback = loadData;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        // $('#creditUnit').on('input', function() {
        //     var creditUnit = $('#creditUnit').val();
        //     $('#matchingAum').val(creditUnit);
        //     var matchingAum = $('#matchingAum').val();

        //     $('#totalAum').val(creditUnit * 2);
        // });

        $('#purchaseBtn').click(function() {

            // var creditUnit = $("#creditUnit").val();
            gvVoucher = $('#gvVoucher')[0].checked === true ? 1 : 0;

            // if (creditUnit == "" || creditUnit <= 0) {
                // $('#totalAmountError').show();
            // } else {
                $('#confirmModal').modal('show');
            // }
        });

        $('#confirmBtn').click(function() {
            var productType = $("#productType").val();
            // var creditUnit = $("#creditUnit").val();
            var productID = $("#productSelect").val();
            var username = $("#username").val();

            var formData = {
                command       : 'reentryConfirmation',
                clientID      : clientID,
                productType   : productType,
                productID    : productID,
                // creditUnit    : creditUnit,
                type          : "package",
                gvVoucher     : gvVoucher,
            };

            passData = formData;

            fCallback = confirmPurchase;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function loadData(data, message) {

        if (data.productList) {
            let productSelect = '';

            $.each(data.productList, function(k, v) {
                productSelect += `
                    <option value="${v['id']}">
                        ${v['display'] || v['name']}
                    </option>
                `;
            });

            $('#productSelect').html(productSelect);
        }

        $('#purchaseForm').show();
        $("#username").attr('disabled', 'disabled');

        clientID = data.clientID;
    }

    function confirmPurchase(data, message) {
        showMessage(message, 'success', 'Congratulations', '', 'purchaseNbvNbvr.php');
    }

</script>
</body>
</html>
