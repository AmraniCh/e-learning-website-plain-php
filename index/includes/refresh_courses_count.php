<?php
    require '../../includes/config.php';
    include '../../includes/functions.php';
    session_start();
 
    // get groupe id 
    $plan = $_SESSION['plan'];
    if($plan == 'student'){
        $pseudo = $_SESSION['user'];
        $res = select_home_query('*','etudient','pseudo_etu',$pseudo);
        $row = mysqli_fetch_assoc($res);
        // get groupe name by id
        $grp_id = $row['groupe_etu'];
        // instert file
    }
    if($plan == 'professor'){
        $pseudo = $_SESSION['user'];
        $res = select_home_query('*','professor','pseudo_prof',$pseudo);
        $row = mysqli_fetch_assoc($res);
        // get groupe name by id
        $grp_id = $row['groupe_prof'];
        // instert file
    }
        
    // ajax data -- load courses 
    $res = mysqli_query($con,"select count(id_groupe) from fichier_groupe ");
    $row = mysqli_fetch_assoc($res);
    echo var_dump($row);
    echo $row['count(id_groupe)'];
        

?>

