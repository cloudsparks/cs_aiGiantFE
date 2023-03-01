<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
    <div class="kt-container">

        <div class="text-center">
            <div class="pageTitle" data-lang='M00018'>
                <?php echo $translations['M00018'][$language]; //Withdrawal History ?>
            </div>
        </div>

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-12">
                    <div class="listingWrapper2">
                        <div class="col-12">
                            <form id="searchDIV">
                                <div class="col-12 px-0">
                                    <div class="row align-items-end">
                                        <div class="col-lg-3 col-md-6 col-12 form-group" id="datepicker">
                                            <label data-lang='M00091'><?php echo $translations['M00091'][$language] /*Date Range*/ ?></label>
                                            <div class="input-daterange input-group" id="datepicker-range">
                                                <input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="dateRange" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="input-group-text">-</span>
                                                <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="dateRange" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12 form-group">
                                            <label class="registrationLabel" data-lang='M00107'><?php echo $translations['M00107'][$language]; //Status ?></label>
                                            <select class="form-control " id="status" dataName="status" dataType="select">
                                                <option value="">
                                                        <?php echo $translations['M00369'][$language]; //All ?>
                                                    </option>
                                                    <option value="Approve">
                                                        <?php echo $translations['A01186'][$language]; //Approve ?>
                                                    </option>
                                                    <option value="Cancel">
                                                        <?php echo $translations['M00114'][$language]; //Cancel ?>
                                                    </option>
                                                    <option value="Reject">
                                                        <?php echo $translations['A01187'][$language]; //Reject ?>
                                                    </option>
                                                    <option value="Waiting Approval">
                                                        <?php echo $translations['B00254'][$language]; //Waiting Approval ?>
                                                    </option>
                                            </select>

                                        </div>

                                        <div class="col mt-3">
                                            <button id="searchBtn" class="btn btn-primary" type="button" name="button" data-lang='M00243'><?php echo $translations['M00243'][$language] /*Search*/ ?></button>
                                            <button id="resetBtn" class="btn btn-default" type="button" name="button" data-lang='M00085'><?php echo $translations['M00085'][$language] /*Reset*/ ?></button>
                                            <!-- <span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="resetBtn"></i> </span> -->
                                        </div>

                                    </div>
                                </div>

                                <!-- <div class="col-12 px-0">
                                    <button id="searchBtn" class="btn btn-primary" type="button" name="button"><?php echo $translations['M00052'][$language] /*Search*/ ?></button>
                                    <span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="resetBtn"></i> </span>
                                </div> -->

                            </form>
                        </div>
                        <div class="col-12 mt-4">
                            <div id="totalPrincipleAmount" class="pull-in col-12 px-0">
                            </div>
                            <form>
                                <div id="basicwizard" class="pull-in col-12 px-0">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center" style="display: block;"></div>
                                        <div id="portfolioDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerInvoiceList"></ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>
<?php include 'sharejs.php'; ?>

</html>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var formData        = "";
var fCallback       = "";
var walletName = "<?php echo $_POST['walletName']; ?>";


var divId    = 'portfolioDiv';
var tableId  = 'portfolioTable';
var pagerId  = 'pageList';
var btnArray = {};

var thArray  = Array(
        '<span data-lang="M00113" class="bottom"><?php echo $translations['M00113'][$language]; //Date ?></span>',
        '<span data-lang="M02904" class="bottom"><?php echo $translations['M02904'][$language]; //Type ?></span>',
        '<span data-lang="M00110" class="bottom"><?php echo $translations['M00110'][$language]; //Withdrawal Amount ?></span>',
        '<span data-lang="M01033" class="bottom"><?php echo $translations['M01033'][$language]; //Fee ?></span>',
        '<span data-lang="M02100" class="bottom"><?php echo $translations['M02100'][$language]; //Receivable Amount ?></span>', 
        '<span data-lang="M00011" class="bottom"><?php echo $translations['M00011'][$language]; //Status ?></span>',
        '<span data-lang="M02105" class="bottom"><?php echo $translations['M02105'][$language]; //Wallet Address ?></span>',  
        '<span data-lang="A00571" class="bottom"><?php echo $translations['A00571'][$language]; //Remark ?></span>',
        ""
);

$(document).ready(function(){
  $("#walletName").html(walletName);

    formData  = {
        command : "getWithdrawalListing"
    };
    fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    $('#dateRangeStart').daterangepicker({    
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            $("#dateRangeStart").val(start.format('DD/MM/YYYY'));
            $("#dateRangeEnd").val(end.format('DD/MM/YYYY'));
        });

        $('#dateRangeEnd').click(function() {
            $('#dateRangeStart').trigger('click');
        });

    $("#resetBtn").click(function(){
        $("#searchDIV").find("input").each(function(){
            $(this).val('');
        });
        $('#dateRangeStart').data('daterangepicker').remove();
        $('#dateRangeStart').daterangepicker({    
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            $("#dateRangeStart").val(start.format('DD/MM/YYYY'));
            $("#dateRangeEnd").val(end.format('DD/MM/YYYY'));
        });
        $('#searchDIV').find('select').each(function() {
                $(this).val('');
                $("#searchForm")[0].reset();
        });
    });
    $('#searchBtn').click(function() {
        pagingCallBack(pageNumber, loadSearch);
    });
});

