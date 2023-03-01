<?php
include 'include/config.php';
include 'head.php';
include 'header.php';


$currentTime = microtime(true) * 1000;
$stopRecord = $_SESSION["stopRecord"];
?>

<link href="css/dashboard.css?v=<?php echo filemtime('css/dashboard.css'); ?>" rel="stylesheet" type="text/css" />

<div class="kt-container">
	<div class="col-12 mt-5 px-5">
		<div class="text-center mt-5">
			<div class="d-flex justify-content-center">
				<div>
					<img src="/images/calender_icon.png">
					<div id="totalAccumulated" class="totalAccumulated"></div>
				</div>
				<span data-lang="M00985" class="pageTitle"><?php echo $translations['M03714'][$language] /*Our Course*/ ?></span>
			</div>
		</div>
		<div class="course_row mb-5">
			<div class="text-center">
				<button class="tablinks basic_class active" onclick="opentab(event, '300')"><?php echo $translations['P00031'][$language]; ?></button>
			</div>
			<div class="text-center">
				<button class="tablinks basic_class" style="background-color: #146DEF;" onclick="opentab(event, '1000')"><?php echo $translations['P00032'][$language]; ?></button>
			</div>
			<div class="text-center">
				<button class="tablinks basic_class" style="background-color: #E4A700;" onclick="opentab(event, '3000')"><?php echo $translations['P00033'][$language]; ?></button>
			</div>
			
		</div>		
		<div id="videoDisplay" class="row"></div>
	</div>

	
</div>
<?php include 'footer.php'; ?>
</body>


<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>
</html>

<div class="modal fade successModal" id="successFundIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 18.9884px; display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" data-lang='M00451'><?php echo $translations['M00451'][$language]; //Congratulations ?></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage" data-lang='M00033'><?php echo $translations['M00033'][$language]; //You has successful fund in ?></div>
            </div>
            <div class="modal-footer">
            	<button id="closeBtn" type="button" class="btn btnDefaultModal" data-dismiss="modal" data-lang='M00112'><?php echo $translations['M00112'][$language]; //Close ?></button>
            </div>
        </div>
    </div>
</div>

<script src="https://embed.cloudflarestream.com/embed/sdk.latest.js"></script>
<script>
//
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var fCallback = "";
var walletNumber;

var divId    = 'portfolioDiv';
var tableId  = 'portfolioTable';
var pagerId  = 'pagerList';
var btnArray = {};
var btnArray2 = {};
var packageID;
let packagePrice;
var quantity;
var packageType;
var depositPercentage;
var tranchePackageID;
var chinaContractDays = 30;
var lockPackageId;
var campaignId;
var allHtml = [];
var campaignList = [];
var pdfSelected;

var intervals = [];
var countDowns = [];

var thArray  = Array(
	'<span data-lang="M00392" class="bottom"><?php echo $translations['M00392'][$language]; ?></span>', //Date
	'<span data-lang="A00623" class="bottom"><?php echo $translations['A00623'][$language]; ?></span>', //Product Name
	'<span data-lang="M00111" class="bottom"><?php echo $translations['M00111'][$language]; ?></span>', //Type
	'<span data-lang="A01091" class="bottom"><?php echo $translations['A01091'][$language]; ?></span>', //Packages Price
	'<span data-lang="M00553" class="bottom"><?php echo $translations['M00553'][$language]; ?></span>', //Payment Amount
	'<span data-lang="M00011" class="bottom"><?php echo $translations['M00011'][$language]; ?></span>', //Status
);

var thArrayVoucher  = Array(
	'<span data-lang="M03646" class="bottom"><?php echo $translations['M03646'][$language]; ?></span>', //Voucher code
	'<span data-lang="M03647" class="bottom"><?php echo $translations['M03647'][$language]; ?></span>', //Voucher BV
	'<span data-lang="M00011" class="bottom"><?php echo $translations['M00011'][$language]; ?></span>', //Status
	'<span data-lang="M03644" class="bottom"><?php echo $translations['M03644'][$language]; ?></span>', //Redeemed By
	'<span data-lang="M03645" class="bottom"><?php echo $translations['M03645'][$language]; ?></span>', //Redeemed Date
	
);

var translations = <?php echo json_encode($translations)?>;
var language = "<?php echo $language?>";

