<?php
    require '../../includes/config.php';
    include '../../includes/functions.php';
    session_start();
    
    // session variables
    $plan = $_SESSION['plan'];
    $username = $_SESSION['user'];

    // get groupe id by pseudo
    if($plan == 'professor')
        $grp_id = get_grpId_byProf($username);
    else
        $grp_id = get_grpId_byStud($username);
        
    // delete files in database
    $file_type = $_POST['type'];
    $rq = "DELETE FROM fichier WHERE type = '$file_type' AND groupe_id = '$grp_id'";
    $res = mysqli_query($con, $rq);

    // ajax data -- load courses
    $current_page = get_pageName();
    $files = load_files_query($grp_id,$file_type,$current_page);
    if($files[0] != null){
        foreach ($files as $file) {
            echo $file;
        }     
    } 
    
?>
