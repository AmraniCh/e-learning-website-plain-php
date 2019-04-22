<?php
	session_start();
	unset($_SESSION['pseudo']);
    unset($_SESSION['plan']);

    //create cookie
    if (isset($_COOKIE["grp"])==false){
        $grp_id = $_SESSION['grp_id'];
        setcookie("grp_id",$grp_id,time()+31556926); // year
    }
	header ('Location: ../login.php');
?>