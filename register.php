<?php 
    require 'includes/config.php';
    include 'includes/functions.php';
    session_start();
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Sign up Now !</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/style/main.css">
		<script src="js/jquery-3.3.1.js"></script>
		<script src="js/functions.js"></script>
		<script src="js/validation.js"></script>
		<?php 
            echo $link = get_register_theme();
        ?>
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
            // register inputs 
			if(isset($_POST['submitNext']))
			{
				$_SESSION['user'] = $_POST['pseudo'];
                $_SESSION['prenom'] = $_POST['fname'];
                $_SESSION['nom'] = $_POST['lname'];
                $_SESSION['gender'] = $_POST['gender'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['plan'] = $_GET['plan'];
                header('location: registerSecurity.php?plan='.$_GET['plan'].'');
			}
        
		?>
		<div class="container" id="containerRegister" style="background:#fff;border-radius:3%; margin: 2% auto;">
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
            <form id="register_form" action="" method="post">
                <!-- titre -->
                <div class="titre" style="text-align:-webkit-center;text-align:-moz-center;text-align:center;margin-bottom:5%">
                    <h5 class="sign" style="font-size:250%;font-weight:900">Sign <span class="up">Up</span></h5>
                </div>
                <!-- register as -->
                <div class="container" style="padding:0;text-align:center;margin:0;width:100%">
                    <small class="register_as_text">Register As : <span class="register_as"><?php echo $_GET['plan'] ?></span></small>
                </div>
                <!-- Pseudo -->
                <div class="form-group">
                    <label for="pseudo">Username</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" id="pseudoRegister" name="pseudo" placeholder="Pseudo" class="form-control">
                        <div class="container" style="padding:0;text-align:left;margin:0;">
                            <small id="pseudo_register__error_msg" class="form-text text-muted"></small>
                        </div>
                    </div>         
                </div>
                <!-- First name -->
                <div class="form-group">
                    <label for="fs-name">First name</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">F</span>
                        </div>
                        <input type="text" name="fname" id="fname" placeholder="First name" class="form-control">
                        <div class="container" style="padding:0;text-align:left;margin:0;">
                            <small id="fname_error_msg" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
                 <!-- Last name -->
                <div class="form-group">
                    <label for="ls-name">Last name</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">L</span>
                        </div>
                        <input type="text" name="lname" id="lname" placeholder="Last name" class="form-control">
                        <div class="container" style="padding:0;text-align:left;margin:0;">
                            <small id="lname_error_msg" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- Gender -->
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-transgender"></i></span>
                        </div>
                        <select name="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="container" style="padding:0;text-align:left;margin:0;">
                        <small id="gender_error_msg" class="form-text text-muted"></small>
                    </div>
                </div>
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email address</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" name="email" id="email" placeholder="email" class="form-control">
                        <div class="container" style="padding:0;text-align:left;margin:0;">
                            <small id="email_error_msg" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- btn -->
                <div class="form-group" style="text-align:-webkit-center;text-align:-moz-center;text-align:center;width:100%">
                    <input type="submit" name="submitNext" id="submitNext" value="Next" class="btn .btn-default btn-lg" style="width:40%">
                    <a href="login.php"><button type="button" name="submitLogin" class="btn btn-outline-primary btn-lg" style="width:40%">Login</button></a>
                </div>
            </form>
		</div>
	</body>

<script>

    

</script>
</html>