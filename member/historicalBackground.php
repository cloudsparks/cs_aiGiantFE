<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/homepageResponsive.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/homepageMenu.css?v=<?php echo filemtime('css/homepageMenu.css'); ?>" rel="stylesheet" type="text/css" />
<?php include 'homepageMenu.php';?>

<!-- Historical Background Banner -->
<div class="userOverlay">
   
    <div class="d-flex justify-content-center align-items-center">               
        <img alt="user profile" src="./images/project/historicalBannerImg.png" class="mb-1" style="width: 100%;height: auto;" >
                     
        <div class="overlay">
             <div class="pageTitleContact jcv" data-lang='M01161'>
                <span><?php echo $translations['M01161'][$language]; /* Historical Background of Actuaries */?></span>
             </div>
        </div>
    </div> 


<!-- Historical Content -->
    <section>
        <div class="row">
            <div class="col-md-12 ">
                <div class=" box4 row ">
                    <div class="col-lg-6 cols-12  ">
                        <img src="./images/project/historicalSec1Img1.png" alt="historicalSec1Img1"  class="mr-0 mr-md-3 mb-4">
                   
                    
                        <img src="./images/project/historicalSec1Img2.png" alt="historicalSec1Img2"  class=" mb-4">
                   </div>
                    <div class="col-lg-6 cols-12 ml-md-4 mr-md-4 ml-lg-0 mr-lg-0">
                        <div class="historicalSec1SubContent1 ml-0  text-left">
                            <div class="text-left mb-1" data-lang='M01274'><?php echo $translations['M01274'][$language]; /* Actual Science */?></div>
                        </div>
                        <div class="historicalSec1SubContent2 text-left">
                            <div>
                                <span data-lang='M01274'><b><?php echo $translations['M01274'][$language]; /* Actual Science */?></b></span> <span data-lang='M01275'><?php echo $translations['M01275'][$language]; /* is the discipline that applies mathematical and statistical methods to assess risk. In other words, actuarial science applies rigorous mathematics to model matters of uncertainty. */?></span>
                            </div>
                        </div>
                        <div class="historicalSec1SubContent3 text-left">
                            <div data-lang='M01276'><?php echo $translations['M01276'][$language]; /* Actuarial science became a formal mathematical discipline in the late 17th century and has grown from strength to strength ever since. */?></div>
                        </div>                                     
                    </div>
                   
                </div>           
            </div>      
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-md-12 historicalSec2">                      
                <div class="row d-flex justify-content-center ">
                    
                    <div class="col-md-9 historicalSec2Content ml-3 ml-sm-3 mr-sm-3 ml-md-0 mr-md-0 d-flex text-left align-items-center" data-lang="M01277">
                        <div>
                            <span data-lang='M01277'><b><?php echo $translations['M01277'][$language]; /* As we enter the 20th and 21st Centuries, */?></b></span> <span data-lang='M01278'><?php echo $translations['M01278'][$language]; /* demand for actuarial services has never been stronger with growth of the insurance and financial industries as well as the increasing sophistication of financial markets trading. */?></span>
                        </div>
                    </div> 
                  
                </div>           
            </div>        
        </div>
    </section>

    <section>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-10 ">
                <div class="row pl-5 pr-5 pl-sm-0 pr-sm-0 ">
                    <div class="col-md-6 historicalSec3Content" data-lang="M01279" style="display: flex; flex-direction: column;justify-content: center;">
                        <div data-lang='M01279'>
                            <div class="text-left"><?php echo $translations['M01279'][$language]; /* In fact, the ability to effectively foresee, assess and control risks is key to a Corporation or Individual’s success and lies at the heart of today’s economic and financial system. Industries that extensively apply Actuarial Science in their day-to-day business operations include Banking, Financial Markets Trading (Commodities, FOREX), Fund Management (Pension Funds, Venture Capital Funds), Insurance (General Insurance, Life Insurance, Re-Insurance), Healthcare, Legal (Litigation & Arbitration) and Human Resource Management. */?></div>
                        </div>
                        <div data-lang='M01280'>
                            <div class="text-left mb-2"><?php echo $translations['M01280'][$language]; /* Actuarial Science can help enterprises identify opportunities in key areas that can help to drive greater growth and increase profits. */?></div>
                        </div>                                                      
                    </div>
                    <div class="col-md-6 d-flec justify-content-center">
                        <img src="./images/project/historicalSec3Img1.png" alt="historicalSec3Img1" class="mb-3 mt-5" style="width: 100%;">
                    
                        <img src="./images/project/historicalSec3Img2.png" alt="historicalSec3Img2" style="width: 100%;" class="mb-5">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?php include 'homepageFooter.php' ?>
    
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>