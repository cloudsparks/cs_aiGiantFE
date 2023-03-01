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
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="exchangeRateListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerExchangeRateList"></ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End row -->

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
    var divId    = 'exchangeRateListDiv';
    var tableId  = 'exchangeRateListTable';
    var pagerId  = 'pagerExchangeRateList';
    // var btnArray = {};
    var btnArray = Array("update");
    var thArray  = Array (
        '<?php echo $translations['A00364'][$language]; /* No. */?>',
        '<?php echo $translations['A00365'][$language]; /* Currency Country */?>',
        '<?php echo $translations['A00366'][$language]; /* Currency Code */?>',
        '<?php echo $translations['A01206'][$language]; /* Exchange Rate */?>',
        '<?php echo $translations['A01207'][$language]; /* Buy Rate */?>',
        // '<?php echo $translations['A00153'][$language]; /* Country */?>',
    );

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";

    $(document).ready(function() {

        fCallback = loadDefaultListing;
        formData  = {command: 'getExchangeRateList', pageNumber: pageNumber};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    });

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'update') {
            var exchangeRate    = tableRow.find('input#exchangeRate').val();
            var buyRate         = tableRow.find('input#buyRate').val();
            var exchangeRateId  = tableRow.attr('data-th');
            formData  = {
                command         : 'editExchangeRate',
                countryID       : exchangeRateId,
                exchangeRate    : exchangeRate,
                buyRate         : buyRate
            };
            fCallback = sendEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }
    }

    function loadDefaultListing(data, message) {
        var tableNo = {pageNumber : data.pageNumber, numRecord : data.numRecord};
        buildTable(data.exchangeRatePageListing, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#exchangeRateListTable > tbody > tr').each(function(index, value) {
            var exchangeRateCell = $('td:eq(3)', this);
            var buyRateCell = $('td:eq(4)', this);
            var exchangeRate = exchangeRateCell.text();
            var buyRate = buyRateCell.text();
            // exchangeRateCell.text('').append($('<input />',{'value' : exchangeRate, 'id': "exchangeRate", 'disabled' : 'disabled'}));
            exchangeRateCell.text('').append($('<input />',{'value' : exchangeRate, 'id': "exchangeRate"}));
            buyRateCell.text('').append($('<input />',{'value' : buyRate, 'id': "buyRate"}));
        });
    }
    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command: 'getExchangeRateList',
            pageNumber: pageNumber
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    function sendEdit(data, message) {
        showMessage(message, 'success', '<?php echo $translations['A00368'][$language]; /* Successfully updated exchange rate */?>', 'retweet', 'exchangeRateList.php');
    }


</script>
</body>
</html>
