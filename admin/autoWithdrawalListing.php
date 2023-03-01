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
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchMember" role="form">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                            </label>
                                                            
                                                            <span class="pull-right">
                                                                <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                                <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                                <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                                <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                            </span>
                                                            <input type="text" class="form-control" dataName="username" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="name" dataType="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                            </label>
                                                            <select id="countryName" class="form-control" dataName="countryName" dataType="text">
                                                                <option value="">
                                                                    <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                                        </div>
                                                    </div>
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

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <div class="card-box p-b-0"> -->
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display:none">
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
                            <!-- </div> -->
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
    var btnArray = {};
    var thArray  = Array('',
                         '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
                         '<?php echo $translations['A00158'][$language]; /* Username */ ?>',
                         '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
                         '<?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?>',
                         '<?php echo $translations['A00153'][$language]; /* Country */ ?>',
                         '<?php echo $translations['A01441'][$language]; /* Default Auto Withdrawal */ ?>',
                         '<?php echo $translations['A01442'][$language]; /* Information */ ?>');

    // Initialize the arguments for ajaxSend function
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var defaultSetting = [];
    var information    = [];

    $(document).ready(function() {
        url       = 'scripts/reqClient.php';
        // formData  = {command : "getMemberList", pageNumber : pageNumber};
        // fCallback = loadDefaultListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $("#searchMember")[0].reset();
        });
        
        $('#searchMemberBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
    });

    //  $('#searchMember').keypress(function(e){
    //         if(e.which == 13){//Enter key pressed
    //             $('#searchMemberBtn').click();//Trigger enter button click event
    //         }
    // });
    

    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard').show();
        loadCountryDropdown(data.countryList);
        var tableNo;
        var memberList = data.memberList;
        
        if(data != "" && memberList.length>0) {
            var newList = [];
            var j = 0;

            $.each(memberList, function(k, v) {

            if (v['name'] == ""){
                v['name'] = "-";
            }

            if (v['mainLeaderUsername'] == "") {
                v['mainLeaderUsername'] = "-";
            }

            if (v['lastLoginIp'] == "") {
                v['lastLoginIp'] = "-";
            }   

            defaultSetting[v['clientID']] = v['defaultWithdrawal'];
            information[v['clientID']]    = v['withdrawalInfo'];

                var rebuildData = {
                    // id : v['clientID'],
                    button : "",
                    member_id : v['member_id'],
                    username : v['username'],
                    name : v['name'],
                    sponsorUsername : v['sponsorUsername'],
                    // mainLeaderUsername : v['mainLeaderUsername'],
                    country : v['country'],
                    defaultWithdrawal : v['defaultWithdrawal'],
                    withdrawalInfo : v['withdrawalInfo'],
                    // clientRank: v['clientRank'],
                    // disabled: v['disabled'],                    
                    // suspended : v['suspended'],
                    // freezed : v['freezed'],
                    // quantumAcc : v['quantumAcc'],
                    // lastLogin : v['lastLogin'],
                    // lastLoginIp : v['lastLoginIp'],
                };
                ++j;
                newList.push(rebuildData);
            });
        }
        console.log(defaultSetting);

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

       if(memberList) {
            $.each(memberList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-id', v['clientID']);
            });      
        }

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find("td:eq(0)").html('<a data-toggle="tooltip" title="" id="edit'+this.id+'" onclick="tableBtnClick(this.id)" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit" aria-describedby="" style="margin:0px 4px 0px 4px"><span><?php echo $translations['A00249'][$language]; ?></span></a>');

             $(this).find('td:first-child').css('text-align','center');
        });
        
    }

    function loadCountryDropdown(data) {
        if(data) {
            $.each(data, function(key, val) {
                $('#countryName').append('<option value="' +val['id']+ '">' +val['name']+ '</option>');
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
        var tableId = $('#'+btnId).closest('table');
        var id = tableRow.attr('data-id');
        var id = tableRow.attr('data-id');

        if(defaultSetting[id] == 'crypto'){
            var withdrawType = translations['A01440'][language];
        }else if(defaultSetting[id] == 'bank'){
            var withdrawType = translations['A00606'][language];
        }
        
        var info = information[id];

        if(btnName == 'edit') {
            $.redirect("adminSetAutoWithdrawal.php", {id : id, withdrawType : withdrawType, info : info});
        }
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchMember';
        var searchData = buildSearchDataByType(searchId);
        // updateDateRange();
        if(pageNumber > 1) bypassLoading = 1;
            
        var formData = {
            command   : "getMemberList",
            inputData : searchData,
            // tsLoginFrom    : tsLoginFrom,
            // tsLoginTo      : tsLoginTo,
            // tsActivityFrom : tsActivityFrom,
            // tsActivityTo   : tsActivityTo,
            pageType   : 'autoWithdrawal',
            pageNumber : pageNumber,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
</body>
</html>