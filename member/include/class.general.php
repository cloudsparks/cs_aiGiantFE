<?php
    
	class General
    {

		function getLanguage()
        {
			if(isset($_SESSION['language'])) {
		        $language = $_SESSION['language'];
		    }
		    else {
		    	if(isset($_COOKIE["language"])) {
		    		$_SESSION['language'] = $_COOKIE['language'];
			        $language = $_COOKIE['language'];
		    	}
		    	else {
		    		$_SESSION['language'] = "english";
			        $language = "english";
			        setcookie("language", "english");
		    	}
		    }

		    return $language;
		}
	}

	?>
