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
                    <!-- Back button -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div id="backBtn" class="btn btn-primary waves-effect waves-light m-b-20">
                                <?php echo $translations['A00115'][$language]; /* Back */?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <!-- <h4 class="header-title m-t-0 m-b-30">Add Announcement</h4> -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <form role="form" enctype="multipart/form-data">
                                            <div id="basicwizard" class=" pull-in">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label>
                                                                Name
                                                            </label>
                                                             <?php $languages = $config['languages']; ?>
                                                                <?php foreach($languages as $key => $value) { ?>
                                                                      <input id="<?php echo $key; ?>Name" type="text" class="form-control" style="margin-bottom: 10px" placeholder="<?php echo $value; ?>" langVal="<?php echo $key; ?>" required/>
                                                                <?php } ?>
                                                            <span id="nameLangError" class="errorSpan text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label>
                                                                Ring Design
                                                            </label>
                                                             <?php $languages = $config['languages']; ?>
                                                                <?php foreach($languages as $key => $value) { ?>
                                                                      <input id="<?php echo $key; ?>RingDesign" type="text" class="form-control" style="margin-bottom: 10px" placeholder="<?php echo $value; ?>" langVal="<?php echo $key; ?>" required/>
                                                                <?php } ?>
                                                            <span id="ringDesignLangError" class="errorSpan text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label>
                                                                Material
                                                            </label>
                                                             <?php $languages = $config['languages']; ?>
                                                                <?php foreach($languages as $key => $value) { ?>
                                                                      <input id="<?php echo $key; ?>Material" type="text" class="form-control" style="margin-bottom: 10px" placeholder="<?php echo $value; ?>" langVal="<?php echo $key; ?>" required/>
                                                                <?php } ?>
                                                            <span id="materialLangError" class="errorSpan text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                        <label>Price</label>
                                                        <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="price" type="text" class="form-control" required/>
                                                        <span id="priceError" class="errorSpan text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div id="appendImage">
                                                            <!-- <div class="col-md-4">
                                                                <div class="popupEmallImageWrapper default">
                                                                    <span class="dtxt">Default</span>
                                                                    <input type="hidden" id="storeFileData1">
                                                                    <input type="hidden" id="storeFileName1">
                                                                    <input type="hidden" id="storeFileSize1">
                                                                    <input type="hidden" id="storeFileType1">
                                                                    <input type="hidden" id="storeFileFlag1">
                                                                    <input type="file" id="fileUpload1" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('1', this)">
                                                                    <div>
                                                                        <a href="javascript:;" onclick="$('#fileUpload1').click()" class="btn btn-primary btnUpload">Upload</a>
                                                                        <span id="fileName1" class="fileName">No File Uploaded</span>
                                                                        <a id="viewImg1" href="javascript:;" class="btn" style="display: none;padding:6px;" onclick="showImg('1')">
                                                                            <i class="fa fa-eye"></i>
                                                                        </a>
                                                                        <a id="deleteImg1" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('1')">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="addEmallImage" onclick="addImage()">
                                                                <b><i class="fa fa-plus-circle"></i></b>
                                                                <span>Add Image</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                        <label>Category</label>
                                                        <select id="category" class="form-control">
                                                       </select>
                                                        <span id="categoryError" class="errorSpan text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                        <label>Status</label>
                                                        <select id="status" class="form-control">
                                                            <option value= "Active">Active</option>
                                                            <option value= "Inactive">inactive</option>   
                                                       </select>
                                                        <span id="statusError" class="errorSpan text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations['A00323'][$language]; /* Submit */?>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 m-b-20">
                            <div id="submitBtn" class="btn btn-primary waves-effect waves-light">Search</div>
                        </div> -->
                    </div><!-- End row -->
                </div><!-- container -->
            </div><!-- content -->
            <?php include("footer.php"); ?>
        </div><!-- End content-page -->
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <div class="modal fade" id="showImage" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        View Image
                    </h4>
                </div>
                <div class="modal-body" style="overflow: auto; text-align: center">
                    <img id="modalImg" width="80%" src="">
                    <img id="modalImg2" class="hide" width="80%" src="">  
                    <br>
                    <div class="imageColumn mr-2"><img id="demoImage1" width="100%"></div>
                    <div class="imageColumn2 mr-2"><img id="demoImage2" width="100%"></div>
                </div>
                <div class="modal-footer">
                    <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); 
    	echo "<script>var languages = ".json_encode($languages).";</script>";
    ?>

    <script>
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqAdmin.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var language        = "<?php echo $language; ?>";
        var selectedLang    = [];
        var categoryOption  = null;
        var ID       = "<?php echo $_POST['id'] ?>";

        $(document).ready(function() {

            fCallback = getCategoryOption;
            formData  = {command: 'getEmallCategory'};
            ajaxSend('scripts/reqAdmin.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            fCallback = loadDefaultListing;
            formData  = {
                command: 'getEmallDesignDetail',
                ID: ID
            }
            ajaxSend('scripts/reqEmall.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#submitBtn').click(function() {

            	var nameLang = {};
            	var ringDesignLang = {};
            	var materialLang =  {};
            	// console.log(languages);
            	$.each(languages, function(k, v){

            		nameLang[k] = $('#'+k+'Name').val();
            		ringDesignLang[k] = $('#'+k+'RingDesign').val();
            		materialLang[k] = $('#'+k+'Material').val();

            	});

                var price = $('#price').val();
                var category = $('#category').val();
                var status = $('#status').val();

                var uploadData = getImgObj();

                $('.errorSpan').empty();

                fCallback = submitCallback;
                formData  = {
                    command: 'editEmallDesign',
                    emallDesignID: ID,
                    name : nameLang,
                    engagementRing : ringDesignLang,
                    material : materialLang,
                    price : price,
                    category : category,
                    status : status,
                    image : uploadData
                };

                ajaxSend('scripts/reqUpload.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            });

            $('#backBtn').click(function() {
                $.redirect('emallDesignListing.php');
            });
        });

        function loadDefaultListing(data,message) {
            var d = data.diamondDesignData;

            $.each(languages, function(k, v){
				$('#'+k+'Name').val(d.name[k]);
				$('#'+k+'RingDesign').val(d.engagement_ring[k]);
				$('#'+k+'Material').val(d.material[k]);

        	});

            // $('#englishName').val(d.name.english);
            // $('#chineseSimplifiedName').val(d.name.chineseSimplified);
            // $('#chineseTraditionalName').val(d.name.chineseTraditional);
            // $('#englishRingDesign').val(d.engagement_ring.english);
            // $('#chineseSimplifiedRingDesign').val(d.engagement_ring.chineseSimplified);
            // $('#chineseTraditionalRingDesign').val(d.engagement_ring.chineseTraditional);
            // $('#englishMaterial').val(d.material.english);
            // $('#chineseSimplifiedMaterial').val(d.material.chineseSimplified);
            // $('#chineseTraditionalMaterial').val(d.material.chineseTraditional);
            $('#price').val(d.price);
            $('#category').val(d.type);
            $('#status').val(d.status);

            if(d.diamondDesignImage) {

                var ind = 0;

                $.each(d.diamondDesignImage, function(i,obj){
                    var wrapperLength = ind+1;
                    var defaultClass = "";
                    var closeButton = `<a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">&times;</a>`;

                    if(ind==0) {
                        defaultClass = "default";
                        closeButton = `<span class="dtxt"><?php echo $translations["A01397"][$language];?></span>`;
                    }


                    var imgF = '';
                    var imgView = 'none';

                    if(i) {
                        imgF = '1';
                        imgView = 'inline-block';
                    }

                    var wrapper = `

                        <div class="col-md-4">
                            <div class="popupEmallImageWrapper ${defaultClass}">
                                ${closeButton}
                                <input type="hidden" id="storeFileData${wrapperLength}" value="${obj.data || ''}">
                                <input type="hidden" id="storeFileName${wrapperLength}" value="${i || ''}">
                                <input type="hidden" id="storeFileType${wrapperLength}" value="${obj.type || ''}">
                                <input type="hidden" id="storeFileFlag${wrapperLength}" value="${imgF}">
                                <input type="file" id="fileUpload${wrapperLength}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${wrapperLength}', this)">
                                <div>
                                    <a href="javascript:;" onclick="$('#fileUpload${wrapperLength}').click()" class="btn btn-primary btnUpload">Upload</a>
                                    <span id="fileName${wrapperLength}" class="fileName">${i || 'No Image'}</span>
                                    <a id="viewImg${wrapperLength}" href="javascript:;" class="btn" style="display: ${imgView};padding:6px;" onclick="showImg('${wrapperLength}')">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a id="deleteImg${wrapperLength}" href="javascript:;" class="btn" style="display:${imgView};padding:6px;" onclick="deleteImg('${wrapperLength}')">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    `;

                    $("#appendImage").append(wrapper);

                    ind+=1;
                });
            }
        }

        function addImage(){
            var wrapperLength = $(".popupEmallImageWrapper").length;
            if(wrapperLength < 3){
                var wrapperLength = $(".popupEmallImageWrapper").length + 1;
                var wrapper = `
                    <div class="col-md-4">
                        <div class="popupEmallImageWrapper">
                            <a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">&times;</a>
                            <input type="hidden" id="storeFileData${wrapperLength}">
                            <input type="hidden" id="storeFileName${wrapperLength}">
                            <input type="hidden" id="storeFileSize${wrapperLength}">
                            <input type="hidden" id="storeFileType${wrapperLength}">
                            <input type="hidden" id="storeFileFlag${wrapperLength}">
                            <input type="file" id="fileUpload${wrapperLength}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff" onchange="displayFileName('${wrapperLength}', this)">
                            <div>
                                <a href="javascript:;" onclick="$('#fileUpload${wrapperLength}').click()" class="btn btn-primary btnUpload">Upload</a>
                                <span id="fileName${wrapperLength}" class="fileName">No File Uploaded</span>
                                <a id="viewImg${wrapperLength}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="showImg('${wrapperLength}')">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a id="deleteImg${wrapperLength}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('${wrapperLength}')">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                `;

                $("#appendImage").append(wrapper);

                if(wrapperLength >= 3){
                    $(".addEmallImage").attr("style","display: none");
                }
            }   
        }

        function getImgObj() {
            var uploadData = {};

            $(".popupEmallImageWrapper").each(function(i, obj) {
                var imgData = $(obj).find('[id^="storeFileData"]').val();
                var imgName = $(obj).find('[id^="storeFileName"]').val();
                var imgType = $(obj).find('[id^="storeFileType"]').val();
                var imgFlag = $(obj).find('[id^="storeFileFlag"]').val();

                var defaultImage = (imgData=='')?'':1;

                if(i > 0) {
                    defaultImage = '';
                }

                if(imgData && imgData != "") {
                    uploadData[i] = {
                        imageData: imgData,
                        imageName: imgName,
                        imageType: imgType,
                        imageFlag: imgFlag,
                    };
                }
            });
            return uploadData;
        }

        function closeDiv(n) {
            var lang = $(n).parent().find('.fileUploadLang').val();
            if(lang != "") {
                var inArr = $.inArray(lang, selectedLang);
                selectedLang.splice(inArr, 1)
            }

            $(n).parent().parent().remove();

            var wrapperLength = $(".popupEmallImageWrapper").length;
            if(wrapperLength < 3){
                $(".addEmallImage").removeAttr("style");
            }
        }

        function deleteImg(id) {
            $("#fileUpload"+id).val("");
            $("#fileName"+id).text("No File Uploaded");
            $("#storeFileData"+id).val("");
            $("#storeFileName"+id).val("");
            $("#storeFileSize"+id).val("");
            $("#storeFileType"+id).val("");
            $("#storeFileFlag"+id).val("");

            $("#viewImg"+id).hide();
            $("#deleteImg"+id).hide();

            var lang = $("#fileUploadLang"+id).val();
            $("#fileUploadLang"+id).html(buildLangOption());
            $("#fileUploadLang"+id).removeAttr('disabled');

            if(lang != "") {
                var inArr = $.inArray(lang, selectedLang);
                selectedLang.splice(inArr, 1)
            }
        }

        function buildCategoryOption() {
            var html = '';
            if(categoryOption) {
                $.each(categoryOption, function(i, obj) {
                    html += `<option value="${obj.name}">${obj.display}</option>`;
                });
            }

            return html;
        }

        function displayFileName(id, n) {
            var dFileName = $("#fileName"+id);

            if (n.files && n.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // $('#blah').attr('src', e.target.result);
                    // $("#imgData"+input.id).empty().val(reader["result"]);
                    dFileName.text(n.files[0]["name"]);
                    // $("#imgSize"+input.id).empty().val(input.files[0]["size"]);
                    // $("#imgType"+input.id).empty().val(input.files[0]["type"]);
                    // $("#imgFlag"+input.id).empty().val("1");

                    $("#storeFileData"+id).val(reader["result"]);
                    $("#storeFileName"+id).val(n.files[0]["name"]);
                    $("#storeFileSize"+id).val(n.files[0]["size"]);
                    $("#storeFileType"+id).val(n.files[0]["type"]);
                    $("#storeFileFlag"+id).val('1');

                    $("#viewImg"+id).css('display', 'inline-block');
                    $("#deleteImg"+id).css('display', 'inline-block');
                };

                reader.readAsDataURL(n.files[0]);
            }
        }

        function showImg(n) {
            $("#modalImg").attr('src', $("#storeFileData"+n).val());
            $("#showImage").modal();
        }

        function getCategoryOption(data, message){
            categoryOption = data;

            $("#category").html(buildCategoryOption());
        }
        
        function submitCallback(data, message) {
            showMessage(message, 'success', 'Add Design', 'upload', 'emallDesignListing.php');
        }

    </script>
</body>
</html>
