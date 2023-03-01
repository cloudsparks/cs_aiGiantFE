<?php
    session_start();
    header('Content-type: image/png');

    //$text = rand(10000, 99999);
    $text = substr(str_shuffle(str_repeat("0123456789", 5)), 0, 5);
    $_SESSION["captcha"] = (string) $text;
    //$height = 25;
    //$width = 65;

    //$image_p = imagecreate($width, $height);
    $image_p = imagecreatefrompng('images/captcha_background.png');
    //$black = imagecolorallocate($image_p, 0, 0, 0);
    $sapphire = imagecolorallocate($image_p, 2, 18, 75);
    $font_size = 14;

    imagestring($image_p, $font_size, 10, 5, $text, $sapphire);
    imagejpeg($image_p, null, 80);
?>