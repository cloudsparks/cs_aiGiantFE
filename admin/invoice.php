<?php
session_start();

// Get current page name
$thisPage = basename($_SERVER['PHP_SELF']);

// Check the session for this page
// if(!isset ($_SESSION['access'][$thisPage]))
//     echo '<script>window.location.href="accessDenied.php";</script>';
// $_SESSION['lastVisited'] = $thisPage;
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
                    <div class="col-lg-12">
                        <div class="card-box row">
                            <h3><b><?php echo $translations['A00279'][$language]; /* Invoice */ ?></b></h3>
                            <div class="m-t-rem4">
                                <!-- <div class="col-md-6">
                                    <div class="col-md-12">
                                        <span>Invoice ID</span>
                                        <h4><b>6619859431</b></h4>
                                    </div>
                                    <div class="col-md-12 m-t-rem2">
                                        <span>Transaction Date</span>
                                        <h4><b>27/10/2017, 04:56 PM</b></h4>
                                    </div>
                                    <div class="col-md-12 m-t-rem2">
                                        <span>Grand Total</span>
                                        <h4><b>0.00</b></h4>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <span>Full Name</span>
                                        <h4><b>Director</b></h4>
                                    </div>
                                    <div class="col-md-12 m-t-rem2">
                                        <span>Member ID</span>
                                        <h4><b>00000001</b></h4>
                                    </div>
                                    <div class="col-md-12 m-t-rem2">
                                        <span>Username</span>
                                        <h4><b>director</b></h4>
                                    </div>
                                </div> -->
                                <table class="table table-borderless" style="width:100%;">
                                    <tbody>
                                        <tr style="">
                                            <td style="width:45%; height:60px; border: none;"><span><?php echo $translations['A01097'][$language]; /* Invoice No */?></span>
                                                <h4>0487640002</h4></td>
                                            <td style="width:45%; height:60px; border: none;"><span><?php echo $translations['A00117'][$language]; /* Full Name */?></span>
                                                <h4>Director</h4></td>
                                        </tr>
                                        <tr>
                                            <td style="width:45%; height:60px; border: none;"><span><?php echo $translations['A00564'][$language]; /* Transaction Date */?></span>
                                                <h4>27/10/2017, 04:56 PM</h4></td>
                                            <td style="width:45%; height:60px; border: none;"><span><?php echo $translations['A00148'][$language]; /* Member ID */ ?></span>
                                                <h4>00000001</h4></td>
                                        </tr>
                                        <tr>
                                            <td style="width:45%; height:60px; border: none;"><span><?php echo $translations['A00651'][$language]; /* Grand Total */?></span>
                                                <h4>0.00</h4></td>
                                            <td style="width:45%; height:60px; border: none;"><span><?php echo $translations['A00102'][$language]; /* Username */?></span>
                                                <h4>Director</h4></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="m-t-rem2 col-md-12 m-t-rem2">
                                    <div class="table-responsive">
                                        <table id="memberListTable" class="table table-striped table-bordered no-footer m-0">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $translations['A01099'][$language]; /* Product ID */ ?></th>
                                                    <th><?php echo $translations['A00754'][$language]; /* Product Name */ ?></th>
                                                    <th><?php echo $translations['A00755'][$language]; /* Unit BV */ ?></th>
                                                    <th><?php echo $translations['A00355'][$language]; /* Unit Price */ ?> <?php echo $translations['A01100'][$language]; /* (Credit(s)) */ ?></th>
                                                    <th><?php echo $translations['A00627'][$language]; /* Quantity */ ?></th>
                                                    <th><?php echo $translations['A00758'][$language]; /* Total BV */ ?></th>
                                                    <th><?php echo $translations['A00629'][$language]; /* Total Price */ ?> <?php echo $translations['A01100'][$language]; /* (Credit(s)) */ ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>0004</td>
                                                    <td>BCH5000</td>
                                                    <td>0</td>
                                                    <td>0.00</td>
                                                    <td>3</td>
                                                    <td>0</td>
                                                    <td>0.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" style="text-align: right; background-color: #e8edf2;"><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</td>
                                                    <td style="background-color: #e8edf2;">0.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-12 m-t-rem2">
                                    <h4><?php echo $translations['A00212'][$language]; /* Payment */ ?></h4>
                                    <span><?php echo $translations['A00651'][$language]; /* Grand Total */?>: <span class="m-l-rem3">0.00 <?php echo $translations['A01100'][$language]; /* (Credit(s)) */ ?></span></span>
                                </div>

                                <div class="col-md-12 m-t-rem4">
                                    <h4><?php echo $translations['A00571'][$language]; /* Remark */ ?></h4>
                                    <span>BCH500: <span class="m-l-rem3">qbi1t6vpd9, 1w2k0zf1tj, dsu39p8zgj</span></span>
                                </div>

                                <div class="col-md-12 m-t-rem5">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="window.print();">
                                        <?php echo $translations['A00753'][$language]; /* Print */ ?>
                                    </button>
                                </div>
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
<script>
    var resizefunc = [];
</script>
<?php include("shareJs.php"); ?>
<script>

</script>
</body>
</html>