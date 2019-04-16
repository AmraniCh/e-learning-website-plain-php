<?php
    require '../../includes/config.php';
    session_start();
    //upload.php
    if($_FILES["file"]["name"] != '')
    {
        // change image
        $imageName = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], '../assets/images/'.$imageName);
        // ajax data
        echo '<img class="avatar border-gray" src="assets/images/'.$imageName.'" alt="..."/>';
        // change image database
        $username = $_SESSION['user']; // GET method not working => ajax send method is POST
        if($_SESSION['plan'] == 'student')
            $rq = "UPDATE etudient SET image_etu = '$imageName' WHERE pseudo_etu = '$username'";
        else
            $rq = "UPDATE professeur SET image_prof = '$imageName' WHERE pseudo_prof = '$username'";
        mysqli_query($con,$rq);
    }
?>