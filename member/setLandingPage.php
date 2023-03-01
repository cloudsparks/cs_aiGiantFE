<?php include 'include/config.php'; ?>

<?php include 'head.php'; ?>
<?php include 'header.php'; ?>
<?php $landingUrl = urldecode($protocol.$domainName."/landingPage.php?n="); ?>

<section class="pageContent" style="margin-bottom: 20px;">
	<div class="kt-container">
        <div class="col-12 pageTitle">
            <?php echo $translations['M00020'][$language]; //LANDING PAGE SETTING ?>
        </div>
	    <div class="col-12">
	        <div class="row">

                <div class="col-md-6 col-12 landingLinkDisplay" style="display: none;">
                    <div class="row">
                        <div class="col-12" style="margin-top: 10px">
                            <label class="registrationLabel"><?php echo $translations['M00065'][$language]; //Current Landing Page Link ?></label>
                            <input id="currentLanding" class="form-control inputDesign" type="text" readonly>
                            <button type="button" class="btn btn-primary" style="margin-top: 10px;" onclick="copyLanding()"><?php echo $translations['M00929'][$language]; //Copy ?></button>
                        </div>
                    </div>
                </div>

                <div class="col-12 landingLinkDisplay" style="display: none;">
                    <hr>
                </div>
	            <div class="col-md-6 col-12">
	                <div class="row">

                        <div class="col-12" style="margin-top: 10px">

                            <label class="registrationLabel"><?php echo $translations['M00066'][$language]; //Profile Picture ?></label>

                            <!-- <div class="col-12 mustFill px-0">
                                - <?php echo $translations['M00067'][$language]; //Picture Size 500x500px ?>
                                <br>
                                - <?php echo $translations['M00068'][$language]; //File Size Limit is 4MB ?>
                            </div> -->

                            
                            <div>
                                <button type="button" class="btn btn-primary" style="margin-top: 10px" data-toggle="modal" data-target="#editImage" role="button"><?php echo $translations['M01350'][$language]; //Upload ?></button>
                                <div style="margin-top: 10px;">
                                    <span id="imageName1" class="fileName"></span>
                                    <button id="viewImage1" type="button" class="btn uploadBtn" style="display: none;" onclick="showImageSelf()">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    
                                    <button id="viewDataImage1" type="button" class="btn uploadBtn" style="display: none;" onclick="showImage('1')">
                                        <i class="fa fa-eye"></i>
                                    </button>

                                    <button id="deleteImage1" type="button" class="btn uploadDeleteBtn" style="display: none;" onclick="deleteImage('1')">
                                        <i class="fa fa-times"></i>
                                    </button>

                                </div>


                                <!-- <button type="button" class="btn btn-primary" style="margin-top: 10px;" onclick="$('#uploadImage').click();"><?php echo $translations['M01350'][$language]; //Upload ?></button>
                                <span id="profilePic"></span>
                                <span id="profilePicError" style="display: block;"></span>
                                <input type="hidden" id="storeImageData1">
                                <input type="hidden" id="storeImageName1">
                                <input type="hidden" id="storeImageType1">

                                
                                <div style="margin-top: 10px;">
                                    <span id="imageName1" class="fileName"></span>
                                    <button id="viewImage1" type="button" class="btn uploadBtn" style="display: none;" onclick="showImage('1')">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                  
                                    <button id="deleteImage1" type="button" class="btn uploadDeleteBtn" style="display: none;" onclick="deleteImage('1')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                

                                <form style="display:none" name="form" method="post" target="" action="" enctype="multipart/form-data" >
                                    <input id='uploadImage' class="videoUpload" type="file" name="my_file" accept="image/png, image/jpeg" onchange="displayImageName('1', this)" required/><br /><br />
                                    <input type="hidden" name="imageName" value=""><br /><br />
                                    <input type="hidden" name="imageSize" value=""><br /><br />
                                    <input type="hidden" name="previousImageName" value="<?php echo $imageAry->imageName != "" ? (string)$imageAry->imageName :'' ?>"><br /><br />
                                </form> -->


                            </div>

                        </div>

                   

	                    <div class="col-12" style="margin-top: 10px">
	                        <label class="registrationLabel"><?php echo $translations['M00177'][$language]; //Full Name ?></label>
	                        <input id="fullName" class="form-control inputDesign" type="text">
	                    </div>


	                    <div class="col-12" style="margin-top: 10px;">
	                        <label class="registrationLabel"><?php echo $translations['M00069'][$language]; //About Your Self ?></label>
                            <textarea id="aboutYourSelf" class="form-control inputDesign" rows="4" cols="50" required=""></textarea>
                        </div>

	                    <!-- <div class="col-12" style="margin-top: 10px">

                            <label class="registrationLabel">Upload Company Video <span class="mustFill">*</span></label>
                            <div class="col-12 mustFill px-0">
                                - Video size limit 20MB
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary" style="margin-top: 10px;" onclick="$('#uploadVideo').click();">Upload</button>
                                <span id="companyVideo"></span>
                                <span id="profileVideoError" style="display: block;"></span>
                                <input type="hidden" id="storeVideoData1">
                                <input type="hidden" id="storeVideoName1">
                                <input type="hidden" id="storeVideoType1">

                                
                                <div style="margin-top: 10px;">
                                    <span id="videoName1" class="fileName"></span>
                                    <button id="viewVideo1" type="button" class="btn uploadBtn" style="display: none;" onclick="showVideo('1')">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                  
                                    <button id="deleteVideo1" type="button" class="btn uploadDeleteBtn" style="display: none;" onclick="deleteVideo('1')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                

                                <form style="display:none" name="form" method="post" target="" action="" enctype="multipart/form-data" >
                                    <input id='uploadVideo' class="videoUpload" type="file" name="my_file" accept="video/*" onchange="displayVideoName('1', this)" required/><br /><br />
                                    <input type="hidden" name="videoName" value=""><br /><br />
                                    <input type="hidden" name="videoSize" value=""><br /><br />
                                    <input type="hidden" name="previousVideoName" value="<?php echo $videoAry->videoName != "" ? (string)$videoAry->videoName :'' ?>"><br /><br />
                                </form>
                            </div>
                        </div> -->

                        <div class="col-12" style="margin-top: 10px">

                            <label class="registrationLabel"><?php echo $translations['M00070'][$language]; //Upload Reason Video ?></label>
                            <div class="col-12 mustFill px-0">
                                - <?php echo $translations['M00071'][$language]; //Video size limit 20MB ?>
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary" style="margin-top: 10px;" onclick="$('#uploadVideo2').click();"><?php echo $translations['M01350'][$language]; //Upload ?></button>
                                <span id="profileVideo2Error" style="display: block;"></span>
                                <span id="reasonVideo"></span>
                                <input type="hidden" id="storeVideoData2">
                                <input type="hidden" id="storeVideoName2">
                                <input type="hidden" id="storeVideoType2">

                                
                                <div style="margin-top: 10px;">
                                    <span id="videoName2" class="fileName"></span>
                                    <button id="viewVideo2" type="button" class="btn uploadBtn" style="display: none;" onclick="showVideo2('2')">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                  
                                    <button id="deleteVideo2" type="button" class="btn uploadDeleteBtn" style="display: none;" onclick="deleteVideo2('2')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                

                                <form style="display:none" name="form" method="post" target="" action="" enctype="multipart/form-data" >
                                    <input id='uploadVideo2' class="videoUpload" type="file" name="my_file" accept="video/*" onchange="displayVideoName2('2', this)" required/><br /><br />
                                    <input type="hidden" name="videoName2" value=""><br /><br />
                                    <input type="hidden" name="videoSize2" value=""><br /><br />
                                    <input type="hidden" name="previousVideoName2" value="<?php echo $videoAry2->videoName2 != "" ? (string)$videoAry2->videoName2 :'' ?>"><br /><br />
                                </form>
                            </div>
                        </div>

	                </div>
	            </div>

	     


	            <div class="col-12" style="margin-top: 20px">
                    <button id="submitBtn" type="button" id="loginBtn" class="btn btn-primary" style="display: none;"><?php echo $translations['M00346'][$language]; //Submit ?></button>
                    <button id="editBtn" type="button" id="loginBtn" class="btn btn-primary" style="display: none;"><?php echo $translations['M00072'][$language]; //Update ?></button>
                </div>

	           
	        </div>
	    </div>
	</div>
