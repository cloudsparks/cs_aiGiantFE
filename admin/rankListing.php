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
                                                <div class="col-sm-3 form-group">
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

                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Username Type 
                                                    </label>
                                                    <div class="form-control" style="border: none">
                                                        <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                        <label for="match">Match</label>

                                                        <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                        <label for="like">Like</label>
                                                    </div>
                                                </div> -->

                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00117'][$language]; /* Full Name */?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="fullName" dataType="text">
                                                </div>

                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                       <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                </div>

                                                <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="">
                                                        <?php echo $translations['A01349'][$language]; /*Main Leader Username*/ ?>
                                                    </label>
                                                    <input id="mainLeaderUsername" type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 px-0">
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
                                               <!--    <div class="col-sm-3 form-group">
                                                    <label class="control-label">
                                                      From Member Username
                                                    </label>
                                                    <input type="text" class="form-control" dataName="from_id_username" dataType="text">
                                                </div> -->
                                                <!-- <div class="col-sm-3 form-group">
                                                    <label class="control-label" for="" data-th="email">
                                                        <?php echo $translations['A00103'][$language]; /* Email */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="email" dataType="text">
                                                </div> -->
                                                <!-- <div class="col-sm-3 form-group">
                                                    <label class="control-label" data-th="role_id">Role Name</label>
                                                    <select id="roleName" class="form-control">
                                                    </select>
                                                </div> -->
                                                <!-- <div class="col-sm-3 form-group">
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
                                                <div class="col-sm-3 form-group">
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
                                <button id="seeAllBtn" type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;display: none;">
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
                       View Rank
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
    var btnArray = Array('edit');
    var thArray  = Array("<?php echo $translations['A00148'][$language]; /* Member ID */ ?>",
                         "<?php echo $translations['A00102'][$language]; /* Username */ ?>",
                         "<?php echo $translations['A00117'][$language]; /* Full Name */?>",
                         "<?php echo $translations['A01349'][$language]; /*Main Leader Username*/ ?>",
                         "<?php echo $translations['A00153'][$language]; /* Country */ ?>",
                         "Flexi Value",
                         "Hedging Value",
                         "Quantum Value",
                         'Rebate Percentage(Quantum)',
                         'Extra Rebate Percentage(Quantum)',
                         "Level"
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
    var rankList        = [];

    $(document).ready(function() {
        // fCallback = loadDefaultListing;
        // formData  = {command: 'getRankListing'};
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
                command : 'getRankListing',
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
              "Member ID",
              "Username",
             "Full Name",
             "Main Leader Username",
              "Country",
              "Flexi Value",
              "Hedging Value",
              "Quantum Value",
              "Rebate Percentage(Quantum)",
              "Extra Rebate Percentage(Quantum)",
              "Level"
            );
            var key  = Array (
               'member_id',
               'username',
               'fullName',
               'mainLeaderUsername',
               'countryName',
               'flexiValue',
               'hedgingValue',
               'quantumValue',
               'rebateQuantumPercentage',
               'rebateQuantumExtra',
               'level'
            );
            var formData  = {
                command    : "getRankListing",
                filename   : "rankListingReport",
                inputData  : searchData,
                header     : thArray,
                key        : key,
                DataKey    : "rankListing"
            };
             $.redirect('exportExcel2.php', formData); 
    }

    function seeAllBtn() {

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getRankListing',
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
            command     : "getRankListing",
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
         if (data.rankListing){
            var newList = [];
            var newRank = {};
            $.each(data.rankListing, function(k, v){
                // console.log(k);

                var rebuildData = {
                    // count : count,
                    member_id: v['member_id'], 
                    username : v['username'],
                    fullName : v['fullName'],
                    mainLeaderUsername : v['mainLeaderUsername'],
                    country: v['countryName'],
                    flexiValue: v['flexiValue'],
                    hedgingValue: (v['hedgingValue']),
                    quantumValue: v['quantumValue'],
                    rebatePercentage : v['rebateQuantumPercentage'],
                    rebateQuantumExtra : v['rebateQuantumExtra'],
                    highestRank: v['highestRank'],
                    rankAll: v['rankAll'],

                };
                // ++count;
                newList.push(rebuildData);

                if (v['rankAll'] != 0) {
                    newRank[v['member_id']] = v['rankAll'];
                }
                

                // var rankAll2 = v['rankAll'];
                // storeRankAll2.push(rankAll2);
          });
       }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        rankList = newRank;

        $('#'+tableId).find('tbody tr').each(function(){
            // $(this).find('td:eq(0)').addClass('hide');
            $(this).find('td:eq(5)').css('text-align', "right");
            $(this).find('td:eq(6)').css('text-align', "right");
            $(this).find('td:eq(7)').css({'text-align':"right"});
            $(this).find('td:eq(8)').css('text-align', "right");
            $(this).find('td:eq(9)').css('text-align', "right");
            $(this).find('td:eq(11)').addClass('hide');
            $(this).find('td:last-child').css('text-align', 'center');


            var rankAll = $(this).find("td:eq(10)").text();
            var id = $(this).find("td:eq(0)").text();
            // console.log(storeRankAll2);
            if (rankAll != 0){
               $(this).find("td:eq(12)").html(`<a data-toggle="tooltip" title="" id="edit" onclick="showRank('${id}')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Accept"><i class="fa fa-eye"></i></a>`);
            }else{
                $(this).find("td:eq(12)").html('-');
            }

        });


    function loadCountryDropdown(data) {
        if(data) {
            $.each(data, function(key, val) {
                var countryID = val['id'];
                var country   = val['name'];
                $('#countryName').append('<option value="' + countryID + '">' + country + '</option>');
            });
        }
    }
         // $('#' + tableId).find('tbody').append(`
         //            <tr style="">
         //                <td colspan='8' class="text-right"><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</td>
         //                <td style="text-align: right;"> ${addCormer(data.page_total_bonus_amount)} </td>
         //            </tr>
         //        `);

        // $('#'+tableId).tableExport({
        //     headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
        //     footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
        //     formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
        //     filename: 'Investor_Ranking', // (id, String), filename for the downloaded file, (default: 'id')
        //     bootstrap: true, // (Boolean), style buttons using bootstrap, (default: true)
        //     exportButtons: true, // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
        //     position: 'bottom', // (top, bottom), position of the caption element relative to table, (default: 'bottom')
        //     ignoreRows: null, // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
        //     ignoreCols: null, // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
        //     trimWhitespace: false // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
        // });

        // $('button.xlsx').removeClass("btn-default").addClass("btn-primary waves-effect waves-light");
        // $('button.xlsx').text('Export to xlsx');
        // $('table#'+tableId).find("caption").append('<button type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px;">See All</button>');  
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

    function showRank(id){
        // console.log(rankList);
        // console.log(rankList[id]);
        var list = rankList[id];
        var tr = "";

        $.each(list, function(k,v){
            tr+=`
                <tr class="text-center">
                    <td>${k+1}</td>
                    <td>${v}%</td>
                </tr>
            `;
        });

        var table = `
            <table class="table table-striped table-bordered no-footer m-0">
                <thead>
                    <tr class="background:transparent!important"><th>Level</th><th>Percentage</th></tr>
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
