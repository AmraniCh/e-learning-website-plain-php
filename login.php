<?php 
    require 'includes/config.php';
    require 'includes/functions.php';
    session_start();

    //create cookie block
    if (isset($_COOKIE["block"])==false){
        $block=3;
        setcookie("block",$block,time()+10);
    }
    


?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Welcome ! Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/style/main.css">
		<script src="js/jquery-3.3.1.js"></script>
		<script src="js/functions.js"></script>
		<script src="js/validation.js"></script>
	</head>
	<body>
        echo $grp;
	    <style scoped>
                @media (max-width:1920px){
                    body{
                        background-color:#092239;
                    }
                }
                @media (max-width:768px){
                    body{
                        background-color:#fff;
                    }
                }
            </style>
		<?php
            
            // unset session pseudo
            unset($_SESSION['user']);
            // login
			if(isset($_POST['submitLogin']))
			{
				$pseudo = $_POST['pseudo'];
				$pass = $_POST['pass'];		
                
				$res = select_login_query('pseudo_etu','etudient','pseudo_etu',$pseudo,$pass);
				$count_student = mysqli_num_rows($res);
                
				$res2 = select_login_query('pseudo_prof','professeur','pseudo_prof',$pseudo,$pass);
				$count_prof = mysqli_num_rows($res2);
                
				if($count_student>0)
				{
                    $row = mysqli_fetch_assoc($res);   
					$pseudo = $row['pseudo_etu'];
					header ('location: index/student/home.php?user='.$pseudo);
                    $_SESSION['user'] = $pseudo;
                    // plan session variable
                    $_SESSION['plan'] = 'student';
				}
                else if($count_prof>0){
                    $row = mysqli_fetch_assoc($res2);   
					$pseudo = $row['pseudo_prof'];
					header ('location: index/professor/home.php?user='.$pseudo);
                    $_SESSION['user'] = $pseudo;
                    // plan session variable
                    $_SESSION['plan'] = 'professor';
                }
				else{
                    // cookie 
                    $block = $_COOKIE["block"]-1;
				    setcookie("block", $block, time()+10);
                }
			}
		?>
		<div class="container" style="background:#fff;border-radius:3%;text-align:center;">
           <!--768-576-375-320-992-1200 -->
            <style scoped>
                @media (max-width:1920px){
                    .container
                    {
                        width:400px;
                    }
                }
                @media (max-width:768px){
                    .container
                    {
                        width:80%;
                    }
                }
                @media (max-width:480px){
                    .container
                    {
                        width:100%;
                    }
                }
            </style>
            <form id="login_form" action="login.php" method="post">
                <!-- titre -->
                <div class="titre">
                    <h5  style="font-size:200%;color:#5a4e97">Welcome ! <span style="color:#54C5FF">login</span></h5>
                </div>
                <!-- logo -->
                <div class="img">
                    <img src="assets/icons/mortarboard.png" class="img-fluid" style="margin-bottom:2%;width:38%" >
                </div>
                <!-- inputs -->   
                <label for="pseudoEmail">Username</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                     <!-- <div class="input-group input-group-lg"> <!-- large -->
                    <input type="text" id="pseudo" name="pseudo" placeholder="Username" class="form-control" value="<?php
                    if(isset($_GET['user']))
                    {
                        echo $_GET['user'];
                    } ?>">
                    <div class="container" style="padding:0;text-align:left;margin:0;">
                        <small id="pseudo_error_msg" class="form-text text-muted"></small>
                    </div>
                </div>
                <label for="name">Password</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                    </div>
                    <!-- <div class="input-group input-group-lg"> <!-- large --> 
                    <input type="password" id="password" name="pass" placeholder="Password" class="form-control" value="<?php if(isset($_SESSION['pass']))
                    {
                        echo $_SESSION['pass'];
                    } ?>">
                    <div class="container" style="padding:0;text-align:left;margin:0;">
                        <small id="password_error_msg" class="form-text text-muted"></small>
                    </div>
                </div>
                <!-- check -->
                <!-- <div class="form-check" style="text-align:initial;margin-bottom:2%">
                    <input type="checkbox" name="remember" class="form-check-input"><label class="form-check-label" for="remember">Remember me</label>
                </div> -->
                <!-- can't remember -->
                <div class="form-group" style="text-align: left;margin:0.5em 0 .5rem 0;">
                    <a href="#" id="link"><span style="color:#1273eb;font-size: 90%;font-family: 'roboto-bold', sans-serif">Forgot password or username ?</span></a>
                </div>
                <!-- btn -->
                <div class="btn" style="width:100%">
                    <input type="submit" name="submitLogin" value="Login" style="display:block;margin-bottom:2%;background-color:#5a4e97;width:70%" class="btn btn-primary">
                    <a id="link" href="plans/plans.php"><button type="button" id="link_register" name="submitRegister" class="btn btn-outline-primary" style="display:block;width:70%">Not a member? Sign up</button></a>
                </div>
            </form>
		</div>
	</body>

<script>
    //disabled all
    if (getCookie("block")<=0){
        window.setTimeout(function() {
        window.location.href = 'includes/loadingTime.php';
        }, 0);
    }
</script>
</html>
