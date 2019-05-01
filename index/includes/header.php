<?php 
    require '../../includes/config.php';
    include '../../includes/functions.php';
    session_start();
    
    // set groupe first login && set group if groupe history is not exists
    set_groupe_history($_SESSION['user']);

?>

<!doctype html>
<html lang="en">
    <head>
       
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Demosite</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link rel="stylesheet" href="../assets/style/style.css"/>
        
        <?php
            echo get_index_theme();
        ?>
        
        <script src="../../js/jquery-3.3.1.js"></script>
        <!-- functions -->
        <script src="../../js/functions.js"></script>

        <!-- Bootstrap CSS  -->
        <link href="../assets/style/bootstrap.min.css" rel="stylesheet" />

        <!--  Light Bootstrap Table core CSS -->
        <link href="../assets/style/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

        <!-- Fonts and icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="../assets/style/pe-icon-7-stroke.css" rel="stylesheet" />

    </head>
<body>
<?php
    // controls 
    if($_SESSION['plan'] == 'student')
        echo hide_controls();
    else
        echo show_controls();
?>