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
                                                <!-- <div class="col-sm-3 form-group">
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
                                                        <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="name" dataType="text">
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
                                                        <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                    </label>
                                                    <select class="form-control" dataName="status" dataType="select">
                                                        <option value="">All</option>
                                                        <option value="availablePoint">Available Points</option>
                                                    </select>
                                                </div>

                                                <!-- <div class="col-sm-3 form-group" id="datepicker" >
                                                    <label class="control-label" data-th="">Date</label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="bonusDate" dataType="dateRange" autocomplete="off">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="bonusDate" dataType="dateRange">
                                                    </div>
                                                </div> -->
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
                            <!-- <div class="card-box p-b-0"> -->
                                <button id="exportBtn" type="" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px; display: none">
                                    <?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?>
                                </button> 
                                <button id="seeAllBtn" type="" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light" style="margin-bottom: 10px; display: none">
                                      <?php echo $translations['A01191'][$language]; /*See All*/ ?>
                                </button> 
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="bonusListDiv" class="table-responsive"></div>
                                            <span id="grandTotal"></span>
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
    <!-- END wrapper -->

    <input type="hidden" id="storeClientID" name="">
    <div class="modal fade" id="pumpModal" role="dialog">
        <div class="modal-dialog" role="document" style="width: 450px;">
            <div class="modal-content" style="border-radius: 0;">
                <div class="modal-header" style="padding: 20px;">
                    <h4 class="modal-title">Pump Sales</h4>
                </div>
                <div class="modal-body" style="margin-top: 15px; padding-bottom: 15px;margin-bottom:15px" align="left">
                    <div class="form-group row">
                        <!-- <div class="col-md-5 d-flex align-items-center"> -->
                            <label><?php echo $translations['A00102'][$language]; /* Username */ ?></label>
                        <!-- </div> -->
                        <!-- <div class="col-md-7"> -->
                            <input type="text" class="form-control" id="tUsername" name="" disabled>
                            <span id="clientError" class="customError text-danger"></span>
                        <!-- </div> -->
                    </div>

                    <div class="form-group row">
                        <!-- <div class="col-md-5 d-flex align-items-center"> -->
                            <label>Type</label>
                        <!-- </div> -->
                        <!-- <div class="col-md-7"> -->
                            <select id="tType" class="form-control">
                                <option value="Sponsor">Sponsor</option>
                                <option value="Investment">Investment</option>
                            </select>
                            <span id="typeError" class="customError text-danger"></span>
                        <!-- </div> -->
                    </div>

                    <div class="form-group row">
                        <!-- <div class="col-md-5 d-flex align-items-center"> -->
                            <label><?php echo $translations['A00821'][$language]; /* Amount */ ?></label>
                        <!-- </div> -->
                        <!-- <div class="col-md-7"> -->
                            <input type="number" class="form-control" id="tAmount" name="">
                            <span id="amountError" class="customError text-danger"></span>
                        <!-- </div> -->
                    </div>
                    
                    <!-- <input type="password" class="form-control" id="transactionPassword" name=""> -->
                </div>
                <div class="modal-footer" style="padding-bottom: 20px;" align="center">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">
                        <?php echo $translations['M00943'][$language]; /* Close */ ?>
                    </button>
                    <button onclick="confirmPump()" type="button" class="btn btn-success waves-effect waves-light">
                        <?php echo $translations['A00134'][$language]; /* Confirm */ ?>
                    </button>
                </div>
            </div>
        </div>
    </div>

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
        "<?php echo $translations['A00148'][$language]; /* Member ID */ ?>",
        "<?php echo $translations['A00102'][$language]; /* Username */ ?>",
        "<?php echo $translations['A00117'][$language]; /* Full Name */ ?>",
        "<?php echo $translations['A01349'][$language]; /*Main Leader Username*/ ?>",
        "Pumping Investment Sales",
        "Investment",
        "Pumping Sponsor Sales",
        "Sponsor Sales",
        "Entitled Point",
        "Pending Point",
        "Redeemed Point",
        "Rejected Point",
        "Available Point",
        ""
    );
    var searchId = 'searchForm';
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    $(document).ready(function() {

        // fCallback = loadDefaultListing;
        // formData  = {command: 'getPromoSalesReport'};
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
    });

    function seeAllBtn() {

        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getPromoSalesReport',
            inputData   : searchData,
            pageNumber   : 1,
            seeAll   : 1
        };
        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }
   
    function exportBtn(){
         
          var searchID = 'searchForm';
          var searchData = buildSearchDataByType(searchID);
          var thArray  = Array(
                "Member ID",
                "Username",
                "Full Name",
                "Main Leader Username",
                "Pumping Investment Sales",
                "Investment",
                "Pumping Sponsor Sales",
                "Sponsor Sales",
                "Entitled Point",
                "Pending Point",
                "Redeemed Point",
                "Rejected Point",
                "Available Point"
            );

          var key  = Array (
                "memberID",
               "username",
                "name",
                "mainLeaderUsername",
                "pumpedInvestment",
                "Investment",
                "pumpedSponsor",
                "Sponsor",
                "entitledPoint",
                "pendingPoint",
                "redeemedPoint",
                "rejectedPoint",
                "availablePoint"
            );
            var formData  = {
                command    : "getPromoSalesReport",
                filename   : "PromotionalSalesPumping",
                inputData  : searchData,
                header     : thArray,
                key        : key,
                DataKey    : "clientPointsAry"
            };
             $.redirect('exportExcel2.php', formData); 
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
            command     : "getPromoSalesReport",
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
        var tableNo;
         if (data.clientPointsAry){
            var newList = [];
            $.each(data.clientPointsAry, function(k, v){
                var btn = `<a href="javascript:;" onclick="pumpSales('${v.client_id}', '${v.username}')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary"><i class="fa fa-edit"></i></a>`;
                var rebuildData = {
                    memberID : v['memberID'],
                    username : v['username'],
                    name : v['name'],
                    mainLeaderUsername : v['mainLeaderUsername'] || '-',
                    pumpedInvestment : v['pumpedInvestment'] || '-',
                    Investment : v['Investment'] || '-',
                    pumpedSponsor : v['pumpedSponsor'] || '-',
                    Sponsor : v['Sponsor'] || '-',
                    entitledPoint : v['entitledPoint'] || '-',
                    pendingPoint : v['pendingPoint'] || '-',
                    redeemedPoint : v['redeemedPoint'] || '-',
                    rejectedPoint : v['rejectedPoint'] || '-',
                    availablePoint : v['availablePoint'] || '-',
                    btn: btn
                };
                newList.push(rebuildData);
          });
       }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find('td:last-child').css('text-align', 'center');
        })

        // $('#'+tableId).tableExport({
        //     headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
        //     footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
        //     formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
        //     filename: 'Affiliate_Tiering_Rebate', // (id, String), filename for the downloaded file, (default: 'id')
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
    
    // function tableBtnClick(btnId) {
    //     var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
    //     var tableRow = $('#'+btnId).parent('td').parent('tr');
    //     var tableId  = $('#'+btnId).closest('table');
        
    //     if (btnName == 'edit') {
    //         var editId = tableRow.attr('data-th');
    //         $.redirect("editAdmin.php",{id: editId});
    //     }
    // }

    function pumpSales(id, username) {
        // alert(id);
        $("#storeClientID").val(id);
        $("#tUsername").val(username);

        $("#pumpModal").modal();
    }

    function confirmPump() {
        var clientID = $("#storeClientID").val();
        var amount = $("#tAmount").val();
        var type = $("#tType").val();

        var formData = {
            command     : "pumpPromoSales",
            clientID    : clientID,
            amount      : amount,
            type        : type
        }
        var fCallback = loadDonePump;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDonePump(data, message) {
        $("#pumpModal").modal('hide');
        showMessage(message, 'success', 'Success', 'edit', 'promotionalSales.php');
    }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
    
   
</script>
</body>
</html>
