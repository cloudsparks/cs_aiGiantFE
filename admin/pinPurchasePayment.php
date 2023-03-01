<?php
session_start();


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
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <h4>
                                <?php echo $translations['A00630'][$language]; /* Products */ ?>
                            </h4>
                            <div id="basicwizard" class="pull-in">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="buyProductTableDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="card-box p-b-0">
                            <h4>
                                <?php echo $translations['A00631'][$language]; /* Summary */ ?>
                            </h4>
                            <div id="basicwizard" class="pull-in">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="creditPayTableDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="card-box p-b-0">
                            <h4>
                                <?php echo $translations['A00632'][$language]; /* Wallet */ ?>
                            </h4>
                            <form>
                            <div id="basicwizard" class="pull-in">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="creditTypeWalletTableDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-1 pull-left">
                        <button id="back" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </button>
                    </div>
                    <div class="col-sm-1 pull-right">
                        <button id="next" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00205'][$language]; /* Next */ ?>
                        </button>
                    </div>
                </div>

            </div> <!-- container -->

        </div> <!-- content -->

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
    var divId    = 'buyProductTableDiv';
    var tableId  = 'buyProductTable';
    var btnArray = Array();
    var thArray  = Array(
                            "<?php echo $translations['A00623'][$language]; /* Product Name */ ?>",
                            "<?php echo $translations['A00355'][$language]; /* Unit Price */ ?>",
                            "<?php echo $translations['A00627'][$language]; /* Quantity */ ?>",
                            "<?php echo $translations['A00629'][$language]; /* Total Price */ ?>"
                        );

    // Initialize the arguments for ajaxSend function
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var decimalPlaces  = "<?php echo $_SESSION['decimalPlaces']; ?>";

    var tableNo;
    var message        = "";
    var clientID       = "<?php echo $_POST['clientId']; ?>"

    $(document).ready(function() {
        // if clientID empty return back pinPurchase.php 
        if(!clientID) {
            var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'pinPurchase.php');
            return;
        }

        url                     = 'scripts/reqAdmin.php';
        var productIdList       = <?php echo json_encode($_POST['productIdList']); ?>;
        var clientId            = clientID;
        var productTabledata    = <?php echo json_encode($_POST['buyProductTable']); ?>;

        formData = {

            command         : "checkProductAndGetClientCreditType",
            productIdList   : productIdList,
            clientId        : clientId
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        var divId    = 'buyProductTableDiv';
        var tableId  = 'buyProductTable';
        var btnArray = Array();
        var thArray  = Array(
                                "<?php echo $translations['A00623'][$language]; /* Product Name */ ?>",
                                "<?php echo $translations['A00355'][$language]; /* Unit Price */ ?>",
                                "<?php echo $translations['A00627'][$language]; /* Quantity */ ?>",
                                "<?php echo $translations['A00629'][$language]; /* Total Price */ ?>"
                            );
        populateTable(productTabledata, tableId, divId, thArray, btnArray, message, tableNo);

        $("#back").click(function () {

            $.redirect('pinPurchaseForm.php',{clientId:clientId});
        });

        $("#next").click(function(){

            var wallets         = [];
            var products        = [];
            var totalPayable    = 0;
            var totalPayment    = 0;
            var error           = 0;

            $('#creditTypeWalletTable > tbody tr').each(function(){

                var creditType      = $(this).attr('data-th');
                var paymentAmount   = $(this).children("td:eq(2)").find('input').val();

                if (checkFloatNumber(paymentAmount)) {
                    paymentAmount = parseFloat(paymentAmount);
                    if (paymentAmount && paymentAmount > 0) {

                        var wallet = {
                            creditType: creditType,
                            paymentAmount: paymentAmount
                        };

                        wallets.push(wallet);
                        totalPayment += paymentAmount;
                    }
                }
                else{
                    error = 1;
                }

            });

            if (error === 1) {
                var message = '<?php echo $translations['A00638'][$language]; /* Invalid payment */ ?>';
                showMessage(message, '', '<?php echo $translations['A00638'][$language]; /* Invalid Payment */ ?>', 'exclamation-triangle', '', '');
                return false;
            }

            $.each(productTabledata, function(key, value){
                totalPayable += parseFloat(value['totalPrice']);
            });

            products = productIdList;

            if (totalPayable === totalPayment || totalPayable === 0) {
                var canvasBtnArray = Array('<?php echo $translations['A00350'][$language]; /* Ok */ ?>');
                var message = '<?php echo $translations['A00639'][$language]; /* Confirm the payment */ ?> ?';
                showMessage(message, '', '<?php echo $translations['A00640'][$language]; /* Payment Confirmation */ ?>', 'question-circle', '', canvasBtnArray);
                $('#canvasOkBtn').click(function () {
                    var formData = {
                        command     : 'purchasePin',
                        buyerId     : clientId,
                        wallets     : wallets,
                        products    : products,
                        tPassword   : ""
                    };
                fCallback = loadSuccessful;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                });
            }
            else if (totalPayable > totalPayment){
                var message = '<?php echo $translations['A00641'][$language]; /* Total amount of payment is invalid */ ?>';
                showMessage(message, '', '<?php echo $translations['A00638'][$language]; /* Invalid Payment */ ?>', 'exclamation-triangle', '', '');
            }
            else if (totalPayable < totalPayment){
                var message = '<?php echo $translations['A00643'][$language]; /* Total amount and total payable does not match */ ?>';
                showMessage(message, '', '<?php echo $translations['A00638'][$language]; /* Invalid Payment */ ?>', 'exclamation-triangle', '', '');
            }

        });

    });

    function updateSummary(){

        var creditType  = $(this).parents('td').parent('tr').attr('data-th');
        var amountToPay = $(this).val();
        var grandTotal  = 0;

        if (amountToPay != "" && amountToPay > 0)
            $('#creditPayTable').find('tr#'+creditType).find('td:eq(1)').html(amountToPay);
        else
            $('#creditPayTable').find('tr#'+creditType).find('td:eq(1)').html(0);

        var table = document.getElementById('creditPayTable');
        //to exclude grand total row
        var rowLength = table.rows.length - 1;

        for(var i = 1; i < rowLength; i+=1){
            var value = parseFloat(table.rows[i].cells[1].innerHTML);
            grandTotal += value;
        }
        grandTotal = grandTotal.toFixed(decimalPlaces);

        $('#creditPayTable').find('tr#summaryGrandTotal').find('td:eq(1)').html(grandTotal);

    }

    function loadDefaultListing(data, message) {
        var divId    = 'creditPayTableDiv';
        var tableId  = 'creditPayTable';
        var btnArray = Array();
        var thArray  = Array(
                                "<?php echo $translations['A00267'][$language]; /* Credit Type */ ?>",
                                "<?php echo $translations['A00265'][$language]; /* Value */ ?>"
                            );
        var flag = "";
        populateCreditTypeTable(data, tableId, divId, thArray, message, flag);

        var divId    = 'creditTypeWalletTableDiv';
        var tableId  = 'creditTypeWalletTable';
        var btnArray = Array();
        var thArray  = Array(
                                "<?php echo $translations['A00267'][$language]; /* Credit Type */ ?>",
                                "<?php echo $translations['A00268'][$language]; /* Available Balance */ ?>",
                                "<?php echo $translations['A00211'][$language]; /* Amount To Pay */ ?>"
                            );
        flag = "true";
        populateCreditTypePaymentTable(data, tableId, divId, thArray, message, flag);

    }

    function loadSuccessful(data, message){

        $.redirect("viewInvoice.php", {invoiceId: data});
    }

    function populateTable(data, tableId, divId, thArray, message, tableNo){

        $('#'+divId).find('table#'+tableId).detach();
        $('#'+divId).prev().removeClass('alert-success').html('').hide();

        if(!data){
            $('#'+divId).prev().addClass('alert-success').html('<span>'+message+'</span>').show();
            return;
        }

        $('#'+divId).append('<table id="'+tableId+'" class="table tabel-borderless table-responsive no-footer m-0"></table>');
        $('#'+divId).find('table#'+tableId).append('<thead><tr></tr></thead>');
        $('#'+divId).find('table#'+tableId).append('<tbody></tbody>');

        var objKey;
        objKey = Object.keys(data);

        // Remove this block of code once all listing done changing
        if(thArray.length < 2) {
            thArray = [];
            objKey = Object.keys(data);
            $.each(objKey, function(key, val) {
                thArray.push(val.split('_').join(' '));
            });
        }
        // Till here

        // Loop to insert table headers
        $.each(thArray, function(key, val) {
            $('#'+tableId).find('thead tr').append('<th>'+val+'</th>');
        });

        var j = 0;
        var grandTotal = 0;
        $.each(data, function(key, value){
            $('#'+tableId).find('tbody').append('<tr id='+j+'></tr>');
            $('#'+tableId).find('tr#'+j).attr('data-th', value['id']);
            $.each(value, function (k, v) {

                if (k === "unitPrice" || k === "totalPrice" || k === "quantity")
                    $('#' + tableId).find('tr#' + j).append('<td style="text-align: right">' + v + '</td>');
                else
                    $('#' + tableId).find('tr#' + j).append('<td>' + v + '</td>');

                if (k === "totalPrice")
                    grandTotal += parseFloat(v);
            });

            j++;
        });
        $('#'+tableId).find('tbody').append("<tr id='grandTotal'></tr>");
        $('#' + tableId).find('tr#grandTotal').append('<td></td>');
        $('#' + tableId).find('tr#grandTotal').append('<td></td>');
        $('#' + tableId).find('tr#grandTotal').append('<td><?php echo $translations['A00651'][$language]; /* Grand Total */ ?></td>');
        $('#' + tableId).find('tr#grandTotal').append('<td style="text-align: right">' + grandTotal.toFixed(decimalPlaces) +'</td>');

        if(tableNo) {
            var endRow = tableNo.pageNumber * tableNo.numRecord;
            var startRow = endRow - tableNo.numRecord + 1;
//        $('#'+tableId).find('th:first-child').html('No.');
            var tdRowCount = 1;
            while(startRow <= endRow){
                $('#'+tableId).find('tr:nth-child('+tdRowCount+') td:first-child').html(startRow);
                startRow++;
                tdRowCount++;
            }
        }

        // To initialize the tooltip
        $('[data-toggle="tooltip"]').tooltip();

    }

    function populateCreditTypeTable(data, tableId, divId, thArray, message, flag){

        $('#'+divId).find('table#'+tableId).detach();
        $('#'+divId).prev().removeClass('alert-success').html('').hide();

        if(!data){
            $('#'+divId).prev().addClass('alert-success').html('<span>'+message+'</span>').show();
            return;
        }

        $('#'+divId).append('<table id="'+tableId+'" class="table tabel-borderless table-responsive no-footer m-0"></table>');
        $('#'+divId).find('table#'+tableId).append('<thead><tr></tr></thead>');
        $('#'+divId).find('table#'+tableId).append('<tbody></tbody>');

        var objKey;
        objKey = Object.keys(data);

        // Remove this block of code once all listing done changing
        if(thArray.length < 2) {
            thArray = [];
            objKey = Object.keys(data);
            $.each(objKey, function(key, val) {
                thArray.push(val.split('_').join(' '));
            });
        }
        // Till here

        // Loop to insert table headers
        $.each(thArray, function(key, val) {
            $('#'+tableId).find('thead tr').append('<th>'+val+'</th>');
        });

        $.each(data, function(key, value){

            $('#'+tableId).find('tbody').append('<tr id='+key+'></tr>');
            $('#'+tableId).find('tr#'+key).attr('data-th', key);
            $('#' + tableId).find('tr#' + key).append('<td>' + key + '</td>');

            if (flag === "true"){
                $('#' + tableId).find('tr#' + key).append('<td style="text-align: right">' + value + '</td>');
                $('#' + tableId).find('tr#' + key).append('<td><input type="text" step="0.0001" oninput="limitFloat.call(this)" onkeyup="updateSummary.call(this)"/>');
            }
            else{
                $('#' + tableId).find('tr#' + key).append('<td style="text-align: right">' + 0 + '</td>');
            }

        });

        if (flag !== "true"){
            $('#'+tableId).find('tbody').append("<tr id='summaryGrandTotal'></tr>");
            $('#' + tableId).find('tr#summaryGrandTotal').append('<td><?php echo $translations['A00221'][$language]; /* Total */ ?></td>');
            $('#' + tableId).find('tr#summaryGrandTotal').append('<td style="text-align: right">' + 0 +'</td>');
        }

    }

    function populateCreditTypePaymentTable(data, tableId, divId, thArray, message, flag){

        $('#'+divId).find('table#'+tableId).detach();
        $('#'+divId).prev().removeClass('alert-success').html('').hide();

        if(!data){
            $('#'+divId).prev().addClass('alert-success').html('<span>'+message+'</span>').show();
            return;
        }

        $('#'+divId).append('<table id="'+tableId+'" class="table tabel-borderless table-responsive no-footer m-0"></table>');
        $('#'+divId).find('table#'+tableId).append('<thead><tr></tr></thead>');
        $('#'+divId).find('table#'+tableId).append('<tbody></tbody>');

        var objKey;
        objKey = Object.keys(data);

        // Remove this block of code once all listing done changing
        if(thArray.length < 2) {
            thArray = [];
            objKey = Object.keys(data);
            $.each(objKey, function(key, val) {
                thArray.push(val.split('_').join(' '));
            });
        }
        // Till here

        // Loop to insert table headers
        $.each(thArray, function(key, val) {
            $('#'+tableId).find('thead tr').append('<th>'+val+'</th>');
        });

        $.each(data, function(key, value){
            var min_max_language = "<?php echo $translations['A00729'][$language]; ?>";
            var min_usage = value["payment"]["min_usage"];
            var max_usage = value["payment"]["max_usage"];

            $('#'+tableId).find('tbody').append('<tr id='+key+'></tr>');
            $('#'+tableId).find('tr#'+key).attr('data-th', key);
            $('#' + tableId).find('tr#' + key).append('<td>' + key + '</td>');

            if (flag === "true"){
                $('#' + tableId).find('tr#' + key).append('<td>'+value.balance+'</td>');
                $('#' + tableId).find('tr#' + key).append('<td><input type="text" step="0.0001" oninput="limitFloat.call(this)" onkeyup="updateSummary.call(this)"/><br><span class="text-11">* '+min_max_language.replace("%%min%%", min_usage).replace("%%max%%", max_usage)+'</span>');
            }
            else{
                $('#' + tableId).find('tr#' + key).append('<td style="text-align: right">' + 0 + '</td>');
            }

        });

        if (flag !== "true"){
            $('#'+tableId).find('tbody').append("<tr id='summaryGrandTotal'></tr>");
            $('#' + tableId).find('tr#summaryGrandTotal').append('<td><?php echo $translations['A00221'][$language]; /* Total */ ?></td>');
            $('#' + tableId).find('tr#summaryGrandTotal').append('<td style="text-align: right">' + 0 +'</td>');
        }

    }

</script>
</body>
</html>