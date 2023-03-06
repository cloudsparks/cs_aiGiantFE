<?php 
include_once('include/class.cryptDes.php');

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $protocol = 'https://';
}
else {
    $protocol = 'http://';
}
$domainName = $_SERVER['HTTP_HOST'].'';

if($config["isLocalHost"]){
    $encrypt = $_SESSION['username'];
}else{
    $crypt = new cryptDes();
    $encrypt = $crypt->encrypt($_SESSION['username']);
}

$qrCodeRegistrationUrl = urldecode($protocol.$domainName."/publicRegistration?qr=".$encrypt);
$registrationUrl = urldecode($protocol.$domainName."/publicRegistration?qr=".$encrypt);

?>

<body style="display: block;">
    <!-- <section class="homepageHeaderBlackBG"></section> -->
    <section class="homepageHeader">
        <div class="kt-container">
            <!-- <a href="javascript:;" class="btn headerMenuClose">
                <i class="la la-close"></i>
            </a> -->
            <div class="col-12">
                <div class="row align-items-center">

                    <div class="col-md-4 col-7">
                        <img src="images/logo/logo2.png" class="customLogo">
                    </div>

                    <div class="col-md-8 col-6">
                        <!-- <a href="javascript:;" class="headerBurgerBtn d-lg-none float-right">
                            <i class="fas fa-bars"></i>
                        </a> -->
                        <div class="homepageHeaderBlackBG"></div>

                        <?php include "menu.php" ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="homepageHeaderMobile">
        <div class="kt-container">
            <div class="col-12">
                <div class="row">
                    <a href="dashboard" class="col-4 align-self-center">
                        <img src="images/logo/logo.png" class="customLogo">
                    </a>
                    <div class="col-8 align-self-center">
                        <div class="row justify-content-end">
                            <!-- <div class="align-self-center mr-4" >
                                <i class="fas fa-bell menuIcon"></i>
                            </div> -->
                            <div class="align-self-center mr-4">
                                <i class="fa fa-globe menuIcon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></i>
                                <div class="dropdown-menu walletDropdown" role="menu">
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
                            <div class="align-self-center mr-4" onclick="beforeLogout()" data-lang="M00625">
                                <i class="fas fa-sign-out-alt menuIcon"></i>
                            </div>
                            <div class="align-self-center pr-3">
                                <i class="fa fa-bars mobileSideBarBtn menuIcon"></i>
                                <section class="homepageHeaderBlackBG2">
                                    <i class="fa fa-times mobileMenuClose"></i>
                                    <div class="headerMenuItem headerMenuItemMT">
                                        <a href="dashboard" class="btn menuBtn" data-lang="M00025">
                                            <?php echo $translations['M00025'][$language]; //Dashboard ?>
                                        </a>
                                    </div>
                                    <div class="headerMenuItem">
                                        <a href="courseVideo" class="btn menuBtn" data-lang="M00025">
                                    <?php echo $translations['M03702'][$language]; //Course Video ?>
                                        </a>
                                    </div>

                                    <div class="headerMenuItem">
                                        <a href="portfolio" class="btn menuBtn" data-lang="M00025">
                                            <?php echo $translations['M00007'][$language]; //Portfolio ?>
                                        </a>
                                    </div>

                                    <div class="headerMenuItem">
                                        <a href="javascript:;" class="btn menuBtn headerMenuDropdown">
                                            <?php echo $translations['M03741'][$language]; /* Bonus Report */ ?>
                                            <i class="fa fa-angle-down ml-1"></i>
                                        </a>
                                        <div class="headerMenuDropdownBox">
                                            <div class="headerMenuDropdownItem">
                                                <a href="rebateBonus" class="btn menuDropdownBtn">
                                                    <?php echo $translations['M03707'][$language]; /* ROI */ ?>
                                                </a>
                                            </div>
                                            <div class="headerMenuDropdownItem">
                                                <a href="communityBonus" class="btn menuDropdownBtn">
                                                    <?php echo $translations['M03710'][$language]; /* Community */ ?>
                                                </a>
                                            </div>
                                            <div class="headerMenuDropdownItem">
                                                <a href="pairingBonus" class="btn menuDropdownBtn">
                                                    <?php echo $translations['M03662'][$language]; /* Pairing Bonus */ ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="headerMenuItem">
                                        <a href="editProfile" class="btn menuBtn" data-lang="M00025">
                                    <?php echo $translations['M00465'][$language]; //My Profile ?>
                                        </a>
                                    </div>

                                    <div class="headerMenuItem">
                                        <a href="javascript:;" class="btn menuBtn headerMenuDropdown">
                                    <?php echo $translations['M03703'][$language]; //More ?>
                                            <i class="fa fa-angle-down ml-1"></i>
                                        </a>
                                        <div class="headerMenuDropdownBox">
                                            <div class="headerMenuDropdownItem">
                                                <a href="sponsorDiagram" class="btn menuDropdownBtn">
                                                    <?php echo $translations['M03704'][$language]; //Sponsor DIAGRAM ?>
                                                </a>
                                            </div>
                                            <div class="headerMenuDropdownItem">
                                                <a href="placementDiagram" class="btn menuDropdownBtn">
                                                    <?php echo $translations['M03637'][$language]; //Placement DIAGRAM ?>
                                                </a>
                                            </div>
                                            <div class="headerMenuDropdownItem">
                                                <a href="setting" class="btn menuDropdownBtn">
                                                    <?php echo $translations['M03705'][$language]; //Setting ?>
                                                </a>
                                            </div>
                                            <div class="headerMenuDropdownItem">
                                                <a href="javascript:;" onclick="stayTuned();" class="btn menuDropdownBtn">
                                                    <?php echo $translations['M03717'][$language]; //iFItness Mall ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  