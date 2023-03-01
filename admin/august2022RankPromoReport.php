<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);
    $communityRank = $_SESSION['communityRank'];

    // Check the session for this page
    
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
                                                                <?php echo $translations['A00969'][$language]; /* Bonus Date */ ?>
                                                            </label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control input-daterange-from" dataname="bonusDate" datatype="dateRange">
                                                                <span class="input-group-addon">
                                                                    <?php echo $translations['A00139'][$language]; /* to */?>
                                                                </span>
                                                                <input type="text" class="form-control input-daterange-to" dataname="bonusDate" datatype="dateRange">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                            </label>
                                                            <span class="pull-right">
                                                                <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                                <label for="match" style="margin-right: 15px;">Match</label>

                                                                <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                                <label for="like">Like</label>
                                                            </span>
                                                            <input type="text" class="form-control" dataName="username" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label" for="">
                                                                <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                            </label>
                                                            <input id="memberID" type="text" class="form-control" dataName="memberID" dataType="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label for="bonusTypeSelect">Rank</label>
                                                            <select id="bonusTypeSelect" class="form-control" dataName="rankID" dataType="text">
                                                                <option value="">
                                                                    <?php echo $translations['A00055'][$language]; // All ?>
                                                                </option>
                                                                <?php
                                                                foreach ($communityRank as $value => $rankRow) {
                                                                    echo "<option value='".$rankRow['id']."'>".$rankRow['display']."</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="col-xs-12 m-t-rem1">
                                                <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                                </button>
                                                <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
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
                                <!-- <button id="exportBtn" onclick="exportBtn()" type="" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                     Export to xlsx
                                </button> 
                                <button id="seeAllBtn" type="" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                     See All
                                </button> --> 
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="listingDiv" class="table-responsive"></div>
                                            <span id="grandTotal"></span>
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

            </div>

            <?php include("footer.php"); ?>

        </div>

    </div>

    <script>
        var resizefunc = [];
    </script>

    <?php include("shareJs.php"); ?>

<script>
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
            'Bonus Date',
            'Username',
            'Member ID',
            'Monthly AUM',
            'Sponsor AUM',
            'Percentage',
            'Point Earned',
            'Point Balance',
            'Total Income',
            'New Rank'
            );
    var searchId = 'searchForm';
        
    var url             = 'scripts/reqBonus.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    $(document).ready(function() {
        setTodayDatePicker();

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
            $("#searchForm")[0].reset();
            });

        });

        $('#seeAllBtn').click(function() {

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getAugustRankPromo2022Report',
            searchData   : searchData,
            pageNumber   : 1,
            seeAll   : 1,
            dataType : $("input[name=usernameType]:checked").val(),

        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        }); 
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 
    });

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getAugustRankPromo2022Report",
            pageNumber  : pageNumber,
            searchData   : searchData,
            dataType : $("input[name=usernameType]:checked").val(),

        };
            
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {

        
        $('#basicwizard, #exportBtn, #seeAllBtn').show();
        var tableNo;
        
        if (data.bonusList){
             var newList = [];
             $.each(data.bonusList, function(k, v){
                 var rebuildData = {
                     bonusDate      : v['bonusDate'],
                     username       : v['username'],
                     memberID       : v['memberID'],
                     monthlyAUM     : numberThousand(v['monthlyAUM'],2),
                     sponsor_aum    : numberThousand(v['sponsor_aum'],2),
                     percentage     : numberThousand(v['percentage'],2),
                     pointsEarned   : numberThousand(v['pointsEarned'], 2),
                     pointsBalance  : numberThousand(v['pointsBalance'], 2),
                     totalIncome    : numberThousand(v['totalIncome'], 2),
                     newRank        : v['newRank']
                 };
                 newList.push(rebuildData);
             });
         }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);


        $('#'+tableId).find('tr').each(function(){
            $(this).find('td:eq(3) , th:eq(3)').css('text-align', "right");
            $(this).find('td:eq(4) , th:eq(4)').css('text-align', "right");
            $(this).find('td:eq(5) , th:eq(5)').css('text-align', "right");
            $(this).find('td:eq(6) , th:eq(6)').css('text-align', "right");
            $(this).find('td:eq(7) , th:eq(7)').css('text-align', "right");
            $(this).find('td:eq(8) , th:eq(8)').css('text-align', "right");
        });

        // $('#' + tableId).find('tbody').append(`
        //     <tr style="">
        //         <td colspan='8' class="text-right"><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</td>
        //         <td style="text-align: right;"> ${numberThousand(data.grandTotal, 2)} </td>
        //     </tr>
        // `);
    }
    
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function exportBtn() {
        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);

        var key = Array(
            "bonusDate",
            "username",
            "memberID",
            "monthlyAUM",
            "sponsor_aum",
            "percentage",
            "pointsEarned",
            "pointsBalance",
            "totalIncome",
            "newRank"
        );

        var formData = {
            command: "getAugustRankPromo2022Report",
            filename: "AugustRankPromo2022Report",
            searchData: searchData,
            pageNumber      : 1,
            seeAll          : 1,
            header: thArray,
            key: key,
            DataKey: "bonusList",
            type: "export",
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
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
