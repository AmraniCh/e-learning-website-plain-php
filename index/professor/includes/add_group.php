<?php
    require '../../../includes/config.php';
    include '../../../includes/functions.php';
    session_start();
    
    // add groupe to database
    $grp_name = $_POST['nom'];
    $grp_desc = $_POST['desc'];
    $pseudo = $_SESSION['user'];
    echo $grp_name.'<br>'.$grp_desc.'<br>'.$pseudo;
    $rq = "INSERT INTO groupe VALUES(NULL,'$grp_name','$grp_desc',NULL,'$pseudo')";
    $res = mysqli_query($con,$rq);
    
    echo '<div class="group-added-container text-center"><h3>Groupe added</h3></div>';
?>
