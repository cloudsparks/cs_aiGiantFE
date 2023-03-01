<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="accessDenied.php";</script>';
    else
        $_SESSION['lastVisited'] = $thisPage;
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
                                <!-- <h4 class="header-title m-t-0 m-b-30">Add Pop Up Memo</h4> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="" data-th="">
                                                Set Rank Value
                                            </label>
                                            <form>
                                                <div id="basicwizard1" class="pull-in" style="display: none;">
                                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                                        <div id="listingDiv" class="table-responsive"></div>
                                                        <!-- <span id="paginateText"></span>
                                                        <div class="text-center">
                                                            <ul class="pagination pagination-md" id="listingPager"></ul>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="" data-th="">
                                                Bonus Name
                                            </label>
                                            <select id="selectBonus" class="form-control" width="50%">
                                            </select>
                                        </div>
                                        <form role="form" enctype="multipart/form-data">
                                            <div id="basicwizard" class=" pull-in">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00321'][$language]; /* Excel file */?>
                                                        </label>
                                                        <input id="excel" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required/>
                                                        <span id="nameError" class="text-danger errorSpan"></span>
                                                     <div class="form-group" style="margin-top: 10px;">
                                                    <?php $sampleFormatURL = $config['sampleFormatURL']; ?>
                                                    <b class="text-danger">*</b><a href="<?php echo $sampleFormatURL ?>batchSetRank.xlsx" style="margin-left: 10px">click here to download sample excel format</a>
                                                    </div>
                                                    </div>
                                                    <div id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations['A00323'][$language]; /* Submit */?>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 m-b-20">
                            <div id="submitBtn" class="btn btn-primary waves-effect waves-light">Search</div>
                        </div> -->
                    </div><!-- End row -->
                </div><!-- container -->
            </div><!-- content -->
            <?php include("footer.php"); ?>
        </div><!-- End content-page -->
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>

    <script>
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqUpload.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;

        var divId    = 'listingDiv';
        var tableId  = 'listingTable';
        var pagerId  = 'listingPager';
        var btnArray = {};
        var thArray  = Array (
            'Rank',
            'Value'
            );

        $(document).ready(function() {
            $('#backBtn').click(function() {
                $.redirect('batchSetRank.php');
            });

            var formData = {
                command: 'getBatchSetRankDetail',
            };
            var fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
            $('#submitBtn').click(function() {
                var adjustmentType = $(".adjustmentType:checked").val();
                var selectBonus = $("#selectBonus").val();
                $('.errorSpan').empty();
                var form = new FormData();
                form.append('command', 'adminBatchSetRank');
                form.append ('bonusName', selectBonus);
                form.append('excel', $('#excel')[0].files[0]);

                var fCallback = submitCallback;
                ajaxSend(url, form, method, fCallback, debug, bypassBlocking, bypassLoading, 1);
            });
        });

        function loadDefaultListing(data, message) {

            if(data.bonusRank){
                var html = '';
                $.each(data.bonusRank, function(i, obj){
                    html += `<option value="${obj.name}" selected>${obj.display}</option>`;
                });

                $("#selectBonus").html(html);
            }

            $('#basicwizard1').show();
            var tableNo;
            if (data.rank) {
                var newList = [];
                $.each(data.rank, function (k, v) {
                    var rebuildData = {
                        display: v['display'],
                        value: v['value'],
                    };
                    newList.push(rebuildData);
                });
            }
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            // pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
            
        }
        
        function submitCallback(data, message) {
            showMessage('<?php echo $translations['A00324'][$language]; /* Upload successful. */?>', 'success', '<?php echo $translations['A00325'][$language]; /* Upload File */?>', 'upload', 'batchSetRank.php');
        }
    </script>
</body>
</html>