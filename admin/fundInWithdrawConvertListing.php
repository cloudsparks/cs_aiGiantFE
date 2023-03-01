<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

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
        <style type="text/css">
            #bonusListDiv table tr td {
                text-align: center;
            }
        </style>
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
                                             <div class="col-sm-12 px-0">
                                                <!-- <div class="col-sm-4 form-group">
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
                                                </div> -->

                                                <div id="datepicker" class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00137'][$language]; /* Date */ ?>
                                                    </label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                        <input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataName="date" dataType="dateRange">
                                                        <div class="input-group-addon">
                                                            <?php echo $translations['A00139'][$language]; /* to */?>
                                                        </div>
                                                        <input id="dateRangeEnd" type="text" class="input-sm form-control" name="end" dataName="date" dataType="dateRange">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A01349'][$language]; /*Main Leader Username*/ ?>
                                                    </label>
                                                    <input id="mainLeaderUsername" type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                                </div>
                                                
                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                       <?php echo $translations['A01242'][$language]; /* Leader Username */?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                </div>

                                                  <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                    </label>
                                                    <select id="countryName" class="form-control" dataName="countryName" dataType="text">
                                                        <option value="">
                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                        </option>
                                                    </select>
                                                </div>
                                               <!--    <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                      From Member Username
                                                    </label>
                                                    <input type="text" class="form-control" dataName="from_id_username" dataType="text">
                                                </div> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="email">
                                                        <?php echo $translations['A00103'][$language]; /* Email */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="email" dataType="text">
                                                </div> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" data-th="role_id">Role Name</label>
                                                    <select id="roleName" class="form-control">
                                                    </select>
                                                </div> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" data-th="disabled">
                                                        <?php echo $translations['A00104'][$language]; /* Disabled */ ?>
                                                    </label>
                                                    <select class="form-control" dataName="disabled" dataType="select">
                                                        <option value="">
                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                        </option>
                                                        <option value="1">
                                                            <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                        </option>
                                                        <option value="0">
                                                            <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                        </option>
                                                    </select>
                                                </div> -->
                                            <!-- hidden -->
                                            <!-- <form id="adminType" role="form" style="display:none;">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="name">Admin Type</label>
                                                    <input type="text" class="form-control" value="Admin">
                                                </div>
                                            </form> -->
                                        </div>
                                            <div class="col-xs-12 m-t-rem1">
                                                <button id="searchBtn" type="button" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                                </button>
                                                <button id="resetBtn" type="button" class="btn btn-default waves-effect waves-light">
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
                            <!-- <div class="card-box p-b-0"> -->
                                <button id="exportBtn" type="button" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                     <?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?>
                                </button> 
                                <button id="seeAllBtn" type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none">
                                     <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                                </button> 
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="bonusListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerBonusList"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <!-- </div> -->
                        </div>
                    </div><!-- End row -->

                </div> <!-- container -->

            </div> <!-- content -->


            <?php include("footer.php"); ?>

        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>

    <div class="modal stick-up" id="showRank" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="pg-close fs-14"></i>
                    </button>
                    <h3>
                       <?php echo $translations['A00821'][$language]; /* Amount */ ?>
                   </h3>
               </div>
               <div class="modal-body">
                    <div id="showRankTable" class="row">
                        <div class="col-lg-12">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <!--   <button id="confirmButton" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                        <span>
                            Confirm
                        </span>
                    </button> -->
                    <button type="button" class="btn btn-default btn-cons no-margin inline" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>
    // Initialize all the id in this page
    var divId    = 'bonusListDiv';
    var tableId  = 'bonusListTable';
    var pagerId  = 'pagerBonusList';
    var btnArray = {};
    var thArray  = Array(
        "<?php echo $translations['A00137'][$language]; /* Date */ ?>",
        "Withdrawal",
        "Fund In",
        "Convert"
    );
    var searchId = 'searchForm';
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqClient.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  
    var withdrawalList        = [];

    $(document).ready(function() {
        // fCallback = loadDefaultListing;
        // formData  = {command: 'getFundInWithdrawConvertListing'};
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        //reset to default search
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
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 

        $('#datepicker input').each(function() {
            $(this).datepicker('clearDates');
        });

        $('#seeAllBtn').click(function() {

            var searchID = 'searchForm';
            var searchData = buildSearchDataByType(searchID);
            formData  = {
                command : 'getFundInWithdrawConvertListing',
                inputData   : searchData,
                pageNumber   : 1,
                seeAll   : 1
            };
            // console.log(formData);
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });
    });

     function exportBtn(){
         
          var searchID = 'searchForm';
          var searchData = buildSearchDataByType(searchID);
            var thArray = Array(
              "Date",
              "Withdrawal",
              "Fund In",
              "Convert"
            );
            var key  = Array (
               "date",
               "withdrawal",
               "fundIn",
               "convert"
            );
            var formData  = {
                command    : "getFundInWithdrawConvertListing",
                filename   : "fundInWithdrawConvertListing",
                inputData  : searchData,
                header     : thArray,
                key        : key,
                type       : "export",
                DataKey    : "newListing"
            };
             $.redirect('exportExcel2.php', formData); 
    }

    function seeAllBtn() {

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getFundInWithdrawConvertListing',
            inputData   : searchData,
            pageNumber   : 1,
            seeAll   : 1
        };
        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }

    $('#dateRangeStart').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format      : 'dd/mm/yyyy',
        orientation : 'auto',
        autoclose   : true
    });

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getFundInWithdrawConvertListing",
            pageNumber  : pageNumber,
            inputData   : searchData,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
            
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard, #exportBtn, #seeAllBtn').show();
        loadCountryDropdown(data.countryList);
        var storeRankAll2 = [];
        var tableNo;
        var count = 1;
         if (data.newListing){
            var newList = [];
            var newAmount = {};
            $.each(data.newListing, function(k, v){
                // console.log(k);

                var w = v['withdrawal'] == '-'?'-':`<a href="javascript:;" onclick="viewAmount('${v.id}', 'w')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary"><i class="fa fa-eye"></i> View Amount</a>`;
                var f = v['fundIn'] == '-'?'-':`<a href="javascript:;" onclick="viewAmount('${v.id}', 'f')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-info"><i class="fa fa-eye"></i> View Amount</a>`;
                var c = v['convert'] == '-'?'-':`<a href="javascript:;" onclick="viewAmount('${v.id}', 'c')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-eye"></i> View Amount</a>`;

                var rebuildData = {
                    date: k,
                    withdrawal: w,
                    fundIn: f,
                    convert: c

                };
                // ++count;
                newList.push(rebuildData);

                newAmount[v.id] = {
                    'w': v['withdrawal'],
                    'f': v['fundIn'],
                    'c': v['convert'],
                }
                

                // var rankAll2 = v['rankAll'];
                // storeRankAll2.push(rankAll2);
          });
       }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        withdrawalList = newAmount;


        function loadCountryDropdown(data) {
            if(data) {
                $.each(data, function(key, val) {
                    var countryID = val['id'];
                    var country   = val['name'];
                    $('#countryName').append('<option value="' + countryID + '">' + country + '</option>');
                });
            }
        }
    }
    
    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');
        
        if (btnName == 'edit') {
           
        }
    }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function viewAmount(id, type){
        // console.log(rankList);
        // console.log(rankList[id]);
        var list = withdrawalList[id][type];
        var tr = "";

        $.each(list, function(k,v){
            tr+=`
                <tr class="text-center">
                    <td>${k}</td>
                    <td>${v}</td>
                </tr>
            `;
        });

        var table = `
            <table class="table table-striped table-bordered no-footer m-0">
                <thead>
                    <tr class="background:transparent!important"><th>Coin</th><th>Amount</th></tr>
                </thead>
                <tbody>
                    ${tr}
                </tbody>
            </table>
        `;

        $("#showRankTable").html(table);

        $("#showRank").modal();

    }
    
   
</script>
</body>
</html>
