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
                                            <?php echo $translations['A00051'][$language]; /* Search */?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchPortfolio" role="form">
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00102'][$language]; /* Username */?>
                                                </label>
                                                <input type="text" class="form-control" dataName="username" dataType="text">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo "Crypto Type"; /* Crypto Type */ ?>
                                                </label>
                                                <select id="cryptoType" class="form-control" dataName="cryptoType" dataType="text">
                                                    <option value="czoCredit">
                                                        <?php echo "CZO"; /* CZO */ ?>
                                                    </option>
                                                    <option value="tether">
                                                        <?php echo "USDC"; /* USDC */ ?>
                                                    </option>
                                                    <option value="bitcoin">
                                                        <?php echo "BTC"; /* BTC */ ?>
                                                    </option>
                                                    <option value="bitcoinCash">
                                                        <?php echo "BCH"; /* BCH */ ?>
                                                    </option>
                                                    <option value="ethereum">
                                                        <?php echo "ETH"; /* ETH */ ?>
                                                    </option>
                                                    <option value="litecoin">
                                                        <?php echo "LTC"; /* LTC */ ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo "Transaction Type"; /* Transaction Type */ ?>
                                                </label>
                                                <select id="transactionType" class="form-control" dataName="transactionType" dataType="text">
                                                    <option value="buy">
                                                        <?php echo $translations['A00953'][$language]; /* Buy */ ?>
                                                    </option>
                                                    <option value="sell">
                                                        <?php echo $translations['A00954'][$language]; /* Sell */ ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00137'][$language]; /* Date */?>
                                                </label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control input-daterange-from" dataName="entryDate" dataType="dateRange"/>
                                                    <span class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </span>
                                                    <input type="text" class="form-control input-daterange-to" dataName="entryDate" dataType="dateRange" />
                                                </div>
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo 'Leader Username'; /* Username */?>
                                                </label>
                                                <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                            </div>                                           
                                        </form>
                                        <div class="col-sm-12">
                                            <button id="searchPortfolioBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */?>
                                            </button>
                                            <button type="submit" id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */?>
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
                        <div class="card-box p-b-0">
                            <button id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-rem1">Export to xlsx</button>
                            <!-- <form> -->
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                    <form>
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="portfolioListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerPortfolioList"></ul>
                                        </div>
                                    </form>
                                        <button type="" id="seeAllBtn" class="btn btn-primary waves-effect waves-light">
                                              <?php echo $translations['A01191'][$language]; /* See All */?>
                                        </button>
                                    </div>
                                </div>
                            <!-- </form> -->
                        </div>
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

    var divId    = 'portfolioListDiv';
    var tableId  = 'portfolioListTable';
    var pagerId  = 'pagerPortfolioList';
    var btnArray = {};
    var thArray  = Array (
        "<?php echo $translations['A00137'][$language]; /* Date */?>",
        "<?php echo $translations['A00102'][$language]; /* Username */?>",
        "<?php echo $translations['M00798'][$language]; /* From */?>",
        "<?php echo $translations['M00906'][$language]; /* From Rate */?>",
        "<?php echo "From Amount"; /* From Amount */?>",
        "<?php echo $translations['A00139'][$language]; /* To */?>",
        "<?php echo $translations['M00908'][$language]; /* To Rate */?>",
        "<?php echo "To Amount"; /* To Amount */?>",
        "<?php echo $translations['M01117'][$language]; /* Admin Charges */?>",
        "<?php echo $translations['A00318'][$language]; /* Status */ ?>"
    );

    var method         = 'POST';
    var url            = 'scripts/reqAdmin.php';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var offsetSecs     = getOffsetSecs();

    $(document).ready(function() {
        // Initialize date picker
        setTodayDatePicker();
        
        formData  = {command : "getSwapTransaction"};
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchPortfolio').find('input').each(function() {
                $(this).val('');
            });
            $('#searchPortfolio').find('select').each(function() {
                $(this).val('');
            });
        });

        $('#searchPortfolioBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

         $('#seeAllBtn').click(function() {

                var searchID = 'searchPortfolio';
                var searchData = buildSearchDataByType(searchID);
                formData  = {
                    command : 'getSwapTransaction',
                    searchData   : searchData,
                    pageNumber   : 1,
                    seeAll   : 1
                };
                console.log(searchData);
                fCallback = loadDefaultListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            });

            $('#exportBtn').click(function() {
                var searchId   = 'searchPortfolio';
                var searchData = buildSearchDataByType(searchId);
                var key  = Array (
                   'createdAt',
                   'fromUsername',
                   'from_coin_type',
                   'from_rate',
                   'from_amount',
                   'to_coin_type',
                   'to_rate',
                   'to_amount',
                   'admin_fee',
                   'status'
                );
                var formData  = {
                    command    : "getSwapTransaction",
                    filename   : "SwapTransactionHistory",
                    inputData  : searchData,
                    header     : thArray,
                    key        : key,
                    DataKey    : "swapTransactionPageListing"

                };
                 $.redirect('exportExcel2.php', formData);
            }); 
    });

    function loadDefaultListing(data, message) {

        // loadCountryDropdown(data.countryList);

        if(data.seeAll) {
                $("#seeAllBtn").hide();
                $('#pagerPortfolioList').hide();
        }

        console.log(data);

        var totalAmount = 0;
        var totalAmount2 = 0;
        var totalAmount3 = 0;
        var tableNo;
        buildTable(data.swapTransactionPageListing, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

         $('#' + tableId).find('tbody').append('<tr class=""><td colspan="4" style="text-align:right"><b><?php echo $translations['A00651'][$language]; /* Grand Total */?>: </b></td><td id="grandTotal" colspan="1"></td><td colspan="2" style="text-align:right"><b></b></td><td id="grandTotal2" colspan="1"></td><td id="grandTotal3" style="text-align:right"></td><td></td></tr>');

         $('#portfolioListTable > tbody > tr').each(function(){
            // console.log(totalAmount);
            if ($(this).attr('data-th')){
                totalAmount += parseFloat($(this).children("td:eq(4)").text());
                totalAmount2 += parseFloat($(this).children("td:eq(7)").text());
                totalAmount3 += parseFloat($(this).children("td:eq(8)").text());
            }

        });

        $('#grandTotal').text((parseFloat(totalAmount)).toFixed(8));
        $('#grandTotal2').text((parseFloat(totalAmount2)).toFixed(8));
        $('#grandTotal3').text((parseFloat(totalAmount3)).toFixed(8));
    }

    // function loadCountryDropdown(data) {
    //     if(data) {
    //         $.each(data, function(key, val) {
    //             var countryID = val['id'];
    //             var country   = val['name'];
    //             $('#countryName').append('<option value="' + countryID + '">' + country + '</option>');
    //         });
    //     }
    // }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<?php echo $translations['A00114'][$language]; /* Search successfully */?>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function pagingCallBack(pageNumber, fCallback){

          if(pageNumber > 1) bypassLoading = 1;
            
            $("#seeAllBtn").show();
        

        var searchId   = 'searchPortfolio';
        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command     : "getSwapTransaction",
            pageNumber  : pageNumber,
            searchData  : searchData,
        };
        if(!fCallback)
            fCallback = loadDefaultListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

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