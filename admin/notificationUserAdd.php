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
                         <a href="notificationUserList.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </a>
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <h4 class="header-title m-t-0 m-b-30">
                                <?php echo $translations['A00116'][$language]; /* User Profile */ ?>
                            </h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form" id="newUser" data-parsley-validate novalidate>
                                        <div id="basicwizard" class=" pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                    </label>
                                                    <input id="name" type="text" class="form-control" value=""  required/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A01200'][$language]; /* Dial Code */ ?>
                                                    </label>
                                                    <select id="phoneCountry" class="form-control" value="<?php echo $_POST['name'] ?>" >
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        <?php echo $translations['A01196'][$language]; /* Phone */ ?>
                                                    </label>
                                                    <input id="phone" type="text" class="form-control" maxlength="11" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required/>
                                                    <!-- <div class="input-group">
                                                        <input id="phoneDialing" type="text" class="form-control" required="">

                                                        <span class="input-group-addon">-</span>

                                                        <input id="phone" type="text" class="form-control" maxlength="15" required="">
                                                    </div> -->
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
                        <button id="add" type="submit" class="btn btn-primary waves-effect waves-light">
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
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
        
    var fCallback;
    $(document).ready(function() {
        var formData  = {
            command   : "getRegistrationDetailAdmin",
        };
        var fCallback = registerDetails;
        ajaxSend("scripts/reqClient.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });
    
    function registerDetails(data, message) {
        var countriesList = data.countriesList;

        if(countriesList) {
            $.each(countriesList, function(key) {
                $('#phoneCountry').append('<option id="'+countriesList[key]['id']+'" value="'+countriesList[key]['countryCode']+'" name="'+countriesList[key]['name']+'">'+countriesList[key]['name']+' +'+countriesList[key]['countryCode']+'</option>');
            });
        }
    };

    $('#add').click(function() {
        var validate = $('#newUser').parsley().validate();
        if(validate) {
            showCanvas();
            var name = $('#name').val();
            var phoneCountry   = $('#phoneCountry').find('option:selected').val();
            var phoneDialing    = $('#phoneDialing').val();
            var phone = $('#phone').val();
            
            var formData = {
                command  : "addNotificationUser",
                name : name,
                dialCode : phoneCountry,
                phone    : phone
            };
            console.log(formData);
            var fCallback = sendNew;

            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    });
    
    function sendNew(data, message) {
        showMessage('<?php echo $translations['A01201'][$language]; /* Successful created new notification user */ ?>', 'success', '<?php echo $translations['A01202'][$language]; /* Create New Notification User */ ?>', 'user-plus', 'notificationUserList.php');
    }
</script>
</body>
</html>
