<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
    <div class="kt-container">

        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-10">

                    <div class="listingPadding">
                        <div class="col-12 pageTitle">
                            <span data-lang="M00063"><?php echo $translations['M00063'][$language] /*Download*/ ?></span>
                        </div>
                        <div class="col-12">
                            <form>
                                <div id="basicwizard" class="pull-in col-12 px-0">
                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                        <div id="alertMsg" class="text-center" style="display: block;"></div>
                                        <div id="tableDiv" class="table-responsive"></div>
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

    var divId    = 'tableDiv';
    var tableId  = 'createTableID';
    var pagerId  = 'pagerList';
    var btnArray = {};

    var thArray  = Array(
        '<span data-lang="M00064" class="bottom"><?php echo $translations['M00064'][$language]; //Subject ?></span>',
        '<span data-lang="M00065" class="bottom"><?php echo $translations['M00065'][$language]; //Description ?></span>',
        '<span data-lang="M00541" class="bottom"><?php echo $translations['M00541'][$language]; //File Name ?></span>',
        '<span data-lang="M00063" class="bottom"><?php echo $translations['M00063'][$language]; //Download ?></span>'
    );

    $(document).ready(function() {
        var formData  = {
        	command: 'documentDownloadList'
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function loadDefaultListing(data, message) {

        var list = data.documentList;
        var tableNo;

        if (list) {
            var newList = [];
            var btn = [];

            $.each(list, function(k, v){

                var createButton = `<a class="btn btn-primary downloadDiv" href="/scripts/reqDownLoadCDN.php?fileName=${v["attachment_name"]}&subject=${v["subject"]}" target="_blank"><i class="fa fa-download"></i></a>`;

                var rebuildData = {
                    subject : v['subject'],
                    description : v['description'],
                    fileName : v['attachment_name'],
                    download : createButton
                };

                newList.push(rebuildData);
            });
        }

        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $.each(btn, function(i, obj){
            if(obj.status == 1){
                $("#"+tableId+" tbody tr").eq(i).find("td:last-child").html(`<a onclick="confirmDelete('${obj.id}')" class="btn waves-effect waves-light">Inactive</a>`);
            }
        });
    }

    function pagingCallBack(pageNumber, fCallback){
            if(pageNumber > 1) bypassLoading = 1;

            var searchID = 'searchForm';
            var searchData = buildSearchDataByType(searchID);
            var formData  = {
	        	command     : 'documentDownloadList',
	        	pageNumber  : pageNumber,
                inputData   : searchData
	        };
            if(!fCallback)
                fCallback = loadSearch;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span>'+'Search successful.'+'</span>').show();
        setTimeout(function() {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }

    function createDownloadFile(element) {
        var formData  = {
            command: 'documentDownload',
            documentID: element.id
        };

        $.redirect(url, formData);
    }
</script>
