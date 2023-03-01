<?php
session_start();


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
                            <a href="lockAccount.php" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20">
                                <?php echo $translations['A00115'][$language]; /* Back */ ?>
                            </a>
                            <div id="unitPriceListDiv" class=""></div>
                            <div id="basicwizard" class="pull-in">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <form>
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    
                                    <span id="paginateText"></span>
                                    </form>
                                    <button id="saveBtn" class="btn btn-primary waves-effect waves-light">
                                        <?php echo $translations['A01006'][$language]; /* Save */ ?>
                                    </button>
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
    var divId    = 'unitPriceListDiv';
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
            clientId    : "<?php echo $_POST['id']; ?>"
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("#saveBtn").click(function(){

            if (confirm('Are you sure want to perform this action?')){
                var blockedList = [];

                $('input[type = checkbox]').each(function() {
                    blocked = this.checked ? "1" : "0";
                    blockedList.push({rightsId: this.id, blocked : blocked, rightsName : this.value});
                });

                var fCallback = doneUpdate;
                formData  = {
                    command     : 'lockAccount',
                    clientId    : "<?php echo $_POST['id']; ?>",
                    blockedList : blockedList
                };
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

    });

    function loadDefaultListing(data, message) {
        console.log(data);
        buildLockAccountList(data, divId);
        // var tableNo;
        // populateTable(data, tableId, divId, thArray, btnArray, message, tableNo);
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
                var parentID            = val['parent_id'];
                var permissionName      = val['name'];
                var permissionID        = val['id'];
                var display             = val['display'];
                var checked             = val['blocked'] ? "checked" : "";

                if(parentID == 0) {
                    var mainMenu = '<div class="checkbox checkbox-primary">'+
                                        '<input id="'+permissionID+'" parentID="'+parentID+'" type="checkbox" name="permissions[]" value="'+permissionID+'" '+checked+'>'+
                                        '<label for="checkbox2">'+
                                            display
                                        '</label>'+
                                    '</div>';
                    $('#'+divId).append(mainMenu);
                }

                if(parentID != 0) {
                    var childMenu = '<div class="checkbox checkbox-primary">'+
                                        '<input id="'+permissionID+'" parentID="'+parentID+'" type="checkbox" name="permissions[]" value="'+permissionID+'" '+checked+'>'+
                                        '<label for="checkbox2">'+
                                            display
                                        '</label>'+
                                    '</div>';
                    $('#'+parentID).closest('div').append(childMenu);
                }
            });

            $('input[type="checkbox"]').change(function() {
                if(this.checked == true) {
                    // $('#'+$(this).attr('parentID')).prop('checked', this.checked);

                    // if($('#'+$(this).attr('parentID')).attr('parentID') != 0) {
                    //     $('#'+$('#'+$(this).attr('parentID')).attr('parentID')).prop('checked', this.checked);
                    // }
                }

                $(this).parent().find('input').prop('checked', this.checked);

                // $('input[parentID="'+this.id+'"]').prop('checked', this.checked);
                // var childID = $(this).find('.checkbox')
                // console.log(childID)
                // $('input[parentID="'+this.id+'"]').prop('checked', this.checked);
            });
        }
    }

    function doneUpdate(){
        showMessage('Successfully updated account rights', 'success', 'Success', '', 'lockAccount.php');
    }



</script>
</body>
</html>
