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
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchEmallId" role="form">
                                        
                                        <!--<div class="col-sm-12 px-0">
                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="username">
                                                   <?php echo $translations['A00102'][$language]; /* Username */?>
                                                </label>
                                                <span class="pull-right">
                                                   <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                    <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                    <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                    <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                </span>
                                                <input type="text" class="form-control" dataName="username" dataType="text">
                                            </div>

                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="memberID">
                                                   <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="memberID" dataType="text">
                                            </div>

                                            <div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="phone">
                                                    Phone
                                                </label>
                                                <input type="text" class="form-control" dataName="phone" dataType="text">
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
                                        </div>-->
                                        <div class="col-sm-12 px-0">
                                            <!--<div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="serialNumber">
                                                    <?php echo $translations["A01387"][$language]; ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="serial_no" dataType="text">
                                            </div> -->

                                            <!--<div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="name">
                                                    <?php echo $translations['A00117'][$language]; /* Full Name */?>
                                                </label>
                                                <input type="text" class="form-control" dataName="name" dataType="text">
                                            </div>-->
                                              <div class="col-sm-3 form-group" id="datepicker" >
                                                    <label class="control-label" data-th="">
                                                         <?php echo $translations['A00137'][$language]; /* Date */?>
                                                    </label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="createdAt" dataType="dateRange" autocomplete="off">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="createdAt" dataType="dateRange">
                                                    </div>
                                                </div>

                                                 <div class="col-sm-3 form-group">
                                                <label class="control-label" for="" data-th="status">
                                                    <?php echo $translations['A00318'][$language]; /*status*/ ?>
                                                </label>
                                                <select id="status" class="form-control" dataName="status" dataType="select">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /*all*/ ?>
                                                    </option>
                                                    <option value="Active">
                                                        <?php echo $translations['A00372'][$language]; /*Waiting Approval*/ ?>
                                                    </option>
                                                    <option value="Inactive">
                                                        <?php echo $translations['A00373'][$language]; /*Cancel*/ ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--<div class="col-sm-12 px-0">
                                         <div class="col-sm-3 form-group">
                                                <label class="control-label" for="">
                                                     <?php echo $translations['A01109'][$language]; /* Leader Username */ ?>
                                                </label>
                                                <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                            </div>

                                           
                                            <div class="col-sm-3 form-group">
                                                 <label class="control-label" for="">
                                                      <?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>
                                                 </label>
                                                 <input id="mainLeaderUsername" type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                            </div>
                                        </div>-->
                                        </form>
                                        <div class="col-xs-12">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light"><?php echo $translations['A00051'][$language]; /* Search */ ?></button>
                                            <button type="submit" id="resetBtn" class="btn btn-default waves-effect waves-light"><?php echo $translations['A00053'][$language]; /* reset */ ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                      <!--   <div class="card-box p-b-0"> -->
                        <button type="button" onclick="addEmall()" class="btn btn-primary waves-effect waves-light " style="margin-bottom: 10px;">Add Diamond Design</button> 
                                <div id="basicwizard" class="pull-in" style="display: none">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <!-- <button type="button" onclick="exportBtn()" class="btn btn-primary waves-effect waves-light m-b-rem1"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></button> -->
                                        <button type="button" onclick="seeAllBtn()" class="btn btn-primary waves-effect waves-light " style="margin-bottom: 10px;"><?php echo $translations['A01191'][$language]; /*See All*/ ?></button> 
                                        <form>
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="emallDesignListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pageremallDesignList"></ul>
                                            </div>
                                        </form>

                                        <!----------------- Multi select html ---------------->
                                    <!--<div style="margin-top: 10px; margin-bottom: 10px">
                                        <span>
                                            <?php echo $translations['A00571'][$language]; /* Remark */ ?> : 
                                        </span>
                                        <input id="remark" type="form-control">
                                    </div>

                                    <span>
                                        <?php echo $translations['A00663'][$language]; /* With selected */ ?> : 
                                    </span>
                                    <div id="selectionDiv" style="display: inline-block; margin-left: 5px; width: 150px">
                                        <select id="statusSelect" class="m-l-rem1 form-control" dataName="status" dataType="select">
                                            <option value="Approve" selected>
                                                <?php echo $translations['A01141'][$language]; /* Approved */ ?>
                                            </option>
                                            <option value="Pending">
                                                <?php echo $translations['A01017'][$language]; /* Rejected */ ?>
                                            </option>
                                            <option value="Cancel">
                                                <?php echo $translations['A00660'][$language]; /* Rejected */ ?>
                                            </option>
                                            <option value="Reject">
                                                <?php echo $translations['A01142'][$language]; /* Rejected */ ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div style="display: inline-block; margin-left:20px;">
                                        <button type="" id="updateBtn" class="btn btn-primary waves-effect waves-light" style="width: 100px">
                                            <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                        </button>
                                    </div>
                                         
                                    </div>-->

                                </div>
                            </form>
                        <!-- </div> -->
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
    // Initialize all the id in this page
    var divId    = 'emallDesignListDiv';
    var tableId  = 'emallDesignListTable';
    var pagerId  = 'pageremallDesignList';
    // var btnArray = Array('edit');
    var btnArray = {};

   var thArray  = Array(
        // "check",//checkbox
        "",
        "<?php echo $translations['A01405'][$language]; /* design name */ ?>",
        "<?php echo $translations['A01406'][$language]; /* Engagement Ring */?>",
        "<?php echo $translations['A01407'][$language]; /* Material */?>",
        "<?php echo $translations['A00961'][$language]; /* "Price" */?>",
        "<?php echo $translations['A00301'][$language]; /* "Type" */?>",
        "<?php echo $translations['A00318'][$language]; /* Status */?>",
        "<?php echo $translations['A00112'][$language]; /* Created At */?>",
        "<?php echo $translations['A00377'][$language]; /* Updated at */?>"

        // "<?php echo $translations['A01392'][$language]; /* Carat */?>",
        // "<?php echo $translations['A01391'][$language]; /* Clarity */?>",
        // "<?php echo $translations['A01394'][$language]; /* Cost */?>",
        // "<?php echo $translations['A01395'][$language]; /* Price */?>",
    );
    var searchId = 'searchEmallId';
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqEmall.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    $(document).ready(function() {

        var searchID = 'searchEmall';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getEmallDesign',
            inputData   : searchData,
        };
        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
        //reset to default search
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchEmall').find('input:not([type=radio])').each(function() {
               $(this).val(''); 
            });
            $('#searchEmall').find('select').each(function() {
                $(this).val('');
            $("#searchEmall")[0].reset();
            });

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        }); 

        $('#datepicker input').each(function() {
            $(this).datepicker('clearDates');
        });

    });

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


    $('.input-daterange input').each(function() {
            $(this).daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY'
                    // format: strToTime();
                }
            });
            $(this).val('');
        });


    function exportBtn(){
         
          var searchID = 'searchEmall';
          var searchData = buildSearchDataByType(searchID);
            var thArray = Array(
                "Member ID",
                "Created At",
                "Estimated Date",
                // "Leader Username",
                "S/N",
                "Client Name",
                "Client Username",
                "Client Phone Number",
                "Main Leader Username",
                "Country",
                "Wallet Address",
                "Credit Type",
                "Amount",
                "Charges",
                "Total withdrawn",
                "Approved Amount",
                "Approved At",
                "Status"
                );
            var key  = Array (
                'clientMemberID',
               'createdAt',
               'estimated_date',
               // 'mainLeaderUsername',
               'serial_number',
               'clientName',
               'clientUsername',
               'clientPhone',
               'mainLeaderUsername',
               'country',
               'walletAddress',
               'creditType',
               'amount',
               'charges',
               'receivable_amount',
               "approved_amount",
               'approvedAt',
               'status'
            );
            var formData  = {
                command    : "getEmallDesign",
                filename   : "EmallListReport",
                inputData  : searchData,
                header     : thArray,
                key        : key,
                DataKey    : "withdrawalList"
            };
             $.redirect('exportExcel2.php', formData); 
    }


     function seeAllBtn() {
        var searchID = 'searchEmall';
        var searchData = buildSearchDataByType(searchID);
        formData  = {
            command : 'getEmallDesign',
            inputData   : searchData,
            pageNumber   : 1,
            seeAll   : 1
        };

        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function pagingCallBack(pageNumber, fCallback){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData   = {
            command     : "getEmallDesign",
            pageNumber  : pageNumber,
            searchData   : searchData,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
            
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        $('#basicwizard').show();
        var tableNo;
        var diamondDesignList = data.designDataAry;
        // loadCountryDropdown(data.countryList);

         if(data == ""){
            $('#hideRow').addClass('hide');
        }else {
            $('#hideRow').removeClass('hide');
        }

        
        if(data != "" && diamondDesignList.length>0) {
            var newList = [];
            var j = 0;
            $.each(diamondDesignList, function(k, v) {
            // console.log(v);
                var btn = `<a data-toggle="tooltip" onclick="tableBtnClick('${v['id']}')" class="m-t-5 m-r-10 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit"><i class="fa fa-edit"></i></a>`;

                var rebuildData = {
                    btn: btn,
                    name : v['name'],
                    engagement_ring : v['engagement_ring'],
                    material : v['material'],
                    price : addCommas(Number(v['price']).toFixed(2)),
                    type : v['type'],
                    status : v['status'],
                    createdAt : dateTimeFormat(v['created_at']),
                    updatedAt : (v['updated_at'] > 0) ? dateTimeFormat(v['updated_at']) : '-'
                };
                ++j;
                newList.push(rebuildData);
            });
        }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);


       if(diamondDesignList) {
            $.each(diamondDesignList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['id']);
            });
        }

        $('#'+tableId).find('thead tr').each(function(){
            $(this).find("th:eq(4)").css("text-align", "right");
        });
        
        $('#'+tableId).find('tbody tr').each(function(){
            $(this).find("td:eq(4)").css("text-align", "right");
            $(this).find("td:eq(0)").css("text-align", "center");
            var status = $(this).find('td:eq(14)').text();
            // console.log(status);
            if(status == "Cancel" || status == "Reject" || status == "Approve"){
                $(this).find("td:eq(15)").html('-');
            }

            // $(this).find('td:first-child').css('text-align', 'center');
            $(this).find('td:last-child').css('text-align', 'center');
        });

        $('#'+tableId+' tr:last').after(data.total);

        // $('#'+tableId).tableExport({
        //     headers: true, // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
        //     footers: false, // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
        //     formats: ['xlsx'], // (String[]), filetype(s) for the export, (default: ['xlsx', 'csv', 'txt'])
        //     filename: 'Withdrawal_List', // (id, String), filename for the downloaded file, (default: 'id')
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


    function loadCountryDropdown(data) {
        if(data) {
            $.each(data, function(key, val) {
                var countryID = val['id'];
                var country   = val['name'];
                $('#countryName').append('<option value="' + countryID + '">' + country + '</option>');
            });
        }
    }

    function tableBtnClick(id) {
        $.redirect('editEmallDesign.php', {
            id: id
        });
    }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'withdrawalList.php');
    }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function addEmall(){
        $.redirect("addEmallDesign.php");
    }
    
   
</script>
</body>
</html>