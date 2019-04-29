$(document).ready(function () {
    $(document).on("change", "#list-groupe", function () {
        var grp_id = $("#list-groupe option:selected").val(); 
        $.ajax({
            url: "includes/change_groupe.php",
            method: "POST",
            data: {grp_id: grp_id},
            success: function(){
                location.reload();
            } 
        });
    });
});