<?php
    require '../../includes/config.php';
    include '../../includes/functions.php';
    session_start();
    //upload.php
    if($_FILES["file"]["name"] != '')
    {
        // change upload file
        $file_name = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], '../cloud/'.$file_name);
        
        $username = $_SESSION['user'];
        $plan = $_SESSION['plan'];
        // get groupe id by pseudo
        if($plan == 'professor')
            $grp_id = $_SESSION['grp_id'];
        else
            $grp_id = get_grpId_byStud($username);
        
        // instert file
        $file_type = $_REQUEST['type'];
        insert_file_query($grp_id, $file_name, $file_type); // groupe id, file name, file type
        
        // set files count in group table
        $res = mysqli_query($con,"SELECT COUNT(nom) FROM fichier WHERE groupe_id = $grp_id");
        $file_count = mysqli_fetch_row($res)[0];
        $rq = "UPDATE groupe SET nbr_fichier = $file_count WHERE pseudo_prof = '$username' ";
        mysqli_query($con,$rq);
        
        // ajax data -- load courses 
        $current_page = get_pageName();
        $files = load_files_query($grp_id,$file_type,$current_page);
        if($files[0] != null){
            foreach ($files as $file) {
                echo $file;
            }     
        }
    }
?>
