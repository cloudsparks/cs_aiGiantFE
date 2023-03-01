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
                <!-- Start container -->
                <div class="container">
                    <!-- Start row -->
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
                                                            <label class="control-label" for="">
                                                                <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                            </label>
                                                            <span class="pull-right">
                                                                 <input id="match" type="radio" name="usernameType" value="match" checked> 
                                                                <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                                <input id="like" type="radio" name="usernameType" value="like" style="margin-left: 15px;" > 
                                                                <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                            </span>
                                                            <input id="username" type="text" class="form-control" dataName="username" dataType="text">
                                                        </div>
                                                         <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                 <?php echo $translations['A00117'][$language]; /* Full Name */?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="name" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                               <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A01109'][$language]; /* Leader Username */ ?>
                                                            </label>
                                                            <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                        </div>
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                Coin Type
                                                            </label>
                                                            <select id="creditType" class="form-control" dataName="creditType" dataType="select" >
                                                                <option value="">
                                                                    <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                       
                                            </form>
                                            <div class="col-xs-12">
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
                    <!-- End row -->
                    <!-- Start row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <div class="card-box p-b-0"> -->
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="listingDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="listingPager"></ul>
                                            </div>
                                            <!-- start -->
                                            <div id="paginationOptions" class="newLineMargin" style="display: table;padding: 10px 0px;">
                                                <div style="display: inline-block;">
                                                    <span class="m-l-rem1">
                                                        <?php echo $translations['A00602'][$language]; /* with selected */ ?> : 
                                                    </span>
                                                </div>
                                                <div id="selectionDiv" style="display: inline-block; margin-left: 5px; width: 150px">
                                                    <select id="statusSelect" class="m-l-rem1 form-control" dataName="status" dataType="select">
                                                        <option value="Inactive">
                                                            <?php echo $translations['A00373'][$language]; /* Inactive */ ?>
                                                        </option>
                                                        <<!-- option value="Deleted">
                                                            <?php echo $translations['A00374'][$language]; /* Deleted */ ?>
                                                        </option> -->
                                                    </select>
                                                </div>
                                                <div style="display: inline-block; margin-left:20px;">
                                                    <div id="updateBtn" class="btn btn-primary waves-effect waves-light" style="width: 100px">
                                                        <?php echo $translations['A00300'][$language]; /* Update */ ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end -->
                                        </div>
                                    </div>
                                </form>
                            <!-- </div> -->
                        </div>
                    </div>
                    <!-- End row -->
                </div>
                <!-- container -->
            </div>
            <!-- content -->

            <?php include("footer.php"); ?>

        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>

    // Initialize all the id in this page
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array(
        '<input type="checkbox" id="checkAll" >',
        '<?php echo $translations['A00137'][$language]; /* Date */?>',
         '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
         '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
         'Crypto Type',
         '<?php echo $translations['A01185'][$language]; /* Wallet Address */ ?>',
         'Status'
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

    $(document).ready(function() {

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });
        
        // fCallback = loadDefaultListing;
        // formData  = {command: 'adminGetWalletAddressListing'};
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        formData = {
            command   : 'getAvailableCreditWalletAddress'
        };
       
        fCallback = buildCreditType;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
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

        $('#updateBtn').click(function() {
            var checkedIDs = [];
            $(".walletAddressCheck:checked").each(function() {
                var checkboxID = $(this).val();
                checkedIDs.push(checkboxID);
            });

            if(checkedIDs.length === 0)
                showMessage('<?php echo $translations['A00613'][$language]; /* No check box selected. */ ?>', 'warning', '<?php echo $translations['A00614'][$language]; /* Update Status */ ?>', 'edit', '');
            else {
                var formData   = {
                    command : 'updateWalletAddressStatusAdmin',
                    checkedIDs : checkedIDs,
                    status : $('#statusSelect').find('option:selected').val()
                };
                fCallback = updateCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

        
    });

    function buildCreditType (data, message){
        console.log(data);
        var html = `<option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>`;

        $.each(data.creditList, function(i, obj) {
            html+=`<option value="${obj.value}">${obj.display}</option>`;
        });
        $("#creditType").html(html);
    }

    
    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard').show();
        //set default if data.bankAccList is null
        var tableNo;
       
        // if (data.availableCredit){
        //     $('#creditType').empty();
        //     $('#creditType').html(`
        //             <option value="">
        //                 <?php echo $translations['A00055'][$language]; /* All */ ?>
        //             </option>
        //         `);
        //       $.each(data.availableCredit, function(key, value) {
        //         $('#creditType').append('<option value="' +key+ '">' +value+ '</option>');
        //     });
        // }
        
        if (data.dataList){
        var newList = [];
        $.each(data.dataList, function(k, v){

            var checkbox = `<input type="checkbox" value="${v['id']}" class="walletAddressCheck" >`;

            var rebuild = {
                checkbox : checkbox,
                createdAt : v['createdAt'],
                memberID : v['memberID'],
                username : v['username'],      
                creditType : v['creditType'],
                walletAddress: v['walletAddress'],
                statusDisplay: v['statusDisplay']
            };

            newList.push(rebuild);
        });
    }
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        // addColumn(tableId, data, 7, "Inactive");
       
        // if(data.dataList) {
        //     $.each(data.dataList, function(k, v) {
        //         $('#'+tableId).find('tr#'+k).attr('data-id', v['id']);
        //     });      
        // }

         // $('#'+tableId).find('tbody tr').each(function(){

         //     var status = $(this).find("td:eq(-1)").text();
         //     // console.log(status);
         //     if (status == "Inactive"){
         //        $(this).find("td:eq(0)").empty().append('-');
         //     }

         //     $(this).find('td:first-child').css('text-align', 'center');
         // });

         // $('#'+tableId).find('thead tr td').eq(0).remove();

         $("#checkAll").change(function(){
            var checked = $(this).is(":checked");
            $(".walletAddressCheck").prop("checked", checked);
         });
    }

    function pagingCallBack(pageNumber, fCallback){
            if(pageNumber > 1) bypassLoading = 1;

            var searchData = buildSearchDataByType(searchId);
            var formData   = {
                command     : 'adminGetWalletAddressListing',
                pageNumber  : pageNumber,
                inputData   : searchData,
                usernameSearchType : $("input[name=usernameType]:checked").val()
            };
            if(!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function updateCallback(data, message) {
        showMessage('<?php echo $translations['A00616'][$language]; /* Successful updated status. */ ?>', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'walletAddressListing.php');
    }
</script>
</body>
</html>
