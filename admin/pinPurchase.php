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
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchMember" role="form">
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="" data-th="username">
                                                    <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                </label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="" data-th="name">
                                                    <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                </label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </form>
                                        <div class="col-sm-12">
                                            <button id="searchMemberBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button type="submit" id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                            </button>
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
                                        <div id="memberListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerMemberList"></ul>
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
    var divId    = 'memberListDiv';
    var tableId  = 'memberListTable';
    var pagerId  = 'pagerMemberList';
    var btnArray = {'cart' : '<?php echo $translations['A00618'][$language]; /* Pin purchase */ ?>'};
    var thArray  = Array('<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
                         '<?php echo $translations['A00158'][$language]; /* Username */ ?>',
                         '<?php echo $translations['A00101'][$language]; /* Name */ ?>',
                         '<?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?>',
                         '<?php echo $translations['A00153'][$language]; /* Country */ ?>',
                         '<?php echo $translations['A00104'][$language]; /* Disabled */ ?>',
                         '<?php echo $translations['A00156'][$language]; /* Suspended */ ?>',
                         '<?php echo $translations['A00164'][$language]; /* Freezed */ ?>',
                         '<?php echo $translations['A00113'][$language]; /* Last login */ ?>',
                         '<?php echo $translations['A00112'][$language]; /* Created At */ ?>'
                        );

    // Initialize the arguments for ajaxSend function
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {
        url      = 'scripts/reqClient.php';
        formData = {command : "getMemberList", pageNumber : pageNumber};
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $("#searchMember")[0].reset();
        });

        $('#searchMemberBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
    });

    function loadDefaultListing(data, message) {
        var tableNo;
        buildTable(data.memberList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'cart') {
            var clientId = tableRow.attr('data-th');
            $.redirect("pinPurchaseForm.php",{clientId: clientId});
        }

    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchMember';
        var searchData = buildSearchData(searchId);
        // updateDateRange();
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command   : "getMemberList",
            inputData : searchData,
            pageNumber : pageNumber
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
</body>
</html>