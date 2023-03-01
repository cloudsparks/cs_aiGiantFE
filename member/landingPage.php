<?php
include 'include/config.php';
include 'head.php';

include_once('include/class.cryptDes.php');

if($_GET){
    $landingLink = $_GET['n'];
}

?>

<?php $registerUrl = urldecode($protocol.$domainName."/publicRegistration.php?qr="); ?>

<body>

<section class="landingLanguageSection">
	<div class="kt-container">
		<div class="col-12 languageBox">
		    <div class="btn-group">
		        <span type="" class="dropdown-toggle languageFont" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;">
		            <?php echo $config["languages"][$language]['displayName'] ?>
		        </span>
		        <div class="dropdown-menu dropdown-menu-right dropdown_language" x-placement="bottom-end" style="position: absolute; top: 0px; left: 0px; transform: translate3d(-52px, 38px, 0px);overflow: hidden;">
		          <?php
		              $languageArr = $config["languages"];
		              foreach($languageArr as $key => $value) {
		          ?>
		                <a class="dropdown-item changeLanguage" href="javascript:;" language="<?php echo $key; ?>" languageISO="<?php echo $languageArr[$key]['isoCode']; ?>"><?php echo $languageArr[$key]['displayName']; ?></a>
		          <?php
		              }
		          ?>
		        </div>
		    </div>
		</div>
	</div>
</section>

<section class="landingSection01">
	<div class="kt-container">
		<div class="col-12 ">
			<div class="landingSection01Img">
				<div class="col-12">
					<div class="row">
						
						<div class="col-12">
							<img src="<?php echo $config['logoURL']; ?>" style="height: 80px;">
						</div>
						<div class="col-lg-4 col-12"></div>
						<div class="col-lg-8 col-12" style="margin-top: 20px;">
							<div class="row">
								<div class="col-12 landingSection01Title">
									<?php echo $translations['M00076'][$language]; //The Only Way ?> 
								</div>
								
								<div class="col-12 landingSection01Title">
									<?php echo $translations['M00077'][$language]; //You Should Grow Your Finance ?>
								</div>
								<div class="col-12" style="margin-top: 10px;">
									<button id="learnMore" type="button" class="btn landingMoreBtn"><?php echo $translations['M00078'][$language]; //Learn More ?></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="aboutMe" class="landingSection02">
	<div class="kt-container">
		<div class="col-12">
			<div class="row">
				<div class="col-12">
					<div class="landingTitleLine"></div>
				</div>

				<div class="col-12 text-center" style="margin-top: 10px;">
					<div class="userImgSize">
						<div class="userCircle"></div>
						<img class="userImg">
					</div>
					
				</div>

				<div class="col-12">
					<div class="row justify-content-center">
						<div class="col-lg-5 col-12 landingSection02Title text-center" style="margin-top: 20px;">
							<?php echo $translations['M00079'][$language]; //Hello there! My name is ?> <span id="name"></span> <?php echo $translations['M00080'][$language]; //and I’m a business partner of ALPHA ROC ?>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="row justify-content-center">
						<div class="col-lg-5 col-12 landingSection02Desc text-center" style="margin-top: 20px;">
							<span id="aboutYourSelf"></span>
						</div>
					</div>
				</div>

				<div class="col-12" style="margin-top: 50px;">
					<div class="landingTitleLine"></div>
				</div>
				<div class="col-12">
					<div class="row justify-content-center">
						<div class="col-md-5 col-12 landingSection02Title text-center" style="margin-top: 20px;">
							<?php echo $translations['M00081'][$language]; //Company Video ?>
						</div>
					</div>
				</div>
				<div class="col-12 text-center">
					<video id="companyVideo" controls class="companyVideoWidth">
						<source id="companyVideoClick" src="images/alpharoc/companyVideo.mp4" type="video/mp4">
					</video>
				</div>

			</div>
		</div>
	</div>
</section>

<!-- <section class="landingSection03">
	<div class="kt-container">
		<div class="col-12">
			<video controls class="companyVideoWidth">
				<source id="companyVideo" src="images/videoSample.mp4" type="video/mp4">
			</video>
		</div>
	</div>
	
</section> -->

