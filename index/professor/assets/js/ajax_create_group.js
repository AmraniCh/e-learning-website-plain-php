$(document).ready(function() {
    
    $(document).on('click','#btn-add-group',function(){
        
        // file reader
        var file_reader = new FileReader();
        file_reader.readAsDataURL(document.getElementById("group-pic-file").files[0]);
        var file = document.getElementById("group-pic-file").files[0];
        // ajax data passing
        var form_data = new FormData();
        form_data.append("file", file);
        form_data.append("nom", $("#grp-name").val());
        form_data.append("desc", $("#grp-desc").val());
        // ajax request
        $.ajax({
            url: 'includes/add_group.php',
            method: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $(".groups-content").html("<div class='loading col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center' style='height:auto;margin-top:12%;padding:0'><div class='container' style='width:100%'><img style='width:10%' class='avatar border-gray' src='../assets/icons/Facebook-1s-200px.svg'/></div><div class='container' style='width:100%'><h5>Adding group ...</h5></div></div>");     
            },
            success:function(){
                window.setTimeout(function(){
                    location.reload();;},1500
                );
                
            }
        });
    });   
});

    