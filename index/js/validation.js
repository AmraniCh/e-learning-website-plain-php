$(document).ready(function(){
    $("#country").val(vall);
});

function checkFname(){
    hide_msg("fname_error_msg",$("#fname"));
    if(!allLettersWithSpace($("#fname")))
        show_msg("fname_error_msg","your first name must contain only letters",$("#fname"));
}


$("#fname").focusout(checkFname);


function checkLname(){
    hide_msg("lname_error_msg",$("#lname"));
    if(!allLettersWithSpace($("#lname")))
        show_msg("lname_error_msg","your last name must contain only letters",$("#lname"));
}

$("#lname").focusout(checkLname);

function checkCity(){
    hide_msg("city_error_msg",$("#city"));
    if(!allLettersWithSpace($("#city")))
        show_msg("city_error_msg","you have to put a correct city",$("#city"));
}

$("#city").focusout(checkCity);

function checkPhone(){
    hide_msg("phone_error_msg",$("#phone_error_msg"));


    if(!check_numberPhone($("#phone"))){
        show_msg("phone_error_msg","put your correct number",$("#phone_error_msg"));
    }

}

$("#phone").focusout(checkPhone);


$("#profile").submit(
    function ValidationUpdateProfile (){
        var isVisible = $('#fname_error_msg').is(':visible');
        var isHidden = $('#fname_error_msg').is(':hidden');

        alert(isVisible);
        alert(isHidden);

        /*
    if (!$("#phone_error_msg").hidden||!$("#city_error_msg").hidden||!$("#lname_error_msg").hidden||!$("#fname_error_msg").hidden){
        alert($("#phone_error_msg").hidden+$("#city_error_msg").hidden+$("#lname_error_msg").hidden+$("#fname_error_msg").hidden);
    }
    */
        }
        );

