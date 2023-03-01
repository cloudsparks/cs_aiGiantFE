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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse"><?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="#"><?php echo $translations['A00148'][$language]; /* Member ID */ ?></label>
                                                    <input id="#" type="text" class="form-control">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="name"><?php echo $translations['A00101'][$language]; /* Name */ ?></label>
                                                    <input id="nametxt" type="text" class="form-control">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="username"><?php echo $translations['A00102'][$language]; /* Username */ ?></label>
                                                    <input id="usernametxt" type="text" class="form-control">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="email"><?php echo $translations['A00103'][$language]; /* Email */ ?></label>
                                                    <input id="emailtxt" type="text" class="form-control">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="#"><?php echo $translations['A00203'][$language]; /* Package */ ?></label>
                                                    <select class="form-control">
                                                        <option value="">All</option>
                                                        <option value="#">BCH100</option>
                                                        <option value="#">BCH200</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="status"><?php echo $translations['A00318'][$language]; /* Status */ ?></label>
                                                    <select class="form-control">
                                                        <option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>
                                                        <option value="#"><?php echo $translations['A00372'][$language]; /* Active */ ?></option>
                                                        <option value="#"><?php echo $translations['A00373'][$language]; /* Inactive */ ?></option>
                                                        <option value="#"><?php echo $translations['A01131'][$language]; /* Terminated */ ?></option>
                                                        <option value="#"><?php echo $translations['A00104'][$language]; /* Disabled */ ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="control-label" data-th="#"><?php echo $translations['A01132'][$language]; /* Join Date */ ?></label>
                                                    <div class="input-group">
                                                        <div>
                                                            <input id="dateRangeStart" type="text" class="form-control">
                                                        </div>
                                                        <span class="input-group-addon"><?php echo $translations['A00139'][$language]; /* To */ ?></span>
                                                        <div>
                                                            <input id="dateRangeEnd" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="#"><?php echo $translations['A00153'][$language]; /* Country */ ?></label>
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
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" data-th="role_id">Role Name</label>
                                                    <select id="roleName" class="form-control">
                                                    </select>
                                                </div> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" data-th="">Created At</label>
                                                    <input id="createdAt" type="text" class="form-control dateRangePicker">
                                                </div> -->
                                            </form>
                                            <!-- hidden -->
                                            <!-- <form id="adminType" role="form" style="display:none;">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="name">Admin Type</label>
                                                    <input type="text" class="form-control" value="Admin">
                                                </div>
                                            </form> -->

                                            <div class="col-xs-12 m-t-rem1">
                                                <button id="searchBtn" type="submit" class="btn btn-primary waves-effect waves-light"><?php echo $translations['A00051'][$language]; /* Search */ ?></button>
                                                <button id="resetBtn" type="submit" class="btn btn-default waves-effect waves-light"><?php echo $translations['A00053'][$language]; /* Reset */ ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <form>
                                    <div id="basicwizard" class="pull-in">
                                        <div class="tab-content b-0 m-b-0 p-t-0" style="padding-bottom: 0;">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="adminListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerAdminList"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

        $("#dateRangeStart").datepicker({
            language    : 'english',
            format      : 'dd/mm/yyyy',
            orientation : 'bottom auto',
            autoclose   : true
        });

        $("#dateRangeEnd").datepicker({
            language    : 'english',
            format      : 'dd/mm/yyyy',
            orientation : 'bottom auto',
            autoclose   : true
        });

    });

    // Initialize all the id in this page
    var divId    = 'adminListDiv';
    var tableId  = 'adminListTable';
    var pagerId  = 'pagerAdminList';
    var btnArray = Array('edit');
    var thArray  = Array('Username',
                         'Full Name',
                         'Country',
                         'Sponsor Username',
                         'Join Date',
                         'Package',
                         'Mobile No.',
                         'Status'
                        );
    var searchId = 'searchForm';
        
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";  

    $(document).ready(function() {

        fCallback = loadDefaultListing;
        formData  = {command: 'getAdminList'};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
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
            pagingCallBack(pageNumber, loadSearch);
        }); 
    });

    function pagingCallBack(pageNumber, fCallback){
            if(pageNumber > 1) bypassLoading = 1;

            var searchData = buildSearchData(searchId);
            var formData   = {
                command     : "getAdminList",
                pageNumber  : pageNumber,
                inputData   : searchData,
            };
            if(!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }
    
    function loadDefaultListing(data, message) {
        var tableNo;
        buildTable(data.adminList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }
    
    function tableBtnClick(btnId) {
        var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
        var tableRow = $('#'+btnId).parent('td').parent('tr');
        var tableId  = $('#'+btnId).closest('table');
        
        if (btnName == 'edit') {
            var editId = tableRow.attr('data-th');
//            var editUrl = 'editAdmin.php?id='+editId;
            $.redirect("editAdmin.php",{id: editId});
//            window.location = editUrl;
        }
    }
    
    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>Search successful.</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide(); 
        }, 3000);
    }
    
   
</script>
</body>
</html>
