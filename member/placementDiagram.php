<?php include 'include/config.php'; ?>
<?php
    session_start();

    if (in_array("Placement Tree", $_SESSION['blockedRights'])){
        header("Location: dashboard.php");
    }
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>



<section class="pageContent">
    <div class="kt-container">
        <div class="text-center">
            <div class="pageTitle">
                <span data-lang="M03637"><?php echo $translations['M03637'][$language]; //Placement DIAGRAM ?></span>
            </div>
        </div>

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-12">

                    <div class="listingWrapper2">
                    <div class="col-12">
                        <form id="searchDIV">
                            <div class="col-12 px-0">
                                <div class="row align-items-end">
                                   <div class="col-lg-3 col-md-6 col-12">
                                        <label data-lang='M00001'><?php echo $translations['M00001'][$language]; //Username ?></label>
                                        <input type="text" class="form-control" id="username">
                                    </div> 
                                    <!-- <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
                                        <label data-lang='M00170'><?php echo $translations['M00170'][$language]; //Display Type ?></label>
                                        <select id="displayType" class="form-control">
                                            <option value="1"><?php echo $translations['M00059'][$language]; /* Listing View */ ?></option>
                                            <option value="2"><?php echo $translations['M00060'][$language]; /* Horizontal View */ ?></option>
                                            <option value="3"><?php echo $translations['M00061'][$language]; /* Vertical View */ ?></option>
                                        </select>
                                    </div> -->

                                    <div class="col mt-3">
                                        <button onclick="search()" class="btn btn-primary" type="button" name="button" data-lang='M00243'><?php echo $translations['M00243'][$language] /*Search*/ ?></button>
                                        <button id="btnClear" class="btn btn-default" type="button" name="button" data-lang='M00085'><?php echo $translations['M00085'][$language] /*Reset*/ ?></button>
                                        <span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="btnClear"></i> </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 pt-4">
                        <ul class="breadcrumbTree"></ul>
                        <ul id="memberDiv" class="list-group table-responsive"></ul>
                        <div id="treeListingDiv" class="list-group table-responsive"></div>
                        
                        <div class="bgContainer2 p-5">
                            <div id="scaleBtnWrapper" class="mb-5" style="float: right;">
                                <div class="scaleBtnWrapper">
                                    <button class="btn btn-default" onclick="treeSmaller()">-</button>
                                    <button class="btn btn-default" onclick="treeBigger()">+</button>
                                </div>
                            </div>
                            <div id="treeHorizontalViewDiv" class="items"></div>
                        </div>
                        
                        <ul id="treeTextViewDiv" class="list-group table-responsive"></ul>
                        <div id="treeVerticalViewDiv" class="col-md-12">
                            <table class="table m-0 table-centered">
                            <header role="banner">
                                <nav class="nav" role="navigation">
                                    <ul id="navListTreeView">
                                        <input id="group-1" type="checkbox" hidden />
                                        <!-- <i id="verticalArrow" class="m-r-10 fa fa-chevron-right" targetid=""></i> -->
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
                </div>
            </div>
        </div>
       <?php include 'footer.php'; ?>
    </div>
</section>

</body>

<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>


