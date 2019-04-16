<?php
    require '../../includes/config.php';
    include '../../includes/functions.php';
    session_start();
    
    // session variables
    $plan = $_SESSION['plan'];
    $pseudo = $_SESSION['user'];
        
    // get groupe id
    if($plan == 'student'){
        $res = select_home_query('*','etudient','pseudo_etu',$pseudo);
        $row = mysqli_fetch_assoc($res);
        $grp_id = $row['groupe_etu'];
    }
    if($plan == 'professor'){
        $res = select_home_query('*','professor','pseudo_prof',$pseudo);
        $row = mysqli_fetch_assoc($res);
        $grp_id = $row['groupe_prof'];
    }
        
    // delete file in database
    $file_name = $_POST['file_name'];
    $rq = "DELETE FROM fichier_groupe WHERE nom_fich = '$file_name'";
    $res = mysqli_query($con, $rq);

    // ajax data -- load courses
    $current_page = get_pageName();
    $files = load_coures_query($grp_id,$current_page);
    if($files[0] != null){
        foreach ($files as $file) {
            echo $file;
        }     
    } 
    
?>
