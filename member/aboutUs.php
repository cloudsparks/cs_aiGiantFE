<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/homepageResponsive.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/homepageMenu.css?v=<?php echo filemtime('css/homepageMenu.css'); ?>" rel="stylesheet" type="text/css" />
<?php include 'homepageMenu.php';?>


<!-- About Us Title -->
<!-- <div>
    <div class="banner productListingPortfolioBanner">
        <img class="aboutUsBannerImg compProf m-0 p-0" src="images/project/aboutUsBanner.png" alt="aboutUsBanner">
        <div class="bannerText text-center">
            <label class="bannerTitle aboutUsBanner mb-2" data-lang="M00432"><?php echo $translations['M00432'][$language]; /* About Us */?></label>            
        </div>
    </div>    
</div> -->

<div class="d-flex justify-content-center align-items-center">               
    <img alt="user profile" src="./images/project/aboutUsBanner.png" class="mb-1" style="width: 100%;height: auto;" >
                 
    <div class="overlay">
         <div class="pageTitleContact jcv" data-lang='M00432'>
            <span><?php echo $translations['M00432'][$language]; /* About Us */?></span>
         </div>
    </div>
</div>

<!-- section 1 -->

<section class="homepage_section05">
    <div class="pt-5 pb-5 homepage_section05_title ">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">                   
                    <div class="col-lg-4">
                        <div class="imglogoMenu">
                            <img src="/images/project/logoback.png" class="aboutUsImg1">
                        </div>  
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5">
                        <div class="aboutUsContent">
                            <p data-lang='M03568'><b><?php echo $translations['M03568'][$language]; /* Joint Cap Ventures（JCV）Group */?></b> <span data-lang='M01187'><?php echo $translations['M01187'][$language]; /* is an Actuarial Services firm incorporated in the */?></span><span data-lang='M01188'><b> <?php echo $translations['M01188'][$language]; /* Republic of Seychelles and founded by a team of actuaries, data scientist and professional traders. */?></b></span></p> 
                        </div>                            
                    </div>
                    <div class="col-lg-1"></div>
                </div>                   
            </div>               
        </div>
    </div>       
</section>

<!-- section 2 -->

<section class="aboutUsHeight">
    <div class="row aboutUsSection">
        <div class="col-lg-12 aboutUsContentImage" align="center">
            <div class="row aboutUsSec2">
                <div class="col-lg-2"></div>
                <div class="col-lg-5 aboutUsContent1 order-2 order-lg-1">
                    <p data-lang='M01194'><?php echo $translations['M01194'][$language]; /* The Group’s core businesses include the */?><span data-lang='M01195'><b> <?php echo $translations['M01195'][$language]; /* development of Systems, Programs and Algorithms that utilize artificial intelligence and actuarial science. */?></b></span> <span data-lang='M01196'><?php echo $translations['M01196'][$language]; /* In addition, the Group’s team of professionals also provide a comprehensive range of actuarial and strategic consulting services for enterprises, helping them assess, measure and manage risks. */?></span></p>
                </div>
                <div class="col-lg-5 order-1 order-lg-2">
                    <img class="aboutUsC1" src="./images/project/aboutUsContent1.png" alt="aboutUsContent1">                
                </div>  
            </div>
            <div class="row aboutUsSec3">
                <div class="col-lg-5">
                    <img class="aboutUsC1" src="./images/project/aboutUsContent2.png" alt="aboutUsContent1">                
                </div>  
                <div class="col-lg-5 aboutUsContent2">
                    <p data-lang='M03569'><b><?php echo $translations['M03569'][$language]; /* Joint Cap Ventures（JCV）Group possesses */?></b> <span data-lang='M01198'><?php echo $translations['M01198'][$language]; /* broad capabilities across diverse areas, utilizing a combination of both traditional actuarial and innovative strategic tools such as proprietary software and customized formulas, tailoring our strategies to meet the needs of each client. */?></span></p>
                </div>
                <div class="col-lg-2"></div>
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