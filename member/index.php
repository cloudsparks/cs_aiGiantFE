<?php 

    session_start();

    if (isset($_SESSION["userID"]) && isset($_SESSION["sessionID"])) {
        header("Location: dashboard");

    }
    else {
        header("Location: login");
    }

?>
