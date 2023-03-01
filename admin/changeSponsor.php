<?php 
    session_start();

     include_once("mobileDetect.php");
    $detect = new Mobile_Detect;


    
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
                        <!-- <div class="col-lg-3 col-md-3 visible-xs visible-sm">
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
                        </div>
 -->
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
                                            <?php echo $translations['A00284'][$language]; /* Member Details */ ?>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-5 col-sm-5">
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span>
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?> :
                                                        </span>
                                                        <b id="topName" class="m-l-rem1"></b>
                                                    </div>
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span>
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?> :
                                                        </span>
                                                        <b id="topUsername" class="m-l-rem1"></b>
                                                    </div>
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span>
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?> :
                                                        </span>
                                                        <b id="topMemberID" class="m-l-rem1"></b>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-lg-7 col-sm-7">
                                                    <div class="m-b-rem1 p-t-rem2 col-lg-4 col-sm-4 text-center mobileBorderLess borderMobile" style="border-left: 1px solid #eeeeee;">
                                                        <span>
                                                            <?php echo $translations['A00288'][$language]; /* Unit Tier */ ?>
                                                        </span>
                                                        <h3 style="color: #059607;"><b id="topUnitTier"></b></h3>
                                                    </div>

                                                    <div class="m-b-rem1 col-lg-4 col-sm-4 text-center mobileBorderLess borderMobile" style="border-left: 1px solid #eeeeee;">
                                                        <span style="vertical-align: middle;">
                                                            <?php echo $translations['A00289'][$language]; /* Sponsor Bonus Percentage */ ?>
                                                        </span>
                                                        <h3 style="color: #059607;"><b id="topSponsorBP"></b></h3>
                                                    </div>

                                                    <div class="m-b-rem1 col-lg-4 col-sm-4 text-center mobileBorderLess" style="border-left: 1px solid #eeeeee;">
                                                        <span style="vertical-align: middle;">
                                                            <?php echo $translations['A00290'][$language]; /* Pairing Bonus Percentage */ ?>
                                                        </span>
                                                        <h3 style="color: #059607;"><b id="topPairingBP"></b></h3>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <?php echo $translations['A00572'][$language]; /* Change Sponsor */ ?>
                                        </h4>
                                    </div>

                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <!-- Content -->
                                                <div class="col-sm-12 m-t-rem1 m-b-rem1">
                                                    <div class="col-sm-12" style="background-color: #f2f2f2; padding: 15px; margin: 15px 0px">
                                                        <div class="col-sm-6 form-group p-t-rem1">
                                                            <div class="m-b-rem1">
                                                                <span>
                                                                    <?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?> :
                                                                </span>
                                                                <b id="sponsorUsername" class="m-l-rem1"></b>
                                                            </div>
                                                            <div class="m-b-rem1">
                                                                <span>
                                                                    <?php echo $translations['A00574'][$language]; /* Sponsor ID */ ?> :
                                                                </span>
                                                                <b id="sponsorID" class="m-l-rem1"></b>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 form-group p-t-rem1">
                                                            <div class="m-b-rem1">
                                                                <span>
                                                                    <?php echo $translations['A00575'][$language]; /* Client Username */ ?> :
                                                                </span>
                                                                <b id="clientUsername" class="m-l-rem1"></b>
                                                            </div>
                                                            <div class="m-b-rem1">
                                                                <span>
                                                                    <?php echo $translations['A00519'][$language]; /* Client ID */ ?> :
                                                                </span>
                                                                <b id="clientID" class="m-l-rem1"></b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 m-t-rem1">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00577'][$language]; /* New Sponsor Username */ ?>
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="newSponsor" type="text" class="form-control" required="true"/>
                                                        <span id="uplineUsernameError" class="errorSpan text-danger"></span>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-12">
                                                        <a id="submitBtn" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20 m-t-rem3">
                                                            <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
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
        var url            = 'scripts/reqTree.php';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;

        $(document).ready(function() {
            var id = "<?php echo $_POST['id']; ?>";
            // if id empty return back member.php 
            if(!id) {
                var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
                showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'member.php');
                return;
            }

            var formData  = {
                command  : "getSponsor",
                clientID : id
            };
            var fCallback = loadDefaultData;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#submitBtn').click(function() {
                $('.errorSpan').empty();
                var formData  = {
                    command : "changeSponsor",
                    clientID : "<?php echo $_POST['id']; ?>",
                    uplineUsername : $('#newSponsor').val()
                };
                var fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#changeSponsor').parent().addClass('active');

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
            });
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

        function loadDefaultData(data, message) {
            $('#sponsorID').text(data.upline_member_id);
            $('#sponsorUsername').text(data.upline_username);
            // $('#sponsorName').text("Sponsor Name : "+data.upline_name);

            $('#clientID').text(data.member_id);
            $('#clientUsername').text(data.client_username);
            // $('#clientName').text("Client Name : "+data.client_name);

            if(data.memberDetails) {
                $('#topName').text(data.memberDetails.name);
                $('#topMemberID').text(data.memberDetails.member_id);
                $('#topUsername').text(data.memberDetails.username);
                $('#topUnitTier').text(data.memberDetails.unit_tier);
                $('#topPairingBP').text(data.memberDetails.pairing_bonus_percentage+"%");
                $('#topSponsorBP').text(data.memberDetails.sponsor_bonus_percentage+"%");
            }
        }

        function submitCallback(data, message) {
            showMessage('<?php echo $translations['A00579'][$language]; /* Successful changed sponsor. */ ?>', 'success', '<?php echo $translations['A00572'][$language]; /* Change Sponsor */ ?>', 'edit', ['changeSponsor.php', {id : "<?php echo $_POST['id']; ?>"}]);
        }
    </script>
</body>
</html>