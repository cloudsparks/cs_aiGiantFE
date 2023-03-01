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
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="collapse">
                                                <?php echo $translations['A00051'][$language]; /* Search */?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                                        <div class="panel-body">
                                            <form id="searchForm" role="form">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="code">
                                                        <?php echo $translations['A00245'][$language]; /* Code */?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="code" dataType="text">
                                                </div>
                                               <!--  <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="language">
                                                        <?php //echo $translations['A00327'][$language]; /* Language */?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="language" dataType="text">
                                                </div> -->
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="module">
                                                        <?php echo $translations['A00328'][$language]; /* Module */?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="module" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="site">
                                                        <?php echo $translations['A00329'][$language]; /* Site */?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="site" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="category">
                                                        <?php echo $translations['A00330'][$language]; /* Type */?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="type" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="content">
                                                        <?php echo $translations['A00331'][$language]; /* Content */?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="content" dataType="text">
                                                </div>
                                            </form>
                                            <div class="col-sm-12">
                                                <button id="searchLanguageCodeBtn" type="button" class="btn btn-primary waves-effect waves-light">
                                                    <?php echo $translations['A00051'][$language]; /* Search */?>
                                                </button>
                                                <button id="resetLanguageCode" type="button" class="btn btn-default waves-effect waves-light">
                                                    <?php echo $translations['A00053'][$language]; /* Reset */?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End row -->

                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-group">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Import</h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input id="file" type="file" name="file">
                                                </div>
                                                <div class="form-group">
                                                    <button id="upload_excel" class="btn btn-primary waves-effect waves-light">Import</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <a id="exportLanguageCodes" class="btn btn-primary waves-effect w-md waves-light m-b-20">Export Translation</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box p-b-0">
                    	<!-- <button id="generateBtn" class="btn btn-primary waves-effect waves-light m-b-rem1">Generate File</button> -->

	                	<?php

	                	if($config['sheetLink']) echo '<a href="'.$config['sheetLink'].'" target="_blank" class="btn btn-primary waves-effect waves-light m-b-rem1">Go to Excel</a>';
	                	// if(filemtime(dirname( __FILE__ ).'/xlsx/translations.xlsx')){
	                		// echo '<a href="http://'. $_SERVER['HTTP_HOST'].'/xlsx/translations.xlsx" class="btn btn-primary waves-effect waves-light m-b-rem1">Export (last update:'.date("d/m/Y h:i A", filemtime(dirname( __FILE__ ).'/xlsx/translations.xlsx')).')</a>';
	                	// }
	                	?>
                        <form>
                            <div id="basicwizard" class="pull-in">
                            	<label id="lastEdit" style="color:red; padding-left:20px"></label>
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="languageCodeListDiv" class="table-responsive"></div>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pagerLanguageCodeList"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="panel-group">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <div class="pull-right">
                                    <a href="newLanguageCode.php" class="btn btn-primary waves-effect w-md waves-light m-b-20" style="padding-top: 0px;" title="New Translation">New</a>

                                    <a id="exportLanguageCodes" class="btn btn-primary waves-effect w-md waves-light m-b-20" style="padding-top: 0px;" title="Export Translations">Export
                                    <span style="padding-top: 0px;"><i class="fa fa-file-excel-o"></i></span></a>
                                </div>
                                <h4 class="panel-title">Language Translation</h4>
                            </div>
                            <div class="panel-body">
                                <div id="basicwizard" class="pull-in">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="languageCodeMsg" class="text-center alert" style="display: none;"></div>
                                        <div id="languageCodeListDiv" class="table-responsive"></div>
                                        <div class="text-center">
                                            <ul class="pagination pagination-md" id="pagerLanguageCodeList"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
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
</body>
    <script>
        // Initialize the arguments for ajaxSend function
        var url = 'scripts/reqLanguageCode.php';
        var method = 'POST';
        var debug = 0;
        var bypassBlocking = 0;
        var bypassLoading = 0;
        var pageNumber = 1;

        // Initialize all the id in this page
        var divId = 'languageCodeListDiv';
        var tableId = 'languageCodeListTable';
        var pagerId = 'pagerLanguageCodeList';
        var headerKey = Array();
        // var btnArray = Array('edit');
        var btnArray = [];//Array();
        var thArray = Array (
			//'<?php //echo $translations['A00106'][$language]; /* ID */?>',
             'Code', //'<?php //echo $translations['A00245'][$language]; /* Code */?>',
             'Site', //'<?php //echo $translations['A00336'][$language]; /* Site */?>',
             'Module', //'<?php //echo $translations['A00328'][$language]; /* Module */?>',
             'Type', //'<?php //echo $translations['A00337'][$language]; /* Type */?>'
        );
        var preValue = '';
        $(document).ready(function() {
            $("body").keyup(function(event) {
                if (event.keyCode == 13) {
                    $("#searchLanguageCodeBtn").click();
                }
            });
            // First load of this page
            var formData = {
                command: 'getLanguageCodeList',
                pageNumber : pageNumber
            };
            var fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            // Search function
            $('#searchLanguageCodeBtn').click(function() {
                pagingCallBack(pageNumber, loadSearch);
            });

            //Reset he API search from
            $('#resetLanguageCode').click(function() {
                $("#searchForm")[0].reset();
            });

	        // $('#exportBtn').click(function() {

	            // var searchId   = 'searchLanguageCodeBtn';
	            // var searchData = buildSearchDataByType(searchId);
	            // var key = 'languageCodeList';
	            // var type = '';
	            // var formData  = {
	            //     command    : "getLanguageCodeList",
	            //     filename   : "translation",
	            //     inputData  : searchData,
	            //     header     : thArray,
	            //     key        : key,
	            //     type       : "export",
	            //     DataKey    : "languageCodeList",
	            //     type    : type

	            // };
	            //  $.redirect('exportExcel.php', formData);
	        //     exportBtn();
	        // });

	        // function exportBtn(){
        	$('#generateBtn').click(function() {

	            var thArray = Array(headerKey);
	            var exportParams = {
	                seeAll      : 1,
	                type      : 'export',
	            }

	            var formData  = {
	                command     : "addExcelReq",
	                API         : "getLanguageCodeList",
	                titleKey    : "languageCodeList",
	                params      : exportParams,
	                headerAry   : thArray,
	                keyAry      : headerKey,
	                fileName    : 'translations'
	            };

	            fCallback = exportExcel;
         	// console.log(formData);
	            ajaxSend("scripts/reqLanguageCode.php", formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	    });

	    function exportExcel(data, data2){
	    	alert("Request Accepted, Please Take note of Last Update before download!");
	    	// window.location.reload();
	    }
			//--->make div editable > start
			$(document).on('click', '.row_data', function(event) 
			{
				preValue = $(this).html();
				event.preventDefault(); 

				if($(this).attr('edit_type') == 'button')
				{
					return false; 
				}

				//make div editable
				$(this).closest('div').attr('contenteditable', 'true');
				//add bg css
				$(this).addClass('bg-warning').css('padding','5px');

				$(this).focus();
			})	
			//--->make div editable > end


			//--->save single field data > start
			$(document).on('focusout', '.row_data', function(event) 
			{
				event.preventDefault();

				if($(this).attr('edit_type') == 'button')
				{
					return false; 
				}

				var code = $(this).closest('tr').attr('data-th'); 

				var row_div = $(this)				
				.removeClass('bg-warning') //add bg css
				.css('padding','')

				var col_name = row_div.attr('col_name'); 
				var col_val = row_div.html(); 
				if(col_val == "") {
					alert("Cannot Empty");
					location.reload();
					return;
				}
				if(col_val == preValue) return;
				// var arr = {};
				// arr[col_name] = col_val;

				//use the "arr"	object for your ajax call
				// $.extend(arr, {row_id:row_id});

                var formData    = {
                    "code" : code, 
                    "command"        : "editLanguageCodeData",  
                    "language"       : col_name, 
                    "content"        : col_val 
                };

                fCallback = sendEdit;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
			})
        });

        function loadDefaultListing(data, message) {
            var tableNo;
            var langDisplay = data.langDisplay;
            var editable = data.editable;
            thArrayNew = [];

   			$.each(thArray, function(k, v) {
				thArrayNew.push(v);
			});

			$.each(langDisplay, function(k, v) {
				thArrayNew.push(v);
			});   

			$.each(data.headerArr, function(k, v) {
				headerKey.push(v);
			});

			$('#lastEdit').html("* Last Edit: "+data.lastEdit);//+"/"+date.getMonth()+"/"+date.getFullYear());
			buildTable2(data.languageCodeList, tableId, divId, thArrayNew, btnArray, message, tableNo, editable);
            pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
        }

        function tableBtnClick(btnId) {
            var btnName = $('#'+btnId).attr('id').replace(/\d+/g, '');
            var tableRow = $('#'+btnId).parent('td').parent('tr');
            var tableId = $('#'+btnId).closest('table');

            if (btnName == 'edit') {
                var editId = tableRow.attr('data-th');
                $.redirect("editLanguageCode.php",{id: editId});
            }
        }

        function loadSearch(data, message) {
            loadDefaultListing(data, message);
            $('#searchMsg').addClass('alert-success').html('<span>'+'<?php echo $translations['A00114'][$language]; /* Search successful. */?>'+'</span>').show();
            setTimeout(function() {
                $('#searchMsg').removeClass('alert-success').html('').hide(); 
            }, 3000);
        }

        function pagingCallBack(pageNumber, fCallback){
            var searchID = 'searchForm';
            var searchData = buildSearchDataByType(searchID);

            if(pageNumber > 1)
                bypassLoading = 1;
            var formData = {
                command : "getLanguageCodeList",
                searchData: searchData,
                pageNumber: pageNumber
            };
            if(!fCallback)
                fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function sendEdit(data, message) {

        	if(data.lastEdit){
        		$('#lastEdit').html("* Last Edit: "+data.lastEdit);
        		return;
        	} 

	        showMessage(message, 'danger', 'Error', 'LanguageCode', 'languageCode.php');
	    }
    </script>
</html>
