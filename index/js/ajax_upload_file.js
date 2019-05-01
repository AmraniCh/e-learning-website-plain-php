$(document).ready(function(){
    
    $(document).on('change', '#file_course', function(){
        var name = document.getElementById("file_course").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        /*if(jQuery.inArray(ext, ['png','jpg','jpeg']) == -1) 
        {
            alert("Invalid Image File");
            return false;
        }*/
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("file_course").files[0]);
        var f = document.getElementById("file_course").files[0];
        var fsize = f.size||f.fileSize;
        if(fsize > 5000000)
        {
            alert("Image File Size is very big");
            return false;
        }
        else
        {
            // get type file from current page using function
            var page_name = get_page_name(window.location.pathname);
            switch(page_name){
                case "courses.php":
                    type = "course";break;
                case "exams.php":
                    type = "exercice";break;
                default: type = "autre";
            }
            
            // formdata parameters
            form_data.append("file", document.getElementById('file_course').files[0]);
            form_data.append("type", type);
            $.ajax({
                url:"../includes/upload_file.php",
                method:"POST",
                data: form_data,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('#file_container').prepend("<div class='loading col-xs-6 col-sm-4 col-md-2 col-lg-3 text-center' style='height:auto;margin-top:20px;padding:0'><img style='width:50%;' class='avatar border-gray' src='../assets/icons/Rolling-1s-20px.svg' alt='...'/></div>");
                },   
                success:function(data){
                    $('#file_container').html(data);  
                }
            });
            // refersh courses counts
            $.ajax({
                url: "../includes/files_count.php",
                method:"POST",
                data: form_data,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    $('.courses_count').html("<img style='' class='avatar border-gray' src='../assets/icons/Rolling-1s-20px.svg' alt='...'/>");
                },   
                success:function(data){
                    $('.courses_count').html(data + " Courses");
                }
            });
        }
    });
});
