$(document).ready(function() {
    
    $(document).on("click",".btn-delete",function(){
        
        var grp_id = $(this).attr("id");
        
        $.ajax({
            url: "includes/edit_delete_groupe.php",
            method: "POST",
            data: {grp_id: grp_id},
            success: function(){
                $("#groups-content").load(" #groups-content");
                $(".courses_count").load(" .courses_count");
            }
        }); 
    });   
});

    