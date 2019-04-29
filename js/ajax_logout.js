$(document).ready(function(){
    
    $("#logout").click(function(){
        var grp_id = $("#list-groupe option:selected").val();
        $.ajax({
            url:"../../includes/logout.php",
            method:"POST",
            data: {grp_id: grp_id},
            success:function(data){  
                 $("body").append(data);
            }
        });      
    });
});