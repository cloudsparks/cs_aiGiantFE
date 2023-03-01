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
                        <a href="adminRolesList.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i><?php echo $translations['A00115'][$language]; /* Back */ ?></a>
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box m-b-30">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#roleInfo"><?php echo $translations['A00998'][$language]; /* Role Details */ ?></a></li>
                                <li class=""><a data-toggle="tab" href="#rolePermissionsTab" id="rolePermissionsTab"><?php echo $translations['A00999'][$language]; /* Role Permissions */ ?></a></li>
                            </ul>
                            <div class="tab-content m-b-30">
                                <div id="roleInfo" class="tab-pane fade in active">
                                    <form role="form" id="editRole" data-parsley-validate novalidate>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div id="basicwizard" class=" pull-in">
                                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                                        <div id="editRoleMsg" class="alert" style="display: none;"></div>
                                                        <div class="form-group" hidden>
                                                            <label for=""><?php echo $translations['A01000'][$language]; /* ID */ ?></label>
                                                            <input id="id" type="text" class="form-control" disabled/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for=""><?php echo $translations['A00110'][$language]; /* Role Name */ ?>*</label>
                                                            <input id="roleName" type="text" class="form-control"  required/>
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <label for="">Description</label>
                                                            <input id="description" type="text" class="form-control"  required/>
                                                        </div> -->
                                                        <div class="form-group">
                                                            <label for=""><?php echo $translations['A00145'][$language]; /* Description */ ?></label>
                                                            <textarea rows="4" cols="50" class="form-control" id="description" name="description"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label"><?php echo $translations['A00318'][$language]; /* Status */ ?></label>
                                                            <div id="status" class="m-b-20">
                                                                <div class="radio radio-info radio-inline">
                                                                    <input type="radio" id="inlineRadio1" value="0" name="radioInline"/>
                                                                    <label for="inlineRadio1"> <?php echo $translations['A00372'][$language]; /* Active */ ?> </label>
                                                                </div>
                                                                <div class="radio radio-inline">
                                                                    <input type="radio" id="inlineRadio2" value="1" name="radioInline"/>
                                                                    <label for="inlineRadio2"> <?php echo $translations['A00104'][$language]; /* Disabled */ ?> </label>
                                                                </div>
                                                            </div>
                                                        </div>
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
                        <button id="editRoleBtn" type="submit" class="btn btn-primary waves-effect waves-light"><?php echo $translations['A01006'][$language]; /* Save */ ?></button>
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
    var url = 'scripts/reqAdmin.php';
    var method = 'POST';
    var debug = 1;
    var bypassBlocking = 0;
    var bypassLoading = 0;

    var id = "<?php echo $_POST['id']; ?>";

    var fCallback = "";
    $(document).ready(function() {
        showCanvas();
        var editId = id;
        if(editId != '') {
            var formData = {
                'command': 'getRoleDetails',
                'editId' : editId
            };
            fCallback = loadEdit
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        $('#editRoleBtn').click(function() {
            var validate = $('#editRole').parsley().validate();
            if(validate) {
                var roleID = $('input#id').val();
                var roleName = $('input#roleName').val();
                var description = $('textarea#description').val();
                var status = $('#status').find('input[type=radio]:checked').val();

                var formData = {
                    command : 'editRole',
                    roleID : roleID,
                    roleName : roleName,
                    description : description,
                    status : status
                };
                fCallback = sendEdit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        });

        //Call the API Parameters Tab.
        $('#rolePermissionsTab').click(function() {
            $.redirect('adminEditRolePermission.php', {id : id});
        });
    });

    function loadEdit(data, message) {
        $.each(data.roleDetails, function(key, val) {
            if(key == 'status') {
                $('#'+key).find('input[value="'+val+'"]').attr('checked', 'checked');
            }
            else {
                $('#'+key).val(val);
            }
        });
    }

    function sendEdit(data, message) {
        showMessage('Role data successfully updated.', 'success', 'Edit role', 'user', 'adminRolesList.php');
    }
</script>
</body>
</html>