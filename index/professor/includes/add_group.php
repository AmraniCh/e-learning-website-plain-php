<?php

    require '../../../includes/config.php';
    include '../../../includes/functions.php';
    session_start();

    //if($_FILES["file"]["name"] != '')
    $username = $_SESSION['user'];
    // getting ajax parameters values 
    $grp_name = $_REQUEST['nom'];
    $grp_desc = $_REQUEST['desc'];
    $grp_pic_name = $_FILES["file"]["name"];

    // uplaod picture
    move_uploaded_file($_FILES["file"]["tmp_name"], '../assets/groups-images/'.$grp_pic_name);
    $random = rand(10000,99999);
    $cle = crypt('$random','st');
    // add group to database
    $rq = "INSERT INTO groupe VALUES(NULL,'$grp_name','$grp_desc','$grp_pic_name',now(),'$cle',0,0,'$username')";
    $res = mysqli_query($con,$rq);

?>
