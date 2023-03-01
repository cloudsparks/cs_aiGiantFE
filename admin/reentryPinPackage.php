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
                                        <form id="searchForm" role="form">
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="username" dataType="text">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="name" dataType="text">
                                            </div>
                                        </form>
                                        <div class="col-xs-12">
                                            <button id="searchBtn" class="btn btn-primary waves-effect waves-light">
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
                        <div class="card-box p-b-0">
                            <form>
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="listingDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="listingPager"></ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
    var url      = 'scripts/reqClient.php';
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = Array('edit');
    var thArray  = Array(
                         // '',
                         '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
                         '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
                         '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
                         '<?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?>',
                         // '<?php echo $translations['A01242'][$language]; /* Leader Username */?>',
                         '<?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>',
                         '<?php echo $translations['A00153'][$language]; /* Country */ ?>',
                         // '<?php echo $translations['A01241'][$language]; /* Star Status */?>',
                         '<?php echo $translations['A00104'][$language]; /* Disabled */ ?>',
                         '<?php echo $translations['A00156'][$language]; /* Suspended */ ?>',
                         '<?php echo $translations['A00164'][$language]; /* Freezed */ ?>',
                          // 'MT4 Account No',
                         '<?php echo $translations['A00113'][$language]; /* Last Login */ ?>',
                         '<?php echo $translations['A01350'][$language]; /* Last Login IP Address */ ?>',
                         '<?php echo $translations['A00112'][$language]; /* Created At */ ?>'
                         /*
                         '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
                         '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
                         '<?php echo $translations['A00101'][$language]; /* Name */ ?>',
                         '<?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?>',
                         '<?php echo $translations['A00153'][$language]; /* Country */ ?>',
                         '<?php echo $translations['A00104'][$language]; /* Disabled */ ?>',
                         '<?php echo $translations['A00156'][$language]; /* Suspended */ ?>',
                         '<?php echo $translations['A00164'][$language]; /* Freezed */ ?>',
                         '<?php echo $translations['A00113'][$language]; /* Last login */ ?>',
                         '<?php echo $translations['A00112'][$language]; /* Created At */ ?>'*/
                        );

    // Initialize the arguments for ajaxSend function
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {
        
        formData  = {command : "getMemberList", pageNumber : pageNumber};
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $("#searchForm")[0].reset();
        });

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
    });

    function loadDefaultListing(data, message) {
        var tableNo;

        var memberList = data.memberList;
        
        if(data != "" && memberList.length>0) {
            var newList = [];
            var j = 0;

            $.each(memberList, function(k, v) {
                

                var rebuildData = {
                    clientID : v['clientID'],
                    // button : "",
                    member_id : v['member_id'],
                    username : v['username'],
                    name : v['name'],
                    sponsorUsername : v['sponsorUsername'],
                    mainLeaderUsername : v['mainLeaderUsername'],
                    country : v['country'],
                    // clientRank: v['clientRank'],
                    disabled: v['disabled'],                    
                    suspended : v['suspended'],
                    freezed : v['freezed'],
                    // quantumAcc : v['quantumAcc'],
                    lastLogin : v['lastLogin'],
                    lastLoginIp : v['lastLoginIp'],
                    createdAt : v['createdAt']
                };
                ++j;
                newList.push(rebuildData);
            });
        }
        // unset(data.memberList.clientRank);
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('tr').each(function(){
            $(':eq(12)',this).remove().insertBefore($(':eq(0)',this));
        });

        if(memberList) {
            $.each(memberList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-id', v['clientID']);
            });      
        }
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

        if (btnName == 'edit') {
            var clientId = tableRow.attr('data-th');
            $.redirect("repurchasePin.php",{clientId: clientId});
        }
    }

    function pagingCallBack(pageNumber, fCallback) {
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        // updateDateRange();
        if(pageNumber > 1) bypassLoading = 1;

        var formData   = {
            command    : "getMemberList",
            inputData  : searchData,
            pageNumber : pageNumber
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
</body>
</html>