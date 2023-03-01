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
                    <div class="col-sm-4">
                        <button id="backBtn" onclick="backBtn()" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <h4 class="header-title m-t-0 m-b-30">
                                <?php echo $translations['A01728'][$language]; /* Edit World Cup Event */ ?>
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
                                                                    <textarea id="match" class="form-control limitText worldCupFont" rows="4" cols="50" ></textarea>
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
                                                                    <textarea id="odd" class="form-control limitText worldCupFont" rows="4"  cols="50" ></textarea>
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
                        <button id="add" onclick="submitEdit()" type="submit" class="btn btn-primary waves-effect waves-light">
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
    var rowId = "<?php echo $_POST['id']; ?>";
    var oddContent;
    var matchContent;
        
    var fCallback;
    $(document).ready(function() {
        var formData = {
            command: "editWorldCupEvent",
            id : rowId, 
            action: "edit",
            step: 1
        }
        
        fCallback = showEdits
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function showEdits(data,message) {

        oddContent = data.odd;
        matchContent = data.match;

        tinymce.init({
            selector: "#match",
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
                editor.on("init",function(e) {
                    editor.setContent(`${data.match}`)
                })
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
                editor.on("init",function(e) {
                    editor.setContent(`${data.odd}`)
                })
            }
        });

    }

    function submitEdit() {

        var formData = {
            command: "editWorldCupEvent",
            id : rowId, 
            action: "edit",
            new_match: matchContent,
            new_odd: oddContent,
            step: 2
        }
        
        fCallback = showSuccess
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }

    function showSuccess() {
        showMessage('<?php echo $translations['A01729'][$language]; /* Successfully Edit World Cup Event */ ?>', 'success', '<?php echo $translations['A01728'][$language]; /* Edit World Cup Event */ ?>', 'upload', 'worldCupEventListing.php');
    }

    function backBtn() {
        $.redirect('worldCupEventListing.php')
    }

    function updateHTML(content) {
        cmeditor.getDoc().setValue(content);
        oddContent = tinymce.get('odd').getContent();
        matchContent = tinymce.get('match').getContent();
    }

    var HTMLContainer = document.querySelector(".HTMLContainer");

    var cmeditor = CodeMirror(HTMLContainer, {
        lineNumbers: true,
        mode: "htmlmixed"

    });

</script>
</body>
</html>
