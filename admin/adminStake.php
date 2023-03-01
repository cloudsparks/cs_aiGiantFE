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

                        <div class="col-lg-12 col-md-12">

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                        <?php echo $translations['A01228'][$language]; /* Username */ ?>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body" id="stakeForm">
                                            <div id="" class="text-center alert" style="display: none;"></div>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-8 form-group">
                                                        <label class="control-label" for="" data-th=""><?php echo $translations['A00102'][$language]; /* Username */ ?><span class="text-danger">*</span></label>
                                                        <input id="username" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-8 form-group">
                                                        <label class="control-label" for="" data-th=""><?php echo $translations['A00821'][$language]; /* Amount */?><span class="text-danger">*</span></label>
                                                        <input id="amount" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                                    </div>
                                                </div>

                                                 <div class="col-sm-12">
                                                    <div class="col-xs-12 col-sm-12">
                                                        <a id ="updateBtn" href="#" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20 m-t-rem3" onclick=""><?php echo $translations['A00300'][$language]; /* Update */?></a>
                                                         <a id="resetBtn" type="button" class="btn btn-default waves-effect waves-effect w-md waves-light m-b-20 m-t-rem3">
                                                         <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                                        </a>
                                                    </div>
                                                </div>                                            
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

    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var fCallback      = "";
    
    $(document).ready(function() {

     $('#updateBtn').click(function() {
        
        var username = $('#username').val();
        var amount = $('#amount').val()
        
        var formData = {
            command  : "startStake",
            username : username,
            amount : amount
        };
        // /console.log(formData);
        var fCallback = updateStakeSuccess;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

      $('#resetBtn').click(function() {
            $('#stakeForm').find('input').each(function() {
               $(this).val(''); 
            });
      });
    
    });
   

    function updateStakeSuccess (data, message) {
       // console.log(data);
        showMessage('<?php echo $translations['A01209'][$language]; /* successfully update stake */?>', 'success', '<?php echo $translations['A01210'][$language]; /* update stake */?>', 'edit', 'adminStake.php');
    } 

</script>
</body>
</html>
