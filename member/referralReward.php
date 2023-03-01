<?php include 'include/config.php'; ?>
<?php 
    session_start();

    if (in_array("Referral Reward", $_SESSION['blockedRights']['Reward Program'])){
     header("Location: dashboard.php");
    } 
?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<input type="hidden" name="" class="hideFunction">
<!-- begin:: Content -->
<div class="kt-container kt-grid__item kt-grid__item--fluid standardPageMargin form_bg">
	<div class="row" id="passwordSection" style="display: none;">
        <!-- Transaction password Section -->
        <div class="col-12 PageTitle">
            <?php echo $translations['M00645'][$language] //Please enter your transaction password to process ?>
        </div>
        <div class="col-12 col-lg-6 col-md-6 my-3">
            <div class="row">
                <div class="col-12 col-md-4 pt-1" >
                    <h5 class="mt-2" style="color:#000;"><?php echo $translations['M00646'][$language] //Transaction password ?></h5>
                </div>
                <div class="col-12 col-md-6">
                    <input id="transactionPassword" class="form-control ProductSansStyle searchPlaceholderStyle searchInputStyle" type="password" placeholder="<?php echo $translations['M00647'][$language] //Enter your transaction password ?>">
                </div>
            </div>
        </div>


        <div class="col-12 mt-4 mb-5">
                <button class="btn btnPrimary" type="button" name="button" id="next"><?php echo $translations['M00649'][$language] //Next ?></button>
        </div>
        <!-- END Transaction password Section -->
    </div>

	<div class="row" id="contentSection" style="display: none;">
		<!-- Search Section -->
		<div class="col-12 PageTitle">
			<?php echo $translations['M00019'][$language]; //Search Option ?>
		</div>
		<div class="row mx-0" id="searchDIV" style="width: 100%">
			<form class="row px-3 my-3" id="searchId" style="width: 100%">
				<div class="col-12 col-lg-5 col-md-12">
					<div class="row form-group">
						<div class="col-12 col-lg-3 col-md-2 pt-1">
							<h5 class="mt-2 text-lg-right text-left" style="color:#000;"><?php echo $translations['M00020'][$language]; //Date Range ?></h5>
						</div>
						<div class="col-12 col-lg-4 col-md-4">
							<input class="form-control ProductSansStyle searchPlaceholderStyle searchInputStyle" id="dateRangeStart" name="start" dataName="createdAt" dataType="dateRange" type="text" placeholder="<?php echo $translations['M00021'][$language]; //Search a date from ?>" value="" autocomplete="off">
						</div>
						<div class="d-none d-sm-block" style="font-size: 23px;">
							-
						</div>
						<div class="col-12 col-lg-4 col-md-4">
							<input class="form-control ProductSansStyle searchPlaceholderStyle searchInputStyle mt-3 mt-sm-0" id="dateRangeEnd" name="end" dataName="createdAt" dataType="dateRange" type="text" placeholder="<?php echo $translations['M00022'][$language]; //Search a date to ?>" value="" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="col-12 mt-2 mb-5">
						<button id="searchBtn" class="btn btnPrimary" type="button" name="button"><?php echo $translations['M00023'][$language]; //Search ?></button>
						<span> <i id="resetBtn" class="fa fa-repeat ml-3" style="color:#696969; font-size: 20px;  transform: rotate(-40deg); vertical-align: text-top; cursor: pointer;" id=""></i> </span>
				</div>
			</form>
		</div>
		<!-- END Search Section -->

		<!-- Table Section -->
		<div class="col-12 PageTitleSub" style="margin-top: 30px;">
			<?php echo $translations['M00024'][$language]; //REFERRAL REWARD ?>
		</div>
		<div class="col-12 my-3" id="totalDiv" style="display: none;">
			<span class="ProductSansStyle f-16 blueFontStyle" style=""><?php echo $translations['M00025'][$language]; //Total Referral Reward ?>: <span id="totalReferralReward"></span></span>
		</div>
		<div class="col-12">
			<hr>
		</div>
		<div id="searchMsg" class="col-12 noData" style="display: none; margin-bottom: 3.5rem;"></div>
		<div class="col-12 items" style="overflow-x: auto;" id="referralRewardDiv">
			
		</div>

		<div class="col-12">
			<hr>
		</div>

		<!-- pagination -->
		<div class="col-12">
			<ul id="pageList" class="pagination justify-content-center ProductSansStyle" style="height: 35px;">
		
			</ul>
		</div>
		<!-- END pagination -->

		<!-- END Table Section -->

	</div>
