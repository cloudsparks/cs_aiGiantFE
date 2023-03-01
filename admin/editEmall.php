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
                                <!-- <h4 class="header-title m-t-0 m-b-30">Add Pop Up Memo</h4> -->
                                <div class="row">
                                        <form role="form" enctype="multipart/form-data">
                                            <div id="basicwizard" class=" pull-in">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label>
                                                                <?php echo $translations["A01387"][$language]; /* Serial Number */?>
                                                            </label>
                                                            <input id="serialNumber" type="text" class="form-control" required/>
                                                            <span id="serialNumberError" class="errorSpan text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label>
                                                                <?php echo $translations["A01388"][$language] /* GIA Number */?>
                                                            </label>
                                                            <input id="giaNumber" type="text" class="form-control" required></textarea>
                                                            <span id="giaNumberError" class="errorSpan text-danger"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label class="control-label"><?php echo $translations["A01389"][$language]; ?></label>
                                                            <select id="shape" class="form-control country" dataName="shape" dataType="text">
                                                                <option value="Round"><?php echo $translations["A01365"][$language];?></option>
                                                                <option value="Heart"><?php echo $translations["A01374"][$language];?></option>
                                                                <option value="Emerald"><?php echo $translations["A01367"][$language];?></option>
                                                                <option value="Asscher"><?php echo $translations["A01368"][$language];?></option>
                                                                <option value="Pear"><?php echo $translations["A01373"][$language];?></option>
                                                                <option value="Marquise"><?php echo $translations["A01370"][$language];?></option>
                                                                <option value="Cushion"><?php echo $translations["A01369"][$language];?></option>
                                                                <option value="Radiant"><?php echo $translations["A01371"][$language];?></option>
                                                                <option value="Princess"><?php echo $translations["A01366"][$language];?></option>
                                                                <option value="Oval"><?php echo $translations["A01372"][$language];?></option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label class="control-label"><?php echo $translations["A01390"][$language]; ?></label>
                                                            <select id="color" class="form-control country" dataName="color" dataType="text">
                                                                <option value="k"><?php echo "K";?></option>
                                                                <option value="j"><?php echo "J";?></option>
                                                                <option value="i"><?php echo "I";?></option>
                                                                <option value="h"><?php echo "H";?></option>
                                                                <option value="g"><?php echo "G";?></option>
                                                                <option value="f"><?php echo "F";?></option>
                                                                <option value="e"><?php echo "E";?></option>
                                                                <option value="d"><?php echo "D";?></option>
                                                                <option value="fancyBlue"><?php echo $translations["A01375"][$language];?></option>
                                                                <option value="fancyIntenseYellow"><?php echo $translations["A01376"][$language];?></option>
                                                                <option value="fancyIntensePink"><?php echo $translations["A01377"][$language];?></option>
                                                                <option value="fancyVividYellow"><?php echo $translations["A01378"][$language];?></option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label class="control-label"><?php echo $translations["A01391"][$language];?></label>
                                                            <select id="clarity" class="form-control country" dataName="clarity" dataType="text">
                                                                <option value="SI1"><?php echo "SI1";?></option>
                                                                <option value="SI2"><?php echo "SI2";?></option>
                                                                <option value="VS2"><?php echo "VS2";?></option>
                                                                <option value="VS1"><?php echo "VS1";?></option>
                                                                <option value="VVS2"><?php echo "VVS2";?></option>
                                                                <option value="VVS1"><?php echo "VVS1";?></option>
                                                                <option value="IF"><?php echo "IF";?></option>
                                                                <option value="FL"><?php echo "FL";?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label class="control-label"><?php echo $translations["A01434"][$language];?></label>
                                                            <select id="cut" class="form-control country" dataName="cut" dataType="text">
                                                            	<option value=""><?php echo "-";?></option>
                                                                <option value="good"><?php echo $translations['A01431'][$language];?></option>
                                                                <option value="veryGood"><?php echo $translations['A01432'][$language];?></option>
                                                                <option value="excellent"><?php echo $translations['A01433'][$language];?></option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label class="control-label"><?php echo $translations["A01435"][$language];?></label>
                                                            <select id="polish" class="form-control country" dataName="polish" dataType="text">
                                                            	<option value=""><?php echo "-";?></option>
                                                                <option value="good"><?php echo $translations['A01431'][$language];?></option>
                                                                <option value="veryGood"><?php echo $translations['A01432'][$language];?></option>
                                                                <option value="excellent"><?php echo $translations['A01433'][$language];?></option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label class="control-label"><?php echo $translations["A01436"][$language];?></label>
                                                            <select id="symmetry" class="form-control country" dataName="symmetry" dataType="text">
                                                            	<option value=""><?php echo "-";?></option>
                                                                <option value="good"><?php echo $translations['A01431'][$language];?></option>
                                                                <option value="veryGood"><?php echo $translations['A01432'][$language];?></option>
                                                                <option value="excellent"><?php echo $translations['A01433'][$language];?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label>
                                                                <?php echo $translations["A01392"][$language]; /* GIA Number */?>
                                                            </label>
                                                            <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="carat" type="text" class="form-control" required></textarea>
                                                            <span id="caratError" class="errorSpan text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label>
                                                                <?php echo $translations["A01393"][$language]; /* GIA Number */?>
                                                            </label>
                                                            <textarea id="remark" class="form-control" rows="4" cols="50" required></textarea>
                                                            <span id="remarkError" class="errorSpan text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label>
                                                                <?php echo $translations["A01394"][$language]; /* GIA Number */?>
                                                            </label>
                                                            <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="cost" type="text" class="form-control" required></textarea>
                                                            <span id="costError" class="errorSpan text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label>
                                                                <?php echo $translations["A01395"][$language]; /* GIA Number */?>
                                                            </label>
                                                            <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="amount" type="text" class="form-control" required></textarea>
                                                            <span id="amountError" class="errorSpan text-danger"></span>
                                                        </div>
                                                    </div>

                                                    <!-- newimageSection -->
                                                    <div class="form-group row mx-0" style="margin-top: 30px;">
                                                        <div class="col-md-12">
                                                            <label>
                                                                <?php echo $translations['A00439'][$language]; /* Image */ ?>
                                                            </label>

                                                            <div class="row">
                                                                <div id="appendImage">
                                                                    
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="addEmallImage" onclick="addImage()">
                                                                        <b><i class="fa fa-plus-circle"></i></b>
                                                                        <span><?php echo $translations["A01398"][$language]; ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-0" style="margin-top: 30px;">
                                                        <div class="col-md-12">
                                                            <label>
                                                                <?php echo $translations["A01396"][$language]; /* Image */ ?>
                                                            </label>

                                                            <div class="row">
                                                                <div id="">
                                                                    <div class="col-md-4">
                                                                        <div class="popupEmallVideoWrapper default">
                                                                            <span class="dtxt"><?php echo $translations["A01397"][$language];?></span>
                                                                            <input type="hidden" id="storeVideoData1">
                                                                            <input type="hidden" id="storeVideoName1">
                                                                            <!-- <input type="hidden" id="storeVideoSize1"> -->
                                                                            <!-- <input type="hidden" id="storeVideoType1"> -->
                                                                            <!-- <input type="hidden" id="storeVideoFlag1"> -->
                                                                            <!-- <input type="file" id="uploadVideo" class="hided" accept="video/*" onchange="displayVideoName('1', this)"> -->
                                                                            <div>
                                                                                <a href="javascript:;" onclick="$('#uploadVideo').click();" class="btn btn-primary btnUpload"><?php echo $translations["M01350"][$language]?></a>
                                                                                <span id="videoName1" class="fileName"><?php echo $translations["A01399"][$language]?></span>
                                                                                <a id="viewVideo1" href="javascript:;" class="btn" style="display: none;padding:6px;" onclick="showVideo('1')">
                                                                                    <i class="fa fa-eye"></i>
                                                                                </a>
                                                                                <a id="deleteVideo1" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteVideo('1')">
                                                                                    <i class="fa fa-times"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mx-0">
                                                        <div class="col-md-5">
                                                            <label class="control-label">Status</label>
                                                            <select id="status" class="form-control country" dataName="clarity" dataType="text">
                                                                <option value="New">New</option>
                                                                <option value="Used">Used</option>
                                                            </select>
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

                        <form style="display:none" id="myUpload" name="form" method="post" target="_blank" action="reqUpload.php" enctype="multipart/form-data" >
                            <input id='uploadVideo' class="videoUpload" type="file" name="my_file" accept="video/*" onchange="displayVideoName('1', this)" required/><br /><br />
                            <input type="hidden" name="videoName" value=""><br /><br />
                            <input type="hidden" name="videoSize" value=""><br /><br />
                            <input type="hidden" id="previousVideoName" name="previousVideoName" value=""><br /><br />
                            <input type="submit" id="uploadVideoSubmit" value="Upload"/>
                        </form>
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
                </h4>
            </div>
            <div class="modal-body">
                <img id="modalImg" width="100%" src="">
                <video id="modalVideo" width="400" controls>
                  <source src="" type="">
                </video>
            </div>
            <div class="modal-footer">
                <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
            </div>
        </div>
    </div>
