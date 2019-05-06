$(document).ready(function () {
    // reload page with the new group informations and files --> insert the selected group in (groupe-historique) table
    $(document).on("change", "#list-groupe", function () {
        var grp_id = $("#list-groupe option:selected").val(); 
        $.ajax({
            url: "includes/change_group.php",
            method: "POST",
            data: {grp_id: grp_id},
            success: function(){
                location.reload();
            } 
        });
    });
});