// login.php validation
$(function() {

	$("#pseudo_error_msg").hide();
	$("#password_error_msg").hide();

    var password_error = true;
    var username_error = true;

	$("#pseudo").focusout(function() {

		check_username();
		
	});

    $("#password").focusout(function() {

        check_password();
        
    });


	function check_username() {
	
		var pseudo_length = $("#pseudo").val().length;
		if(pseudo_length < 6 || pseudo_length > 20) {
            show_msg("pseudo_error_msg", "Username should be between 6-20 characters", $("#pseudo"));
		    username_error = true;
		  }
        else
        {
            username_error = false;
            hide_msg("pseudo_error_msg", $("#pseudo"));
        }
    }

    function check_password() {
    
        var password_length = $("#password").val().length;
        if(password_length < 8 || password_length > 40) {
            show_msg("password_error_msg", "Password should be between 8-40 characters", $("#password"));
            password_error = true;
        }
        else{
            password_error = false;
            hide_msg("password_error_msg", $("#password"));
        }
    }

    // submit
    $("#login_form").submit(function() {
											
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
    
    var username_error = true;
    var fname_error = true;
    var lname_error = true;
    var email_error = true;
    
    var pseudo = $("#pseudoRegister");
    var email = $("#email");
    var fname = $("#fname");
    var lname = $("#lname");
    
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
        var peseudo_len = pseudo.val().length;
        
        if (peseudo_len < 6 || peseudo_len >= 20)
        { 
            show_msg("pseudo_register__error_msg", "Username should be between 6-20 characters", $("#pseudoRegister"));
            username_error = true;
        }
        else
        {
            username_error = false;
            hide_msg("pseudo_register__error_msg", $("#pseudoRegister"));
        }
    }
    
    // first name
    function check_fname()
    {   
        if($("#fname").val().length < 3)
        {
            show_msg("fname_error_msg", "First name should be between 3-20 characters", $("#fname"));
            fname_error = true;
        }
        else if(allLetters(fname) == false)
        {
            show_msg("fname_error_msg", "First name should not contain numbers or spaces", $("#fname"));
            fname_error = true;
        }
        else
        {
            fname_error = false;
            hide_msg("fname_error_msg", $("#fname"));
        }
    }
    
    // last name
    function check_lname()
    { 
        if($("#lname").val().length < 3)
        {
            show_msg("lname_error_msg", "Last name should be between 3-20 characters", $("#lname"));
            lname_error = true;
        }
        else if(allLetters(lname) == false)
        {        
            show_msg("lname_error_msg", "Last name should not contain numbers or spaces", $("#lname"));
            lname_error = true;
        }
        else
        {
            lname_error = false;
            hide_msg("lname_error_msg", $("#lname"));
        }
    }

    function check_email()
    {        
        //email
        if(validEmail(email) == false)
        {
            show_msg("email_error_msg", "Please enter an invalid email address!", $("#email"));
            email_error = true;
        }
        else
        {
            email_error = false;
            hide_msg("email_error_msg", $("#email"));
        }
    }
    
    // submit
    $("#register_form").submit(function() {
        
        check_username();
        check_fname();
        check_lname();
        check_email();
        
		if(username_error == false && fname_error == false && lname_error == false && email_error == false)
            return true;
        else
        {
            return false;
        }
    		
	});
    
});

// registerSecurity.php validation
$(function(){
   
    $("#pass1_error_msg").hide();
    $("#pass2_error_msg").hide();
    $("#answer_error_msg").hide();
    
    var pass1_error = true;
    var pass_match_error = true;
    var answer_error = true;
    
    $("#pass1").focusout(function(){ 
        checkPassword($("#pass1"));
    });
    
    $("#pass2").focusout(function(){
        checkPassword($("#pass2"));
    });
    
    $("#answer").focusout(function(){
        checkAnswer();
    });


    function checkPassword(input) {
    
        var idInput = input.attr('id');  
        if(idInput == "pass1")
        {
            if(validLength(input,8,40) == false){
                pass1_error = true;
                show_msg("pass1_error_msg", "ivalid password length must be between 8 and 30", $("#pass1"));   
            }
            else if(check_uppercaseLetters(input) == false){
                pass1_error = true;
                show_msg("pass1_error_msg", "invalid password must contain capital Letter", $("#pass1"));
            }
            else if(validNumber(input) == false){
                pass1_error = true;
                show_msg("pass1_error_msg", "invalid password must contain numbers", $("#pass1"));   
            }
            else if(check_lowercaseLetters(input) == true){
                pass1_error = true;
                show_msg("pass1_error_msg", "invalid password must contain lower Letter", $("#pass1"));
            }
            else{
                pass1_error = false;
                hide_msg("pass1_error_msg", $("#pass1"));
            }
            
        }
        if(idInput == "pass2" && idInput == "pass"){
            
            if($("#pass1").val() != $("#pass2").val()){
                pass_match_error = true;
                show_msg("pass2_error_msg", "password does not match", $("#pass2"));
            }
            else{
                pass_match_error = false;
                hide_msg("pass2_error_msg", $("#pass2"));
            }
        }
    }
    
    function checkAnswer()
    {
        var answer = $("#answer");
        if((validLength(answer,3,30) == false)){
            answer_error = true;
            show_msg("answer_error_msg", "invalid answer must be between 3 and 30 characters", $("#answer"));
        }
        else{
            hide_msg("answer_error_msg", $("#answer"));
            answer_error = false;
        }
    }
  
    $("#register_security_form").submit(function() {
        
        checkAnswer();
        checkPassword($("#pass1"));
        checkPassword($("#pass2"));
        
		if(pass1_error == false && pass_match_error == false && answer_error == false)
            return true;
        else
            return false; 		
	});
    
  
});
