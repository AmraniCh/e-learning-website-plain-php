<?php
    require '../../includes/config.php';
    include '../../includes/functions.php';
    session_start();
 
    $pseudo = $_SESSION['user'];
    $type = $_POST['type'];
        
    // ajax data -- load courses 
    $res = mysqli_query($con,"select count(nom) from fichier WHERE type = '$type'");
    $row = mysqli_fetch_assoc($res);
    echo $row['count(nom)'];
?>

