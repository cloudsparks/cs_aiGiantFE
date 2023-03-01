<?php 
    session_start();
    $thisPage = basename($_SERVER['PHP_SELF']);
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
                                            <form id="searchForm" role="form">

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group" id="datepicker" >
                                                            <label class="control-label" data-th="date"><?php echo $translations['A00137'][$language]; /* Date */?></label>
                                                            <div class="input-daterange input-group" id="datepicker-range">
                                                                <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="searchDate" dataType="dateRange" autocomplete="off">
                                                                <div class="input-group-addon">
                                                                    <?php echo $translations['A00139'][$language]; /* to */?>
                                                                </div>
                                                                <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="searchDate" dataType="dateRange" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00148'][$language] //Member ID ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00318'][$language]; /* Status */?>
                                                            </label>
                                                            <select id="status" class="form-control" dataName="status" dataType="text">
                                                                <option value="">
                                                                    <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                                </option>
                                                                <option value="Success"><?php echo $translations['A01073'][$language]; /* Success */?></option>
                                                                <option value="Pending"> <?php echo $translations['A01017'][$language] //Pending ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label" for="">
                                                                <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                            </label>
                                                            <span class="pull-right">
                                                                <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                                <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                                <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                                <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                            </span>
                                                            <input id="username" type="text" class="form-control" dataName="username" dataType="text">
                                                        </div>

                                                        <div class="col-sm-4 form-group" >
                                                            <label class="control-label">
                                                                <?php echo $translations['A01109'][$language] //Leader Username ?>
                                                            </label>
                                                            <input id="leaderUsername" type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                        </div>

                                                        <div class="col-sm-4 form-group" >
                                                            <label class="control-label">
                                                                <?php echo $translations['A01349'][$language] //Main Leader Username ?>
                                                            </label>
                                                            <input id="mainLeaderUsername" type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">  
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A01185'][$language] //Wallet Address ?>
                                                            </label>
                                                            <input id="walletAddress" type="text" class="form-control" dataName="walletAddress" dataType="text">
                                                        </div>                   
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A01712'][$language] //Transaction Hash ?>
                                                            </label>
                                                            <input id="trxnHash" type="text" class="form-control" dataName="trxnHash" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group" id="datepicker" >
                                                            <label class="control-label" data-th="date"><?php echo $translations['A01766'][$language] //Callback At?></label>
                                                            <div class="input-daterange input-group" id="datepicker-range">
                                                                <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="searchCallbackAt" dataType="dateRange" autocomplete="off">
                                                                <div class="input-group-addon">
                                                                    <?php echo $translations['A00139'][$language]; /* to */?>
                                                                </div>
                                                                <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="searchCallbackAt" dataType="dateRange" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A01767'][$language] //Wallet Type ?>
                                                            </label>
                                                            <select id="creditType" class="form-control" dataName="creditType" dataType="text">
                                                                <option value="">
                                                                    <?php echo $translations['A00055'][$language]; /* All */?>
                                                                </option>
                                                                <option value="usdtCredit">
                                                                    <?php echo $translations['A01734'][$language]; /* USDT */?>
                                                                </option>
                                                                <option value="rewardCredit">
                                                                    <?php echo $translations['A01714'][$language]; /* Venture Credit */?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
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

                    <div class="row">
                        <div class="col-lg-12">
                            <form>
                                <div id="basicwizard" class="pull-in" style="display: none">
                                    <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                            <a id="exportBtn" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none;"><?php echo $translations['A01352'][$language]; /* Export to xlsx */ ?></a>
                                            <a id="seeAllBtn" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none;">
                                                <?php echo $translations['A01191'][$language]; /* See All */ ?>
                                            </a>
                                        <form>
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="listingDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="listingPager"></ul>
                                            </div></form>
                                        </form>
                                    </div>
                                </div>
                            </form>
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
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        '<?php echo $translations['A00137'][$language] //Date ?>',
        '<?php echo $translations['A00148'][$language] //Member ID ?>',
        '<?php echo $translations['A00102'][$language]; /* Username */?>',
        'Crypto Type',
        // '<?php echo $translations['A01767'][$language] //Wallet Type ?>',
        '<?php echo $translations['A01349'][$language] //Main Leader Username ?>',
        '<?php echo $translations['A01109'][$language] //Leader Username ?>',
        '<?php echo $translations['A00821'][$language] //Amount ?>',
        // '<?php echo $translations['A01769'][$language] //Callback Amount ?>',
        // '<?php echo $translations['A01770'][$language] //Amount Available ?>',
        '<?php echo $translations['A00318'][$language] //Status ?>',
        'Callback Date',
        'Fail Message',
        '<?php echo $translations['A01185'][$language] //Wallet Address ?>',
        '<?php echo $translations['A01712'][$language] //Transaction Hash ?>',
    );
        
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var activityDate   = ""; 
        
    $(document).ready(function() {
        setTodayDatePicker();
        
        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
        
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
            $('#searchForm').find('select').val('');
            setTodayDatePicker();
        });

    
        $('.input-daterange input').each(function() {
                $(this).daterangepicker({
                    singleDatePicker: true,
                    timePicker: false,
                    locale: {
                        format: 'DD/MM/YYYY'
                    }
                });
                $(this).val('');
            });
    });

    $('#seeAllBtn').click(function () {
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;
        
        var formData = {
            command     : "getTronlinkListing",
            searchData  : searchData,
            pageNumber  : pageNumber,
            seeAll      : 1
        };
        
        fCallback = loadDefaultListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function exportBtn(){

        var searchId = 'searchForm';
            var searchData = buildSearchDataByType(searchId);
            var key  = Array (
                'created_at',
                'member_id',
                'username',
                'coinTypeDisplay',
                'creditDisplay',
                'mainLeaderUsername',
                'leaderusername',
                'amount',
                // 'call_back_amount',
                // 'receivable_amount',
                'status',
                'call_back_at',
                'failMsg',
                'walletAddress',
                'txID'
            );

            var formData = {
                command: "getTronlinkListing",
                filename: "FundInReport",
                searchData: searchData,
                header: thArray,
                key: key,
                DataKey: "listing",
                type: 'export',
            };
            fCallback = exportExcel;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    // function exportBtn(){

    //     var searchId = 'searchForm';
    //     var searchData = buildSearchDataByType(searchId);

    //     var exportParams = {
    //         searchData  : searchData,
    //         pageNumber  : pageNumber,
    //         seeAll      : 1,
    //         usernameSearchType  : $("input[name=usernameType]:checked").val()
    //     };
        
    //     var key  = Array (
    //         'created_at',
    //         'member_id',
    //         'username',
    //         'coinTypeDisplay',
    //         'mainLeaderUsername',
    //         'top_up_amount',
    //         'leaderusername',
    //         'call_back_amount',
    //         'receivable_amount',
    //         'status',
    //         'call_back_at',
    //         'wallet_address',
    //         'transaction_hash'
    //     );

    //     var formData  = {
    //         command     : "addExcelReq",
    //         API         : "getTronlinkListing",
    //         fileName    : "FundInReport",
    //         searchData  : searchData,
    //         params      : exportParams,
    //         headerAry   : thArray,
    //         keyAry      : key,
    //         titleKey    : "listing",
    //         type        : 'export',
    //         returnType  : 'excel',
    //         usernameSearchType : $("input[name=usernameType]:checked").val()
    //     };
        
    //     fCallback = exportExcel;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // }

    
    function loadDefaultListing(data, message) {
        // console.log(data);

        $('#basicwizard').show();

        // if (data) {
        //     $("#exportBtn").show();
        // } else {
        //     $("#exportBtn").hide();
        // }
        $("#exportBtn").show();
        $("#seeAllBtn").show();

        // if (data.totalPage >= 1) {
        //     $("#seeAllBtn").show();
        // } else {
        //     $("#seeAllBtn").hide();
        // }
        
        var listing = data.listing;
        if (listing){
            var newData = [];
            $.each(listing, function(k, v){
                var leaderNameVal = v['leaderusername'] ? v['leaderusername'] : "-"
                var rebuild = {
                    created_at              : v['created_at'],
                    member_id               : v['memberID'],
                    username                : v['username'],
                    coinTypeDisplay         : v['coinTypeDisplay'], 
                    // walletTypeDisplay       : v['creditDisplay'],
                    mainLeaderUsername      : v['mainLeaderUsername'],
                    leaderusername          : leaderNameVal,
                    amount                  : numberThousand(v['amount'],2), 
                    // call_back_amount        : numberThousand(v['call_back_amount'],2),
                    // receivable_amount       : numberThousand(v['receivable_amount'],2),
                    status                  : v['status'],
                    call_back_at            : v['call_back_at'],
                    failMsg                 : v['failMsg'],
                    walletAddress          : v['walletAddress'],
                    txID                    : v['txID']
                };

                newData.push(rebuild);
            });
        }

        var tableNo;
        buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        
        $('#' + tableId).find('tr').each(function () {
            $(this).find('td:eq(7), th:eq(7)').css('text-align', "right");
            $(this).find('td:eq(8), th:eq(8)').css('text-align', "right");
            $(this).find('td:eq(9), th:eq(9)').css('text-align', "right");
        });

        if(typeof(data.activityTypeList) != 'undefined') {
            var selection = $('#searchForm #activityType').val();
            // Set the Command dropdown in Search section
            var searchDropdown = data.activityTypeList;
            setSearchOption(searchDropdown, selection);
        }

        if(data.grandTotal) {
            if (data.grandTotal.tronUSDT) {
                $('#' + tableId).find('tbody').append(`
                <tr style="">
                    <td colspan='7' class="text-right"><b><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</b></td>
                    <td> ${numberThousand(data.grandTotal.tronUSDT.topUpAmount, 2)} </td>
                    <td>${numberThousand(data.grandTotal.tronUSDT.callBackAmount, 2)} </td>
                    <td>${numberThousand(data.grandTotal.tronUSDT.receivableAmount, 2)} </td>
                    <td colspan='10'></td>
                </tr>
            `);
            }
        }
    }


    // function tableBtnClick(btnId) {

    //     var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
    //     var tableRow = $('#'+btnId).parent('td').parent('tr');
    //     var tableId  = $('#'+btnId).closest('table');

    //     if (btnName == 'withdrawal'){
    //         var id = tableRow.attr('data-th');
    //         $("#storePortfolioID").val(id);
    //         var formData = {
    //             command     : "validateAddCapitalWithdrawal",
    //             portfolioID : id
    //         };
    //         fCallback = redirectWithdrawal;
    //         ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    //     }

    //     else if (btnName == 'view'){
    //         var id = tableRow.attr('data-th');
    //         $("#storePortfolioID").val(id);
    //         // alert('XD');
    //         var formData = {
    //             command : "getLoanDetails",
    //             referenceID  : id ,
    //         };
            
    //         // console.log(formData);
            
    //         fCallback = showLoanDetails;
    //         ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    //     }
    // }
    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;

        $("#seeAllBtn").show();
        
        var formData = {
            command      : "getTronlinkListing",
            searchData    : searchData,
            pageNumber   : pageNumber,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
        
        // if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    // function pagingCallBack(page){
    //     page = parseInt(page ? page : 1);
    //     console.log("pageNumber : " + page + " " + "totalPage : " + totalPage);

    //     onloaded = 0;
    //     bypassLoading = 0;

    //     if(document.getElementById('seeAll').checked) {
    //         onloaded = 1;
    //     }

    //     if(page > 1){
    //         if(onloaded == 1){
    //             bypassLoading = 1;
    //             if(page > totalPage) return;
    //         }
    //     }

    //     var searchData = buildSearchDataByType(searchId);
    //     var formData   = {
    //         command     : "getTronlinkListing",
    //         pageNumber  : page,
    //         onloaded    : onloaded,
    //         searchData   : searchData,
    //         usernameSearchType : $("input[name=usernameType]:checked").val()
    //     };
            
    //     fCallback = loadDefaultListing;
    //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    // }
    

    // Set the default date which is today.
    // Set the timepicker
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
        
        $('#searchDate').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        var dateToday = $('#searchDate').val('');

        $('#timeFrom').timepicker({
            defaultTime : '',
            showSeconds: true
        });
        $('#timeTo').timepicker({
            defaultTime : '',
            showSeconds: true
        });

        return dateToTimestamp(today);
    }

    // Set the activity type dropdown in the search part
    function setSearchOption(data, searchVal) {
        $('#searchForm #activityType').find('option:not(:first-child)').remove();
        $.each(data, function(key, val) {
            $('#searchForm #activityType').append('<option value="' + val['activityType'] + '">' + val['activityType'] + '</option>');
        });
        if (searchVal != ' '){
            $('#searchForm #activityType').val(searchVal);
        }
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