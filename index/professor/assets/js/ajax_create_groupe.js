$(document).ready(function() {
    
    $(document).on('click','#btn-add-group',function(e){
        var nom = $("#grp-name").val();
        var desc = $("#grp-desc").val();
        $.ajax({
            url: 'includes/add_group.php',
            method: 'POST',
            data: {nom: nom, desc: desc},
            beforeSend:function(){
                
            },
            success:function(data){
                alert();
                $("#container-fluid").html(data);
            }
        });
    });   
});

    