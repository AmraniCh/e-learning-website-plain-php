<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>you have tried more than 3 times , you must wait 1 min!</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
   <script>
       // redirect to login page after 60s
        window.setTimeout(function() {
            window.location.href = 'login.php';
        }, 60000);
    </script>
    <div class="container text-center">
        <img class="loading" src="ressources/Cube-1s-116px.gif" style="margin: 20% auto 0 auto;">
        <h5>You have tried more than 3 times, you must wait 1 min !<br>You will be automatically redirected to a login page.</h5>
    </div>
</body>
</html>