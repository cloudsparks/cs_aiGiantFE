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
                                            <?php echo $translations['A00283'][$language]; /* Referral Diagram */ ?>
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
                                                        <!-- <div class="radio radio-warning radio-inline">
                                                            <input id="viewGroup4" type="radio" value="4" name="viewGroup"/>
                                                            <label for="viewGroup4">
                                                                <?php echo $translations['A00516'][$language]; /* Text View */ ?>
                                                            </label>
                                                        </div> -->
                                                    </div>
                                                    <hr/>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                            <input id="searchDownlines" type="text" class="form-control">
                                                            </div>
                                                            <div class="col-md-4">
                                                             <button id="searchDownlinesBtn" type="button" onclick="search()" class="btn btn-primary waves-effect waves-light">Search</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </div>
                                             <div class="form-group col-md-12" style="margin-top: 20px">
                                                <ul class="breadcrumbTree">
                                                </ul>
                                                  <ul class="breadcrumbTree2">
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
                                                <ul id="treeTextViewDiv" class="list-group">
                                                    <!-- tree text view -->
                                                </ul>
                                                <div id="treeVerticalViewDiv" class="col-md-12">
                                                    <table class="table m-0 table-centered">
                                                    <header role="banner">
                                                      <!-- Start First Row -->
                                                        <nav class="nav" role="navigation" style="overflow: auto;">
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
        var dataKeeper, messageKeeper;

        $(document).ready(function() {
            var clientID = "<?php echo $_POST['id']; ?>";
            // if id empty return back member.php 
            if(!clientID) {
                var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
                showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'member.php');
                return;
            }
            
            var formData  = {
                command : "getTreeSponsor",
                clientID : clientID
            };
            var fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $("input[name=viewGroup]").change(function() {
                radioChange($('input[name=viewGroup]:checked').val());
            });

            // $('button#targetSearch').click(function() {
            //     var targetUsername = $('#searchInput').val();
            //     getSponsorTree("", editId, targetUsername);
            // });

            $('#backBtn').click(function() {
                $.redirect('member.php');
            });

            $('#sponsorTree').parent().addClass('active');

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
        
        function loadDefaultListing(data, message) {
            console.log(data);
            dataKeeper = data;
            messageKeeper = message;

            $('.breadcrumbTree').append('<li><a id="'+data.sponsor.id+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 1)">'+data.sponsor.username+'</a></li>');
            $('#memberDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00517'][$language]; /* Member */ ?></h4>');
            $('#memberDiv').append('<li class="list-group-item"><table width="100%"><tr><td width="40%">'+data.sponsor.username+'</td><td width="25%">'+data.sponsor.created_at+'</td></tr></table></li>');
            $('#treeListingDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00518'][$language]; /* Downlines */ ?></h4>');
            // <td width="10%">image</td>
            // <td width="25%">package</td>
            $.each(data.downlinesLevel, function(key, val) {
                $('#treeListingDiv').append('<button type="button" id="'+val['client_id']+'" class="list-group-item list-group-item-action" onclick="treeListClick(this)"><table width="100%"><tr><td width="40%">'+val['username']+'</td><td width="25%">'+val['created_at']+'</td></tr></table></button>');
            });
            // <td width="10%">image</td>
            // <td width="25%">package</td>

            if(data.sponsor) {
                $('#topName').text(data.sponsor.name);
                $('#topMemberID').text(data.sponsor.member_id);
                $('#topUsername').text(data.sponsor.username);
                $('#topUnitTier').text(data.sponsor.unit_tier);
                $('#topPairingBP').text(data.sponsor.pairing_bonus_percentage+"%");
                $('#topSponsorBP').text(data.sponsor.sponsor_bonus_percentage+"%");
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

        function treeListClick(element) {
            var formData  = {
                command : "getTreeSponsor",
                clientID : element.id
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
                    command : "getTreeSponsor",
                    clientID : element.id
                };
                var fCallback = loadListingView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                // var formData  = {
                //     command : "adminSearchDownline",
                //     clientID : element.id
                // };
                // var fCallback = getSearchDownline;
                // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
            else if(view == 2) {
                var formData  = {
                    command : "getTreeSponsor",
                    clientID : element.id
                };
                var fCallback = loadHorizontalView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        }

        function loadListingView(data, message) {
            console.log(data);

            if(data.sponsor) {
                $('#memberDiv').empty();
                $('#treeListingDiv').empty();
                $('.breadcrumbTree2').empty();
                $('.breadcrumbTree').append('<li><a id="'+data.sponsor.id+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 1)">'+data.sponsor.username+'</a></li>');
                $('#memberDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00517'][$language]; /* Member */ ?></h4>');
                $('#memberDiv').append('<li class="list-group-item"><table width="100%"><tr><td width="40%">'+data.sponsor.username+'</td><td width="25%">'+data.sponsor.created_at+'</td></tr></table></li>');
                $('#treeListingDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00518'][$language]; /* Downlines */ ?></h4>');
            }
            
            // <td width="10%">image</td>
            // <td width="25%">package</td>
            $.each(data.downlinesLevel, function(key, val) {
                $('#treeListingDiv').append('<button type="button" id="'+val['client_id']+'" class="list-group-item list-group-item-action" onclick="treeListClick(this)"><table width="100%"><tr><td width="40%">'+val['username']+'</td><td width="25%">'+val['created_at']+'</td></tr></table></button>');
            });
            // <td width="10%">image</td>
            // <td width="25%">package</td>
        }

         function loadSearchListingView(data, message) {
            console.log(data);

            if(data.sponsor) {
                $('#memberDiv').empty();
                $('#treeListingDiv').empty();
                $('.breadcrumbTree').empty();
                // $('.breadcrumbTree').append('<li><a id="'+data.sponsor.id+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 1)">'+data.sponsor.username+'</a></li>');
                $('#memberDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00517'][$language]; /* Member */ ?></h4>');
                $('#memberDiv').append('<li class="list-group-item"><table width="100%"><tr><td width="40%">'+data.sponsor.username+'</td><td width="25%">'+data.sponsor.created_at+'</td></tr></table></li>');
                $('#treeListingDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00518'][$language]; /* Downlines */ ?></h4>');
            }
            
            // <td width="10%">image</td>
            // <td width="25%">package</td>
            $.each(data.downlinesLevel, function(key, val) {
                $('#treeListingDiv').append('<button type="button" id="'+val['client_id']+'" class="list-group-item list-group-item-action" onclick="treeListClick(this)"><table width="100%"><tr><td width="40%">'+val['username']+'</td><td width="25%">'+val['created_at']+'</td></tr></table></button>');
            });
            // <td width="10%">image</td>
            // <td width="25%">package</td>
        }

        function treeBranchClick(element) {
            var formData  = {
                command : "getTreeSponsor",
                clientID : element.id
            };
            var fCallback = loadHorizontalView;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function loadHorizontalView(data, message) {
            console.log(data);
            $('#treeHorizontalViewDiv').empty();
            $('.breadcrumbTree2').empty();

            $('.breadcrumbTree').append('<li><a id="'+data.sponsor.id+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 2)">'+data.sponsor.username+'</a></li>');

            var scrollFlag = 1;
            var treeDiv = 'treeHorizontalViewDiv';
            buildSponsorTree(data.sponsor, data.downlinesLevel, treeDiv, scrollFlag);
        }

        function loadSearchHorizontalView(data, message) {
            console.log(data);
            $('#treeHorizontalViewDiv').empty();
            $('.breadcrumbTree').empty();

            var scrollFlag = 1;
            var treeDiv = 'treeHorizontalViewDiv';
            buildSponsorTree(data.sponsor, data.downlinesLevel, treeDiv, scrollFlag);
        }

        function loadTextView(data, message) {
            console.log(data);
            var count = 1;
            if (data.downlinesLevel == null){
               $('#treeTextViewDiv').append('<li class="list-group-item text-center" style="background-color: #efefef">No Result Found</li>');
            }else {
            $.each(data.downlinesLevel, function(key, val) {
                if(val.length === 0)
                    return false;
                $('#treeTextViewDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00523'][$language]; /* Level */ ?> '+count+'</h4>');
                $('#treeTextViewDiv').append('<li class="list-group-item"><table width="100%"><tr><th width="25%">Client Username</th><th width="25%"><?php echo $translations['A00520'][$language]; /* Join At */ ?></th><th width="25%"><?php echo $translations['A00203'][$language]; /* Package */ ?></th><th width="25%">Upline Username</th></tr></table></li>');
                $.each(val, function(k, v) {
                    $('#treeTextViewDiv').append('<li class="list-group-item"><table width="100%"><tr><td width="25%">'+v['username']+'</td><td width="25%">'+v['created_at']+'</td><td width="25%">'+v['packageDisplay']+'</td><td width="25%">'+v['uplineUsername']+'</td></tr></table></li>');
                });
                $('#treeTextViewDiv').append('<br/>');
                count++;
            });
          }
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
                    var targetID = data.downline[i]["attr"].id;
                    var targetUsername = data.downline[i]["attr"].username;
                    // var targetName = data.downline[i]["attr"].name;
                    var disabled = data.downline[i]["attr"].disabled;
                    var suspended = data.downline[i]["attr"].suspended;
                    var freezed = data.downline[i]["attr"].freezed;
                    var popOverContent = '<?php echo $translations['A00104'][$language]; /* Disabled */ ?> : ' + disabled + '</br><?php echo $translations['A00156'][$language]; /* Suspended */ ?> : ' + suspended + '</br><?php echo $translations['A00176'][$language]; /* Freezed */ ?> : ' + freezed +'</br>';
                    
                    content += '<li class="p-b-3">';
                    if(data.downline[i]["attr"].downlineCount > 0)
                        content += '<i id="icon-' + targetID + '" class="m-r-10 fa fa-arrow-right" onclick="getSponsorTree('+ targetID +' , ' + "<?php echo $_POST['id']; ?>" + ');" targetID="' + targetID + '"></i>';
                    
                    // Documentation on using bootstrap popover
                    // https://v4-alpha.getbootstrap.com/components/popovers/
                    // data-trigger="focus" and tabindex="0" is for dismissable popover on next click
                    // Means the popover will close when click any other stuff on that page.
                    content += '<a id="popover-' + targetID + '" onclick="openPopover(' + targetID + ')" title="<?php echo $translations['A00318'][$language]; /* Status */ ?>" data-toggle="popover" tabindex="0" data-trigger="focus" data-placement="auto bottom" data-container="body" data-html="true" data-content="' + popOverContent + '" class="greyText"><strong> ' + targetUsername + '</strong></a> <span class="text-muted m-l-10">&nbsp'+date+'</span>';
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
                        command : 'getSponsorTreeVerticalView',
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
            $('#treeTextViewDiv').empty();
            $(".breadcrumbTree, #memberDiv, #treeListingDiv, #treeHorizontalViewDiv, #treeVerticalViewDiv, #treeTextViewDiv").hide();

            if(val == 1) {
                $('.breadcrumbTree, #memberDiv, #treeListingDiv').show();
                $('.breadcrumbTree').append('<li><a id="'+dataKeeper.sponsor.id+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 1)">'+dataKeeper.sponsor.username+'</a></li>');
                $('#memberDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00517'][$language]; /* Member */ ?></h4>');
                $('#memberDiv').append('<li class="list-group-item"><table width="100%"><tr><td width="40%">'+dataKeeper.sponsor.username+'</td><td width="25%">'+dataKeeper.sponsor.created_at+'</td></tr></table></li>');
                $('#treeListingDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['A00518'][$language]; /* Downlines */ ?></h4>');
                // <td width="10%">image</td>
                // <td width="25%">package</td>

                $.each(dataKeeper.downlinesLevel, function(key, val) {
                    $('#treeListingDiv').append('<button type="button" id="'+val['client_id']+'" class="list-group-item list-group-item-action" onclick="treeListClick(this)"><table width="100%"><tr><td width="40%">'+val['username']+'</td><td width="25%">'+val['created_at']+'</td></tr></table></button>');
                });
                // <td width="10%">image</td>
                // <td width="25%">package</td>
            }
            else if(val == 2) {
                $('.breadcrumbTree, #treeHorizontalViewDiv').show();
                $('.breadcrumbTree').append('<li><a id="'+dataKeeper.sponsor.id+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 2)">'+dataKeeper.sponsor.username+'</a></li>');

                var scrollFlag = 1;
                var treeDiv = 'treeHorizontalViewDiv';
                buildSponsorTree(dataKeeper.sponsor, dataKeeper.downlinesLevel, treeDiv, scrollFlag);
            }
            else if(val == 3) {
                $('#searchDownlines, #searchDownlinesBtn').hide();
                $('#treeVerticalViewDiv').show();
                var formData = {
                    command : 'getSponsorTreeVerticalView',
                    clientId : "<?php echo $_POST['id']; ?>",
                    viewType : 'vertical',
                };
                var fCallback = loadVerticalView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            }
            else if(val == 4) {
                $('#searchDownlines, #searchDownlinesBtn').hide();
                $('#treeTextViewDiv').show();
                var formData  = {
                    command : "getSponsorTreeTextView",
                    clientID : "<?php echo $_POST['id']; ?>"
                };
                var fCallback = loadTextView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        }

        function search() {
            $('.breadcrumbTree').empty();
            $('#memberDiv').empty();
            $('#treeListingDiv').empty();
            $('#treeHorizontalViewDiv').empty();
            $('#verticalDownlines').empty();
            $('#mainListVertical').empty();
            $('#treeTextViewDiv').empty();
            $(".breadcrumbTree, #memberDiv, #treeListingDiv, #treeHorizontalViewDiv, #treeVerticalViewDiv, #treeTextViewDiv").hide();

            var displayType = $('input[name=viewGroup]:checked').val();
            var targetUsername = $('input#searchDownlines').val();

            if(targetUsername == "") {
                targetUsername = "";
            }

            var formData  = {
                    command : "adminSearchDownline",
                    clientID : "<?php echo $_POST['id']; ?>",
                    targetUsername : targetUsername
            };
            var fCallback = getSearchDownline;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            if(displayType == 1) {
                $('.breadcrumbTree, #memberDiv, #treeListingDiv').show();
                
                var formData  = {
                    command : "getTreeSponsor",
                    clientID : "<?php echo $_POST['id']; ?>"
                };
                var fCallback = loadSearchListingView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
            else if(displayType == 2) {
                $('.breadcrumbTree, #treeHorizontalViewDiv').show();

                var formData  = {
                    command : "getTreeSponsor",
                    clientID : "<?php echo $_POST['id']; ?>"
                };
                var fCallback = loadSearchHorizontalView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            }
            else if(displayType == 3) {
                $('#treeVerticalViewDiv').show();
                $('#verticalDownlines').hide();
                $("#verticalArrow").removeClass('rotate90');
                var formData = {
                    command : 'getSponsorTreeVerticalView',
                    clientId : "<?php echo $_POST['id']; ?>",
                    viewType : 'vertical',
                };
                var fCallback = loadVerticalView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            } 
            else if(displayType == 4) {
                $('#treeTextViewDiv').show();
                var formData  = {
                    command : "getSponsorTreeTextView",
                    clientID : "<?php echo $_POST['id']; ?>",
                };
                var fCallback = loadTextView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
    }

    function getSearchDownline (data, message){
        console.log(data);
        $(".breadcrumbTree").empty();
        // $('#memberDiv').empty();
        // $('#treeListingDiv').empty();
        // $('#treeHorizontalViewDiv').empty();
        // $('#verticalDownlines').empty();
        // $('#mainListVertical').empty();
        // $('#treeTextViewDiv').empty();
        // $(".breadcrumbTree, #memberDiv, #treeListingDiv, #treeHorizontalViewDiv, #treeVerticalViewDiv, #treeTextViewDiv").hide();
        
        if (data.treeLink){
            $('.breadcrumbTree2').html("");
            var treeLinkHtml = "";
            $.each(data.treeLink, function(key, val) {
                // console.log(val);
                var len = $('.breadcrumbTree2 li').length;
                treeLinkHtml += `
                    <li>
                        <a id="${val['clientID']}" onclick="breadcrumbClick(this, 1)" name="${len}">${val['username']}</a>
                    </li>
                `;
            });
            // console.log(treeLinkHtml);
            $('.breadcrumbTree2').html(treeLinkHtml);
            $('.breadcrumbTree2').show();

            if (data.downlinesLevel) {
                var displayType = $('input[name=viewGroup]:checked').val();

                /*if(displayType == 1) {
                    $('#treeListingDiv').empty();
                    loadListingView(data, message);
                }
                else if(displayType == 2) {
                    loadHorizontalView(data, message);
                }
                else if(displayType == 3) {
                    loadVerticalView(data, message);
                }
                else if(displayType == 4) {
                    loadTextView(data, message);
                }*/

                if(displayType == 1) {
                    $('.breadcrumbTree, #memberDiv, #treeListingDiv').show();
                    
                    var formData  = {
                        command : "getTreeSponsor",
                        clientID : data.memberDetails.id
                    };
                    var fCallback = loadSearchListingView;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
                else if(displayType == 2) {
                    $('.breadcrumbTree, #treeHorizontalViewDiv').show();

                    var formData  = {
                        command : "getTreeSponsor",
                        clientID : data.memberDetails.id
                    };
                    var fCallback = loadSearchHorizontalView;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                }
                else if(displayType == 3) {
                    $('#treeVerticalViewDiv').show();
                    $('#verticalDownlines').hide();
                    $("#verticalArrow").removeClass('rotate90');
                    var formData = {
                        command : 'getSponsorTreeVerticalView',
                        clientId : data.memberDetails.id,
                        viewType : 'vertical',
                    };
                    var fCallback = loadVerticalView;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                } 
                else if(displayType == 4) {
                    $('#treeTextViewDiv').show();
                    var formData  = {
                        command : "getSponsorTreeTextView",
                        clientID : data.memberDetails.id
                    };
                    var fCallback = loadTextView;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
            }
        }
    }
    </script>
    <style>
        ul.breadcrumbTree {
            padding: 0px 16px;
            list-style: none;
        }
        ul.breadcrumbTree li {
            /*display: inline;*/
            font-size: 15px;
            display: inline-flex;
            flex-direction: row;
            flex-wrap: wrap;
            height: auto;
            align-items: center;
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

        ul.breadcrumbTree2 {
            padding: 0px 16px;
            list-style: none;
        }
        ul.breadcrumbTree2 li {
            /*display: inline;*/
            font-size: 15px;
            display: inline-flex;
            flex-direction: row;
            flex-wrap: wrap;
            height: auto;
            align-items: center;
        }
        ul.breadcrumbTree2 li+li:before {
            padding: 8px;
            color: black;
            content: "/\00a0";
        }
        ul.breadcrumbTree2 li a {
            color: #0275d8;
            text-decoration: none;
        }
        ul.breadcrumbTree2 li a:hover {
            color: #01447e;
            text-decoration: underline;
        }
    </style>
</body>
</html>