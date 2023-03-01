<?php
include_once($_SERVER["DOCUMENT_ROOT"].'/include/config.php');

$target_dir = $config['tempMediaPath'];

if (($_FILES['imageFile']['name'] != "")){
	$mediaImageName = $_POST["mediaImageName"];
    $imageFile = $_FILES['imageFile']['name'];
    $imagePath  = pathinfo($file);
    $image_temp_name = $_FILES['imageFile']['tmp_name'];

    $path_imagefilename_ext = $target_dir.$mediaImageName;
    if ($_FILES['imageFile']['type'] == 'image/jpeg'){
        $image = imagecreatefromjpeg($image_temp_name);
        imagejpeg($image, $path_imagefilename_ext, 30);
    }
    elseif ($_FILES['imageFile']['type'] == 'image/gif'){
        $image = imagecreatefromgif($image_temp_name);
        imagegif($image, $path_imagefilename_ext, 30);
    }
    elseif ($_FILES['imageFile']['type'] == 'image/png'){
          $image = imagecreatefrompng($image_temp_name);
          imagepng($image, $path_imagefilename_ext);
    }

    $imageStatusMsg = "Congratulations! Image File Uploaded Successfully.";
} else {
    $imageStatusMsg = "No Image File Found.";
}

if (($_FILES['videoFiles']['name'] != "")){
    $mediaVideoName = $_POST["mediaVideoName"];
    $videoFiles = $_FILES['videoFiles']['name'];
    $videoPath  = pathinfo($file);
    $video_temp_name = $_FILES['videoFiles']['tmp_name'];
    $path_videofilename_ext = $target_dir.$mediaVideoName;
    move_uploaded_file($video_temp_name, $path_videofilename_ext);

    $videoStatusMsg = "Congratulations! Video File Uploaded Successfully.";
} else {
    $videoStatusMsg = "No Video File Found.";
}

if (($_FILES['video2files']['name'] != "")){
    $mediaVideo2Name        = $_POST["mediaVideo2Name"];
    $video2files = $_FILES['video2files']['name'];
    $video2Path = pathinfo($file);
    $video2_temp_name = $_FILES['video2files']['tmp_name'];
    $path_video2filename_ext = $target_dir.$mediaVideo2Name;
    move_uploaded_file($video2_temp_name, $path_video2filename_ext);

    $video2StatusMsg = "Congratulations! Video2 File Uploaded Successfully.";
} else {
    $video2StatusMsg = "No Video2 File Found.";
}


$returnData = array(
    'status' => 'ok',
    'imageStatusMsg' => $imageStatusMsg,
    'videoStatusMsg' => $videoStatusMsg,
    'video2StatusMsg' => $video2StatusMsg,
);
echo json_encode($returnData);

?>