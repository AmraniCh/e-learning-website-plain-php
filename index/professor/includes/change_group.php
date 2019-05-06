<?php

    require '../../../includes/config.php';
	session_start();

    $username = $_SESSION['user'];

    // insert if not exists && update grp_id if exists
    $rq = " INSERT INTO groupe_historique VALUES('$username','".$_POST['grp_id']."') ON DUPLICATE KEY UPDATE grp_id = '".$_POST['grp_id']."' ";
    mysqli_query($con,$rq);

    // create session groupe variable
    $_SESSION['grp_id'] = $_POST['grp_id'];
?>