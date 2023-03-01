    <?php 
    session_start();
    $thisPage = basename($_SERVER['PHP_SELF']);
    ?>
    <!DOCTYPE html>
    <html>
    <?php include("head.php"); ?>
    <div id="wrapper">
        <?php include("topbar.php"); ?>
        <?php include("sidebar.php"); ?>
        <div class="content-page">
            <div class="content">
                <div class="container">
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
                                <div class="row">
                                    <form role="form" enctype="multipart/form-data">
                                        <div id="basicwizard" class=" pull-in">
                                            <div class="tab-content b-0 m-b-0 p-t-0">
                                                <div class="col-12" style="margin-bottom:10px;">
                                                    <label>
                                                        <!-- <?php echo $translations['A00369'][$language]; /* Subject */?> -->
                                                        Title
                                                    </label>
                                                    <input id="name" type="text" class="form-control" required/>
                                                    <span id="nameError" class="errorSpan text-danger"></span>
                                                </div>
                                                <div class="col-12" style="margin-bottom:10px;">
                                                    <label class="control-label">
                                                        <!-- <?php echo $translations['A00153'][$language]; /* Country */ ?> -->
                                                        Package
                                                    </label>
                                                    <select id="package" class="form-control country" dataName="package" dataType="text">
                                                        <!-- <option value="">
                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                        </option> -->
                                                        <option value="300">
                                                            300
                                                        </option>
                                                        <option value="1000">
                                                            1000
                                                        </option>
                                                        <option value="3000">
                                                            3000
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-12" style="margin-bottom:10px;">
                                                    <label>
                                                        <!-- <?php echo $translations['A00145'][$language]; /* Description */?> -->
                                                        URL
                                                    </label>
                                                    <textarea id="url" class="form-control" rows="4" cols="50" required></textarea>
                                                    <span id="urlError" class="errorSpan text-danger"></span>
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

                </div>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </div>
</div>

<div class="modal fade" id="modalProcessing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 25px;" aria-modal="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span id="canvasTitle" class="modal-title"><?php echo "Processing"; //Processing ?></span>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage"><?php echo "Uploading file..."; //Uploading file... ?></div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<script>var resizefunc = [];</script>
<?php include("shareJs.php"); ?>

<script>
    var url             = 'scripts/reqUpload.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var language        = "<?php echo $language; ?>";
    var systemLang      = null;
    var selectedLang = [];

    var reqData =  new FormData();


    $(document).ready(function() {
        $('#backBtn').click(function() {
            $.redirect('videoList.php');
        });

        // fCallback = buildCountry;
        // formData  = {command: 'getMemoList'};
        // ajaxSend('scripts/reqUpload.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#submitBtn').click(function() {
            $('.errorSpan').empty();

            var name = $('#name').val();
            var package = $('#package').val();
            var url   = $('#url').val();

            fCallback = submitCallback;
            formData  = {
                command: 'uploadVideo',
                name : name,
                package : package,
                url : url,
            };

            ajaxSend('scripts/reqUpload.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        });
    });

    function submitCallback(data, message) {
        // showMessage('<?php echo $translations['A00446'][$language]; /* Successful added memo. */?>', 'success', '<?php echo $translations['A00447'][$language]; /* Add Memo */?>', 'upload', 'videoList.php');
        showMessage('Successful upload video.', 'success', 'upload video', 'upload', 'videoList.php');
    }
</script>
</body>
</html>
