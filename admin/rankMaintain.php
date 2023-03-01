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
                                            <div class="col-lg-10 col-sm-10">
                                                <!-- <div class="m-b-rem1 col-lg-12">
                                                    <span>
                                                        <?php echo $translations['A00117'][$language]; /* Full Name */ ?> :
                                                    </span>
                                                    <b id="topName" class="m-l-rem1"></b>
                                                </div> -->
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
                                                <div class="m-b-rem1 col-lg-12">
                                                    <span>
                                                        <?php echo $translations['A01171'][$language]; /* Last update */ ?> :
                                                    </span>
                                                    <b id="lastUpdated" class="m-l-rem1"></b>
                                                </div>
                                                <div id="displayRank"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <?php echo $translations['A00541'][$language]; /* Rank Maintain */ ?>
                                    </h4>
                                </div>

                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">
                                            <div id="" style="padding: 0" class="col-xs-12 col-sm-12">
                                                <label>Rank</label>
                                                <select id="rankMaintainSelect" class="form-control" onchange="selectRankOnChange()"></select>
                                            </div>
                                            <div style="padding: 0" class="col-xs-12 col-sm-12 m-t-rem1">
                                                <label for="rank_id">Percentage</label>
                                                <select id="rank_id" class="form-control"></select>
                                                <span id="rankError" class="errorSpan text-danger"></span>
                                                <!-- <input id="rankPercentage" class="form-control" value="0" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1').replace(/(\.[\d]{1})./g, '$1')" /> -->
                                            </div>
                                            <a id="submitBtn" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20 m-t-rem3">
                                                <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                                            </a>
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
    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var percentageArr = [];
    var rankSettingArr = [];
    var defaultRankSetting;

    $(document).ready(function() {
        var clientId = "<?php echo $_POST['id']; ?>";
        // if id empty return back member.php 
        if(!clientId) {
            var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'member.php');
            return;
        }

        var formData = {
            command  : "getRankMaintain",
            clientId : clientId
        };
        var fCallback = loadDefaultData;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function() {

            var bonusName = $("#rankMaintainSelect").val();
            var percentage = $("#rankPercentage").val();
            var rank_id     = $("#rank_id").val();

            var formData  = {
                command : "updateRankMaintain",
                clientId : "<?php echo $_POST['id']; ?>",
                bonusName : bonusName,
                rank_id   : rank_id
            };
            var fCallback = submitCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#rankMaintain').parent().addClass('active');

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

    function loadDefaultData(data, message) {

        console.log(data);

        rankSettingArr = data.rankSettingAry;
        defaultRankSetting = data.rankIDArr;

        if(data.clientBonusPercentage) {
            percentageArr = data.clientBonusPercentage;

            var buildAdminPercentage = `<div class="col-lg-12 m-t-rem1"><b>Admin</b></div>`;
            var buildSystemPercentage = `<div class="col-lg-12 m-t-rem1"><b>System</b></div>`;
            var selectHtml = "";
            $.each(data.clientBonusPercentage, function(key, val){
                selectHtml += `<option value="${key}">${val['display']}</option>`;

                var percentageKey = key+"Percentage";
                

                if(key == "maxCap"){
                    buildAdminPercentage+=`
                        <div class="col-lg-12">
                            <span>
                                ${val['display']} :
                            </span>
                            <b class="m-l-rem1">${data['memberDetails']['Admin']['maxCap']}</b>
                        </div>
                    `;

                    buildSystemPercentage+=`
                        <div class="col-lg-12">
                            <span>
                                ${val['display']} :
                            </span>
                            <b class="m-l-rem1">${data['memberDetails']['System']['maxCap']}</b>
                        </div>
                    `;
                }else{
                    buildAdminPercentage+=`
                        <div class="col-lg-12">
                            <span>
                                ${val['display']} :
                            </span>
                            <b class="m-l-rem1">${data['memberDetails']['Admin'][percentageKey]}</b>
                        </div>
                    `;

                    buildSystemPercentage+=`
                        <div class="col-lg-12">
                            <span>
                                ${val['display']} :
                            </span>
                            <b class="m-l-rem1">${data['memberDetails']['System'][percentageKey]}</b>
                        </div>
                    `;
                }

                
            });

            $("#rankMaintainSelect").html(selectHtml);
            selectRankOnChange();

            $("#displayRank").html(`${buildAdminPercentage}${buildSystemPercentage}`);
            // $("#rankPercentage").val(percentageArr[$("#rankMaintainSelect").val()]['percentage']);
        }

        if(data.memberDetails) {
            $('#topName').text(data.memberDetails.name);
            $('#topMemberID').text(data.memberDetails.member_id);
            $('#topUsername').text(data.memberDetails.username);
            $("#lastUpdated").text(data.memberDetails.updated_at?data.memberDetails.updated_at:'-');
        }
    }

    function selectRankOnChange() {
        if($("#rankMaintainSelect").val() != 'maxCap'){
            var currentBonus = $("#rankMaintainSelect").val() + 'Percentage';
        }else{
            var currentBonus = $("#rankMaintainSelect").val();
        }
        var rankHtml = "";

        if(rankSettingArr && rankSettingArr[currentBonus]){

            $.each(rankSettingArr[currentBonus], function(key, val){

                rankHtml += `<option value="${val['rank_id']}" ${defaultRankSetting[currentBonus] == val['rank_id']?"selected":""}>${val['rank_display']?val['rank_display']:val['rank_name']}</option>`;
            });

            $("#rank_id").html(rankHtml);
        }
        // $("#rankPercentage").val(percentageArr[$("#rankMaintainSelect").val()]['percentage']);
    }

    function submitCallback(data, message) {

        // showMessage(message, 'success', 'Updated', 'edit', '');

        $('#canvasMessage').modal('toggle');
        $('#canvasMessage').find('h4').html('<i class="fa fa-3x fa-edit"></i><span>Updated</span>');
        $('#canvasAlertMessage').addClass('alert-success');
        $('#canvasAlertMessage').html('<span>'+message+'</span>');
        $('#canvasMessage .modal-footer').find('button').not('#canvasCloseBtn').remove();

        $('#canvasMessage').on('hidden.bs.modal', function() {
            $('.modal-backdrop').remove();
            $('#canvasMessage .modal-footer').find('button').not('#canvasCloseBtn').remove();
            $.redirect("rankMaintain.php", {id: "<?php echo $_POST['id']; ?>"});   
        });


    }
</script>
</body>
</html>
