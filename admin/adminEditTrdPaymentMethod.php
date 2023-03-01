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
                        <a href="trdPaymentMethod.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i><?php echo $translations['A00115'][$language]; /* Back */ ?></a>
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-2">
                            <ul id="paymentMethodTab" class="nav nav-tabs">
                               <!--  <li class="active"><a data-toggle="tab" href="#roleInfo">Role Details</a></li>
                                <li class=""><a data-toggle="tab" href="#rolePermissionsTab" id="rolePermissionsTab">Role Permissions</a></li> -->
                            </ul>
                            <div id="tabDetails" class="tab-content m-b-30">
                                <div id="roleInfo" class="tab-pane fade in active">
                                    <form role="form" id="editPayment" data-parsley-validate novalidate>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div id="basicwizard" class=" pull-in">
                                                    <div id="tabContent" class="tab-content b-0 m-b-0 p-t-0">
                                                        <!-- <div id="editRoleMsg" class="alert" style="display: none;"></div> -->
                                                        
                                                    </div>
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
                        <button id="editPaymentBtn" type="submit" class="btn btn-primary waves-effect waves-light"><?php echo $translations['A01006'][$language]; /* Save */ ?></button>
                    </div>
                </div>
                <!-- end row -->

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
    var url = 'scripts/reqTrade.php';
    var method = 'POST';
    var debug = 1;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var details = [];
    var fCallback = "";
    $(document).ready(function() {
        showCanvas();
        var clientID = "<?php echo $_POST['id']; ?>";

        if(clientID != '') {
            var formData = {
                'command': 'getTrdPaymentMethod',
                'clientID' : clientID
            };

            fCallback = loadFormEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        $('#editPaymentBtn').click(function() {
            var paymentMethodID = "";
            var paymentMethodType = "";
            var paymentMethodData = {};
            var validate = $('#editPayment').parsley().validate();
            if(validate) {
                $("#paymentMethodTab li").each(function(){
                    if($(this).hasClass("active")){
                        paymentMethodType = $(this).attr("name");
                        paymentMethodID = $(this).attr("id");
                    }
                });

                $("#tabContent div").each(function(){
                    var name = $(this).find('input').attr('id');
                    var value = $(this).find('input').val();

                    paymentMethodData[name] = value;
                });

                var formData = {
                    command : 'verifyPaymentMethod',
                    clientID : clientID,
                    paymentMethodID : paymentMethodID,
                    paymentMethodType : paymentMethodType,
                    paymentMethodData : paymentMethodData,
                };

                fCallback = sendEdit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });

    function loadFormEdit(data, message){
        $("ul#paymentMethodTab").empty();
        var paymentMethod = data.paymentMethod;
        var paymentTabString = "";
        
        $.each(paymentMethod, function(key, val){
            if(key == 0){
                paymentTabString += '<li id="'+val.id+'" name="'+val.name+'" class="active"><a id="'+val.name+'" data-toggle="tab" href="#'+val.name+'" onclick="tabClick(this.id);">'+val.display+'</a></li>';
            }else{
                paymentTabString += '<li id="'+val.id+'" name="'+val.name+'" class=""><a id="'+val.name+'" data-toggle="tab" href="#'+val.name+'" onclick="tabClick(this.id);">'+val.display+'</a></li>';
            }

            details[val.name] = val.input;
         });
        $("ul#paymentMethodTab").append(paymentTabString);

        // build default active tab
        $('#tabContent').empty();
        var activeTab = $("#paymentMethodTab").find('li.active a').attr('id');
        var defaultString = "";
        $.each(details[activeTab], function(key,val){
            if(val.value != ""){
                defaultString += '<div class="form-group"><label for="">'+val.display+'</label><input id="'+val.name+'" type="text" class="form-control" value="'+val.value+'"><span id="'+val.name+'Error" class="customError text-danger"></span></div>';
            }else{
                defaultString += '<div class="form-group"><label for="">'+val.display+'</label><input id="'+val.name+'" type="text" class="form-control" value=""><span id="'+val.name+'Error" class="customError text-danger"></span></div>';
            }
        });
        $('#tabContent').append(defaultString);
    }

    function tabClick(method){
        $("#paymentMethodTab").find("li").removeClass("active");
        $("#paymentMethodTab").find("li[name="+method+"]").addClass("active");

        var tabDetailString = "";
        var methodData = details[method];
        $('#tabContent').empty();
        $.each(methodData, function(key,val){
            if(val.value != ""){
                tabDetailString += '<div class="form-group"><label for="">'+val.display+'</label><input id="'+val.name+'" type="text" class="form-control" value="'+val.value+'"></div>';
            }else{
                tabDetailString += '<div class="form-group"><label for="">'+val.display+'</label><input id="'+val.name+'" type="text" class="form-control" value=""></div>';
            }
        });
        $('#tabContent').append(tabDetailString);
    }

    function sendEdit(data, message) {
        showMessage('Trade payment method data successfully updated.', 'success', 'Edit Payment Method', 'user', 'trdPaymentMethod.php');
    }
</script>
</body>
</html>