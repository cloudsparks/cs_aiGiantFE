<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    /*if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="accessDenied.php";</script>';
    $_SESSION['lastVisited'] = $thisPage;*/
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
                                            <form id="searchForm" role="form">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A01109'][$language]; /* Name */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                </div>
                                                
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="">
                                                        Main Leader Username
                                                    </label>
                                                    <input id="mainLeaderUsername" type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                                </div> -->

                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                    </label>
                                                    <select id="country" class="form-control" dataName="country" dataType="select"></select>
                                                </div>
                                            </form>

                                            <!-- <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    Type
                                                </label>
                                                <select id="type" class="form-control">
                                                    <option value="leaderUsername">Leader Username</option>
                                                    <option value="mainLeaderUsername">Main Leader Username</option>
                                                </select>
                                            </div> -->

                                            <!-- <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00819'][$language]; /* Name */ ?>
                                                </label>
                                                <select class="form-control" id="lineType">
                                                    <option value="downline"><?php echo $translations['A00518'][$language]; /* Downlines */ ?></option>
                                                    <option value="upline">Uplines</option>
                                                </select>
                                            </div> -->

                                            <div class="col-sm-12 m-t-rem1">
                                                <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                                </button>
                                                <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
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
                            <button type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;"><?php echo $translations['A01191'][$language]; /* See All */ ?></button>                          
                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="bonusListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerBonusList"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <button type="button" id="nextBtn" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">
                                    <?php echo $translations['A00205'][$language]; /* Next */ ?>
                                </button> 
                            </div>
                        </div>
                    </div><!-- End row -->

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
    var divId    = 'bonusListDiv';
    var tableId  = 'bonusListTable';
    var pagerId  = 'pagerBonusList';
    var btnArray = {};
    var thArray  = Array(
        '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
        '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        '<?php echo $translations['A00101'][$language]; /* Name */ ?>',
        // "Main Leader Username",
        '<?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?>',
        '<?php echo $translations['A00153'][$language]; /* Country */ ?>',
        '<?php echo $translations['A00113'][$language]; /* Last login */ ?>',
        '<?php echo $translations['A00112'][$language]; /* Created At */ ?>',
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
        
        fCallback = loadDefaultListing;
        formData  = {command: 'leaderLockAccount', step: 1};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        fCallback = loadCountry;
        formData  = {command: 'getCountriesList'};
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

        $('#datepicker input').each(function() {
            $(this).datepicker('clearDates');
        });

        $("#nextBtn").click(function(){
            var searchData = buildSearchDataByType(searchId);

            $.redirect('addLeaderLockAccount.php', {
                inputData   : JSON.stringify(searchData),
                // filterOutLeaderUsername : $("#filterOutLeaderUsername").val(),
                type : $("#type").val(),
            });
        });
    });

    $('#dateRangeStart').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });

    function loadCountry(data, message) {
        console.log(data);

        var countryList = data.countriesList;
        if(countryList) {
            var countryHtml = `<option value=""><?php echo $translations['A00055'][$language]; /*all*/ ?></option>`;
            $.each(countryList, function(key) {
              countryHtml += `<option value="${countryList[key]['id']}">${countryList[key]['name']}</option>`;
            });

            $('#country').html(countryHtml);
        }
    }

    $('input').keypress(function(e){
         if(e.which == 13){//Enter key pressed
             $('#searchBtn').click();//Trigger enter button click event
         }
    });

    $(function() {
        $("form").submit(function() { return false; });
    });

    function seeAllBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'leaderLockAccount',
            inputData   : searchData,
            pageNumber   : 1,
            seeAll   : 1,
            step: 1
        };

        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "leaderLockAccount",
            inputData   : searchData,
            // filterOutLeaderUsername : $("#filterOutLeaderUsername").val(),
            type : $("#type").val(),
            pageNumber : pageNumber,
            step: 1
        };

        console.log(formData);
            
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        console.log(data);
        var newList = [];
        if(data.memberList && data!="") {
            $("#nextBtn").show();
            $.each(data.memberList, function(k, v){
                var rebuildData = {
                    'memberID' : v['member_id'],
                    'username' : v['username'],
                    'name'     : v['name'],
                    // 'mainLeaderUsername'  : v['mainLeaderUsername'],
                    'sponsorName' : v['sponsorUsername'],
                    'country' : v['country'],
                    'lastLogin' : v['lastLogin'],
                    'createdAt' : v['createdAt']
                };
                newList.push(rebuildData);
            });
        } else {
            $('#alertMsg').addClass('alert-success').html("<span>No Result Found.</span>").show();
            $("#nextBtn").hide();
        }

        var tableNo;
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
    
   
</script>
<input type="hidden" id="detectSeeAll" value="0">
</body>
</html>
