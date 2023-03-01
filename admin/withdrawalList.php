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
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                           class="collapse">
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">

                                            <div class="col-xs-12">
                                                <div class="row">
                                                     <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01678'][$language]; /* Date Range */ ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-daterange-from" dataname="date" datatype="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to" dataname="date" datatype="dateRange">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="username">
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                        </label>
                                                        <span class="pull-right">
                                                       <input id="match" type="radio" name="usernameType" value="match"
                                                              checked>
                                                        <label for="match"
                                                               style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                        <input id="like" type="radio" name="usernameType" value="like"
                                                               style="margin-left: 15px;">
                                                        <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                    </span>
                                                        <input type="text" class="form-control" dataName="username"
                                                               dataType="text">
                                                    </div>
                                                   
                                                            <div class="col-sm-4 form-group">
                                                                <label class="control-label" for="" data-th="memberID">
                                                                    <?php echo $translations['A01109'][$language]; /* Leader Username */ ?>
                                                                </label>
                                                                <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                     
                                                    
                                                   
                                               
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="status">
                                                            <?php echo $translations['A00318'][$language]; /*status*/ ?>
                                                        </label>
                                                        <select id="status" class="form-control" dataName="status"
                                                                dataType="text">
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
                                                   
                                                     <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="memberID">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="memberID"
                                                               dataType="text">
                                                    </div>
                                                </div>
                                            </div>
                                           


                                        </form>
                                        <div class="col-xs-12">
                                            <button id="searchBtn" type="submit"
                                                    class="btn btn-primary waves-effect waves-light"><?php echo $translations['A00051'][$language]; /* Search */ ?></button>
                                            <button type="submit" id="resetBtn"
                                                    class="btn btn-default waves-effect waves-light"><?php echo $translations['A00053'][$language]; /* reset */ ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="hideRow">
                    <div class="col-lg-12">
                        <div class="card-box col-lg-12" id="grandTotalDiv" style="background:#f4f8fb; display: none">
                            <div id="grandTotalWithdrawal"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <!--   <div class="card-box p-b-0"> -->
                        <div id="basicwizard" class="pull-in" style="display: none">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <button type="button" onclick="exportBtn()"
                                        class="btn btn-primary waves-effect waves-light m-b-rem1"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></button>
                                <button type="button" onclick="seeAllBtn()"
                                        class="btn btn-primary waves-effect waves-light " style="margin-bottom: 10px;">
                                    <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                                </button>
                                <form>
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="listingDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                    </div>
                                </form>

                                <!----------------- Multi select html ---------------->
                                <div style="margin-top: 10px; margin-bottom: 10px">
                                        <span>
                                            <?php echo $translations['A00571'][$language]; /* Remark */ ?> : 
                                        </span>
                                    <input id="remark" type="form-control">
                                </div>

                                <!-- <div style="margin-top: 10px; margin-bottom: 10px">
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
                                    </div> -->

                                <span>
                                        <?php echo $translations['A00663'][$language]; /* With selected */ ?> : 
                                    </span>
                                <div id="selectionDiv" style="display: inline-block; margin-left: 5px; width: 150px">
                                    <select id="statusSelect" class="m-l-rem1 form-control" dataName="status"
                                            dataType="select">
                                        <option value="Pending">
                                            <?php echo $translations['A01017'][$language]; /* Pending */ ?>
                                        </option>
                                        <option value="Approve" selected>
                                            <?php echo $translations['A01218'][$language]; /* Approved */ ?>
                                        </option>
                                        <option value="Reject">
                                            <?php echo $translations['A01439'][$language]; /* Rejected */ ?>
                                        </option>
                                        <option value="Cancel">
                                            <?php echo $translations['A00660'][$language]; /* Cancel */ ?>
                                        </option>
                                    </select>
                                </div>
                                <div style="display: inline-block; margin-left:20px;">
                                    <button type="" id="updateBtn" class="btn btn-primary waves-effect waves-light"
                                            style="width: 100px">
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
    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var pagerId = 'listingPager';
    var btnArray = {};//Array('edit');

    var thArray = Array(
        "check",
        "<?php echo $translations['A00137'][$language]; /* Date */?>",
        "<?php echo $translations['A00148'][$language]; /* Member ID */?>",
        "<?php echo $translations['A00102'][$language]; /* Username */?>",
        "<?php echo $translations['A00318'][$language]; /* Status */?>",
        "Withdrawal Type",
        "Wallet Address",
        "Withdrawal Amount",
        "Admin Fees",
        "Net Withdrawal Amount",
        "<?php echo $translations['A00571'][$language]; /* Remark */?>",
        
    );

    var searchId = 'searchForm';
    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqAdmin.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var formData = "";
    var fCallback = "";

    $(document).ready(function () {
        setTodayDatePicker();

        $("body").keyup(function (event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        // fCallback = loadDefaultListing;
        // formData  = {command: 'getAdminWithdrawalList'};
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        //reset to default search
        $('#resetBtn').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function () {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

            // $('#datepicker input').each(function () {
            //     $(this).datepicker('clearDates');
            // });

        });

        $('#searchBtn').click(function () {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#editEstimatedDate').click(function () {
            var checkedIDs = [];
            var checkedDetails = [];
            $('#' + tableId).find('[type=checkbox]:checked').each(function () {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
                checkedIDs.push(checkboxID);
            });

            var estimatedDateTemp = $('#estimatedDate').val();
            var estimated_date = dateToTimestamp(estimatedDateTemp);
            // console.log(estimatedDate);


            if (checkedIDs.length === 0)
                showMessage('No check box selected.', 'warning', 'Update Status', 'edit', '');
            else if (estimatedDateTemp == "") {
                showMessage('Please insert date first', 'warning', 'Update Status', 'edit', '')
            }
             else {
                var formData = {
                    command: 'adminUpdateEstimatedDate',
                    checkedIDs: checkedIDs,
                    // estimatedDate : $('#estimatedDate').val(),
                    estimated_date: estimated_date
                    // remark : $('#remark').val()
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

        $('#updateBtn').click(function () {
            var checkedIDs = [];
            var checkedDetails = [];
            $('#' + tableId).find('[type=checkbox]:checked').each(function () {
                var checkboxID = $(this).parent('td').parent('tr').attr('data-th');
                checkedIDs.push(checkboxID);
            });
            if (checkedIDs.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            
            else if(checkedIDs.length >= 500){
                showMessage('Cannot select records more than 500.', 'warning', 'Update Status', 'edit', '');
            } else {
                var formData = {
                    command: 'batchUpdateWithdrawalStatus',
                    checkedIDs: checkedIDs,
                    status: $('#statusSelect').find('option:selected').val(),
                    remark: $('#remark').val()
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });

    // $('#dateRangeStart').datepicker({
    //     // language: language,
    //     format: 'dd/mm/yyyy',
    //     orientation: 'auto',
    //     autoclose: true
    // });

    // $('#dateRangeEnd').datepicker({
    //     // language: language,
    //     format: 'dd/mm/yyyy',
    //     orientation: 'auto',
    //     autoclose: true
    // });


    // $('.input-daterange input').each(function () {
    //     $(this).daterangepicker({
    //         singleDatePicker: true,
    //         timePicker: false,
    //         locale: {
    //             format: 'DD/MM/YYYY'
    //             // format: strToTime();
    //         }
    //     });
    //     $(this).val('');
    // });

    // $('#seeAllBtn').click(function() {

    //     var searchID = 'searchForm';
    //     var searchData = buildSearchDataByType(searchID);
    //     formData  = {
    //         command : 'getAdminWithdrawalList',
    //         inputData   : searchData,
    //         pageNumber   : 1,
    //         seeAll   : 1
    //     };
    //     // console.log(searchData);
    //     fCallback = loadDefaultListing;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    // }); 

    function exportBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);

        var thArray = Array(
        "<?php echo $translations['A00137'][$language]; /* Date */?>",
        "<?php echo $translations['A00148'][$language]; /* Member ID */?>",
        "<?php echo $translations['A00102'][$language]; /* Username */?>",
        "<?php echo $translations['A00318'][$language]; /* Status */?>",
        "Withdrawal Type",
        "Wallet Address",
        "Withdrawal Amount",
        "Admin Fees",
        "Net Withdrawal Amount",
        "<?php echo $translations['A00571'][$language]; /* Remark */?>",
        );

        var key = Array(
            "created_at",
            "client_memberID",
            "client_username",
            "statusValue",    
            "crypto_type",
            "walletAddress",
            "amount",
            "charges",
            "receivable_amount",
            "remark", 
        );

        var formData = {
            command: "getAdminWithdrawalList",
            filename: "WithdrawalListReport",
            searchData: searchData,
            pageNumber      : 1,
            seeAll          : 1,
            header: thArray,
            key: key,
            DataKey: "withdrawalList",
            type: 'export',
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    /*function checkAll() {
        var checked = 0
        if( $('#selectAll').prop("checked") == true){
            checked = 1;
        }
       
        var checkedIDs = [];
        $('#'+tableId).find('[type=checkbox]').each(function() {
            var checkboxID = $(this).val();
            $(this).prop("checked", checked);
        });
    }*/


    function seeAllBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData = {
            command: 'getAdminWithdrawalList',
            searchData: searchData,
            pageNumber: 1,
            seeAll: 1
        };

        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command: "getAdminWithdrawalList",
            pageNumber: pageNumber,
            searchData: searchData,
            usernameSearchType: $("input[name=usernameType]:checked").val()
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        // console.log(data);
        $('#grandTotalDiv').show();
        $('#basicwizard').show();
        var tableNo;
        var withdrawalList = data.withdrawalList;
        var totalWithdrawal = data.totalWithdrawal;
        var totalGrossWithdrawal = data.totalGrossWithdrawal;
        var totalNetWithdrawal = data.totalNetWithdrawal;

        // loadCountryDropdown(data.countryList);

        if (data == "") {
            $('#hideRow').addClass('hide');
        } else {
            $('#hideRow').removeClass('hide');
        }

        var grandTotal = "";

        if (data != "" && withdrawalList.length > 0) {
            var newList = [];
            var j = 0;
            $.each(withdrawalList, function (k, v) {
                var checkbox = "";
                if (v['statusValue'] === "Waiting Approval" || v['statusValue'] === "Pending") {
                    checkbox = "<input name ='checkbox' type ='checkbox'>";
                } else {
                    checkbox = "-";
                } 

                var rebuildData = {
                    check                   : checkbox,
                    created_at              : v['created_at'],
                    client_memberID         : v['client_memberID'],
                    client_username         : v['client_username'],
                    statusValue             : v['statusValue'],    
                    crypto_type         : v['crypto_type'],
                    walletAddress           : v['walletAddress'], 
                    amount                  : addCommas(Number(v['amount']).toFixed(2)),
                    charges                 : addCommas(Number(v['charges']).toFixed(2)),
                    receivable_amount       : addCommas(Number(v['receivable_amount']).toFixed(2)),
                    remark                  : v['remark'],     
                };
                ++j;
                newList.push(rebuildData);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if (data != "" && withdrawalList.length > 0) {
            $.each(withdrawalList, function (k, v) {
                // console.log(v['withdrawal_id']);
                $('#' + tableId).find('tr#' + k).attr('data-th', v['withdrawal_id']);
            });
        }

        $('#' + tableId).find('tr').each(function () {

            // var status = $(this).find('td:eq(-2)').text();
            // console.log(status);
            // if (status == "Cancel" || status == "Reject" || status == "Approve") {
            //     $(this).find("td:eq(-1)").html('-');
            // }

            // $(this).find('td:eq(-2)').hide();

            $(this).find('td:first-child').css('text-align', 'center');
            $(this).find('td:eq(6), th:eq(6)').css('text-align', 'right');
            $(this).find('td:eq(7), th:eq(7)').css('text-align', 'right');
            $(this).find('td:eq(8), th:eq(8)').css('text-align', 'right');
        });

        // if(data.totalTableAmount){
        //     $('#' + tableId).find('tbody').append(`
        //         <tr class="">
        //             <td colspan="12" style="text-align:right;">
        //                 <b>
        //                     <?php echo $translations['A00651'][$language]; /* Grand Total */?>:
        //                 </b>
        //             </td>
        //             <td style="text-align: right;">${numberThousand(data.totalTableAmount.amount, 2)}</td>
        //             <td style="text-align: right;">${numberThousand(data.totalTableAmount.charges, 2)}</td>
        //             <td style="text-align: right;">${numberThousand(data.totalTableAmount.total_net_amount, 2)}</td>
        //             <td style="text-align: right;"></td>
        //             <td style="text-align: right;">${numberThousand(data.totalTableAmount.receivable_amount, 2)}</td>
        //             <td></td>
        //             <td style="text-align: right;">${numberThousand(data.totalTableAmount.converted_amount, 2)}</td>
        //         </tr>
        //     `);
        // }

        if (totalGrossWithdrawal) {
            // $.each(totalGrossWithdrawal, function(key, list){
            //     console.log(key);
            //     console.log(list);
            // });
            grandTotal += '<div class="col-md-6" style="padding:15px">';
            grandTotal += '<table class="table-responsive" style="border:0px;">';
            grandTotal += '<thead>';
            // $.each(totalWithdrawal, function(key, list){
            grandTotal += '<tr>';
            grandTotal += '<th style="text-align: left!important">' + '<?php echo $translations['A00651'][$language]; /* Grand Total */?>' + '</th>';
            grandTotal += '</tr>';
            grandTotal += '<tr>';
            grandTotal += '<th style="text-align: left!important; padding-top: 10px">' + 'Total' + ' : ' + totalGrossWithdrawal.totalGrossAmount + ' </th>';
            grandTotal += '</tr>';
            // });
            grandTotal += '</thead>';
            grandTotal += '<tbody>';
            grandTotal += '<tr>';
            grandTotal += '<td>' + 'Approve' + ' : ' + totalGrossWithdrawal.Approve + ' </td>';
            grandTotal += '</tr>';
            grandTotal += '<tr>';
            grandTotal += '<td>' + 'Pending' + ' : ' + totalGrossWithdrawal.Pending + ' </td>';
            grandTotal += '</tr>';
            grandTotal += '<tr>';
            grandTotal += '<td>' + 'Reject' + ' : ' + totalGrossWithdrawal.Reject + ' </td>';
            grandTotal += '</tr>';
            grandTotal += '<tr>';
            grandTotal += '<tr>';
            grandTotal += '<td>' + 'Cancel' + ' : ' + totalGrossWithdrawal.Cancel + ' </td>';
            grandTotal += '</tr>';
            grandTotal += '<tr>';
            grandTotal += '<td>' + 'Waiting Approval' + ' : ' + totalGrossWithdrawal['Waiting Approval'] + ' </td>';
            grandTotal += '</tr>';

            grandTotal += '</tbody>'
            grandTotal += '</table>';
            grandTotal += '</div>';

            grandTotal += '<div class="col-md-6" style="padding:15px">';
            grandTotal += '<table class="table-responsive" style="border:0px;">';
            grandTotal += '<thead>';
            grandTotal += '<tr>';
            grandTotal += '<th style="text-align: left!important">' + 'Net Total' + '</th>';
            grandTotal += '</tr>';
            grandTotal += '<tr>';
            grandTotal += '<th style="text-align: left!important; padding-top: 10px">' + 'Total' + ' : ' + totalNetWithdrawal.totalNetAmount + ' </th>';
            grandTotal += '</tr>';
            // });
            grandTotal += '</thead>';
            grandTotal += '<tbody>';
            grandTotal += '<tr>';
            grandTotal += '<td>' + 'Approve' + ' : ' + totalNetWithdrawal.Approve + ' </td>';
            grandTotal += '</tr>';
            grandTotal += '<tr>';
            grandTotal += '<td>' + 'Pending' + ' : ' + totalNetWithdrawal.Pending + ' </td>';
            grandTotal += '</tr>';
            grandTotal += '<tr>';
            grandTotal += '<td>' + 'Reject' + ' : ' + totalNetWithdrawal.Reject + ' </td>';
            grandTotal += '</tr>';
            grandTotal += '<tr>';
            grandTotal += '<td>' + 'Cancel' + ' : ' + totalNetWithdrawal.Cancel + ' </td>';
            grandTotal += '</tr>';
            grandTotal += '<tr>';
            grandTotal += '<td>' + 'Waiting Approval' + ' : ' + totalNetWithdrawal['Waiting Approval'] + '</td>';
            grandTotal += '</tr>';

            grandTotal += '</tbody>'
            grandTotal += '</table>';
            grandTotal += '</div>';


            $('#grandTotalWithdrawal').empty().append(grandTotal);
        }
    }


    function loadCountryDropdown(data) {
        if (data) {
            $.each(data, function (key, val) {
                var countryID = val['id'];
                var country = val['name'];
                $('#countryName').append('<option value="' + countryID + '">' + country + '</option>');
            });
        }
    }

    function tableBtnClick(btnId) {
        var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#' + btnId).parent('td').parent('tr');
        var tableId = $('#' + btnId).closest('table');

        if (btnName == 'edit') {
            var viewId = tableRow.attr('data-th');
            var name = tableRow.find('td').eq(4).text();
            $.redirect("approveWithdrawal.php",
                {
                    id: viewId,
                    clientName: name
                });
        } else if (btnName == 'reject') {
            var canvasBtnArray = Array('Ok');
            var message = "<?php echo $translations['A01159'][$language]; /* Are you sure you want to cancel this withdrawal request? */ ?>";
            showMessage(message, '', "<?php echo $translations['A01160'][$language]; /* Delete withdrawal request */ ?>", 'trash', '', canvasBtnArray);
            $('#canvasOkBtn').click(function () {
                var tableColVal = tableRow.attr('data-th');
                var row_index = tableRow.closest("tr").index();
                var formData = {
                    'command': 'adminCancelWithdrawal',
                    'withdrawalId': tableColVal,
                    'clientId': clientIdList[row_index]['clientId']
                };
                fCallback = loadCancel;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        }
    }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'withdrawalList.php');
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function setTodayDatePicker() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd;
        } 
        if(mm<10){
            mm='0'+mm;
        }
        var today = dd+'/'+mm+'/'+yyyy;
        
        $('.input-daterange-from').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('.input-daterange-from').val('');

        $('.input-daterange-to').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('.input-daterange-to').val('');
        
        return today;
    }


</script>
</body>
</html>