<?php 
    session_start();

    // Get current page name
    // $thisPage = basename($_SERVER['PHP_SELF']);
    $pageName = basename($_SERVER['PHP_SELF']);
    $thisPage = basename($_SERVER['REQUEST_URI']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    
    // Recursive function. Will keep on search for the parent of your page
    // When it stops, it will echo the breadcrumbs out
    function buildBreadcrumbs($link, $liString) {
        $queryString = '';
        if (isset($_SESSION['queryString'][$link]))
            $queryString = $_SESSION['queryString'][$link];
        $name = $_SESSION['access'][$link];
        //$name = $_SESSION['menuLanguage'][$link];
        $breadcrumbs = '<li class="breadcrumb-item"><a href="'.$link.$queryString.'">'.$name.'</a></li>'.$liString;
        if (isset($_SESSION['parentPage'][$link])) {
            buildBreadcrumbs($_SESSION['parentPage'][$link], $breadcrumbs);
        }
        else
            echo $breadcrumbs;
    }
?>

<div class="topbar">

    <!-- LOGO -->
    <?php include("logo.php"); ?>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">

            <!-- Page title -->
             <ul class="nav navbar-nav navbar-left">
                <li>
                    <button class="button-menu-mobile open-left">
                        <i class="zmdi zmdi-menu"></i>
                    </button>
                </li>
                <li>    <!-- $translations[$_SESSION['menuLanguage'][$thisPage]][$language] -->
                    <?php if($_SESSION['access'][$pageName] == "memberDetailsList.php"){ ?>

                        <h4 class="page-title visible-lg hidden-xs visible-md visible-sm"><?php echo $_SESSION['access'][$thisPage]; ?> <?php echo $_SESSION['access'][$pageName]; ?></h4>
                        <h4 class="page-title visible-xs mobileFont"><?php echo $_SESSION['access'][$thisPage]; ?> <?php echo $_SESSION['access'][$pageName]; ?></h4>

                    <?php }else{ 
                    	$specialHandle = array('Purchase Pre-order scheme NBV','Purchase Pre-order scheme NBVR','Purchase Pre-order scheme');
                    	if(in_array($_SESSION['access'][$pageName], $specialHandle)) $_SESSION['access'][$pageName] = "Reentry Package";
                    	?>

                        <h4 class="page-title visible-lg hidden-xs visible-md visible-sm"><?php echo $_SESSION['access'][$pageName]; ?></h4>
                        <h4 class="page-title visible-xs mobileFont"><?php echo $_SESSION['access'][$pageName]; ?></h4>
                        
                    <?php } ?>
                </li>
            </ul>

            <!-- Right(Notification and Searchbox -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="passwordMaintain.php" class="btn passwordMaintainBtn">
                        <span class="hidden-xs"><?php echo $translations['A00282'][$language]; ?></span>
                        <i class="fa fa-unlock-alt visible-xs" aria-hidden="true"></i>
                    </a>
                </li>
                 <!-- language button -->
                   <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-globe languageButton"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                            <li> 
                            <?php $languages = $config['languages']; ?>
                            <?php foreach($languages as $key => $value) { ?>
                                <a href="javascript:void(0)" class="changeLanguage dropdown-item" language="<?php echo $key; ?>">
                                    <?php echo $value; ?>
                                </a>
                            <?php } ?>
                                  
                            </li>
                        </ul>
                    </li>
                <!-- End language button -->

                <li>
                    <a id="logoutBtn" onclick="beforeLogout();" class="btn headerIcon">
                        <i class="zmdi zmdi-power logoutIcon"></i>
                    </a>
                </li>
                   
                   
                  
               
           
            </ul>
 
        </div><!-- end container -->
    </div><!-- end navbar -->
    <div id="breadcrumbs">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php"><?php echo $translations['A01144'][$language]; /*Home*/?></a></li>
                <?php
                    unset($_SESSION['queryString']);
                    if($_SERVER['QUERY_STRING'] != '')
                        $_SESSION['queryString'][$thisPage] = '?'.$_SERVER['QUERY_STRING'];
                    if($thisPage != 'webServices.php')
                        buildBreadcrumbs($thisPage, ''); 
                ?>  
        </ul>
    </div>
</div>