$(document).ready(function(){

	opentab('','300');
	// showMessage('Testing 123', 'success' ,  'Title')

	if ( $(window).width() >= 1200 ) {
		const slider = document.querySelector('.items');

		if(slider) {
			let isDown = false;
			let startX;
			let scrollLeft;

			slider.addEventListener('mousedown', (e) => {
				isDown = true;
				slider.classList.add('active');
				startX = e.pageX - slider.offsetLeft;
				scrollLeft = slider.scrollLeft;
			});
			slider.addEventListener('mouseleave', () => {
				isDown = false;
				slider.classList.remove('active');
			});
			slider.addEventListener('mouseup', () => {
				isDown = false;
				slider.classList.remove('active');
			});
			slider.addEventListener('mousemove', (e) => {
				if(!isDown) return;
				e.preventDefault();
				const x = e.pageX - slider.offsetLeft;
			const walk = (x - startX) * 3; //scroll-fast
			slider.scrollLeft = scrollLeft - walk;
			});
		}

	}

	if("<?php echo $_SESSION['memo']; ?>") {
		$('#popUpModal').modal('show');
		"<?php unset($_SESSION['memo']); ?>"
	}

	// $(".quickSelectItem").click(function(){
	// 	$(".quickSelectItem").removeClass("active");
	// 	$(this).addClass("active");

	// 	var type = $(this).attr("data-type");
	// 	var amt = $(this).attr("data-amt");

	// 	if(type == "fix") {
	// 		$('#creditUnitInp').val(amt);
	// 	}else{
	// 		$('#creditUnitInp').val("");
	// 	}
	// });

	var recordToken = "<?php echo $stopRecord ?>";

	  if(recordToken == 1){
	      // sessionStorage.setItem('Dashboard Refresh',"<?php echo $currentTime?>");
	      // stopRecordTime("Dashboard Refresh", false); // Temporarily do not sending for this 04Sept
	  }else{
	      stopRecordTime("Login Performance", true);
	  }
});

// $(document).on('click','.quickSelectItem', function(){
function selectItem(e){
	$(".quickSelectItem").removeClass("active");
	$(e).addClass("active");

	var type = $(e).attr("data-type");
	var amt = $(e).attr("data-amt");

	if(type == "fix") {
		$('#creditUnitInp').val(amt);
		$('#creditUnitInp2').val(amt);
	}else{
		$('#creditUnitInp').val("");
		$('#creditUnitInp2').val("");
	}
}

function opentab(evt, package) {
	console.log(package);
	let searchData = [];
	searchData.push({ dataName: "package",dataValue: package });
	var formData  = {
	    command: 'videoList',
		 inputData: searchData,
	};
	console.log(formData);
	var fCallback = loadVideo;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	// document.getElementById(package).style.display = "block";
	if (evt != '') evt.currentTarget.className += " active";
}

function loadVideo(data, message) {

	getAccumulatedTotal();

	var videoListing = data.videoListing;

	var videoDisplay = "";
	let videoid = [];
	$.each(videoListing, function(k, v) {

		videoDisplay += `
			<div class="col-md-4 col-12 mb-4" style="position:relative;">
				<iframe
					id="video-${k}"
					src="${v['link']}/iframe"
					style="width:100%;"
					allow="accelerometer; gyroscope; encrypted-media; picture-in-picture;"
					allowfullscreen="true"
					class="courseVideo"
					></iframe>
				<div style="position:absolute;bottom:20px;left:30px;color:#fff;font-weight:bold;">${v['name']}</div>
			</div>
		`
		videoid.push("video-" + k);
	});
	$('#videoDisplay').html(videoDisplay);
	
	$.each(videoid, function(k, v) {
		loadVideoStream(v);
	});
}

function loadVideoStream (id) {
	var myvideo = document.getElementById(id);
	//console.log(vid);
	//vid.onended = function() {
	//  alert("The video has ended");
	//};
	const player = Stream(document.getElementById(id));
	console.log(player);
	player.addEventListener('ended', () => {
		console.log('end');
		var formData  = {
			command: 'memberWatchVideoEnd',
		};
		var fCallback = watchVideoCallback;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	});
	player.play().catch(() => {
		console.log(id + 'playback failed, muting to try again');
		player.muted = true;
		// player.play();
	});
}

function watchVideoCallback (data, message) {
	let accumulate = 0;
	if (data.accumulate) {
		accumulate = data.accumulate
		$('#totalAccumulated').html(accumulate);
	}
}

function getAccumulatedTotal () {
	var formData  = {
		command: 'getAccumulatedVideoCount',
	};
	var fCallback = accumulatedVideoCountCallback;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function accumulatedVideoCountCallback (data, message) {
	let accumulate = 0;
	if (data.accumulate) accumulate = data.accumulate
	$('#totalAccumulated').html(accumulate);
}
</script>

<style>
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
