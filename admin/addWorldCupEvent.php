<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="accessDenied.php";</script>';
    else
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
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <h4 class="header-title m-t-0 m-b-30">
                                <?php echo $translations['A01724'][$language]; /* Add World Cup Event */ ?>
                            </h4>
                            <div class="row">
                                <div class="col-md-6 textareaContainer">
                                    <form role="form" id="addWorldCupEvent" data-parsley-validate novalidate>
                                        <!-- start of description input -->
                                        <div class="form-group row mx-0 worldCupEvent" style="margin-top: 30px;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div id="appendImage">
                                                        <div class="col-md-4" style="width:100%;">
                                                            <div class="">
                                                                <div>
                                                                    <label for="">
                                                                        <?php echo $translations['A01725'][$language]; /* Match */ ?> <span class="text-danger">*</span>
                                                                    </label>
                                                                    <p id="emptyErr" class="err-msg">This value is required.</p>
                                                                    <span id="matchEr" class="errorSpan text-danger"></span>
                                                                    <textarea id="match" class="form-control limitText" rows="4" cols="100" ></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mx-0 worldCupEvent" style="margin-top: 30px;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div id="appendImage">
                                                        <div class="col-md-4" style="width:100%;">
                                                            <div class="">
                                                                <div>
                                                                    <label for="">
                                                                        <?php echo $translations['A01726'][$language]; /* Odd */ ?> <span class="text-danger">*</span>
                                                                    </label>
                                                                    <p id="emptyErr" class="err-msg">This value is required.</p>
                                                                    <span id="oddErr" class="errorSpan text-danger"></span>
                                                                    <textarea id="odd" class="form-control limitText" rows="4" cols="50" ></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of description input -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 m-b-20">
                            <!-- <button type="submit" class="btn btn-default waves-effect waves-light">Cancel</button> -->
                        <button id="add" type="submit" onclick="addEvent()" class="btn btn-primary waves-effect waves-light">
                            <?php echo $translations['A00123'][$language]; /* Confirm */ ?>
                        </button>
                    </div>
                </div>
                <!-- End row -->

            <?php include("footer.php"); ?>

        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

<script>
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqWorldCupEvent.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var reqData =  new FormData();
	let uploadData;
    var showInvoiceValue = 0;
    var showTxidValue = 0;
    var descriptionType = '';
    var descriptionContent;
    var oddContent;
    var matchContent;
    var validateContent;
        
    var fCallback;
    $(document).ready(function() {

    });
    

    function setTodayDatePicker() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = dd + '/' + mm + '/' + yyyy;

        $('.input-daterange-from').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('.input-daterange-from').val('');

        $('.input-daterange-to').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
        $('.input-daterange-to').val('');

        $('#timeFrom').timepicker({
            defaultTime : '',
            showSeconds: true
        });
        $('#timeTo').timepicker({
            defaultTime : '',
            showSeconds: true
        });

        return dateToTimestamp(today);
    }

    function addSuccess() {
        showMessage('<?php echo $translations['A01727'][$language]; /* Successfully Added World Cup Event */ ?>', 'success', '<?php echo $translations['A01724'][$language]; /* Add World Cup Event */ ?>', 'upload', 'worldCupEventListing.php');
    }

    function validateDescription() {
        validateContent = oddContent && matchContent ?
                        true 
                        :false;
    
    }

    function addEvent() {

        validateDescription()
        

        if(validateContent) {
            showCanvas();

            var searchId   = 'addWorldCupEvent';
            var searchData = buildSearchDataByType(searchId);

            var formData = {
                command: 'addWorldCupEvent',
                match: matchContent,
                odd: oddContent
            };
            var fCallback = addSuccess;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);    
        }
      
    };

    //for text editor function 
    tinymce.init({
        selector: "#match",
        height: 400,
        menubar: false,
        toolbar: false,
        plugins : "paste ",
        paste_as_text: true,
        content_style: "body{font-family:'Roboto';font-size:14px;}",
        setup: function (editor) {
            editor.on("keyup", function (e) {
                updateHTML(editor.getContent());
            });
            editor.on("change", function (e) {
                updateHTML(editor.getContent());
            });
        }
    });

    tinymce.init({
        selector: "#odd",
        height: 400,
        menubar: false,
        toolbar: false,
        plugins : "paste",
        paste_as_text: true,
        content_style: "body{font-family:'Roboto';font-size:14px;}",
        setup: function (editor) {
            editor.on("keyup", function (e) {
                updateHTML(editor.getContent());
            });
            editor.on("change", function (e) {
                updateHTML(editor.getContent());
            });
        }
    });


    function updateHTML(content) {
        cmeditor.getDoc().setValue(content);
        oddContent = tinymce.get('odd').getContent();
        matchContent = tinymce.get('match').getContent();

    }

    function updateEditor() {
        if (!tinymce.activeEditor.hasFocus()) {
            tinymce.activeEditor.setContent(cmeditor.getDoc().getValue());
        }
    }

    var HTMLContainer = document.querySelector(".HTMLContainer");

    var cmeditor = CodeMirror(HTMLContainer, {
        lineNumbers: true,
        mode: "htmlmixed"
    });

    cmeditor.on("change", (editor) => {
        updateEditor();
    });


</script>
</body>
</html>
