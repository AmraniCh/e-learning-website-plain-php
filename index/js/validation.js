
$("#fname").focusout(function(){
    alert(allLetters($("#fname")));
    hide_msg();
    if(!allLetters($("#fname"))){
        show_msg("fname_error_msg","your first name must contain only letters",$("#fname"));
    }


});


$("#lname").focusout(function(){
    if(!allLetters($("#lname"))){

        show_msg("lname_error_msg","your last name must contain only letters",$("#lname"));
    }
    hide_msg();
});

$("#cityjs").focusout(function(){
    if(allLetters($("#cityjs"))){

        show_msg();
    }
    hide_msg();
});

$("#countryid").focusout(function(){
    if(allLetters($("#countryid"))){

        show_msg();
    }
    hide_msg();
});

$("#phonejs").focusout(function(){
    if(!check_numberPhone($("#phonejs"))){
        show_msg();
    }
    hide_msg();

});
