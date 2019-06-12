<?php

    require '../../../includes/config.php';
    include '../../../includes/functions.php';
    session_start();

    $username = $_SESSION['user'];
    $grp_id = get_grpId_byProf($username);
    $contenu = $_POST['post_content'];
    $type = $_POST['type_post'];
    $imp = $_POST['date_imp'];

    $rq = "INSERT INTO post VALUES(NULL,now(),'$contenu','$type',now(),$grp_id)";

    $res = mysqli_query($con,$rq);

?>


