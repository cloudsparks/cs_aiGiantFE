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
                         <a href="admin.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <h4 class="header-title m-t-0 m-b-30">New Bonus</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <form role="form" id="newAdmin" data-parsley-validate novalidate>
                                        <div id="basicwizard" class=" pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div class="form-group" hidden>
                                                <label for="">ID*</label>
                                                <input id="id" type="text" class="form-control" disabled/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Bonus Name*</label>
                                                <input id="name" type="text" class="form-control" required/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Bonus Source</label>
                                                <input id="bonus_source" type="text" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="">Calculation</label>
                                                <input id="calculation" type="text" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="">Calculation Start*</label>
                                                <input id="calculation_start" type="text" class="form-control" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="">Payment*</label>
                                                <input id="payment" type="text" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label class="">Payment Start*</label>
                                                <input id="payment_start" type="text" class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="">Priority*</label>
                                                <input id="priority" type="text" class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="">Allowed Rank Maintain*</label>
                                                <input id="allow_rank_maintain" type="text" class="form-control" required/>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Disabled*</label>
                                                <div id="disabled" class="m-b-20">
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio1" value="0" name="radioInline"/>
                                                        <label for="inlineRadio1"> No </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="inlineRadio2" value="1" name="radioInline" required/>
                                                        <label for="inlineRadio2"> Yes </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="">Language Code*</label>
                                                <input id="languageCode" type="text" class="form-control" />
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
                        <button id="add" type="submit" class="btn btn-primary waves-effect waves-light">Confirm</button>
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
    var url = 'scripts/reqBonus.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
        
    // var fCallback = loadFormDropdown;
    $(document).ready(function() {
        
        $('#add').click(function() {
            var validate = $('#newAdmin').parsley().validate();

            if(validate) {
                showCanvas();
                var name = $('input#name').val();
                var bonus_source = $('input#bonus_source').val();
                var calculation = $('input#calculation').val();
                var calculation_start = $('input#calculation_start').val();
                var payment = $('input#payment').val();
                var payment_start = $('input#payment_start').val();
                var priority = $('input#priority').val();
                var allow_rank_maintain = $('input#allow_rank_maintain').val();
                var disabled = $('#disabled').find('input[type=radio]:checked').val();
                var languageCode = $('input#languageCode').val();
                var file_path = $('input#file_path').val();
                var tableName = $('input#tableName').val();
                
                var formData = {
                    'command' : "addBonusSetting",
                    'name'   : name,
                    'bonus_source'   : bonus_source,
                    'calculation'  : calculation,
                    'calculation_start' : calculation_start,
                    'payment' : payment,
                    'payment_start' : payment_start,
                    'priority' : priority,
                    'allow_rank_maintain' : allow_rank_maintain,
                    'disabled' : disabled,
                    'languageCode' : languageCode,
                    'file_path' : file_path,
                    'tableName' : tableName
                };
                var fCallback = sendNew;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });
    });
    
    function sendNew(data, message) {
        showMessage('Bonus Settings successfully updated.', 'success', 'Edit Bonus Setting', 'admin', 'bonusSettings.php');
    }
</script>
</body>
</html>
