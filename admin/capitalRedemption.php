<?php 
    session_start(); 
    $countryList = $_SESSION['countryList'];
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
                                                            <?php echo $translations['A00137'][$language]; /* Date */ ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-daterange-from"
                                                                   dataName="date" dataType="dateRange"/>
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to"
                                                                   dataName="date" dataType="dateRange"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
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
                                                    <!-- <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01109'][$language]; /* Leader Username */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                    </div> -->
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="row">
                                                     <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                            </label>
                                                            <select id="status" class="form-control" dataName="status"
                                                                    dataType="text">
                                                                <option value="">
                                                                    <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                                </option>
                                                                <option value="Terminated"> <?php echo $translations['A01131'][$language]; /* terminated */ ?></option>
                                                                <option value="Released">Released</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>

                                            <!-- <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00926'][$language]; /* Maturity Date */ ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-daterange-from"
                                                                   dataName="maturityDate" dataType="dateRange"/>
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00927'][$language]; /* to */ ?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to"
                                                                   dataName="maturityDate" dataType="dateRange"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                           
                                        </form>

                                        <div class="col-xs-12" style="margin-top: 10px">
                                            <button id="searchBtn" type="submit"
                                                    class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button type="submit" id="resetBtn"
                                                    class="btn btn-default waves-effect waves-light">
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
                        <div id="basicwizard" class="pull-in" style="display:none">
                            <div class="tab-content b-0 m-b-0 p-t-0">
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="detectSeeAll" value="0">
        <?php include("footer.php"); ?>
    </div>
</div>

