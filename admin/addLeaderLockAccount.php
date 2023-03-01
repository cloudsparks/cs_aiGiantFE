<?php
session_start();

// Get current page name
$thisPage = basename($_SERVER['PHP_SELF']);

// Check the session for this page
if(!isset ($_SESSION['access'][$thisPage]))
    echo '<script>window.location.href="accessDenied.php";</script>';
$_SESSION['lastVisited'] = $thisPage;
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
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <a href="leaderLockAccount.php" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20">
                                <?php echo $translations['A00115'][$language]; /* Back */ ?>
                            </a>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-box">
                                        <div id="clientRightsList">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 m-b-20">
                                    <button id="saveBtn" type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <?php include("footer.php"); ?>

    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>
    // Initialize all the id in this page
    var divId    = 'clientRightsList';
    var tableId  = 'unitPriceListTable';
    var pagerId  = 'pagerUnitPriceList';
    var btnArray = {};
    var thArray  = Array (
        'Name',
        'blocked'
    );

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";

    $(document).ready(function() {

        fCallback = loadDefaultListing;
        formData  = {
            command     : 'getClientRightsList',
            pageType    : "Batch"
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("#saveBtn").click(function(){
            var blockedList = [];
            var blocked = "";

            $('input[type = checkbox]').each(function() {
                blocked = this.checked ? "1" : "0";
                blockedList.push({rightsId: this.id, blocked : blocked, rightsName : this.value});
            });

            var fCallback = doneUpdate;
            formData  = {
                command     : 'leaderLockAccount',
                inputData   : JSON.parse('<?php echo $_POST["inputData"] ?>'),
                filterOutLeaderUsername : '<?php echo $_POST["filterOutLeaderUsername"] ?>',
                lineType : '<?php echo $_POST["lineType"] ?>',
                blockedList : blockedList,
                pageNumber : pageNumber,
                step: 2
            };
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });

    function loadDefaultListing(data, message) {
        var tableNo;
        buildLockAccountList(data, divId);
        // populateTable(data, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

    function doneUpdate(){
        showMessage('Successfully updated account rights', 'success', 'Success', '', 'leaderLockAccount.php');
    }

    function buildLockAccountList (data, message){
        var parentID       = "";
        var name           = "";
        var id             = "";
        // var module         = "";
        var checked        = "";
        // var display        = "";

         if(data) {
            $.each(data, function(key, val) {
                var parentID       = val['parent_id'];
                var permissionName = val['display'];
                var permissionID   = val['id'];
                var checked        = val['blocked'] ? "checked" : "";

                if(parentID == 0) {
                    var mainMenu = '<div class="checkbox checkbox-primary">'+
                                        '<input id="'+permissionID+'" parentID="'+parentID+'" type="checkbox" name="permissions[]" value="'+permissionID+'" '+checked+'>'+
                                        '<label for="checkbox2">'+
                                            permissionName
                                        '</label>'+
                                    '</div>';
                    $('#'+divId).append(mainMenu);
                }

                if(parentID != 0) {
                    var childMenu = '<div class="checkbox checkbox-primary">'+
                                        '<input id="'+permissionID+'" parentID="'+parentID+'" type="checkbox" name="permissions[]" value="'+permissionID+'" '+checked+'>'+
                                        '<label for="checkbox2">'+
                                            permissionName
                                        '</label>'+
                                    '</div>';
                    $('#'+parentID).closest('div').append(childMenu);
                }
            });

            $('input[type="checkbox"]').change(function() {
                if(this.checked === true) {
                    // $('#'+$(this).attr('parentID')).prop('checked', this.checked);

                    // if($('#'+$(this).attr('parentID')).attr('parentID') != 0) {
                    //     $('#'+$('#'+$(this).attr('parentID')).attr('parentID')).prop('checked', this.checked);
                    // }
                }

                $('input[parentID="'+this.id+'"]').prop('checked', this.checked);
            });
        }
    }
</script>
</body>
</html>
