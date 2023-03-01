<?php session_start(); ?>
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
                                        <form id="searchMember" role="form">

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
                                                            <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                        </label>
                                                        <select id="countryName" class="form-control" dataName="countryName" dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label">
                                                            <?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?>
                                                        </label>
                                                        <input type="text" class="form-control" dataName="sponsor" dataType="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="col-xs-12">
                                            <button id="searchMemberBtn" class="btn btn-primary waves-effect waves-light">
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
                        <!-- <div class="card-box p-b-0"> -->
                            <form>
                                <div id="basicwizard" class="pull-in" style="display: none">
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
                      <!--   </div> -->
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
    var divId    = 'memberListDiv';
    var tableId  = 'memberListTable';
    var pagerId  = 'pagerMemberList';
    var btnArray = {};
    var thArray  = Array('<?php echo $translations['A00249'][$language]; ?>',
        '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
        '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
        '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        '<?php echo $translations['A00154'][$language]; /* Sponsor Username */ ?>',
        // ' <?php echo $translations['A01349'][$language]; /*Main Leader Username*/ ?>',
        '<?php echo $translations['A00153'][$language]; /* Country */ ?>',
        // '<?php echo $translations['A00104'][$language]; /* Disabled */ ?>',
        '<?php echo $translations['A00113'][$language]; /* Last login */ ?>',
        '<?php echo $translations['A01132'][$language]; /* Join Date */ ?>'
    );

    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;

    $(document).ready(function() {
        url       = 'scripts/reqClient.php';
        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchMemberBtn").click();
            }
        });
        // formData  = {command : "getMemberList", pageType: "lockAccount", pageNumber : pageNumber};
        // fCallback = loadDefaultListing;
        // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchMember').find('input:not([type=radio])').each(function() {
                $(this).val('');
            });
            $('#searchMember').find('select').each(function() {
                $(this).val('');
            });
        });

        $('#searchMemberBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });
    });

    function loadDefaultListing(data, message) {
        console.log(data);
        $('#basicwizard').show();
        loadCountryDropdown(data.countryList);
        var tableNo;
        var memberList = data.memberList;

        var newData = [];
        if(memberList) {
            $.each(memberList, function(i, obj){
                var rebuild = {
                    btn: '',
                    member_id: obj.member_id,
                    name: obj.name,
                    username: obj.username,
                    sponsorUsername: obj.sponsorUsername,
                    // mainLeaderUsername: obj.mainLeaderUsername,
                    country: obj.country,
                    // disabled: obj.disabled,
                    lastLogin: obj.lastLogin,
                    createdAt: obj.createdAt
                };

                newData.push(rebuild);
            });

            buildTable(newData, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);


            $.each(memberList, function(k, v) {
                $('#'+tableId).find('tr#'+k).attr('data-th', v['clientID']);
            });      

            $('#'+tableId).find('tbody tr').each(function(){
                $(this).find("td:eq(0)").html('<a data-toggle="tooltip" title="" id="edit'+this.id+'" onclick="tableBtnClick(this.id)" class="m-t-5 btn btn-icon waves-effect waves-light btn-primary" data-original-title="Edit" aria-describedby=""><span><?php echo $translations['A00249'][$language]; ?></span></a>');

                $(this).find("td:first-child").css('text-align', 'center');
            });
        } else {
            $("#"+divId+", #"+pagerId+", #paginateText").empty();
            $("#alertMsg").addClass('alert-danger').html('<span>No result Found.</span>').show();
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
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');

        if (btnName == 'edit') {
            var viewId = tableRow.attr('data-th');
            $.redirect("accountRightsList.php", {id : viewId});
        }
    }

    function pagingCallBack(pageNumber, fCallback){
        var searchId   = 'searchMember';
        var searchData = buildSearchDataByType(searchId);
        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command    : "getMemberList",
            searchData  : searchData,
            pageNumber : pageNumber,
            pageType: "lockAccount",
            usernameSearchType : $("input[name=usernameType]:checked").val()
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

</script>
</body>
</html>