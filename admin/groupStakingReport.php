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
                                            <div id="searchForm" role="form">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="username" dataType="text">
                                                </div>

                                                <!-- <div class="col-sm-4 form-group" id="datepicker" >
                                                    <label class="control-label" data-th=""><?php echo $translations['A00564'][$language]; /* Created at */ ?></label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="transactionDateRange" dataType="dateRange">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="transactionDateRange" dataType="dateRange">
                                                    </div>
                                                </div> -->
                                            </div>
                                            <!-- hidden -->
                                            <!-- <form id="adminType" role="form" style="display:none;">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="name">Admin Type</label>
                                                    <input type="text" class="form-control" value="Admin">
                                                </div>
                                            </form> -->

                                            <div class="col-xs-12 m-t-rem1">
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
                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="stakeReportListDiv" class="table-responsive">

                                            </div>
                                            <span id="paginateText"></span>
                                        </div>
                                    </div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pagerStakeReportList"></ul>
                                    </div>
                                </form>
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
    // var divId    = 'stakeReportListDiv';
    // var tableId  = 'stakeReportListTable';
    // var pagerId  = 'pagerStakeReportList';
    // var btnArray = {};    
    // var thArray  = Array('',
    //                      'Category',
    //                      'Stake Amount',
    //                     );

    var searchId = 'searchForm';
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAgent.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    $(document).ready(function() {

        fCallback = loadDefaultListing;
        formData  = {command: 'getGroupStakingReport', pageNumber: pageNumber};
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

       
        // $('#searchForm').keypress(function(e){
        //     if(e.which == 13){//Enter key pressed
        //         $('#searchBtn').click();//Trigger enter button click event
        //     }
        // });


        $('#add').click(function() {
            var paidOutData = {};
            var balanceData = {};
            var agentID = $("#agentID").val();

            $("input[name=paidOut]").each(function(){
                paidOutData[$(this).attr("id")] = $(this).val();
            });

            $("input[name=balance]").each(function(){
                balanceData[$(this).attr("id")] = $(this).val();
            });
            
            var formData = {
                command  : "updateAgentSummary",
                agentID  : agentID,
                paidOutData : paidOutData,
                balanceData : balanceData,
            };

            var fCallback = saveSummary;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
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

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getGroupStakingReport",
            pageNumber  : pageNumber,
            inputData   : searchData
        };

        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        console.log(data);
        var tableNo;
        var stakeList = data.stakeList;

        var j = 0;

        $("#stakeReportListDiv").empty();
        
        $.each(stakeList, function(k, v) {
            var totalStake = 0;
            var appendString = "";
            var appendSubString = "";
            var expandable = "";
            var str = translations['A01184'][language];
            
            if(v['totalStake']){
                totalStake = v['totalStake'];
            }

            if(v['dayLeftStake']){
                var i = 0;

                $.each(v['dayLeftStake'], function(key, value){

                    appendSubString += '<ul id="navListStakeSubView"><i id="subVerticalArrow'+i+'" class="m-r-10 fa fa-chevron-right" targetid="" onclick="expandSubView('+j+', '+i+', '+value['dayLeft']+')"></i><label class="targetVertical" id="">'+str.replace('%%dayRange%%', value['dayLeft'])+'</label>&nbsp -- &nbsp<strong>'+value['amount']+'</strong><br><div id="subDetails'+value["dayLeft"]+'" class="table-responsive" style="display:none;"></div></ul>';

                    ++i;
                });

            }else{
                appendSubString += 'No Result';
            }

            // // build sub data
            if(v['expandable'] > 0){
                expandable += '<i id="mainVerticalArrow'+j+'" class="m-r-10 fa fa-chevron-right" targetid="" onclick="expandMainView('+j+')"></i>';
            }

            appendString += '<ul id="navListStakeMainView">'+expandable+'<label class="targetVertical" id="mainList" for="group-1">'+str.replace('%%dayRange%%', k)+'</label>&nbsp -- &nbsp<strong>'+totalStake+'</strong><div id="subData'+j+'" style="display:none;">'+appendSubString+'</div></ul><hr>';

           
            $("#stakeReportListDiv").append(appendString);


            if(v['details']){
                
               
                $.each(v['details'], function(subKey, subValue){
                    // build sub details table
                    var count = 1;
                    var newSubList = [];
                    var divId, tableId, pagerId;
                    var btnArray = {};    
                    var thArray  = Array('No',
                                         'Username',
                                         'Leader Username',
                                         'Stake Amount',
                                         'Transaction Date'
                                        );

                    $.each(subValue, function(dataKey, dataValue){
                        divId    = 'subDetails'+dataValue['dayLeft'];
                        tableId  = 'subDetailsTable'+dataValue['dayLeft'];
                        pagerId  = 'pagerSubDetailsList'+dataValue['dayLeft'];
                        var rebuildSubData = {
                            count : count,
                            username : dataValue['username'],
                            mainLeaderUsername : dataValue['mainLeaderUsername'],
                            stakeAmount : dataValue['stakeAmount'],
                            date : dataValue['transactionDate']
                        };
                        ++count;
                        newSubList.push(rebuildSubData);
                    });

                    buildTable(newSubList, tableId, divId, thArray, btnArray, message, subKey);
                    // pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
                    $('#'+tableId).each(function() {
                        // console.log(this);
                        var username = $(this).find("tbody tr td:eq(1)").text(); 
                        var mainLeaderUsername = $(this).find("tbody tr td:eq(2)").text(); 
                        // console.log(username+" - " + mainLeaderUsername);
                        if (username == mainLeaderUsername){
                            // console.log(tableId+" - " + username);
                            // $(this).find('thead tr th:nth-child(3), tbody tr td:eq(2)').addClass('hide');
                            $(this).find('tbody tr td:eq(2)').text('-');
                        }   
                     });
                });
            }

            ++j;

        });

        // buildTable(mainList, tableId, divId, thArray, btnArray, message, tableNo);


        // // build OUT summary table
        // if(data != "" && outSummary.length>0) {
        //     var newOutList = [];
        //     var j = 0;
        //     $.each(outSummary, function(k, v) {

        //         var rebuildOutData = {
        //             currency : v['creditType'],
        //             fundIn : v['fundIn'],
        //             trade : v['trade'],
        //             admin : v['admin'],
        //             total : v['totalAmount'],
        //         };
        //         ++j;
        //         newOutList.push(rebuildOutData);
        //     });

        //     buildTable(newOutList, tableOutId, divOutId, thArrayOut, btnArray, message, tableNo2);
        // }

        // // build OUT summary table
        // if(data != "" && nettSummary.length>0) {
        //     var newNettList = [];
        //     var j = 0;
        //     $.each(nettSummary, function(k, v) {

        //         var rebuildNettData = {
        //             currency : v['creditType'],
        //             nett : v['nett'],
        //             paidOut : '<input id="'+v['creditType']+'" name="paidOut" value="'+v['paidOut']+'", type="text">',
        //             balance : '<input id="'+v['creditType']+'" name="balance" value="'+v['balance']+'", type="text">',

        //         };
        //         ++j;
        //         newNettList.push(rebuildNettData);
        //     });

        //     buildTable(newNettList, tableNettId, divNettId, thArrayNett, btnArray, message, tableNo3);
        //     $("#saveButtonDiv").show();
        // }

    }
        
    function expandMainView(num){
        if ($('#subData'+num).css('display') == 'none') {
            $("#mainVerticalArrow"+num).addClass('rotate90');
            $('#subData'+num).show();
        }else{
            $("#mainVerticalArrow"+num).removeClass('rotate90');
            $('#subData'+num).hide();
        }
    }

    function expandSubView(mainNum, subNum, dayLeft){
        if ($('#subData'+mainNum+' #subDetails'+dayLeft).css('display') == 'none') {
            $('#subData'+mainNum+' #subVerticalArrow'+subNum).addClass('rotate90');
            $('#subData'+mainNum+' #subDetails'+dayLeft).show();
        }else{
            $('#subData'+mainNum+' #subVerticalArrow'+subNum).removeClass('rotate90');
            $('#subData'+mainNum+' #subDetails'+dayLeft).hide();
        }
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function saveSummary(data, message){
        showMessage('<?php echo $translations['A00684'][$language]; /* Successful created new admin. */ ?>', 'success', 'Agent Summary', 'user-plus', 'agentSummary.php');
    }
    
   
</script>
</body>
</html>
