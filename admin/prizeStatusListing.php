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
                                        <form id="searchPrize" role="form">
                                        
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
                                            <!-- <div class="col-sm-4 form-group">
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
                                                <label class="control-label">
                                                    Receiver Name
                                                </label>
                                                <input type="text" class="form-control" dataName="receiverName" dataType="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    Receiver Phone
                                                </label>
                                                <input type="text" class="form-control" dataName="receiverPhone" dataType="text">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    Receiver Address
                                                </label>
                                                <input type="text" class="form-control" dataName="receiverAddress" dataType="text">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="">
                                                    <?php echo $translations['A01109'][$language]; /* Leader Username */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                 <label class="control-label" for="">
                                                       <?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>
                                                 </label>
                                                 <input id="mainLeaderUsername" type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                            </div>
                                        </div>
                                       <!--      <div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="name">
                                                    Client Name
                                                </label>
                                                <input type="text" class="form-control" dataName="name" dataType="text">
                                            </div> -->
                                        <div class="col-sm-12 px-0">
                                              <div class="col-sm-3 form-group" id="datepicker" >
                                                    <label class="control-label" data-th="">Approved At</label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="approvedDate" dataType="dateRange" autocomplete="off">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="approvedDate" dataType="dateRange">
                                                    </div>
                                                </div>
                                               
                                               <div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="status">
                                                    <?php echo $translations['A00318'][$language]; /*status*/ ?>
                                                </label>
                                                <select id="status" class="form-control" dataName="status" dataType="text">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /*all*/ ?>
                                                    </option>
                                                    <option value="Waiting Approval">
                                                        <?php echo $translations['A01019'][$language]; /*Waiting Approval*/ ?>
                                                    </option>
                                                    <option value="Pending">
                                                        <?php echo $translations['A01017'][$language]; /* Pending */ ?>
                                                    </option>
                                                    <option value="Delivering">
                                                        <?php echo $translations['A01271'][$language]; /* Delivering */ ?>
                                                    </option>
                                                    <!-- <option value="Approve">
                                                        <?php echo $translations['A01186'][$language]; /*Approve*/ ?>
                                                    </option> -->
                                                    <option value="Sent">
                                                        <?php echo $translations['A01272'][$language]; /* Sent */ ?>
                                                    </option>
                                                    <option value="Reject">
                                                        <?php echo $translations['A01187'][$language]; /*Reject*/ ?>
                                                    </option>
                                                    <option value="Cancel">
                                                        <?php echo $translations['A00660'][$language]; /*Cancel*/ ?>
                                                    </option>




                                                </select>
                                            </div>
                                       
                                              <div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="redeemID">
                                                   Redeem Item
                                                </label>
                                                <select id="prizeType" class="form-control" dataName="redeemID" dataType="text">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /*all*/ ?>
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
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

          <!--     <div class="row" id="hideRow">
                    <div class="col-lg-12">
                        <div class="card-box col-lg-12"  style="background:#f4f8fb">
                    <div id="grandTotalWithdrawal"></div>




                        </div>
                    </div>
                </div>
 -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <div class="card-box p-b-0"> -->
                                <div id="basicwizard" class="pull-in" style="display: none;">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                          <button type="button" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></button>
                                          <button type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light " style="margin-bottom: 10px;">
                                              <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                                        </button> 
                                        <form>
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="prizeListingDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerPrizeListing"></ul>
                                            </div>
                                        </form>

                                        <!----------------- Multi select html ---------------->
                                    <div style="margin-top: 10px; margin-bottom: 10px">
                                        <span>
                                            <?php echo $translations['A00571'][$language]; /* Remark */ ?> : 
                                        </span>
                                        <input id="remark" type="form-control">
                                    </div>

                                <!--      <div style="margin-top: 10px; margin-bottom: 10px">
                                        <div class="input-group input-daterange">
                                        <span>
                                            Estimated Date : 
                                        </span>
                                            <input id="estimatedDate" type="form-control" dataName="date" dataType="dateRange">
                                        <div style="display: inline-block; margin-left:20px;">
                                            <button type="" id="editEstimatedDate" class="btn btn-primary waves-effect waves-light" style="width: 100px">
                                                Update                                        
                                            </button>
                                        </div>
                                        </div>
                                    </div>
 -->
                                    <span>
                                        <?php echo $translations['A00663'][$language]; /* With selected */ ?> : 
                                    </span>
                                    <div id="selectionDiv" style="display: inline-block; margin-left: 5px; width: 150px">
                                        <select id="statusSelect" class="m-l-rem1 form-control" dataName="status" dataType="select">
                                            <option value="Pending">
                                                <?php echo $translations['A01017'][$language]; /* Pending */ ?>
                                            </option>
                                            <option value="Delivering">
                                                <?php echo $translations['A01271'][$language]; /* Delivering */ ?>
                                            </option>
                                            <!-- <option value="Approve">
                                                <?php echo $translations['A01186'][$language]; /*Approve*/ ?>
                                            </option> -->
                                            <option value="Sent">
                                                <?php echo $translations['A01272'][$language]; /* Sent */ ?>
                                            </option>
                                            <option value="Reject">
                                                <?php echo $translations['A01187'][$language]; /*Reject*/ ?>
                                            </option>
                                            <option value="Cancel">
                                                <?php echo $translations['A00660'][$language]; /*Cancel*/ ?>
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
    var divId    = 'prizeListingDiv';
    var tableId  = 'prizeListingTable';
    var pagerId  = 'pagerPrizeListing';
    var btnArray = {};
    var thArray  = Array(
        "check",//checkbox
        "<?php echo $translations['A00148'][$language]; /* Member ID */ ?>",
        "<?php echo $translations['A00102'][$language]; /* Username */ ?>",
        "<?php echo $translations['A00117'][$language]; /* Full Name */ ?>",
        "<?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>",
        "Receiver Name",
        "Receiver Phone",
        "Receiver Address",
        "<?php echo $translations['A00318'][$language]; /* Status */ ?>",
        "Approved At",
        "Approved By",
        "Redeem Date",
        "Redeem Item",
        "Qty",
        "<?php echo $translations['M01360'][$language]; /* Remarks */ ?>"
    );
    var searchId = 'searchPrize';
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

        fCallback = loadPrizeType;
        formData  = {command: 'loadRedeemPrize'};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


        // fCallback = loadDefaultListing;
        // formData  = {command: 'prizeListing'};
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        //reset to default search
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchPrize').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
            $('#searchPrize').find('select').each(function() {
                $(this).val('');
            $("#searchPrize")[0].reset();
            });

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 

        $('#datepicker input').each(function() {
            $(this).datepicker('clearDates');
        });


        $('#updateBtn').click(function() {
            var checkedIDs = [];
            var checkedDetails = [];
            $('#'+tableId).find('[type=checkbox]:checked').each(function() {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
                checkedIDs.push(checkboxID);
            });
            if(checkedIDs.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            else {
                var formData   = {
                    command : 'updateRedeemPrizeStatus',
                    checkedIDs : checkedIDs,
                    status : $('#statusSelect').find('option:selected').val(),
                    remark : $('#remark').val()
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

    // $('#seeAllBtn').click(function() {

    //     var searchID = 'searchForm';
    //     var searchData = buildSearchDataByType(searchID);
    //     formData  = {
    //         command : 'prizeListing',
    //         inputData   : searchData,
    //         pageNumber   : 1,
    //         seeAll   : 1
    //     };
    //     // console.log(searchData);
    //     fCallback = loadDefaultListing;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    // }); 

    function exportBtn(){
          var searchID = 'searchPrize';
          var searchData = buildSearchDataByType(searchID);
            var thArray = Array(
                    "Member ID",
                    "Username",
                    "Full Name",
                    "Main Leader Username",
                    "Receiver Name",
                    "Contact Number",
                    "Address",
                    "Status",
                    "Approved At",
                    "Approved By",
                    "Redeem Date",
                    "Redeem Item",
                    "Qty",
                    "Remark"
                );
            var key  = Array (
                "memberID",
                "username",
                "clientName",
                "mainLeaderUsername",
                "name",
                "contactNumber",
                "deliveryAddress",
                "status",
                "approved_at",
                "updater_Username",
                "created_at",
                "display",
                "amount",
                "remark"
            );
            var formData  = {
                command    : "prizeListing",
                filename   : "prizeListingReport",
                inputData  : searchData,
                header     : thArray,
                key        : key,
                DataKey    : "redeemList"
            };
             $.redirect('exportExcel2.php', formData); 
    }


     function seeAllBtn() {
        var searchID = 'searchPrize';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'prizeListing',
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
            command     : "prizeListing",
            pageNumber  : pageNumber,
            inputData   : searchData,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
            
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard').show();
        var tableNo;
        var redeemList = data.redeemList;

         if(data == ""){
            $('#hideRow').addClass('hide');
        }else {
            $('#hideRow').removeClass('hide');
        }

        var grandTotal = "";
        
        if(data != "" && redeemList.length>0) {
            var newList = [];
            var j = 0;
            $.each(redeemList, function(k, v) {
                var checkbox = "";
                if(v['status'] === "Waiting Approval" || v['status'] === "Pending" ||v['status'] === "Delivering"||v['status'] === "Sent"){
                    checkbox = "<input name ='checkbox' type ='checkbox'>";
                }else{
                    checkbox = "-";
                }

                var rebuildData = {
                    check : checkbox,
                    memberID : v['memberID'],
                    username : v['username'],
                    clientName : v['clientName'],
                    mainLeaderUsername : v['mainLeaderUsername'],
                    name : v['name'],
                    contactNumber : v['contactNumber'],
                    deliveryAddress : v['deliveryAddress'],
                    status : v['status'],
                    approved_at : v['approved_at'],
                    updater_Username : v['updater_Username'],
                    created_at : v['created_at'],
                    display : v['display'],
                    amount : v['amount'],
                    remark : v['remark']
                };
                ++j;
                newList.push(rebuildData);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
       

       if(redeemList) {
            $.each(redeemList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
            });
        }
        
        $('#'+tableId).find('tbody tr').each(function(){

            var status = $(this).find('td:eq(13)').text();
            // console.log(status);
            if(status == "Cancel" || status == "Reject" || status == "Approve"){
                $(this).find("td:eq(14)").html('-');
            }

            $(this).find('td:first-child').css('text-align','center');
        });

        $('#'+tableId+' tr:last').after(data.total);

        // $('#'+tableId).tableExport({
        //     headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
        //     footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
        //     formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
        //     filename: 'Withdrawal_List', // (id, String), filename for the downloaded file, (default: 'id')
        //     bootstrap: true, // (Boolean), style buttons using bootstrap, (default: true)
        //     exportButtons: true, // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
        //     position: 'bottom', // (top, bottom), position of the caption element relative to table, (default: 'bottom')
        //     ignoreRows: null, // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
        //     ignoreCols: null, // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
        //     trimWhitespace: false // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
        // });
        
        // $('button.xlsx').removeClass("btn-default").addClass("btn-primary waves-effect waves-light");
        // $('button.xlsx').text('Export to xlsx');
        // $('table#'+tableId).find("caption").append('<button type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">See All</button>');  
    }

    function loadPrizeType(data, message){
        console.log(data);
        var redeemProduct = data.redeemProduct;
        
        $.each(redeemProduct, function(key) {
                $('#prizeType').append('<option value="'+redeemProduct[key]['redeemID']+'">'+redeemProduct[key]['display']+'</option>');
        });
    }

    // function tableBtnClick(btnId) {
        // var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        // var tableRow = $('#'+btnId).parent('td').parent('tr');
        // var tableId  = $('#'+btnId).closest('table');

        // if (btnName == 'edit') {
        //     var viewId  = tableRow.attr('data-th');
        //     var name    = tableRow.find('td').eq(4).text();
        //     $.redirect("approveWithdrawal.php",
        //         {
        //             id          : viewId,
        //             clientName  : name
        //         });
        // }else if (btnName == 'reject') {
        //     var canvasBtnArray = Array('Ok');
        //     var message        = "<?php echo $translations['A01159'][$language]; /* Are you sure you want to cancel this withdrawal request? */ ?>";
        //     showMessage(message, '', "<?php echo $translations['A01160'][$language]; /* Delete withdrawal request */ ?>", 'trash', '', canvasBtnArray);
        //     $('#canvasOkBtn').click(function() {
        //         var tableColVal = tableRow.attr('data-th');
        //         var row_index   = tableRow.closest("tr").index();
        //         var formData    = {
        //             'command'       : 'adminCancelWithdrawal',
        //             'withdrawalId'  : tableColVal,
        //             'clientId'      : clientIdList[row_index]['clientId']
        //         };
        //         fCallback = loadCancel;
        //         ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        //     });
        // }
    // }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'prizeStatusListing.php');
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