<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
	<div class="kt-container">
		<div class="col-12 pageTitle">
			<?php echo $translations['M00094'][$language]; //Waterbucket Bonus ?>
		</div>
	    <div class="col-12">
	    	<form id="searchDIV">
	    		<div class="col-12 px-0">
			        <div class="row">
			        	<div class="col-lg-3 col-md-6 col-12 form-group" >
                            <label>  <?php echo $translations['A01416'][$language]; /* From username */ ?> </label>
                            <input type="text" class="form-control" dataName="from_id_username" dataType="text">
                        </div>
			        	<div class="col-lg-3 col-md-6 col-12 form-group" id="datepicker">
			        	    <label><?php echo $translations['M00989'][$language] /*Date Range*/ ?></label>
			        	    <div class="input-daterange input-group" id="datepicker-range">
			        	    	<input id="dateRangeStart" type="text" class="input-sm form-control" name="start" dataType="dateRange" dataName="bonusDate" autocomplete="off">
			        	    	<span class="input-group-text"><?php echo $translations['M00283'][$language] /*to*/ ?></span>
			        	        <input id="dateRangeEnd" type="text" class="form-control" name="end" dataType="dateRange" autocomplete="off" dataName="bonusDate">
			        	  
			        	    </div>
			        	</div>
			        </div>
	    		</div>

	    		<div class="col-12 px-0">
	    				<button id="searchBtn" class="btn btn-primary" type="button" name="button"><?php echo $translations['M00052'][$language] /*Search*/ ?></button>
	    				<span> <i class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id="resetBtn"></i> </span>
	    		</div>

	    	</form>
	    </div>

	   
	</div>
</section>


<section class="pageContent" style="margin-bottom: 20px;">
	<div class="kt-container">
		<div class="col-12 mt-4">
			<div id="totalPrincipleAmount" class="pull-in col-12 px-0">
	        </div>
		    <form>
		        <div id="basicwizard" class="pull-in col-12 px-0">
		            <div class="tab-content b-0 m-b-0 p-t-0">
		                <div id="alertMsg" class="text-center" style="display: block;"></div>
		                <div id="portfolioDiv" class="table-responsive"></div>
		                <span id="paginateText"></span>
		                <div class="text-center">
		                    <ul class="pagination pagination-md" id="pagerList"></ul>
		                </div>
		            </div>
		        </div>
		    </form>
		    <div class="col-12">
		    	<button id="terminateBtn" class="btn btn-primary" type="button" name="button" style="display: none;"><?php echo $translations['M00047'][$language] //Termination ?></button>
		    </div>
		</div>
	</div>
</section>



<?php include 'footer.php'; ?>
</body>

<?php include 'backToTop.php' ?>
<?php include 'sharejs.php'; ?>

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

var divId    = 'portfolioDiv';
var tableId  = 'portfolioTable';
var pagerId  = 'pagerList';
var btnArray = {};

var thArray  = Array(
		"<?php echo $translations['A00969'][$language] ?>",
		"<?php echo $translations['A01416'][$language] ?>",
		"<?php echo $translations['A01417'][$language] ?>",
		"<?php echo $translations['M00336'][$language] ?>",
		"<?php echo $translations['A00973'][$language] ?>",
		"<?php echo $translations['M01795'][$language] ?>",
);


$(document).ready(function(){

	$("body").keyup(function(event) {
		if (event.keyCode == 13) {
			$("#searchBtn").click();
		}
	});
	
	var formData  = {
	  command: 'getWaterBucketBonusReport'
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
        	command     : "getWaterBucketBonusReport",
            pageNumber  : pageNumber,
            inputData   : searchData,

    };
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
   	var tableNo;
    if (data.bonusList){
        var newList = [];
        $.each(data.bonusList, function(k, v){
            var rebuildData = {
                bonusDate : v['bonus_date'],
                from_id_name: v['from_id_name'],
                from_id_username: v['from_id_username'],
                bonus_amount: (v['from_amount']),
                percentage: v['percentage'],
                bonus_received: (v['bonus_received'])
                // type: v['type']
            };
            newList.push(rebuildData);
      });
    }
    buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
    pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
}

function successMessage(data, message) {
	$('#terminatePortfolio').modal('hide');
	showMessage(message, "success", "<?php echo $translations['M00451'][$language]; /* Congratulations */ ?>","", "portfolio.php");
}
</script>