<section class="landingSection04">
	<div class="kt-container">
		<div class="col-12">
			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-12" style="margin-top: 50px;">
							<div class="landingTitleLine"></div>
						</div>
						<div class="col-12">
							<div class="row justify-content-center">
								<div class="col-md-5 col-12 landingSection02Title text-center" style="margin-top: 20px;">
									<?php echo $translations['M00082'][$language]; //Why did I choose ALPHA ROC ?>
								</div>
							</div>
						</div>


						<!-- <div class="col-12">
							<div class="landingTitleLine2"></div>
						</div>
						<div class="col-12 landingSection02Title textalignSection04" style="margin-top: 20px;">
							<?php echo $translations['M00082'][$language]; //Why did I choose ALPHA ROC ?>
						</div> -->
					</div>
				</div>
				<div class="col-12 text-center">
					<video id="personalVideo" controls class="companyVideoWidth"></video>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="landingSection05">
	<div class="kt-container">
		<div class="col-12 landingSection05Box">
			<div class="row">
				<div class="col-12 landingSection02Title">
					<?php echo $translations['M00083'][$language]; //The AlphaRoc System is the all new automated platform that maximises your  crypto returns, no matter the market condition. ?>
				</div>
				<div class="col-12 landingSection05Link" style="margin-top: 20px;">
					<a href="https://www.rocalpha.com/" target="_blank" class="landingSection05LinkText"><?php echo $translations['M00084'][$language]; //Find out more here ?></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="landingSection06">
	<div class="kt-container">
		<div class="col-12">
			<div class="row">

				<div class="landingSection06Box1">
					<div class="col-12">
						<div class="row">
							<div class="col-12">
								<img src="images/alpharoc/landing/landingIcon1.png" class="landingIcon">
							</div>
							<div class="col-12" style="margin-top: 10px;">
								<?php echo $translations['M00085'][$language]; //Min 20% returns on capital per month ?>
							</div>
						</div>
					</div>
				</div>

				<div class="landingSection06Box2">
					<div class="col-12">
						<div class="row">
							<div class="col-12">
								<img src="images/alpharoc/landing/landingLine1.png" class="landingIine">
							</div>
						</div>
					</div>
				</div>

				<div class="landingSection06Box3">
					<div class="col-12">
						<div class="row">
							<div class="col-12">
								<img src="images/alpharoc/landing/landingIcon2.png" class="landingIcon">
							</div>
							<div class="col-12" style="margin-top: 10px;">
								<?php echo $translations['M00086'][$language]; //Instant sign up ?>
							</div>
						</div>
					</div>
				</div>

				<div class="landingSection06Box4">
					<div class="col-12">
						<div class="row">
							<div class="col-12">
								<img src="images/alpharoc/landing/landingLine2.png" class="landingIine">
							</div>
						</div>
					</div>
				</div>

				<div class="landingSection06Box5">
					<div class="col-12">
						<div class="row">
							<div class="col-12">
								<img src="images/alpharoc/landing/landingIcon3.png" class="landingIcon">
							</div>
							<div class="col-12" style="margin-top: 10px;">
								<?php echo $translations['M00087'][$language]; //5,698 Users to date ?>
							</div>
						</div>
					</div>
				</div>

				<div class="landingSection06Box6">
					<div class="col-12">
						<div class="row">
							<div class="col-12">
								<img src="images/alpharoc/landing/landingLine3.png" class="landingIine">
							</div>
						</div>
					</div>
				</div>

				<div class="landingSection06Box7">
					<div class="col-12">
						<div class="row">
							<div class="col-12">
								<img src="images/alpharoc/landing/landingIcon4.png" class="landingIcon">
							</div>
							<div class="col-12" style="margin-top: 10px;">
								<?php echo $translations['M00088'][$language]; //Fastest and most efficient Arbitrage Bots in the markets! ?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="landingSection07">
	<div class="kt-container">
		<div class="col-12">
			<div class="row justify-content-center">
				<div class="col-xl-6 col-lg-7 col-md-9 col-12 landingSection07Box">
					<button id="signupNow" type="button" class="btn landingSignUpBtn landingSection07SignUp">
						<div class="col-12">
							<div class="row">
								<div class="col-12">
									<?php echo $translations['M02108'][$language]; //Become a LogMeln Referral Partner ?>
								</div>
								<div class="col-12" style="margin-top: 10px;">
									<img src="images/alpharoc/landing/landingSignUpIcon.png" class="landingSignUpIcon">
									<span><?php echo $translations['M02109'][$language]; //Get Started Now ?></span>
								</div>
							</div>
						</div>
					</button>
					
				</div>
			</div>
		</div>
	</div>
</section>

<section class="landingSection08"></section>

<section class="landingSection09">
	<div class="kt-container">
		<div class="col-12">
			<div class="row">
				<div class="col-12 landingFooter">
					Copyright 2020 Alpha Roc. All rights reserved.
				</div>
			</div>
		</div>
	</div>
</section>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php'; ?>



</body>

</html>

<script>

    var url             = 'scripts/reqDefault.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var landingLink = "<?php echo $landingLink; ?>";
    var registerUrl = "<?php echo $registerUrl; ?>";
    var username;

    $(document).ready(function(){
    	var formData  = {
            command   : "getClientIntroductionDetails",
            encrypt_code  : landingLink 
        };
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('#learnMore').click(function() {
        	$('html,body').animate({
        	    scrollTop: $("#aboutMe").offset().top + 190},
        	    'slow');
        })

        $('#signupNow').click(function() {
        	window.location=registerUrl+username;
        });

    });

    function loadDefaultListing(data, message) {
        console.log(data);

        // $config['tempMediaUrl'] + $videoName

        if (data.intro) {
        	username = data.encryptedUsername;
            var getData = data.intro;
            $('#name').html(getData.name);

            $('#aboutYourSelf').html(getData.introduction);

            if (getData.image_name) {
            	$('.userImg').attr('src', "<?php echo $config['tempMediaUrl']?>"+getData.image_name);
            }
        
            if (getData.video_name) {
            	$('#personalVideo').html('<source src="<?php echo $config['tempMediaUrl']?>'+getData.video_name+'" type="video/mp4">');
            }
        }
    }


</script>