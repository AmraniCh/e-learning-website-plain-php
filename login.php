<?php 
    require 'includes/config.php';
    session_start();

    //create cookie
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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style/main.css">
		<script src="js/jquery-3.3.1.js"></script>
		<script src="js/functions.js"></script>
		<script src="js/validation.js"></script>
	</head>
	<body>
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
			if(isset($_POST['submitLogin']))
			{
				$pseudo = $_POST['pseudo'];
				$pass = $_POST['pass'];
				
				$rq = "SELECT pseudo,email FROM etudient WHERE pseudo = '$pseudo' AND pass='$pass'";
				
				$res = mysqli_query($con,$rq);
				
				$numRows = mysqli_num_rows($res);
				
				if($numRows == 1)
				{
                    $row = mysqli_fetch_assoc($res);   
					$pseudo = $row['pseudo'];
					header ('Location: login.php?pseudo='.$pseudo);
                    $_SESSION["pseudo"] = $pseudo;
				}
				else{
                    $block=$_COOKIE["block"]-1;
				    setcookie("block",$block,time()+10);
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
                    <img src="ressources/mortarboard.png" class="img-fluid" style="margin-bottom:2%;width:38%" >
                </div>
                <!-- inputs -->
                <div class="form-group">
                    <label for="pseudoEmail">Username</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                         <!-- <div class="input-group input-group-lg"> <!-- large -->
                        <input type="text" id="pseudo" name="pseudo" placeholder="Username" class="form-control" value="<?php
                        if(isset($_SESSION['pseudo']))
                        {
                            echo $_SESSION['pseudo'];
                        } ?>">
                        <div class="container" style="padding:0;text-align:left;margin:0;">
                            <style scoped>
                                .text-muted{color:#e82626!important;}
                            </style>
                            <small id="pseudo_error_msg" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                        </div>
                        <!-- <div class="input-group input-group-lg"> <!-- large --> 
                        <input type="password" id="password" name="pass" placeholder="Password" class="form-control" value="<?php if(isset($_SESSION['pass']))
                        {
                            echo $_SESSION['pass'];
                        } ?>">
                        <div class="container" style="padding:0;text-align:left;margin:0;">
                            <style scoped>
                                .text-muted{color:#e82626!important;}
                            </style>
                            <small id="password_error_msg" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- check -->
                <!-- <div class="form-check" style="text-align:initial;margin-bottom:2%">
                    <input type="checkbox" name="remember" class="form-check-input"><label class="form-check-label" for="remember">Remember me</label>
                </div> -->
                <!-- can't remember -->
                <div class="form-group" style="text-align: left;margin-bottom:.5rem">
                    <a href="#" id="link"><span style="color:#1273eb;font-size: 90%">Forgot password or username ?</span></a>
                </div>
                <!-- btn -->
                <div class="btn" style="width:100%">
                    <input type="submit" name="submitLogin" value="Login" style="display:block;margin-bottom:2%;background-color:#5a4e97;width:70%" class="btn btn-primary">
                    <a id="link" href="register.php"><button type="button" id="link_register" name="submitRegister" class="btn btn-outline-primary" style="display:block;width:70%">Not a member? Sign up</button></a>
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

    $("#pseudo_error_msg").hide();
    $("#password_error_msg").hide();

    var password_error = false;
    var username_error = false;

    $("#pseudo").focusout(function() {

        check_username();
        
    });

    $("#password").focusout(function() {

        check_password();
        
    });


    function check_username() {
    
        var pseudo_length = $("#pseudo").val().length;
        if(pseudo_length < 6 || pseudo_length > 20) {
            $("#pseudo_error_msg").html("Username should be between 6-20 characters");
            $("#pseudo_error_msg").show();
            username_error = true;
          } 
        }
    }

    function check_password() {
    
        var password_length = $("#password").val().length;
        if(password_length < 10 || password_length > 40) {
            $("#password_error_msg").html("Password should be between 10-40 characters");
            $("#password_error_msg").show();
            password_error = true;
        } 
    }
    $("#login_form").submit(function() {
                                            
        username_error = false;
        password_error = false;
                                            
        check_username();
        check_password();

        
        if(username_error == false && password_error == false) {
            return true;
        } else {
            return false;   
        }

    });a
</script>
</html>
