<?php
    require '../../includes/config.php';
    session_start();
    //upload.php
    if($_FILES["file"]["name"] != '')
    {
        // change image
        $imageName = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], '../images/'.$imageName);
        
        echo '<img class="avatar border-gray" src="images/'.$imageName.'" alt="..."/>';
        // change image database
        $username = $_SESSION['user']; // GET method not working => ajax send method is POST
        $rq = "UPDATE etudient SET image_etu = '$imageName' WHERE pseudo_etu = '$username'";
        mysqli_query($con,$rq);
    }
?>