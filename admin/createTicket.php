<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    $_SESSION['lastVisited'] = $thisPage;
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
                    <div class="row">
                        <div class="col-sm-4">
                             <a href="createTicketList.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                                <i class="md md-add"></i>
                                <?php echo $translations['A00126'][$language]; /* Back */ ?>
                            </a>
                        </div><!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-3 visible-xs visible-sm">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                                <?php echo $translations['A01176'][$language]; /* Ticket Details */ ?>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="m-b-rem1 col-lg-12">
                                                <span>
                                                    <?php echo $translations['A00102'][$language]; /* username */ ?>:
                                                </span>
                                                <b id="username" class="m-l-rem1"></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 hidden-xs hidden-sm">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <?php echo $translations['A01176'][$language]; /* Ticket Details */ ?>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="m-b-rem2 col-lg-12">
                                                <span>
                                                    <?php echo $translations['A00102'][$language]; /* username */ ?>:
                                                </span><br>
                                                <b id="username1" class="m-l-rem1"></b>
                                            </div>
                                            <!-- <div class="m-b-rem2 col-lg-12">
                                                <span>
                                                    Username:
                                                </span><br>
                                                <b id="" class="">testing</b>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-9">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <?php echo $translations['A01178'][$language]; /* Inbox */ ?>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12">
                                                    <span class="input-icon icon-right">
                                                        <textarea id="subject" class="form-control" style="margin-bottom:10px;min-height:0px" placeholder="<?php echo $translations['A00369'][$language]; /* Write your subject here */ ?> "></textarea>
                                                    </span>
                                                    <span class="input-icon icon-right">
                                                        <textarea id="content" rows="5" class="form-control" placeholder="<?php echo $translations['A01182'][$language]; /* Write your message here */ ?>"></textarea>
                                                    </span>
                                                    <div class="sendImageBox" style="height: 150px; background-color: #fff; padding-top: 0; display: none">
                                                        <div style="background-color: #fff; width: 130px; padding-top: 15px; border-radius: 6px;">
                                                            <div class="mb-1" align="right">
                                                                <i id="removeImage" class="fa fa-times-circle fa-lg" aria-hidden="true"></i>
                                                            </div>
                                                            <img id="imageInboxSend" src="" width="120px" height="100px" style="border-radius: 10px;">
                                                        </div>
                                                    </div>
                                                    <div class="p-t-10" align="right">
                                                        <div class="imgIconCustom" style="position: absolute;">
                                                            <i id="button" class="fa fa-picture-o fa-lg" style="padding-top: 10px; color: #bfbfbf;" aria-hidden="true"></i>
                                                        </div>
                                                        <input type='file' id="upload" style="display: none;" />
                                                        <div class="squareImage-modal-body border-b" align="center">
                                                            <input id="trID" type="hidden" name="" value="">
                                                            <input id="imgData" type="hidden" name="" value="">
                                                            <input id="imgName" type="hidden" name="" value="">
                                                            <input id="imgSize" type="hidden" name="" value="">
                                                            <input id="imgType" type="hidden" name="" value="">
                                                        </div>
                                                        <button id="submitBtn" class="btn btn-sm btn-primary waves-effect waves-light">
                                                            <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End row -->
                </div> <!-- container -->
            </div> <!-- content -->

            <?php include("footer.php"); ?>
        </div><!-- End content-page -->

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div><!-- END wrapper -->

    <script>var resizefunc = [];</script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

</body>
</html>

<script>
   
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var adminID =  "<?php echo $_SESSION['userID']; ?>";
    var memberId  = "<?php echo $_POST['id']; ?>";
    var ticketID;
    var reqData =  new FormData();

    $(document).ready(function() {

        $('#button').click(function () {
            // alert(1);
            $("input[type='file']").trigger('click');
        })

        function readURL(input) {
            // alert(2);
            // $("#content").prop('disabled', true);

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                // console.log(input.files);
                reader.onload = function (e) {
                    // $(".sendImageBox").removeClass("hide");
                    $(".sendImageBox").slideDown("slow");
                    $('#imageInboxSend').attr('src', e.target.result);
                    $("#imgData").empty().val(reader["result"]);
                    $("#imgName").empty().val(input.files[0]["name"]);
                    $("#imgSize").empty().val(input.files[0]["size"]);
                    $("#imgType").empty().val(input.files[0]["type"]);
                    // alert($("#imgName").val());
                    // alert($("#imgType").val());
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        

        $("#upload").change(function(){
            readURL(this);
        });

        // if id empty return back memberList.php 
        if(!memberId) {
            var message  = '<?php echo $translations['A00178'][$language]; /* Client does not exist */ ?>';
            showMessage(message, '', '<?php echo $translations['A00727'][$language]; /* Error */ ?>', 'exclamation-triangle', 'memberList.php');
            return;
        }

        var formData  = {command : "getViewMemberDetails", memberId : memberId};
        var fCallback = loadMemberDetails;
        ajaxSend('scripts/reqClient.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


    });
    

    $('#submitBtn').click(function() {

        var message = $("#content").val();
        var subject = $("#subject").val();
        var imageData = $('#imgData').val();
        var imageType = $('#imgType').val();
        var imageName = $('#imgName').val();

        if(imageData == ""){
            var imageFlag = 0;
        }else{
            var imageFlag = 1;
        }

        var uploadImage = [];
        uploadImage.push({
            // imageData : imageData,
            imageType : imageType,
            imageName : imageName,
            imageFlag : imageFlag
        });

        reqData = [{
            imageData : imageData
        }];
        
        var formData = {
            command : "addTicket",
            subject : subject,
            message : message,
            uploadData : uploadImage,
            receiverID  :memberId,
            clientID    :adminID,
            type: "support"
        };

        // console.log(formData);
        fCallback = submitCallback;
        ajaxSend('scripts/reqTicketing.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function submitCallback(data, message) {
        ticketID = data.ticketID;

        if(data.uploadData){
            $('#modalProcessing').modal('show');
            var reqData2 = new FormData();

            var imagefiles = reqData[0].imageData;
            var block = imagefiles.split(";");
            var contentType = block[0].split(":")[1];
            var realData = block[1].split(",")[1];

            var blob = b64toBlob(realData, contentType);
            
            reqData2.append('imageData', blob);
            reqData2.append('image', data.uploadData.image_name);

            $.ajax({
                url: 'scripts/reqUploadCDN.php',
                type: 'post',
                data: reqData2,
                contentType: false,
                processData: false,
                async: false,
                success: function(data){
                    setTimeout(function(){
                        $('#modalProcessing').modal('hide');
                        submitSuccessful();
                    }, 1000);
                },
            });
        } else {
            submitSuccessful();
        }
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

    function loadMemberDetails(data, message) {
        var memberDetails = data.member;
          $('#username').text(memberDetails['name']);
          $('#username1').text(memberDetails['name']);
    }

    function submitSuccessful(data, message){
        //console.log(data);
        showMessage("<?php echo $translations['B00102'][$language]; /* Update Successful */ ?>", "success", "<?php echo $translations['A01175'][$language]; /* Ticketing Listing */ ?>", "edit", ['supportTicketInbox.php', {ticketID: ticketID}]);
    }


    $("#removeImage").click(function(){

        $("#imgData").val("");
        $("#imgName").val("");
        $("#imgSize").val("");
        $("#imgType").val("");
        // $("#imageInboxSend").attr('src', "");
        $(".sendImageBox").slideUp("slow");
        // $("#content").prop('disabled', false);

    })

</script>