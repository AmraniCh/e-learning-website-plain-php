<?php
    require '../../../includes/config.php';
    include '../../../includes/functions.php';
    session_start();

    $username = $_SESSION['user'];

    $rq = "DELETE FROM groupe WHERE id = '".$_POST['grp_id']."'";
    mysqli_query($con, $rq);
    
?>
