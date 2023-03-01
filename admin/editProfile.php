<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    // $_SESSION['lastVisited'] = $thisPage;
?>
<!DOCTYPE html>
<html>
<?php include 'headDashboard.php'; ?>
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
                        <div class="col-lg-3 col-md-3 visible-xs visible-sm">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapse"><?php echo $translations['A00280'][$language]; /* Menu */?>
                                            </a>
                                        </h4>
                                    </div>

                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="m-b-rem1 menuActive active">
                                                <a><?php echo $translations['A01102'][$language]; /* Edit Profile */?> :</a>
                                            </div>
                                            <div class="m-b-rem1 menuActive">
                                                <a><?php echo $translations['A00282'][$language]; /* Password Maintain */?></a>
                                            </div>
                                            <div class="m-b-rem1 menuActive">
                                                <a><?php echo $translations['A01104'][$language]; /* Referral Diagram */?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 hidden-xs hidden-sm">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <?php echo $translations['A00280'][$language]; /* Menu */?>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="m-b-rem1 menuActive active">
                                                <a><?php echo $translations['A01102'][$language]; /* Edit Profile */?></a>
                                            </div>
                                            <div class="m-b-rem1 menuActive">
                                                <a><?php echo $translations['A00282'][$language]; /* Password Maintain */?></a>
                                            </div>
                                            <div class="m-b-rem1 menuActive">
                                                <a><?php echo $translations['A01104'][$language]; /* Referral Diagram */?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-9">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <?php echo $translations['A01105'][$language]; /* Member Details */?>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-5 col-sm-5">
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span><?php echo $translations['A00117'][$language]; /* Full Name : */?></span>
                                                        <b class="m-l-rem1">director</b>
                                                    </div>
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span><?php echo $translations['A00102'][$language]; /* Referral Diagram */?></span>
                                                        <b class="m-l-rem1">jerrytest</b>
                                                    </div>
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span><?php echo $translations['A00148'][$language]; /* Member ID */?></span>
                                                        <b class="m-l-rem1">77022220</b>
                                                    </div>
                                                    <div class="m-b-rem1 col-lg-12">
                                                        <span><?php echo $translations['A01109'][$language]; /* Leader Username */?></span>
                                                        <b class="m-l-rem1">-</b>
                                                    </div>
                                                </div>

                                            <!--     <div class="col-lg-7 col-sm-7">
                                                    <div class="m-b-rem1 p-t-rem2 col-lg-4 col-sm-4 text-center mobileBorderLess borderMobile" style="border-left: 1px solid #eeeeee;">
                                                        <span>Unit Tier</span>
                                                        <h3 style="color: #059607;"><b>0</b></h3>
                                                    </div>

                                                    <div class="m-b-rem1 col-lg-4 col-sm-4 text-center mobileBorderLess borderMobile" style="border-left: 1px solid #eeeeee;">
                                                        <span style="vertical-align: middle;">Sponsor Bonus Percentage</span>
                                                        <h3 style="color: #059607;"><b>10</b></h3>
                                                    </div>

                                                    <div class="m-b-rem1 col-lg-4 col-sm-4 text-center mobileBorderLess" style="border-left: 1px solid #eeeeee;">
                                                        <span style="vertical-align: middle;">Pairing Bonus Percentage</span>
                                                        <h3 style="color: #059607;"><b>14</b></h3>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                           <?php echo $translations['A01110'][$language]; /* Fill Up Info */?>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="name"><?php echo $translations['A00101'][$language]; /* Name */?> <span class="text-danger">*</span></label>
                                                        <input id="nametxt" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="username"><?php echo $translations['A00102'][$language]; /* Username */?>  <span class="text-danger">*</span></label>
                                                        <input id="usernametxt" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A01113'][$language]; /* National ID */?>  <span class="text-danger">*</span></label>
                                                        <input id="#" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="control-label" data-th="#"><?php echo $translations['A01114'][$language]; /* Date of Birth */?> </label>
                                                        <div class="form-group">
                                                            <div>
                                                                <input id="dateOfBirth" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A00153'][$language]; /* Country */?>  <span class="text-danger">*</span></label>
                                                        <select class="form-control">
                                                           <option value="">All</option>
                                                           <option value="">Argentina</option>
                                                           <option value="">Australia</option>
                                                           <option value="">Brazil</option>
                                                           <option value="">Cambodia</option>
                                                           <option value="">Canada</option>
                                                           <option value="">China</option>
                                                           <option value="">Czech Republic</option>
                                                           <option value="">Denmark</option>
                                                           <option value="">United Kingdom</option>
                                                           <option value="">Europe</option>
                                                           <option value="">Hong Kong</option>
                                                           <option value="">Hungary</option>
                                                           <option value="">India</option>
                                                           <option value="">Indonesia</option>
                                                           <option value="">Iran</option>
                                                           <option value="">Japan</option>
                                                           <option value="">Kazakhstan</option>
                                                           <option value="">Korea</option>
                                                           <option value="">Laos</option>
                                                           <option value="">Malaysia</option>
                                                           <option value="">Mexico</option>
                                                           <option value="">Myanmar</option>
                                                           <option value="">New Zealand</option>
                                                           <option value="">Norway</option>
                                                           <option value="">Pakistani</option>
                                                           <option value="">Philippines</option>
                                                           <option value="">Poland</option>
                                                           <option value="">Russia</option>
                                                           <option value="">Saudi Arabia</option>
                                                           <option value="">South Africa</option>
                                                           <option value="">Sri Lankan</option>
                                                           <option value="">Sweden</option>
                                                           <option value="">Switzerland</option>
                                                           <option value="">Taiwan</option>
                                                           <option value="">Thailand</option>
                                                           <option value="">Turkey</option>
                                                           <option value="">United Arab Emirates</option>
                                                           <option value="">United Kingdom</option>
                                                           <option value="">United Kingdom</option>
                                                           <option value="">USA</option>
                                                           <option value="">Vietnam</option>
                                                        </select>
                                                    </div>
                                                    <!-- <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#">State/Province</label>
                                                        <select class="form-control">
                                                           <option value="">All</option>
                                                           <option value="">上海</option>
                                                        </select>
                                                    </div> -->
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A01116'][$language]; /* Address Field */?> </label>
                                                        <input id="#" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A01117'][$language]; /* PostCode */?> </label>
                                                        <input id="#" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A00171'][$language]; /* Mobile Number */?> <span class="text-danger">*</span></label>
                                                        <input id="#" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A00195'][$language]; /* Email Address */?> <span class="text-danger">*</span></label>
                                                        <input id="#" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 m-t-rem1 m-b-rem1">
                                                    <div class="col-sm-12" style="background-color: #f2f2f2; padding: 15px;">
                                                        <div class="col-sm-6 form-group p-t-rem1">
                                                            <div class="m-b-rem1">
                                                                <span><?php echo $translations['A00154'][$language]; /* Sponsor Username */?> </span>
                                                                <b class="m-l-rem1">lm1111</b>
                                                            </div>
                                                            <div class="m-b-rem1">
                                                                <span><?php echo $translations['A00574'][$language]; /* Sponsor ID */?> </span>
                                                                <b class="m-l-rem1">83682883</b>
                                                            </div>
                                                            <div>
                                                                <span><?php echo $translations['A00198'][$language]; /* Placement Username */?> </span>
                                                                <b class="m-l-rem1">lm1111</b>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 form-group p-t-rem1">
                                                            <div class="m-b-rem1">
                                                                <span><?php echo $translations['A00582'][$language]; /* Placement ID */?></span>
                                                                <b class="m-l-rem1">83682883</b>
                                                            </div>
                                                            <div class="m-b-rem1">
                                                                <span><?php echo $translations['A00199'][$language]; /* Placement Position */?></span>
                                                                <b class="m-l-rem1">Right</b>
                                                            </div>
                                                            <div>
                                                                <span><?php echo $translations['A00203'][$language]; /* Package */?></span>
                                                                <b class="m-l-rem1">BCH250</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 m-t-rem1">
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A00318'][$language]; /* Status */?> <span class="text-danger">*</span></label>
                                                        <select class="form-control">
                                                           <option value="">Active</option>
                                                           <option value="">Inactive</option>
                                                           <option value="">Terminated</option>
                                                           <option value="">Disabled</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-xs-12 col-sm-12">
                                                        <a href="#" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20 m-t-rem3" onclick=""><?php echo $translations['A00300'][$language]; /* Update */?></a>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- hidden -->
                                            <!-- <form id="adminType" role="form" style="display:none;">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="name">Admin Type</label>
                                                    <input type="text" class="form-control" value="Admin">
                                                </div>
                                            </form> -->

                                            
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
    $(document).ready(function() {

        $("#dateOfBirth").datepicker({
            language    : 'english',
            format      : 'dd/mm/yyyy',
            orientation : 'bottom auto',
            autoclose   : true
        });

    });

</script>
</body>
</html>
