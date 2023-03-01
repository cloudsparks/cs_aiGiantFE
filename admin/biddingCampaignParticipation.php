<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
$thisUrl = $_SERVER['REQUEST_URI'];
$pathInfo = pathinfo($thisUrl);

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
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00112'][$language]; /* Created At */?>
                                                        </label>
                                                        <div class="input-group input-daterange">
                                                            <input type="text" class="form-control input-daterange-to" dataName="date_range" dataType="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; //To ?>
                                                            </span>
                                                            <input type="text" class="form-control input-daterange-to" dataName="date_range" dataType="dateRange">
                                                        </div>
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
                                                        <label class="control-label" for="">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input id="memberID" type="text" class="form-control" dataName="memberID" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="">
                                                        <?php echo $translations['A01697'][$language] //Bid Title ?>
                                                        </label>
                                                        <input id="bidTitle" type="text" class="form-control" dataName="bidTitle" dataType="text">
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
                            <div id="basicwizard" class="pull-in">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="listingDiv" class="table-responsive overflowX"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <a 
                            onclick="payConfirmation()" 
                            type="button" 
                            class="btn btn-primary waves-effect w-md waves-light m-b-20" 
                            data-lang="A01689"
                            style="display:none;"
                            id="payButton"
                        >
                            Pay
                        </a>
                    </div>
                </div>
                
            </div>

            <!-- edit campaign modal -->
            <div class="modal fade" id="payParticipation" role="dialog">
                <div class="modal-dialog modal-xs" role="document">
                    <div class="modal-content">
                        <div>
                            <h4>
                            <?php echo $translations['A01706'][$language]; /* Pay Participation Confirmation */ ?>
                            </h4>
                        </div>
                        <form id="editCampaignForm" role="form">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label class="control-label">
                                        <?php echo $translations['A01707'][$language]; /* Participation Amount: */ ?>
                                        </label>
                                        <label id="participationAmount">
                                        </label>
                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label class="control-label">
                                        <?php echo $translations['A01708'][$language]; /* Profit Gain (%) Entitlement: */ ?>
                                        </label>
                                        <label id="profitGain">
                                        </label>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-4 form-group">
                                        <label class="control-label">
                                        <?php echo $translations['A01709'][$language]; /* Total Paid Amount: */ ?>
                                        </label>
                                        <label id="paidAmount">
                                        </label>
                                    </div>
                                
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button 
                                id="canvasCloseBtn" 
                                type="button" 
                                class="btn btn-primary waves-effect waves-light" 
                                data-dismiss="modal"
                                data-lang="A00742"
                            >
                                <?php echo $translations['A00742'][$language]; /* Close */ ?>
                            </button>
                            <button 
                                id="canvasCloseBtn" 
                                type="button" 
                                class="btn btn-primary waves-effect waves-light" 
                                data-dismiss="modal" 
                                onclick="confirmPayment()"
                                data-lang="A00323"
                            >
                                <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of edit campaign modal -->
        </div>
        <?php include("footer.php"); ?>
    </div>
