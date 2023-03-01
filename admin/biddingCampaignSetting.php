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
                                                    <!--
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00112'][$language]; /* Created At */?>
                                                        </label>
                                                        <div class="input-group input-daterange">
                                                            <input type="text" class="form-control input-daterange-to" dataName="date" dataType="singleDate"> 
                                                        </div>
                                                    </div> -->

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
                                                            <?php echo $translations['A01697'][$language] //Bid Title ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="name" dataType="text">
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
                                    <div id="listingDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- reject campaign modal -->
            <div class="modal fade" id="rejectCampaign" role="dialog">
                <div class="modal-dialog modal-xs" role="document">
                    <div class="modal-content">
                        <div>
                            <h4 data-lang="A00250">
                                <?php echo $translations['A00250'][$language]; /* Confirmation */ ?>
                            </h4>
                        </div>
                        <div class="modal-input">
                            <div class="col-sm-6 form-group">
                                <label class="control-label" for="" data-th="#">
                                <?php echo $translations['A01703'][$language]; /* Confirm Reject Campaign? */ ?> 
                                </label>
                            </div>  
                            <div class="col-sm-6 form-group">
                                <label class="control-label" for="" data-th="#">
                                <?php echo $translations['A00571'][$language]; /* Remark */ ?>
                                </label>
                                <input id="rejectRemark" type="text" class="form-control">
                                <span id="remarkError" class="errorSpan text-danger"></span>
                            </div>
                        </div>
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
                                onclick="rejectCampaignConfirm()"
                                data-lang="A00323"
                            >
                                <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of reject campaign modal -->

            <!-- edit campaign modal -->
            <div class="modal fade" id="editCampaign" role="dialog">
                <div class="modal-dialog modal-xs" role="document">
                    <div class="modal-content">
                        <div>
                            <h4>
                            <?php echo $translations['A01704'][$language]; /* Edit Campaign Details */ ?>
                            </h4>
                        </div>
                        <form id="editCampaignForm" role="form">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label class="control-label">
                                        <?php echo $translations['A01698'][$language]; /* Starting Date */ ?>
                                        </label>
                                        <div class="input-group input-daterange">
                                            <input id="startDate" type="text" class="form-control input-daterange-to" dataName="startDate" dataType="startDate">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="">
                                        <?php echo $translations['A01699'][$language]; /* Starting Time */ ?>
                                        </label>
                                        <div class="input-group">
                                            <div>
                                                <input id="startTime" type="text" class="form-control" dataName="searchTime" dataType="timeRange" dataParent="searchDate">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4 form-group">
                                        <label class="control-label">
                                        <?php echo $translations['A01702'][$language]; /* Number of Days */ ?> 
                                        </label>
                                        <input type="text" id="noOfDays" class="form-control" dataName="days" dataType="text">
                                    </div>

                                    <div class="col-sm-4 form-group">
                                        <label class="control-label">
                                        <?php echo $translations['A01470'][$language]; /* Total Amount */ ?>
                                        </label>
                                        <input type="text" id="tolAmount" class="form-control" dataName="name" dataType="text">
                                    </div>

                                    <div class="col-sm-4 form-group">
                                        <label class="control-label">
                                        <?php echo $translations['A01705'][$language]; /* Available Amount */ ?>
                                        </label>
                                        <input type="text" id="availAmount" class="form-control" dataName="name" dataType="text">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">
                                            Invoice
                                        </label>
                                        <div class="input-group input-daterange">
                                            <input id="invoice" type="text" class="form-control"/>
                                            <span style="display:table-cell;vertical-align:middle;">
                                                <div class="checkbox checkbox-primary" style="padding-left: 40px!important;">
                                                    <input type="checkbox" id="showInv">
                                                        <label></label>
                                                    </input>
                                                </div>  
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">
                                            Transaction ID
                                        </label>
                                        <div class="input-group input-daterange">
                                            <input id="transactionId" type="text" class="form-control"/>
                                            <span style="display:table-cell;vertical-align:middle;">
                                                <div class="checkbox checkbox-primary" style="padding-left: 40px!important;">
                                                    <input type="checkbox" id="showTransId">
                                                        <label></label>
                                                    </input>
                                                </div> 
                                            </span> 
                                        </div>
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
                                onclick="editCampaign()"
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
    var dataArr;
    var btnArray = Array('edit','delete');
    var thArray  = Array(
        '<?php echo $translations['A00106'][$language]; /* ID */ ?>',
        '<?php echo $translations['A00137'][$language] //Date ?>',
        '<?php echo $translations['A01697'][$language] //Bid Title ?>',
        '<?php echo $translations['A01470'][$language] //Total Amount ?>',
        '<?php echo $translations['A01739'][$language] //Current Amount ?>',
        '<?php echo $translations['A01705'][$language] //Available Amount ?>',
        '<?php echo $translations['A01740'][$language] //Admin Adjusted ?>',
        '<?php echo $translations['A01741'][$language] //Client Contribution ?>',
        '<?php echo $translations['A01686'][$language] //Profit Gain (%) ?>',
        '<?php echo $translations['A01742'][$language] //Time Left (To Start) ?>',
        '<?php echo $translations['A01743'][$language] //Time Left (To End) ?>',
        '<?php echo $translations['A01744'][$language] //Time End ?>',
        '<?php echo $translations['A00318'][$language] //Status ?>',
        '<?php echo $translations['A00279'][$language] //Invoice ?>',
        '<?php echo $translations['A01736'][$language] //Transaction ID?>',
        '<?php echo $translations['A00571'][$language] //Remark?>'
    );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var rowId;
    var showInvoiceValue = "0";
    var showTxidValue = "0";

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
        });

        $('#showInv').change(() => {
            $('#showInv')[0].checked == true ?
                showInvoiceValue = "1" : showInvoiceValue = "0";
        });
            
        $('#showTransId').change(() => {
            $('#showTransId')[0].checked == true ?
                showTxidValue = "1" : showTxidValue = "0";
        });
    });

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "campaignSettingList",
            inputData   : searchData,
            pageNumber : pageNumber,
        };

        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        $('#basicwizard').show();

        if (data) {
            $('#payButton').show(); 
        } else {
            $('#payButton').hide();
        }

        var tableNo;
        var campaignList = data.campaignList;
        if(data != "" && campaignList.length>0) {
            var newList = [];
            dataArr = data.campaignList

            $.each(campaignList, function(k, v) {
                
                var remark;
                var countdown;
                var endCountdown;

                if(v['remark'] == '') {
                    remark = '-'
                }else {
                    remark = v['remark']
                }

                if(v['countdown'] > 0 && v['endCountdown'] == 0) {
                    var days = Math.floor(v['countdown'] / (60 * 60 * 24));
                    var hours = Math.floor((v['countdown'] % (60 * 60 * 24)) / (60 * 60));
                    var minutes = Math.floor((v['countdown'] % (60 * 60)) / (60));
                    var seconds = Math.floor(((v['countdown']*1000) % (1000 * 60)) / 1000);

                    countdown=`${days}Days ${hours}Hours ${minutes}Minutes ${seconds}Seconds`
                }else {
                    countdown = '-'
                }

                if(v['countdown'] > 0 && v['endCountdown'] == 1) {
                    var days = Math.floor(v['countdown'] / (60 * 60 * 24));
                    var hours = Math.floor((v['countdown'] % (60 * 60 * 24)) / (60 * 60));
                    var minutes = Math.floor((v['countdown'] % (60 * 60)) / (60));
                    var seconds = Math.floor(((v['countdown']*1000) % (1000 * 60)) / 1000);

                    endCountdown=`${days}Days ${hours}Hours ${minutes}Minutes ${seconds}Seconds`
                }else {
                    endCountdown = '-'
                }

                var rebuildData = {
                    id: v['id'],
                    createdAt : v['created_at'],
                    bidTitle: v['bidTitle'],
                    totalAmount : numberThousand(v['totalAmount'],2),
                    currentAmount : numberThousand(v['currentAmount'],2),
                    availableAmount : numberThousand(v['availableAmount'],2),
                    adminAdjusted: numberThousand(v['adminAdjusted'],2),
                    clientContribution: numberThousand(v['clientContribution'],2), 
                    profitGain: v['profitGain'],
                    countdownStart: countdown,
                    countdownEnd: endCountdown, 
                    timeEnd: v['timeEnd'],
                    status: v['status'],
                    invoice: v['invoice'],
                    txid: v['txid'],
                    remark: remark,
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(campaignList) {
            $.each(campaignList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-id', v['id']);

                if(v['isDeleted'] ==1) {
                    $(`#delete${k}`).hide()
                }

            });      
        }

        $('#'+tableId).find('tr').each(function(){
            $(this).find('th:last-child,th:first-child,td:first-child').hide();
            $(this).find('td:last-child,th:nth-child(5)').css('text-align','center');
        })

        $('#'+ tableId).find('tbody tr').each(function(){
            $(this).find('td:last-child').css('text-align','center');
        });  

    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
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

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        rowId = tableRow.attr('data-th');

        if(btnName == "delete") {
            $('#rejectCampaign').modal('show');
        }

        if(btnName == "edit") {
             $.redirect("editBiddingCampaign.php",{id: rowId});
            
            /*let newData = dataArr.filter((item)=>{
                if(item.id == rowId) {
                    return item
                }
            })

            var [dateValues, timeValues] = newData[0].timeStart.split(' ');

            let today = new Date(dateValues);
            let yyyy = today.getFullYear();
            let mm = today.getMonth() + 1; // Months start at 0!
            let dd = today.getDate();

            if (dd < 10) dd = '0' + dd;
            if (mm < 10) mm = '0' + mm;

            let formattedDate = dd + '/' + mm + '/' + yyyy;


            $('#startTime').val(timeValues)

            $('#startDate').val(formattedDate)

            $('#noOfDays').val(newData[0].numberOfDays);
            $('#tolAmount').val(newData[0].totalAmount);
            $('#availAmount').val(newData[0].availableAmount);
            $('#invoice').val(newData[0].invoice);
            $('#transactionId').val(newData[0].txid);

            if(newData[0].showInvoice) {
                $('#showInv').prop('checked', true);
                showInvoiceValue = "1";
            }
            else {
                $('#showInv').prop('checked', false);
                showInvoiceValue = "0";
            }

            if(newData[0].showTransaction) {
                $('#showTransId').prop('checked', true);
                showTxidValue = "1";
            } 
            else {
                $('#showTransId').prop('checked', false);
                showTxidValue = "0";
            }
            
            $('#editCampaign').modal('show');*/
        }
    }

    function rejectCampaignConfirm() {  
        var remark = $('#rejectRemark').val()
        var formData  = {
            command : 'editCampaign', 
            id : rowId, 
            action: 'delete',
            remark: remark
        };
        var fCallback = removeCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function editCampaign() {  
        // console.log(`Show Invoice: ${showInvoiceValue}`);
        // console.log(`Show TXID: ${showTxidValue}`);

        var searchId   = 'editCampaignForm';
        var searchData = buildSearchDataByType(searchId);

        var startDate = searchData.filter((item)=>{
            if(item.dataName == 'startDate') {
                return item.dataValue;
            }
        })

        var startTime = searchData.filter((item)=>{
            if(item.dataName == 'searchTime') {
                return item.dataValue;
            }
        })

        const [day,month,year] = startDate[0].dataValue.split("/");
        const [hours, minutes, seconds] = startTime[0].timeFrom.split(':');

        var date1 = new Date(+year, month - 1, +day, +hours, +minutes, +seconds);
        var noOfDays = $('#noOfDays').val();
        var tolAmount = $('#tolAmount').val();
        var availAmount = $('#availAmount').val();
        var invoice = $('#invoice').val();
        var txid = $('#transactionId').val();
        var formData  = {
            command: "editCampaign",
            id : rowId, 
            action : "edit",
            startDate : (date1.getTime()/1000),
            numberOfDays : noOfDays,
            totalAmount : tolAmount,
            availableAmount : availAmount,
            invoice: invoice,
            txid: txid,
            showInvoice: showInvoiceValue,
            showTransactionID: showTxidValue
        };

        var fCallback = editCallback;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function removeCallback(data, message) {
        showMessage(
            "<?php echo $translations['A01732'][$language] //Successfully Deleted Campaign ?>",
            'success', 
            "<?php echo $translations['A01733'][$language] //Deleted Campaign ?>",
            'trash', 
            'biddingCampaignSetting.php'
        );
    }

    function editCallback(data, message) {
        showMessage(
            "<?php echo $translations['A01749'][$language] //Successfully Edit Campaign ?>",
            'success', 
            "<?php echo $translations['A01750'][$language] //Edit Campaign ?>",
            'upload', 
            'biddingCampaignSetting.php'
        );
    }

</script>
</body>
</html>
