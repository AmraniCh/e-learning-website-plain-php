<?php
    require '../../includes/config.php';
    include '../../includes/functions.php';
    session_start();
 
    $username = $_SESSION['user'];
    $type = $_POST['type'];
    $grp_id = $_SESSION['grp_id'];
        
    // ajax data -- load courses 
    $res = mysqli_query($con,"select count(nom) from fichier WHERE type = '$type' AND groupe_id = '$grp_id'");
    $row = mysqli_fetch_assoc($res);
    echo $row['count(nom)'];
?>

