<?php 
    require 'includes/config.php';
    session_start();
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Sign up Now !</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
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
        
			if(isset($_POST['submitNext']))
			{
				$_SESSION['pseudo'] = $_POST['pseudo'];
                $_SESSION['prenom'] = $_POST['fs-name'];
                $_SESSION['nom'] = $_POST['ls-name'];
                $_SESSION['gender'] = $_POST['menu'];
                $_SESSION['email'] = $_POST['email'];
                header('location: registerSecurity.php');
			}
        
            if(isset($_POST['submitLogin']))
            {
                header('Location: login.php');
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
            <form action="" method="post" onSubmit="return formValidation();">
                <!-- titre -->
                <div class="titre" style="text-align:-webkit-center;text-align:-moz-center;text-align:center;margin-bottom:5%">
                    <h5  style="font-size:250%;color:#54C5FF;">Sign <span style="color:#5a4e97">Up</span></h5>
                </div>
                <!-- Pseudo -->
                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" id="pseudoScript" name="pseudo" placeholder="Pseudo" class="form-control">
                    </div>         
                </div>
                <!-- First name -->
                <div class="form-group">
                    <label for="fs-name">First name</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">F</span>
                        </div>
                        <input type="text" name="fs-name" id="fs-nameScript" placeholder="First name" class="form-control">
                    </div>
                </div>
                 <!-- Last name -->
                <div class="form-group">
                    <label for="ls-name">Last name</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">L</span>
                        </div>
                        <input type="text" name="ls-name" id="ls-nameScript" placeholder="Last name" class="form-control">
                    </div>
                </div>
                <!-- Gender -->
                <div class="form-group">
                    <label for="menu">Gender</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-transgender"></i></span>
                        </div>
                        <select name="menu" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email address</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" name="email" id="emailScript" placeholder="email" class="form-control">
                    </div>
                </div>
                <!-- btn -->
                <div class="form-group" style="text-align:-webkit-center;text-align:-moz-center;text-align:center;width:100%">
                    <input type="submit" name="submitNext" value="Next" class="btn btn-primary btn-lg" style="background-color:#5a4e97;width:40%">
                    <button type="submit" name="submitLogin" class="btn btn-outline-primary btn-lg" style="width:40%">Login</button>
                </div>
            </form>
		</div>
	</body>

<script>

    function formValidation(){

        //ila kan chi input khawi kanraj3o men lawal
        if (document.getElementById("pseudoScript").value==="" || document.getElementById("fs-nameScript").value==="" || document.getElementById("ls-nameScript").value==="" || document.getElementById("emailScript").value ===""){
            alert("you didnt put all your information")
            return false;
        }

        //hna kan3ayat 3la ga3 les functions ila chi wahada raj3at false ...
        if (pseudo_validation(document.getElementById("pseudoScript").value,5,12)===false|| allLetter(document.getElementById("fs-nameScript"))===false|| allLetter(document.getElementById("ls-nameScript"))===false  || ValidateEmail(document.getElementById("emailScript").value)===false){
            console.debug("here");
            return false;
        }

        return true;
    }

    // pseudo makhasoch ikon srir 3la my ou ola kbar men mx
    function pseudo_validation(uid,mx,my)
    {
        var uid_len = uid.length;
        if (uid_len == 0 || uid_len >= my || uid_len < mx)
        {
            alert("User Id should not be empty / length be between "+mx+" to "+my);
            document.getElementById("pseudoScript").focus();
            return false;
        }
        return true;
    }


    //smiya ou lakniya khas ikono string
    function allLetter(uname)
    {
        var letters = /^[A-Za-z]+$/;
        if(uname.value.match(letters))
        {
            return true;
        }
        else
        {
            alert('first and last name must have alphabet characters only');
            uname.focus();
            return false;
        }
    }

    function ValidateEmail(uemail)
    {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(uemail.match(mailformat))
        {
            return true;
        }
        else
        {
            alert("You have entered an invalid email address!");
            document.getElementById("emailScript").focus();
            return false;
        }
    }

</script>
</html>