<div class="col-lg-3 col-md-3">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default bx-shadow-none">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    Menu
                </h4>
            </div>

            <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <?php if(in_array("editMember.php", array_keys($_SESSION['access']))) { ?>
                    <div class="m-b-rem1 menuActive">
                        <a id="editMemberDetails"><?php echo $translations['A01050'][$language]; /* Edit Member Details */?></a>
                    </div>
                    <?php } ?>
                    <?php if(in_array("memberPasswordMaintain.php", array_keys($_SESSION['access']))) { ?>
                    <div class="m-b-rem1 menuActive">
                        <a id="memberPasswordMaintain">Password Maintain</a>
                    </div>
                    <?php } ?>
                    <?php if(in_array("treeSponsor.php", array_keys($_SESSION['access']))) { ?>
                    <div class="m-b-rem1 menuActive">
                        <a id="sponsorTree"><?php echo $translations['A01052'][$language]; /* Referral Diagram */?></a>
                    </div>
                    <?php } ?>
                    <?php if(in_array("treePlacement.php", array_keys($_SESSION['access']))) { ?>
                    <div class="m-b-rem1 menuActive">
                        <a id="placementTree">Placement Tree</a>
                    </div>
                    <?php } ?>
                    <?php if(in_array("sponsorUpline.php", array_keys($_SESSION['access']))) { ?>
                    <div class="m-b-rem1 menuActive">
                        <a id="uplineListing"><?php echo $translations['A01053'][$language]; /* Upline Listing */?></a>
                    </div>
                    <?php } ?>
                    <?php if(in_array("rankMaintain.php", array_keys($_SESSION['access']))) { ?>
                    <div class="m-b-rem1 menuActive">
                        <a id="rankMaintain">Rank Maintain</a>
                    </div>
                    <?php } ?>
                    <?php if(in_array("memberPortfolioList.php", array_keys($_SESSION['access']))) { ?>
                    <div class="m-b-rem1 menuActive">
                        <a id="portfolioList"><?php echo $translations['A01054'][$language]; /* Portfolio Listing */?></a>
                    </div>
                    <?php } ?>
                    <?php if(in_array("activityLogsListing.php", array_keys($_SESSION['access']))) { ?>
                    <div class="m-b-rem1 menuActive">
                        <a id="activityLogsListing"><?php echo $translations['A01055'][$language]; /* Activity Log Listing*/?></a>
                    </div>
                    <?php } ?>
                    <?php if(in_array("memberCreditsTransaction.php", array_keys($_SESSION['access']))) { ?>
                    <div class="m-b-rem1 menuActive">
                        <a id="memberCreditsTransaction"><?php echo $translations['A01056'][$language]; /*Credit Transaction Listing*/?></a>
                    </div>
                    <?php } ?>
                    <!-- <div class="m-b-rem1 menuActive">
                        <a>Ledger Balance</a>
                    </div> -->
                    <?php if(in_array("changeSponsor.php", array_keys($_SESSION['access']))) { ?>
                    <div class="m-b-rem1 menuActive">
                        <a id="changeSponsor"><?php echo $translations['A01057'][$language]; /*Change Sponsor*/?></a>
                    </div>
                    <?php } ?>
                    <?php if(in_array("changePlacement.php", array_keys($_SESSION['access']))) { ?>
                    <div class="m-b-rem1 menuActive">
                        <a id="changePlacement">Change Placement</a>
                    </div>
                    <?php } ?>
                    <!-- <div class="m-b-rem1 menuActive">
                        <a id="changePlacement">Change Placement</a>
                    </div> -->
                    <div class="m-b-rem1 menuActive">
                        <a id="loginToMember"><?php echo $translations['A01058'][$language]; /*Login Member*/?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