</div>
<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>
    var url       = 'scripts/reqBiddingCampaign.php';
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray ={}
    var rowId;
    var thArray  = Array(
        'ID',
        `<div class="checkbox checkbox-primary campaign-checkbox0 campaign-participate-checkbox">
            <input id="selectAll" type="checkbox" class="selectUser" value=true>
                <label></label>
            </input>
        </div>`,
        '<?php echo $translations['A01745'][$language] //Participation Date ?>',
        '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
        '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
        '<?php echo $translations['A01697'][$language] //Bid Title ?>',
        '<?php echo $translations['A01746'][$language] //Participation Amount ?>',
        '<?php echo $translations['A01686'][$language] //Profit Gain (%) ?>',
        '<?php echo $translations['A01747'][$language] //Actual Payout ?>',
        '<?php echo $translations['A00279'][$language] //Invoice ?>',
        '<?php echo $translations['A01736'][$language] //Transaction ID?>',
        '<?php echo $translations['A01748'][$language] //Receivable Status ?>'
    );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var selectedUser = [];
    var userIdList = [];

    $(document).ready(function() {

        setTodayDatePicker()

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function() {
                $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
            });
        });

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
            selectedUser = [];
        });
    });

    function loadDefaultListing(data, message) {
        var tableNo;

        $('#basicwizard').show();

        if (data) {
            $('#payButton').show(); 
        } else {
            $('#payButton').hide();
        }

        var campaignReport = data.campaignReport;

        if(data != "" && campaignReport.length>0) {
            var newList = [];
            var invoice;
            var checkbox
            userIdList = []

            $.each(campaignReport, function(k, v) {

                if(v['invoice'] == '') {
                    invoice = '-'
                }else {
                    invoice = v['invoice']
                }
                
                if(v['payable'] == 1) {
                    userIdList.push(v['id'])
                    checkbox = `
                    <div class="checkbox checkbox-primary campaign-participate-checkbox">
                        <input type="checkbox" class="selectUser" value=${v['id']}>
                            <label></label>
                        </input>
                    </div>
                `;
                }else {
                    checkbox = ''
                }

                var rebuildData = {
                    id: v['id'],
                    checkbox: checkbox,
                    join_date : v['date'],
                    username : v['username'],
                    fullname : v['fullname'],
                    memberID : v['memberID'],
                    bidTitle : v['title'],
                    participatingamount: numberThousand(v['participatingamount'],2),
                    profit: v['profitgain'],
                    totalcampaigndividend: numberThousand(v['totalcampaigndividend'],2),
                    invoice: invoice,
                    transaction_id: v['transactionID'],
                    receivableStatus: v['receivableStatus']
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('tr').each(function(){
            $(this).find('th:first-child,td:first-child').hide();
            $(this).find('td:nth-child(2)').css('text-align','center');
        })

        $('#'+ tableId).find('tbody tr').each(function(){
            $(this).find('td:last-child','td:nth-child(2)').css('text-align','center');
        }); 

        $('#'+ tableId).find('tbody tr th').each(function(){
            $(this).find('td:nth-child(2)').css('text-align','center');
            $(this).find('td:last-child','th:last-child').hide();
        }); 

        $('input[type=checkbox]').change(
            function(){
                if($(this)[0].checked) {
                    selectedUser.push($(this).val())
                }else {
                    selectedUser = selectedUser.filter((val)=>{
                        if(val != $(this).val()) {
                            return val
                        }
                    })
                }
            }
        )

        $('#selectAll').change(function(){
            if($(this)[0].checked) {
                selectedUser = userIdList  
                $('input[type=checkbox]').attr('checked', true);
            }else {
                selectedUser = []
                $('input[type=checkbox]').attr('checked', false);
            }
        })

    }


    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command    : "campaignParticipationListing",
            inputData  : searchData,
            pageNumber: pageNumber,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
        if(!fCallback)
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

    function payConfirmation() {
        var formData = {
            command    : "adminPayCampaignParticipation",
            id: selectedUser,
            step: "1"
        };

            fCallback = confirmStepTwo;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function confirmStepTwo(data, message) {
        $('#participationAmount').html(data['part_Amount'])
        $('#profitGain').html(data['part_Percentage'])
        $('#paidAmount').html(data['part_TotalPaidAmount'])

        $('#payParticipation').modal('show')
    }

    function confirmPayment() {
        var formData = {
            command    : "adminPayCampaignParticipation",
            id: selectedUser,
            step: "2"
        };

        fCallback = successPayment;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function successPayment(data,message) {
        var status;
        if(message == 'Already paid!') {
            status = 'warning'
        }else {
            status = 'success'
        }
        showMessage(
            message,
            status, 
            "Paid",
            status, 
            'biddingCampaignParticipation.php'
        );
    }
    

</script>
</body>
</html>
