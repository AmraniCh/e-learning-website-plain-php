$(document).ready(function(){
    // get last selected groupe in group menu --> add this one in -groupe-historique- table
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