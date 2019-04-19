//get value of cookie by his name
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

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
function show_msg(element_id, msg, input_color)
{           
    $("#" + element_id).html(msg);
    $("#" + element_id).show();
    input_color.css("background-color","#f7c4cb");
}
     
// hide error_msg
function hide_msg(element_id, input_color)
{
    $("#" + element_id).hide(); 
    input_color.css("background-color","#fff");
}

function check_numberPhone(number) {
    let numberPhone = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/g;

    if(!(number.val().match(numberPhone)))
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

function load_add_groupe_notification() {
    $("#file_container").css("display", "none");
    $("#container-fluid").append("<div class='container-fluid text-center'><div class='msg-container'><div id='error-msg'><h3>no files founded Please Create A New Group</h3></div><div id='not-found-image' style='text-align: center;text-align: -webkit-center;text-align: -moz-center;text-align: -ms-center;margin-bottom:1%'><img class='img-responsive' src='../assets/icons/exclamation-mark.png'></div><div id='btn-group'><a href='#'><button type='button' id='btn-load-groupe-form' class='btn btn-primary'>Create groupe</button></a></div></div></div>");
}

function load_add_groupe_form() {
    $("#container-fluid").html("<div class='grp-add-container col-12 col-sm-12 col-md-6'><div class='container-fluid text-center'><div class='form-group'><label for='grp-name'>Group name : </label><input type='text' id='grp-name' class='form-control'></div><div class='form-group'><label for='grp-name'>Description : </label><input type='text' id='grp-desc' class='form-control'></div><div class='form-group'><button type='button' id='btn-add-group' class='btn btn-primary'>Add group</button></div></div></div></div>");
}
