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
                        <div class="col-lg-3 col-md-3 visible-xs visible-sm">
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

                        <?php include "editMemberSideBar.php"; ?>

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

                                               <!--  <div class="col-lg-7 col-sm-7">
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
                                            <?php echo $translations['A00528'][$language]; /* Placement Tree */ ?>
                                        </h4>
                                    </div>

                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <!-- Content -->
                                                <div class="form-group">
                                                    <div id="view" class="m-b-20">
                                                        <div class="radio radio-info radio-inline">
                                                            <input id="viewGroup1" type="radio" value="1" name="viewGroup" checked="checked"/>
                                                            <label for="viewGroup1">
                                                                <?php echo $translations['A00513'][$language]; /* Listing View */ ?>
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-success radio-inline">
                                                            <input id="viewGroup2" type="radio" value="2" name="viewGroup"/>
                                                            <label for="viewGroup2">
                                                                <?php echo $translations['A00514'][$language]; /* Horizontal View */ ?>
                                                            </label>
                                                        </div>
                                                        <div class="radio radio-danger radio-inline">
                                                            <input id="viewGroup3" type="radio" value="3" name="viewGroup"/>
                                                            <label for="viewGroup3">
                                                                <?php echo $translations['A00515'][$language]; /* Vertical View */ ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <hr/>
                                                </div>
                                                <ul class="breadcrumbTree">
                                                </ul>
                                                <ul id="memberDiv" class="list-group">
                                                    <!-- sponsor -->
                                                </ul>
                                                <div id="treeListingDiv" class="list-group">
                                                    <!-- tree listing -->
                                                </div>
                                                <div id="treeHorizontalViewDiv" class="">
                                                    <!-- tree horizontal view -->
                                                </div>
                                                <div id="treeVerticalViewDiv" class="col-md-12">
                                                    <table class="table m-0 table-centered">
                                                    <header role="banner">
                                                      <!-- Start First Row -->
                                                        <nav class="nav" role="navigation">
                                                            <ul id="navListTreeView">

                                                                <!-- Start Group 1 -->
                                                                <input id="group-1" type="checkbox" hidden />
                                                                <label class="targetVertical" id="mainListVertical" for="group-1">
                                                                </label>

                                                                <ul class="group-list">
                                                                    <label>
                                                                        <ul id="verticalDownlines" class="noList">
                                                                        </ul>
                                                                    </label>
                                                                </ul>
                                                            </ul>
                                                        </nav>
                                                    </header>
                                                    </table>
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
        var clientID       = "<?php echo $_POST['id']; ?>";
        var dataKeeper, messageKeeper;

        $(document).ready(function() {
            // if id empty return back member.php 
            if(!clientID) {
                var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
                showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'member.php');
                return;
            }

            var formData   = {
                command    : "getTreePlacement",
                clientID   : clientID,
                depthLevel : 1
            };
            var fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $("input[name=viewGroup]").change(function() {
                radioChange($('input[name=viewGroup]:checked').val());
            });

            $('#placementTree').parent().addClass('active');

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

        function loadDefaultListing(data, message) {
            dataKeeper = data;
            messageKeeper = message;

            console.log(data);

            $('.breadcrumbTree').append('<li><a id="'+data.sponsor[0].client_id+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 1)">'+data.sponsor[0].username+'</a></li>');
            $('#memberDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00517'][$language]; /* Member */ ?></h4>');
            $('#memberDiv').append('<li class="list-group-item"><table width="100%"><tr><td width="35%">'+data.sponsor[0].username+'</td><td width="25%">'+data.sponsor[0].created_at+'</td><td width="10%"></td></tr></table></li>');
            $('#treeListingDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00518'][$language]; /* Downlines */ ?></h4>');

            // <td width="10%">image</td>
            // <td width="20%">package</td>

            $.each(data.downlines, function(key, val) {
                $('#treeListingDiv').append('<button type="button" id="'+val['client_id']+'" class="list-group-item list-group-item-action" onclick="treeListClick(this)"><table width="100%"><tr><td width="35%">'+val['username']+'</td><td width="25%">'+val['created_at']+'</td><td width="10%">'+val['placement']+'</td></tr></table></button>');
            });

            // <td width="10%">image</td>
            // <td width="20%">package</td>

            if(data.memberDetails) {
                $('#topName').text(data.memberDetails.name);
                $('#topMemberID').text(data.memberDetails.member_id);
                $('#topUsername').text(data.memberDetails.username);
                $('#topUnitTier').text(data.memberDetails.unit_tier);
                $('#topPairingBP').text(data.memberDetails.pairing_bonus_percentage+"%");
                $('#topSponsorBP').text(data.memberDetails.sponsor_bonus_percentage+"%");
            }
        }

        function treeListClick(element) {
            var formData  = {
                command : "getTreePlacement",
                clientID : element.id,
                depthLevel : 1
            };
            var fCallback = loadListingView;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function breadcrumbClick(element, view) {
            var breadcrumbCount = $('.breadcrumbTree li').length - 1;
            for(var i = breadcrumbCount; i >= element.name; i--) {
                $('.breadcrumbTree').find('li').eq(i).remove();
            }

            if(view == 1) {
                var formData  = {
                    command : "getTreePlacement",
                    clientID : element.id,
                    depthLevel : 1
                };
                var fCallback = loadListingView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
            else if(view == 2) {
                var formData  = {
                    command : "getTreePlacement",
                    clientID : element.id
                };
                var fCallback = loadHorizontalView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        }

        function loadListingView(data, message) {

            $('#memberDiv').empty();
            $('#treeListingDiv').empty();
            $('.breadcrumbTree').append('<li><a id="'+data.sponsor[0].client_id+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 1)">'+data.sponsor[0].username+'</a></li>');
            $('#memberDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00517'][$language]; /* Member */ ?></h4>');
            $('#memberDiv').append('<li class="list-group-item"><table width="100%"><tr><td width="35%">'+data.sponsor[0].username+'</td><td width="25%">'+data.sponsor[0].created_at+'</td><td width="10%"></td></tr></table></li>');
            $('#treeListingDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00518'][$language]; /* Downlines */ ?></h4>');

            // <td width="10%">image</td>
            // <td width="20%">package</td>

            $.each(data.downlines, function(key, val) {
                $('#treeListingDiv').append('<button type="button" id="'+val['client_id']+'" class="list-group-item list-group-item-action" onclick="treeListClick(this)"><table width="100%"><tr><td width="35%">'+val['username']+'</td><td width="25%">'+val['created_at']+'</td><td width="10%">'+val['placement']+'</td></tr></table></button>');
            });

            // <td width="10%">image</td>
            // <td width="20%">package</td>
        }

        function treeBranchClick(element) {
            var formData  = {
                command : "getTreePlacement",
                clientID : element.id,
                realClientID : "<?php echo $_POST['id']; ?>"
            };
            var fCallback = loadHorizontalView;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function loadHorizontalView(data, message) {
            $('#treeHorizontalViewDiv').empty();

            if(data.breadcrumb) {
                $('.breadcrumbTree').empty();
                $.each(data.breadcrumb, function(key, val) {
                    $('.breadcrumbTree').append('<li><a id="'+val['id']+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 2)">'+val['username']+'</a></li>');
                });
            }
            else {
                $('.breadcrumbTree').append('<li><a id="'+data.sponsor[0].client_id+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 2)">'+data.sponsor[0].username+'</a></li>');
            }

            var placementChildAmount = 2;
            var treeDiv = 'treeHorizontalViewDiv';
            buildPlacementTree(data.sponsor[0], data.downlines, treeDiv, placementChildAmount);
        }

        function loadVerticalView(data, message) {
            var content = "";

            if(data.target){    
                $('#alertMsg').removeClass('alert-success').html('').hide();

                if(!data.targetID){
                    var date = data.target["attr"].createdAt;
                    content += ' <strong> '+data.target["attr"].username+'</strong> <span class="text-muted m-l-10">&nbsp'+date+'</span>';
                    $("#mainListVertical").empty().append(content);
                }
                if(data.downline) {
                    var downlineCount = data.downline.length;
                } else {
                    var downlineCount = 0;
                }
                var content = "";
                for (var i = 0; i < downlineCount; i++) {
                    var date = data.downline[i]["attr"].createdAt;
                    var position = data.downline[i]["attr"].position;
                    var targetID = data.downline[i]["attr"].id;
                    var targetUsername = data.downline[i]["attr"].username;
                    // var targetName = data.downline[i]["attr"].name;
                    var disabled = data.downline[i]["attr"].disabled;
                    var suspended = data.downline[i]["attr"].suspended;
                    // var freezed = data.downline[i]["attr"].freezed;
                    var popOverContent = '<?php echo $translations['A00104'][$language]; /* Disabled */ ?> : ' + disabled + '</br><?php echo $translations['A00156'][$language]; /* Suspended */ ?> : ' + suspended + '</br>';
                    
                    content += '<li class="p-b-3">';
                    if(data.downline[i]["attr"].downlineCount > 0)
                        content += '<i id="icon-' + targetID + '" class="m-r-10 fa fa-arrow-right" onclick="getSponsorTree('+ targetID +' , ' + "<?php echo $_POST['id']; ?>" + ');" targetID="' + targetID + '"></i>';
                    
                    // Documentation on using bootstrap popover
                    // https://v4-alpha.getbootstrap.com/components/popovers/
                    // data-trigger="focus" and tabindex="0" is for dismissable popover on next click
                    // Means the popover will close when click any other stuff on that page.
                    content += '<a id="popover-' + targetID + '" onclick="openPopover(' + targetID + ')" title="<?php echo $translations['A00318'][$language]; /* Status */ ?>" data-toggle="popover" tabindex="0" data-trigger="focus" data-placement="auto bottom" data-container="body" data-html="true" data-content="' + popOverContent + '" class="greyText"><strong> ' + targetUsername + '</strong></a> <span class="text-muted m-l-10">&nbsp'+date+'</span><span class="text-muted m-l-10">&nbsp('+position+')</span>';
                    content += '</li>';

                    content += '<ul id="' + targetID + '" class="noList">';
                    content += '</ul>';
                };
                    if(!data.targetID) var listId = "verticalDownlines";
                    else var listId = data.targetID;
                    $("#" + listId).empty().append(content);

            }else
                $('#alertMsg').addClass('alert-success').html('<span>'+message+'</span>').show();
        }

        function getSponsorTree(targetId, clientId, targetUsername){
            bypassLoading = 1;
            if($("#" + targetId).find('ul').length) {
                $("#icon-" + targetId).removeClass('rotate90');
                $("#" + targetId).empty();
            }else{
                $("#icon-" + targetId).addClass('rotate90');
                var formData = {
                        command : 'getPlacementTreeVerticalView',
                        clientId : clientId,
                        targetId : targetId,
                        targetUsername : targetUsername,
                        viewType : "vertical"
                    };
                var fCallback = loadVerticalView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading);
            }
        }

        function openPopover(targetId) {
            $('#popover-' + targetId).popover('toggle');
        }

        function radioChange(val) {
            $('.breadcrumbTree').empty();
            $('#memberDiv').empty();
            $('#treeListingDiv').empty();
            $('#treeHorizontalViewDiv').empty();
            $('#verticalDownlines').empty();
            $('#mainListVertical').empty();
            $(".breadcrumbTree, #memberDiv, #treeListingDiv, #treeHorizontalViewDiv, #treeVerticalViewDiv").hide();

            if(val == 1) {
                $('.breadcrumbTree, #memberDiv, #treeListingDiv').show();
                $('.breadcrumbTree').append('<li><a id="'+dataKeeper.sponsor[0].client_id+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 1)">'+dataKeeper.sponsor[0].username+'</a></li>');
                $('#memberDiv').append('<h4 style="padding: 0px 15px"><h4 style="padding: 0px 15px"><?php echo $translations['A00517'][$language]; /* Member */ ?></h4>');
                $('#memberDiv').append('<li class="list-group-item"><table width="100%"><tr><td width="35%">'+dataKeeper.sponsor[0].username+'</td><td width="25%">'+dataKeeper.sponsor[0].created_at+'</td><td width="10%"></td></tr></table></li>');
                $('#treeListingDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00518'][$language]; /* Downlines */ ?></h4>');
                // <td width="10%">image</td>
                // <td width="20%">package</td>
                $.each(dataKeeper.downlines, function(key, val) {
                    $('#treeListingDiv').append('<button type="button" id="'+val['client_id']+'" class="list-group-item list-group-item-action" onclick="treeListClick(this)"><table width="100%"><tr><td width="35%">'+val['username']+'</td><td width="25%">'+val['created_at']+'</td><td width="10%">'+val['placement']+'</td></tr></table></button>');
                });
                // <td width="10%">image</td>
                // <td width="20%">package</td>
            }
            else if(val == 2) {
                $('.breadcrumbTree, #treeHorizontalViewDiv').show();
                var formData  = {
                    command : "getTreePlacement",
                    clientID : "<?php echo $_POST['id']; ?>"
                };
                var fCallback = loadHorizontalView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
            else if(val == 3) {
                $('#treeVerticalViewDiv').show();
                var formData = {
                    command : 'getPlacementTreeVerticalView',
                    clientId : "<?php echo $_POST['id']; ?>",
                    viewType : 'vertical',
                };
                var fCallback = loadVerticalView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            }
        }
    </script>
    <style>
        ul.breadcrumbTree {
            padding: 0px 16px;
            list-style: none;
        }
        ul.breadcrumbTree li {
            display: inline;
            font-size: 15px;
        }
        ul.breadcrumbTree li+li:before {
            padding: 8px;
            color: black;
            content: "/\00a0";
        }
        ul.breadcrumbTree li a {
            color: #0275d8;
            text-decoration: none;
        }
        ul.breadcrumbTree li a:hover {
            color: #01447e;
            text-decoration: underline;
        }
    </style>
</body>
</html>