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

// error color inputs && normal color inputs
function error_color(element)
{
    element.css("background-color","#f7c4cb");
}

function normal_color(element)
{
    element.css("background-color","#fff");
}

