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
                         <a href="role.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                    </div><!-- end col -->
                </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <ul class="nav nav-tabs">
                                    <li><a id="roleInfo">Role Details</a></li>
                                    <li class="active"><a data-toggle="tab" href="#rolePermissions">Role Permissions</a></li>
                                </ul>
                                <div class="tab-content m-b-30">
                                    <div id="rolePermissions" class="tab-pane fade in active">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <form role="form" id="editRolePermission">
                                                    <div class="row">
                                                        <div class="form-group form-horizontal">
                                                            <label class="col-md-2 control-label">Role Name :</label>
                                                            <div class="col-md-3">
                                                                <!-- <span class="col-md-3 control-label textAlign" id="roleName"></span> -->
                                                                <select id="roleName" class="form-control" disabled="disabled">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                    <!-- <div class="form-group">
                                                        <label for="">Role Name</label>
                                                        <select id="roleName" class="form-control" name="roleName" disabled="disabled">
                                                            <option>--Please Select--</option>
                                                        </select>
                                                    </div> -->
                                                        <input type="hidden" class="form-control" value="editRolePermission" name="command">
                                                        <input type="hidden" class="form-control" value="" name="roleName">
                                                        <div class="form-group">
                                                            <div class="col-sm-offset-0 col-sm-5" id="permissionsList">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-b-20">
                            <button id="editNewPermission" type="submit" class="btn btn-primary waves-effect waves-light">Confirm</button>
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
    var url            = 'scripts/reqPermission.php';
    var method         = 'POST';
    var debug          = 1;
    var bypassBlocking = 0;
    var bypassLoading  = 0;

    var id = "<?php echo $_POST['id']; ?>";

    $(document).ready(function() {
        $('input[name="roleName"]').val(id);

        var formData  = {
            'command' : "getPermissions",
            'roleID' : id
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#editNewPermission').click(function() {
            var formData = $('#editRolePermission').serialize();
            var fCallback = sendEdit;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#roleInfo').click(function() {
            $.redirect('editRole.php', {id : id});
        });
    });

    function loadDefaultListing(data, message) {
        if(data.roleList) {
            $('#roleName').empty();
            $.each(data.roleList, function(key, val) {
                $('#roleName').append('<option value="'+val['id']+'">'+val['name']+'</option>');
            });
        }

        if(data.permissionList) {
            $.each(data.permissionList, function(key, val) {
                var parentID       = val['parent_id'];
                var permissionName = val['name'];
                var permissionID   = val['id'];

                if(parentID == 0) {
                    var mainMenu = '<div class="checkbox checkbox-primary">'+
                                        '<input id="'+permissionID+'" parentID="'+parentID+'" type="checkbox" name="permissions[]" value="'+permissionID+'">'+
                                        '<label for="checkbox2">'+
                                            permissionName
                                        '</label>'+
                                    '</div>';
                    $('#permissionsList').append(mainMenu);
                }

                if(parentID != 0) {
                    var childMenu = '<div class="checkbox checkbox-primary">'+
                                        '<input id="'+permissionID+'" parentID="'+parentID+'" type="checkbox" name="permissions[]" value="'+permissionID+'">'+
                                        '<label for="checkbox2">'+
                                            permissionName
                                        '</label>'+
                                    '</div>';
                    $('#'+parentID).closest('div').append(childMenu);
                }
            });

            $('input[type="checkbox"]').change(function() {
                if(this.checked === true) {
                    $('#'+$(this).attr('parentID')).prop('checked', this.checked);

                    if($('#'+$(this).attr('parentID')).attr('parentID') != 0) {
                        $('#'+$('#'+$(this).attr('parentID')).attr('parentID')).prop('checked', this.checked);
                    }
                }

                $('input[parentID="'+this.id+'"]').prop('checked', this.checked);
            });
        }

        if(data.rolePermissionList) {
            $.each(data.rolePermissionList, function(key, val) {
                $('#'+val['permission_id']).prop('checked', true);
            });
        }
    }

    // Submit the Edit Form.
    function sendEdit(data, message) {
        showMessage('Role Permission successfully updated.', 'success', 'Role Permission', 'RolePermission', 'role.php');
    }

    //For capturing the parameter from the URL.
    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null){
           return null;
        }
        else{
           return decodeURI(results[1]) || 0;
        }
    }
</script>
</html>