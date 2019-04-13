$(document).ready(function(){
    $(document).on('change', '#file', function(){
        var name = document.getElementById("file").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1) 
        {
            alert("Invalid Image File");
            return false;
        }
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("file").files[0]);
        var f = document.getElementById("file").files[0];
        var fsize = f.size||f.fileSize;
        if(fsize > 2000000)
        {
            alert("Image File Size is very big");
            return false;
        }
        else
        {
            form_data.append("file", document.getElementById('file').files[0]);
            $.ajax({
                url:"includes/upload.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                    $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                },   
                success:function(data){
                    $('#uploaded_image').html(data);
                }
            });
        }
    });
});