<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    // $_SESSION['lastVisited'] = $thisPage;
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
                            <div class="card-box">
                                <form>
                                    <div class="pull-in row">
                                        <div class="p-l-rem2 p-r-rem2">
                                            <h3><?php echo $translations['A01083'][$language]; /* Director */?></h3>
                                        </div>
                                        <div class="col-lg-12 p-t-rem1 p-l-rem3">
                                            <div class="col-lg-6">
                                                <div class="m-t-rem1">
                                                    <span><?php echo $translations['A00102'][$language]; /* Username */?></span><br>
                                                    <label style="color: #059607;">WIN168</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="m-t-rem1">    
                                                    <span><?php echo $translations['A00148'][$language]; /* Member ID */?></span><br>
                                                    <label style="color: #059607;">75232776</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="m-t-rem1">    
                                                    <span><?php echo $translations['A00203'][$language]; /* Package */?></span><br>
                                                    <label style="color: #059607;">BCH5000</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="m-t-rem1">    
                                                    <span><?php echo $translations['A00153'][$language]; /* Country */?></span><br>
                                                    <label style="color: #059607;">Malaysia</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="m-t-rem1">    
                                                    <span><?php echo $translations['A00195'][$language]; /* Email Address */?></span><br>
                                                    <label style="color: #059607;">bch168@yahoo.com</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="m-t-rem1">    
                                                    <span><?php echo $translations['A00171'][$language]; /* Mobile Number */?></span><br>
                                                    <label style="color: #059607;">0111234556</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="m-t-rem1">
                                                    <span><?php echo $translations['A00217'][$language]; /* Package Name */?></span><br>
                                                    <label style="color: #059607;">BCH500</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="m-t-rem1">    
                                                    <span><?php echo $translations['A01091'][$language]; /* Package Price */?></span><br>
                                                    <label style="color: #059607;">$600.00</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="m-t-rem1">    
                                                    <span><?php echo $translations['A00206'][$language]; /* Bonus Value */?></span><br>
                                                    <label style="color: #059607;">600</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="m-t-rem1">    
                                                    <span><?php echo $translations['A01093'][$language]; /* Contract Length (Month) */?></span><br>
                                                    <label style="color: #059607;">6</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="m-t-rem1">    
                                                    <span><?php echo $translations['A00627'][$language]; /* Quantity */?></span><br>
                                                    <label style="color: #059607;">6</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="m-t-rem1">    
                                                    <span><?php echo $translations['A00629'][$language]; /* Total Price */?></span><br>
                                                    <label style="color: #059607;">6</label>
                                                </div>
                                            </div>

                                            <a href="members.php" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20 m-t-rem3"><?php echo $translations['A00115'][$language]; /* Back */?></a>

                                        </div>
                                    </div>
                                </form>
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

</script>
</body>
</html>
