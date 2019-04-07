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
            show_msg("pseudo_error_msg", "Username should be between 6-20 characters");
		    username_error = true;
		  }
        else
        {
            username_error = false;
            hide_msg("pseudo_error_msg");
        }
    }

    function check_password() {
    
        var password_length = $("#password").val().length;
        if(password_length < 10 || password_length > 40) {
            show_msg("password_error_msg", "Password should be between 10-40 characters");
            password_error = true;
        }
        else{
            password_error = false;
            hide_msg("password_error_msg");
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
            error_color(pseudo);
            $("#pseudo_register__error_msg").html("Username should be between 6-20 characters");
            $("#pseudo_register__error_msg").show();
            username_error = true;
        }
        else
        {
            username_error = false;
            normal_color(pseudo);
            $("#pseudo_register__error_msg").hide(); 
        }
    }
    
    // first name
    function check_fname()
    {   
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
            fname_error = false;
            $("#fname_error_msg").hide();
            normal_color(fname);
        }
    }
    
    // last name
    function check_lname()
    { 
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
            lname_error = false;
            normal_color(lname);
            $("#lname_error_msg").hide();
        }
    }

    function check_email()
    {        
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
            email_error = false;
            normal_color(email);
            $("#email_error_msg").hide();
        }
    }
    
    // submit
    $("#register_form").submit(function() {
        
		if(username_error == false && fname_error == false && lname_error == false && email_error == false)
            return true;
        else
        {
            check_username();
            check_fname();
            check_lname();
            check_email();
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
            if(check_lowercaseLetters(input) == true){
                alert();
                show_msg("pass1_error_msg", "invalid password must contain lower Letter");

            }
            else
                hide_msg("pass1_error_msg");
         
            

            if(check_uppercaseLetters(input) == true){
                show_msg("pass1_error_msg", "invalid password must contain capital Letter");

            }
            else
                hide_msg("pass1_error_msg");
         
            

            if(validNumber(input) == false){
                show_msg("pass1_error_msg", "invalid password must contain numbers");

            }
            else
                hide_msg("pass1_error_msg");
  
            

            if(validLength(input,8,30) == false){
                show_msg("pass1_error_msg", "invalid password length must be between 8 and 30");
     
            }
            else
                hide_msg("pass1_error_msg");
            
            

        }
        /*if(idInput == "pass2"){
            
            if(check_lowercaseLetters(input) == true)
                show_msg("pass2_error_msg", "invalid password must contain lower Letter");
            else
                hide_msg("pass2_error_msg");

            if(check_uppercaseLetters(input) == true)
                show_msg("pass2_error_msg", "invalid password must contain capital Letter");
            else
                hide_msg("pass2 _error_msg");

            if(validNumber(input) == false)
                show_msg("pass2_error_msg", "invalid password must contain numbers");
            else
                hide_msg("pass2 _error_msg");

            if(validLength(input,8,30) == false)
                show_msg("pass2_error_msg", "invalid password length must be between 8 and 30");
            else
                hide_msg("pass2 _error_msg");
            
            // check if password similar 
            if($("#pass1").val() != input.val()){
               show_msg("pass2_error_msg", "password does not match");
                error_color($("#pass2"));
            }
            else{
                hide_msg("pass2 _error_msg");
                pass_match_error = false;
            }
        }*/
    }
    /*
    function checkAnswer()
    {
        var answer = $("#answer");
        if((validLength(answer,3,30) == false))
            show_msg("answer_error_msg", "invalid answer must be between 3 and 30 characters");
        else{
            hide_msg("answer_error_msg");
            answer_error = false;
        }
    }
  
    $("#register_security_form").submit(function() {
        
		if(pass1_error == false && pass_match_error == false && answer_error == false)
            return true;
        else
        {
            checkPassword($("#pass1"));
            checkPassword($("#pass2"));
            checkAnswer();
            return false;
        }
    		
	});*/
    
});
