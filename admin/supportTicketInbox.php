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
                             <a href="supportTicket.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                                <i class="md md-add"></i>
                                <?php echo $translations['A00115'][$language]; /* Back */ ?>
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
                                                    <?php echo $translations['A01165'][$language]; /* Ticket No */ ?>:
                                                </span>
                                                <b id="ticketNoMobile" class="m-l-rem1"></b>
                                            </div>
                                            <div class="m-b-rem1 col-lg-12">
                                                <span>
                                                    <?php echo $translations['A01167'][$language]; /* Created By */ ?>:
                                                </span>
                                                <b id="usernameMobile" class="m-l-rem1"></b>
                                            </div>
                                            <div class="m-b-rem1 col-lg-12">
                                                <span>
                                                    <?php echo $translations['A00148'][$language]; /* Member ID */ ?>:
                                                </span>
                                                <b id="clientIDMobile" class="m-l-rem1"></b>
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
                                                    <?php echo $translations['A01165'][$language]; /* Ticket No */ ?>:
                                                </span><br>
                                                <b id="ticketNo" class=""></b>
                                            </div>
                                            <div class="m-b-rem2 col-lg-12">
                                                <span>
                                                    <?php echo $translations['A01167'][$language]; /* Created By */ ?>:
                                                </span><br>
                                                <b id="username" class=""></b>
                                            </div>
                                            <div class="m-b-rem2 col-lg-12">
                                                <span>
                                                    <?php echo $translations['A00148'][$language]; /* Member ID */ ?>:
                                                </span><br>
                                                <b id="clientID" class=""></b>
                                            </div>
                                            <div class="m-b-rem2 col-lg-12">
                                                <span>
                                                    <?php echo "Sent To" /* Member ID */ ?>:
                                                </span><br>
                                                <b id="receiverName" class=""></b>
                                            </div>
                                            <!-- <div class="m-b-rem2 col-lg-12">
                                                <span>
                                                    Username:
                                                </span><br>
                                                <b id="" class="">testing</b>
                                            </div> -->
                                            <div class="m-b-rem2 col-lg-12">
                                                <span>
                                                    <?php echo $translations['A00318'][$language]; /* Status */ ?>:
                                                </span><br>
                                                <select id="status" class="form-control" style="margin-top: 5px;">
                                                    <option value="Open"><?php echo $translations['A01168'][$language]; /* Open */ ?></option>
                                                    <option value="Closed"><?php echo $translations['A01169'][$language]; /* Closed */ ?></option>
                                                </select>
                                            </div>
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
                                                        <button id="replyBtn" class="btn btn-sm btn-primary waves-effect waves-light">
                                                            <?php echo $translations['A00323'][$language]; /* Submit */ ?>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading ticketInbox" role="tab" id="headingOne">
                                        <h4 id="ticketTitle" class="panel-title">
                                            <span id="ticketSubject"></span>
                                        </h4>
                                    </div>

                                    <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne" style="max-height: 400px; overflow-y: scroll;">
                                        <div id="ticketItem" class="panel-body">
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
    // Initialize the arguments for ajaxSend function
    var url            = 'scripts/reqTicketing.php';
    var method         = 'POST';
    var debug          = 0;
    var bypassBlocking = 0;
    var bypassLoading  = 0;
    var fCallback      = "";

    var ticketID       = "<?php echo $_POST['ticketID']; ?>";
    var reqData =  new FormData();

    $(document).ready(function() {

        $('#button').click(function () {
            // alert(1);
            $("input[type='file']").trigger('click');
        })

        function readURL(input) {
            if (input.files && input.files[0]) {
                if (input.files[0]["size"] < 5242880) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $(".sendImageBox").slideDown("slow");
                        $('#imageInboxSend').attr('src', e.target.result);
                        $("#imgData").empty().val(reader["result"]);
                        $("#imgName").empty().val(input.files[0]["name"]);
                        $("#imgSize").empty().val(input.files[0]["size"]);
                        $("#imgType").empty().val(input.files[0]["type"]);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                     alert("<?php echo $translations['M00153'][$language]; //(Maximum File Size: 5MB) ?>");
                }
            }
        }
        

        $("#upload").change(function(){
            readURL(this);
        });


        var formData = {
            command        : "getTicketDetail",
            ticketId : ticketID
        };

        fCallback = loadEdit;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#replyBtn').click(function() {

            var message = $("#content").val();
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
                imageType : imageType,
                imageName : imageName,
                imageFlag : imageFlag
            });

            reqData = [{
                imageData : imageData
            }];

            var formData = {
                command        : "replyTicket",
                ticketId : ticketID,
                message : message,
                uploadData : uploadImage
            };

            fCallback = sendMessageStatus;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $('#status').on('change', function() {

            var status = $('#status').val();
            var id = [ticketID];
            formData = {
                command     : "updateTicketStatus",
                ticketId     : id,
                status      : status
            };

            fCallback = loadSuccessful;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);        
        });

    });
    
    function loadEdit(data, message) {

        formData  = {
            command : "getInboxUnreadMessage"
        };
        fCallback = listUnreadMessage;
        // console.log(formData);
        ajaxSend("scripts/reqAdmin.php", formData, "POST", fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        if(data.ticketDetail) {
            $.each(data.ticketDetail, function(key, value) {
                if (value["sender_type"] == "Admin"){
                    if(value["image_name"] != "" && value["message"] != ""){
                        var ticketItem = '<div class="comment"><div class="comment-body"><div class="comment-text"><div class="comment-header"><a href="#" title="">'+value['senderName']+'</a><span>'+value['created_at']+'</span></div><br><img src="<?php echo $config['tempMediaUrl'] ?>'+value["image_name"]+'" width="200px"><br></div></div></div><div class="comment"><div class="comment-body"><div class="comment-text"><div class="comment-header"><a href="#" title="">'+value['senderName']+'</a><span>'+value['created_at']+'</span></div><br>'+value['message']+'<br></div></div></div>';

                    }else if(!value["image_name"] && value["message"] != ""){
                        var ticketItem = '<div class="comment"><div class="comment-body"><div class="comment-text"><div class="comment-header"><a href="#" title="">'+value['senderName']+'</a><span>'+value['created_at']+'</span></div><br>'+value['message']+'<br></div></div></div>';

                    }else if(value["image_name"] != "" && value["message"] == ""){
                        var ticketItem = '<div class="comment"><div class="comment-body"><div class="comment-text"><div class="comment-header"><a href="#" title="">'+value['senderName']+'</a><span>'+value['created_at']+'</span></div><br><img src="<?php echo $config['tempMediaUrl'] ?>'+value["image_name"]+'" width="200px"><br></div></div></div>';
                    }
                } else {
                    if(value["image_name"] != "" && value["message"] != ""){
                        var ticketItem = '<div class="comment"><div class="comment-body"><div class="comment-text"><div class="comment-header"><a href="#" title="">'+value['senderName']+'</a><span>'+value['created_at']+'</span></div><br><img src="<?php echo $config['tempMediaUrl'] ?>'+value["image_name"]+'" width="200px"><br></div></div></div><div class="comment"><div class="comment-body"><div class="comment-text"><div class="comment-header"><a href="#" title="">'+value['senderName']+'</a><span>'+value['created_at']+'</span></div><br>'+value['message']+'<br></div></div></div>';

                    }else if(!value["image_name"] && value["message"] != ""){
                        var ticketItem = '<div class="comment"><div class="comment-body"><div class="comment-text"><div class="comment-header"><a href="#" title="">'+value['senderName']+'</a><span>'+value['created_at']+'</span></div><br>'+value['message']+'<br></div></div></div>';

                    }else if(value["image_name"] != "" && value["message"] == ""){
                        var ticketItem = '<div class="comment"><div class="comment-body"><div class="comment-text"><div class="comment-header"><a href="#" title="">'+value['senderName']+'</a><span>'+value['created_at']+'</span></div><br><img src="<?php echo $config['tempMediaUrl'] ?>'+value["image_name"]+'" width="200px"><br></div></div></div>';
                    }
                }
                

                $('#ticketItem').append(ticketItem);
            });

            $("#ticketSubject").text(data.ticketDetail[0].subject);

        }

        $.each(data.ticketData, function(key, val) {
            if(key == 'status') {
                $('#'+key).val(val);
                if (val== 'Open') {
                    // $('#content').attr("disabled",false);
                    // $('#replyBtn').attr("disabled",false);
                    $('#ticketTitle').append("<span id='statusLabel' class='label label-success'>"+val+"</span>");
                }else if (val == 'Closed'){
                    // $('#content').attr("disabled",true);
                    // $('#replyBtn').attr("disabled",true);
                    $('#ticketTitle').append("<span id='statusLabel' class='label label-danger'>"+val+"</span>");
                }
               
            }
            else {
                $('#'+key).text(val);
                $('#'+key+"Mobile").text(val);
            }
        });

        // $('.deleteMessage').click(function() {
        //     var message_id = $(this).val();

        //     var formData = {
        //         command        : "deleteMessage",
        //         message_id : message_id
        //     };
        //     fCallback = removeReturn;
        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        // });
    }


    function removeReturn(data, message){
            showMessage(message, 'success', '<?php echo $translations['A01181'][$language]; /* Reply Ticket */ ?>', 'envelope', ['supportTicketInbox.php', {ticketID: ticketID}]);
            // return;
    }

    function sendMessageStatus(data,message) {
        if(data){
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
                        loadReply();
                    }, 1000);
                },
            });
        } else {
            loadReply();
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


    function loadReply() {
        showMessage('<?php echo $translations['A01180'][$language]; /* Successfully replied */ ?>', 'success', '<?php echo $translations['A01181'][$language]; /* Reply Ticket */ ?>', 'envelope', ['supportTicketInbox.php', {ticketID: ticketID}]);
    }

    function loadSuccessful(data, message){
        showMessage("<?php echo $translations['A00684'][$language]; /* Update Successful */ ?>", "success", "<?php echo $translations['A01175'][$language]; /* Ticketing Listing */ ?>", "edit", ['supportTicketInbox.php', {ticketID: ticketID}]);
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

    $('#canvasCloseBtn').click(function() {
         $.redirect('supportTicketInbox.php',  {ticketID: ticketID});
    });

    function listUnreadMessage(data, message){
        // alert(data);
        var unread = data['inboxUnreadMessage'];

        if(unread && unread['support']) {
            var unreadMsg = unread['support'];
            $(".badge.ticketBadge").text(unreadMsg);
        }else{
            $(".badge.ticketBadge").hide();
        }
    };

</script>