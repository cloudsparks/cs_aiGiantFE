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
                                        <?php echo $translations['A01233'][$language]; /*CZO Swap*/ ?>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body" id="swapForm">
                                            <div id="" class="text-center alert" style="display: none;"></div>
                                                <div class="col-sm-12">
                                                  <div class="col-sm-8 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A01229'][$language]; /*Buy Volume*/ ?> <span class="text-danger">*</span></label>
                                                        <input id="buyVolume" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                                    </div>
                                                    <div class="col-sm-8 form-group">
                                                        <label class="control-label" for="" data-th=""><?php echo $translations['A01230'][$language]; /*Sell Volume*/ ?> <span class="text-danger">*</span></label>
                                                        <input id="sellVolume" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                                    </div>
                                                    <div class="col-sm-8 form-group m-t-rem4">
                                                        <label class="control-label" for="" data-th=""><?php echo $translations['A01231'][$language]; /*Buy Percentage*/ ?><span class="text-danger">*</span></label>
                                                         <input id="buyPercentage" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                                    </div>
                                                     <div class="col-sm-8 form-group">
                                                        <label class="control-label" for="" data-th=""><?php echo $translations['A01232'][$language]; /*Sell Percentage*/ ?><span class="text-danger">*</span></label>
                                                         <input id="sellPercentage" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
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
    var debug          = 1;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var fCallback      = "";
    
    $(document).ready(function() {

    var formData = {
            command  : "getTrendSetting",
        };
        // /console.log(formData);
        var fCallback = loadTrendData;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

  });

    $('#updateBtn').click(function() {
        
        var buy_volume = $('#buyVolume').val();
        var sell_volume = $('#sellVolume').val(); 
        var buy_percentage = $('#buyPercentage').val(); 
        var sell_percentage = $('#sellPercentage').val(); 
        
        var formData = {
            command  : "setTrendSetting",
            buy_volume : buy_volume,
            sell_volume : sell_volume,
            buy_percentage : buy_percentage,
            sell_percentage : sell_percentage
        };
        // /console.log(formData);
        var fCallback = swapSuccess;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
      
      });

     $('#resetBtn').click(function() {
            $('#swapForm').find('input').each(function() {
               $(this).val(''); 
            });
      });

     $('#buyVolume, #sellVolume, #buyPercentage, #sellPercentage ').on('input', function() {
            this.value = this.value
                .replace(/[^\d.]/g, '')             // numbers and decimals only
                .replace(/(^[\d]{5})[\d]/g, '$1')   // not more than 2 digits at the beginning
                // .replace(/(\..*)\./g, '$1')         // decimal can't exist more than once
                .replace(/(\.[\d]{2})./g, '$1');    // not more than 4 digits after decimal
       });

    function loadTrendData (data, message){
      console.log(data); 
      $('#buyVolume').val(parseFloat(data.buy_volume).toFixed(2));
      $('#sellVolume').val(parseFloat(data.sell_volume).toFixed(2));
      $('#buyPercentage').val(parseFloat(data.buy_percentage).toFixed(2));
      $('#sellPercentage').val(parseFloat(data.sell_percentage).toFixed(2));
    }

    function swapSuccess (data, message) {
       // console.log(data);
        showMessage('<?php echo $translations['A01234'][$language]; /* Swap Successful */?>', 'success', '<?php echo $translations['A01235'][$language]; /* Update Swap Settings */?>', 'edit', 'czoPriceSettings.php');
    } 

</script>
</body>
</html>
