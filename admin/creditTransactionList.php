<?php
    session_start();


    include_once("mobileDetect.php");
    $detect = new Mobile_Detect;


    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    // $_SESSION['lastVisited'] = $thisPage;
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
            <!-- Start container -->
            <div class="container">
                <!-- Start row -->
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
                                                        <label class="control-label" for="">
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                        </label>
                                                        <input id="fullName" type="text" class="form-control"
                                                               dataName="fullName" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="">
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
                                                        <input id="username" type="text" class="form-control"
                                                               dataName="username" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input id="memberId" type="text" class="form-control"
                                                               dataName="memberId" dataType="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="">
                                                            <?php echo $translations['A00565'][$language]; /* Transaction Type */ ?>
                                                        </label>
                                                        <select id="transactionType" class="form-control"
                                                                dataName="transactionType" dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <?php foreach($_SESSION["transactionTypeList"] as $key => $value) { ?>
                                                                <option value="<?php echo $value['name']; ?>">
                                                                    <?php echo $value['display']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="">
                                                            <?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>
                                                        </label>
                                                        <input id="mainLeaderUsername" type="text" class="form-control"
                                                               dataName="mainLeaderUsername" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01109'][$language]; /* Leader Username */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="leaderUsername"
                                                               dataType="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="">
                                                            <?php echo $translations['A00854'][$language]; /* To/From Username */ ?>
                                                        </label>
                                                        <input id="toFromId" type="text" class="form-control"
                                                               dataName="toFromId" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00564'][$language]; /* Transaction Date */ ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div>
                                                                <input id="dateFrom" type="text" class="form-control"
                                                                       dataName="searchDate" dataType="dateRange">
                                                            </div>
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                            </span>
                                                            <div>
                                                                <input id="dateTo" type="text" class="form-control"
                                                                       dataName="searchDate" dataType="dateRange">
                                                            </div>
                                                        </div>
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
                <!-- End row -->
                <!-- Start row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <div class="card-box p-b-0"> -->
                        <button id="exportBtn" type="button" onclick="exportBtn()"
                                class="btn btn-primary waves-effect waves-light m-b-rem1"
                                style="display: none"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></button>
                        <button id="seeAllBtn" type="button" onclick="seeAllBtn()"
                                class="btn btn-primary waves-effect waves-light m-b-rem1"
                                style="display: none"><?php echo $translations['A01191'][$language]; /*See All*/ ?></button>
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: none">
                                <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="listingDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- </div> -->
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
    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var pagerId = 'listingPager';
    var btnArray = {};
    var type = "<?php echo $_GET['type'];?>";
    if (type == "flexiCredit") {
        var thArray = Array(
            '<?php echo $translations['A00564'][$language]; /* Transaction Date */?>',
            '<?php echo $translations['A00102'][$language]; /* Username */?>',
            '<?php echo $translations['A00117'][$language]; /* Full Name */?>',
            "<?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>",
            '<?php echo $translations['A00565'][$language]; /* Transaction Type */?>',
            'Coin Type',
            '<?php echo $translations['A00861'][$language]; /* To/From */?>',
            '<?php echo $translations['A00862'][$language]; /* Credit In */?>',
            '<?php echo $translations['A00863'][$language]; /* Credit Out */?>',
            '<?php echo $translations['A00207'][$language]; /* Balance */?>',
            '<?php echo $translations['A00147'][$language]; /* Done By */?>',
            '<?php echo $translations['A00571'][$language]; /* Remark */?>'
        );
    } else {
        var thArray = Array(
            '<?php echo $translations['A00564'][$language]; /* Transaction Date */?>',
            '<?php echo $translations['A00102'][$language]; /* Username */?>',
            '<?php echo $translations['A00117'][$language]; /* Full Name */?>',
            "<?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>",
            '<?php echo $translations['A00565'][$language]; /* Transaction Type */?>',
            '<?php echo $translations['A00861'][$language]; /* To/From */?>',
            '<?php echo $translations['A00862'][$language]; /* Credit In */?>',
            '<?php echo $translations['A00863'][$language]; /* Credit Out */?>',
            '<?php echo $translations['A00207'][$language]; /* Balance */?>',
            '<?php echo $translations['A00147'][$language]; /* Done By */?>',
            '<?php echo $translations['A00571'][$language]; /* Remark */?>'
        );
    }

    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqClient.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var formData = "";
    var fCallback = "";
    var searchId = 'searchForm';


    $(document).ready(function () {

        setTodayDatePicker();

        $("body").keyup(function (event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        // formData  = {
        //     command : 'getCreditTransactionList',
        //     type    : type
        // };
        // fCallback = loadDefaultListing;
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
                setTodayDatePicker();
            });

        });

        $('#searchBtn').click(function () {
            pagingCallBack(pageNumber, loadSearch);
        });

        // $('#exportBtn').click(function() {
        //     var searchId   = 'searchTransaction';
        //     var searchData = buildSearchDataByType(searchId);
        //     var thArray = Array(
        //         "Transaction Date",
        //         // "Leader Username",
        //         "Username",
        //         "Full Name",
        //         "Transaction Type",
        //         "To/From",
        //         "Credit In",
        //         "Credit Out",
        //         "Balance",
        //         "Done By",
        //         "Remark"
        //      );
        //     var key  = Array (
        //        'created_at',
        //        'username',
        //        'name',
        //        'subject',
        //        'to_from',
        //        'credit_in',
        //        'credit_out',
        //        'balance',
        //        'creator_id',
        //        'remark'
        //     );
        //     var formData  = {
        //         command    : "getCreditTransactionList",
        //         filename   : "CreditReport",
        //         inputData  : searchData,
        //         header     : thArray,
        //         key        : key,
        //         DataKey    : "transactionList",
        //         type    : type

        //     };
        //      $.redirect('exportExcel2.php', formData);
        // });

        //  $('#searchTransaction').keypress(function(e){
        //     if(e.which == 13){//Enter key pressed
        //         $('#searchBtn').click();//Trigger enter button click event
        //     }
        // }); 
    });

    function exportBtn() {
        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        var exportParams = {
            searchData  : searchData,
            creditType  : type,
            pageNumber  : pageNumber,
            seeAll      : 1,
            usernameSearchType  : $("input[name=usernameType]:checked").val()
        };

        var thArray = Array(
            "Transaction Date",
            // "Leader Username",
            "Username",
            "Full Name",
            "Main Leader Username",
            "Transaction Type",
            "To/From",
            "Credit In",
            "Credit Out",
            "Balance",
            "Done By",
            "Remark"
        );
        var key = Array(
            'created_at',
            'username',
            'name',
            'mainLeaderUsername',
            'subject',
            'to_from',
            'credit_in',
            'credit_out',
            'balance',
            'creator_id',
            'remark'
        );
        var formData = {
            command     : "addExcelReq",
            API         : "getCreditTransactionList",
            fileName    : "CreditReport_"+type,
            searchData  : searchData,
            creditType  : type,
            params      : exportParams,
            headerAry   : thArray,
            keyAry      : key,
            titleKey    : "transactionList",
            type        : 'export',
            returnType  : 'excel',
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function seeAllBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData = {
            command: 'getCreditTransactionList',
            searchData: searchData,
            creditType: type,
            pageNumber: 1,
            seeAll: 1
        };

        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard').show();
        $('#seeAllBtn').show();
        $('#exportBtn').show();
        $('.page-title').empty().append(data.creditHeader + ' Credit Transaction List');
        var tableNo;
        if (data.transactionList) {
            if (data.transactionList && type == "flexiCredit") {
                var newList = [];
                $.each(data.transactionList, function (k, v) {
                    var rebuildData = {
                        created_at: v['created_at'],
                        username: v['username'],
                        name: v['name'],
                        mainLeaderUsername: v['mainLeaderUsername'],
                        subject: v['subject'],
                        type: v['type'],
                        to_from: v['to_from'],
                        credit_in: addCormer(v['credit_in']),
                        credit_out: v['credit_out'],
                        balance: v['balance'],
                        creator_id: v['creator_id'],
                        remark: v['remark']
                    };
                    newList.push(rebuildData);
                });
            } else {
                var newList = [];
                $.each(data.transactionList, function (k, v) {
                    var rebuildData = {
                        created_at: v['created_at'],
                        username: v['username'],
                        name: v['name'],
                        mainLeaderUsername: v['mainLeaderUsername'],
                        subject: v['subject'],
                        to_from: v['to_from'],
                        credit_in: addCormer(v['credit_in']),
                        credit_out: v['credit_out'],
                        balance: v['balance'],
                        creator_id: v['creator_id'],
                        remark: v['remark']
                    };
                    newList.push(rebuildData);
                });
            }
        } else {
            $("#" + divId).empty();
            $("#pageFundInList").empty();
            $("#paginateText").empty();
            $('#alertMsg').addClass('alert-success').html("<span>No Result Found.</span>").show();
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId).find('tbody tr').each(function () {
            $(this).find('td:eq(7)').css('text-align', "right");
            $(this).find('td:eq(8)').css('text-align', "right");
            $(this).find('td:eq(9)').css('text-align', "right");
        });

        // if (typeof (data.transactionList) != 'undefined') {
        //     var selectTransactionType = $('#searchForm #transactionType').val();
        //     // Set the Command dropdown in Search section
        //     var searchDropdown = data.transactionType;
        //     setSearchCommand(searchDropdown, selectTransactionType);
        // }
    }

    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command: 'getCreditTransactionList',
            creditType: type,
            pageNumber: pageNumber,
            searchData: searchData,
            usernameSearchType: $("input[name=usernameType]:checked").val()
        };
        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>' + '<?php echo $translations['A00114'][$language]; /* Search successful. */?>' + '</span>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    // Set the default date which is today.
    // Set the timepicker
    function setTodayDatePicker() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = dd + '/' + mm + '/' + yyyy;

        $('#dateFrom').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY 00:00:00'
            }
        });
        $('#dateFrom').val('');

        $('#dateTo').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY 23:59:59'
            }
        });
        $('#dateTo').val('');

        return today;
    }

    // Set the command dropdown in the search part
    // function setSearchCommand(data, searchVal) {
    //     $('#searchForm #transactionType').find('option:not(:first-child)').remove();
    //     $.each(data, function (key, val) {
    //         $('#searchForm #transactionType').append('<option value="' + val['type'] + '">' + val['type'] + '</option>');
    //     });
    //     if (searchVal != ' ')
    //         $('#searchForm #transactionType').val(searchVal);
    // }


</script>
</body>
</html>
