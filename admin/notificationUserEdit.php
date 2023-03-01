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
                            <?php echo $translations['A00126'][$language]; /* Back */ ?>
                        </a>
                    </div><!-- end col -->
                </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <h4 class="header-title m-t-0 m-b-30">
                                    <?php echo $translations['A01203'][$language]; /* Edit Notification Admin User */ ?>
                                </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form id="editUser" role="form" data-parsley-validate novalidate>
                                            <div class="form-group" hidden>
                                                <label>
                                                    <?php echo $translations['A00128'][$language]; /* ID */ ?>
                                                </label>
                                                <input id="id" type="text" class="form-control" disabled  required/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    <?php echo $translations['A00101'][$language]; /* Name */ ?>
                                                </label>
                                                <input id="name" type="text" class="form-control" value="<?php echo $_POST['name'] ?>" disabled/>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A01200'][$language]; /* Dial Code */ ?>
                                                </label>
                                                <select id="phoneCountry" class="form-control" disabled>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">
                                                    <?php echo $translations['A01196'][$language]; /* Phone */ ?>
                                                </label>
                                                <input id="phone" type="text" class="form-control" value="" disabled/>
                                                <!-- <div class="input-group">
                                                    <input id="phoneDialing" type="text" class="form-control" required="" disabled>

                                                    <span class="input-group-addon">-</span>

                                                    <input id="phone" type="text" class="form-control" maxlength="15" required="" disabled>
                                                </div> -->
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                    <?php echo $translations['A00318'][$language]; /* Status */ ?>
                                                </label>
                                                <select id="statusBox" class="form-control">
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-b-20">
                            <!-- <button type="submit" class="btn btn-default waves-effect waves-light">Cancel</button> -->
                            <button id="edit" type="submit" class="btn btn-primary waves-effect waves-light">
                                <?php echo $translations['A00134'][$language]; /* Confirm */ ?>
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
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;

    var fCallback      = "";
    $(document).ready(function() {
        
        var phone = "<?php echo $_POST['phoneNumber'] ?>";
        var status = "<?php echo $_POST['status'] ?>";
        // alert(phone);
        // var phoneDialing = phone.substring(0, 3);
        // var phoneNumber = phone.substring(3, 12);
        // $("#phoneDialing").val(phoneDialing);
        $("#phone").val(phone);

        // alert(status);
        if(status == "on"){
            $("#statusBox").append('<option id="statusOn" value="on" selected>On</option><option id="statusOff" value="off">Off</option>');
        }else if(status == "off"){
            $("#statusBox").append('<option id="statusOn" value="on">On</option><option id="statusOff" value="off" selected>Off</option>');
        }

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
                var d = "<?php echo $_POST['dial'] ?>";
                if(countriesList[key]['countryCode'] == d){
                    $('#phoneCountry').append('<option id="'+countriesList[key]['id']+'" value="'+countriesList[key]['countryCode']+'" name="'+countriesList[key]['name']+'" selected>'+countriesList[key]['name']+' +'+countriesList[key]['countryCode']+'</option>');
                }else{
                    $('#phoneCountry').append('<option id="'+countriesList[key]['id']+'" value="'+countriesList[key]['countryCode']+'" name="'+countriesList[key]['name']+'">'+countriesList[key]['name']+' +'+countriesList[key]['countryCode']+'</option>');
                }
                
            });
        }
    };

    $('#edit').click(function() {
        showCanvas();
        var id = "<?php echo $_POST['id'] ?>";
        var status   = $('#statusBox').find('option:selected').val();
        
        var formData = {
            command  : "updateNotificationUser",
            id : id,
            status : status
        };
        console.log(formData);
        var fCallback = sendEdit;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }); 

    
    function sendEdit(data, message) {
        showMessage('<?php echo $translations['A01204'][$language]; /* Successful updated user info */ ?>', 'success', '<?php echo $translations['A01203'][$language]; /* Edit Notification Admin User */ ?>', 'address-card', 'notificationUserList.php');
    }
</script>
</body>
</html>
