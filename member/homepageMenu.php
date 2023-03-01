<section class="homepageMenu d-none d-md-none d-lg-block">
    <div class="kt-container"> 
        <div class="col-12">
            <div class="row align-items-center">
                <div class="col-2">
                    <a href="homepage">
                        <img src="images/logo/logo.png" style="width: 70%;">
                    </a>
                </div>

                <div class="col-10 d-flex justify-content-end">
                    
                    <div class="header_menu_div blackFont dropdown">
                        <a href="javascript:;" class="btn headerMenuDropdown blackFont" data-lang="M00258">
                            <?php echo $translations['M00258'][$language]; /* Home */?>
                            <i class="fas fa-caret-down dropdownIcon ml-2"></i>
                        </a>
                        <div class="headerMenuDropdownBox">
                            <div class="headerMenuDropdownItem">
                                <!-- <a href="aboutUs" class="btn menuDropdownBtn" data-lang="M00432">
                                    <?php echo $translations['M00432'][$language]; /* About Us */?>
                                </a> -->
                                <a href="missionVision" class="btn menuDropdownBtn" data-lang="M01160">
                                    <?php echo $translations['M01160'][$language]; /* Mission and Vision */?>
                                </a>
                                <a href="historicalBackground" class="btn menuDropdownBtn" data-lang="M01161">
                                    <?php echo $translations['M01161'][$language]; /* Historical Background of Actuaries */?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="header_menu_div blackFont" data-lang="M01162">
                        <a href="ourServices" class="btn blackFont menuActive px-0"><?php echo $translations['M01162'][$language]; /* Our Services */?></a>
                    </div>
                    <!-- <div class="header_menu_div blackFont" data-lang="M01163">
                        <a href="jointComputationalVantageEcosystem" class="btn blackFont menuActive px-0"><?php echo $translations['M01163'][$language]; /* JCV Joint Computational Vantage Ecosystem JCV */?></a>
                    </div> -->
                    <div class="header_menu_div blackFont" data-lang="M01021">
                        <a href="contactUs" class="btn blackFont menuActive px-0">
                            <?php echo $translations['M01021'][$language]; /* Contact Us */?>
                        </a>
                    </div>
                    <div class="header_menu_div blackFont dropdown">
                        <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor:pointer;">
                            <i class="fa fa-globe menuIcon" ></i>
                            <i class="fas fa-caret-down dropdownIcon"></i>
                            <div class="dropdown-menu walletDropdown dropdown-menu-right" role="menu" >
                                <?php $languages = $config['languages']; ?>
                                <?php foreach($languages as $key => $value) { 
                                    if ($key=="chineseSimplified" || $key=="chineseTraditional") {
                                        $flag="chinese";
                                    }else if ($key == "korean"){
                                        $flag="korean";
                                    }else if ($key == "thailand"){
                                        $flag="thai";
                                    }else if ($key == "vietnam"){
                                        $flag="vietnam";
                                    }else if ($key == "japanese"){
                                        $flag="japanese";
                                    }else if($key == 'english'){
                                        $flag="english";
                                    }else if($key == 'malay'){
                                        $flag="indonesia";
                                    } ?>

                                    <a href="javascript:;" class="dropdown-item changeLanguage" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                                        <img style="width: 15px;height: 15px; margin-right: 5px;margin-top: 2px;" src ="images/language/<?php echo $flag; ?>.png"> <?php echo $languages[$key]['displayName']; ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div> 
                    </div>
                    
                    <div class="header_menu_div d-flex align-items-center mr-0">
                        <div id="login" class="ml-3" data-lang='M01164'>
                            <a href="login" class="btn btn-primary">
                                <?php echo $translations['M01164'][$language]; /* Login/Sign Up */?>
                            </a> 
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mobile Size -->
<section class="homepageHeaderMobile">
        <div class="kt-container">
            <div class="row mx-0">
                <div class="col-md-4 col-5">
                    <div class="">
                        <a href="homepage">
                            <img src="images/logo/logo.png" class="customLogo">
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-7 d-flex align-items-center justify-content-end">
                    <div class="header_menu_div blackFont dropdown">
                        <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor:pointer;">
                            <i class="fa fa-globe menuIcon" ></i>
                            <div class="dropdown-menu walletDropdown dropdown-menu-right" role="menu" >
                                <?php $languages = $config['languages']; ?>
                                <?php foreach($languages as $key => $value) { 
                                    if ($key=="chineseSimplified" || $key=="chineseTraditional") {
                                        $flag="chinese";
                                    }else if ($key == "korean"){
                                        $flag="korean";
                                    }else if ($key == "thailand"){
                                        $flag="thai";
                                    }else if ($key == "vietnam"){
                                        $flag="vietnam";
                                    }else if ($key == "japanese"){
                                        $flag="japanese";
                                    }else if($key == 'english'){
                                        $flag="english";
                                    }else if($key == 'malay'){
                                        $flag="indonesia";
                                    } ?>

                                    <a href="javascript:;" class="dropdown-item changeLanguage" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                                        <img style="width: 15px;height: 15px; margin-right: 5px;margin-top: 2px;" src ="images/language/<?php echo $flag; ?>.png"> <?php echo $languages[$key]['displayName']; ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div> 
                    </div>
                    
                    <div class="header_menu_div">
                        <a href="login" class="btn"><i class="fa fa-sign-in menuIcon"></i></a> 
                    </div> 

                    <!-- <?php if (!$_SESSION['userID']) { ?>
                        <div id="loginMobile" class="pl-4 pl-md-5 blackFont" onclick="showModal()">
                             <i class="fa fa-user menuIcon"></i>
                        </div>
                    <?php } ?> -->                   
                    <div class="blackFont dropdown header_menu_div" onclick="showSidebar()">
                        <i class="fa fa-bars menuIcon"></i>
                    </div>
                </div>
            </div>
        </div>

    <div id="sidebar" class="mobileSidebar">
        <div class="text-center mt-4">
            <a href="homepage"><img class="sidebarLogo" src="images/logo/logo.png" alt="Company Logo" width="180"></a>
        </div>

        <!-- <?php if ($_SESSION['userID']) { ?>
            <div class="my-3 px-4 text-left">
                <a href="dashboard" class="btn blackFont"><?php echo $translations['M00126'][$language]; /* Dashboard */?></a>
            </div>
        <?php } ?> -->

        <div class="my-3 px-4 text-left sidebarText btn-group d-flex">
            <div class="dropdown w-100">
                <button class="dropbtn sidebarText showDropdown px-0" data-lang='M00258'><?php echo $translations['M00258'][$language]; /* Home */?><i class="ml-3 fas fa-caret-down dropdownIcon"></i></button>
                <div class="dropdown-content sidebarText dropdownContent">
                    <!-- <a href="aboutUs" class="btn menuDropdownBtn sidebarText" data-lang='M00432'><?php echo $translations['M00432'][$language]; /* About Us */?></a> -->
                    <a href="missionVision" class="btn menuDropdownBtn sidebarText" data-lang='M01160'><?php echo $translations['M01160'][$language]; /* Mission and Vision */?></a>
                    <a href="historicalBackground" class="btn menuDropdownBtn sidebarText" data-lang='M01161'><?php echo $translations['M01161'][$language]; /* Historical Background of Actuaries */?></a>
                </div>
            </div>
        </div>
        <div class="my-3 px-4 text-left sidebarText" data-lang='M01162'>
            <a href="ourServices" class="sidebarText p-0"><?php echo $translations['M01162'][$language]; /* Our Services */?></a>
        </div>
        <!-- <div class="my-3 px-4 text-left sidebarText" data-lang='M01163'>
            <a href="jointComputationalVantageEcosystem" class="sidebarText p-0"><?php echo $translations['M01163'][$language]; /* JCV Joint Computational Vantage Ecosystem JCV */?></a>
        </div> -->
        <div class="my-3 px-4 text-left sidebarText" data-lang='M01021'>
            <a href="contactUs" class="sidebarText p-0"><?php echo $translations['M01021'][$language]; /* Contact Us */?></a>
        </div>
        
    </div>

    <div id="sidebarBG" class="transparentBG" onclick="hideSidebar()">
        <div id="closeButton" class="closeSidebar"> <i class="fa fa-times menuIcon"></i></div>
    </div>
</section>

<div class="kt-container">
