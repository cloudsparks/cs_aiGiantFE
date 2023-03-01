<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="accessDenied.php";</script>';
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

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">


                                <a href="bonusSettingsAdd.php" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20">New Bonus</a>


                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="userListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerUserList"></ul>
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
    var divId = 'userListDiv';
    var tableId = 'userListTable';
    var pagerId = 'pagerUserList';
    var btnArray = Array('edit');
    var thArray = Array('ID',
                        'Name',
                        'Bonus Source',
                        'Calculation',
                        'Calculation Start',
                        'Payment',
                        'Payment Start',
                        'Priority',
                        'Allowed Rank Maintain',
                        'Disabled',
                        'Language Code'
                       );
    var searchId = 'searchForm';
        
    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqBonus.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 1;
    var bypassLoading = 0;
    var pageNumber = 1;
    var formData = "";
    var searchData = buildSearchData("adminType");
        
    var fCallback = "";
    $(document).ready(function() {

        fCallback = loadDefaultListing;
        formData = {command: 'getBonusSettingAll'};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        $('#searchBtn').click(function() {
            // updateDateRange();
            pagingCallBack(pageNumber, loadSearch);
        }); 
    });

    function pagingCallBack(pageNumber, fCallback){
            var searchData = buildSearchDataByType(searchId);
            if(pageNumber > 1) bypassLoading = 1;
            
            var formData = {
                command : "getAdmins",
                inputData: searchData,
                searchDate : mySearch,
                pageNumber: pageNumber
            };
            if(!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        var tableNo;
        buildTable(data.bonusSettingList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }
    
    function tableBtnClick(btnId) {
        var btnName = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId = $('#'+btnId).closest('table');
        
        if (btnName == 'edit') {
            var editId = tableRow.attr('data-th');
            var editUrl = 'bonusSettingsEdit.php?id='+editId;
            window.location = editUrl;
        }
        else if (btnName == 'delete') {
            var canvasBtnArray = Array('Ok');
            var message = 'Are you sure you want to delete this admin?';
            showMessage(message, '', 'Delete admin', 'trash', '', canvasBtnArray);
            $('#canvasOkBtn').click(function() {
                var id = tableRow.attr('data-th');
                var formData = {
                    'command': 'deleteAdmin',
                    'id' : id
                };
                fCallback = loadDelete;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        }
    }
   
</script>
</body>
</html>
