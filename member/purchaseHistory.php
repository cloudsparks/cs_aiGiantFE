<?php
include 'include/config.php';
include 'head.php';
include 'header.php';


$currentTime = microtime(true) * 1000;
$stopRecord = $_SESSION["stopRecord"];
?>

<style>
	body{
	    width: 100%;
	    overflow-x: hidden;
	    background-color: #F5F5F5;
	}

	.footerPosition {
		position: unset;
	}
</style>

<link href="css/dashboard.css?v=<?php echo filemtime('css/dashboard.css'); ?>" rel="stylesheet" type="text/css" />

<!-- <div class ="navBar">
<div class="dropdown">
    <button class="dropbtn">Dropdown 
	<img class="" src="./images/588a6507d06f6719692a2d15.png" width="25px">   
    </button>
	<div class="dropdown-content">
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
    </div> 
</div> -->

<!-- <div class="dropdown">
  <button class="dropbtn"><img class="" src="./images/588a6507d06f6719692a2d15.png" width="25px">   </button>
  <div class="dropdown-content">
    <a href="#">Homepage</a>
    <a href="#">About Us</a>
    <a href="#">Contact Us</a>
  </div>
</div> -->

<!-- Slideshow start -->
<!-- <div class="slideshow-container" style="padding-top:25px;">
	<div><?php include 'yinYangSymbol.php' ?></div>
	<div class="mySlides fade">
	<img src="images/1.jpeg" style="width:100%; max-height: 600px; background-size:cover;border-radius: 0px 0px 15px 15px">
	</div>
	<div class="mySlides fade">
	<img src="images/2.jpeg" style="width:100%; max-height: 600px; background-size:cover;border-radius: 0px 0px 15px 15px">
	</div>
	<div class="mySlides fade">
	<img src="images/3.jpeg" style="width:100%; max-height: 600px; background-size:cover;border-radius: 0px 0px 15px 15px">
	</div>
</div> -->
<div class="kt-container">
	<?php include("sidebar.php"); ?>
		<div class="text-left mt-5">
			<div class="pageTitle py-0">
				<span data-lang="M00985"><?php echo $translations['M02877'][$language] /*Purchase Hisotry*/ ?></span>
			</div>
		</div>

		<div class="col-12">
			<div class="row justify-content-center">
				<div class="col-md-12">

					<div class="listingWrapper">
					    <div class="col-12">
					    	<form id="searchDIV">
					    		<div class="col-12 px-0">
							        <div class="row align-items-end">
							        	<div class="col-lg-4 col-md-6 col-12 form-group" id="datepicker">
							        	    <label><?php echo $translations['M00091'][$language] /*Date Range*/ ?></label>
							        	    <div class="input-daterange input-group" id="datepicker-range">
							        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="bonusDate" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<span class="input-group-text">-</span>
							        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="bonusDate" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							        	    	<label for="dateRangeStart" class="input-group-text"><i class="fa fa-calendar"></i></label>
							        	    </div>
							        	</div>
							        </div>
							        <div class="row align-items-end mt-3">
							        	<div class="col mt-3">
							        		<button id="searchBtn" class="btn btn-primary mr-3" type="button" name="button"><?php echo $translations['M00243'][$language] /*Search*/ ?></button>
							        		<button id="resetBtn" class="btn btn-default" type="button" name="button"><?php echo $translations['M00085'][$language] /*Reset*/ ?></button>
							        		<!-- <span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="resetBtn"></i> </span> -->
							        	</div>
							        </div>
					    		</div>

					    	</form>
					    </div>
					</div>
				</div>
						<div class="col-12 px-0 mt-4 pt-4">
						    <form>
						        <div id="basicwizard" class="pull-in col-12 px-0">
						            <div class="tab-content b-0 m-b-0 p-t-0">
						                <div id="alertMsg" class="text-center" style="display: block;"></div>
						                <div id="listingDiv" class="table-responsive"></div>
						                <span id="paginateText"></span>
						                <div class="text-center">
						                    <ul class="pagination pagination-md" id="pagerList"></ul>
						                </div>
						            </div>
						        </div>
						    </form>
						</div>
					
					
				
			</div>
		</div>
		<?php include 'footer.php'; ?>
	</div>

</body>


<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>
</html>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var formData        = "";
var fCallback       = "";

