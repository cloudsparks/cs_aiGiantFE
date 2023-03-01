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
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <h4 class="header-title m-t-0 m-b-30">
                                Password Maintain
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <form id="editCoinRateBox" role="form" data-parsley-validate novalidate>
                                        <div class="form-group" id="percentageForm">
                                            <label>
                                               Old Password
                                            </label>
                                            <input id="oldPassword" type="password" placeholder="" class="form-control" required/>
                                            <span id="currentPasswordError" class="customError text-danger"></span>
                                        </div>
                                            <div class="form-group" id="percentageForm">
                                            <label>
                                               New Password
                                            </label>
                                            <input id="newPassword" type="password" placeholder="" class="form-control" required/>
                                            <span id="newPasswordError" class="customError text-danger"></span>
                                        </div>
                                        <div class="form-group" id="percentageForm">
                                            <label>
                                               Re-type New Password
                                            </label>
                                            <input id="retypeNewPassword" type="password" placeholder="" class="form-control" required/>
                                            <span id="newPasswordConfirmError" class="customError text-danger"></span>
                                        </div>
                                    </form>
                                    <div class="col-md-12 m-b-20">
                                        <button id="updatePassBtn" type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                    </div>
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
    var divId    = 'withdrawalListDiv';
    var tableId  = 'withdrawalListTable';
    var pagerId  = 'pagerWithdrawalList';
    var btnArray = {};
    // var thArray  = Array(
    //     "ID",
    //     "Type",
    //     "Exchange Rate",
    //     "<?php echo $translations['A00112'][$language]; /* Created At */ ?>",
    //     "Username"
    // );

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var creditType      = "";

    
    $(document).ready(function() {

    });

    function loadDefaultListing(data, message) {
        // console.log(data);
    }

    $("#updatePassBtn").click(function(){
        $(".customError").empty();
        var currentPassword = $("#oldPassword").val();
        var newPassword = $("#newPassword").val();
        var newPasswordConfirm = $("#retypeNewPassword").val();
        
        var formData  = {
                        command : 'adminChangePassword',
                        currentPassword : currentPassword,
                        newPassword : newPassword,
                        newPasswordConfirm : newPasswordConfirm
                        };
        fCallback = editSuccess;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    })

    function editSuccess(data, message) {
        showMessage('Successful Change Password', 'success', 'Password Maintain', '', 'passwordMaintain.php');
    }


</script>
</body>
</html>
