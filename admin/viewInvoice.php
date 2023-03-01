<?php
session_start();


?>

<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
<div id="wrapper">
    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <a id="invoiceBack" href="invoiceList.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </a>
                    </div><!-- end col -->
                </div>

                <div class="card-box p-b-0">
                    <div class="row">
                        <div class="col-xs-12" style="padding-bottom: 5%">
                            <div class="invoice-title">
                                <h2>
                                    <?php echo $translations['A00279'][$language]; /* Invoice */ ?>
                                </h2>
                                <h4 id="invoiceNumber"></h4>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-xs-4">
                                    <strong>
                                        <?php echo $translations['A00564'][$language]; /* Transaction Date */ ?> :
                                    </strong>
                                    <span id="transactionDate"></span>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <strong>
                                        <?php echo $translations['A00117'][$language]; /* Fullname */ ?> :
                                    </strong>
                                    <span id="fullname"></span>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <strong>
                                        <?php echo $translations['A00102'][$language]; /* Username */ ?> :
                                    </strong>
                                    <span id="username"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <strong>
                                            <?php echo $translations['A00750'][$language]; /* Order summary */ ?>
                                        </strong>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="invoiceListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <strong>
                                            <?php echo $translations['A00212'][$language]; /* Payment */ ?>
                                        </strong>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="paymentListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <strong>
                                            <?php echo $translations['A00571'][$language]; /* Remark */ ?>
                                        </strong>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="pinListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <a id="print" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00753'][$language]; /* Print */ ?>
                        </a>
                    </div><!-- end col -->
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>
</div>
<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>

    var divId    = 'invoiceListDiv';
    var tableId  = 'invoiceListTable';
    var pagerId  = 'pagerInvoiceList';
    var btnArray = {};
    var thArray  = Array(
                            "<?php echo $translations['A00754'][$language]; /* Product Name */ ?>",
                            "<?php echo $translations['A00755'][$language]; /* Unit BV */ ?>",
                            "<?php echo $translations['A00355'][$language]; /* Unit Price */ ?>",
                            "<?php echo $translations['A00627'][$language]; /* Quantity */ ?>",
                            "<?php echo $translations['A00758'][$language]; /* Total BV */ ?>",
                            "<?php echo $translations['A00629'][$language]; /* Total Price */ ?>"
                        );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var offsetSecs     = getOffsetSecs();
    var invoiceId      = "<?php echo $_POST['invoiceId']?>"

    $(document).ready(function() {
        // if invoiceId empty return back invoiceList.php 
        if(!invoiceId) {
            var message  = '<?php echo $translations['A00760'][$language]; /* Invoice does not exist */ ?>';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'invoiceList.php');
            return;
        }

        url       = 'scripts/reqAdmin.php';
        formData  = {
            command     : "getInvoiceDetail",
            invoiceId   : invoiceId
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#print').click(function() {
            window.print();
        });


    });

    function loadDefaultListing(data, message) {
        var tableNo;
        buildTable(data.invoicePageDetail, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        $('#'+tableId).find('tbody').append("<tr id='grandTotal'></tr>");
        $('#' + tableId).find('tr#grandTotal').append('<td></td>');
        $('#' + tableId).find('tr#grandTotal').append('<td></td>');
        $('#' + tableId).find('tr#grandTotal').append('<td></td>');
        $('#' + tableId).find('tr#grandTotal').append('<td></td>');
        $('#' + tableId).find('tr#grandTotal').append('<td><?php echo $translations['A00651'][$language]; /* Grand Total */ ?></td>');
        $('#' + tableId).find('tr#grandTotal').append('<td>' + data.grandTotal +'</td>');

        $("#invoiceNumber").text("<?php echo $translations['A00937'][$language]; /* Invoice number */ ?> # " + data.invoiceNumber);
        $("#transactionDate").text(data.transactionDate);
        $("#fullname").text(data.name);
        $("#username").text(data.username);

        buildTable(data.credit, "paymentListTable", "paymentListDiv", Array("<?php echo $translations['A00267'][$language]; /* Credit Type */ ?>", "<?php echo $translations['A00212'][$language]; /* Payment */ ?>"), {}, message, tableNo);

        if(data.category == 'Pin') 
            buildTable(data.productPin, "pinListTable", "pinListDiv", Array("<?php echo $translations['A00754'][$language]; /* Product Name */ ?>", "<?php echo $translations['A00767'][$language]; /* Pin Code */ ?>"), {}, message, tableNo);

        if(data.category == 'Package')
            buildTable(data.productPin, "pinListTable", "pinListDiv", Array("<?php echo $translations['A00754'][$language]; /* Product Name */ ?>", "<?php echo $translations['A00767'][$language]; /* Pin Code */ ?>"), {}, message, tableNo);

    }
</script>
</body>
</html>