$(document).ready(function() {
    
    $(document).on('click','.delete_file',function(){
        var file_name = $(this).attr("id");
        // delete file from database
        $.ajax({
            url: "includes/delete_course_file.php",
            method: "POST",
            data: {file_name: file_name},
            beforeSend: function(){
              $('.delete_file').replaceWith("<img style='float:right' class='avatar border-gray' src='assets/icons/Rolling-1s-20px.svg' alt='...'/>");  
            },
            success: function(data){
                $("#file_container").html(data);
            }
        });
        // refersh courses counts
       $.ajax({
            url:"includes/refresh_courses_count.php",
            method:"POST",
            data: {},
            beforeSend:function(){
                $('.courses_count').html("<img style='' class='avatar border-gray' src='assets/icons/Rolling-1s-20px.svg' alt='...'/>");
            },   
            success:function(data){
                    $('.courses_count').html(data + " Courses");
            }
        });
    });   
});

    