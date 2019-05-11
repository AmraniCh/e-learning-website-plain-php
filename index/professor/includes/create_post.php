<?php

    require '../../../includes/config.php';
    include '../../../includes/functions.php';
    session_start();

    if($_FILES["file"]["name"] != '')
    {
        //if($_FILES["file"]["name"] != '')
        $username = $_SESSION['user'];
        // getting ajax parameters values 
        $post_file_name = $_FILES["file"]["name"];
        $post_content = $_REQUEST['content'];
        $post_type = $_REQUEST['type'];
        $date_imp = $_REQUEST['date_imp'];

        // uplaod picture
        move_uploaded_file($_FILES["file"]["tmp_name"], '../../cloud/'.$post_file_name);

            // add group to database
            $rq = "INSERT INTO post VALUES(NULL,now(),'$post_content','$post_type',$date_imp,'".$_SESSION['grp_id']."')";
            $res = mysqli_query($con,$rq);
        
    }
?>
