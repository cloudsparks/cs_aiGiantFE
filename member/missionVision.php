<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/homepageResponsive.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/homepageMenu.css?v=<?php echo filemtime('css/homepageMenu.css'); ?>" rel="stylesheet" type="text/css" />
<?php include 'homepageMenu.php';?>


<!-- Mission & Vision Banner -->

<div class="d-flex justify-content-center align-items-center">               
    <img alt="user profile" src="./images/project/missionImg1.png" class="mb-1" style="width: 100%;height: auto;" >
                 
    <div class="overlay">
         <div class="pageTitleContact jcv" data-lang='M01234'>
            <span><?php echo $translations['M01234'][$language]; /* Mission and Vision */?></span>
         </div>
    </div>
</div>

<!-- Mission Content -->

<section>
    <div class="row">
        <div class="col-md-12 " align="center">
            <div class="col-10">
                <div class="row missContent1 mb-3 align-items-center">
                    <div class="col-sm col-md-4 missContentSub1" data-lang='M01270'>
                        <p><?php echo $translations['M01270'][$language]; /* Mission */?></p>
                    </div>
                    <div class="col-sm col-md-8 missContentSub2" data-lang='M01272'>
                        <p><?php echo $translations['M01272'][$language]; /* Our Mission: “Providing the highest level of quality service by coming up with effective tools and solutions in any circumstances.” */?></p>
                    </div>
                </div>
                
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="col-md-12 " align="center">
            <div class="col-10">
                <div class="row missContent2 mt-3 align-items-center"> 
                    <div class="col-sm col-md-4 missContentSub1 d-block d-md-none" data-lang='M01271'>
                        <p><?php echo $translations['M01271'][$language]; /* Vision */?></p>
                    </div>                   
                    <div class="col-sm col-md-8 missContentSub2 missContentSub2_sm" data-lang='M01273'>
                        <p><?php echo $translations['M01273'][$language]; /* Our Vision: “To be the leading actuarial services provider of choice for our clients and by doing so, make great contributions to the growth of industry, commerce and finance.” */?></p>
                    </div>
                    <div class="col-sm col-md-4 d-none d-sm-none d-md-block missContentSub_1 " data-lang='M01271'>
                        <p><?php echo $translations['M01271'][$language]; /* Vision */?></p>
                    </div>
                </div>
                
            </div>
        </div>    
    </div>
        
</section>


<?php include 'homepageFooter.php' ?>
    
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>