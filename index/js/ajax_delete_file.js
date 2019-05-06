$(document).ready(function() {
    
    $(document).on('click','.delete_file',function(){
        // get type file from current page using function
        var page_name = get_page_name(window.location.pathname);
        var type = null;
        switch (page_name) {
            case "courses.php":
                type = "course";
                break;
            case "exams.php":
                type = "exercice";
                break;
            default:
                type = "autre";
        }
        var file_name = $(this).attr("id");
        // delete file from database
        $.ajax({
            url: "../includes/delete_file.php",
            method: "POST",
            data: {file_name: file_name, type: type},
            beforeSend: function(){
              $('.delete_file').replaceWith("<img style='float:right' class='avatar border-gray' src='../assets/icons/Rolling-1s-20px.svg' alt='...'/>");  
            },
            success: function(data){
                $("#file_container").html(data);
            }
        });
        // refersh courses counts
       $.ajax({
            url:"../includes/files_count.php",
            method: "POST",
            data: {type: type},
            beforeSend:function(){
                $('.courses_count').html("<img style='' class='avatar border-gray' src='../assets/icons/Rolling-1s-20px.svg' alt='...'/>");
            },   
            success:function(data){
                if(type == "course")
                    $('.courses_count').html(data + "Courses");
                else if(type == "exercice")
                    $('.courses_count').html(data + "Exams");
                else
                    $('.courses_count').html(data + "Files");
            }
        });
    });   
});

    