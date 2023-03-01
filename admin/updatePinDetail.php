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
<div id="wrapper">
    <?php include("topbar.php"); ?>
    <?php include("sidebar.php"); ?>
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="pinList.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                            <i class="md md-add"></i>
                            <?php echo $translations['A00115'][$language]; /* Back */ ?>
                        </a>
                    </div><!-- end col -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box p-b-0">
                            <div class="row">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a data-toggle="tab">
                                            <?php echo $translations['A00687'][$language]; /* Edit Pin Details */ ?>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content m-b-30">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form role="form" id="updatePinDetail" data-parsley-validate novalidate>
                                                <div id="basicwizard" class=" pull-in">
                                                    <div class="tab-content b-0 m-b-0 p-t-0">
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A00653'][$language]; /* Pin Code */ ?> :
                                                            </label>
                                                            <span id="pinCode"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A00203'][$language]; /* Package */ ?> :
                                                            </label>
                                                            <span id="package"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A00206'][$language]; /* Bonus Value */ ?> :
                                                            </label>
                                                            <span id="bonusValue"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A00673'][$language]; /* Buyer ID */ ?> :
                                                            </label>
                                                            <span id="buyerId"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A00674'][$language]; /* Buyer Username */ ?> :
                                                            </label>
                                                            <span id="buyerUsername"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A00677'][$language]; /* Place ID */ ?> :
                                                            </label>
                                                            <span id="placeId"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A00694'][$language]; /* Place Username */ ?> :
                                                            </label>
                                                            <span id="placeUsername"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>
                                                                <?php echo $translations['A00318'][$language]; /* Status */ ?> :
                                                            </label>
                                                            <select id="status" class="form-control" dataName="status" dataType="select">
                                                                <option value="New">
                                                                    <?php echo $translations['A00658'][$language]; /* New */ ?>
                                                                </option>
                                                                <option value="Used">
                                                                    <?php echo $translations['A00659'][$language]; /* Used */ ?>
                                                                </option>
                                                                <option value="Cancel">
                                                                    <?php echo $translations['A00660'][$language]; /* Cancel */ ?>
                                                                </option>
                                                                <option value="Refund">
                                                                    <?php echo $translations['A00661'][$language]; /* Refund */ ?>
                                                                </option>
                                                                <option value="Transferred">
                                                                    <?php echo $translations['A00662'][$language]; /* Transferred */ ?>
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 m-b-20">
                            <button id="submit" type="submit" class="btn btn-primary waves-effect waves-light">
                                <?php echo $translations['A00300'][$language]; /* Update */ ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("footer.php"); ?>
        </div>
    </div>
    <script>
        var resizefunc     = [];
    </script>
    <?php include("shareJs.php"); ?>
    <script>
        var url            = 'scripts/reqAdmin.php';
        var method         = 'POST';
        var debug          = 0;
        var bypassBlocking = 0;
        var bypassLoading  = 0;

        $(document).ready(function() {
            var formData   = {
                command    : "getPinDetail",
                pinId       : "<?php echo $_POST['pinId'] ?>"
            };
            var fCallback  = loadPinDetail;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('#submit').click(function() {
                var validate    = $('#updatePinDetail').parsley().validate();
                var pinId       = "<?php echo $_POST['pinId'] ?>";
                var pinIdList   = [];
                pinIdList.push(pinId);
                if(validate) {

                    var formData = {
                        command     : "updatePinDetail",
                        pinId       : pinIdList,
                        status      : $('#status').val()
                    }
                    var fCallback = sendEdit;
                    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
                }
            });
        });

        function loadPinDetail(data, message){

            $('#pinCode').text(data.code);
            $('#package').text(data.package_name);
            $('#bonusValue').text(data.bonus_value);
            $('#buyerId').text(data.buyer_id);
            $('#buyerUsername').text(data.buyer_username);
            if (data.receiver_id === 0 || !data.receiver_id)
                $('#placeId').text("-");
            else
                $('#placeId').text(data.receiver_id);
            if (data.receiver_username === 0 || !data.receiver_username)
                $('#placeUsername').text("-");
            else
                $('#placeUsername').text(data.receiver_username);

            $('#status').val(data.status);
            if (data.status === "Used" || data.status === "Cancel" || data.status === "Refund")
                $('#status').attr("disabled", "disabled");

        }

        function sendEdit(data, message) {
            showMessage('<?php echo $translations['A00697'][$language]; /* Pin detail successfully updated */ ?>', 'success', '<?php echo $translations['A00698'][$language]; /* Update pin detail */ ?>', 'edit', 'pinList.php');
        }
    </script>
    </body>
</html>
