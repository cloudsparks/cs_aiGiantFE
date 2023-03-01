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
                                         <?php echo $translations['A01237'][$language]; /* Set Leader */ ?>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="" class="text-center alert" style="display: none;"></div>
                                                <div class="col-sm-12">
                                                  <!-- <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A00952'][$language]; /* Type */ ?> <span class="text-danger">*</span></label>
                                                        <select id="type" class="form-control">
                                                           <option value="add"><?php echo $translations['A01238'][$language]; /* Add */ ?></option>
                                                            <option value="remove"><?php echo $translations['A01239'][$language]; /* Remove */ ?></option>
                                                        </select>
                                                    </div> -->
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A00102'][$language]; /* Username */ ?> <span class="text-danger">*</span></label>
                                                        <input id="username" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                 <div class="col-sm-12">
                                                    <div class="col-xs-12 col-sm-12">
                                                        <a id ="updateBtn" href="#" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-15 m-t-3" onclick=""><?php echo $translations['A00361'][$language]; /* Add */?></a>
                                                    </div>
                                                </div>
                                                 <div class="col-sm-12 px-0" style="margin-top: 30px">
                                                    <div id="basicwizard" class="pull-in">
                                                    <div class="tab-content b-0 m-b-0 p-t-0 m-l-15">
                                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                                    <div id="listingDiv" class="table-responsive"></div>
                                                            <span id="paginateText"></span>
                                                    <!-- <div class="text-center">
                                                        <ul class="pagination pagination-md" id="listingPager"></ul>
                                                    
                                                    </div> -->
                                                    </div>
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
    
    var divId    = 'listingDiv';
    var tableId  = 'listingTable';
    var pagerId  = 'listingPager';
    var btnArray = {};
    var thArray  = Array (
             '<?php echo $translations['A00137'][$language]; /* Date */ ?>',
             '<?php echo $translations['A00148'][$language]; /* Member ID */ ?>',
             '<?php echo $translations['A00149'][$language]; /* Member Username */ ?>',
             '<?php echo $translations['A00153'][$language]; /* country */ ?>',
             '<?php echo $translations['A01711'][$language]; /* set by */ ?>',
            );

    $(document).ready(function() {

        var formData = {
            command  : "getLeaderList",
        };
        // /console.log(formData);
        var fCallback = loadLeaderListing;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
       
  });

     $('#updateBtn').click(function() {
        
        var type   = $('#type').find('option:selected').val();
        var username = $('#username').val(); 
        
        var formData = {
            command  : "setLeader",
            type : type,
            username : username
        };
        // /console.log(formData);
        var fCallback = updateLeader;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
     });

   function loadLeaderListing(data, message) {
           // console.log(data);
        var tableNo;
        if (data != "" && data.length > 0) {
        var newList = [];
        var j = 0;
            $.each(data, function (k, v) {
               
                var rebuildData = {
                  
                    updated_at          : v['updated_at'],
                    member_id           :v['member_id'],
                    username            : v['username'],
                    country_name_Display : v["country_name_Display"],   
                    authorisedBy        : v['authorisedBy'],  
                           
                };
                ++j;
                newList.push(rebuildData);
            });
         }
   
         buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
         pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);      

    
  }
    
    function updateLeader (data, message) {
       // console.log(data);
        showMessage('<?php echo $translations['A01240'][$language]; /* Successfully update leader */ ?>', 'success', '<?php echo $translations['A01237'][$language]; /* Set Leader */ ?>', 'edit', 'setLeader.php');
    } 

</script>
</body>
</html>
