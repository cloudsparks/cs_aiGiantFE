<?php

session_start();

include 'include/config.php';
include 'include/class.general.php';
include("language/lang_all.php");

// hide function
 $currentPage = basename($_SERVER['PHP_SELF']);

 if ($currentPage == "invoice.php" || $currentPage == "leadershipLadder.php" || $currentPage == "leadershipLadderDetails.php" || $currentPage == "leadershipReward.php") {
    header("Location: index.php");
 }

 // if($currentPage == "addBankAccount.php" || $currentPage == "bankAccountListing.php") {
 //     if ($_SESSION["addBankAllow"] == 0) {
 //        header("Location: index.php");
 //     }
 // }

// Get the current selected language
$language = General::getLanguage();
$languages = $sys['languages'];

?>

<!DOCTYPE html>

<html lang="en" >
<!-- begin::Head -->
<head>

	<meta charset="utf-8"/>

	<title><?php echo $config['companyName']; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin:: Global Mandatory Vendors -->
	<link href="vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
	<!--end:: Global Mandatory Vendors -->
    
    
    <style>
        :root {
            /*--content:"<?php echo $translations['M00631'][$language]; ?>";*/
            --specialLimited:"<?php echo $translations['M00797'][$language]; //LIMITED ?>";
            --content:"<?php echo $translations['M00659'][$language]; //SOLD OUT ?>";
            --contentMonth:"<?php echo $translations['M00660'][$language]; //For This Month ?>";
             }
    </style>

	<!--begin:: Global Optional Vendors -->
	<link href="vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
	<link href="vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
	<link href="vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
	<link href="vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
	<link href="vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
	<link href="vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
	<link href="vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
	<link href="vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
	<link href="vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<!--end:: Global Optional Vendors -->

    <link href="plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/datatables.min.css?ts=<?php echo filemtime('css/datatables.min.css'); ?>" rel="stylesheet" type="text/css" />

    

	<!--begin::Global Theme Styles(used by all pages) -->
    <?php 
        if($_SESSION['username'] == 'director' || $_SESSION['username'] == 'testkv001' || $_SESSION['username'] == 'katetest') {
    ?>

        <link href="css/langcode.css?v=<?php echo filemtime('css/langCode.css'); ?>" rel="stylesheet" type="text/css" />

    <?php     
        }
    ?>
    <link href="css/aos.css?v=<?php echo filemtime('css/aos.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="css/main.min.css" rel="stylesheet" type="text/css" />
	<link href="css/kt.css?v=<?php echo filemtime('css/kt.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="css/custom.css?v=<?php echo filemtime('css/custom.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="css/customResponsive.css?v=<?php echo filemtime('css/customResponsive.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="css/landing.css?v=<?php echo filemtime('css/landing.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="css/campaign.css?v=<?php echo filemtime('css/campaign.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="css/header.css?v=<?php echo filemtime('css/header.css'); ?>" rel="stylesheet" type="text/css" />


    
	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->
	<!--end::Layout Skins -->

	<!-- <link rel="shortcut icon" href="<?php echo $config['favicon']; ?>" /> -->
	<link rel="shortcut icon" href="images/logo/favicon2.ico" />

</head>
<!-- end::Head -->

<div id="canvasLoader" class="hide">
        <div id="canvasLoaderContainer">
            <div class="dank-ass-loader">
              <div class="row">
                 <div class="arrowLoading up outer outer-18"></div>
                 <div class="arrowLoading down outer outer-17"></div>
                 <div class="arrowLoading up outer outer-16"></div>
                 <div class="arrowLoading down outer outer-15"></div>
                 <div class="arrowLoading up outer outer-14"></div>
              </div>
              <div class="row">
                 <div class="arrowLoading up outer outer-1"></div>
                 <div class="arrowLoading down outer outer-2"></div>
                 <div class="arrowLoading up inner inner-6"></div>
                 <div class="arrowLoading down inner inner-5"></div>
                 <div class="arrowLoading up inner inner-4"></div>
                 <div class="arrowLoading down outer outer-13"></div>
                 <div class="arrowLoading up outer outer-12"></div>
              </div>
              <div class="row">
                 <div class="arrowLoading down outer outer-3"></div>
                 <div class="arrowLoading up outer outer-4"></div>
                 <div class="arrowLoading down inner inner-1"></div>
                 <div class="arrowLoading up inner inner-2"></div>
                 <div class="arrowLoading down inner inner-3"></div>
                 <div class="arrowLoading up outer outer-11"></div>
                 <div class="arrowLoading down outer outer-10"></div>
              </div>
              <div class="row">
                 <div class="arrowLoading down outer outer-5"></div>
                 <div class="arrowLoading up outer outer-6"></div>
                 <div class="arrowLoading down outer outer-7"></div>
                 <div class="arrowLoading up outer outer-8"></div>
                 <div class="arrowLoading down outer outer-9"></div>
              </div>
           </div>
        </div>
    </div>

<div class="modal fade" id="canvasMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header canvasheader">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        <img id="canvasAlertIcon" src="images/project/warningIcon.png" alt="" class="modalMsgIcon">
                        <span id="canvasTitle" class="modal-title"></span>
                    </div>
                </div>
            </div>              
            
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont">
                <div id="canvasAlertMessage" class="pt-5 pb-1"></div>
            </div>
            <div class="modal-footer">
                <button id="canvasCloseBtn" type="button" class="btn btn-default" data-dismiss="modal"><?php echo $translations['M00020'][$language]; //Close ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="stayTuned" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left:17px; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header canvasheader">
                <div class="row text-center">
                    <div class="col-12"><span id="" class="modal-title">Stay Tuned...</span></div>
                </div>
                <div class="modalCloseWrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>                
            </div>
            <!-- <div class="modalLine"></div> -->
            <div class="modal-body modalBodyFont mt-5">
                <div id="">We are coming soon...</div>
            </div>
            <div class="modal-footer">
                <button id="" type="button" class="btn btn-default" data-dismiss="modal"><?php echo $translations['M00020'][$language]; //Close ?></button>
            </div>
        </div>
    </div>
</div>


<div class="qrModal modal fade show" id="qr_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header canvasheader">
                <div class="row">
                    <div class="col-12"><span id="canvasTitle" class="modal-title text-center" data-lang="M00561"><?php echo $translations['M00561'][$language]; //My Referral ?></span></div>
                </div>
                <div class="modalCloseWrap">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div> 
            </div>
            <div class="modal-body text-center modalBodyFont">
                <!-- <div class="col-12 iconQRposition">
                    <img class="iconQR" src="<?php echo $config['favicon']; ?>">
                </div> -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6 col-12 mt-3">
                            <div class="" id="qrcode">
                                <!-- <img class="iconQR" src="<?php echo $config['favicon']; ?>"> -->
                                <img class="iconQR" src="/images/logo/favicon2.ico">
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mt-5">
                            <div class="form-group mt-5 ml-4">
                                <input type="text" class="form-control qrcodeInp" value="" id="qrInput" readonly="readonly">
                            </div>
                            <div class="text-center mt-3">
                                <button type="button" class="btn btn-primary" onclick="copyQR()"><?php echo $translations['M00137'][$language]; //Copy Link ?></button>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="col-12">
                    <div class="col-12 text-center mb-3" style="background-color: transparent;padding-bottom: 5px;">
                        <a href="javascript:;" class="btn btnSocial fb" onclick="shareFacebook('qrInput')">
                            <img class="" src="images/fb-icon.png">
                        </a>
                        <a href="javascript:;" class="btn btnSocial twitter" onclick="shareTwitter('qrInput')">
                            <img class="" src="images/tw-icon.png">
                        </a>
                        <a href="javascript:;" class="btn btnSocial whatsapp" onclick="shareWhatsapp('qrInput')">
                            <img class="" src="images/wa-icon.png">
                        </a>
                    </div>
                </div>
                
                <div class="copiedMsg mt-2" style="display: none;">
                    <i class="fa fa-check" aria-hidden="true"></i><?php echo $translations['M00880'][$language]; //Copied to Clipboard ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="news_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        	<span class="modalIcon"></span>
            <div class="modal-header">
                <span class="modal-title newsTitle">Title</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modalLine"></div>
            <div class="modal-body modalBodyFont">
                <div class="newsDes" style="margin-top: 10px;">Today, 26 October 2019 Kuala Lumpur curreny raised to 50% above on the rate of ringgit, hurry and travel more!</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnPrimaryModal">Download</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="comingSoonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog comingSoon" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="">
                    <div class="comingSoonBg text-center">
                        <div class="comingSoonTitle" data-lang="M00866">
                            <?php echo $translations['M00866'][$language]; //COMING SOON ?>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="col-4">
                                <div class="whiteLine"></div>
                            </div>
                        </div>
                        
                        <div data-lang="M01158">
                            <?php echo $translations['M01158'][$language]; //We are currently working on creating this page.  ?>
                        </div>
                        <div data-lang="M01159">
                            <?php echo $translations['M01159'][$language]; //We will be launching soon, Stay tuned for our new update. ?>
                        </div>
                        <div class="mt-5">
                            <img class="comingSoonLogo" src ="images/logo/logo.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
