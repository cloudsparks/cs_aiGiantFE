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
            <div class="pageTitle" data-lang="M01157">
                <?php echo $translations['M01157'][$language] //AI Crypto Trading ?>
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
                                                <input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="tradeTime" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span class="input-group-text">-</span>
                                                <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="tradeTime" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                <label for="dateRangeStart" class="input-group-text mr-2"><i class="fa fa-calendar"></i></label>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0 form-group">
                                            <label data-lang="M00111"><?php echo $translations['M00111'][$language]; //Type ?></label>
                                            <select class="form-control" dataType="select" dataName="side">
                                                <option value=""><?php echo $translations['M00369'][$language]; //All ?></option>
                                                <option value="Close Long"><?php echo $translations['M01296'][$language] /* Close Long */ ?></option>
                                                <option value="Open Long"><?php echo $translations['M01297'][$language] /* Open Long */ ?></option>
                                                <option value="Close Short"><?php echo $translations['M01298'][$language] /* Close Short */ ?></option>
                                                <option value="Open Short"><?php echo $translations['M01299'][$language] /* Open Short */ ?></option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0 form-group">
                                            <label data-lang="M01296"><?php echo $translations['M01295'][$language]; //Pairs ?></label>
                                            <select class="form-control" dataType="select" dataName="pair" >
                                            <option value=""><?php echo $translations['M00369'][$language]; //All ?></option>
                                                <option value="ATOMUSDT"><?php echo "ATOMUSDT" ?></option>
                                                <option value="AVAXUSDT"><?php echo "AVAXUSDT" ?></option>
                                                <option value="BTCUSDT"><?php echo "BTCUSDT" ?></option>
                                                <option value="CHZUSDT"><?php echo "CHZUSDT" ?></option>
                                                <option value="ETHUSDT"><?php echo "ETHUSDT" ?></option>
                                                <option value="NEARUSDT"><?php echo "NEARUSDT" ?></option>
                                                <option value="SOLUSDT"><?php echo "SOLUSDT" ?></option>
                                            </select>
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

<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>
<?php include 'sharejs.php'; ?>

</html>

<!-- SPORTS ARBITRAGE
Date > Event> Spots > Type > Booker > Amount > Win Span

AI CRYPTO TRADING
Date > Pairs > Type (open/close short) > Price > Profit percentage -->


<script>

    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var divId    = 'transactionHistoryDiv';
    var tableId  = 'transactionHistoryTable';
    var pagerId  = 'pagerList';
    var btnArray = {};
    var thArray  = Array (
        '<span data-lang="M00091" class="bottom"><?php echo $translations['M00091'][$language] /* Date */ ?></span>',
        '<span data-lang="M01295" class="bottom"><?php echo $translations['M01295'][$language]; /* Pairs */ ?></span>',
        '<span data-lang="M00111" class="bottom"><?php echo $translations['M00111'][$language]; /* Type */?></span>',
        '<span data-lang="M01300" class="bottom"><?php echo $translations['M01300'][$language]; /* Price */?></span>',
        '<span data-lang="M01301" class="bottom"><?php echo $translations['M01301'][$language]; /* Profit % Per Trade */?></span>',
        '<span data-lang="M03625" class="bottom"><?php echo $translations['M03625'][$language]; /* Transaction Line */?></span>',
        '<span data-lang="M01318" class="bottom"><?php echo $translations['M01318'][$language]; /* Trade Amount */?></span>',
        '<span data-lang="M00399" class="bottom"><?php echo $translations['M00399'][$language]; /* Profit */?></span>',
    );

    $(document).ready(function() {
        var formData = {
            command  : "getThirdPartyTradePairReport",
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
            command             : "getThirdPartyTradePairReport",
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

        if(list){
            var newList = [];
            $.each(list, function(k, v) {
                var transactionLine;
                var newProfit;
                var newProfitPercent;

                var rebuildData = {
                    trade_time              : v['trade_time'],
                    pair                    : v['pair'],
                    side                    : v['side'],
                    price                   : numberThousand(v['price'],2),
                    profit_percentage       : numberThousand(v['profit_percentage'],2),
                    transaction_line: v['transaction_line'] ? v['transaction_line'] : "-",
                    trade_amount           : numberThousand(v['trade_amount'],2),
                    profit: v['profit'] ? numberThousand(v['profit'],2):"-"
                };
                newList.push(rebuildData);
            });
        } 

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        
        $('#' + tableId).find('tbody').append(`
            <tr style="">
                <td colspan='4' class="text-right"><b><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</b></td>
                <td class="text-right">${numberThousand(data.totalProfitPercentage,2)}</td>
                <td class="text-right">${numberThousand(data.totalTransactionLine,2)}</td>
                <td>${numberThousand(data.totalTradeAmount,2)}</td>
                <td>${numberThousand(data.totalProfit,2)}</td>
            </tr>
        `);

        $('#' + tableId).find('tbody').append(`
            <tr style="">
                <td colspan='6' class="text-right"><b>Average:</b></td>
                <td class="text-right">${numberThousand(data.avgTradeAmount,2)}</td>
                <td class="text-right">${numberThousand(data.avgProfit,2)}</td>
            </tr>
        `);

        // Table heading and data alignment
        $('#' + tableId).find('tr').each(function () {
            // $(this).find('td:eq(3), th:eq(3)').css('text-align', "right"); // <-- example for both head and data
            $(this).find('td:eq(3)').css('text-align', "right");
            $(this).find('td:eq(4)').css('text-align', "right");
            $(this).find('td:eq(5)').css('text-align', "right");
            $(this).find('td:eq(6)').css('text-align', "right");
            $(this).find('td:eq(7)').css('text-align', "right");
        }); 

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
</script>