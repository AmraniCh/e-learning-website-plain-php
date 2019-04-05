<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>you have tried more than 3 times , you must wait 1 min!</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../js/functions.js"></script>
</head>
<body>
   <script>
       // redirect to login page after 60s
       window.setTimeout(function(){
           if (getCookie("block")==="" || getCookie("block")<=0){
               window.location.href = '../login.php';
           }
       }, 10000);
    </script>
    <div class="container text-center">
        <img class="loading" src="../ressources/Cube-1s-116px.gif" style="margin: 20% auto 0 auto;">
        <h5 style="color:#626f6f;font-size:1rem;margin-top: 1%">You have tried more than 3 times, you must wait 1 min !<br>You will be automatically redirected to a login page.</h5>
    </div>
</body>
</html>