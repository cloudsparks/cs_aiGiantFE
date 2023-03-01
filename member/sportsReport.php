<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Portfolio", $_SESSION['blockedRights']['Subscription Portfolio'])){
     header("Location: dashboard");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
    <div class="kt-container">
        <div class="text-center">
            <div class="pageTitle" data-lang="M01132">
                <?php echo $translations['M01156'][$language] //Sports Arbitrage ?>
            </div>
        </div>

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="listingWrapper2">
                        <div class="col-12">
                            <form id="searchDIV">
                                <div class="col-12 px-0">
                                    <div class="row align-items-end">
                                        <div class="col-lg-4 col-md-6 col-12 form-group date-container" id="datepicker">
                                            <label data-lang="M00091"><?php echo $translations['M00091'][$language] /*Date*/ ?></label>
                                            <div class="input-daterange input-group" id="datepicker-range">
                                                <input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="endDate" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="input-group-text">-</span>
                                                <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="endDate" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                <label for="dateRangeStart" class="input-group-text mr-2"><i class="fa fa-calendar"></i></label>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 form-group">
                                            <label data-lang="M01304"><?php echo $translations['M01304'][$language] /*Event*/ ?></label>
                                            <input type="text" class="form-control" dataName="eventTitle" dataType="text">
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 form-group">
                                            <label data-lang="M01302"><?php echo $translations['M01302'][$language] /*Sport*/ ?></label>
                                            <input type="text" class="form-control" dataName="sport" dataType="text">
                                        </div>

                                        <div class="col mt-3">
                                            <button id="searchBtn" class="btn btn-primary" type="button" name="button" data-lang='M00243'><?php echo $translations['M00243'][$language] /*Search*/ ?></button>
                                            <button id="resetBtn" class="btn btn-default" type="button" name="button" data-lang='M00085'><?php echo $translations['M00085'][$language] /*Reset*/ ?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 pt-4 px-0">
                            <form>
                                <div id="basicwizard" class="pull-in col-12 px-0">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center" style="display: block;"></div>
                                        <div id="transactionHistoryDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerList"></ul>
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

<div class="modal fade" id="oddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header canvasheader">
                <div class="row text-center">
                
                    <div class="col-12" data-lang="M01303"><span class="modal-title"><?php echo $translations['M01303'][$language] /*Odd Details*/ ?></span></div>
                </div>
                <div class="modalCloseWrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>                
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body w-100">
                <div class="col-12 px-0">
                    <form>
                        <div id="basicwizardDetails" class="pull-in col-12 px-0">
                            <div class="tab-content b-0 m-b-0 p-t-0">
                                <div id="alertMsgDetails" class="text-center" style="display: block;"></div>
                                <div id="transactionHistoryDivDetails" class="table-responsive"></div>
                                <span id="paginateTextDetails"></span>
                                <div class="text-center">
                                    <ul class="pagination pagination-md" id="pagerListDetails"></ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
    var saveData;

    //Listing Table
    var divId    = 'transactionHistoryDiv';
    var tableId  = 'transactionHistoryTable';
    var pagerId  = 'pagerList';
    var btnArray = {};
    var thArray  = Array (
        '<span data-lang="M00092" class="bottom"><?php echo $translations['M00092'][$language]; /* Date */ ?></span>',
        '<span data-lang="M01304" class="bottom"><?php echo $translations['M01304'][$language] /* Event */ ?></span>',
        '<span data-lang="M01302" class="bottom"><?php echo $translations['M01302'][$language] /* Sport */ ?></span>',
        '<span data-lang="M03627"><?php echo $translations['M03627'][$language]; /* Action */ ?></span>'
    );

    //Pop Up Table
    var divIdDetails    = 'transactionHistoryDivDetails';
    var tableIdDetails  = 'transactionHistoryTableDetails';
    var pagerIdDetails  = 'pagerListDetails';
    var btnArrayDetails = {};
    var thArrayDetails  = Array (
        '<span data-lang="M00111" class="bottom"><?php echo $translations['M00111'][$language]; /* Type */ ?></span>',
        '<span data-lang="M01305" class="bottom"><?php echo $translations['M01305'][$language]; /* Booker */ ?></span>',
        '<span data-lang="M00050" class="bottom"><?php echo $translations['M00050'][$language]; /* Amount */ ?></span>',
        '<span data-lang="M01306" class="bottom"><?php echo $translations['M01306'][$language]; /* Win Span */ ?></span>',
    );

    $(document).ready(function() {
        var formData = {
            command  : "getThirdPartyMatchReport",
        };
       
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

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
                // $("#searchForm")[0].reset();
            });

        });
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
    });

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchId = 'searchDIV';
        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command             : "getThirdPartyMatchReport",
            pageNumber          : pageNumber,
            searchData          : searchData
        };
        
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('noData').html('<span><?php echo $translations['M00548'][$language]; //Search Successful ?></span>').show();
        setTimeout(function() {
                $('#searchMsg').removeClass('noData').html('').hide();
        }, 3000);
    }
    
    function loadDefaultListing(data, message) {
        var list = data.report;
        var tableNo;
        var grandTotal = data.grandTotal;
        var htmlContent = "";

        saveData = list;

        if(list){
            var newList = [];
            $.each(list, function(k, v) {
                var viewBtn = ``;

                if(v['odds'] && v['odds'].length > 0){
                    viewBtn = `<button class="btn btn-primary" type="button" onclick="openModal(${k})"><i class="fa fa-eye"></i></button>`;
                }
                var rebuildData = {
                    event_end_at        : v['event_end_at'],
                    event_title         : v['event_title'],
                    sport               : v['sport'],
                    viewBtn             : viewBtn
                };
                newList.push(rebuildData);
            });
        } 

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId+' th:nth-child(1)').before('<th></th>');
        $('#'+tableId+' td:nth-child(1)').before('<td style="width:30px;"></td>');

        $('#'+tableId).DataTable({
            "paging":   false,
            "ordering": false,
            "info":     false,
            "bFilter": false,
            "language": {
                "zeroRecords": "", 
                "emptyTable": ""
            },
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            buttons: [
            'colvis'
        ],
            columnDefs: [
                { className: 'control', orderable: false, targets: 0 },
                { responsivePriority: 1, targets: 1 },
                { responsivePriority: 2, targets: 2 },
                { responsivePriority: 3, targets: 3 },
            ]
        });
    }

    function openModal(k){
        var oddList = saveData[k]['odds'];
        var tableNoDetails;

        if(oddList){
            var newList = [];
            $.each(oddList, function(k, v) {
                var rebuildData = {
                    type          : v['type'],
                    booker        : v['booker'],
                    amount        : numberThousand(v['amount'],2),
                    win_span      : numberThousand(v['win_span'],2),
                };
                newList.push(rebuildData);
            });
        } 

        buildTable(newList, tableIdDetails, divIdDetails, thArrayDetails, btnArrayDetails, "", tableNoDetails);

        $('#'+tableIdDetails).find('thead tr').each(function(){
            $(this).find('th:eq(2)').css('text-align', "right");
            $(this).find('th:eq(3)').css('text-align', "right");
        });

        $('#'+tableIdDetails).find('tbody tr').each(function(){
            $(this).find('td:eq(2)').css('text-align', "right");
            $(this).find('td:eq(3)').css('text-align', "right");
        });

 

        $('#oddModal').modal('show');
    }
</script>