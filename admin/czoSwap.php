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
                                       <div id="buildOnOff" style="float: right; position: relative;top: -43px; display: flex">
                                        <!--   <label style="top:23px;position: relative; left:-10px">On/Off</label>
                                          <input class="tgl tgl-flat" id="switchOnOff" name="" type="checkbox"> 
                                          <label class="tgl-btn tgl-mobile" for="switchOnOff"></label> -->
                                      </div>
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
                                                <!--     <div class="col-sm-8 form-group">
                                                        <label class="control-label col-sm-12" for="switch" style="padding-left: unset">On / Off</label>
                                                          <label class="switch">
                                                              <input type="checkbox" id="switchOnOff">
                                                              <span class="slider round"></span>
                                                          </label>
                                                    </div> -->
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
                .replace(/(^[\d]{5})[\d]/g, '$1')   // not more than 5 digits before decimals
                // .replace(/(\..*)\./g, '$1')         // decimal can't exist more than once
                .replace(/(\.[\d]{8})./g, '$1');    // not more than 2 digits on decimals
       });

     $("body").on('change', '#switchOnOff' ,function() {
        
        var status;
        // alert(status);

        if ($(this).is(":checked")) {
            status = "On";
            // alert(status);
        } else {
            status = "Off";
            // alert(status);
        }

        var formData = {
            command: 'freezeTrendSetting',
            switch : status
        };
        // console.log(formData);
        fCallback = OnOffCzoSwap;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function OnOffCzoSwap (data, message){
      // console.log(message);
      showMessage(message, 'success', '', 'edit', 'czoSwap.php');
    }

    function loadTrendData (data, message){
      console.log(data);
     
      var switchCheckBox = "";

      if (data.switch == "On") {
          switchCheckBox += '<label style="top:23px;position: relative; left:-10px">On/Off</label><input class="tgl tgl-flat" id="switchOnOff" name="" type="checkbox" checked><label class="tgl-btn tgl-mobile" for="switchOnOff"></label>';
      }else if (data.switch == "Off"){
          switchCheckBox += '<label style="top:23px;position: relative; left:-10px">On/Off</label><input class="tgl tgl-flat" id="switchOnOff" name="" type="checkbox"><label class="tgl-btn tgl-mobile" for="switchOnOff"></label>';
      }

      $("#buildOnOff").append(switchCheckBox);

      $('#buyVolume').val(parseFloat(data.buy_volume).toFixed(8));
      $('#sellVolume').val(parseFloat(data.sell_volume).toFixed(8));
      $('#buyPercentage').val(parseFloat(data.buy_percentage).toFixed(8));
      $('#sellPercentage').val(parseFloat(data.sell_percentage).toFixed(8));
    }

    function swapSuccess (data, message) {
       // console.log(data);
        showMessage('<?php echo $translations['A01234'][$language]; /* Swap Successful */?>', 'success', '<?php echo $translations['A01235'][$language]; /* Update Swap Settings */?>', 'edit', 'czoSwap.php');
    } 

</script>
</body>
</html>
