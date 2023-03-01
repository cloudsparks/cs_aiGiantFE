<?php
    /**
     * @author TtwoWeb Sdn Bhd.
     * Date  30/03/2017.
    **/
	session_start();

    include ($_SERVER["DOCUMENT_ROOT"]."/include/config.php");
	include($_SERVER["DOCUMENT_ROOT"]."/include/class.post.php");
    
    $post = new post();

	$command = $_POST['command'];

    $username   = $_SESSION['username'];
    $userID     = $_SESSION['userID'];
    $sessionID  = $_SESSION['sessionID'];

    if($_POST['type'] == 'logout') {
        session_destroy();
    }
    else {

        switch($command) {
            
            case "addEmall":
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;
                    $params[$key] = $value;
                }
                $params['clientID'] = $userID;

                foreach ($params['image'] as $key => $value) {
                    $imageData = $value['imageData'];
                    $imageName = $value['imageName'];

                    $info = getimagesize($imageData);
                    $imageName = $imageName;

                    if ($info['mime'] == 'image/jpeg'){
                        $image = imagecreatefromjpeg($imageData);
                        imagejpeg($image, "../temp/".$imageName, 30);
                    }
                    elseif ($info['mime'] == 'image/gif'){
                        $image = imagecreatefromgif($imageData);
                        imagegif($image, "../temp/".$imageName, 30);
                    }
                    elseif ($info['mime'] == 'image/png'){
                          $image = imagecreatefrompng($imageData);
                          imagepng($image, "../temp/".$imageName);
                    }

                    $path = "../temp/".$imageName;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                    unlink($path);

                    $params['image'][$key]['imageData'] = $base64;
                    $params['image'][$key]['imageName'] = $imageName;
                    // $_POST['image'][$key]['imageType'] = $type;
                }

                $result = $post->curl($command, $params);

                echo $result;

                
                break;
            
            case "editEmall":
                foreach ($_POST as $key => $value) {
                    if ($key == 'command') continue;
                    $params[$key] = $value;
                }
                $params['clientID'] = $userID;

                foreach ($params['image'] as $key => $value) {
                    $imageData = $value['imageData'];
                    $imageName = $value['imageName'];

                    $info = getimagesize($imageData);
                    $imageName = $imageName;

                    if ($info['mime'] == 'image/jpeg'){
                        $image = imagecreatefromjpeg($imageData);
                        imagejpeg($image, "../temp/".$imageName, 30);
                    }
                    elseif ($info['mime'] == 'image/gif'){
                        $image = imagecreatefromgif($imageData);
                        imagegif($image, "../temp/".$imageName, 30);
                    }
                    elseif ($info['mime'] == 'image/png'){
                          $image = imagecreatefrompng($imageData);
                          imagepng($image, "../temp/".$imageName);
                    }

                    $path = "../temp/".$imageName;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                    unlink($path);

                    $params['image'][$key]['imageData'] = $base64;
                    $params['image'][$key]['imageName'] = $imageName;
                    // $_POST['image'][$key]['imageType'] = $type;
                }

                $result = $post->curl($command, $params);

                echo $result;
                
                break;

            case "getEmallDetails":
                
                $params = array("diamondID" => $_POST['diamondID']);

                $result = $post->curl($command, $params);

                echo $result;

                break;

            case "getEmallDesignDetail":
                
                $params = array("ID" => $_POST['ID']);

                $result = $post->curl($command, $params);

                echo $result;

                break;

            case "getEmallListing":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['inputData'],
                                "seeAll"    => $_POST['seeAll']
                );

                $result = $post->curl($command, $params);

                echo $result;

                break;

            case "getEmallDesign":
                
                $params = array("pageNumber" => $_POST['pageNumber'],
                                "searchData" => $_POST['searchData'],
                                "seeAll"    => $_POST['seeAll']
                );

                $result = $post->curl($command, $params);

                echo $result;

                break;


        }
    }
?>