var divId    = 'listingDiv';
var tableId  = 'listingTable';
var pagerId  = 'pagerList';
var btnArray = {};

var thArray  = Array(
		"Date",
		"Package",
		"Price",
		"RV",
		"Status"
);

$(document).ready(function(){

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
		}
	});
	
	var formData  = {
	  command: 'getPortfolioList'
	};
	var fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	$('#dateRangeStart').daterangepicker({    
        autoApply: true,
        autoUpdateInput: false,
        locale: {
            format: 'DD/MM/YYYY'
        }
    }, function(start, end, label) {
        $("#dateRangeStart").val(start.format('DD/MM/YYYY'));
        $("#dateRangeEnd").val(end.format('DD/MM/YYYY'));
    });

    $('#dateRangeEnd').click(function() {
        $('#dateRangeStart').trigger('click');
    });

	// Reset Button
	$("#resetBtn").click(function(){
		$("#searchDIV").find("input").each(function(){
			$(this).val('');
		});
		$('#dateRangeStart').data('daterangepicker').remove();
        $('#dateRangeStart').daterangepicker({    
            autoApply: true,
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        }, function(start, end, label) {
            $("#dateRangeStart").val(start.format('DD/MM/YYYY'));
            $("#dateRangeEnd").val(end.format('DD/MM/YYYY'));
        });
		$('#searchDIV').find('select').each(function() {
			$(this).val('');
			$("#searchForm")[0].reset();
		});
	});
	// END Reset Button

	// Search Button
	$('#searchBtn').click(function() {
		pagingCallBack(pageNumber, loadSearch);
	});
	// END Search Button
});


function pagingCallBack(pageNumber, fCallback){
    if(pageNumber > 1) bypassLoading = 1;

    var searchId = 'searchDIV';
    var searchData = buildSearchDataByType(searchId);
    var formData = {
        command             : "getPortfolioList",
        pageNumber          : pageNumber,
        searchData          : searchData
    };
    // if(!fCallback)
        fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadSearch(data, message) {
	$('#searchMsg').addClass('noData').html('<span><?php echo $translations['M00548'][$language]; //Search Successful ?></span>').show();
	setTimeout(function() {
			$('#searchMsg').removeClass('noData').html('').hide();
	}, 3000);
}

function loadDefaultListing(data, message) {
	var list = data.portfolioList;
	var tableNo;
	var grandTotal = data.grandTotal;

	if(list){
		var newList = [];
		$.each(list, function(k,v){
			var rebuildData ={
				entryDate: v['entryDate'],
				product_name : v['product_name'],
				productPrice: numberThousand(v['productPrice'], 2),
				RvValue: numberThousand(v['RvValue'], 2),
				status: v['status']
			};
				newList.push(rebuildData);
		});
	} 

	buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
	pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);


	$('#'+tableId).find('tr').each(function(){
	    $(this).find('td:eq(2), th:eq(2)').css('text-align', "right");
	    $(this).find('td:eq(3), th:eq(3)').css('text-align', "right");
	    // $(this).find('td:eq(3), th:eq(3)').css('text-align', "right");
	});

	// START DataTables
	$('#'+tableId+' th:nth-child(1)').before('<th></th>');
	$('#'+tableId+' td:nth-child(1)').before('<td style="width:30px;"></td>');


	$('#'+tableId).DataTable({
	    "paging":   false,
	    "ordering": false,
	    "info":     false,
	    "bFilter": false,
	    "language": {
	        "zeroRecords": "", 
	        "emptyTable": ""
	    },
	    responsive: {
	        details: {
	            type: 'column',
	            target: 'tr'
	        }
	    },
	    buttons: [
	    	'colvis'
		],
	    columnDefs: [
	        { className: 'control', orderable: false, targets: 0 },
	        { responsivePriority: 1, targets: 1 },
	        { responsivePriority: 2, targets: 2 },
	        { responsivePriority: 3, targets: 3 },
	    ]
	});

	// if($(window).width() >= 767) {
	// 	if(grandTotal){
	// 		$('#' + tableId).find('tbody').append(`
	// 		    <tr style="">
	// 		        <td colspan='2' class="text-right"><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</td>
	// 		        <td style="text-align: right;"> ${numberThousand(grandTotal, 2)} </td>
	// 		    </tr>
	// 		`);
	// 	}
	// }
}

</script>