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


                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                            <?php echo $translations["A00051"][$language]?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="name" dataType="text">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="username" dataType="text">
                                            </div>
                                           <!--  <div class="col-sm-4 form-group">
                                                <label class="control-label" data-th="paymentType"><?php echo $translations["A00950"][$language]?></label>
                                                <select id="paymentMethodOption" class="form-control" dataName="paymentMethod" dataType="select">
                                                    <option value="all"><?php echo $translations["A00055"][$language]?></option>
                                                </select>
                                            </div> -->
                                        </form>
                                        <div class="col-sm-12">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light"><?php echo $translations["A00051"][$language]?></button>
                                            <button type="submit" id="resetBtn" class="btn btn-default waves-effect waves-light"><?php echo $translations["A00053"][$language]?></button>
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
                            <!-- <a href="adminAddPaymentSetting.php" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20"><?php echo $translations["A00951"][$language]?></a> -->
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                        <div id="paymentMethodDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerPaymentMethod"></ul>
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
    var divId = 'paymentMethodDiv';
    var tableId = 'paymentSettingTable';
    var pagerId = 'pagerPaymentMethod';
    var btnArray = Array('edit');
    var thArray = Array('<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
                         '<?php echo $translations['A00158'][$language]; /* Username */ ?>',
                         '<?php echo $translations['A00101'][$language]; /* Name */ ?>',
                         '<?php echo $translations['A00103'][$language]; /* Email */ ?>',
                         '<?php echo $translations['A00171'][$language]; /* Phone */ ?>',
                         '<?php echo $translations['A00172'][$language]; /* Address */ ?>',
                         '<?php echo $translations['A00520'][$language]; /* Join At */ ?>',
                         '<?php echo $translations['A01150'][$language]; /* Payment Method */ ?>',
    );

    var searchId = 'searchForm';
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqTrade.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";

    $(document).ready(function() {

        formData  = {command: 'getMemberPaymentMethodList', pageNumber : pageNumber};
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        //reset to default search
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input').each(function() {
               $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
            $("#searchForm")[0].reset();
            });

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 
    });

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search successful.</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getMemberPaymentMethodList",
            pageNumber  : pageNumber,
            inputData   : searchData
        };
            
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var tableNo;
        buildTable(data.clientList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }


    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');
        
        if (btnName == 'edit') {
            var clientId = tableRow.attr('data-th');
            $.redirect("adminEditTrdPaymentMethod.php",{id: clientId});
        }
        else if (btnName == 'delete') {
            var canvasBtnArray = Array('Ok');
            var message = 'Are you sure you want to delete all payment method?';
            showMessage(message, '', 'Delete Trade Payment Method', 'trash', '', canvasBtnArray);
            $('#canvasOkBtn').click(function() {
                var tableColVal = tableRow.attr('data-th');
                var formData = {
                    'command': 'deleteTrdPaymentMethod',
                    'deleteData' : tableColVal
                };
                fCallback = loadDelete;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        }
    }

    function loadDelete(data, message) {
        loadDefaultListing(data, message);
        $('#alertMsg').addClass('alert-success').html("<span>Delete successful.</span>").show();
        setTimeout(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

</script>
</body>
</html>
