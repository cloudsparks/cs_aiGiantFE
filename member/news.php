<?php 
    session_start();

    if (in_array("News", $_SESSION['blockedRights'])){
     header("Location: dashboard");
    } 
?>
<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
    <div class="kt-container">
        <div class="text-center">
            <div class="pageTitle">
                <span data-lang="M00030"><?php echo $translations['M00030'][$language]; //News ?></span>
            </div>
        </div>

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10">
                    <div class="listingPadding">
                        <div class="col-12">
                            <div class="row" id="newsSection">

                            </div>           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="newsDetails"></div>

<?php include 'footer.php'; ?>
</body>


<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;

var newsID = "<?php echo $_POST['newsID']; ?>";

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
                  
                            <div class="col-md-4  col-lg-4 mb-4 d-flex align-items-stretch">
                                <div class="card cardwidth">
                                    <div class="card-img-top">
                                        ${imageUrl}
                                    </div>                                   
                                    <div class="card-body d-flex flex-column beigeBackground">
                                        <h5 class="card-title">${value["subject"]}</h5>
                                        <p class="card-text cardText">${htmlDecode(value["description"])}</p>
                                        <div class="textUnderline">
                                            <a href="javascript:;" id="${value["id"]}" onclick="newsPop(this)" class="card-link">Read more</a>
                                        </div>                                           
                                    </div>
                                </div>
                            </div>
                      
                
			`;

			newsDetails +=`
                <div class="modal fade" id="newsCard${value["id"]}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
                    <div class="modal-dialog modal-lg newsModal" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close btnClose" data-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body modalBodyFont">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 newsModalImg">
                                            ${imageUrl}
                                        </div>
                                        <div class="col-lg-6 col-12 mt-5 mt-lg-0 text-left">
                                            <div class="modalNewsTitle">
                                                ${value["subject"]}
                                            </div>
                                            <div class="modalLine my-4"></div>
                                            <div style="margin-top: 10px;">${htmlDecode(value["description"])}</div>
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
            <div class="col-12 text-center listingWrapper">
                <div class="mb-3"><img src="images/project/noResultFound.png" width="80px"/></div>
                <div data-lang="M00367"><?php echo $translations['M00367'][$language]; /* No Results Found */ ?></div>
                
            </div>`);
	}
}

function newsPop(element)
{
	$('#newsCard'+element.id).modal('show');
}

function createDownloadFile(element) {
	var formData  = {
			command: 'newsDownload',
			announcementID: element.id
		};

		$.redirect(url, formData);
}

function htmlDecode(input){
  var e = document.createElement('textarea');
  e.innerHTML = input;
  // handle case of empty input
  return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
}

</script>
