<?php
    require '../../../includes/config.php';
    include '../../../includes/functions.php';
    session_start();
 
    $pseudo = $_SESSION['user'];
   // get groupe id by pseudo
    $grp_id = get_grpId_byProf($pseudo);
        
    // ajax data -- load courses 
    $res = mysqli_query($con,"select count(nom) from fichier");
    $row = mysqli_fetch_assoc($res);
    echo $row['count(nom)'];
?>

