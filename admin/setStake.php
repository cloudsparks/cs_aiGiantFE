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

                        <div class="col-lg-12 col-md-12">

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                         <?php echo $translations['A01206'][$language]; /* set stake limit*/?>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="typeError" class="text-center alert" style="display: none;"></div>
                                                <div class="col-sm-12">
                                                  <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A00301'][$language]; /* Type */?>  <span class="text-danger">*</span></label>
                                                        <select id="type" class="form-control">
                                                          <option value="">Please Select</option>
                                                           <option value="client">Individual</option>
                                                           <option value="leader">Leader</option>
                                                           <option value="country"><?php echo $translations['A00153'][$language]; /* Country */?></option>
                                                        </select>
                                                        
                                                    </div>
                                                  <div class="col-sm-6 form-group" style="display:none" id="countryDisplay">
                                                        <label class="control-label" for="" data-th="#"><?php echo $translations['A00153'][$language]; /* Country */?>  <span class="text-danger">*</span></label>
                                                        <select id="country" class="form-control">
                                                           <option value="">All</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 form-group" style="display:none" id="leaderDisplay">
                                                        <label class="control-label" for="" data-th=""><?php echo $translations['A00438'][$language]; /* Group Leader Username */?> <span class="text-danger">*</span></label>
                                                        <input id="leaderUsername" type="text" class="form-control">
                                                    </div>                                                    
                                                    <div class="col-sm-6 form-group" id="clientDisplay">
                                                        <label class="control-label" for="" data-th=""><?php echo $translations['A00101'][$language]; /* Name */?> <span class="text-danger">*</span></label>
                                                        <input id="clientUsername" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th=""><?php echo $translations['A01207'][$language]; /* min stake */?><span class="text-danger">*</span></label>
                                                        <input id="minStake" type="text" class="form-control">
                                                    </div>
                                                     <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th=""><?php echo $translations['A01208'][$language]; /* max stake */?><span class="text-danger">*</span></label>
                                                        <input id="maxStake" type="text" class="form-control">
                                                    </div>
                                                </div>

                                                 <div class="col-sm-12">
                                                    <div class="col-xs-12 col-sm-12">
                                                        <a id ="updateBtn" href="#" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20 m-t-rem3" onclick=""><?php echo $translations['A00300'][$language]; /* Update */?></a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12" style="margin-top: 20px">
                                                  <div class="col-sm-12 form-group" style="margin-bottom: 20px">
                                                        <h4>Stake Limit Listing</h4>
                                                  </div>
                                                </div>
                                                <div class="col-sm-12">
                                                  <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                                  <form id="searchList" role="form">
                                                    <div class="col-sm-6 form-group">
                                                      <label class="control-label" for="" data-th="#"><?php echo $translations['A00153'][$language]; /* Country */?>  <span class="text-danger">*</span></label>
                                                      <select id="country2" class="form-control" dataName="country" dataType="select">
                                                         <option value="">All</option>
                                                      </select>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                      <label class="control-label" for="" data-th="username2"><?php echo $translations['A00101'][$language]; /* Name */?> <span class="text-danger">*</span></label>
                                                      <input id="username2" type="text" class="form-control" dataName="username" dataType="text">
                                                    </div>
                                                    <!-- <div class="col-sm-6 form-group">
                                                      <label class="control-label" for="" data-th="leaderUsername2"><?php echo $translations['A00438'][$language]; /* Group Leader Username */?><span class="text-danger">*</span></label>
                                                      <input id="leaderUsername2" type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                    </div> -->
                                                  </form>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="col-xs-12 col-sm-12">
                                                        <button id ="searchBtn" href="#" type="button" class="btn btn-primary waves-effect w-md waves-light m-b-20 m-t-rem3" onclick=""><?php echo $translations['A00051'][$language]; /* Search */?></button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 px-0" style="margin-top: 30px">
                                                  <div id="basicwizard" class="pull-in">
                                                  <div class="tab-content b-0 m-b-0 p-t-0">
                                                  <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                                  <div id="stakeLimitList" class="table-responsive"></div>
                                                    <span id="paginateText"></span>
                                                    <div class="text-center">
                                                        <ul class="pagination pagination-md" id="pagerAdminList"></ul>
                                                    </div>
                                                  </div>
                                                  </div>
                                                </div>
                                                <!-- <div class="col-sm-12">
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
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="name"><?php echo $translations['A00101'][$language]; /* Name */?> <span class="text-danger">*</span></label>
                                                        <input id="nametxt" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="username">Min Stake<span class="text-danger">*</span></label>
                                                        <input id="usernametxt" type="text" class="form-control">
                                                    </div>
                                                     <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="username">Max Stake<span class="text-danger">*</span></label>
                                                        <input id="usernametxt" type="text" class="form-control">
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label class="control-label" for="" data-th="username">Specific User<span class="text-danger">*</span></label>
                                                        <input id="usernametxt" type="text" class="form-control">
                                                    </div>
                                                </div> -->
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

    var url            = 'scripts/reqAdmin.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var fCallback      = "";
    var divId    = 'stakeLimitList';
    var tableId  = 'stakeLimitListTable';
    var btnArray = Array('edit');
    var pagerId  = 'pagerAdminList';
    var thArray  = Array (
             '<?php echo $translations['A00101'][$language]; /* Name */ ?>',
             '<?php echo $translations['A00301'][$language]; /* Type */ ?>',
             '<?php echo $translations['A01207'][$language]; /* Min Stake */ ?>',
             '<?php echo $translations['A01208'][$language]; /* Max Stake */ ?>',
             '<?php echo $translations['A00318'][$language]; /* Status */ ?>',
             '<?php echo $translations['A00377'][$language]; /* Updated At */ ?>',
            );
    var pageNumber      = 1;


    $(document).ready(function() {

        var formData  = {
            command   : "getCountryListing",
        };
        var fCallback = countryDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        var formData  = {
          command   : "getCountryListing",
        };
        var fCallback = countryDetails;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        var formData  = {
          command   : "getStakeLimitList",
        };

        var fCallback = stakeLimitListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#searchBtn').click(function() {
            pagingCallBack(pageNumber, loadSearch);
        });

    });


    function tableBtnClick(btnId) {
      var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
      var tableRow = $('#'+btnId).parent('td').parent('tr');
      var tableId  = $('#'+btnId).closest('table');
      
      if (btnName == 'edit') {
          var editId = tableRow.attr('data-th');
          $.redirect("editStake.php",{id: editId});
      }
    }
    $('#type').on('change', function() {
        if(this.value == "client"){
            $('#country').val(''); 
            $('#leaderUsername').val(''); 
            $('#clientDisplay').attr('style', "display:block");
            $('#leaderDisplay').attr('style', "display:none");
            $('#countryDisplay').attr('style', "display:none");
        }else if(this.value == "leader"){
            $('#clientUsername').val(''); 
            $('#country').val(''); 
            $('#leaderDisplay').attr('style', "display:block");
            $('#clientDisplay').attr('style', "display:none");
            $('#countryDisplay').attr('style', "display:none");
        }else if(this.value == "country"){
            $('#leaderUsername').val(''); 
            $('#clientUsername').val(''); 
            $('#countryDisplay').attr('style', "display:block");
            $('#leaderDisplay').attr('style', "display:none");
            $('#clientDisplay').attr('style', "display:none");
        }

    });
    $('#updateBtn').click(function() {
        $('#typeError').removeClass('alert-danger').html('').hide(); 
        var country   = $('#country').find('option:selected').val();
        var clientUsername = $('#clientUsername').val(); 
        var minStake = $('#minStake').val(); 
        var maxStake = $('#maxStake').val(); 
        var leaderUsername = $('#leaderUsername').val(); 
        if($('#type').val() == ''){
          $('#typeError').addClass('alert-danger').html("Please Select Type").show();
          return;
        }
        var formData = {
            command  : "updateStakeLimit",
            country : country,
            clientUsername : clientUsername,
            minStake : minStake,
            maxStake : maxStake,
            leaderUsername : leaderUsername
        };
        // /console.log(formData);
        var fCallback = updateStakeSuccess;

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function countryDetails (data, message) {
       console.log(data);
       var countryList = data.countryList;
        if(countryList) {
            $.each(countryList, function(key) {
              $('#country').append('<option value="'+countryList[key]['name']+'" name="'+countryList[key]['name']+'">'+countryList[key]['name']+'</option>');
            });

            $.each(countryList, function(key) {
              $('#country2').append('<option value="'+countryList[key]['id']+'" name="'+countryList[key]['name']+'">'+countryList[key]['name']+'</option>');
            });
      }
    }

    function updateStakeSuccess (data, message) {
       // console.log(data);
        showMessage('<?php echo $translations['A01209'][$language]; /* successfully update stake */?>', 'success', '<?php echo $translations['A01210'][$language]; /* update stake */?>', 'edit', 'setStake.php');
    } 

    function stakeLimitListing(data, message) {
     // console.log(data);
      var tableNo;
      buildTable(data.stakeLimitLsting, tableId, divId, thArray, btnArray, message, tableNo);
      pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
    }

    function pagingCallBack(pageNumber, fCallback){
      var searchId   = 'searchList';
      var searchData = buildSearchDataByType(searchId);
      if(pageNumber > 1) bypassLoading = 1;

      var formData = {
          command    : "getStakeLimitList",
          searchData : searchData,
          pageNumber : pageNumber
      };

      if(!fCallback)
          fCallback = stakeLimitListing;
      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadSearch(data, message) {
      stakeLimitListing(data, message);
      $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
      setTimeout(function() {
          $('#searchMsg').removeClass('alert-success').html('').hide(); 
      }, 3000);
    }
</script>
</body>
</html>
