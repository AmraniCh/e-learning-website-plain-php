/*********************************
    START COOKIES FUNCTIONS
**********************************/

function setCookie(key, value) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}

/*********************************
    END COOKIES FUNCTIONS
**********************************/

/*********************************
     START VALIDATION FUNCTIONS
**********************************/

// check if all letters are string words
function allLetters(name)
{
    var letters = /^[A-Za-z]+$/;
    if(name.val().match(letters))
        return true;
    else
        return false;  
}

function allLettersWithSpace(name)
{
    var letters = /^[A-Za-z\s]+$/g;
    if(name.val().match(letters))
        return true;
    else
        return false;
}

// check if email is valid
function validEmail(email)
{
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.val().match(mailformat))
        return true;
    else
        return false;
}

// Validate numbers
function validNumber(number)
{
    var numbers = /[0-9]/g;
    if(number.val().match(numbers))
        return true;
    else
        return false;
}

// Validate length
function validLength(element, min, max)
{
    if(element.val().length >= min && element.val().length <= max) 
        return true;
    else 
        return false;   
}

// Validate lowercase letters
function check_lowercaseLetters(element_id)
{
    var lowerCaseLetters = /[a-z]/g;
    if(!(element_id.val().match(lowerCaseLetters)))
        return true;
    else
        return false;
}
    
// Validate uppercase letters
function check_uppercaseLetters(element_id)
{
    var upperCaseLetters = /[A-Z]/g;
    if(!(element_id.val().match(upperCaseLetters)))
        return false;
    else
        return true;
}

// show error_msg
function show_msg(id_small_error, msg, input_selector)
{           
    $("#" + id_small_error).html(msg);
    $("#" + id_small_error).show();
    input_selector.css("background-color","#f7c4cb");
}
     
// hide error_msg
function hide_msg(element_id, input_color)
{
    $("#" + element_id).hide();
    input_color.css("background-color","#fff");
}

function check_numberPhone(number) {
    let numberPhone = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/g;

    if((number.val().match(numberPhone)))
        return true;
    else
        return false;
}

/*********************************
    END VALIDATION FUNCTIONS
**********************************/

// subtruct titles
function subtruct_title(){ 
    var titles = $(".title");
    for(title of titles){
        if($(title).html().length > 25){
            var new_title = $(title).html().substr(0,25)+" ...";
            $(title).replaceWith(new_title);
        }
    }
}

// download animation control
function downloadAnimation(e){
    // buttons list
    var btns = $(".btn-download");
    // default status
    for(b of btns){
    $(b).css("background-color","#333");
    }
    // hidden clicked button
    $(e.target).hide();
    // conatiner file < element < element < btn
    var container = $(e.target).parent().parent().parent();
    // conatiner file > ms_container
    var ms_container = $(container).children("#ms-container");
    $(ms_container).toggle("slide"); 
    
    window.setTimeout(function() {
        $(ms_container).hide();
        $(e.target).show();
    }, 5000);
}

// add groupe notification
//there is a mistake here , near -ms-center , try to fix it  386d0ce35a492fdcff0e48e1e8193b8702deaa17
function load_add_groupe_notification() {
    $("#file_container").css("display", "none");
    $("#container-fluid").append("<div class='msg-container container-fluid text-center'><div class='msg-container'><div id='error-msg'><h3>no files founded Please Create A New Group</h3></div><div id='not-found-image' style='text-align: center;text-align: -webkit-center;text-align: -moz-center;text-align: -ms-center;margin-bottom:1%'><img class='img-responsive' src='../assets/icons/exclamation-mark.png'></div><div id='btn-group'><a href='#'><button type='button' id='btn-load-groupe-form' class='btn btn-primary'>Create groupe</button></a></div></div></div>");
}

// add groupe div
function load_add_groupe_form() {
    $("#container-fluid").html("<div class='grp-add-container col-12 col-sm-12 col-md-6'><div class='grp-add-second-container container-fluid text-center'><div class='img-add-group'><img class='img-responsive' style='width:45%' src='../assets/icons/group.png'></div><div class='form-group'><label for='grp-name'>Group name : </label><input type='text' id='grp-name' class='form-control'></div><div class='form-group'><label for='grp-name'>Description : </label><input type='text' id='grp-desc' class='form-control'></div><div class='add-group from-group'><label for='file_image'>Group picture</label><input type='file' id='file_image' class='btn btn-primaty' style=''></div><div class='form-group'><button type='button' id='btn-add-group' class='btn btn-primary'>Add group</button></div></div></div></div>");
}
