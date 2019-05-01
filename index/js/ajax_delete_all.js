$(document).ready(function() {
    
    $(document).on('click','#delete-button',function(){
        // get type file from current page using function
        var page_name = get_page_name(window.location.pathname);
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
        $.ajax({
            url: "../includes/delete_all.php",
            method: "POST",
            data: {type: type},
            beforeSend: function(){
              $('#file_container').html("<div class='loading col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center' style='height:auto;margin-top:30px;padding:0'><img style='width:20%;' class='avatar border-gray' src='../assets/icons/Rolling-1s-20px.svg' alt='...'/></div>");
            },
            success: function(data){
                $("#file_container").html(data);
            }
        });
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
                        $('.courses_count').html(data + "Other files");
            }
        });
    });   
});

    