</div>



    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>

    <script>
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqEmall.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var language        = "<?php echo $language; ?>";
        var systemLang      = null;
        var selectedLang = [];
        var diamondID       = "<?php echo $_POST['diamondID'] ?>";


        $(document).ready(function() {

            fCallback = loadDefaultListing;
            formData  = {
                command: 'getEmallDetails',
                diamondID: diamondID
            }
            ajaxSend('scripts/reqEmall.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#backBtn').click(function() {
                $.redirect('emallListing.php');
            });
            
            $('#submitBtn').click(function() {
                var maxMB = 45;
                var maxKB = maxMB *1000;
                var maxByte = maxKB *1000;
                var checkVideoSize = $('[name=videoSize]').val();

                console.log('Clicked');

                if(checkVideoSize > maxByte){
                    alert(translations['E00812'][language].replace('%%maxKB%%',maxKB));
                    return false;
                }

                $('.errorSpan').empty();
                var imageData = getImgObj();
                // var videoData = getVideoObj();
                fCallback = submitCallback;
                formData  = {
                    command: 'editEmall',
                    diamondID: diamondID,
                    serialNumber : $("#serialNumber").val(),
                    giaNumber : $("#giaNumber").val(),
                    shape : $("#shape").val(),
                    color : $("#color").val(),
                    clarity : $("#clarity").val(),
                    carat : $("#carat").val(),
                    remark : $("#remark").val(),
                    cost : $("#cost").val(),
                    amount : $("#amount").val(),
                    status : $("#status").val(),
                    cut : $("#cut").val(),
                    polish : $("#polish").val(),
                    symmetry : $("#symmetry").val(),
                    image : imageData,
                    videoName : $('#storeVideoName1').val(),
                };
                ajaxSend('scripts/reqEmall.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            });

            $(".upload").change(function(){
                readURL(this);
            });
        });

        function loadDefaultListing(data, message) {
            console.log(data);

            $("#serialNumber").val(data['serial_no']);
            $("#giaNumber").val(data['gia_number']);
            $("#shape").val(data['shape']);
            $("#color").val(data['color']);
            $("#clarity").val(data['clarity']);
            $("#carat").val(data['carat']);
            $("#remark").val(data['remark']);
            $("#cost").val(data['cost']);
            $("#amount").val(data['price']);
            $("#status").val(data['status']);
            $("#cut").val(data['cut']);
            $("#polish").val(data['polish']);
            $("#symmetry").val(data['symmetry']);

            if(data.diamondImage) {

                var ind = 0;

                $.each(data.diamondImage, function(i,obj){
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

            if(data.diamondVideo) {
                /*
                    videoName1
                    viewVideo1
                    deleteVideo1
                */



                $("#previousVideoName").val(data.diamondVideo.DiamondVideo1.videoName);
                $("#storeVideoName1").val(data.diamondVideo.DiamondVideo1.videoName);
                $("#storeVideoData1").val("<?php echo $config['tempVideoUrl']?>"+data.diamondVideo.DiamondVideo1.videoName);
                $("#videoName1").text(data.diamondVideo.DiamondVideo1.videoName);
                $("#viewVideo1").show();
                $("#deleteVideo1").show();
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

        function getVideoObj() {
            var uploadData = {};

            $(".popupEmallVideoWrapper").each(function(i, obj) {
                var videoData = $(obj).find('[id^="storeVideoData"]').val();
                var videoName = $(obj).find('[id^="storeVideoName"]').val();
                var videoType = $(obj).find('[id^="storeVideoType"]').val();
                var videoFlag = $(obj).find('[id^="storeVideoFlag"]').val();

                // videoName = videoName;
                // $('[name=videoName]').val()
                /*uploadData[i] = {
                    videoData: videoData,
                    videoName: videoName,
                    videoType: videoType,
                    videoFlag: videoFlag,
                };*/
            });

            return videoName;
        }

        function buildLangOption() {
            var html = `<option value="">Select Language</option>`;
            if(systemLang) {
                $.each(systemLang, function(i, obj) {
                    html += `<option value="${obj.language}">${translations[obj.language_code][language]}</option>`;
                });
            }

            return html;
        }

        function addImage(){
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
                        <input type="file" id="fileUpload${wrapperLength}" class="hide" accept="image/*" onchange="displayFileName('${wrapperLength}', this)">
                        <div>
                            <a href="javascript:;" onclick="$('#fileUpload${wrapperLength}').click()" class="btn btn-primary btnUpload">${translations['M01350'][language]}</a>
                            <span id="fileName${wrapperLength}" class="fileName">${translations['A01399'][language]}</span>
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

        function closeDiv(n) {
            $(n).parent().parent().remove();

            var wrapperLength = $(".popupEmallImageWrapper").length;

            if(wrapperLength < 3){
                $(".addEmallImage").removeAttr("style");
            }
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
            $("#modalImg").attr('style','display: block');
            $("#modalImg").attr('src', $("#storeFileData"+n).val());
            $("#modalVideo").attr('style','display:none');
            $("#showImage").modal();
        }

        function deleteImg(id) {
            $("#fileUpload"+id).val("");
            $("#fileName"+id).text(translations['A01399'][language]);
            $("#storeFileData"+id).val("");
            $("#storeFileName"+id).val("");
            $("#storeFileSize"+id).val("");
            $("#storeFileType"+id).val("");
            $("#storeFileFlag"+id).val("");

            $("#viewImg"+id).hide();
            $("#deleteImg"+id).hide();
        }

        function displayVideoName(id, n) {
            var dFileName = $("#videoName"+id);

            if (n.files && n.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // $('#blah').attr('src', e.target.result);
                    // $("#imgData"+input.id).empty().val(reader["result"]);
                    dFileName.text(n.files[0]["name"]);
                    // $("#imgSize"+input.id).empty().val(input.files[0]["size"]);
                    // $("#imgType"+input.id).empty().val(input.files[0]["type"]);
                    // $("#imgFlag"+input.id).empty().val("1");

                    $("#storeVideoData"+id).val(reader["result"]);
                    $("#storeVideoName"+id).val(n.files[0]["name"]);
                    $('[name=videoSize]').val(n.files[0]["size"]);
                    // $('[name=videoName]').val(n.files[0]["name"]);
                    // $("#storeVideoSize"+id).val(n.files[0]["size"]);
                    // $("#storeVideoType"+id).val(n.files[0]["type"]);
                    // $("#storeVideoFlag"+id).val('1');

                    $("#viewVideo"+id).css('display', 'inline-block');
                    $("#deleteVideo"+id).css('display', 'inline-block');


                };

                reader.readAsDataURL(n.files[0]);
            }

        }

        function showVideo(n) {
            $("#modalImg").attr('style','display: none');
            $("#modalVideo").attr('style','display: block');
            $("#modalVideo").attr('src', $("#storeVideoData"+n).val());
            $("#showImage").modal();
        }

        function deleteVideo(id) {
            $("#videoUpload"+id).val("");
            $("#videoName"+id).text(translations['A01399'][language]);
            $("#storeVideoData"+id).val("");
            $("#storeVideoName"+id).val("");
            $("#storeVideoSize"+id).val("");
            $("#storeVideoType"+id).val("");
            $("#storeVideoFlag"+id).val("");

            $("#viewVideo"+id).hide();
            $("#deleteVideo"+id).hide();
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                    $("#imgData"+input.id).empty().val(reader["result"]);
                    $("#imgName"+input.id).empty().val(input.files[0]["name"]);
                    $("#imgSize"+input.id).empty().val(input.files[0]["size"]);
                    $("#imgType"+input.id).empty().val(input.files[0]["type"]);
                    $("#imgFlag"+input.id).empty().val("1");
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        function submitCallback(data, message) {

            if(data){
                $('[name=videoName]').val(data);
                console.log(data);
                $('#uploadVideoSubmit').trigger('click');
            }

            // }else{
                showMessage('<?php echo $translations['A01401'][$language]; /* Successful added memo. */?>', 'success', '<?php echo $translations['A01402'][$language]; /* Add Memo */?>', 'upload', 'emallListing.php');
            // }
            
        }

    </script>
</body>
</html>
