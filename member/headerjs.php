<?php
include_once("mobileDetect.php");
$detect = new Mobile_Detect;
?>

<script type="text/javascript">
    var isMobile = <?php echo $detect->isMobile() ?: 0 ?>;
    $(document).ready(function() {

        $(window).scroll(function () { 
            if( $(window).scrollTop() > 1 ) {
                $(".homepageHeader").addClass("scrolled");
            } else {
                $(".homepageHeader").removeClass("scrolled");
            }
        })

        $(document).click(function(e){
            var container = $(".headerMenuDropdown.active, .headerMenuDropdownBox");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                container.removeClass("active");
            }
            
            var container2 = $(".headerMenuDropdown2.active, .headerMenuDropdownBox2");
            if (!container2.is(e.target) && container2.has(e.target).length === 0) {
                container2.removeClass("active");
            }
        });


        $(".headerMenuDropdown").click(function(){
            // $(".headerMenuDropdown").parent().find(".headerMenuDropdownBox").css("height", "0px");
            // $(".headerMenuDropdown2").parent().find(".headerMenuDropdownBox2").css("height", "0px");
            if ($(this).hasClass("active")) {
                $(".headerMenuDropdown").removeClass("active");
            } else {
                $(".headerMenuDropdown").removeClass("active");
                $(this).addClass("active");
                // var getDropdownItems = $(this).parent().find('.headerMenuDropdownBox .headerMenuDropdownItem').not('.headerMenuDropdownBox2 .headerMenuDropdownItem').length;
                // var dropdownItemCount = getDropdownItems*30;
                // $(this).parent().find(".headerMenuDropdownBox").css("height", dropdownItemCount+"px");
            }
        });

        $(".menuDropdownBtn").click(function(){
            if ($(this).hasClass("active")) {
                $(".menuDropdownBtn").removeClass("active");
            } else {
                $(".menuDropdownBtn").removeClass("active");
                $(this).addClass("active");
            }
        });

        $(".headerMenuDropdown2").click(function(){
            // $(".headerMenuDropdown2").parent().find(".headerMenuDropdownBox2").css("height", "0px");
            if ($(this).hasClass("active")) {
                $(".headerMenuDropdown2").removeClass("active");

                // if ( $(window).width() < 768 ) {
                //     var getDropdownItems1 = $(this).parent().parent().parent().find('.headerMenuDropdownBox .headerMenuDropdownItem').not('.headerMenuDropdownBox2 .headerMenuDropdownItem').length;
                //     var dropdownItemCount1 = getDropdownItems1*30;
                //     $(this).parent().parent().parent().find(".headerMenuDropdownBox").css("height", dropdownItemCount1+"px");
                // }
            } else {
                $(".headerMenuDropdown2").removeClass("active");
                $(this).addClass("active");

                // if ( $(window).width() < 768 ) {
                //     var getDropdownItems1 = $(this).parent().parent().parent().find('.headerMenuDropdownBox .headerMenuDropdownItem').not('.headerMenuDropdownBox2 .headerMenuDropdownItem').length;
                //     var getDropdownItems2 = $(this).parent().find('.headerMenuDropdownBox2 .headerMenuDropdownItem').length;
                //     var dropdownItemCount1 = getDropdownItems1+getDropdownItems2;
                //     var dropdownItemCount2 = dropdownItemCount1*30;
                //     var dropdownItemCount3 = getDropdownItems2*30;
                //     $(this).parent().parent().parent().find(".headerMenuDropdownBox").css("height", dropdownItemCount2+"px");
                //     $(this).parent().find(".headerMenuDropdownBox2").css("height", dropdownItemCount3+"px");
                // } else {
                //     var getDropdownItems2 = $(this).parent().find('.headerMenuDropdownBox2 .headerMenuDropdownItem').length;
                //     var dropdownItemCount3 = getDropdownItems2*30;
                //     $(this).parent().find(".headerMenuDropdownBox2").css("height", dropdownItemCount3+"px");
                // }

            }
        });

        $(".mobileSideBarBtn").click(function(){
          if ($(this).hasClass("active")) {
            $(".mobileSideBarBtn").removeClass("active");
            $(".sidebarMenuWrapper").removeClass("active");
          } else {
            $(".mobileSideBarBtn").addClass("active");
            $(".sidebarMenuWrapper").addClass("active");
          }
        });

        $(".mobileMenuClose").click(function(){
          $(".mobileSideBarBtn").removeClass("active");
          $(".sidebarMenuWrapper").removeClass("active");
        });

        $(".headerBurgerBtn").click(function(){
            if ($(this).hasClass("active")) {
                $(".headerBurgerBtn").removeClass("active");
            } else {
                $(".headerBurgerBtn").addClass("active");
            }
        });

        $(".headerMenuClose").click(function(){
            $(".headerBurgerBtn").removeClass("active");
        });

        $(".homepageHeaderBlackBG").click(function(){
            $(".headerBurgerBtn").removeClass("active");
        });

        $(".menuBtn").each(function(){
            if (this.href == window.location.href){
                $(this).addClass('active');
            }
        });

        $(".sideBarDropdown").click(function(){
          if ($(this).parent().find('.sideBarMenuDropdown').hasClass("active")) {
            $(this).removeClass("active");
            $(".sideBarDropdown").parent().find('.sideBarMenuDropdown').removeClass("active");
          } else {
            $(".sideBarDropdown").parent().find('.sideBarMenuDropdown').removeClass("active");
            $(this).addClass("active");
            $(this).parent().find(".sideBarMenuDropdown").addClass("active");
          }
        });

        // add class of "open" for dropdown submenu
        $(".sideBarMenuDropdownItem").each(function(){
            if (this.href == window.location.href){
                $(this).parent().parent().find('.sideBarDropdown').addClass("open");
            }
        });
    });
</script>
