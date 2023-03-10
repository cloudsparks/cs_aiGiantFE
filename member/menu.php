<div class="headerMenu">
    <a href="javascript:;" class="headerMenuClose d-lg-none float-right">
        <i class="fas fa-times"></i>
    </a>

    <div class="row">  
        <!-- <div class="headerMenuItem">
            <a href="javascript:;" class="btn menuBtn" data-lang="M00025">
                <i class="fas fa-bell"></i>
            </a>
        </div>   -->    
        <div class="headerMenuItem logout_margin order-lg-last">
            <a href="javascript:;" class="btn menuBtn headerMenuDropdown">
                <img class="" src="images/project/globe.png" alt="" width="20px">
                <span><i class="fa fa-angle-down ml-2" style="color: black;"></i></span>
            </a>
            <div class="headerMenuDropdownBox">
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
                    }else if($key == 'italian'){
                        $flag="italy";
                    } ?>

                    <div class="headerMenuDropdownItem">
                        <a href="javascript:;" class="btn menuDropdownBtn changeLanguage" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>">
                            <img style="width: 20px;margin-right: 5px;" src ="images/language/<?php echo $flag; ?>.png"> <?php echo $languages[$key]['displayName']; ?>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="headerMenuItem order-last">
            <button class="btn menuBtn" onclick="beforeLogout()" data-lang="M00625">
                <i class="fas fa-sign-out-alt mr-2"></i>
                <?php echo $translations['M00625'][$language]; //Logout ?>
                <span class="d-inline-block d-md-none"><?php echo $translations['M00625'][$language]; //Logout ?></span>
                <!-- <i class="fa fa-power-off"></i> -->
            </button>
        </div>


        <div class="headerMenuItem">
            <a href="dashboard" class="btn menuBtn" data-lang="M00025">
                <?php echo $translations['M00025'][$language]; //Dashboard ?>
            </a>
        </div>

        <!-- <div class="headerMenuItem">
            <a href="javascript:;" class="btn menuBtn" data-lang="M00415">
		<?php echo $translations['M00415'][$language]; //My wallet ?>
            </a>
        </div> -->

        <div class="headerMenuItem">
            <a href="purchasePackage" class="btn menuBtn" data-lang="M00025">
                <?php echo $translations['M03747'][$language]; /* Purchase Package */ ?>
            </a>
        </div>

        <div class="headerMenuItem">
            <a href="javascript:;" class="btn menuBtn" data-toggle="modal" data-target="#qr_modal">
                <?php echo $translations['M00561'][$language]; //my referral ?>
            </a>
        </div>

        <!-- <div class="headerMenuItem">
            <a href="javascript:;" class="btn menuBtn" data-lang="M00025">
                <?php echo $translations['M00589'][$language]; //Setting ?>
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
                        ROI Bonus Report                    
                    </a>
                </div>
                <div class="headerMenuDropdownItem">
                    <a href="communityBonus" class="btn menuDropdownBtn">
                        ROI Tier Bonus Report
                    </a>
                </div>
                <div class="headerMenuDropdownItem">
                    <a href="leadershipBonus" class="btn menuDropdownBtn">
                        <?php echo $translations['M03449'][$language]; /* Leadership Bonus */ ?>
                    </a>
                </div>
                <div class="headerMenuDropdownItem">
                    <a href="sponsorBonus" class="btn menuDropdownBtn">
                        Sponsor Bonus Report
                    </a>
                </div>
            </div>
        </div>

        <div class="headerMenuItem">
            <a href="javascript:;" class="btn menuBtn" data-lang="M00025">
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
        </div> -->
        
    </div>
</div>
