<?php
session_start();


  include_once("mobileDetect.php");
    $detect = new Mobile_Detect;


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
                   <!--  <div class="col-lg-3 col-md-3 visible-xs visible-sm">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapse">
                                            <?php echo $translations['A00280'][$language]; /* Menu */ ?>
                                        </a>
                                    </h4>
                                </div>

                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="m-b-rem1 menuActive active">
                                            <a>
                                                <?php echo $translations['A00281'][$language]; /* Edit Profile */ ?>
                                            </a>
                                        </div>
                                        <div class="m-b-rem1 menuActive">
                                            <a>
                                                <?php echo $translations['A00282'][$language]; /* Password Maintain */ ?>
                                            </a>
                                        </div>
                                        <div class="m-b-rem1 menuActive">
                                            <a>
                                                <?php echo $translations['A00283'][$language]; /* Referral Diagram */ ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <?php 
                            if( $detect->isMobile() ) {
                                include 'editMemberSideBarXs.php';
                            }else{
                                include 'editMemberSideBar.php';
                            }
                        ?>

                    <div class="col-lg-9 col-md-9">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <?php echo $translations['A00550'][$language]; /* Activity Log */ ?>
                                    </h4>
                                </div>

                                <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchActivityLog" role="form">
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    <?php echo $translations['A00137'][$language]; /* Date */ ?>
                                                </label>
                                                <input id="searchDate" type="text" class="form-control" dataName="searchDate" dataType="singleDate">
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00112'][$language]; /* Created at */ ?>
                                                </label>
                                                <div class="input-group">
                                                    <div>
                                                        <input id="timeFrom" type="text" class="form-control" dataName="searchTime" dataType="timeRange" dataParent="searchDate">
                                                    </div>
                                                    <span class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */ ?>
                                                    </span>
                                                    <div>
                                                        <input id="timeTo" type="text" class="form-control" dataName="searchTime" dataType="timeRange" dataParent="searchDate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="">
                                                    <?php echo $translations['A00554'][$language]; /* Activity Type */ ?>
                                                </label>
                                                <select id="activityType" class="form-control" dataName="activityType" dataType="text">
                                                    <option value="">
                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </form>
                                        <div class="col-xs-12">
                                            <button id="searchBtn" class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-body">
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="activityLogListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pageActivityLogList"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End row -->
            </div> <!-- container -->
        </div> <!-- content -->

        <?php include("footer.php"); ?>
    </div><!-- End content-page -->

    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div><!-- END wrapper -->

<script>var resizefunc = [];</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>

    // Initialize all the id in this page
    var divId    = 'activityLogListDiv';
    var tableId  = 'activityLogListTable';
    var pagerId  = 'pageActivityLogList';
    var btnArray = {};
    var thArray  = Array('<?php echo $translations['A00554'][$language]; /* Activity Type */ ?>',
                         '<?php echo $translations['A00145'][$language]; /* Description */ ?>',
                         '<?php echo $translations['A00137'][$language]; /* Date */ ?>',
                         '<?php echo $translations['A00147'][$language]; /* Done By */ ?>',
                         '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
                         '<?php echo $translations['A00560'][$language]; /* Member Username */ ?>'
                        );

    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var activityDate   = "";
    var memberId       = "<?php echo $_POST['id']; ?>";

    $(document).ready(function() {

        // if id empty return back admin.php
        if(!memberId) {
            var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'admin.php');
            return;
        }

        setTodayDatePicker();
        formData    = {
            command      : 'getActivityLogList',
            memberId     : memberId
        };
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchActivityLog').find('input').each(function() {
                $(this).val('');
            });
            $('#searchActivityLog').find('select').val('');
            setTodayDatePicker();
        });


        $('#activityLogsListing').parent().addClass('active');

        $('#backBtn').click(function() {
            $.redirect('member.php');
        });

        $('#editMemberDetails').click(function() {
            $.redirect('editMember.php', {id : "<?php echo $_POST['id']; ?>"});
        });
        $('#memberPasswordMaintain').click(function() {
            $.redirect('memberPasswordMaintain.php', {id : "<?php echo $_POST['id']; ?>"});
        });
        $('#sponsorTree').click(function() {
            $.redirect('treeSponsor.php', {id : "<?php echo $_POST['id']; ?>"});
        });
        $('#placementTree').click(function() {
            $.redirect('treePlacement.php', {id : "<?php echo $_POST['id']; ?>"});
        });
        $('#uplineListing').click(function() {
            $.redirect('sponsorUpline.php', {id : "<?php echo $_POST['id']; ?>"});
        });
        $('#rankMaintain').click(function() {
            $.redirect('rankMaintain.php', {id : "<?php echo $_POST['id']; ?>"});
        });
        $('#portfolioList').click(function() {
            $.redirect('memberPortfolioList.php', {id : "<?php echo $_POST['id']; ?>"});
        });
        $('#activityLogsListing').click(function() {
            $.redirect('activityLogsListing.php', {id : "<?php echo $_POST['id']; ?>"});
        })
        $('#changeSponsor').click(function() {
            $.redirect('changeSponsor.php', {id : "<?php echo $_POST['id']; ?>"});
        });
        $('#changePlacement').click(function() {
            $.redirect('changePlacement.php', {id : "<?php echo $_POST['id']; ?>"});
        });
        $('#memberCreditsTransaction').click(function() {
            $.redirect('memberCreditsTransaction.php', {id : "<?php echo $_POST['id']; ?>"});
        });
        $('#loginToMember').click(function(){
            var url = "scripts/reqAdmin.php";
            var formData  = {
                command : "getMemberLoginDetail",
                memberId : "<?php echo $_POST['id']; ?>"
            };
            var fCallback = loginToMember;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function loginToMember(data, message){

        var form = $("<form target='_blank' method='POST' style='display:none;'></form>").attr({
            action: data.url
        }).appendTo(document.body);

        $('<input type="hidden" />').attr({
            name: 'id',
            value: data.id
        }).appendTo(form);

        $('<input type="hidden" />').attr({
            name: 'username',
            value: data.username
        }).appendTo(form);

        form.submit();

        form.remove();
    }

    function loadDefaultListing(data, message) {
        var tableNo;
        buildTable(data.activityLogList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        if(typeof(data.activityTypeList) != 'undefined') {
            var selection = $('#searchActivityLog #activityType').val();
            // Set the Command dropdown in Search section
            var searchDropdown = data.activityTypeList;
            setSearchOption(searchDropdown, selection);
        }
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchActivityLog';
        var searchData = buildSearchDataByType(searchId);

        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command      : "getActivityLogList",
            inputData    : searchData,
            pageNumber   : pageNumber,
            memberId     : memberId
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

        $('#searchDate').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        var dateToday = $('#searchDate').val('');

        $('#timeFrom').timepicker({
            defaultTime : '',
            showSeconds: true
        });
        $('#timeTo').timepicker({
            defaultTime : '',
            showSeconds: true
        });

        return dateToTimestamp(today);
    }

    // Set the activity type dropdown in the search part
    function setSearchOption(data, searchVal) {
        $('#searchActivityLog #activityType').find('option:not(:first-child)').remove();
        $.each(data, function(key, val) {
            $('#searchActivityLog #activityType').append('<option value="' + val['activityType'] + '">' + val['activityType'] + '</option>');
        });
        if (searchVal != ' '){
            $('#searchActivityLog #activityType').val(searchVal);
        }
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