<script>
        var url            = 'scripts/reqDefault.php';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;
        var scale = 0.9;

        $(document).ready(function() {

            if ( $(window).width() >= 1200 ) {


                const slider = document.querySelector('.items');
                let isDown = false;
                let startX;
                let scrollLeft;

                slider.addEventListener('mousedown', (e) => {
                    isDown = true;
                    slider.classList.add('active');
                    startX = e.pageX - slider.offsetLeft;
                    scrollLeft = slider.scrollLeft;
                });
                slider.addEventListener('mouseleave', () => {
                    isDown = false;
                    slider.classList.remove('active');
                });
                slider.addEventListener('mouseup', () => {
                    isDown = false;
                    slider.classList.remove('active');
                });
                slider.addEventListener('mousemove', (e) => {
                    if(!isDown) return;
                    e.preventDefault();
                    const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 3; //scroll-fast
                slider.scrollLeft = scrollLeft - walk;
                });

            }

            var formData  = {
                command : "getTreePlacement",
                clientID : "<?php echo $_SESSION["userID"]; ?>",
            };
            var fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#btnClear').click(function() {
            	$('input').val("");
            });
        });

        // $(document).on('scroll', function(){
        //     if ($(window).width() < 1199 && $(window).width() > 319) {
        //         if (document.body.scrollTop > 230 || document.documentElement.scrollTop > 230) {
        //             $("#scaleBtnWrapper > div").addClass("diagramBtnBoxMobile").removeClass("diagramBtnBox");
        //             $("#scaleBtnWrapper > div > button:last-child").hide();
        //             $("#scaleBtnWrapper > div > button:first-child").show();
        //         } else {
        //             $("#scaleBtnWrapper > div").addClass("diagramBtnBox").removeClass("diagramBtnBoxMobile");
        //             $("#scaleBtnWrapper > div > button:last-child").show();
        //             $("#scaleBtnWrapper > div > button:first-child").hide();
        //         }
        //     } else {
        //         if (document.body.scrollTop > 230 || document.documentElement.scrollTop > 230) {
        //             $("#scaleBtnWrapper > div").addClass("diagramBtnBoxFloat").removeClass("diagramBtnBox");
        //         } else {
        //             $("#scaleBtnWrapper > div").addClass("diagramBtnBox").removeClass("diagramBtnBoxFloat");
        //         }
        //     }
        // });

        function treeSmaller() {
            if(scale > 0.22) {
                scale -= 0.05;
                $(".hv-wrapper").css('transform', 'scale('+scale+')');

                var height = $(".hv-wrapper").height()*scale;
                $(".hv-hierarchy").height((height+10)+"px");
            }
            console.log(scale);
        }
        function treeBigger() {
            if(scale < 1) {
                scale += 0.05;
                $(".hv-wrapper").css('transform', 'scale('+scale+')');

                var height = $(".hv-wrapper").height()*scale;
                $(".hv-hierarchy").height((height+10)+"px");
            }
            console.log(scale);
        }
        
        function loadDefaultListing(data, message) {
            console.log(data);
            var treeLogo = '<?php echo $config['treeLogo']; ?>';
            $('#treeHorizontalViewDiv').empty();

            if(data.breadcrumb) {
                $('.breadcrumbTree').empty();
                $.each(data.breadcrumb, function(key, val) {
                    $('.breadcrumbTree').append('<li><a id="'+val['id']+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 2)">'+val['username']+'</a></li>');
                });
            }

            var placementChildAmount = 2;
            var treeDiv = 'treeHorizontalViewDiv';
            buildPlacementTree(data.sponsor, data.downlines, treeDiv, placementChildAmount, treeLogo);
        }
        // For listing view, horizontal view 's breadcrumb
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
        // For listing view
        function treeListClick(element) {
            var formData  = {
                command : "getTreePlacement",
                clientID : element.id,
                depthLevel : 1
            };
            var fCallback = loadListingView;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        // For listing view
        function loadListingView(data, message) {
            var treeLogo = '<?php echo $config['favicon']; ?>';

            $('#memberDiv').empty();
            $('#treeListingDiv').empty();
            
            if(data.breadcrumb) {
                $('.breadcrumbTree').empty();
                $.each(data.breadcrumb, function(key, val) {
                    $('.breadcrumbTree').append('<li><a id="'+val['id']+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 1)">'+val['username']+'</a></li>');
                });
            }

            $('#memberDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['M00425'][$language]; /* Member */ ?></h4>');
            $('#memberDiv').append('<li class="list-group-item"><table width="100%"><tr><td width="10%"><img src="'+treeLogo+'" style="height: 35px;"></td><td width="35%">'+data.sponsor[0].username+'</td><td width="55%">'+data.sponsor[0].created_at+'</td></tr></table></li>');
            $('#treeListingDiv').append('<h4 style="padding: 0px 15px"><?php echo $translations['M00426'][$language]; /* Downlines */ ?></h4>');
            $.each(data.downlines, function(key, val) {
                $('#treeListingDiv').append('<button type="button" id="'+val['client_id']+'" class="list-group-item list-group-item-action" onclick="treeListClick(this)"><table width="100%"><tr><td width="10%"><img src="'+treeLogo+'" style="height: 35px;"></td><td width="35%">'+val['username']+'</td><td width="55%">'+val['created_at']+'</td></tr></table></button>');
            });
        }
        // For horizontal view
        function treeBranchClick(element) {
            var formData  = {
                command : "getTreePlacement",
                clientID : element.id,
                // realClientID : "<?php echo $_SESSION["userID"]; ?>"
            };
            var fCallback = loadHorizontalView;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        // For horizontal view
        function loadHorizontalView(data, message) {
            console.log(data);
            var treeLogo = '<?php echo $config['treeLogo']; ?>';
            $('#treeHorizontalViewDiv').empty();

            if(data.breadcrumb) {
                $('.breadcrumbTree').empty();
                $.each(data.breadcrumb, function(key, val) {
                    $('.breadcrumbTree').append('<li><a id="'+val['id']+'" name="'+$('.breadcrumbTree li').length+'" onclick="breadcrumbClick(this, 2)">'+val['username']+'</a></li>');
                });
            }

            var placementChildAmount = 2;
            var treeDiv = 'treeHorizontalViewDiv';
            buildPlacementTree(data.sponsor, data.downlines, treeDiv, placementChildAmount, treeLogo);
        }
        // For vertical view
        function loadVerticalView(data, message) {
            var content = "";

            if(data){    
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
                    // var targetUsername = data.downline[i]["attr"].username;
                    var targetName = data.downline[i]["attr"].name;
                    var disabled = data.downline[i]["attr"].disabled;
                    var suspended = data.downline[i]["attr"].suspended;
                    var freezed = data.downline[i]["attr"].freezed;
                    var popOverContent = 'Disabled : ' + disabled + '</br>Suspended : ' + suspended + '</br>Freezed : ' + freezed +'</br>';
                    
                    content += '<li class="p-b-3">';
                    if(data.downline[i]["attr"].downlineCount > 0)
                        content += '<i id="icon-' + targetID + '" class="m-r-10 fa fa-arrow-right" onclick="getSponsorTree('+ targetID +' , ' + "<?php echo $_SESSION["userID"]; ?>" + ');" targetID="' + targetID + '"></i>';
                    
                    // Documentation on using bootstrap popover
                    // https://v4-alpha.getbootstrap.com/components/popovers/
                    // data-trigger="focus" and tabindex="0" is for dismissable popover on next click
                    // Means the popover will close when click any other stuff on that page.
                    content += '<a id="popover-' + targetID + '" onclick="openPopover(' + targetID + ')" title="Status" data-toggle="popover" tabindex="0" data-trigger="focus" data-placement="bottom" data-container="body" data-html="true" data-content="' + popOverContent + '" class="greyText"><strong> ' + targetName + '</strong></a> <span class="text-muted m-l-10">&nbsp'+date+'</span><span class="text-muted m-l-10">&nbsp('+position+')</span>';
                    content += '</li>';

                    content += '<ul id="' + targetID + '" class="noList">';
                    content += '</ul>';
                };
                    if(!data.targetID) var listId = "verticalDownlines";
                    else var listId = data.targetID;
                    $("#" + listId).empty().append(content);

            }else
                $("#mainListVertical").empty().append('<?php echo $translations["M00030"][$language] //No Results Found. ?>');
        }
        // For vertical view
        function getSponsorTree(targetId, clientId, targetUsername){
            bypassLoading = 1;
            if($("#" + targetId).find('ul').length) {
                $("#icon-" + targetId).removeClass('rotate90');
                $("#" + targetId).empty();
            } else {
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
        // For vertical view
        function openPopover(targetId) {
            $('#popover-' + targetId).popover('toggle');
        }

        function search() {
        	$('.breadcrumbTree').empty();
            $('#memberDiv').empty();
            $('#treeListingDiv').empty();
            $('#treeHorizontalViewDiv').empty();
            $('#verticalDownlines').empty();
            $('#mainListVertical').empty();
            $(".breadcrumbTree, #memberDiv, #treeListingDiv, #treeHorizontalViewDiv, #treeVerticalViewDiv").hide();

            var displayType = $('#displayType option:checked').val();
            var username = $('input#username').val();

            if(username == "") {
            	username = "";
            }

            if(displayType == 1) {
            	$('.breadcrumbTree, #memberDiv, #treeListingDiv').show();
                var formData  = {
	                command : "getTreePlacement",
	                clientID : "<?php echo $_SESSION["userID"]; ?>",
	                depthLevel : 1,
	                username : username
	            };
	            var fCallback = loadListingView;
	            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                $("#scaleBtnWrapper").hide();
            }
            else if(displayType == 2) {
                $('.breadcrumbTree, #treeHorizontalViewDiv').show();
                var formData  = {
                    command : "getTreePlacement",
                    clientID : "<?php echo $_SESSION["userID"]; ?>",
                    username : username
                };
                var fCallback = loadHorizontalView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                $("#scaleBtnWrapper").show();
            }
            else if(displayType == 3) {
                $('#treeVerticalViewDiv').show();
                var formData = {
                    command : 'getPlacementTreeVerticalView',
                    clientId : "<?php echo $_SESSION["userID"]; ?>",
                    viewType : 'vertical',
                    username : username
                };
                var fCallback = loadVerticalView;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

                $("#scaleBtnWrapper").hide();

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