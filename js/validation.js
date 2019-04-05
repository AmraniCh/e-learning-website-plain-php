$(function() {
	// login.php validation
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
        else {
			$("#pseudo_error_msg").hide();
		}
	}

    function check_password() {
    
        var password_length = $("#password").val().length;
        if(password_length < 10 || password_length > 40) {
            $("#password_error_msg").html("Password should be between 10-40 characters");
            $("#password_error_msg").show();
            password_error = true;
        } 
        else {
            $("#password_error_msg").hide();
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

	});

    // register.php validation
});