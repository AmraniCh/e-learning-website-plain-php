<?php 
    require 'config.php';
    session_start();
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Welcome ! Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style/style.css">
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
				$pseudoEmail = $_POST['pseudoEmail'];
				$pass = $_POST['pass'];
				
				$rq = "SELECT pseudo,email FROM etudient WHERE pseudo='$pseudoEmail' OR email = '$pseudoEmail' AND pass='$pass'";
				
				$res = mysqli_query($con,$rq);
				
				$numRows = mysqli_num_rows($res);
				
				if($numRows == 1)
				{
                    $row = mysqli_fetch_assoc($res);   
					$pseudo = $row['pseudo'];
					header ('Location: index.php?pseudo='.$pseudo);
                    $_SESSION["pseudo"] = $pseudo;
				}
			}
        
            if(isset($_POST['submitRegister']))
            {
                header ('location: register.php');
            }
        
		?>
		<div class="container" style="background:#fff;border-radius:3%;text-align:center">
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
            <form action="login.php" method="post">
                <!-- titre -->
                <div class="titre">
                    <h5  style="font-size:210%;color:#5a4e97">Welcome ! <span style="color:#54C5FF">login</span></h5>
                </div>
                <!-- logo -->
                <div class="img">
                    <img src="ressources/mortarboard.png" class="img-fluid" style="margin-bottom:5%;width:45%" >
                </div>
                <!-- inputs -->
                <div class="form-group">
                    <label for="pseudoEmail">Email or pseudo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                         <!-- <div class="input-group input-group-lg"> <!-- large -->
                        <input type="text" name="pseudoEmail" placeholder="Pseudo or email address" class="form-control" value="<?php         
                        if(isset($_SESSION['pseudo']))
                        {
                            echo $_SESSION['pseudo'];
                        } ?>"> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                        </div>
                        <!-- <div class="input-group input-group-lg"> <!-- large --> 
                        <input type="password" name="pass" placeholder="Password" class="form-control" value="<?php if(isset($_SESSION['pass']))
                        {
                            echo $_SESSION['pass'];
                        } ?>">
                    </div>
                </div>
                <!-- check -->
                <div class="form-check" style="text-align:initial;margin-bottom:2%">
                    <input type="checkbox" name="remember" class="form-check-input"><label class="form-check-label" for="remember">Remember me</label>
                </div>
                <!-- btn -->
                <div class="btn" style="width:100%">
                    <input type="submit" name="submitLogin" value="Login" style="display:block;margin-bottom:3%;background-color:#5a4e97;width:70%" class="btn btn-primary">
                    <button type="submit" name="submitRegister" class="btn btn-outline-primary" style="display:block;width:70%">Register</button>
                </div>
            </form>
		</div>
	</body>
</html>