</section>

<div class="modal fade" id="editImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title f-16" id="exampleModalLabel"><?php echo $translations['M00097'][$language]; //Upload Image ?></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <div id="imageblah" class="w3-circle m-b-rem1"></div>
                    <div id="upload-demo"></div>


                    <div class="squareImage-modal-body border-b" align="center">



                        <div id="selectBtn" class="mt-4">
                            
                            <button type="button" class="btn btn-primary" style="margin-top: 10px;" onclick="$('#upload').click();"><?php echo $translations['M01350'][$language]; //Upload ?></button>
                            
                            <img id="displayImgBase" style="display: none;">

                           
                            <input type="hidden" id="storeImageData1">
                            <input type="hidden" id="storeImageName1">
                            <input type="hidden" id="storeImageType1">

                            <form style="display:none" name="form" method="post" target="" action="" enctype="multipart/form-data" >
                                <input id='upload' class="videoUpload" type="file" name="my_file" accept="image/png, image/jpeg" onchange="displayCropped('1', this)">

                                <input id='uploadImage' class="videoUpload" type="file" name="my_file" accept="image/png, image/jpeg" onchange="displayImageName('1', this)" required/><br /><br />
                                <input type="hidden" name="imageName" value=""><br /><br />
                                <input type="hidden" name="imageSize" value=""><br /><br />
                                <input type="hidden" name="previousImageName" value="<?php echo $imageAry->imageName != "" ? (string)$imageAry->imageName :'' ?>"><br /><br />
                            </form>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button id="confirmBtn" type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $translations['M00225'][$language]; //Confirm ?></button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="showImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span id="canvasTitle" class="modal-title"><?php echo $translations['M00046'][$language]; //Preview ?></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <img id="modalImg" class="modalProfileImg">
                <video id="modalVideo" class="modalVideo" controls>
                    <source src="" type="">
                </video>
            </div>
            <div class="modal-footer">
                 <button id="canvasCloseBtn" type="button" class="btn btnDefaultModal" data-dismiss="modal"><?php echo $translations['M00112'][$language]; //Close ?></button>
             </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalProcessing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 25px;" aria-modal="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span id="canvasTitle" class="modal-title"><?php echo $translations['M01429'][$language]; //Processing ?></span>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage"><?php echo $translations['M00073'][$language]; //Uploading file... ?></div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

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

    var imageFlag;
    var videoFlag;
    var video2Flag;
    var createImg;

    $(document).ready(function(){

        $uploadCrop = $('#upload-demo').croppie({
            enableExif: true,
            viewport: {
                width: 250,
                height: 250,
                type: 'circle'
            },
            boundary: {
                width: 280,
                height: 280
            }
        });

        // $('#upload').on('change', function () {
        //     var reader = new FileReader();
        //     reader.onload = function (e) {
                

        //         $uploadCrop.croppie('bind', {
        //             url: e.target.result
        //         }).then(function(){
                    
        //         });

        //     }
        //     reader.readAsDataURL(this.files[0]);
        // });

        $('#confirmBtn').on('click', function (ev) {

            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            })

            .then(function (resp) {
                createImg = resp;
                $("#viewImage1").show();
                $("#viewDataImage1").hide();
                $('#displayImgBase').attr('src', createImg);
            });
        });
        
        var formData  = {
            command   : "getClientIntroductionDetails"
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function() {
            $('.invalid-feedback').remove();
            $('input').removeClass('is-invalid');
            $('#profilePicError').html('');
            $('#profileVideo2Error').html('');
                var formData  = {
                    command   : "manageClientIntroductionDetails",
                    type : "add",
                    imageName : $('#storeImageName1').val(),
                    name : $('#fullName').val(),
                    introduction : $('#aboutYourSelf').val(),
                    companyVideoName : $('#storeVideoName1').val(),
                    videoName : $('#storeVideoName2').val()
                };
                var fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
            
        });

        $('#editBtn').click(function() {
            $('.invalid-feedback').remove();
            $('input').removeClass('is-invalid');
            $('#profilePicError').html('');
            $('#profileVideo2Error').html('');
            var formData  = {
                command   : "manageClientIntroductionDetails",
                type : "edit",
                imageName : $('#storeImageName1').val(),
                name : $('#fullName').val(),
                introduction : $('#aboutYourSelf').val(),
                companyVideoName : $('#storeVideoName1').val(),
                videoName : $('#storeVideoName2').val(),
                imageFlag : imageFlag,
                videoFlag : videoFlag,
                video2Flag : video2Flag,

            };
            var fCallback = submitCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

    });

    function loadDefaultListing(data, message) {
        console.log(data);

        if (data.intro) {
            $('.landingLinkDisplay').show();
            $('#editBtn').show();
            $('#submitBtn').hide();
            var getData = data.intro;

            $('#fullName').val(getData.name);
            $('#aboutYourSelf').val(getData.introduction);

            var buildLandingURL = "<?php echo $landingUrl; ?>"
            $('#currentLanding').val(buildLandingURL+data.encrypt_code);

            if (getData.image_name) {
                $("#storeImageName1").val(getData.image_name);
                $("#storeImageData1").val("<?php echo $config['tempMediaUrl']?>"+getData.image_name);
                $("#imageName1").text(getData.image_name);
                $("#viewImage1").hide();
                $("#viewDataImage1").show();
                $("#deleteImage1").show();
                imageFlag = 0;
            } else {
                imageFlag = 1;
            }
            
            if (getData.company_video_name) {
                $("#storeVideoName1").val(getData.company_video_name);
                $("#storeVideoData1").val("<?php echo $config['tempMediaUrl']?>"+getData.company_video_name);
                $("#videoName1").text(getData.company_video_name);
                $("#viewVideo1").show();
                $("#deleteVideo1").show();
                video2Flag = 0;
            } else {
                video2Flag = 1;
            }

            if (getData.video_name) {
                $("#storeVideoName2").val(getData.video_name);
                $("#storeVideoData2").val("<?php echo $config['tempMediaUrl']?>"+getData.video_name);
                $("#videoName2").text(getData.video_name);
                $("#viewVideo2").show();
                $("#deleteVideo2").show();
                videoFlag = 0;
            } else {
                videoFlag = 1;
            }
        } else {
            $('.landingLinkDisplay').hide();
            $('#editBtn').hide();
            $('#submitBtn').show();
        }
    }

    function displayCropped(id, n) {

        var dFileName = $("#imageName"+id);
        
        var reader = new FileReader();
        reader.onload = function (e) {

            dFileName.text(n.files[0]["name"]);
            $("#storeImageData"+id).val(reader["result"]);
            $("#storeImageName"+id).val(n.files[0]["name"]);
            $('[name=imageSize]').val(n.files[0]["size"]);
            $("#storeImageType"+id).val(n.files[0]["type"]);
            imageFlag = 1;
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                
            });

        }
        reader.readAsDataURL(n.files[0]);
    }
  

    function displayImageName(id, n) {

        var dFileName = $("#imageName"+id);

        if (n.files && n.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {

                var img = new Image();      
                img.src = e.target.result;

                img.onload = function () {
                    var imageW = this.width;
                    var imageH = this.height;
                    var imageSize = n.files[0]["size"];

                    if (imageSize < 4000000) {
                        $('#profilePicError').html('');
                        dFileName.text(n.files[0]["name"]);
                        $("#storeImageData"+id).val(reader["result"]);
                        $("#storeImageName"+id).val(n.files[0]["name"]);
                        $('[name=imageSize]').val(n.files[0]["size"]);
                        $("#storeImageType"+id).val(n.files[0]["type"]);
                        $("#viewImage"+id).css('display', 'inline-block');
                        $("#deleteImage"+id).css('display', 'inline-block');
                        imageFlag = 1;
                    } else {
                        $('#profilePicError').html('<span class="mustFill">*<?php echo $translations['M00074'][$language]; //Profile picture does not meet the requirements ?></span>');
                    }
                }



                
            };

            reader.readAsDataURL(n.files[0]);
        }



    }

    function showImageSelf() {
        $("#modalImg").attr('style','display: block');
        $("#modalImg").attr('src', createImg);
        $("#modalVideo").attr('style','display:none');
        $("#showImage").modal();
    }

    function showImage(n) {
        $("#modalImg").attr('style','display: block');
        $("#modalImg").attr('src', $("#storeImageData"+n).val());
        $("#modalVideo").attr('style','display:none');
        $("#showImage").modal();
    }

    function deleteImage(id) {
        $("#imageUpload"+id).val("");
        $('#imageName'+id).text('');
        $("#storeImageData"+id).val("");
        $("#storeImageName"+id).val("");
        $("#storeImageSize"+id).val("");
        $("#storeImageType"+id).val("");
        $("#storeImageFlag"+id).val("");

        $("#viewImage"+id).hide();
        $("#deleteImage"+id).hide();
        imageFlag = 0;
    }

    function displayVideoName(id, n) {
        var dFileName = $("#videoName"+id);

        if (n.files && n.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {

                var videoSize = n.files[0]["size"];

                if (videoSize < 20000000) {
                    dFileName.text(n.files[0]["name"]);
                    $("#storeVideoData"+id).val(reader["result"]);
                    $("#storeVideoName"+id).val(n.files[0]["name"]);
                    $('[name=videoSize]').val(n.files[0]["size"]);
                    $("#storeVideoType"+id).val(n.files[0]["type"]);
                    $("#viewVideo"+id).css('display', 'inline-block');
                    $("#deleteVideo"+id).css('display', 'inline-block');
                    $('#profileVideoError').html('');
                    video2Flag = 1;
                } else {
                    $('#profileVideoError').html('<span class="mustFill">*Company video does not meet the requirements</span>');
                }
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
        $('#videoName'+id).text('');
        $("#storeVideoData"+id).val("");
        $("#storeVideoName"+id).val("");
        $("#storeVideoSize"+id).val("");
        $("#storeVideoType"+id).val("");
        $("#storeVideoFlag"+id).val("");

        $("#viewVideo"+id).hide();
        $("#deleteVideo"+id).hide();
        video2Flag = 0;
    }


    function displayVideoName2(id, n) {
        var dFileName = $("#videoName"+id);

        if (n.files && n.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {

                var videoSize = n.files[0]["size"];

                if (videoSize < 20000000) {
                    dFileName.text(n.files[0]["name"]);
                    $("#storeVideoData"+id).val(reader["result"]);
                    $("#storeVideoName"+id).val(n.files[0]["name"]);
                    $('[name=videoSize2]').val(n.files[0]["size"]);
                    $("#storeVideoType"+id).val(n.files[0]["type"]);
                    $("#viewVideo"+id).css('display', 'inline-block');
                    $("#deleteVideo"+id).css('display', 'inline-block');
                    $('#profileVideo2Error').html('');
                    videoFlag = 1;


                } else {
                    $('#profileVideo2Error').html('<span class="mustFill">*<?php echo $translations['M00075'][$language]; //Video does not meet the requirements ?></span>');
                }
            };

            reader.readAsDataURL(n.files[0]);
        }
    }

    function showVideo2(n) {
        $("#modalImg").attr('style','display: none');
        $("#modalVideo").attr('style','display: block');
        $("#modalVideo").attr('src', $("#storeVideoData"+n).val());
        $("#showImage").modal();
        
    }

    function deleteVideo2(id) {
        $("#videoUpload"+id).val("");
        $('#videoName'+id).text('');
        $("#storeVideoData"+id).val("");
        $("#storeVideoName"+id).val("");
        $("#storeVideoSize"+id).val("");
        $("#storeVideoType"+id).val("");
        $("#storeVideoFlag"+id).val("");

        $("#viewVideo"+id).hide();
        $("#deleteVideo"+id).hide();
        videoFlag = 0;
    }



    function submitCallback(data, message) {
        if(data){
            $('#modalProcessing').modal('show');

            var formData = new FormData();

            if(data.image_name){
                $('[name=imageName]').val(data.image_name);
                // var files = $('#uploadImage')[0].files[0];
                
                // var files = $('#displayImgBase').attr('src');
                // var files = $("<a>")
                //     .attr("href", $('#displayImgBase').attr('src'))
                //     .attr(data.image_name)
                //     .appendTo("body");

                var base64Data = $('#displayImgBase').attr('src');
                var block = base64Data.split(";");
                // Get the content type of the image
                var contentType = block[0].split(":")[1];// In this case "image/gif"
                // get the real base64 content of the file
                var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."

                // Convert it to a blob to upload
                var blob = b64toBlob(realData, contentType);

                formData.append('imageFile', blob);
                formData.append('mediaImageName', $("[name=imageName]").val());

            }

            if(data.company_video_name){
                $('[name=videoName]').val(data.company_video_name);
                var videofiles = $('#uploadVideo')[0].files[0];
                formData.append('videofiles', videofiles);
                formData.append('mediaVideoName', $("[name=videoName]").val());
            }

            if(data.video_name){
                $('[name=videoName2]').val(data.video_name);
                var video2files = $('#uploadVideo2')[0].files[0];
                formData.append('video2files', video2files);
                formData.append('mediaVideo2Name', $("[name=videoName2]").val());
            }

            $.ajax({
                url: 'scripts/reqUpload.php',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data){
                    setInterval(function(){
                        $('#modalProcessing').modal('hide');
                    }, 1);
                    
                    var json = JSON.parse(data);
                    console.log(json);
                    if (json.status == 'ok') {
                        uploadVideoSuccess();
                    }
                },
            });


        }
    }


    function processButton(buttonID,status,buttonText) {
        $("#"+buttonID).attr('disabled',status);
        $("#"+buttonID).text(buttonText);
    }

    function uploadVideoSuccess() {
        showMessage('<?php echo $translations['M00127'][$language]; //Successful added landing page. ?>', 'success', '<?php echo $translations['M00228'][$language]; //Congratulation ?>', '', 'setLandingPage.php');
    }

    
    function checkFileDetails() {
            var fi = document.getElementById('file');
            if (fi.files.length > 0) {      // FIRST CHECK IF ANY FILE IS SELECTED.
               
                for (var i = 0; i <= fi.files.length - 1; i++) {
                    var fileName, fileExtension, fileSize, fileType, dateModified;

                    // FILE NAME AND EXTENSION.
                    fileName = fi.files.item(i).name;
                    fileExtension = fileName.replace(/^.*\./, '');

                    // CHECK IF ITS AN IMAGE FILE.
                    // TO GET THE IMAGE WIDTH AND HEIGHT, WE'LL USE fileReader().
                    if (fileExtension == 'png' || fileExtension == 'jpg' || fileExtension == 'jpeg') {
                       readImageFile(fi.files.item(i));             // GET IMAGE INFO USING fileReader().
                    }
                    else {
                        // IF THE FILE IS NOT AN IMAGE.
                            
                        fileSize = fi.files.item(i).size;  // FILE SIZE.
                        fileType = fi.files.item(i).type;  // FILE TYPE.
                        dateModified = fi.files.item(i).lastModifiedDate;  // FILE LAST MODIFIED.

                        document.getElementById('fileInfo').innerHTML =
                            document.getElementById('fileInfo').innerHTML + '<br /> ' +
                                'Name: <b>' + fileName + '</b> <br />' +
                                'File Extension: <b>' + fileExtension + '</b> <br />' +
                                'Size: <b>' + Math.round((fileSize / 1024)) + '</b> KB <br />' +
                                'Type: <b>' + fileType + '</b> <br />' +
                                'Last Modified: <b>' + dateModified + '</b> <br />';
                    }
                }

                // GET THE IMAGE WIDTH AND HEIGHT USING fileReader() API.
                function readImageFile(file) {
                    var reader = new FileReader(); // CREATE AN NEW INSTANCE.

                    reader.onload = function (e) {
                        var img = new Image();      
                        img.src = e.target.result;

                        img.onload = function () {
                            var w = this.width;
                            var h = this.height;

                            document.getElementById('fileInfo').innerHTML =
                                document.getElementById('fileInfo').innerHTML + '<br /> ' +
                                    'Name: <b>' + file.name + '</b> <br />' +
                                    'File Extension: <b>' + fileExtension + '</b> <br />' +
                                    'Size: <b>' + Math.round((file.size / 1024)) + '</b> KB <br />' +
                                    'Width: <b>' + w + '</b> <br />' +
                                    'Height: <b>' + h + '</b> <br />' +
                                    'Type: <b>' + file.type + '</b> <br />' +
                                    'Last Modified: <b>' + file.lastModifiedDate + '</b> <br />';
                        }
                    };
                    reader.readAsDataURL(file);
                }
            }
        }


    function copyLanding() {
      /* Get the text field */
      var copyText = document.getElementById("currentLanding");

      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/

      /* Copy the text inside the text field */
      document.execCommand("copy");

      /* Alert the copied text */
      alert("Copied Link: " + copyText.value);
    }

    function b64toBlob(b64Data, contentType, sliceSize) {
        contentType = contentType || '';
        sliceSize = sliceSize || 512;

        var byteCharacters = atob(b64Data);
        var byteArrays = [];

        for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
            var slice = byteCharacters.slice(offset, offset + sliceSize);

            var byteNumbers = new Array(slice.length);
            for (var i = 0; i < slice.length; i++) {
                byteNumbers[i] = slice.charCodeAt(i);
            }

            var byteArray = new Uint8Array(byteNumbers);

            byteArrays.push(byteArray);
        }

      var blob = new Blob(byteArrays, {type: contentType});
      return blob;
    }



    function saveImg(n) {
        var a = $("<a>")
            .attr("href", $('#displayImgBase').attr('src'))
            .attr("download", "referral.png")
            .appendTo("body");

        a[0].click();

        a.remove();
    }


</script>