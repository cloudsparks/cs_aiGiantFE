    <section class="homepage_footer">
        <section>
            <div class="col-12 footerHomepageWrap d-none d-md-none d-lg-block">
    			<div class="row align-items-baseline">
    				<div class="col-3 footerHomepageContentBox">
                    <img src="images/logo/logo.png" width="200">
                        <!-- <div>
                            <span>Lorem ipsum is typically a corrupted version of 'De finibus bonorum et malorum' a 1st century BC</span>
                        </div>    -->         
                    </div>
                    <div class="col-3 footerHomepageContentBox">
                        <div class="footerHomepageTitle" data-lang='M00258'>
                            <span><?php echo $translations['M00258'][$language]; //Home ?></span>
                        </div>  
                        <div>
                            <!-- <div class="footerButton">
                                <a href="aboutUs" class="footerMenu" data-lang='M00432'>
                                    <span><?php echo $translations['M00432'][$language]; /* About Us */?></span>
                                </a>
                            </div> -->
                            <div class="footerButton">
                                <!-- <a href="missionVision" class="footerMenu" data-lang='M01160'> -->
                                <a data-toggle="modal" data-target="#comingSoonModal" class="footerMenu" data-lang='M01160'>
                                    <span><?php echo $translations['M01160'][$language]; /* Mission and Vision */?></span>
                                </a>
                            </div>
                            <div class="footerButton">
                                <!-- <a href="historicalBackground" class="footerMenu" data-lang='M01161'> -->
                                <a data-toggle="modal" data-target="#comingSoonModal" class="footerMenu" data-lang='M01161'>
                                    <span><?php echo $translations['M01161'][$language]; /* Historical Background of Actuaries */?></span>
                                </a>
                            </div>                       
                        </div>
                    </div>
                    <div class="col-3 footerHomepageContentBox">
                        <div class="footerHomepageTitle" data-lang='M01281'>
                            <span><?php echo $translations['M01281'][$language]; /* More Information */?></span>
                        </div> 
                        <div>
                            <div class="footerButton" data-lang='M01162'>
                                <!-- <a href="ourServices" class="footerMenu"> -->
                                <a data-toggle="modal" data-target="#comingSoonModal" class="footerMenu">
                                    <span><?php echo $translations['M01162'][$language]; /* Our Services */?></span>
                                </a>
                            </div>
                            <!-- <div class="footerButton" data-lang='M01163'>
                                <a href="jointComputationalVantageEcosystem" class="footerMenu">
                                    <span><?php echo $translations['M01163'][$language]; /* JCV Joint Computational Vantage Ecosystem JCV */?></span>
                                </a>
                            </div>                                                -->
                        </div> 
                    </div>
                    <div class="col-3 footerHomepageContentBox">
                        <div class="footerHomepageTitle" data-lang='M01282'>
                            <span><?php echo $translations['M01282'][$language]; /* Get In Touch */?></span>
                        </div> 
                        <div class="row">
                            <div class="col-3">
                                <img data-toggle="modal" data-target="#comingSoonModal" class="socialButton" src="./images/project/fb1.png" alt="" width="35px" height="35px">
                            </div>
                            <div class="col-3 ">
                                <img data-toggle="modal" data-target="#comingSoonModal" class="socialButton" src="./images/project/twitter.png" alt="" width="35px" height="35px">
                            </div>
                            <div class="col-3 ">
                                <div class="">
                                    <img data-toggle="modal" data-target="#comingSoonModal" class="socialButton" src="./images/project/insta.png" alt="" width="35px" height="35px">
                                </div>                                         
                            </div>
                            <div class="col-3 ">
                                <div class="">
                                    <img data-toggle="modal" data-target="#comingSoonModal" class="socialButton" src="./images/project/pinterest.png" alt="" width="35px" height="35px">
                                </div>                                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="borderline d-none d-md-none d-lg-block"></div>

            <div class="row col homepage_footer_copyright my-4">
                <div class="col" data-lang='M01283'>
                    <!-- <p><?php echo $translations['M01283'][$language]; /* Copyright © 2022 Joint Cap Ventures. All rights reserved. */?></p> -->
                    <p><?php echo str_replace(Array("%%companyName%%", "2021"), Array($config['companyName'], date("Y")), $translations['M00006'][$language]); ?></p>
                </div>
            </div>
        </section>
    </section>
</div>