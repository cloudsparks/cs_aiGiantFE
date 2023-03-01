<?php
session_start();
$thisPage = basename($_SERVER['PHP_SELF']);
if(!isset ($_SESSION['access'][$thisPage]))
    echo '<script>window.location.href="accessDenied.php";</script>';
else
    $_SESSION['lastVisited'] = $thisPage;
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
                                        <div id="searchForm">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" for="" data-th="name"><?php echo $translations['A00110'][$language]; /* Role Name */ ?></label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-4 form-group">
                                                        <label class="control-label" data-th="disabled"><?php echo $translations['A00318'][$language]; /* Status */ ?></label>
                                                        <select class="form-control">
                                                            <option value="">All</option>
                                                            <option value="0"><?php echo $translations['A00372'][$language]; /* Active */ ?></option>
                                                            <option value="1">Disabled</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light"><?php echo $translations['A00051'][$language]; /* Search */ ?></button>
                                            <button type="submit" id="resetBtn" class="btn btn-default waves-effect waves-light"><?php echo $translations['A00053'][$language]; /* Reset */ ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                            <a href="adminNewRole.php" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20"><?php echo $translations['A01010'][$language]; /* New Role */ ?></a>
                            <form>
                                <div id="basicwizard" class="pull-in" style="display: none;">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="alert" style="display: none;"></div>
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
    var divId = 'listingDiv';
    var tableId = 'listingTable';
    var pagerId = 'listingPager';
    var btnArray = Array('edit');
    var thArray = Array('<?php echo $translations['A00106'][$language]; /* ID */ ?>',
        '<?php echo $translations['A00101'][$language]; /* Name */ ?>',
        '<?php echo $translations['A00145'][$language]; /* Description */ ?>',
        '<?php echo $translations['A01148'][$language]; /* Site */ ?>',
        '<?php echo $translations['A00318'][$language]; /* Status */ ?>'
    );

    var url = 'scripts/reqAdmin.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;

    $(document).ready(function() {

        $("body").keyup(function(event) {
            if (event.keyCode == 13) {
                $("#searchBtn").click();
            }
        });
        
        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input').not("[type='radio'], [type='checkbox']").each(function() {
                $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });
    });

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search successful.</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function loadDefaultListing(data, message) {
        $("#basicwizard").show();
        var tableNo;
        buildTable(data.roleList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#'+tableId).find('tr').each(function(){
            $(this).find('th:first-child, td:first-child').hide();
            $(this).find('td:last-child').css('text-align','center');
        })
    }

    function tableBtnClick(btnId) {
        var btnName = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId = $('#'+btnId).closest('table');

        if (btnName == 'edit') {
            var editId = tableRow.attr('data-th');
            $.redirect('adminEditRole.php', {id : editId});
        }
    }


    function pagingCallBack(pageNumber, fCallback){
        var searchId = 'searchForm';
        var searchData = buildSearchData(searchId);

        if(pageNumber > 1) bypassLoading = 1;

        var formData = {
            command : "getRoles",
            inputData: searchData,
            pageNumber: pageNumber,
            site: "Admin"
        };
        if(!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
</script>
</body>
</html>