<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>
                    <span style="font-size: 20px;">Rebate Bonus</span>
                </h4>
            </div>
            <div class="modal-body" style="">
                <div id="alertMsg2" class="text-center alert" style="display: none;"></div>
                <div id="portfolioRebateListingDiv" class="table-responsive"></div>
                <span id="paginateText"></span>
                <div class="text-center">
                    <ul class="pagination pagination-md" id="portfolioRebateListingPager"></ul>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="releaseModal" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>
                    <span style="font-size: 20px;">Release Record</span>
                </h4>
            </div>
            <div class="modal-body" style="">
                Are you sure to release this record?
            </div>
            <div class="modal-footer">
                <div class="col-12 text-center">
                    <button id="confirmBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00123'][$language]; /*Confirm*/ ?></button>
                    <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="releaseModalConfirmation" role="dialog">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>
                    <span style="font-size: 20px;">Release Record</span>
                </h4>
            </div>
            <div class="modal-body" style="">
                <div id="amountDisplay" class="form-group m-t-10">
                    
                </div>
                <div class="form-group m-t-15">
                    <div id="returnStatus" class="m-b-20">
                        <div class="radio radio-info radio-inline">
                            <input id="capital" type="radio" value="0" name="statusRadio" checked="checked"/>
                            <label for="capital">
                                Capital Wallet
                            </label>
                        </div>
                        <div class="radio radio-inline spHide" style="margin-left: 50px;">
                            <input id="capitalSp" type="radio" value="1" name="statusRadio"/>
                            <label for="capitalSp">
                                Capital + SP Wallet
                            </label>
                        </div>
                    </div>
                    <span id="statusError" class="errorSpan text-danger"></span>
                </div>
                
            </div>
            <div class="modal-footer">
                <div class="col-12 text-center">
                    <button id="confirmReleaseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00123'][$language]; /*Confirm*/ ?></button>
                    <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>

    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var pagerId = 'listingPager';
    var btnArray = {};
    var thArray = Array(
        "Termination Date",
        "Member ID",
        "<?php echo $translations['A00102'][$language]; /* Username */?>",
        "Purchase Portfolio Date",
        "Package Unit",
        "Purchase Package Unit Price",
        "Package Amount (USD)",
        "Percentage Rebate Penalty",
        "Amount Rebate Penalty",
        "View Details",
        "Status",
        "Release"
    );
    var divId2 = 'portfolioRebateListingDiv';
    var tableId2 = 'portfolioRebateListingTable';
    var pagerId2 = 'portfolioRebateListingPager';
    var btnArray2 = {};
    var thArray2 = Array(
        "Date",
        "Unit Price",
        "Rebate Amount"
    );

    var method = 'POST';
    var url = 'scripts/reqAdmin.php';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var offsetSecs = getOffsetSecs();
    var currentID = "";

    $(document).ready(function () {

        setTodayDatePicker();

        $("body").keyup(function (event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        $('#resetBtn').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function () {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
            });
        });

        $('#searchBtn').click(function () {
            pagingCallBack(pageNumber, loadSearch);
        });

    });

    function exportBtn() {
        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        var exportParams = {
            searchData  : searchData,
            pageNumber  : pageNumber,
            seeAll      : 1,
            usernameSearchType  : $("input[name=usernameType]:checked").val()
        };

        var thArray = Array(
            "Termination Date",
            "Member ID",
            "<?php echo $translations['A00102'][$language]; /* Username */?>",
            "Purchase Portfolio Date",
            "Package Unit",
            "Purchase Package Unit Price",
            "Package Amount (USD)",
            "Percentage Rebate Penalty",
            "Amount Rebate Penalty",
            "Status"
        );
        
        var key = Array(
            'withdraw_at',
            'member_id',
            'username',
            'created_at',
            'bonus_value',
            'unit_rate',
            'priceInUSD',
            'penalty_percentage',
            'rebate_penalty_amount',
            'status'
        );

        var formData = {

            command     : "addExcelReq",
            API         : "getCapitalRedemptionListing",
            fileName    : "CapitalRedemptionListingReport",
            searchData   : searchData,
            params      : exportParams,
            headerAry   : thArray,
            keyAry      : key,
            titleKey    : "listing",
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
            command         : 'getCapitalRedemptionListing',
            searchData      : searchData,
            pageNumber      : 1,
            seeAll          : 1
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        $('#basicwizard').show();

        if (data) {
            $("#exportBtn").show();
        } else {
            $("#exportBtn").hide();
        }

        if (data.totalPage > 1) {
            $("#seeAllBtn").show();
        } else {
            $("#seeAllBtn").hide();
        }

        var tableNo;
        var listing = data.listing;

        // date: "28/10/2021 13:48:25"
        // member_id
        // username: "aaron02"
        // units: "1000.00"
        // matureAt: "-"
        // statusDisplay: "Active"
        
        // amount: "0.00"
        // matureAtCountDown: "-"
        // refNo: "33623306"
        // status: "Active"

        // Date|  Status| Member Id |  Username | Package (Units) | Mature Date

        if (data != "" && listing.length > 0) {
            var newData = [];
            $.each(listing, function (k, v) {
                var viewBtn = `
                    <a data-toggle="tooltip" title="" onclick="viewRecord('${v['id']}', pageNumber)" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="View" aria-describedby="tooltip645115"><i class="fa fa-eye"></i></a>
                `;

                if (v['status'] == "Released") {
                    var releaseBtn = `
                        -
                    `;
                } else {
                    var releaseBtn = `
                        <a data-toggle="tooltip" title="" onclick="releaseRecord('${v['id']}')" class="btn btn-icon waves-effect waves-light btn-primary" data-original-title="View" aria-describedby="tooltip645115"><i class="fa fa-edit"></i></a>
                    `;
                }
                

                var rebuild = {
                    withdraw_at: v['withdraw_at'],
                    member_id: v['member_id'],
                    username: v['username'],
                    created_at : v['created_at'],
                    bonus_value : numberThousand(v['bonus_value'], 2),
                    unit_rate: numberThousand(v['unit_rate'], 2),
                    priceInUSD: numberThousand(v['priceInUSD'], 2),
                    penalty_percentage: v['penalty_percentage']?numberThousand(v['penalty_percentage'], 2):"-",
                    rebate_penalty_amount: numberThousand(v['rebate_penalty_amount'], 2),
                    viewBtn: viewBtn,
                    status: v['status'],
                    releaseBtn: releaseBtn
                };

                newData.push(rebuild);
            });
        }

        buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId).find('tbody tr').each(function () {
            $(this).find('td:eq(4)').css('text-align', "right");
            $(this).find('td:eq(5)').css('text-align', "right");
            $(this).find('td:eq(6)').css('text-align', "right");
            $(this).find('td:eq(7)').css('text-align', "right");
            $(this).find('td:eq(8)').css('text-align', "right");
            $(this).find('td:eq(9)').css('text-align', "center");
            $(this).find('td:eq(11)').css('text-align', "center");
        });
    }

    function viewRecord(id, pageNumber) {
        if (pageNumber > 1) bypassLoading = 1;
        var formData  = {
            command         : 'getTerminatePortfolioRebate',
            portfolio_id    : id,
            pageNumber      : pageNumber

        };
        fCallback = openViewTable;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function releaseRecord(id) {
        currentID = id;
        formData = {
            command         : 'releaseTerminatePortfolioCapital',
            portfolio_id    : id
        };

        fCallback = showReleaseConfirmationModal;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
    }

    function showReleaseConfirmationModal(data, message) {
        $('#releaseModal').modal('hide');
        $('#releaseModalConfirmation').modal('show');

        if (data.spExist == 0) {
            $('.spHide').hide();

            $('#amountDisplay').html(`
                    <div class="m-b-20 col-lg-12">
                        <span>
                            Total Capital :
                        </span>
                        <b class="m-l-rem1">${data.capitalOnlyTotal}</b>
                    </div>
            `);
        } else if (data.spExist == 1) {
            $('.spHide').show();

            $('#amountDisplay').html(`
                    <div class="m-b-20 col-lg-12">
                        <span>
                            Total SP :
                        </span>
                        <b class="m-l-rem1">${data.spTotal}</b>
                    </div>
                    <div class="m-b-20 col-lg-12">
                        <span>
                            Total Capital :
                        </span>
                        <b class="m-l-rem1">${data.capitalTotal}</b>
                    </div>
            `);
        }
        

        $('#confirmReleaseBtn').click(function() {

            var isSelected = $('#returnStatus').find('input[type=radio]:checked').val();

            formData = {
                command         : 'releaseTerminatePortfolioCapital',
                portfolio_id    : currentID,
                step            : 2,
                isSelected      : isSelected
            };

            fCallback = releaseCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
        
    }

    function modalPagination(pagerId, pageNumber, totalPage, totalRecord, numRecord) {
        var pager = $('#'+pagerId);
        var endRow = pageNumber * numRecord;
        var startRow = endRow - numRecord + 1;
        
        var pagerSize = 10;
        var pagerLeftInterval = 4;
        var pagerRightInterval = 4;
        
        var spanText = pager.parent('div').prev();
        spanText.html('');
        pager.find('li').remove();
        if(!totalPage) return;

        if (endRow > totalRecord)
            endRow = totalRecord;

        var paginateMsg = translations['A00060'][language]; /* Showing %%from%% - %%to%% of %%total%% records. */ 
        
        var findText = ['%%from%%', '%%to%%', '%%total%%'];
        var replaceText = [startRow, endRow, totalRecord];
        
        $.each(findText, function(k, val) {
            paginateMsg = paginateMsg.replace(val, replaceText[k], paginateMsg);
        });
        
        spanText.html(paginateMsg);
        // spanText.html('Showing ' + startRow + ' - ' + endRow + ' of ' + totalRecord + ' records.');

        if(pagerSize > totalPage) {
            pagerSize = totalPage;
        }

        if(pageNumber > 1) {
            var paginateFirst = translations['A00058'][language]; /* First */
            pager.append('<li class="link"><a href="#" class="firstLink">'+paginateFirst+'</a></li>');
            pager.append('<li class="link"><a href="#" class="prevLink">«</a></li>');
        }
        var curr = 0;
        while(totalPage > curr && totalPage > 1) {
            pager.append('<li><a href="#" class="pageLink">'+(curr+1)+'</a></li>');
            curr++;
        }
        if(pageNumber < totalPage) {
            var paginateLast = translations['A00059'][language]; /* Last */
            pager.append('<li class="link"><a href="#" class="nextLink">»</a></li>');
            pager.append('<li class="link"><a href="#" class="lastLink">'+paginateLast+'</a></li>');
        }
        
        function paginateNum(pageNum) {
            pager.find('li').not('.link').hide();
            pageNum-=1;
            var pagerMin = pageNum - pagerLeftInterval;
            var pagerMax = pageNum + pagerRightInterval;
            if(pagerMin < 0) {
                pagerMin = 0;
                pagerMax = pagerSize;
            }
            pager.find('li').not('.link').slice(pagerMin, pagerMax+1).show();
        }
        
        var eq = parseInt(pageNumber)-1;

        pager.find('li').not('.link').eq(eq).addClass("active");
        paginateNum(parseInt(pageNumber));
        
        pager.find('.pageLink').click(function() {
            var pageNum = $(this).html().valueOf();
            goPage(pageNum);

        });
        pager.find('.prevLink').click(function() {
            var pageNum = parseInt(pager.find('li.active a').text())-1;
            goPage(pageNum);
        });
        pager.find('.nextLink').click(function() {
            var pageNum = parseInt(pager.find('li.active a').text())+1;
            goPage(pageNum);
        });
        pager.find('.firstLink').click(function() {
            var pageNum = 0;
            goPage(pageNum);
        });
        pager.find('.lastLink').click(function() {
            var pageNum = totalPage;
            goPage(pageNum);
        });
        
        function goPage(pageNum) {
            paginateNum(pageNum);
            pager.children().removeClass("active");
            pager.children().eq(pageNum+1).addClass("active");
            viewRecord(currentID, pageNum);
        }
    }

    function openViewTable(data, message) {
        $("#viewModal").modal("show");
        var tableNo;

        if(data.bonusList) {

            var newList = [];
            $.each(data.bonusList, function (k, v) {
                var rebuildData = {
                    bonusDate       : v['bonusDate'],
                    unit_rate       : v['unit_rate'],
                    payable_amount  : v['payable_amount']
                };
                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId2, divId2, thArray2, btnArray2, message, tableNo);
        modalPagination(pagerId2, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId2).find('tbody tr').each(function () {
            $(this).find('td:eq(1)').css('text-align', "right");
            $(this).find('td:eq(2)').css('text-align', "right");
        });
    }

    function releaseCallback(data, message) {
        showMessage(message, 'success', 'Release Capital Redemption', 'success', 'capitalRedemption.php');
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<?php echo $translations['A00114'][$language]; /* Search successfully */?>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback) {

        if (pageNumber > 1) bypassLoading = 1;

        $("#seeAllBtn").show();

        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command: "getCapitalRedemptionListing",
            pageNumber: pageNumber,
            searchData: searchData,
            usernameSearchType: $("input[name=usernameType]:checked").val()
        };
        fCallback = loadDefaultListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

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
