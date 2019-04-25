$(document).ready(function(){
    $("#country").val(vall);
});


$("#fname").focusout(function(){
    hide_msg("fname_error_msg",$("#fname"));
    if(!allLettersWithSpace($("#fname")))
        show_msg("fname_error_msg","your first name must contain only letters",$("#fname"));
});


$("#lname").focusout(function(){

    hide_msg("lname_error_msg",$("#lname"));

    if(!allLettersWithSpace($("#lname"))){
        show_msg("lname_error_msg","your last name must contain only letters",$("#lname"));
    }

});


$("#city").focusout(function(){
    hide_msg("city_error_msg",$("#city"));

    if(!allLettersWithSpace($("#city"))){

        show_msg("city_error_msg","you have to put a correct city",$("#city"));
    }

});

$("#phone").focusout(function(){
    hide_msg("phone_error_msg",$("#phone_error_msg"));


    if(!check_numberPhone($("#phone"))){
        show_msg("phone_error_msg","put your correct number",$("#phone_error_msg"));
    }

});
