// login.php validation
$(function() {

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
        else
            $("#pseudo_error_msg").hide();
    }

    function check_password() {
    
        var password_length = $("#password").val().length;
        if(password_length < 10 || password_length > 40) {
            $("#password_error_msg").html("Password should be between 10-40 characters");
            $("#password_error_msg").show();
            password_error = true;
        }
        else
            $("#password_error_msg").hide();
    }

    // submit
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

	});

    
});

// register.php validation
$(function(){
    
    $("#pseudo_register__error_msg").hide();
	$("#fname_error_msg").hide();
    $("#lname_error_msg").hide();
    $("#gender_error_msg").hide();
    $("#email_error_msg").hide();
    
    var username_error = false;
    var fname_error = false;
    var lname_error = false;
    var email_error = false;
    
    $("#pseudoRegister").focusout(function() {

		check_username();
		
	});

    $("#fname").focusout(function() {
        
        check_fname();
        
    });
    
    $("#lname").focusout(function() {
        
        check_lname();
        
    });
    
    $("#email").focusout(function() {
        
        check_email();
        
    });

    
    // pseudo 
    function check_username()
    {
        var peseudo_len = $("#pseudoRegister").val().length;
        var pseudo = $("#pseudoRegister");
        
        if (peseudo_len < 6 || peseudo_len >= 20)
        {  
            error_color(pseudo);
            $("#pseudo_register__error_msg").html("Username should be between 6-20 characters");
            $("#pseudo_register__error_msg").show();
            username_error = true;
        }
        else
        {
            normal_color(pseudo);
            $("#pseudo_register__error_msg").hide();   
        }
    }
    
    // first name
    function check_fname()
    {
        var fname = $("#fname");
        
        if($("#fname").val().length < 3)
        {
            error_color(fname);
            $("#fname_error_msg").html("First name should be between 3-20 characters");   
            $("#fname_error_msg").show();
            fname_error = true;
        }
        else if(allLetters(fname) == false)
        {
            error_color(fname);
            $("#fname_error_msg").html("First name should be not contain numbers");   
            $("#fname_error_msg").show();
            fname_error = true;
        }
        else
        {
            $("#fname_error_msg").hide();
            normal_color(fname);
        }
    }
    
    // last name
    function check_lname()
    {
        var lname = $("#lname");
        
        if($("#lname").val().length < 3)
        {
            error_color(lname);
            $("#lname_error_msg").html("Last name should be between 3-20 characters");   
            $("#lname_error_msg").show();
            lname_error = true;
        }
        else if(allLetters(lname) == false)
        {
            error_color(lname);          
            $("#lname_error_msg").html("Last name should be not contain numbers");   
            $("#lname_error_msg").show();
            lname_error = true;
        }
        else
        {
            normal_color(lname);
            $("#lname_error_msg").hide();
        }
    }

    function check_email()
    {
        var email = $("#email");
        
        //email
        if(validEmail(email) == false)
        {
            error_color(email); 
            $("#email_error_msg").html("Please enter an invalid email address!");  
            $("#email_error_msg").show();
            email_error = true;
        }
        else
        {
            normal_color(email);
            $("#email_error_msg").hide();
        }
    }
    
    // submit
    $("#register_form").submit(function() {
											
		username_error = false;
		fname_error = false;
        lname_error = false;
        email_error = false;
											
		check_username();
		check_fname();
        check_lname();
        check_email();

		
		if(username_error == false && fname_error == false && lname_error == false && email_error == false)  
			return true; 
        else
			return false;	

	});
    
});
