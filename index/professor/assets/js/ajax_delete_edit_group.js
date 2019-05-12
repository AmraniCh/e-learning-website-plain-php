$(document).ready(function() {
    
    $(document).on("click",".btn-delete",function(){
        
        var grp_id = $(this).attr("id");
        var deleted_grp_name = $(this).parent().parent().children("#nom-group-td").html();
        var actual_grp_name = $(".groupe-text").html();
        $.ajax({
            url: "includes/edit_delete_groupe.php",
            method: "POST",
            data: {grp_id: grp_id},
            success: function(){
                if(deleted_grp_name != actual_grp_name){
                $("#groups-content").load(" #groups-content");
                $(".courses_count").load(" .courses_count");
                }
                else
                    location.reload();         
            }
        }); 
    });   
});

    