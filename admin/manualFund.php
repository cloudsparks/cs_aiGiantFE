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
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="searchForm">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A01185'][$language]; /* Wallet Address */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="walletAddress" dataType="text">
                                                </div>
                                            </div>
                                            <!-- hidden -->
                                            <!-- <form id="adminType" role="form" style="display:none;">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="name">Admin Type</label>
                                                    <input type="text" class="form-control" value="Admin">
                                                </div>
                                            </form> -->

                                            <div class="col-xs-12 m-t-rem1">
                                                <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                                </button>
                                                <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light">
                                                    <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0 col-md-12">
                                <form>
                                    <div id="basicwizard" class="pull-in col-md-12">
                                        <div class="tab-content b-0 m-b-0 p-t-0 col-md-12">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div class="col-md-6 p-t-rem1 p-b-rem1">
                                                <div>
                                                    <label class="control-label">
                                                        <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <input id="username" type="text" class="form-control" disabled>
                                                </div>

                                                <div class="m-t-rem1">
                                                    <label class="control-label">
                                                        <?php echo $translations['A01185'][$language]; /* Wallet Address */ ?>
                                                    </label>
                                                    <input id="walletAddress" type="text" class="form-control" disabled>
                                                </div>

                                                <div class="m-t-rem1">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00301'][$language]; /* Type */ ?>
                                                    </label>
                                                    <input id="type" type="text" class="form-control" disabled>
                                                </div>

                                                <div class="m-t-rem1">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00821'][$language]; /* Amount */ ?>
                                                    </label>
                                                    <input id="amount" type="text" class="form-control">
                                                </div>

                                                <div class="m-t-rem3">
                                                    <button id="submitBtn" type="button" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                                                    </button>
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

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>
    // Initialize all the id in this page
    var divId    = 'bonusListDiv';
    var tableId  = 'bonusListTable';
    var pagerId  = 'pagerBonusList';
    var btnArray = Array();
    var thArray  = Array();
    var searchId = 'searchForm';
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqClient.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    $(document).ready(function() {
            
        //reset to default search
        $('#resetBtn').click(function() {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input').each(function() {
               $(this).val(''); 
            });
            $('#searchForm').find('select').each(function() {
                $(this).val('');
            $("#searchForm")[0].reset();
            });

        });
        
        $('#searchBtn').click(function() {
            pagingCallBack();
        });
    });

    function pagingCallBack(){
        if(pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var newD   = {
            command     : "getWalletAddressDetails",
            searchData   : searchData
        };
        console.log(newD);
        // if(!fCallback)
            fCallback = searchWallet;
        ajaxSend(url, newD, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function searchWallet(data, message) {
        // console.log(data.addressPageListing[0]["username"]);
        if (!data){
             showMessage(message, 'danger', '', 'warning', 'manualFund.php');

        }else {
            $("#username").val(data.addressPageListing[0]["username"]);
            $("#walletAddress").val(data.addressPageListing[0]["walletAddress"]);
            $("#type").val(data.addressPageListing[0]["credit_type"]);
        }
    }
    
    
    $("#submitBtn").click(function(){
        // alert(1);
        var walletAddress = $("#walletAddress").val();
        var amount = $("#amount").val();

        fCallback = successFundIn;
        formData  = {
            command: 'adminManualApproveFundIn',
            walletAddress : walletAddress,
            amount : amount
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });


    function successFundIn(data, message){
        console.log(data);
        showMessage('Successful manual approve fund in.', 'success', '<?php echo $translations['A00617'][$language]; /* Update Status */ ?>', 'edit', 'manualFund.php');
    }

</script>
</body>
</html>
