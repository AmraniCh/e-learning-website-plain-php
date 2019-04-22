<?php
    require '../../../includes/config.php';
    include '../../../includes/functions.php';
    session_start();
    
    // session variables
    $plan = $_SESSION['plan'];
    $pseudo = $_SESSION['user'];
        
    // get groupe id by pseudo
    $grp_id = get_grpId_byProf($pseudo);
        
    // delete file in database
    $file_name = $_POST['file_name'];
    $rq = "DELETE FROM fichier WHERE nom = '$file_name'";
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
