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
                    <!-- Back button -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div id="backBtn" class="btn btn-primary waves-effect waves-light m-b-20">
                                <?php echo $translations['A00115'][$language]; /* Back */?>
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
        var btnArray = {};
        var thArray  = Array (
            '<?php echo $translations['A00102'][$language]; /* Username */?>',
            '<?php echo $translations['A00117'][$language]; /* Full Name */?>',
            '<?php echo $translations['A00153'][$language]; /* Country */?>',
            '<?php echo $translations['A01340'][$language]; /* Dialing Area */?>',
            '<?php echo $translations['A01196'][$language]; /* Phone */?>',
            '<?php echo $translations['A00103'][$language]; /* Email */?>',
            '<?php echo $translations['A00120'][$language]; /* Password */?>',
            // 'Check Password',
            // 'Transaction Password',
            // 'Check Transaction Password',
            '<?php echo $translations['M01651'][$language]; /* Sponsor Username */?>',
            '<?php echo $translations['A00833'][$language]; /* Amount */?>',
            '<?php echo $translations['A00318'][$language]; /* Status */?>',
            '<?php echo $translations['A00319'][$language]; /* Error Message */?>'
        );
        var searchId = 'searchForm';
            
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqUpload.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1;

        $(document).ready(function() {
            var id = "<?php echo $_POST['id']; ?>";
            // if id empty return back massChangePassword.php             
            if(!id) {
                var message  = '<?php echo $translations['A00320'][$language]; /* Client does not exist */?>';
                showMessage(message, '', 'Error', 'exclamation-triangle', 'quantumBatchRegistration.php');
                return;
            }

            var formData  = {command : 'getImportDataDetails', id : id};
            var fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#backBtn').click(function() {
                $.redirect('quantumBatchRegistration.php');
            });
        });

        function loadDefaultListing(data, message) {
            console.log(data);
            var newData = [];
            var importDetailsList = data.importDetailsList;

            if(importDetailsList) {
                $.each(importDetailsList, function(i, obj){
                    var rebuild = {
                        username: obj.username,
                        fullName: obj.fullName,
                        country: obj.country,
                        dialingArea: obj.dialingArea,
                        phone: obj.phone,
                        email: obj.email,
                        password: obj.password,
                        // checkPassword: obj.checkPassword,
                        // tPassword: obj.tPassword,
                        // checkTPassword: obj.checkTPassword,
                        sponsorName: obj.sponsorName,
                        amount: obj.amount,
                        status: obj.status,
                        error_message: obj.error_message
                    };

                    newData.push(rebuild);
                });
            }

            var tableNo;
            buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        }

        function pagingCallBack(pageNumber, fCallback){
                if(pageNumber > 1) bypassLoading = 1;

                var searchData = buildSearchData(searchId);
                var formData   = {
                    command     : "getImportData",
                    pageNumber  : pageNumber,
                    inputData   : searchData,
                };
                if(!fCallback)
                    fCallback = loadDefaultListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    </script>
</body>
</html>