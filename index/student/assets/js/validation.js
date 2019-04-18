
$("#fnamejs").focusout(function(){
if(allLetters($("#fnamejs"))){
    hide_msg();
}
show_msg();

});

$("#lnamejs").focusout(function(){
    if(allLetters($("#lnamejs"))){
        hide_msg();
    }
    show_msg();
});

$("#cityjs").focusout(function(){
    if(allLetters($("#cityjs"))){
        hide_msg();
    }
    show_msg();
});

$("#countryid").focusout(function(){
    if(allLetters($("#countryid"))){
        hide_msg();
    }
    show_msg();
});

$("#phonejs").focusout(function(){
    if(check_numberPhone($("#phonejs"))){
        hide_msg();
    }
    show_msg();
});
