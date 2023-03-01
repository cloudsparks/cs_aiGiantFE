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
                                                     <?php echo $translations['A00102'][$language]; /* Username */?>
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
                                                <label class="control-label">
                                                    <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="memberID" dataType="text">
                                            </div>

                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="name">
                                                    <?php echo $translations['A00117'][$language]; /* Full Name */?>
                                                </label>
                                                <input type="text" class="form-control" dataName="name" dataType="text">
                                            </div>

                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    Phone
                                                </label>
                                                <input type="text" class="form-control" dataName="phone" dataType="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-3 form-group" id="datepicker" >
                                                <label class="control-label" data-th="date"><?php echo $translations['A00137'][$language]; /* Date */?></label>
                                                <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="date" dataType="dateRange" autocomplete="off">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="date" dataType="dateRange">
                                                </div>
                                            </div>

                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="mainLeaderUsername">
                                                    <?php echo $translations['A01109'][$language]; /* Leader Username */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                            </div>

                                            <div class="col-sm-3 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                </label>
                                                <select id="countryName" class="form-control" dataName="countryName" dataType="text">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="serialNumber">
                                                    S/N
                                                </label>
                                                <input type="text" class="form-control" dataName="serialNumber" dataType="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="">
                                                    Branch
                                                </label>
                                                <input type="text" class="form-control" dataName="branch" dataType="text">
                                            </div>

                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="">
                                                    Province
                                                </label>
                                                <input type="text" class="form-control" dataName="province" dataType="text">
                                            </div>
                                            
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="creditType">
                                                   <?php echo $translations['A00267'][$language]; /* Credit Type */ ?>
                                                </label>
                                                <select id="selectType" class="form-control" dataName="creditType" dataType="select">
                                                    <option value="">All</option>
                                                    <option value="bitcoin" selected>Bitcoin</option>
                                                    <option value="ethereum">Ethereum</option>
                                                    <option value="ripple">XRP(ripple)</option>
                                                    <option value="cardano">ADA(Cardano)</option>
                                                    <option value="tether">ERC20 USDT</option>
                                                    <option value="eos">EOS</option>
                                                    <!-- <option value="ibgCredit">IBG Token</option>
                                                    <option value="gtCredit">IBGT</option> -->
                                                </select>
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
                                                    <option value="Cancel">
                                                        <?php echo $translations['A00660'][$language]; /*Cancel*/ ?>
                                                    </option>
                                                    <option value="Approve">
                                                        <?php echo $translations['A01186'][$language]; /*Approve*/ ?>
                                                    </option>
                                                    <option value="Reject">
                                                        <?php echo $translations['A01187'][$language]; /*Reject*/ ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-3 form-group">
                                                 <label class="control-label" for="">
                                                      <?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>
                                                 </label>
                                                 <input id="mainLeaderUsername" type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
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

                  <div class="row" id="hideRow">
                    <div class="col-lg-12">
                        <div class="card-box col-lg-12" id="grandTotalDiv"  style="background:#f4f8fb; display: none">
                    <div id="grandTotalWithdrawal"></div>




                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                     <!--    <div class="card-box p-b-0"> -->
                                <div id="basicwizard" class="pull-in" style="display: none">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                          <button type="button" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></button>
                                         <button type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">
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

                                         <div style="margin-top: 10px; margin-bottom: 10px">
                                            <span>
                                                <?php echo $translations['A00571'][$language]; /* Remark */ ?> : 
                                            </span>
                                            <input id="remark" type="form-control">
                                        </div>
                                        <div style="margin-top: 10px; margin-bottom: 10px">
                                            <div class="input-group input-daterange">
                                            <span>
                                                Estimated Date : 
                                            </span>
                                               <input id="estimatedDate" type="form-control" dataName="date" dataType="dateRange">
                                            <div style="display: inline-block; margin-left:20px;">
                                                <button type="" id="editEstimatedDate" class="btn btn-primary waves-effect waves-light" style="width: 100px">
                                                    <?php echo $translations['A00300'][$language]; /*Update */ ?>                                        
                                                </button>
                                            </div>
                                            </div>
                                        </div>

                                       <span>
                                        <?php echo $translations['A00663'][$language]; /* With selected */ ?> : 
                                    </span>
                                     <div id="selectionDiv" style="display: inline-block; margin-left: 5px; width: 150px">
                                        <select id="statusSelect" class="m-l-rem1 form-control" dataName="status" dataType="select">
                                            <option value="Approve" selected>
                                                <?php echo $translations['A01141'][$language]; /* Approved */ ?>
                                            </option>
                                            <option value="Pending">
                                                <?php echo $translations['A01017'][$language]; /* Rejected */ ?>
                                            </option>
                                            <option value="Cancel">
                                                <?php echo $translations['A00660'][$language]; /* Rejected */ ?>
                                            </option>
                                            <option value="Reject">
                                                <?php echo $translations['A01142'][$language]; /* Rejected */ ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div style="display: inline-block; margin-left:20px;">
                                        <button type="" id="updateBtn" class="btn btn-primary waves-effect waves-light" style="width: 100px">
                                            <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                        </button>
                                    </div>
                                        <!--  <button type="" id="seeAllBtn" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">
                                              <?php echo $translations['A01191'][$language]; /* See All */?>
                                        </button>  -->
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
    var btnArray = Array('edit');
   var thArray  = Array(
        // "",//checkbox
        "check",
        // "ID",
        "<?php echo $translations['A00137'][$language]; /* Date */?>",
        "Estimated Date",
        "<?php echo $translations['A00148'][$language]; /* Member ID */ ?>",
        // "S/N",
        "<?php echo $translations['A00117'][$language]; /* Full Name */?>",
        "<?php echo $translations['A00102'][$language]; /* Username */?>",
        "Phone",
        'Main Leader Username',
        "Country",
        // '<?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?>',
        "Bank Name",
        "Account Holder",
        "Account No",
        "Branch",
        "Province",
        "<?php echo $translations['A00267'][$language]; /* Credit Type */ ?>",
        "<?php echo $translations['A00821'][$language]; /* Amount */ ?>",
        // 'Converted Amount',
        "<?php echo $translations['A01040'][$language]; /* Charges */ ?>",
        // "Tag",
        "Total withdrawn",
        "Approved Amount",
        "Approved At",
        "<?php echo $translations['A00318'][$language]; /* Status */ ?>"
        // "<?php echo $translations['A00571'][$language]; /* Remark */ ?>"
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

        // fCallback = loadDefaultListing;
        // formData  = {command: 'getAdminWithdrawalListBankDetails'};
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

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 

        $('#datepicker input').each(function() {
            $(this).datepicker('clearDates');
        });

         $('#editEstimatedDate').click(function() {
            var checkedIDs = [];
            var checkedDetails = [];
            $('#'+tableId).find('[type=checkbox]:checked').each(function() {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
                checkedIDs.push(checkboxID);
            });

            var estimatedDateTemp = $('#estimatedDate').val();
            var estimated_date = dateToTimestamp(estimatedDateTemp);
            // console.log(estimatedDate);


            if(checkedIDs.length === 0)
                showMessage('No check box selected.', 'warning', 'Update Status', 'edit', '');
            else if (estimatedDateTemp == ""){
                showMessage('Please insert date first', 'warning', 'Update Status', 'edit', '')
            }
            else {
                var formData   = {
                    command : 'adminUpdateEstimatedDate',
                    checkedIDs : checkedIDs,
                    // estimatedDate : $('#estimatedDate').val(),
                    estimated_date : estimated_date,
                    // remark : $('#remark').val()
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
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
                    command : 'updateWithdrawalStatus',
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
    //         command : 'getAdminWithdrawalListBankDetails',
    //         inputData   : searchData,
    //         pageNumber   : 1,
    //         seeAll   : 1
    //     };
    //     // console.log(searchData);
    //     fCallback = loadDefaultListing;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    // });

    function exportBtn(){
         
          var searchID = 'searchWithdrawal';
          var searchData = buildSearchDataByType(searchID);
            var thArray = Array(
                "Created At",
                "Estimated Date",
                // "Leader Username",
                "Member ID",
                "Full Name",
                "Username",
                "Phone",
                "Country",
                "Bank Name",
                "Account Holder",
                "Account No",
                "Branch",
                "Province",
                "Credit Type",
                "Amount",
                "Charges",
                "Total withdrawn",
                "Approved Amount",
                "Approved At",
                "Status"
                );
            var key  = Array (
               'createdAt',
               'estimated_date',
               // 'mainLeaderUsername',
               'clientMemberID',
               'clientName',
               'clientUsername',
               'clientPhone',
               'country',
               'bankName',
               'accountHolder',
               'account_no',
               'branch',
               'province',
               'creditType',
               'amount',
               'charges',
               'receivable_amount',
               "approved_amount",
               'approvedAt',
               'status'
            );
            var formData  = {
                command    : "getAdminWithdrawalList",
                filename   : "BankWithdrawalListReport",
                inputData  : searchData,
                header     : thArray,
                key        : key,
                DataKey    : "withdrawalList"
            };
             $.redirect('exportExcel2.php', formData); 
    }

     function seeAllBtn() {
        var searchID = 'searchWithdrawal';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getAdminWithdrawalListBankDetails',
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
            command     : "getAdminWithdrawalListBankDetails",
            pageNumber  : pageNumber,
            inputData   : searchData,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
            
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        console.log(data);
        $('#grandTotalDiv').show();
        $('#basicwizard').show();
        var tableNo;
        var withdrawalList = data.withdrawalList;
        var totalWithdrawal = data.totalWithdrawal;
        var totalGrossWithdrawal = data.totalGrossWithdrawal;
        var totalNetWithdrawal = data.totalNetWithdrawal;

        // loadCountryDropdown(data.countryList);

        if(data == ""){
            $('#hideRow').addClass('hide');
        }else {
            $('#hideRow').removeClass('hide');
        }

        var grandTotal = "";
        
        if(data != "" && withdrawalList.length>0) {
            var newList = [];
            var j = 0;
            $.each(withdrawalList, function(k, v) {
                var checkbox = "";
                if(v['status'] === "Waiting Approval" || v['status'] === "Pending"){
                    checkbox = "<input name ='checkbox' type ='checkbox'>";
                }else{
                    checkbox = "-";
                }
               
                var rebuildData = {
                    check : checkbox,
                    // id : v['id'],
                    createdAt : v['createdAt'],
                    estimated_date: v['estimated_date'],
                    // serial_number : v['serial_number'],
                    clientMemberID : v['clientMemberID'],
                    clientName : v['clientName'],
                    clientUsername : v['clientUsername'],
                    clientPhone : v['clientPhone'],
                    mainLeaderUsername: v['mainLeaderUsername'],
                    country : v['country'],
                    bankName : v['bankName'],
                    accountHolder : v['accountHolder'],
                    account_no : v['account_no'],
                    branch : v['branch'],
                    province : v['province'],
                    credit_type : v['credit_type'],
                    amount: v['amount'],
                    // converted_amount : v['converted_amount'],
                    charges: v['charges'],//charges                     
                    // tag : v['tag'],
                    totalWithdrawn: v['receivable_amount'],
                    approved_amount : v['approved_amount'],
                    approvedAt : v['approvedAt'] || '-',
                    status : v['status']
                    // remark : v['remark']
                };
                ++j;
                newList.push(rebuildData);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(totalGrossWithdrawal){
            // $.each(totalGrossWithdrawal, function(key, list){
            //     console.log(key);
            //     console.log(list);
            // });
            grandTotal +='<div class="col-md-6" style="padding:15px">';
            grandTotal +='<table class="table-responsive" style="border:0px;">';
            grandTotal +=   '<thead>';
            // $.each(totalWithdrawal, function(key, list){
            grandTotal +=       '<tr>';
            grandTotal +=           '<th style="text-align: left!important">'+'Grand Total'+'</th>';
            grandTotal +=       '</tr>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<th style="text-align: left!important">'+'Total'+' : '+totalGrossWithdrawal.totalGrossAmount+' </th>';
            grandTotal +=       '</tr>';
            // });
            grandTotal +=   '</thead>';
            grandTotal +=   '<tbody>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<td>'+'Approve'+' : '+totalGrossWithdrawal.Approve+' </td>';
            grandTotal +=       '</tr>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<td>'+'Pending'+' : '+totalGrossWithdrawal.Pending+' </td>';
            grandTotal +=       '</tr>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<td>'+'Reject'+' : '+totalGrossWithdrawal.Reject+' </td>';
            grandTotal +=       '</tr>';
            grandTotal +=       '<tr>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<td>'+'Cancel'+' : '+totalGrossWithdrawal.Cancel+' </td>';
            grandTotal +=       '</tr>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<td>'+'Waiting Approval'+' : '+totalGrossWithdrawal.waitingApproval+' </td>';
            grandTotal +=       '</tr>';
            
            grandTotal +=    '</tbody>'
            grandTotal +='</table>';
            grandTotal +='</div>';

            grandTotal += '<div class="col-md-6" style="padding:15px">';
            grandTotal +='<table class="table-responsive" style="border:0px;">';
            grandTotal +=   '<thead>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<th style="text-align: left!important">'+'Net Total'+'</th>';
            grandTotal +=       '</tr>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<th style="text-align: left!important">'+'Total'+' : '+totalNetWithdrawal.totalNetAmount+' </th>';
            grandTotal +=       '</tr>';
            // });
            grandTotal +=   '</thead>';
            grandTotal +=   '<tbody>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<td>'+'Approve'+' : '+totalNetWithdrawal.Approve+' </td>';
            grandTotal +=       '</tr>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<td>'+'Pending'+' : '+totalNetWithdrawal.Pending+' </td>';
            grandTotal +=       '</tr>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<td>'+'Reject'+' : '+totalNetWithdrawal.Reject+' </td>';
            grandTotal +=       '</tr>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<td>'+'Cancel'+' : '+totalGrossWithdrawal.Cancel+' </td>';
            grandTotal +=       '</tr>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<td>'+'Waiting Approval'+' : '+totalNetWithdrawal.waitingApproval+'</td>';
            grandTotal +=       '</tr>';
            
            grandTotal +=    '</tbody>'
            grandTotal +='</table>';
            grandTotal +='</div>';


            $('#grandTotalWithdrawal').empty().append(grandTotal);
        }

       if(withdrawalList) {
            $.each(withdrawalList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
            });
        }
        
        $('#'+tableId).find('tbody tr').each(function(){

            var status = $(this).find('td:eq(17)').text();

            if(status == "Cancel" || status == "Reject" || status == "Approve"){
                $(this).find("td:eq(18)").html('-');
            }
        });

        $('#'+tableId+' tr:last').after(data.total);

        // $('#'+tableId).tableExport({
        //     headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
        //     footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
        //     formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
        //     filename: 'Bank_Withdrawal_List', // (id, String), filename for the downloaded file, (default: 'id')
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

    function loadCountryDropdown(data) {
        if(data) {
            $.each(data, function(key, val) {
                var countryID = val['id'];
                var country   = val['name'];
                $('#countryName').append('<option value="' + countryID + '">' + country + '</option>');
            });
        }
    }


    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'edit') {
            var viewId  = tableRow.attr('data-th');
            var name    = tableRow.find('td').eq(4).text();
            $.redirect("approveWithdrawal.php",
                {
                    id          : viewId,
                    clientName  : name
                });
        }else if (btnName == 'reject') {
            var canvasBtnArray = Array('Ok');
            var message        = "<?php echo $translations['A01159'][$language]; /* Are you sure you want to cancel this withdrawal request? */ ?>";
            showMessage(message, '', "<?php echo $translations['A01160'][$language]; /* Delete withdrawal request */ ?>", 'trash', '', canvasBtnArray);
            $('#canvasOkBtn').click(function() {
                var tableColVal = tableRow.attr('data-th');
                var row_index   = tableRow.closest("tr").index();
                var formData    = {
                    'command'       : 'adminCancelWithdrawal',
                    'withdrawalId'  : tableColVal,
                    'clientId'      : clientIdList[row_index]['clientId']
                };
                fCallback = loadCancel;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        }
    }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'bankWithdrawalListing.php');
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