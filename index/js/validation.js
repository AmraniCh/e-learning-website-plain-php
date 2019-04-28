$(document).ready(function(){
    $("#country").val(vall);
});

function checkFname(){
    hide_msg("fname_error_msg",$("#fname"));
    if(!allLettersWithSpace($("#fname")))
        show_msg("fname_error_msg","your first name must contain only letters",$("#fname"));
}

function checkLname(){
    hide_msg("lname_error_msg",$("#lname"));
    if(!allLettersWithSpace($("#lname")))
        show_msg("lname_error_msg","your last name must contain only letters",$("#lname"));
}

function checkCity(){
    hide_msg("city_error_msg",$("#city"));
    if(!allLettersWithSpace($("#city")))
        show_msg("city_error_msg","you have to put a correct city",$("#city"));
}

function checkPhone(){
    hide_msg("phone_error_msg",$("#phone_error_msg"));
    if(!check_numberPhone($("#phone")))
        show_msg("phone_error_msg","put your correct number",$("#phone_error_msg"));
}

$("#fname").focusout(checkFname);
$("#lname").focusout(checkLname);
$("#city").focusout(checkCity);
$("#phone").focusout(checkPhone);

$("#profile").submit( function () {
    if ($('#fname_error_msg').attr("style")==''||$('#lname_error_msg').attr("style")==''||$('#city_error_msg').attr("style")==''||$('#phone_error_msg').attr("style")=='background-color: rgb(247, 196, 203);')
        return false;
        return true;
    }
);


