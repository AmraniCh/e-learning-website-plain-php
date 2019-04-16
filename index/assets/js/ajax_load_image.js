$(document).ready(function(){
    $(document).on('change', '#file_image', function(){
        var name = document.getElementById("file_image").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1) 
        {
            alert("Invalid Image File");
            return false;
        }
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("file_image").files[0]);
        var f = document.getElementById("file_image").files[0];
        var fsize = f.size||f.fileSize;
        if(fsize > 2000000)
        {
            alert("Image File Size is very big");
            return false;
        }
        else
        {
            form_data.append("file", document.getElementById('file_image').files[0]);
            $.ajax({
                url:"includes/upload_right_image_profile.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                    $('#uploaded_image').html("<img class='avatar border-gray' src='assets/icons/Rolling-1s-20px.svg' alt='...'/>");
                },   
                success:function(data){
                    $('#uploaded_image').html(data);
                }
            });
            $.ajax({
                url:"includes/upload_left_image_profile.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                    $('#profile-img').replaceWith("<div id='profile-img' class='profile-img' id='profile-img' style='background-image: url(assets/icons/Rolling-1s-20px.svg)'></div>");
                },   
                success:function(data){
                    $('#profile-img').replaceWith(data);
                }
            });
        }
    });
});