$(document).ready(function(){
    $("#list-groupe").on("change",function(){
                $.urlParam = function(name){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results==null) {
               return null;
            }
            return decodeURI(results[1]) || 0;
        }
                
        
        var group_id = $("#list-groupe option:selected").val();
        alert(group_id);
    });
});