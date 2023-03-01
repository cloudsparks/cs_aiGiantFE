<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="accessDenied.php";</script>';
    else
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
                    <!-- Back button -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div id="backBtn" class="btn btn-primary waves-effect waves-light m-b-20">
                                <?php echo $translations['A00115'][$language]; /* Back */?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <!-- <h4 class="header-title m-t-0 m-b-30">Add Announcement</h4> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <form role="form" enctype="multipart/form-data">
                                            <div id="basicwizard" class=" pull-in">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div class="form-group">
                                                        <label>
                                                            Username
                                                        </label>
                                                        <input id="username" type="text" class="form-control" required/>
                                                        <span id="usernameError" class="errorSpan text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            Percentage
                                                        </label>
                                                        <input id="instant" type="text" class="form-control" placeholder="%" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required/>
                                                        <span id="instantError" class="errorSpan text-danger"></span>
                                                    </div>
                                                    <!--
                                                    <div class="form-group">
                                                        <label>
                                                            Daily
                                                        </label>
                                                        <input id="daily" type="text" class="form-control" placeholder="%" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required/>
                                                        <span id="dailyError" class="errorSpan text-danger"></span>
                                                    </div>
                                                    -->

                                                    <div id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations['A00323'][$language]; /* Submit */?>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 m-b-20">
                            <div id="submitBtn" class="btn btn-primary waves-effect waves-light">Search</div>
                        </div> -->
                    </div><!-- End row -->
                </div><!-- container -->
            </div><!-- content -->
            <?php include("footer.php"); ?>
        </div><!-- End content-page -->
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>

    <script>
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqUpload.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var language        = "<?php echo $language; ?>";

        $(document).ready(function() {

            $('#submitBtn').click(function() {
                var percentage;
                percentage = $("#instant").val();
                // var daily = $("#daily").val();
                var username = $('#username').val();
               
                // if (daily == ""){     
                //  percentage = {
                //     "instant" : instant,
                //  }
               
                // }else if (instant == ""){
                //    percentage = {
                //     "daily" : daily,
                //  }
                // }else {
                //    percentage = {
                //     "instant" : instant,
                //     "daily" : daily
                //    }
                // }
                
                fCallback = submitCallback;
                formData  = {
                    command: 'setWaterBucketPercentage', 
                    username : username, 
                    percentage : percentage
                };
                ajaxSend('scripts/reqClient.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            });

            $('#backBtn').click(function() {
                $.redirect('waterBucketListing.php');
            });
        });
        
        function submitCallback(data, message) {
            showMessage('Successful added water bucket', 'success', 'Add Water Bucket', 'upload', 'waterBucketListing.php');
        }




    </script>
</body>
</html>