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
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <form id="purchaseForm" role="form">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                From Username
                                                            </label>
                                                            <input type="text" class="form-control" id="fromUsername" readonly="readonly">
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Balance
                                                            </label>
                                                            <input type="text" class="form-control" id="balance" readonly="readonly">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Username
                                                            </label>
                                                            <input type="text" class="form-control" id="username" dataName="username" dataType="text">
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Amount
                                                            </label>
                                                            <input type="text" class="form-control" id="amount" dataName="amount" dataType="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Credit Type
                                                            </label>
                                                            <select class="form-control" id="creditType" dataName="creditType" dataType="select">
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Remark
                                                            </label>
                                                            <input type="text" class="form-control" id="remark" dataName="remark" dataType="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="col-xs-12">
                                                <button id="purchaseBtn" class="btn btn-primary waves-effect waves-light">
                                                    Purchase
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

    // Initialize all the id in this page
/*    var divId    = 'markUpRateDiv';
    var tableId  = 'markUpRateTable';
    var pagerId  = 'pageMarkUpRate';
    var btnArray = {};
    var thArray  = Array(
            'Start Date',
            'Mark Type',
            'Crypto Type',
            'Mark Up Rate',
            'Created At',
            'Created By'
        );*/
        
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var creditData = {};

    $(document).ready(function() {

        var formData = {
            'command'   : 'getPurchaseCreditInfo'
        };

        fCallback = loadData;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0)

        $('#purchaseBtn').click(function() {
            $('.text-danger').text("");

            if($('#username').val() && $('#amount').val()) {
                showMessage("Confirm to purchase credit?", 'warning', "Purchase Credit", '', '', ['Confirm']);
                $('#canvasConfirmBtn').click(function() {

                    var username = $("#username").val();
                    var amount = $("#amount").val();
                    var creditType = $("#creditType").find('option:selected').val();
                    var remark = $("#remark").val();

                    var formData = {
                        'command'       : 'purchaseCredit',
                        'username'      : username,
                        'amount'        : amount,
                        'creditType'    : creditType,
                        'remark'        : remark
                    };

                    fCallback = sendPurchase;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                });
            } else {
                showMessage("Username and/or amount cannot be empty", 'warning', "Invalid input", '', '');
            }
        });
    });

    function loadData(data, message) {
        if(data) {
            $('#fromUsername').attr('value', data.creditData[0].fromUsername);
            $('#balance').attr('value', data.creditData[0].balance);
            creditData = data.creditData;
            var creditType = ``;
            $.each(creditData, function(k, v) {
                creditType += `
                    <option id="${k}" value='${v['name']}'>${v['display']}</option>
                `;
            });
            $('#creditType').html(creditType);
        } else {
            showMessage('', 'warning', 'Error');
        }
    }

    $('#creditType').change(function() {
        var id = $(this).children(":selected").attr("id");
        $('#fromUsername').attr('value', creditData[id].fromUsername)
        $('#balance').attr('value', creditData[id].balance);
    });

    function sendPurchase(data, message) {
        showMessage(message, 'success', 'Congratulations', '', 'purchaseCredit.php');
    }
    
</script>
</body>
</html>