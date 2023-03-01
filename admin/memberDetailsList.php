<?php
session_start();

// Get current page name
$thisPage = basename($_SERVER['PHP_SELF']);
$thisUrl = $_SERVER['REQUEST_URI'];
$pathInfo = pathinfo($thisUrl);

// Check the session for this page
$_SESSION['lastVisited'] = $thisPage;
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
                                            <?php echo $translations['A00051'][$language]; /* Search */?>
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
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="">
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="name" dataType="text">
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="">
                                                           <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                    </div>
                                                </div>
                                            </div> 

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="">
                                                            <?php echo $translations['A00103'][$language]; /*Email*/?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="email" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00318'][$language]; /* Status */?>
                                                        </label>
                                                        <select class="form-control" dataName="disabled" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */?>
                                                            </option>
                                                            <option value="1">
                                                                <?php echo $translations['A00104'][$language]; /* Disabled */?>
                                                            </option>
                                                            <option value="0">
                                                                <?php echo $translations['A00372'][$language]; /* Active */?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                        </label>
                                                        <select id="countryName" class="form-control" dataName="countryName" dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                        <div class="col-xs-12">
                                            <button id="searchBtn" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */?>
                                            </button>
                                            <button id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */?>
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
                      <!--   <div class="card-box p-b-0"> -->
                            <form>
                                <div id="basicwizard" class="pull-in" style="display:none">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="memberListDiv" class="table-responsive"></div>
                                        <span id="paginateText"></span>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerMemberList"></ul>
                                        </div>
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
    var divId    = 'memberListDiv';
    var tableId  = 'memberListTable';
    var pagerId  = 'pagerMemberList';
    var btnArray = Array('edit');
    var thArray  = Array (
        '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
        '<?php echo $translations['A00102'][$language]; /* Username */?>',
        '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
        '<?php echo $translations['A00154'][$language]; /* Referral Username */ ?>',
        '<?php echo $translations['A00153'][$language]; /* Country */ ?>',
        '<?php echo $translations['A00195'][$language]; /* Email Address */?>',
        '<?php echo $translations['A00318'][$language]; /* Status */?>'
    );

    // Initialize the arguments for ajaxSend function
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var creditType     = "<?php echo $_GET['type']?>";
    var creditName     = "<?php echo $_SESSION['access'][$pathInfo['basename']]; ?>";
    // alert(creditName);
    $(document).ready(function() {

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });
        
        // if id or creditType empty will be return back memberDetailsList.php
        if(!creditType) {
            var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */?>';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'memberDetailsList.php?type=tierValue');
            return;
        }

         $('.page-title').empty().append(creditName + ' Coin Wallet');
         // $('.page-title').css('text-transform', 'capitalize');

        // First load of this page
        url       = 'scripts/reqAdmin.php';
        // formData  = {
        //     command : "getMemberAccList",
        //     creditType : creditType
        // };
        // fCallback = loadDefaultListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function() {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
            });
        });

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        //  $('#searchMember').keypress(function(e){
        //     if(e.which == 13){//Enter key pressed
        //         $('#searchMemberBtn').click();//Trigger enter button click event
        //     }
        // });
    });

    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard').show();
        /*
            clientID: 2142460
            country: "Angola"
            disabled: "Active"
            email: "prott@qq.com"
            mainLeaderUsername: "-"
            member_id: "98590746"
            name: "protest04"
            sponsorUsername: "protest01"
            username: "protest04"
        */

        loadCountryDropdown(data.countryList);

        if(data.memberList){
            var newList = [];
            $.each(data.memberList, function(k,v){
                var hiddenInput = `${v['member_id']} <input type="hidden" class="storeClientID" value="${v['clientID']}">`;

                var rebuildData ={
                    member_id : hiddenInput,
                    username : v['username'],
                    name : v['name'],
                    sponsorUsername : v['sponsorUsername'],
                    country : v['country'],
                    email : v['email'],
                    disabled : v['disabled']
                };
                newList.push(rebuildData);
            });

            var tableNo;
            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#'+tableId).find('tbody tr').each(function(){
               $(this).find("td:eq(7)").css("text-align", "center");
           });

            $('thead tr').each(function(){
                $(':eq(7)',this).remove().insertBefore($(':eq(0)',this));
            });

            $('tbody tr').each(function(){
                $(':eq(8)',this).remove().insertBefore($(':eq(0)',this));

            });

           

        }

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

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'edit') {
            var editId     = tableRow.find('.storeClientID').val();
            var username   = tableRow.find('td').eq(2).text();
            var name       = tableRow.find('td').eq(3).text();
            //var editUrl = 'edit.php?id='+editId;
            //window.location = editUrl;
            $.redirect('memberTransactionList.php?type=' + creditType, {
                                                                            id       : editId,
                                                                            username : username,
                                                                            fullName : name,
                                                                            creditName : creditName
            });
        }
    }

    function pagingCallBack(pageNumber, fCallback) {
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData   = {
            command    : "getMemberAccList",
            creditType : creditType,
            inputData  : searchData,
            pageNumber : pageNumber,
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
</body>
</html>