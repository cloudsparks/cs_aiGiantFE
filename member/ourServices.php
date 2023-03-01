<?php
include 'include/config.php';
include 'head.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/homepageResponsive.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/homepageMenu.css?v=<?php echo filemtime('css/homepageMenu.css'); ?>" rel="stylesheet" type="text/css" />
<?php include 'homepageMenu.php';?>


 <div class="userOverlay" style="overflow-x:hidden;">
    <div class="d-flex justify-content-center align-items-center">         
        <img alt="user profile" src="./images/project/service1.png" class="" style="width: 100%;height: auto;" >
                     
        <div class="overlay">
             <div class="pageTitleContact">
                <span data-lang="M01235"><?php echo $translations['M01235'][$language]; //Our Service  ?></span>
             </div>
        </div>
    </div>
    <div class="">
          <div class="img1">
             <div class="row">
                <div class="col-md-12 d-flex align-items-center">

                     <div class="jcv">
                        <div class="pageTitleContact  pl-md-5 pr-md-5">
                           
                              <div class="contentText6 responsiveText mt-0  mt-lg-0"><span data-lang="M01236"><b><?php echo $translations['M01236'][$language]; //As a leading company in the field of actuarial consultancy ?>, </b></span><span data-lang="M03570" class="contentText"><?php echo $translations['M03570'][$language]; //Joint Capital Ventures Group work closely with our clients to understand their needs, come up with and deliver bespoke solutions that are specifically tailored to meet the requirements. ?></span></div>
                              <div class="contentText6 responsiveText mt-3 mb-3 "><span data-lang="M03571"><b><?php echo $translations['M03571'][$language]; //Joint Cap Ventures Group  ?></b> </span><span data-lang="M01239" class="contentText"><?php echo $translations['M01239'][$language]; // strives to provide agile solutions for our clients in a dynamic, and sometimes unpredictable environment, in a timely manner. ?></span>
                              </div>
                              <div class="contentText6 responsiveText"><span data-lang="M01268"><b><?php echo $translations['M01268'][$language]; //We provide our clients with the peace of mind ?></b> </span><span data-lang="M01269" class="contentText"><?php echo $translations['M01269'][$language]; // that all their actuarial needs will be handled in a timely, professional and effective manner. ?></span>
                              </div>
                        </div>

                    </div>
                  
                </div>
             </div>
         </div>
    </div>
    <div class="contentText6 my-5 mx-sm-5  "><span data-lang="M01240"><?php echo $translations['M01240'][$language]; //Notable services in the field of //actuarial science offered by us include ?>:</span></div>
        <div class="box5 my-3 m-md-5 m-4">
            <div class="row">
                <div class="col-md-6 flex1 ">
                    <div class="contentText4 mb-1 text-left"><span data-lang="M01241"><?php echo $translations['M01241'][$language]; //Loss Forecast ?></span></div>
                     <div class="contentText text-left mb-3  mb-md-0"><span data-lang="M01242"><?php echo $translations['M01242'][$language]; //We conduct loss forecast studies for our clients to help them plan for future costs. ?></span></div>
                </div>
                <div class="col-md-6">
                    <img alt="user profile" src="./images/project/service3.png" class="mb-1" style="width: 100%;height: 100%;" >
              </div>
            </div>   
         </div>
        <div class="box5 m-md-5 m-4">
             <div class="row">
                <div class="col-md-6 ">
                    <img alt="user profile" src="./images/project/service4.png" class="mb-2 mb-md-0" style="width: 100%;max-height: 680px;" >
                </div>
                     <div class="col-md-6 flex1">
                        <div class="contentText4 text-left mb-1 "><span data-lang="M01243"><?php echo $translations['M01243'][$language]; //Loss Reserve
                        //Analysis ?></span>
                        </div>
                         <div class="contentText text-left mb-3 mb-md-4"><span data-lang="M01244"><?php echo $translations['M01244'][$language]; //Particularly popular with clients within the insurance industry, our analysis relies on the client’s own historical experience for loss development and trends to the greatest extent possible. Our analysis also takes into consideration the historical retention for each exposure. To the extent that data are not fully credible or available for certain aspects of the analysis, we would supplement data with industry statistics ?>.</span></div>
                          <div class="contentText text-left "><span data-lang="M01245"><?php echo $translations['M01245'][$language]; //Our studies provide an estimation of the statistical variability inherent in the actuarial estimates, providing for projections at various confidence levels. Provision of estimates at other than expected will allow our client to evaluate the variability inherent in the estimates. While the central estimate provides an adequate basis for funding, clients wishing to reduce the potential for adverse results should consider including a risk margin. The choice of risk margin is dependent upon the client’s risk tolerance, and the size of the retention. ?></span></div>
                    </div>
                
            </div>
        </div>
       <div class="box5 m-md-5 m-4 ">
            <div class="row">
                <div class="col-md-6 flex1">
                    <div class="contentText4 text-left mb-1"><span data-lang="M01246"  style="word-break: break-word;"><?php echo $translations['M01246'][$language]; //Enterprise Risk Management ?></span></div>
                     <div class="contentText text-left mb-3 mb-md-4"><span data-lang="M01247"><?php echo $translations['M01247'][$language]; //Enterprise Risk Management (ERM) helps to improve decision-making by objectively considering and managing the uncertainties in running a business and the appetites and tolerances for bearing risk. ?></span></div>
                       <div class="contentText  text-left mb-3 mb-md-4"><span data-lang="M01248"><?php echo $translations['M01248'][$language]; //We work closely with our clients, using a comprehensive, holistic, and objective framework of methods and approaches to identify, measure, monitor, and continuously improve the management of risk whether financial, credit, operational, reputational, legal, or strategic in nature. ?></span></div>
                         <div class="contentText  text-left mb-2"><span data-lang="M01249"><?php echo $translations['M01249'][$language]; //By doing so, we help our clients prudently manage risk, thereby improving the chance of achieving organizational goals and objectives such as maximizing profits, accessing excess capital, or expanding into new markets. ?></span></div>
                </div>
                <div class="col-md-6">
                    <img alt="user profile" src="./images/project/service5.png" class="mb-1 " style="width: 100%;max-height: 680px;" >
              </div>
          </div>
            
        </div>
        <div class="contentText6 text-left m-md-5 m-4 pl-sm-5 pr-sm-5"><span data-lang="M01250"><?php echo $translations['M01250'][$language]; //We have worked with clients of all sizes across various industry sectors, including, but not limited to: ?>:</span></div>
        
        <div class="services m-md-5 m-4 m-md-0 pl-sm-5 pr-sm-5 ">
             <div class="row d-flex justify-content-center">
                <div class="col-md-10 cols-12 d-md-flex justify-content-center">
                     <div class="row ">
                        <div class="cols-12 flex2 text-left">
                             <div class="mb-1 ml-3 ml-md-0">
                                 <i class="fa fa-check "><span data-lang="M01251" class="contentText ml-2"><?php echo $translations['M01251'][$language]; //Captive Insurance (Domestic and International) ?></span></i>
                             </div>
  
                            <div class="mb-1 ml-3 ml-md-0">
                                <i class="fa fa-check"><span data-lang="M01252" class="contentText ml-2"><?php echo $translations['M01252'][$language]; //Public Entities ?></span></i>
                             </div>
       
                                <div class="mb-1 ml-3 ml-md-0">
                                    <i class="fa fa-check"><span data-lang="M01253" class="contentText ml-2"><?php echo $translations['M01253'][$language]; //Manufacturing ?></span></i>
                                 </div>
                           
                                <div class="mb-1 ml-3 ml-md-0">
                                    <i class="fa fa-check"><span data-lang="M01254" class="contentText ml-2"><?php echo $translations['M01254'][$language]; //Hospitality ?></span></i>
                                 </div>
                           
                                <div class="mb-1 ml-3 ml-md-0">
                                    <i class="fa fa-check"><span data-lang="M01255" class="contentText ml-2"><?php echo $translations['M01255'][$language]; //Non-Profit Organizations ?></span></i>
                                 </div>
                           
                                <div class="mb-1 ml-3 ml-md-0">
                                    <i class="fa fa-check"><span data-lang="M01256" class="contentText ml-2"><?php echo $translations['M01256'][$language]; //Healthcare ?></span></i>
                                 </div>
                           
                                <div class="mb-1 ml-3 ml-md-0">
                                    <i class="fa fa-check"><span data-lang="M01257" class="contentText ml-2"><?php echo $translations['M01257'][$language]; //Communication ?></span></i>
                                 </div>
                          
                                <div class="mb-1 ml-3 ml-md-0">
                                    <i class="fa fa-check"><span data-lang="M01258" class="contentText ml-2"><?php echo $translations['M01258'][$language]; //Food Service ?></span></i>
                                 </div>
       
                                <div class="mb-1 ml-3 ml-md-0">
                                    <i class="fa fa-check"><span data-lang="M01259" class="contentText ml-2"><?php echo $translations['M01259'][$language]; //Transportation ?></span></i>
                                 </div>
                          
                        </div>

                    </div>

                     <div class="row">
        
                        <div class=" cols-12 flex2 ml-md-5 pl-md-5 ml-0 mr-0">
                            <div class="mb-1 ml-3 ml-md-0">
                                <i class="fa fa-check"><span data-lang="M01261" class="contentText ml-2"><?php echo $translations['M01261'][$language]; //Retail ?></span></i>
                             </div>
                      
                            <div class="mb-1 ml-3 ml-md-0">
                                <i class="fa fa-check"><span data-lang="M01262" class="contentText ml-2"><?php echo $translations['M01262'][$language]; //Insurance ?></span></i>
                             </div>
                      
                            <div class="mb-1 ml-3 ml-md-0">
                                <i class="fa fa-check"><span data-lang="M01263" class="contentText ml-2"><?php echo $translations['M01263'][$language]; //Education ?></span></i>
                             </div>
                   
                            <div class="mb-1 ml-3 ml-md-0">
                                <i class="fa fa-check"><span data-lang="M01264" class="contentText ml-2"><?php echo $translations['M01264'][$language]; //Construction ?></span></i>
                             </div>
                      
                            <div class="mb-1 ml-3 ml-md-0">
                                <i class="fa fa-check"><span data-lang="M01265" class="contentText ml-2"><?php echo $translations['M01265'][$language]; //Energy ?></span></i>
                             </div>
           
                            <div class="mb-1 ml-3 ml-md-0">
                                <i class="fa fa-check"><span data-lang="M01266" class="contentText ml-2"><?php echo $translations['M01266'][$language]; //Agriculture ?></span></i>
                             </div>
                      
                            <div class="mb-1 ml-3 ml-md-0">
                                <i class="fa fa-check"><span data-lang="M01267" class="contentText ml-2"><?php echo $translations['M01267'][$language]; //Financial ?></span></i>
                             </div>
                               <div class="mb-1 ml-3 ml-md-0 text-left">
                                <i class="fa fa-check"><span data-lang="M01260" class="contentText ml-2"><?php echo $translations['M01260'][$language]; //Leisure & Entertainment ?></span></i>
                             </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</div>


<?php include 'homepageFooter.php' ?>
    
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>