function pagingCallBack(pageNumber, loadSearch)
{
    if(pageNumber > 1) bypassLoading = 1;


    var searchId     = "searchDIV";
    var searchData = buildSearchDataByType(searchId);

    var formData   = {
            command     : "getWithdrawalListing",
            pageNumber: pageNumber,
            searchData : searchData
    };

    if(!fCallback)
            fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('noData').html('<span><?php echo $translations['M00306'][$language]; //Search Successful ?></span>').show();
        setTimeout(function() {
                $('#searchMsg').removeClass('noData').html('').hide();
        }, 3000);
}

function loadDefaultListing(data, message) {
    var list = data.withdrawalListing;
    var tableNo;

    if(list){
        var newList = [];
        $.each(list, function(k,v){
            $.each(v, function(key,value){

                if (!value) {
                    v[key]="-";
                }
            });

            if (v['statusValue'] === "Waiting Approval") {
                    cancelBtn = `<a data-toggle="tooltip" title="" id="cancel${v['id']}" onclick="tableBtnClick(this.id)" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Cancel" aria-describedby="tooltip729942"><i class="fa fa-times"></i></a>`;
                } else {
                    cancelBtn = "";
                }

            var rebuildData ={
                date                : v['created_at'],
                crypto_type              : v['crypto_type'],
                amount           : parseFloat(v['amount']).toFixedNoRounding(2),
                charges    : parseFloat(v['charges']).toFixedNoRounding(2),                
                receivable_amount     : parseFloat(v['receivable_amount']).toFixedNoRounding(2),
                statusValue         : v['statusValue'],
                ustdAddress         : v['walletAddress'],
                remark              : v['remark'],
                cancel              : cancelBtn
            };
            newList.push(rebuildData);
        });

    }

    buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
    pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    $.each(list, function(k, v) {
        $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
    });

    $('#'+tableId).find('tbody tr').each(function(){
        // $(this).find('td:eq(7)').addClass('hide');
        // $(this).find('td:eq(7)') .addClass('hide');
        $(this).find("#cancel"+this.id+"").attr("data-original-title","<?php echo $translations['M00114'][$language]; //Cancel ?>");

        // var status = $(this).find("td:eq(0)").text();
        // if (status != translations['M00652'][language]) {
        //     $(this).find("td:eq(8)").html('');
        // }
		
        // if (status=='Cancel' || status == 'Reject' || status == 'Approve') {
        //     $(this).find("td:eq(7)").html('');
        // }else if (status == 'Waiting Approval'){
        //     $(this).find("td:eq(7)").html('<a data-toggle="tooltip" title="" id="cancel'+this.id+'" onclick="tableBtnClick(\'cancel'+this.id+'\')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Accept"><i class="fa fa-times"></i></a>');
        // }
    });


    // START DataTables
    // $('#'+tableId+' th:nth-child(1)').before('<th></th>');
    // $('#'+tableId+' td:nth-child(1)').before('<td style=""></td>');


    // $('#'+tableId).DataTable({
    //     "paging":   false,
    //     "ordering": false,
    //     "info":     false,
    //     "bFilter": false,
    //     "language": {
    //         "zeroRecords": "", 
    //         "emptyTable": ""
    //     },
    //     responsive: {
    //         details: {
    //             type: 'column',
    //             target: 'tr'
    //         }
    //     },
    //     buttons: [
    //     'colvis'
    // ],
    //     columnDefs: [
    //         { className: 'control', orderable: false, targets: 0 },
    //         { responsivePriority: 1, targets: 1 },
    //         { responsivePriority: 2, targets: 2 },
    //         { responsivePriority: 3, targets: 3 },
    //         { responsivePriority: 4, targets: 4 },
    //         { responsivePriority: 5, targets: 5 },
    //         { responsivePriority: 6, targets: 6 },
    //         { responsivePriority: 7, targets: 7 },
    //         { responsivePriority: 8, targets: 8 },
    //         { responsivePriority: 9, targets: 9 },
    //         { responsivePriority: -1, targets: 10 },
    //     ]
    // });

    //  else {
    //     $("#"+divId).empty();
    //     $("#paginateText").empty();
    //     $('#alertMsg').html(`
    //         <div class="row">
    //             <div class="col-12 text-center">
    //                 ${buildTableHead(thArray)}
    //                 <div>
    //                     <i class="fa fa-align-justify noResultIcon"></i>
    //                     <span class="noResultTxt"><?php echo $translations["M00030"][$language] //No Results Found. ?></span>
    //                 </div>
    //             </div>
    //         </div>
    //     `).show();
    // }
}


 function tableBtnClick(btnId) {

        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'cancel') {
            // $("#cancelWithdrawalBox").modal("show");
            var canvasBtnArray = {
                    Submit: '<?php echo $translations['M00147'][$language]; //Submit ?>'
            };

            showMessage('<?php echo $translations['A01159'][$language]; //Are you sure you want to cancel this Withdrawal Request? ?>', "warning", "<?php echo $translations['M00106'][$language]; //Cancel Withdrawal ?>","", "",canvasBtnArray);

            var transID = tableRow.attr('data-th');

            $('#canvasSubmitBtn').click(function() {

                var formData = {
                    'command': 'updateWithdrawalStatus',
                    'withdrawalId' : transID,
                    'status' : "Cancel"
                };
                fCallback = loadDelete;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                function loadDelete(data,message){
                    // showMessage('You canceled your withdrawal request.', "warning", "Cancel Withdrawal","", "",canvasBtnArray);
                    var formData  = {
                        command: 'getWithdrawalListing',
                        creditType: "<?php echo $_POST['creditType']; ?>"
                    };
                    var fCallback = loadDefaultListing;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
            });
        }
    }
</script>
