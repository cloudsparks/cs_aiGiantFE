<?php

    /**
     * @author ttwoweb.
     * This file is contains the script to process memberLogin.
     *
    **/
    
    session_start();
    include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");

    $post = new post();

    $command = $_POST['command'];

    if($_POST['type'] == 'logout') {
        session_destroy();
    }
    else {
        switch($command) {

            case "getTs":
                $myTimeZone = date_default_timezone_get();
                date_default_timezone_set($myTimeZone);
                $date = new DateTime();
                $serverTimeZone = date_offset_get($date);
                $currentTime = strtotime("now");

                $data->currentTime = $currentTime;
                $data->serverTimeZone = $serverTimeZone;

                $result = json_encode($data);

                echo $result;

                break;
        }
    }
?>
