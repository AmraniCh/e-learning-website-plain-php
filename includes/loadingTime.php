<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>You have tried more than 3 times , you must wait...</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <script src="../js/jquery-3.3.1.js"></script>
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
      // loadingTime countdown 
      var time = 10;
      function timer()
      {
        setTimeout(timer, 1000);
        $("#timer").html(time);

        time--;
      }
      timer();
   </script>
    <div class="container text-center" style="margin: 16% auto 0 auto;">
        <img class="loading" src="../assets/icons/Cube-1s-116px.gif">
        <h5 style="color:#626f6f;font-size:1rem;margin-top: 1%">You have tried more than 3 times, you must wait <span id="timer">10</span> s !<br>You will be automatically redirected to a login page.</h5>
    </div>
</body>
</html>