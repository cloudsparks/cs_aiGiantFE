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
                                                <label class="control-label" data-th="paymentType"><?php echo $translations["A00967"][$language]?></label>
                                                <select id="paymentTypeOption" class="form-control" dataName="paymentType" dataType="select">
                                                    <option value="all"><?php echo $translations["A00055"][$language]?></option>
                                                    <!-- <option value="Registration">Registration</option>
                                                    <option value="Purchase Pin">Purchase Pin</option> -->
                                                </select>
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" data-th="status">Status</label>
                                                <select class="form-control" dataName="status" dataType="select">
                                                    <option value="Active"><?php echo $translations["A00372"][$language]?></option>
                                                    <option value="Inactive"><?php echo $translations["A00373"][$language]?></option>
                                                </select>
                                            </div>
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
                            <a href="adminAddPaymentSetting.php" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20"><?php echo $translations["A00989"][$language]?></a>
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="alert" style="display: none;"></div>
                                        <div id="paymentSettingDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerPaymentSetting"></ul>
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
    var divId = 'paymentSettingDiv';
    var tableId = 'paymentSettingTable';
    var pagerId = 'pagerPaymentSetting';
    var btnArray = Array('edit','delete');
    var thArray = Array('ID',
        "<?php echo $translations['A00967'][$language]; /* Payment type*/?>",
        "<?php echo $translations['A00988'][$language]; /* credit */?>",
        "<?php echo $translations['A00989'][$language]; /* min % */?>",
        "<?php echo $translations['A00990'][$language]; /* max % */?>",
        "<?php echo $translations['A00318'][$language]; /* Status */?>"
    );

    var searchId = 'searchForm';
        
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
        var formData = {
            command        : "getPaymentSettingDetails",
            // getActiveRoles : "getActiveRoles",
        };

        fCallback = loadFormDropdown;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        fCallback = loadDefaultListing;
        formData  = {command: 'getPaymentMethodList'};
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
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations["A00114"][$language] /*search successful*/?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getPaymentMethodList",
            pageNumber  : pageNumber,
            inputData   : searchData
        };
            
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        var tableNo;
        buildTable(data.settingList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');
        
        if (btnName == 'edit') {
            var editId = tableRow.attr('data-th');
            $.redirect("adminEditPaymentSetting.php",{id: editId});
        }
        else if (btnName == 'delete') {
            var canvasBtnArray = Array('Ok');
            var message = '<?php echo $translations["A01156"][$language] /*Are you sure you want to delete this payment method?*/?>';
            showMessage(message, '', '<?php echo $translations["A01157"][$language] /*Delete Payment Method*/?>', 'trash', '', canvasBtnArray);
            $('#canvasOkBtn').click(function() {
                var tableColVal = tableRow.attr('data-th');
                var formData = {
                    'command': 'deletePaymentMethod',
                    'deleteData' : tableColVal
                };
                fCallback = loadDelete;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        }
    }

    function loadDelete(data, message) {
        loadDefaultListing(data, message);
        $('#alertMsg').addClass('alert-success').html("<span><?php echo $translations["A01158"][$language] /*Delete succesful*/?></span>").show();
        setTimeout(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function loadFormDropdown(data, message) {
        paymentType = data.paymentType;
        creditData = data.creditData;

        $.each(paymentType, function(key, value) {
            $('select#paymentTypeOption').append('<option value="' + value + '">' + value + '</option>');
        });

        // $.each(creditData, function(key, value) {
        //     $('select#creditOption').append('<option value="' + value + '">' + value + '</option>');
        // });
    }
    
</script>
</body>
</html>
