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
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchWithdrawal" role="form">
                                        
                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="username">
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

                                            <!-- <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    Username Type 
                                                </label>
                                                <div class="form-control" style="border: none">
                                                    <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                    <label for="match">Match</label>

                                                    <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                    <label for="like">Like</label>
                                                </div>
                                            </div> -->

                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="name">
                                                    <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="fullName" dataType="text">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                   <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="memberID" dataType="text">
                                            </div>
                                            
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="">
                                                     <?php echo $translations['A01349'][$language]; /*Main Leader Username*/ ?>
                                                </label>
                                                <input id="mainLeaderUsername" type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                   <?php echo $translations['A01242'][$language]; /* Leader Username */?>
                                                </label>
                                                <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    Ref. No
                                                </label>
                                                <input type="text" class="form-control" dataName="refNo" dataType="text">
                                            </div>
                                              <div class="col-sm-3 form-group" id="datepicker" >
                                                    <label class="control-label" data-th="">
                                                         <?php echo $translations['A00547'][$language]; /* Entry Date */?>
                                                    </label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="entryDate" dataType="dateRange" autocomplete="off">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="entryDate" dataType="dateRange">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="" data-th="status">
                                                        <?php echo $translations['A00318'][$language]; /*status*/ ?>
                                                    </label>
                                                    <select id="status" class="form-control" dataName="rebateWithholdingCredit" dataType="text">
                                                        <option value="">
                                                            <?php echo $translations['A00055'][$language]; /*all*/ ?>
                                                        </option>
                                                        <option value="1">
                                                            <?php echo $translations['C00009'][$language]; /*IBG*/ ?>
                                                        </option>
                                                        <option value="0">
                                                            <?php echo $translations['C00014'][$language]; /*Withholding*/ ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        Product Type
                                                    </label>
                                                    <select id="type" class="form-control" dataName="type" dataType="text">
                                                        <option value="">
                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                        </option>
                                                        <option value="quantum">Quantum Account</option>
                                                        <option value="hedging">Hedging Account</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3 form-group hide">
                                                     <label class="control-label" for="">
                                                            Portfolio Type
                                                     </label>
                                                     <input id="portfolioType" type="text" class="form-control" dataName="portfolioType" dataType="text" value="freeWithRebate">
                                                </div>
                                            </div>
                                        <!-- <div class="col-sm-12 px-0"> -->
                                            <!-- <div class="col-sm-3 form-group">
                                                <label class="control-label" for="">
                                                    Leader Username
                                                </label>
                                                <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                            </div> -->

                                            
                                        <!-- </div> -->
                                        </form>
                                        <div class="col-xs-12">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light"><?php echo $translations['A00051'][$language]; /* Search */ ?></button>
                                            <button type="submit" id="resetBtn" class="btn btn-default waves-effect waves-light"><?php echo $translations['A00053'][$language]; /* reset */ ?></button>
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
                                <div id="basicwizard" class="pull-in" style="display: none">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                          <button type="button" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></button>
                                          <button type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light " style="margin-bottom: 10px;">
                                              <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                                        </button> 
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
                                        <select id="statusSelect" class="m-l-rem1 form-control" dataName="status" dataType="select"><option value="1">
                                                <?php echo $translations['C00009'][$language]; /*IBG*/ ?>
                                            </option>
                                            <option value="0">
                                                <?php echo $translations['C00014'][$language]; /*Withholding*/ ?>
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
                            </form>
                        <!-- </div> -->
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
        "Ref.No",
        "<?php echo $translations['A00148'][$language]; /* Member ID */ ?>",
        "<?php echo $translations['A00102'][$language]; /* Username */ ?>",
        "<?php echo $translations['A00117'][$language]; /* Full Name */ ?>",
        "<?php echo $translations['A01349'][$language]; /*Main Leader Username*/ ?>",
        "<?php echo $translations['A00203'][$language]; /* Package */ ?>",
        "Entry Date",
        "Rebates"
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

        // fCallback = loadDefaultListing;
        // formData  = {command: 'getPortfolioListRebateWithholding', inputData : searchData};
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
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

            $("#type").val("quantum");

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

            $('#'+tableId).find('.portfolioCheck:checked').each(function() {
                var checkboxID = $(this).val();
                checkedIDs.push(checkboxID);
            });
            if(checkedIDs.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            else {
                var formData   = {
                    command : 'updateRebateWithholdingCredit',
                    checkedIDs : checkedIDs,
                    status : $('#statusSelect').val()
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
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

    function seeAllBtn() {
        var searchID = 'searchWithdrawal';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getPortfolioListRebateWithholding',
            inputData   : searchData,
            pageNumber   : 1,
            seeAll   : 1
        };

        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function exportBtn(){
         
          var searchID = 'searchWithdrawal';
          var searchData = buildSearchDataByType(searchID);
            var thArray = Array(
                "Ref.No",
                "Member ID",
                "Username",
                "Full Name",
                "Main Leader Username",
                "Package",
                "Entry Date",
                "Rebates"
                );
            var key  = Array (
               "reference_no",
               "memberID",
                "username",
                "fullname",
                "mainLeaderUsername",
                "product_name",
                "createdAt",
                "rebateWithholdingCredit"
            );
            var formData  = {
                command    : "getPortfolioListRebateWithholding",
                filename   : "rebateLock",
                inputData  : searchData,
                header     : thArray,
                key        : key,
                DataKey    : "portfolioPageListing"
            };
             $.redirect('exportExcel2.php', formData); 
    }


     function seeAllBtn() {
        var searchID = 'searchWithdrawal';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getPortfolioListRebateWithholding',
            inputData   : searchData,
            pageNumber   : 1,
            seeAll   : 1
        };

        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getPortfolioListRebateWithholding",
            pageNumber  : pageNumber,
            inputData   : searchData,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        // console.log(data);
        $('#basicwizard').show();
        var tableNo;
        
        if(data.portfolioPageListing) {
            var newList = [];
            $.each(data.portfolioPageListing, function(k, v) {
                var checkbox = `<input name='checkbox' class="portfolioCheck" type='checkbox' value="${v.portfolioID}">`;
                
                var rebuildData = {
                    check : checkbox,
                    reference_no : v['reference_no'],
                    memberID : v['memberID'],
                    username : v['username'],
                    fullname : v['fullname'],
                    mainLeaderUsername : v['mainLeaderUsername'],
                    product_name : v['product_name'],
                    createdAt : v['createdAt'],
                    rebateWithholdingCredit : v['rebateWithholdingCredit']
                };
                newList.push(rebuildData);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find("td:first-child").css('text-align','center');
        })
    }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'rebateWithholdingCredit.php');
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