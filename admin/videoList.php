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
                                                <?php echo $translations['A00051'][$language]; /* Search */?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                            <form id="searchForm" role="form">
                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-8 form-group">
                                                            <label class="control-label" for="" data-th="">
                                                                <!-- <?php echo $translations['A00369'][$language]; /* Subject */?> -->
                                                                Title
                                                            </label>
                                                            <input id="" type="text" class="form-control" dataName="name" dataType="text">
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label" for="" data-th="">
                                                                <!-- <?php echo $translations['A00318'][$language]; /* Status */?> -->
                                                                Psckage
                                                            </label>
                                                            <select class="form-control" dataName="package" dataType="select">
                                                                <option value="">
                                                                    All
                                                                </option>
                                                                <option value="300">
                                                                    300
                                                                </option>
                                                                <option value="1000">
                                                                    1000
                                                                </option>
                                                                <option value="3000">
                                                                    3000
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                             
                                            </form>
                                            <div class="col-xs-12">
                                                <div id="searchBtn" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */?>
                                                </div>
                                                <div id="resetBtn" class="btn btn-default waves-effect waves-light">
                                                    <?php echo $translations['A00053'][$language]; /* Reset */?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <div class="card-box p-b-0"> -->
                                <div id="uploadVideo" class="btn btn-primary waves-effect waves-light m-b-20">
                                    <?php echo $translations['A01713'][$language]; /* Upload Video */?>
                                </div>
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="memoListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerMemoList"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <!-- </div> -->
                        </div>
                    </div><!-- End row -->
                </div><!-- container -->
            </div><!-- content -->
            <?php include("footer.php"); ?>
        </div>
        <!-- End content-page -->
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div><!-- END wrapper -->
    <!-- jQuery  -->

    <div class="modal fade" id="editTitle" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        Edit Title
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="col-12 form-group">
                        <label class="control-label" for="" data-th="">
                            <!-- <?php echo $translations['A00369'][$language]; /* Subject */?> -->
                            Title
                        </label>
                        <input id="editTitleInp" type="text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="confirmBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Confirm</button>
                    <button id="canvasCloseBtn" type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                </div>
            </div>
        </div>
    </div>
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>
    <script>
        // Initialize all the id in this page
        var divId    = 'memoListDiv';
        var tableId  = 'memoListTable';
        var pagerId  = 'pagerMemoList';
        // var btnArray = Array('view');
        var btnArray = Array('delete');
        var thArray  = Array (
            'Package',
            'Title',
            'Link',
            ''
        );
            
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqUpload.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1; 
        var video_id;

        $(document).ready(function() {

            $("body").keyup(function(event) {
                if (event.keyCode == 13) {
                    $("#searchBtn").click();
                }
            });
                
            $('#resetBtn').click(function() {
                $("#searchForm")[0].reset();
            });
            
            $('#searchBtn').click(function() {
                pagingCallBack(pageNumber, loadSearch);
            });

            $('#uploadVideo').click(function() {
                $.redirect("videoUpload.php");
            });

            // Initialize date picker
            $('.input-daterange input').each(function() {
                $(this).daterangepicker({
                    singleDatePicker: true,
                    orientation: "top auto",
                    timePicker: false,
                    locale: {
                        format: 'DD/MM/YYYY'
                    }
                });
                $(this).val('');
            });

            $('#confirmBtn').click(function() {
                var video_name = $('#editTitleInp').val();

                var formData   = {
                    command : 'editVideo',
                    video_id : video_id,
                    video_name : video_name,
                };
                fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });
        });

        function pagingCallBack(pageNumber, fCallback){
                if(pageNumber > 1) bypassLoading = 1;

                var searchID = 'searchForm';
                var searchData = buildSearchDataByType(searchID);
                var formData   = {
                    command     : "videoList",
                    pageNumber  : pageNumber,
                    inputData   : searchData,
                };
                if(!fCallback)
                    fCallback = loadDefaultListing;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
        
        function loadDefaultListing(data, message) {
            $('#basicwizard').show();
            var tableNo;

            if (data.videoListing) {
                var newList = [];
                var editBtn = "";
                $.each(data.videoListing, function (k, v) {

                    editBtn = `
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Edit Title" onclick="editTitle('${v.video_id}', '${v.name}')">
                            <i class="fa fa-edit"></i>
                        </button>
                    `
                    var rebuildData = {
                        video_id: v['video_id'],
                        package: v['package'],
                        title: v['name'],
                        link: v['link'],
                        editBtn
                    };
                    newList.push(rebuildData);
                });
            }

            buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('tr td:nth-child(1)').hide();

            // $('#'+tableId).find('tr').each(function(){
            //     $(this).find('th:first-child, td:first-child').hide();
            //     $(this).find('td:last-child').css('text-align','center');
            // })
        }
        
        function tableBtnClick(btnId) {
            var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
            var tableRow = $('#'+btnId).parent('td').parent('tr');
            var id = tableRow.attr('data-th');

            if(btnName == "delete") {
                var formData  = {command : 'deleteVideo', video_id : id};
                var fCallback = removeCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        }

        function removeCallback(data, message) {
            showMessage('<?php echo $translations['A00432'][$language]; /* Successful remove memo. */?>', 'success', '<?php echo $translations['A00433'][$language]; /* Remove Memo */?>', 'trash', 'videoList.php');
        }
        
        function loadSearch(data, message) {
            loadDefaultListing(data, message);
            $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
            setTimeout(function() {
                $('#searchMsg').removeClass('alert-success').html('').hide(); 
            }, 3000);
        }

        function editTitle(id, title) {
            console.log(title)

            video_id = id;

            $('#editTitle').modal('show');
            $('#editTitleInp').val(title);

        }

        function submitCallback(data, message) {
            showMessage('Edit Successful', 'success', 'Edit Title', 'upload', 'videoList.php');
        }
    </script>
</body>
</html>