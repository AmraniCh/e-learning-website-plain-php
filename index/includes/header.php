<?php 
    require '../../includes/config.php';
    include '../../includes/functions.php';
    session_start();
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Demosite</title>
        <meta name="Content-Type" charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
        <meta name="viewport" content="width=device-width"/>
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="assets/img/favicon.ico"/>
        <!-- Main Style -->
        <link rel="stylesheet" href="../assets/style/style.css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        <!-- Index Theme CSS  -->
        <?php
            echo get_index_theme();
        ?>     
        <!-- Bootstrap CSS  -->
        <link href="../assets/style/bootstrap.min.css" rel="stylesheet" />
        <!--  Light Bootstrap dashboard CSS -->
        <link href="../assets/style/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
        <!-- Font awsome CDN -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <!-- START Dependencies scripts -->    
        <script src="../../js/jquery-3.3.1.js"></script>
        <script src="../../js/functions.js"></script>
        <!-- END Dependicies scripts -->
    </head>
<body>