<?php
session_start();

// Get current page name
$thisPage = basename($_SERVER['PHP_SELF']);

// Check the session for this page
// if(!isset ($_SESSION['access'][$thisPage]))
//     echo '<script>window.location.href="accessDenied.php";</script>';
// $_SESSION['lastVisited'] = $thisPage;
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
                <!-- Start row -->
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
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="username" dataType="text">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00154'][$language]; /* Referral Username */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="sponsor" dataType="text">
                                            </div>
                                        </form>
                                        <div class="col-xs-12">
                                            <button id="searchMemberBtn" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <!-- Start row -->
                <div class="row">
                    <div class="col-lg-12">
                       <!--  <div class="card-box p-b-0"> -->
                            <form>
                                <div id="basicwizard" class="pull-in" style="display: none">
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
                       <!--  </div> -->
                    </div>
                </div>
                <!-- End row -->
            </div>
            <!-- container -->
        </div>
        <!-- content -->

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
    var btnArray = {};
    var thArray  = Array(
    	'',
        '<?php echo $translations['M00429'][$language]; /* Join At */ ?>',
        '<?php echo $translations['M00178'][$language]; /* Country */ ?>',
        '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        '<?php echo $translations['A00101'][$language]; /* Name */ ?>',
        '<?php echo $translations['A00154'][$language]; /* Referral Username */ ?>'
    );

    // Initialize the arguments for ajaxSend function
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {
        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchMemberBtn").click();
            }
        });
        
        url       = 'scripts/reqClient.php';
       
        // formData  = {command : "getClientRepurchasePackageDetailAdmin", pageNumber : pageNumber};
        // fCallback = loadDefaultListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $("#searchMember")[0].reset();
        });

        $('#searchMemberBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
    });

    function loadDefaultListing(data, message) {
        // console.log(data);
        $('#basicwizard').show();
        var tableNo;
        var clientIdDetail = data.memberList;

         if(clientIdDetail){
            var newList = [];
            $.each(clientIdDetail, function(k,v){

                var btn = `<a data-toggle="tooltip" title="" onclick="tableBtnClick('${v.clientID}')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Cart"><i class="fa fa-cart-arrow-down"></i></a>`;
                
                 var rebuildData ={
                 	btn: btn,
                    createdAt : v['createdAt'],
                    country : v['country'],
                    username : v['username'],
                    name : v['name'],
                    sponsorUsername : v['sponsorUsername']
                };
                newList.push(rebuildData);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        /*if(clientIdDetail) {
            $.each(clientIdDetail, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-clientID', v['clientID']);
            });
        }*/
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function tableBtnClick(id) {
        $.redirect("repurchasePackage.php",{clientID: id});
    }

    function pagingCallBack(pageNumber, fCallback) {
        var searchId   = 'searchMember';
        var searchData = buildSearchDataByType(searchId);
        // updateDateRange();
        if(pageNumber > 1) bypassLoading = 1;

        var formData   = {
            command    : "getMemberList",
            inputData  : searchData,
            pageNumber : pageNumber,
            usernameSearchType : "match"
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
</body>
</html>