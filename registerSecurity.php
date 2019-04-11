<?php 
    require 'includes/config.php';
    session_start();
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Account security</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style/main.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="js/jquery-3.3.1.js"></script>
		<script src="js/functions.js"></script>
		<script src="js/validation.js"></script>
	</head>
	<body>
		<?php
            
            // theme
            if(isset($_SESSION['plan']))
            {
                $plan = $_SESSION['plan'];
                if($plan == 'student')
                    echo '<link rel="stylesheet" type="text/css" href="style/themes/student_theme.css">';
                else if($plan == 'professor')
                    echo '<link rel="stylesheet" type="text/css" href="style/themes/prof_theme.css">';
                else if($plan == 'admin')
                    echo '<link rel="stylesheet" type="text/css" href="style/themes/admin_theme.css">';
                else
                    header('location: plans/plans.php');
            }
            else
                header('location: plans/plans.php');
        
        
            // unset session variables
            function unsetVar()
            {
                unset($_SESSION['pseudo']);
                unset($_SESSION['pass']);
                unset($_SESSION['nom']);
                unset($_SESSION['prenom']);
                unset($_SESSION['gender']);
                unset($_SESSION['email']);
            }
        
			if(isset($_POST['submitFinish']))
			{
                // get account information
				$pseudo = $_SESSION['pseudo'];
                $prenom = $_SESSION['prenom'];
                $nom = $_SESSION['nom'];
                $email = $_SESSION['email'];
                $gender = $_SESSION['gender'];
                
                $pass = $_POST['pass2'];
                $question = $_POST['question'];
                $reponse = $_POST['answer'];
                
                $rq = "insert into etudient values('$pseudo','$email','$prenom','$nom','$pass','$gender',NULL,NULL,'$reponse','$question')";
                if(mysqli_query($con,$rq))
                {
                    header('location: login.php'); 
                    $_SESSION['pass'] = $pass;
                }
                else
                    unsetVar();     
			}
            
            // no refresh 
            unset($_SESSION['plan']);
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
            <form id="register_security_form" action="registerSecurity.php" method="post">
                <!-- titre -->
                <div class="titre" style="text-align:-webkit-center;text-align:-moz-center;text-align:center;margin-bottom:5%">
                    <h5 class="help_us_text" style="font-size:300%;">Help us to <span class="secure_text" style="font-weight:900;">Secure</span> your account</h5>
                </div>
                <!-- pass1 -->
                <div class="form-group">
                    <label for="pass1">Password</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                        </div>
                        <input type="password" name="pass" id="pass1" placeholder="Password" class="form-control">
                        <div class="container" style="padding:0;text-align:left;margin:0;">
                            <small id="pass1_error_msg" class="form-text text-muted"></small>
                        </div>
                    </div>         
                </div>
                <!-- pass2 -->
                <div class="form-group">
                    <label for="pass2">Confirm password</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                        </div>
                        <input type="password" name="pass2" id="pass2" placeholder="Password" class="form-control">
                        <div class="container" style="padding:0;text-align:left;margin:0;">
                            <small id="pass2_error_msg" class="form-text text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- security question -->
                <div class="form-group">
                    <label for="menu">Security question</label>
                    <select name="question" class="form-control">
                        <?php 
                            $rq = "select quest from question";
                            $res = mysqli_query($con,$rq);
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                $question = $rows['quest'];
                                //echo '<option value='.$question.'>'.$question.'</option>';
                                echo "<option value='$question'>$question</option>";
                            }
                        ?>
                    </select>
                </div>
                <!-- answer -->
                <div class="form-group">
                    <input type="text" id="answer" name="answer" placeholder="Answer" class="form-control">
                    <div class="container" style="padding:0;text-align:left;margin:0;">
                        <small id="answer_error_msg" class="form-text text-muted"></small>
                    </div>
                </div>
                <!-- btn -->
                <div class="form-group" style="text-align:-webkit-center;text-align:-moz-center;text-align:center;width:100%">
                    <input type="submit" name="submitFinish" value="Finish" class="btn btn-primary btn-lg" style="width:40%">
                    <a href="login.php"><button type="button" name="submitLogin" class="btn btn-outline-primary btn-lg" style="width:40%">Login</button></a>
                </div>
            </form>
		</div>
	</body>
</html>