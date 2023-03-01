<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/homepageResponsive.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/homepageMenu.css?v=<?php echo filemtime('css/homepageMenu.css'); ?>" rel="stylesheet" type="text/css" />
<?php include 'homepageMenu.php';?>
<form action="mailto:cs@jcv.tech" method="post" enctype="text/plain">
    <div class="text-center">
         <div class="userOverlay">
             <div class="d-flex justify-content-center align-items-center">       
                <img alt="user profile" src="./images/project/contact.png" class="mb-1" style="width: 100%;height: auto;" >
                         
                <div class="overlay">
                     <div class="pageTitleContact">
                        <span data-lang="M00030"><?php echo $translations['M01021'][$language]; //Contact Us ?></span>
                     </div>
                </div>
            </div>
            <div class="row center">
                <div class="col-md-8 pl-5 pr-5 pl-md-0 pr-md-0">
                    <div class="row center mt-4 ">
                        <div class="col-md-6 text-left">
                            <div class="form-group">
                                <label data-lang="M01178" class="titleContactus"><?php echo $translations['M01178'][$language]; //Full Name ?><span class="mustFill">*</span></label>
                                <input id="fullName" class="form-control inputDesign" type="text" name="name" placeholder="<?php echo $translations['M01179'][$language]; //YOUR name ?>">
                            </div>
                        </div>
                        <div class="col-md-6 text-left">
                                <div class="form-group">
                                    <label data-lang="M00039" class="titleContactus"><?php echo $translations['M00039'][$language]; //email ?> <span class="mustFill">*</span></label>
                                    <input id="email" class="form-control inputDesign" type="text" name="Email" placeholder="<?php echo $translations['M00276'][$language]; //email ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <div class="form-group">
                                    <label data-lang="M00363" class="titleContactus"><?php echo $translations['M00363'][$language]; //phone number ?><span class="mustFill">*</span></label>
                                    <input id="fullName" class="form-control inputDesign" type="text" name="Phone" placeholder="<?php echo $translations['M01180'][$language]; //your phone number ?>">
                                </div>
                            </div>
                            <div class="col-md-6 text-left">
                                <div class="form-group">
                                    <label data-lang="M00035" class="titleContactus"><?php echo $translations['M00064'][$language]; //subject ?><span class="mustFill">*</span></label>
                                    <input id="fullName" class="form-control inputDesign" type="text" name="Subject" placeholder="<?php echo $translations['M00333'][$language]; //enter your subject ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <div class="form-group">
                                    <label data-lang="M00145" class="titleContactus"><?php echo $translations['M00145'][$language]; //Message ?> <span class="mustFill">*</span>
                                    </label>
                                <div>
                                <textarea id="message" rows="5" type="text" name="message" class="form-control inputDesign" placeholder="<?php echo $translations['M00334'][$language]; //enter your message ?>"></textarea>
                                </div>
                            </div>                                 
                        </div>
                      
                    </div>
                    <div class="text-left">
                      <button id="btnSend"  value="Send" class="btn btn-primary mb-5" data-lang="M01181"><?php echo $translations['M01181'][$language]; //SEND MESSAGE ?></button>
                  </div>
                </div>
            </div>
        </div>
    </div> 
</form>
 <?php include 'homepageFooter.php' ?>
    
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>




<!-- <script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;


$(document).ready(function(){

	var formData  = {
		command: 'newsDisplay'
	};
	var fCallback = loadDefaultNewsListing;
	ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
});

function loadDefaultNewsListing(data, message, obj)
{

	var newsCard = "";
	var newsDetails = "";
    var tempMediaUrl = "<?php echo $config['tempMediaUrl']; ?>";

	if (data)
	{
		$("#newNotification").hide();


		$.each(data.details, function(key, value){
			var dateTime = value["created_at"];
			var date = dateTime.split(" ", 1);

            var imageUrl = "";

            if(value["base_64"] == null){
                imageUrl =`<img src="images/project/announcementImg.png" class="imgFit">`;
            } else {
                imageUrl =`<img src="${tempMediaUrl}${value["base_64"]}" class="imgFit">`;
            }

			newsCard +=`

                <div class="col-lg-4 col-md-4 col-12 mb-4">
                    <div class="newsBox">
                        <div class="newUpdate ${value['isNew']==1?"active":""}" data-lang="M01003">
                            <?php echo $translations['M01003'][$language]; //New ?>
                        </div>
                        <div class="position-relative">
                            ${imageUrl}
                            <div class="downloadNews">
                                <a href="javascript:;" id="${value["id"]}" onclick="newsPop(this)">
                                    <i class="fas fa-ellipsis-h"></i>
                                </a>
                            </div>
                        </div>

                        <div class="p-3">
                            <div class="fixNewsHeight">
                                <div class="updatedTime">
                                    ${date}
                                </div>
                                <div class="contentTitle">
                                    ${value["subject"]}
                                </div>
                                <div class="contentItems">
                                    ${value['description']}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			`;

			newsDetails +=`
                <div class="modal fade" id="newsCard${value["id"]}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
                    <div class="modal-dialog modal-lg newsModal" role="document">
                        <div class="modal-content">
                            <div class="modal-header canvasheader">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body modalBodyFont">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-8 col-12 newsModalImg">
                                            ${imageUrl}
                                        </div>
                                        <div class="col-lg-4 col-12 mt-5 mt-lg-0 text-left">
                                            <div class="modalNewsTitle">
                                                ${value["subject"]}
                                            </div>
                                            <div class="modalLine my-4"></div>
                                            <div class="newsDes" style="margin-top: 10px;">${htmlDecode(value["description"])}</div>
                                            <div style="${value['attachment_name']?"":"display:none;"}">
                                                <a class="btn btn-primary" href="/scripts/reqDownLoadCDN.php?fileName=${value["attachment_name"]}&subject=${value["subject"]}" target="_blank" data-lang="M00063">
                                                    <?php echo $translations['M00063'][$language]; //Download ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>
			`;

		});

        $('#newsSection').html(newsCard);
        $('#newsDetails').html(newsDetails);

        if(newsID){
            $('#newsCard'+newsID).modal('show');
        }
	}
	else if (data == "")
	{
		// var message = obj.statusMsg;
		// $('#noNews').html(`<span data-lang='M00062'><?php echo $translations['M00062'][$language]; //No News ?></span>`);

        $('#newsSection').html(`
            <div class="col-12 text-center">
                <div class="mb-3"><img src="images/project/noResultFound.png" width="80px"/></div>
                <div data-lang="M00367"><?php echo $translations['M00367'][$language]; /* No Results Found */ ?></div>
                
            </div>`);
	}
}



</script>
 -->