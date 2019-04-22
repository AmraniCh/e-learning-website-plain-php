<?php
    require '../../../includes/config.php';
    include '../../../includes/functions.php';
    session_start();
    //upload.php
    if($_FILES["file"]["name"] != '')
    {
        // change upload file
        $file_name = $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], '../../cloud/'.$file_name);
        
        // add file in database
        $pseudo = $_SESSION['user'];
        // get groupe id by student username
        $grp_id = get_grpId_byStud($pseudo);
        // instert file
        insert_file_query($grp_id, $file_name, strtolower(get_pageName())); // groupe id, file name, actual page for type file

        
        // ajax data -- load courses 
        $current_page = get_pageName();
        $files = load_coures_query($grp_id,$current_page);
        if($files[0] != null){
            foreach ($files as $file) {
                echo $file;
            }     
        }
    }
?>

