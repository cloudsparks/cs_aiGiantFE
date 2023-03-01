<?php 
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
$thisUrl = $_SERVER['REQUEST_URI'];
$pathInfo = pathinfo($thisUrl);

$countryList = $_SESSION['countryList'];
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
                                        <form id="searchForm" role="form">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00102'][$language]; /* Username */ ?>
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
                                                        <label class="control-label">
                                                            <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="name" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="">
                                                            <?php echo $translations['A00148'][$language]; /* Member ID */ ?>
                                                        </label>
                                                        <input id="memberID" type="text" class="form-control" dataName="memberID" dataType="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="countryID" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>

                                                            <?php
                                                            foreach ($countryList as $value => $countryRow) {
                                                                echo "<option value='".$countryRow['id']."'>".$countryRow['display']."</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00154'][$language]; /* Referral Username */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="sponsor" dataType="text">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00104'][$language]; /* Disabled */ ?>   
                                                        </label>
                                                        <select class="form-control" dataName="disabled" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="1">
                                                                <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                            </option>
                                                            <option value="0">
                                                                <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00156'][$language]; /* Suspended */ ?>
                                                        </label>
                                                        <select class="form-control" dataName="suspended" dataType="select">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <option value="1">
                                                                <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                            </option>
                                                            <option value="0">
                                                                <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                                    </div>
                                                </div>
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
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <a id="exportBtn" class="btn btn-primary waves-effect waves-light m-b-rem1" style="display: none" onclick="exportBtn()"><?php echo $translations['A01352'][$language]; /*Export to xlsx*/ ?></a>
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: none">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="listingDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    var url       = 'scripts/reqClient.php';
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = Array('view');
    var thArray  = Array(
        '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
        '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
        '<?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?>',
        '<?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>',
        '<?php echo $translations['A00153'][$language]; /* Country */ ?>',
        '<?php echo $translations['A00104'][$language]; /* Disabled */ ?>',
        '<?php echo $translations['A00156'][$language]; /* Suspended */ ?>',
        '<?php echo $translations['A00164'][$language]; /* Freezed */ ?>',
        '<?php echo $translations['A00113'][$language]; /* Last login */ ?>',
        '<?php echo $translations['A01350'][$language]; /* Last Login IP Address */ ?>',
        'Join Date'
        );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });

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
    });


    function exportBtn() {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);

        var exportParams = {
            searchData  : searchData,
            pageNumber  : pageNumber,
            seeAll      : 1,
            usernameSearchType  : $("input[name=usernameType]:checked").val()
        };

        var key  = Array (
            'member_id',
            'username',
            'name',
            'sponsorUsername',
            'mainLeaderUsername',
            'country',
            'disabled',
            'suspended',
            'freezed',
            'lastLogin',
            'lastLoginIP',
            'createdAt'
        );

        var formData = {
            command     : "addExcelReq",
            API         : "getMemberList",
            fileName    : "MemberListReport",
            inputData   : searchData,
            params      : exportParams,
            headerAry   : thArray,
            keyAry      : key,
            titleKey    : "memberList",
            type        : 'export',
            returnType  : 'excel',
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }


    function loadDefaultListing(data, message) {
        $('#basicwizard').show();

        if (data) {
            $('#exportBtn').show(); 
        } else {
            $('#exportBtn').hide();
        }

        var tableNo;
        var memberList = data.memberList;

        if(data != "" && memberList.length>0) {
            var newList = [];

            $.each(memberList, function(k, v) {

                if (v['name'] == ""){
                    v['name'] = "-";
                }

                if (v['mainLeaderUsername'] == "") {
                    v['mainLeaderUsername'] = "-";
                }

                if (v['lastLoginIp'] == "") {
                    v['lastLoginIp'] = "-";
                }


                var rebuildData = {
                    member_id : v['member_id'],
                    username : v['username'],
                    name : v['name'],
                    sponsorUsername : v['sponsorUsername'],
                    mainLeaderUsername : v['mainLeaderUsername'],
                    country : v['country'],
                    disabled: v['disabled'],                    
                    suspended : v['suspended'],
                    freezed : v['freezed'],
                    lastLogin : v['lastLogin'],
                    lastLoginIp : v['lastLoginIp'],
                    createdAt : v['createdAt']
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        if(memberList) {
            $.each(memberList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-id', v['clientID']);
            });      
        }

        $('#'+ tableId).find('tbody tr').each(function(){
            $(this).find('td:last-child').css('text-align','center');
        });
    }


    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'view') {
            var viewId = tableRow.attr('data-id');
            $.redirect("memberView.php", {id : viewId});
        }
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command    : "getMemberList",
            searchData  : searchData,
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
