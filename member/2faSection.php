<div class="webView">
  <div class="slideout-sidebar p-5">
    <div class="text-right" style="font-size:20px;">
        <i class="fa fa-times iconSidebar text-left" aria-hidden="true" onclick="hideSideBar()"></i>
    </div>
    <div class="blackMainTxt mb-2 ml-2 mt-3 " data-lang="M03632">
        <?php echo $translations['M03632'][$language]; //Two Factor Authentication ?>
    </div>
    <div class="dashboardSection02Text01 mb-5 ml-2" data-lang="M03633">
        <?php echo $translations['M03633'][$language] //Open your authentication app and enter the code for Joint Cap Venture. ?>
    </div>
    <div class="col-12 form-group">
     <label class="dashboardSection02Text01" data-lang="M03634"><?php echo $translations['M03634'][$language] //6 digit-code ?></label>
        <input type="text" class="form-control twoFACode" id="code" data-lang="M03635" placeholder="<?php echo $translations['M03635'][$language] //Enter 6 digit OTP ?>"> 
        <span id="codeError" class="customError text-danger" error="error"></span>
    </div>
    <button id="" onclick="verifyBtn()" type="button" class="btn btn-primary verifiedBtn ml-2" data-lang="M03636"><?php echo $translations['M03636'][$language] //Verify Code ?></button>
      
  </div>
</div>

<div class="mobileView">
    <div class="slideout-sidebar1 p-5">
        <div class="text-right" style="font-size:20px;">
            <i class="fa fa-times iconSidebar text-left" aria-hidden="true" onclick="hideSideBar()"></i>
        </div>
        <div class="blackMainTxt mb-2 ml-2 mt-3 " data-lang="M03632">
            <?php echo $translations['M03632'][$language]; //Two Factor Authentication ?>
        </div>
        <div class="dashboardSection02Text01 mb-5 ml-2" data-lang="M03633">
        <?php echo $translations['M03633'][$language] //Open your authentication app and enter the code for Joint Cap Venture. ?>
        </div>
        <div class="col-12 form-group">
            <label class="dashboardSection02Text01" data-lang="M03634"><?php echo $translations['M03634'][$language] //6 digit-code ?></label>
                <input type="text" class="form-control" id="code" data-lang="M03635" placeholder="<?php echo $translations['M03635'][$language] //Enter 6 digit OTP ?>"> 
                <span id="codeError" class="customError text-danger" error="error"></span>
            </div>
        <button id="" onclick="verifyBtn()" type="button" class="btn btn-primary verifiedBtn ml-2" data-lang="M03636"><?php echo $translations['M03636'][$language] //Verify Code ?></button>
    </div>
</div>