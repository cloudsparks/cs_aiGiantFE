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
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label" for="" data-th="">
                                                                <?php echo $translations['A00369'][$language]; /* Subject */?>
                                                            </label>
                                                            <input id="" type="text" class="form-control" dataName="subject" dataType="text">
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label" for="" data-th="">
                                                                <?php echo $translations['A00318'][$language]; /* Status */?>
                                                            </label>
                                                            <select class="form-control" dataName="status" dataType="select">
                                                                <option value="">
                                                                    <?php echo $translations['A00055'][$language]; /* All */?>
                                                                </option>
                                                                <option value="active">
                                                                    <?php echo $translations['A00372'][$language]; /* Active */?>
                                                                </option>
                                                                <option value="inactive">
                                                                    <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                                </option>
                                                                <option value="deleted">
                                                                    <?php echo $translations['A00374'][$language]; /* Deleted */?>
                                                                </option>
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00112'][$language]; /* Created At */?>
                                                            </label>
                                                            <div class="input-group input-daterange">
                                                                <input type="text" class="form-control" dataName="createdAt" dataType="dateRange">
                                                                    <span class="input-group-addon">
                                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                                    </span>
                                                                <input type="text" class="form-control" dataName="createdAt" dataType="dateRange">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 form-group">
                                                            <label class="control-label">
                                                                <?php echo $translations['A00377'][$language]; /* Updated At */?>
                                                            </label>
                                                            <div class="input-group input-daterange">
                                                                <input type="text" class="form-control" dataName="updatedAt" dataType="dateRange">
                                                                <span class="input-group-addon">
                                                                    <?php echo $translations['A00139'][$language]; /* to */?>
                                                                </span>
                                                                <input type="text" class="form-control" dataName="updatedAt" dataType="dateRange">
                                                            </div>
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
                                <div id="addDocument" class="btn btn-primary waves-effect waves-light m-b-20">
                                    <?php echo $translations['A00379'][$language]; /* Upload Document */?>
                                </div>
                                <form>
                                    <div id="basicwizard" class="pull-in" style="display: none">
                                        <div class="tab-content b-0 m-b-0 p-t-0">
                                            <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                            <div id="documentListDiv" class="table-responsive"></div>
                                            <span id="paginateText"></span>
                                            <div class="text-center">
                                                <ul class="pagination pagination-md" id="pagerDocumentList"></ul>
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
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>
    <script>
        // Initialize all the id in this page
        var divId    = 'documentListDiv';
        var tableId  = 'documentListTable';
        var pagerId  = 'pagerDocumentList';
        var btnArray = Array('edit', 'delete');
        var thArray  = Array (
            '<?php echo $translations['A00106'][$language]; /* ID */?>',
            '<?php echo $translations['A00369'][$language]; /* Subject */?>',
            '<?php echo $translations['A00145'][$language]; /* Description */?>',
            '<?php echo $translations['A00318'][$language]; /* Status */?>',
            '<?php echo $translations['A00384'][$language]; /* Creator Username */?>',
            '<?php echo $translations['A00112'][$language]; /* Created At */?>',
            '<?php echo $translations['A00377'][$language]; /* Updated At */?>'
        );
            
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqUpload.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1; 

        $(document).ready(function() {

            $("body").keyup(function(event) {
                if (event.keyCode == 13) {
                    $("#searchBtn").click();
                }
            });
            
            // var formData  = {command: 'getDocumentList'};
            // var fCallback = loadDefaultListing;
            // ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                
            $('#resetBtn').click(function() {
                $("#searchForm")[0].reset();
            });
            
            $('#searchBtn').click(function() {
                pagingCallBack(pageNumber, loadSearch);
            });

            $('#addDocument').click(function() {
                $.redirect("addDocument.php");
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
        });

        function pagingCallBack(pageNumber, fCallback){
                if(pageNumber > 1) bypassLoading = 1;

                var searchID = 'searchForm';
                var searchData = buildSearchDataByType(searchID);
                var formData   = {
                    command     : "getDocumentList",
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
            buildTable(data.documentList, tableId, divId, thArray, btnArray, message, tableNo);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

            $('#'+tableId).find('tr').each(function(){
                $(this).find('th:first-child, td:first-child').hide();
                $(this).find('td:last-child').css('text-align','center');
            })
        }
        
        function tableBtnClick(btnId) {
            var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
            var tableRow = $('#'+btnId).parent('td').parent('tr');
            var id = tableRow.attr('data-th');

            if(btnName == "edit") {
                $.redirect('editDocument.php', {id : id});
            }
            else if(btnName == "delete") {
                var formData  = {command : 'removeDocument', id : id};
                var fCallback = removeCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
        }

        function removeCallback(data, message) {
            showMessage('<?php echo $translations['A00387'][$language]; /* Successful remove document. */?>', 'success', '<?php echo $translations['A00388'][$language]; /* Remove Document */?>', 'trash', 'document.php');
        }
        
        function loadSearch(data, message) {
            loadDefaultListing(data, message);
            $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
            setTimeout(function() {
                $('#searchMsg').removeClass('alert-success').html('').hide(); 
            }, 3000);
        }
    </script>
</body>
</html>