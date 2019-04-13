<?php 

    require '../includes/config.php';
    
    // add default pictures
    function image_query($table){
        global $con;
        if($table == 'etudient')
        {
            $rq = "UPDATE etudient SET image_etu = 'user-male.png' WHERE gender = 'male' AND (image_etu IS NULL OR image_etu = '') ";
            mysqli_query($con, $rq);
            $rq = "UPDATE etudient SET image_etu = 'user-female.png' WHERE gender = 'female' AND (image_etu IS NULL OR image_etu = '') ";
            mysqli_query($con, $rq);
        }
    }
    
    // get groupe name
    function get_groupeName($id){
        global $con;
        $rq = "SELECT nom FROM groupe WHERE id = '$id'";
        $res = mysqli_query($con, $rq);
        $row = mysqli_fetch_assoc($res);
        return $row['nom'];
    }

    // redirect url
    function redirect_url($page)
    {
        $user = $_SESSION['user'];
        header ('location: '.$page.'?user='.$user.'');
    }
        
    // get actual name page
    function get_pageName(){
        $page = explode('.', basename($_SERVER['PHP_SELF']));
        return ucfirst($page[0]);
    }
?>