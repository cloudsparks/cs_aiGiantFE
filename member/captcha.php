<?php
    session_start();
    header('Content-type: image/png');

    $text = '';
    //  custom captcha background
    $image_p = imagecreatefrompng('images/captcha_background1.png');

    for ($i = 0; $i < 5; $i++) {
        $fontsize = 6;
        $fontcolor = imagecolorallocate($image_p, rand(0, 120), rand(0, 120), rand(0, 120));
        $data = '0123456789';
        $fontcontent = substr($data, rand(0, strlen($data) - 1), 1);
        $text .= $fontcontent;
        $x = ($i * 50 / 4) + rand(5, 10); // X axis
        $y = rand(5, 10); // Y axis
        imagestring($image_p, $fontsize, $x, $y, $fontcontent, $fontcolor);
    }

    $_SESSION["captcha"] = (string) $text;

    $sapphire = imagecolorallocate($image_p, 2, 18, 75);
    $font_size = 14;

    // add random point
    for ($i = 0; $i < 50; $i++) {
        $pointcolor = imagecolorallocate($image_p, rand(50, 200), rand(50, 200), rand(50, 200));
        imagesetpixel($image_p, rand(1, 99), rand(1, 29), $pointcolor);
    }

    // add random line
    for ($i = 0; $i < 2; $i++) {
        $linecolor = imagecolorallocate($image_p, rand(80, 220), rand(80, 220), rand(80, 220));
        imageline($image_p, rand(1, 99), rand(1, 29), rand(1, 99), rand(1, 29), $linecolor);
    }

    imagejpeg($image_p, null, 100);
?>
