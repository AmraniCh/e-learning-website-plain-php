<?php
    require '../../../includes/config.php';
    session_start();
    //upload.php
    if($_FILES["file"]["name"] != '')
    {
        // change image
        $imageName = $_FILES["file"]["name"];

        // ajax data
        echo '<div id="profile-img" class="profile-img" id="profile-img" style="background-image: url(assets/images/'.$imageName.')">
                </div>';
    }
?>
