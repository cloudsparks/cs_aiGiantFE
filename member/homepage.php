<?php
include 'include/config.php';
include 'head.php';
include 'homepageMenu.php';
?>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/homepageResponsive.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />
<link href="css/homepageMenu.css?v=<?php echo filemtime('css/homepageMenu.css'); ?>" rel="stylesheet" type="text/css" />

<body>



<!-- About Us -->
<hr>
<div class="about-section">
    <div><?php include 'yinYangSymbol.php' ?></div>
    <!-- <div class="inner-container">
        <h1>Feng Shui In A Nutshell</h1>
        <p class="text">
        Feng shui (/ˈfʌŋˌʃuːi/ [2]), sometimes called Chinese geomancy, is an ancient Chinese traditional practice which claims to use energy forces to harmonize individuals with their surrounding environment. The term feng shui means, literally, "wind-water" (i.e., fluid). From ancient times, landscapes and bodies of water were thought to direct the flow of the universal Qi – “cosmic current” or energy – through places and structures. Because Qi has the same patterns as wind and water, a specialist who understands them can affect these flows to improve wealth, happiness, long life, and family; on the other hand, the wrong flow of Qi brings bad results. More broadly, feng shui includes astronomical, astrological, architectural, cosmological, geographical, and topographical dimensions.[3][4]

Historically, as well as in many parts of the contemporary Chinese world, feng shui was used to orient buildings and spiritually significant structures such as tombs, as well as dwellings and other structures. One scholar writes that in contemporary Western societies, however, “feng shui tends to be reduced to interior design for health and wealth. It has become increasingly visible through 'feng shui consultants' and corporate architects, who charge large sums of money for their analysis, advice, and design.”[4]

        </p>
        <div class="skills">
            <span>Courses</span>
            <span>Events</span>
            <span>Business</span>
        </div>
    </div> -->
</div>


    <!-- About Us End-->

<!--  Product -->

<!-- Product End -->
<?php include 'homepageFooter.php' ?>
    
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>

