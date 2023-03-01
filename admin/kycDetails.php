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

                    <div class="row" id="kycDetailsBlock">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0">

                                            <div class="row m-t-15">
                                                <label class="control-label col-md-2"><?php echo $translations["A00148"][$language];?></label>
                                                <label id="memberID" class="control-label col-md-10"></label>
                                            </div>
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-2"><?php echo $translations["A00102"][$language];?></label>
                                                <label id="username" class="control-label col-md-10"></label>
                                            </div>
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-2"><?php echo $translations["A00117"][$language];?></label>
                                                <label id="fullName" class="control-label col-md-10"></label>
                                            </div>
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-2"><?php echo $translations["A00153"][$language];?></label>
                                                <label id="country" class="control-label col-md-10"></label>
                                            </div>
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-2"><?php echo $translations["A01440"][$language];?></label>
                                                <label id="nric" class="control-label col-md-10"></label>
                                            </div> 
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-2"><?php echo $translations["A01441"][$language];?></label>
                                                <label id="gender" class="control-label col-md-10"></label>
                                            </div> 
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-2"><?php echo $translations["A01442"][$language];?></label>
                                                <label id="docType" class="control-label col-md-10"></label>
                                            </div> 
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-2"><?php echo $translations["A01443"][$language];?></label>
                                                <div class="control-label col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-4" id="frontImgBlock">
                                                            <label class="control-label"><?php echo $translations["A01444"][$language];?><a data-toggle="tooltip" href="javascript:;" onclick="viewFront()" class="btn btn-icon m-l-rem2" data-original-title="View"><i class="fa fa-eye"></i></a></label>

                                                            <img id="imgFront" class="show" src="" width="80%">
                                                        </div>
                                                        <div class="col-md-4" id="backImgBlock" style="display: none;">
                                                            <label class="control-label"><?php echo $translations["A01445"][$language];?><a data-toggle="tooltip" href="javascript:;" onclick="viewBack()" class="btn btn-icon m-l-rem2" data-original-title="View"><i class="fa fa-eye"></i></a></label>

                                                            <img id="imgBack" class="show" src="" width="80%">
                                                        </div>
                                                        <div class="col-md-4" id="selfImgBlock" style="display: none;">
                                                            <label class="control-label"><?php echo $translations["A01446"][$language];?><a data-toggle="tooltip" href="javascript:;" onclick="viewSelf()" class="btn btn-icon m-l-rem2" data-original-title="View"><i class="fa fa-eye"></i></a></label>

                                                            <img id="imgSelf" class="show" src="" width="80%">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-2"><?php echo $translations["A00318"][$language];?></label>
                                                <label id="status" class="control-label col-md-10"></label>
                                            </div> 
                                            <div class="row m-t-15">
                                                <label class="control-label col-md-2"><?php echo $translations["A00571"][$language];?></label>
                                                <label id="remark" class="control-label col-md-10"></label>
                                            </div> 

                                            <div class="row m-t-30">
                                                <div class="col-md-12">
                                                    <a href="kycListing.php" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations["A00115"][$language];?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End row -->

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

    <div class="modal fade" id="showImage" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                    </h4>
                </div>
                <div class="modal-body">
                    <img id="modalImg" width="100%" src="">
                </div>
                <div class="modal-footer">
                    <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A01151'][$language]; /* Close */ ?></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>
    var url            = 'scripts/reqClient.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var pageNumber     = 1;
    var kycID = '<?php echo $_POST['id']?>';
    var imgData1 = '';
    var imgData2 = '';

    $(document).ready(function(){
        formData  = {
            command    : 'getKYCDataByID',
            kycID      : kycID
        };

        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function loadDefaultListing(data, message) {
        console.log(data);

        var kyc = data.kycData;

        imgData1 = kyc.imageData1;
        if(kyc.imageData2) {
            imgData2 = kyc.imageData2;
        }

        if(kyc.selfImageData) {
            imgData3 = kyc.selfImageData;
        }

        $("#memberID").text(kyc.memberID);
        $("#username").text(kyc.username);
        $('#fullName').html(kyc.fullName);
        $("#country").text(kyc.countryDisplay || '-');
        $("#nric").text(kyc.nric);
        $("#gender").text(kyc.genderDisplay);
        $("#docType").text(kyc.documentTypeDisplay);
        $("#imgFront").attr('src', kyc.imageData1);
        if(kyc.imageData2) {
            $("#imgBack").attr('src', kyc.imageData2);
            $("#backImgBlock").show();
        }else{
            $("#backImgBlock").remove();
        }

        if(kyc.selfImageData) {
            $("#imgSelf").attr('src', kyc.selfImageData);
            $("#selfImgBlock").show();
        }else{
            $("#selfImgBlock").remove();
        }

        
        $("#status").text(kyc.status);
        $("#remark").text(kyc.remark);
    }

    function viewFront() {
        $("#modalImg").attr('src', imgData1);
        $("#showImage").modal();
    }

    function viewBack() {
        $("#modalImg").attr('src', imgData2);
        $("#showImage").modal();
    }

    function viewSelf() {
        $("#modalImg").attr('src', imgData3);
        $("#showImage").modal();
    }
</script>
</body>
</html>
