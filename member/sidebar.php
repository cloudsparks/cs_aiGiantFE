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

$qrCodeRegistrationUrl = urldecode($protocol.$domainName."/publicRegistration.php?qr=".$encrypt);
$registrationUrl = urldecode($protocol.$domainName."/publicRegistration.php?qr=".$encrypt);

?>

<body>
    <div class="startSideBar">
        <div class="sideBarScreen" style="display: none;"></div>
        <div class="sideBar">
            <div class="col-12">
                <div class="row">
                    <div class="ml-5 mt-5">
                        <a href="dashboard">
                            <img src="images/logo/logo1.png" style="width: 80%;">
                        </a>
                    </div>
                    <div class="col-12 mt-5 sideBarMenu">
                        <a href="dashboard" class="btn sideBarItem">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarText ml-3">
                                         <?php echo $translations['M00025'][$language]; //DASHBOARD ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="javascript:;" class="btn sideBarItem sideBarDropdown">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarText ml-3">
                                         <?php echo $translations['M03655'][$language]; /* Store */ ?>
                                    </div>
                                    <i class="fa fa-angle-right sideBarDropdownIcon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <div class="col-12 sideBarMenuDropdown">
                            <a href="javascript:;" onclick="stayTuned();" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M03656'][$language]; /* Product */ ?></span>
                            </a>
                            <a href="courses" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M03657'][$language]; /* Courses */ ?></span>
                            </a>
                            <a href="services" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M03658'][$language]; /* Services */ ?></span>
                            </a>
                            <a href="purchaseHistory" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M03659'][$language]; /* Purchase History */ ?></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="myWallet" class="btn sideBarItem">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarText ml-3">
                                         <?php echo $translations['M01129'][$language]; //Wallet ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="javascript:;" class="btn sideBarItem" onclick="stayTuned();">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarText ml-3">
                                        <?php echo $translations['M03660'][$language]; /* Business Center */ ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="javascript:;" class="btn sideBarItem sideBarDropdown">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarText ml-3">
                                         <?php echo $translations['M00637'][$language]; /* Bonus Report */ ?>
                                    </div>
                                    <i class="fa fa-angle-right sideBarDropdownIcon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <div class="col-12 sideBarMenuDropdown">
                            <a href="directSponsorBonus" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M03661'][$language]; /* Direct Sponsor Bonus */ ?></span>
                            </a>
                        </div>
                        <div class="col-12 sideBarMenuDropdown">
                            <a href="pairingBonus" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M03662'][$language]; /* Pairing Bonus */ ?></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="javascript:;" class="btn sideBarItem sideBarDropdown">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarText ml-3">
                                         <?php echo $translations['M00960'][$language]; /* Diagram */ ?>
                                    </div>
                                    <i class="fa fa-angle-right sideBarDropdownIcon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <div class="col-12 sideBarMenuDropdown">
                            <a href="sponsorDiagram" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M03306'][$language]; /* Sponsor Diagram */ ?></span>
                            </a>
                            <a href="placementDiagram" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M03637'][$language]; /* Placement Diagram */ ?></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="javascript:;" class="btn sideBarItem sideBarDropdown">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarText ml-3">
                                         <?php echo $translations['M00080'][$language]; /* Profile */ ?>
                                    </div>
                                    <i class="fa fa-angle-right sideBarDropdownIcon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <div class="col-12 sideBarMenuDropdown">
                            <a href="javascript:;" data-toggle="modal" data-target="#qr_modal" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M00561'][$language]; /* My Referral */ ?></span>
                            </a>
                            <a href="editProfile" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M03663'][$language]; /* My Personal Details */ ?></span>
                            </a>
                            <a href="addBankAccount" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M00066'][$language]; /* Add Bank Account */ ?></span>
                            </a>
                            <a href="bankAccountListing" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M00074'][$language]; /* Bank Account Listing */ ?></span>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 sideBarMenu">
                        <a href="javascript:;" class="btn sideBarItem sideBarDropdown">
                            <div class="col-12">
                                <div class="row">
                                    <div class="align-self-center sideBarText ml-3">
                                         <?php echo $translations['M00589'][$language]; /* Setting */ ?>
                                    </div>
                                    <i class="fa fa-angle-right sideBarDropdownIcon" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <div class="col-12 sideBarMenuDropdown">
                            <a href="changeLoginPassword" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M00082'][$language]; /* change login password */ ?></span>
                            </a>
                            <a href="changeTransactionPassword" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M00087'][$language]; /* change transaction password */ ?></span>
                            </a>
                            <a href="resetTransactionPassword" class="btn sideBarMenuDropdownItem">
                                <span><?php echo $translations['M00284'][$language]; /* reset transaction password */ ?></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="sideBarContent">
            
