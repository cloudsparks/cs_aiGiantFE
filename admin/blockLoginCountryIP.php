<?php
session_start();


?>

<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<div id="wrapper">
    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>
    <div class="content-page">
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                                Block
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" id="username">
                                                    <span id="usernameError" class="customError text-danger"></span>
                                                </div>

                                                <div class="col-sm-12 m-t-rem1">
                                                    <button id="searchUsername" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations['A01343'][$language]; /* Check */ ?>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div id="resultSection" class="row" style="display: none;">
                    <div class="col-lg-12">
                        
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <form>
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="withdrawalListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerWithdrawalList"></ul>
                                            </div>
                                        </form>

                                        <!----------------- Multi select html ---------------->
                                    <!-- <div style="margin-top: 10px; margin-bottom: 10px">
                                        <span>
                                            <?php echo $translations['A00571'][$language]; /* Remark */ ?> : 
                                        </span>
                                        <input id="remark" type="form-control">
                                    </div> -->

                                    <span>
                                        <?php echo $translations['A00663'][$language]; /* With selected */ ?> : 
                                    </span>
                                    <div id="selectionDiv" style="display: inline-block; margin-left: 5px; width: 150px">
                                        <select id="statusSelect" class="m-l-rem1 form-control" dataName="status" dataType="select">
                                            <option value="0">
                                                <?php echo 'Available'; /*Locked*/ ?>
                                            </option>
                                            <option value="1">
                                                 <?php echo 'Blocked'; /*Unlocked*/ ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div style="display: inline-block; margin-left:20px;">
                                        <button type="" id="updateBtn" class="btn btn-primary waves-effect waves-light" style="width: 100px">
                                            <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                        </button>
                                    </div>
                                         
                                    </div>

                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>
</div>
<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>
    // Initialize all the id in this page
    var divId    = 'withdrawalListDiv';
    var tableId  = 'withdrawalListTable';
    var pagerId  = 'pagerWithdrawalList';
    var btnArray = {};
   var thArray  = Array(
        "check",//checkbox
        "Country Name",
        "Availability"
    );
    var searchId = 'searchWithdrawal';
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

        var searchID = 'searchWithdrawal';
        var searchData = buildSearchDataByType(searchID);

        /*fCallback = loadDefaultListing;
        formData  = {command: 'getBlockMemberLoginByCountryIPandTree', inputData : searchData};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);*/

        $("#searchUsername").click(function(){
            var username = $("#username").val();
            fCallback = loadDefaultListing;
            formData  = {
                command: 'getBlockMemberLoginByCountryIPandTree',
                username: username
            };

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
            
        //reset to default search
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchWithdrawal').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
            $('#searchWithdrawal').find('select').each(function() {
                $(this).val('');
            $("#searchWithdrawal")[0].reset();
            });

            $("#portfolioType").val('freeWithRebate');

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 

        $('#datepicker input').each(function() {
            $(this).datepicker('clearDates');
        });

        $('#updateBtn').click(function() {
            var checkedIDs = [];

            var username = $("#username").val();

            $('#'+tableId).find('.portfolioCheck:checked').each(function() {
                var checkboxID = $(this).val();
                checkedIDs.push(checkboxID);
            });
            // if(checkedIDs.length === 0)
            //     showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            // else {
                var formData   = {
                    command : 'setBlockMemberLoginByCountryIPandTree',
                    username : username,
                    checkedIDs : checkedIDs,
                    status : $('#statusSelect').val()
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            // }
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


    $('.input-daterange input').each(function() {
            $(this).daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY'
                    // format: strToTime();
                }
            });
            $(this).val('');
        });

    //Currently No See All
    $('#seeAllBtn').click(function() {

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getPortfolioListRebateLock',
            inputData   : searchData,
            pageNumber   : 1,
            seeAll   : 1
        };
        // console.log(searchData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }); 

    //Currently No paging
    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getPortfolioListRebateLock",
            pageNumber  : pageNumber,
            inputData   : searchData,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
            
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        console.log(data);
        var tableNo;
        
        if(data) {
            $("#resultSection").fadeIn("fast");
            var newList = [];
            $.each(data, function(k, v) {
                var hasCheck='';
                // if (v.IP_block_login==1){
                //     hasCheck='checked';
                // }

                var checkbox = `<input name='checkbox' class="portfolioCheck" style="display:block; margin: auto;" type='checkbox' ${hasCheck}  value="${v.id}">`;
                
                var rebuildData = {
                    check : checkbox,
                    name : v['name'],
                    availabilityDisplay : v['availabilityDisplay']
                };
                newList.push(rebuildData);
            });
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        }
    }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', '<?php echo $_SERVER['REQUEST_URI'];?>');
    }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
    
   
</script>
</body>
</html>