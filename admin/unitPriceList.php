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
                        <div class="card-box">
                            <div id="currentRateDiv"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <a href="addUnitPrice.php" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20">
                                <?php echo $translations['A00353'][$language]; /* Add Unit Price */?>
                            </a>
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="unitPriceListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerUnitPriceList"></ul>
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
    var divId    = 'unitPriceListDiv';
    var tableId  = 'unitPriceListTable';
    var pagerId  = 'pagerUnitPriceList';
    var btnArray = {};
    var thArray  = Array (
        '<?php echo $translations['A00354'][$language]; /* No. */?>',
        '<?php echo $translations['A00355'][$language]; /* Unit Price */?>',
        '<?php echo $translations['A00356'][$language]; /* Created Date */?>',
        'Active Date',
        '<?php echo $translations['A00147'][$language]; /* Done By */?>'
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
        formData  = {command: 'getUnitPriceList'};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);



    });

    function loadDefaultListing(data, message) {

        $('#currentRateDiv').append("<table id='currentRateTable' style='margin-bottom:15px;padding:10px;'></table>");
        $("#currentRateTable").append("<thead>"+
                                        "<tr>"+"<th>"+"Current Rates"+"</th>"+"</tr>"+
                                        "<tr>"+"<th>"+"Type"+ "</th>"+"<th>"+ " "+ "</th>"+"<th>" + "Unit Price" + "</th>"+"</tr>"
                                        +"</thead>");
        for (cnt = 0; cnt < data.currentRate.length; cnt++) {
          $("#currentRateTable").append("<tr>"+"<td>"+data.currentRate[cnt].type+"</td>"+"<td>" + "&nbsp;:&nbsp;"+"</td>" 
           +"<td>" + data.currentRate[cnt].unit_price+"</td>"+"</tr>");
        }

        var tableNo = {pageNumber : data.pageNumber, numRecord : data.numRecord};
        buildTable(data.unitPricePageListing, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }


</script>
</body>
</html>
