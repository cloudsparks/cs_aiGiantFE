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
                        <div>
                            <h4 class="panel-title" id="totalUser">
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                            <form>
                                <div id="basicwizard" class="pull-in">
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
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array (
        "<?php echo $translations['A00102'][$language]; /* username */ ?>",
        "<?php echo $translations['A00117'][$language]; /*Fullname */ ?>",
        "<?php echo $translations['A01033'][$language]; /* Login On */ ?>"
    );

    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 1;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";

    $(document).ready(function() {

        var formData  = {
            command: 'getWhoIsOnlineList'
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    });

    function loadDefaultListing(data, message) {
        var tableNo;
        buildTable(data.onlineUserList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#totalUser').text("<?php echo $translations['A01034'][$language]; /* Total User(s) Online */ ?> : " + data.totalUserOnline);
    }

</script>
</body>
</html>
