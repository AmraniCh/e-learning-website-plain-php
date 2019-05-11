<?php
    require '../../includes/config.php';
    include '../../includes/functions.php';
    session_start();

    if(isset($_SESSION['grp_id'])){
        
        $type = $_POST['type'];
        $grp_id = $_SESSION['grp_id'];
        $username = $_SESSION['user'];
        
        // ajax data -- load courses 
        $res = mysqli_query($con,"select count(nom) from fichier WHERE type = '$type' AND groupe_id = '$grp_id'");
        $row = mysqli_fetch_assoc($res);
        echo $row['count(nom)'];
    }
?>

