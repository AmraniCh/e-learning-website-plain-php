<?php
    require '../../includes/config.php';
    include '../../includes/functions.php';
    session_start();
 
    $plan = $_SESSION['plan'];
    if($plan == 'student'){
        $pseudo = $_SESSION['user'];
        $res = select_home_query('*','etudient','pseudo_etu',$pseudo);
        $row = mysqli_fetch_assoc($res);
        // get groupe name by id
        $grp_id = $row['groupe_id'];
    }
    if($plan == 'professor'){
        $pseudo = $_SESSION['user'];
        $res = select_home_query('*','professor','pseudo_prof',$pseudo);
        $row = mysqli_fetch_assoc($res);
    }
        
    // ajax data -- load courses 
    $res = mysqli_query($con,"select count(nom) from fichier");
    $row = mysqli_fetch_assoc($res);
    echo $row['count(nom)'];
        

?>

