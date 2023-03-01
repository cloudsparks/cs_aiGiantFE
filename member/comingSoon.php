<?php 
    session_start();

    if (in_array("News", $_SESSION['blockedRights'])){
     header("Location: dashboard.php");
    } 
?>
<?php include 'include/config.php'; ?>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<section class="pageContent">
    <div class="kt-container">
        <div class="px-5">
            <div class="comingSoonBg text-center">
                <div class="comingSoonTitle" data-lang="M00866">
                    <?php echo $translations['M00866'][$language]; //COMING SOON ?>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="col-4">
                        <div class="whiteLine"></div>
                    </div>
                </div>
                
                <div data-lang="M01158">
                    <?php echo $translations['M01158'][$language]; //We are currently working on creating this page.  ?>
                </div>
                <div data-lang="M01159">
                    <?php echo $translations['M01159'][$language]; //We will be launching soon, Stay tuned for our new update. ?>
                </div>
                <div class="mt-5">
                    <img class="comingSoonLogo" src ="images/logo/logo.png">
                </div>
            </div>
        </div>
    </div>
</section>

<div id="newsDetails"></div>

<?php include 'footer.php'; ?>
</body>


<?php include 'backToTop.php' ?>

<?php include 'sharejs.php'; ?>

<script>
var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;


$(document).ready(function(){

});



</script>
