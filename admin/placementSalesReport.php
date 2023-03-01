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
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                                <?php echo $translations['A00051'][$language]; /* Search */?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00137'][$language]; /* Date */?>
                                                    </label>
                                                    <div class="input-group input-daterange">
                                                        <input type="text" class="form-control" dataName="date" dataType="dateRange">
                                                        <span class="input-group-addon">
                                                            <?php echo $translations['A00139'][$language]; /* to */?>
                                                        </span>
                                                        <input type="text" class="form-control" dataName="date" dataType="dateRange">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="">
                                                        <?php echo $translations['A00828'][$language]; /* Product */?>
                                                    </label>
                                                    <select id="productNameList" class="form-control" dataName="product" dataType="select">
                                                    </select>
                                                </div>
                                            </form>
                                            <div class="col-xs-12">
                                                <div id="searchBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */?>
                                                </div>
                                                <div id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                    <?php echo $translations['A00053'][$language]; /* Reset */?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="salesReportListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerSalesReportList"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End row -->
                </div><!-- container -->
            </div><!-- content -->
            <?php include("footer.php"); ?>
        </div>
        <!-- End content-page -->
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div><!-- END wrapper -->
    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>
    <script>
        // Initialize all the id in this page
        var divId    = 'salesReportListDiv';
        var tableId  = 'salesReportListTable';
        var pagerId  = 'pagerSalesReportList';
        var btnArray = {};
        var thArray  = Array();
            
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqReport.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1; 

        $(document).ready(function() {

            var formData  = {
                command: 'getSalesPlacementReport',
                pageNumber: pageNumber
            };
            var fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                
            $('#resetBtn').click(function() {
                $("#searchForm")[0].reset();
            });
            
            $('#searchBtn').click(function() {
                pagingCallBack(pageNumber, loadSearch);
            });

            // Initialize date picker
            $('.input-daterange input').each(function() {
                $(this).daterangepicker({
                    singleDatePicker: true,
                    timePicker: false,
                    locale: {
                        format: 'DD/MM/YYYY'
                    }
                });
                $(this).val('');
            });
        });

        function pagingCallBack(pageNumber, fCallback) {
            if(pageNumber > 1) bypassLoading = 1;

            var searchID = 'searchForm';
            var searchData = buildSearchDataByType(searchID);
            var formData   = {
                command     : "getSalesPlacementReport",
                pageNumber  : pageNumber,
                inputData   : searchData
            };
            if(!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        
        function loadDefaultListing(data, message) {
            if(data.productNameList) {
                $('#productNameList').empty();
                $('#productNameList').append('<option value="">'+'<?php echo $translations['A00840'][$language]; /* All */?>'+'</option>');
                $.each(data.productNameList, function(key, val) {
                    $('#productNameList').append('<option value="'+val+'">'+val+'</option>');
                });
            }

            var thArray = ["<?php echo $translations['A00137'][$language]; /* Date */?>", "<?php echo $translations['A00627'][$language]; /* Quantity */?>", "<?php echo $translations['A00844'][$language]; /* Amount */?>"];
            for (i = 0; i < data.secondTableHeader; i++) { 
                thArray.push("<?php echo $translations['A00627'][$language]; /* Quantity */?>", "<?php echo $translations['A00206'][$language]; /* Bonus Value */?>", "<?php echo $translations['A00847'][$language]; /* Amount */?>");
            }
            $.each(data.creditType, function(key, value) {
                thArray.push(value);
            });
            thArray.push("<?php echo $translations['A00848'][$language]; /* Amount */?>");
            
            var tableNo;
            buildTable(data.report, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
            $('#salesReportListTable thead tr:first').before('<tr>'+data.firstTableHeader+'</tr>');

            $('#'+tableId).tableExport({
                headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
                footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
                formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
                filename: 'Sales_Placement_Report', // (id, String), filename for the downloaded file, (default: 'id')
                bootstrap: true, // (Boolean), style buttons using bootstrap, (default: true)
                exportButtons: true, // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
                position: 'bottom', // (top, bottom), position of the caption element relative to table, (default: 'bottom')
                ignoreRows: null, // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
                ignoreCols: null, // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
                trimWhitespace: false // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
            });

            $('button.xlsx').removeClass("btn-default").addClass("btn-primary waves-effect waves-light");
        }
        
        function loadSearch(data, message) {
            loadDefaultListing(data, message);
            $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
            setTimeout(function() {
                $('#searchMsg').removeClass('alert-success').html('').hide(); 
            }, 3000);
        }
    </script>
</body>
</html>