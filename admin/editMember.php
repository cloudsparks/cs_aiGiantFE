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
                                                    <!--<div class="m-b-rem1 col-lg-12">
                                                        <span>
                                                            MT4 Account No :
                                                        </span>
                                                        <b id="quantumAcc" class="m-l-rem1"></b>
                                                    </div>-->
                                                </div>

                                              <!--   <div class="col-lg-7 col-sm-7">
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
                                            <?php echo $translations['A00291'][$language]; /* Edit Member Details */ ?>
                                        </h4>
                                    </div>

                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <!-- Content -->
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="name">
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?> 
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input id="fullName" type="text" class="form-control">
                                                        <span id="fullNameError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="name">
                                                            Username
                                                        </label>
                                                        <input id="username" type="text" class="form-control">
                                                        <span id="usernameError" class="customError text-danger"></span>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="username">
                                                            <?php echo $translations['A00195'][$language]; /* Email Address */ ?>
                                                        </label>
                                                        <input id="email" type="text" class="form-control">
                                                        <span id="emailError" class="customError text-danger"></span>
                                                    </div>
                                                     <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="username">
                                                            National ID / Passport
                                                        </label>
                                                        <input id="passport" type="text" class="form-control">
                                                        <span id="passportError" class="customError text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            <?php echo $translations['A00171'][$language]; /* Phone */ ?>
                                                        </label>
                                                        <input id="phone" type="text" class="form-control">
                                                        <span id="phoneError" class="customError text-danger"></span>
                                                    </div>

                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            <?php echo $translations['A00153'][$language]; /* Country */ ?> 
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <select id="country" class="form-control">
                                                        </select>
                                                        <span id="countryError" class="customError text-danger"></span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            <?php echo $translations['A00296'][$language]; /* Address */ ?>
                                                        </label>
                                                        <textarea id="address" class="form-control" rows="4" cols="50"></textarea>
                                                        <span id="addressError" class="customError text-danger"></span>
                                                    </div>

                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            <?php echo $translations['A00318'][$language]; /* Status */ ?> 
                                                        </label>
                                                        <select id="status" class="form-control">
                                                            <option value="inactive" disabled hidden>
                                                                Inactive
                                                            </option>
                                                            <option value="disabled" disabled hidden>
                                                               Disabled
                                                            </option>
                                                            <option value="active">
                                                                Actived
                                                            </option>
                                                            <option value="suspended">
                                                                Suspended
                                                            </option>
                                                            <option value="terminated">
                                                                Terminated
                                                            </option>
                                                        </select>
                                                        <span id="statusError" class="customError text-danger"></span>
                                                    </div>
                                                </div>



                                                <!-- <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            <?php echo $translations['A00104'][$language]; /* Disabled */ ?> 
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label><br>
                                                        <div class="radio radio-info radio-inline">
                                                            <input type="radio" id="disabledNo" name="disabled" value="0"/>
                                                            <label for="disabledNo">
                                                                <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="disabledYes" name="disabled" value="1"/>
                                                            <label for="disabledYes">
                                                                <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                            </label>
                                                        </div><br>
                                                        <span id="disabledError" class="customError text-danger"></span>
                                                    </div>

                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">
                                                            <?php echo $translations['A01183'][$language]; /* terminated */ ?> 
                                                            <span class="text-danger">
                                                                *
                                                            </span>
                                                        </label><br>
                                                        <div class="radio radio-info radio-inline">
                                                            <input type="radio" id="terminatedNo" name="terminated" value="0"/>
                                                            <label for="terminatedNo">
                                                                <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-inline">
                                                            <input type="radio" id="terminatedYes" name="terminated" value="1"/>
                                                            <label for="terminatedYes">
                                                                <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                            </label>
                                                        </div><br>
                                                        <span id="terminatedError" class="customError text-danger"></span>
                                                    </div>
                                                </div> -->

                                                <div class="col-sm-12 m-t-rem1">
                                                    <div class="col-xs-12 col-sm-12">
                                                        <a id="updateBtn" type="button" class="btn btn-primary waves-effect w-md waves-light" onclick="">
                                                            <?php echo $translations['A00300'][$language]; /* Update */ ?>
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
        var url            = 'scripts/reqClient.php';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;

        $(document).ready(function() {
            var memberId = "<?php echo $_POST['id']; ?>";
            // if id empty return back member.php             
            if(!memberId) {
                var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
                showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'member.php');
                return;
            }
            
            var formData  = {
                command : "getMemberDetails",
                memberId : memberId
            };
            var fCallback = loadDefaultData;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#updateBtn').click(function() {
                $('.customError').text('');
                var fullName  = $('#fullName').val();
                var username  = $('#username').val();
                var email     = $('#email').val();
                var phone     = $('#phone').val();
                var address   = $('#address').val();
                var country   = $('#country').val();
                // var disabled  = $('input[name=disabled]:checked').val();
                // var suspended = $('input[name=suspended]:checked').val();
                // var freezed   = $('input[name=freezed]:checked').val();
                // var terminated = $('input[name=terminated]:checked').val();
                var passport = $('#passport').val();
                var status = $('#status').val();
                
                var formData = {
                                    command   : "editMemberDetails",
                                    memberId  : memberId,
                                    username  : username,
                                    fullName  : fullName,
                                    email     : email,
                                    phone     : phone,
                                    address   : address,
                                    country   : country,
                                    // disabled  : disabled,
                                    // terminated : terminated,
                                    passport : passport,
                                    status   : status
                                    // suspended : suspended,
                                    // freezed   : freezed
                                };
                var fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('input#passport').keypress(function( e ) {
                if(e.which === 32) 
                return false;
            });

            $('#editMemberDetails').parent().addClass('active');

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

        function loadDefaultData(data, message) {
            console.log(data);
            var countryList = data.countryList;
            $.each(countryList, function(key) {
                $('#country').append('<option value="'+countryList[key]['id']+'">'+countryList[key]['name']+'</option>');
            });

            var memberDetails = data.member;
            $('#fullName').val(memberDetails['name']);
            $('#email').val(memberDetails['email']);
            $('#phone').val(memberDetails['phone']);
            $('#address').val(memberDetails['address']);
            $('#country').val(memberDetails['country_id']);
            $('#passport').val(memberDetails['passport']);

            // if(memberDetails['disabled'] == 0)
            //     $("#disabledNo").prop('checked', true);
            // else
            //     $("#disabledYes").prop('checked', true);

            // // if(memberDetails['suspended'] == 0)
            // //     $("#suspendedNo").prop('checked', true);
            // // else
            // //     $("#suspendedYes").prop('checked', true);

            // // if(memberDetails['freezed'] == 0)
            // //     $("#freezedNo").prop('checked', true);
            // // else
            // //     $("#freezedYes").prop('checked', true);

            // if(memberDetails['terminated'] == 0)
            //     $("#terminatedNo").prop('checked', true);
            // else
            //     $("#terminatedYes").prop('checked', true);

             if(memberDetails['activated'] == 1){
              $('#status').val("active");
             }
             if(memberDetails['disabled'] == 1){
              $('#status').val("disabled");
             }
             if(memberDetails['suspended'] == 1){
              $('#status').val("suspended");
             }
             if(memberDetails['freezed'] == 1){
              $('#status').val("freezed");
             }
             if(memberDetails['terminated'] == 1){
              $('#status').val("terminated");
             }
                

            if(data.memberDetails) {
                $('#topName').text(data.memberDetails.name);
                $('#topMemberID').text(data.memberDetails.member_id);
                $('#topUsername').text(data.memberDetails.username);
                $('#topUnitTier').text(data.memberDetails.unit_tier);
                $('#topPairingBP').text(data.memberDetails.pairing_bonus_percentage+"%");
                $('#topSponsorBP').text(data.memberDetails.sponsor_bonus_percentage+"%");
                $('#quantumAcc').text(data.memberDetails.quantumAcc);

                $("#username").val(data.memberDetails.username);
            }
        }

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

        function submitCallback(data, message) {
            showMessage('<?php echo $translations['A00501'][$language]; /* Successful updated member details. */ ?>', 'success', '<?php echo $translations['A00291'][$language]; /* Edit Member Details */ ?>', 'edit', ['editMember.php', {id : "<?php echo $_POST['id']; ?>"}]);
        }
    </script>
</body>
</html>