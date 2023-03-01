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
                                                <!-- <div class="col-sm-4 form-group hide typeText">
                                                    <label class="control-label" for="" data-th="">
                                                        <?php echo $translations['A00301'][$language]; /* Type */?>
                                                    </label>
                                                    <input id="" type="text" class="form-control" dataName="type" dataType="text" value="adminBatchRegistration">
                                                </div> -->

                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="">
                                                        <?php echo $translations['A00301'][$language]; /* Type */?>
                                                    </label>
                                                    <input id="" type="text" class="form-control" dataName="type" dataType="text" value="">
                                                </div>

                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00112'][$language]; /* Created At */?>
                                                    </label>
                                                    <div class="input-group input-daterange">
                                                        <input type="text" class="form-control" dataName="createdAt" dataType="dateRange">
                                                        <span class="input-group-addon">
                                                            <?php echo $translations['A00139'][$language]; /* to */?>
                                                        </span>
                                                        <input type="text" class="form-control" dataName="createdAt" dataType="dateRange">
                                                    </div>
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
                                <div id="upload" class="btn btn-primary waves-effect waves-light m-b-20">
                                    <?php echo $translations['A00304'][$language]; /* Upload */?>
                                </div>
                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="importListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerImportList"></ul>
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
        var divId    = 'importListDiv';
        var tableId  = 'importListTable';
        var pagerId  = 'pagerImportList';
        var btnArray = Array('view');
        var thArray  = Array (
            '<?php echo $translations['A00106'][$language]; /* ID */?>',
            '<?php echo $translations['A00306'][$language]; /* Type */?>',
            '<?php echo $translations['A00307'][$language]; /* File Name */?>',
            '<?php echo $translations['A00308'][$language]; /* Upload By */?>',
            '<?php echo $translations['A00309'][$language]; /* Total Records */?>',
            '<?php echo $translations['A00310'][$language]; /* Total Processed */?>',
            '<?php echo $translations['A00311'][$language]; /* Total Failed */?>',
            '<?php echo $translations['A00112'][$language]; /* Created At */?>'
        );
            
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqUpload.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1; 

        $(document).ready(function() {
            var formData  = {command: 'getImportData', type: 'adminBatchAddWaterBucket', pageNumber: pageNumber};
            var fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                
            $('#resetBtn').click(function() {
                $("#searchForm")[0].reset();
            });
            
            $('#searchBtn').click(function() {
                pagingCallBack(pageNumber, loadSearch);
            });

            $('#upload').click(function() {
                $.redirect("addBatchWaterBucket.php");
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

            // $("#searchBtn").trigger("click");
        });

        function pagingCallBack(pageNumber, fCallback){
                if(pageNumber > 1) bypassLoading = 1;

                var searchID = 'searchForm';
                var searchData = buildSearchDataByType(searchID);
                var formData   = {
                    command     : "getImportData",
                    pageNumber  : pageNumber,
                    type: 'adminBatchAddWaterBucket',
                    inputData   : searchData
                };
                if(!fCallback)
                    fCallback = loadDefaultListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                $("#typeText").empty();
        }
        
        function loadDefaultListing(data, message) {
            // console.log(data);
            var tableNo;
            buildTable(data.importList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        }
        
        function tableBtnClick(btnId) {
            var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
            var tableRow = $('#'+btnId).parent('td').parent('tr');
            var id = tableRow.attr('data-th');

            if(btnName == "view") {
                $.redirect("batchWaterBucketDetail.php", {id: id});
            }
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