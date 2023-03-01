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

                <div class="row">
                    <div class="col-sm-4">
                         <a href="setStake.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </a>
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <!-- <h4 class="header-title m-t-0 m-b-30">
                                <?php echo $translations['A00116'][$language]; /* User Profile */ ?>
                            </h4> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form" id="newAdmin" data-parsley-validate novalidate>
                                        <div id="basicwizard" class=" pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A00301'][$language]; /* Type */ ?>
                                                    </label>
                                                    <input id="type" type="text" class="form-control"  disabled/>
                                                    <span id="typeError" class="customError text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                    </label>
                                                    <input id="username" type="text" class="form-control"  disabled/>
                                                    <span id="usernameError" class="customError text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A01207'][$language]; /* min stake */ ?>
                                                    </label>
                                                    <input id="minStake" type="text" class="form-control"  />
                                                    <span id="minStakeError" class="customError text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A01208'][$language]; /* max stake */ ?>
                                                    </label>
                                                    <input id="maxStake" type="text" class="form-control"  />
                                                    <span id="maxStakeError" class="customError text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                    </label>
                                                    <select id="status" class="form-control" dataName="status" dataType="select" required>
                                                        <option value="Active">
                                                            <?php echo $translations['A00395'][$language]; /* Active */ ?>
                                                        </option>
                                                        <option value="Inactive">
                                                            <?php echo $translations['A00373'][$language]; /* Inactive */ ?>
                                                        </option>
                                                        <option value="Deleted">
                                                            <?php echo $translations['A00374'][$language]; /* Deleted */ ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 m-b-20">
                            <!-- <button type="submit" class="btn btn-default waves-effect waves-light">Cancel</button> -->
                        <button id="updateBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                            <?php echo $translations['A00123'][$language]; /* Confirm */ ?>
                        </button>
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
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
        
    var fCallback;
    $(document).ready(function() {
        var id = '<?php echo $_POST['id']; ?>';

        var searchData = [{dataName:"id",dataValue:id}];
        var formData = {
            command        : "getStakeLimitList",
            searchData     : searchData,
        };
        fCallback = loadDefaultData;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        

        $('#updateBtn').click(function() {
            var country   = '';
            var clientUsername = ''; 
            var leaderUsername = '';
            var type = $('#type').val();
            if(type == "Country"){
                country = $('#username').val();
            }else if (type == "Leader"){
                leaderUsername = $('#username').val();
            }else{
                clientUsername = $('#username').val();
            }

            var minStake = $('#minStake').val(); 
            var maxStake = $('#maxStake').val(); 
            var status = $('#status').val(); 
             
            
            var formData = {
                command  : "updateStakeLimit",
                country : country,
                clientUsername : clientUsername,
                minStake : minStake,
                maxStake : maxStake,
                leaderUsername : leaderUsername,
                status : status
            };
            console.log(formData);
            var fCallback = updateStakeSuccess;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });
    });
    
    function loadDefaultData(data, message) {
        data = data.stakeLimitLsting;
        $('#type').val(data[0]['type']); 
        $('#minStake').val(Math.trunc(data[0]['min_stake'])); 
        $('#maxStake').val(Math.trunc(data[0]['max_stake'])); 
        $('#status').val(data[0]['status']); 
        $('#username').val(data[0]['username']); 

    }
    
    function updateStakeSuccess (data, message) {
       // console.log(data);
        showMessage('<?php echo $translations['A01209'][$language]; /* successfully update stake */?>', 'success', '<?php echo $translations['A01210'][$language]; /* update stake */?>', 'edit', 'setStake.php');
    } 
    
</script>
</body>
</html>
