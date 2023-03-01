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
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            Bonus Date                                         
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control input-daterange-from" dataname="bonusDate" datatype="dateRange">
                                                            <span class="input-group-addon">
                                                                <?php echo $translations['A00139'][$language]; /* to */?>                                                  </span>
                                                            <input type="text" class="form-control input-daterange-to" dataname="bonusDate" datatype="dateRange">
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
                                                        <label class="control-label">
                                                            <?php echo $translations['A01242'][$language]; /* Leader Username */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 px-0 hide" style="margin-top: 10px">
                                                        <div class="col-sm-3">
                                                        <label class="control-label" for="" data-th="">
                                                            <?php echo $translations['A01191'][$language]; /* Date */?>
                                                        </label>
                                                        </div>
                                                        <!-- <input id="seeAll" type="checkbox" name="seeAll" value="1" style="margin-left: 20px; margin-top: 10px"> -->
                                                         <div class="checkbox checkbox-primary col-sm-9" style="margin-top: 3px">
                                                            <input id="seeAll" type="checkbox" name="seeAll" value="1" style="margin-left: 10px; position: relative;">
                                                            <label for="checkbox2">
                                                            </label>
                                                        </div>
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
                            <div id="grandTotalBonus" class="card-box" style="background:#f5f5f5; padding: 20px 25px; display: none"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <form>
                                        <div id="basicwizard" class="pull-in" style="display: none">
                                            <div class="tab-content b-0 m-b-0 p-t-0 px-0">
                                                <button type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">
                                                     <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                                                </button>
                                                <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                                <div id="listingDiv" class="table-responsive" style= "max-height: 1800px; overflow: auto;
                                                   "></div>
                                                
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

            </div>

            <?php include("footer.php"); ?>

        </div>

    </div>

    <script>
        var resizefunc = [];
    </script>

    <?php include("shareJs.php"); ?>

<script>
    var curTarget       = 0;
    var onloaded        = 0;

    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var tableBody = 'bodyList';
    var pagerId  = 'listingPager';
    var searchId = 'searchForm';

    var url             = 'scripts/reqBonus.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var totalPage       = 1;
    var formData        = "";
    var fCallback       = "";  

    var translations = <?php echo json_encode($translations)?>;
    var language = "<?php echo $language?>";


    window.onload = function(){
        var tableCont = document.querySelector('#tableList');

        function scrollHandle (e){

            var clientHeight = this.querySelector('tbody').clientHeight;
            var thead = this.querySelector('thead').clientHeight;
            var scrollTop = this.scrollTop;
            var current = scrollTop + (1800 - thead);
            target = (clientHeight * 0.8).toFixed();

            this.querySelector('thead').style.transform = 'translateY(' + scrollTop + 'px)';

            if ( current >= target && target != curTarget && onloaded == 1) {
                curTarget = target;
                pagingCallBack(parseInt(pageNumber) + 1);
            }
        }

        tableCont.addEventListener('scroll',scrollHandle);
    }

    $(document).ready(function() {
        setTodayDatePicker();

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });
        
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input[type=text]').each(function() {
               $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
            $("#searchForm")[0].reset();
            });

            $("#seeAll").prop("checked", false);
            document.getElementById("match").checked = true;

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(1);
        }); 
    });

    function exportBtn(){

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
            var thArray = Array(
                "Bonus Date",
                "Member ID",
                "Username",
                "Full Name",
                "Leader Username",
                "Daily Rebate",
                "Sponsor Rewards",
                "Sharing Rewards",
                "Community Rewards",
                "Internation Dividend",
                "Total"
                );
            var key  = Array (
               'bonusDate',
               'memberID',
               'username',
               'name',
               'leaderUsernameAry',
               'rebateBonus',
               'sponsorBonus',
               'teamBonus',
               'communityBonus',
               'poolBonus',
               'totalBonus'
            );
            var formData  = {
                command    : "getBonusListing",
                filename   : "BonusListingReport",
                searchData : searchData,
                header     : thArray,
                key        : key,
                DataKey    : "bonusList",
                usernameSearchType : $("input[name=usernameType]:checked").val()
            };
             $.redirect('exportExcel2.php', formData); 
    }

    function seeAllBtn() {
        $("#seeAll").prop("checked", true);

        pagingCallBack(1);
    }

    function pagingCallBack(page){
        page = parseInt(page ? page : 1);
        console.log("pageNumber : " + page + " " + "totalPage : " + totalPage);

        onloaded = 0;
        bypassLoading = 0;

        if(document.getElementById('seeAll').checked) {
            onloaded = 1;
        }

        if(page > 1){
            if(onloaded == 1){
                bypassLoading = 1;
                if(page > totalPage) return;
            }
        }

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getBonusListing",
            pageNumber  : page,
            onloaded    : onloaded,
            searchData   : searchData,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
            
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        var headerList          = data.headerList;
        var grandTotalList      = data.grandTotalList;
        var bonusList           = data.bonusList;
        var bonusNameList       = data.bonusNameList;
        var totalBonusList      = data.totalBonusList;

        var content = "";
        var header = "", headerRow = "", grandTotal = "";


        buildBonusTable(data, tableId, tableBody, divId, "" , message, "", pagerId, onloaded);

        pageNumber = data.pageNumber;
        totalPage = data.totalPage;

        return;

        if(grandTotalList){
            grandTotal +='<table class="table-responsive" style="border:0px;">';
            grandTotal +=   '<thead>';
            $.each(grandTotalList, function(key, list){
                grandTotal +=       '<tr>';
                grandTotal +=           '<th>'+list['bonusName']+' : </th>';
                grandTotal +=       '</tr>';
            });
            grandTotal +=   '</thead>';
            grandTotal +=   '<tbody>';
            grandTotal +=       '<tr>';
            grandTotal +=           '<td>'+list['totalBonus']+'</td>';
            grandTotal +=       '</tr>';
            grandTotal +=    '</tbody>'
            grandTotal +='</table>';

            $('#grandTotalBonus').empty().append(grandTotal);
        }

        if(headerList){
            $.each(headerList, function(key, header){
                headerRow +=   '<th>'+header+'</th>';
            });

            header +='<table id="" class="table no-footer m-0">';
            header +=   '<thead style="background:#fafafa">';
            header +=       '<tr>';
            header +=           headerRow;
            header +=       '</tr>';
            header +=   '</thead>';

            header +=   '<tbody id = "tableBody">';
            header +=   '</tbody>';

            header +='</table>';

            $('#'+divId).empty().append(header);
        }

        if(bonusList){

            $.each(bonusList, function(key, firstNode){
                content += '<tr>';

                $.each(firstNode, function(key1, value){
                        content += '<td>'+value+'</td>';
                });
                    
                content += '</tr>';

            });

            if(totalBonusList){
                content += '<tr style="font-weight:700;background-color: #bbffcd!important">';
                $.each(totalBonusList, function(key, value){
                    content += '<td>'+value+'</td>';
                });
                content += '</tr>';
            }

            

            $('#tableBody').html(content);

            pageNumber = data.pageNumber;
            totalPage = data.totalPage;

        }

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