</div>
<!-- end:: Content -->

<?php include 'footer.php'; ?>
</body>

<!-- end:: Page -->

<!-- begin::Scrolltop -->
<?php include 'backToTop.php' ?>
<!-- end::Scrolltop -->

<?php include 'sharejs.php'; ?>



<!-- end::Body -->
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

var divId    = 'referralRewardDiv';
var tableId  = 'referralRewardTable';
var pagerId  = 'pageList';
var btnArray = {};
var thArray  = Array(
		"<?php echo $translations['M00026'][$language]; //Date ?>",
		"<?php echo $translations['M00027'][$language]; //From Username ?>",
		"<?php echo $translations['M00028'][$language]; //From Name ?>",
		"<?php echo $translations['M00029'][$language]; //Package Placed ?>",
		"<?php echo $translations['M00030'][$language]; //Package Price ?>",
		"<?php echo $translations['M00730'][$language]; //Accelerated % ?>",
		"<?php echo $translations['M00031'][$language]; //Referral Reward ?>"
);

$(document).ready(function(){
	var checkPw = "<?php echo $_SESSION["ReportTransactionPassword"]; ?>";

	if(checkPw == 1){
			$("#passwordSection").show();
	}else{
			$("#contentSection").show();
			openListing();
	}

	$("#next").click(function(){
			$("input").each(function(){
					$(this).removeClass('is-invalid');
					$('.invalid-feedback').html("");
			});

			var tpassword = $("#transactionPassword").val();

			if(tpassword == "")
			{
					errorDisplay("transactionPassword","<?php echo $translations['M00648'][$language]; /* Please enter your transaction password */ ?>");
			}
			else
			{
					var formData  = {
					command : "verifyTransactionPassword",
					tPassword : tpassword
			};
			var fCallback = openListing;
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

			}
	});

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

function openListing(data, message)
{
	showCanvas();
	$("#passwordSection").hide();
	$("#contentSection").show();

	formData  = {command : "getInstanReferalBonusListing"};
	fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function pagingCallBack(pageNumber, loadSearch)
{
	if(pageNumber > 1) bypassLoading = 1;

	var searchId 	 = "searchId";
	var searchData = buildSearchDataByType(searchId);

	var formData   = {
			command     : "getInstanReferalBonusListing",
			pageNumber: pageNumber,
			searchData : searchData
	};

	if(!fCallback)
			fCallback = loadDefaultListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadSearch(data, message) {
		loadDefaultListing(data, message);
		$('#searchMsg').addClass('noData').html('<span>"<?php echo $translations['M00048'][$language]; //Please Enter Your Transaction Password ?>"<?php echo $translations['M00049'][$language]; //Search Successful ?></span>').show();
		setTimeout(function() {
				$('#searchMsg').removeClass('noData').html('').hide();
		}, 3000);
}

function loadDefaultListing(data, message)
{
	var referralRewardList = data.referalBonusList;
	var tableNo;
	var portfolioStatus

	if(!jQuery.isEmptyObject(referralRewardList)){
		$('#totalDiv').show();
		$('#totalReferralReward').text(data.totalAmount);


			var newList = [];
			$.each(referralRewardList, function(k,v){

					$.each(v, function(key,value){
							if (!value) {
									v[key]="-";
							}
					});

					var rebuildData ={
							date				:	v['bonus_date'],
							username			:	v['fromUsername'],
							name				:	v['fromName'],
							packagePlaced		:	v['productName'],
							packagePrice		:	v['receivable_amount'],
							acceleratedPercent	: 	v['referralPercentage'],   
							referralReward		:	v['payable_amount']
					};
					newList.push(rebuildData);
			});
	}else{
		$('#totalDiv').hide();
	}

	// buildTable(list, tableId, divId, thArray, btnArray, message, tableNo);
	buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
	pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);
}
</script>
