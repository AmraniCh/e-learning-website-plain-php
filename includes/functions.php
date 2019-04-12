<?php 

    require 'config.php';


    function image_query($table)
    {
        global $con;
        if($table == 'etudient')
        {
            $rq = "UPDATE etudient SET image_etu = 'user-male.png' WHERE gender = 'male'";
            $res = mysqli_query($con, $rq);
        }
    }

    function get_theme(){
        
        if(isset($_GET['plan']))
            {
                $plan = $_GET['plan'];
                if($plan == 'student')
                    echo '<link rel="stylesheet" type="text/css" href="style/themes/student_theme.css">';
                else if($plan == 'professor')
                    echo '<link rel="stylesheet" type="text/css" href="style/themes/prof_theme.css">';
                else if($plan == 'admin')
                    echo '<link rel="stylesheet" type="text/css" href="style/themes/admin_theme.css">';
                else
                    header('location: plans/plans.php');
            }
            else
                header('location: plans/plans.php');
    }
        
?>