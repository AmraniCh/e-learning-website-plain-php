$(document).ready(function() {
    
    $(document).on('click','#delete-button',function(){
        $.ajax({
            url: "includes/delete_all_coursess.php",
            method: "POST",
            data: {},
            beforeSend: function(){
              $('#file_container').html("<div class='loading col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center' style='height:auto;margin-top:30px;padding:0'><img style='width:20%;' class='avatar border-gray' src='../assets/icons/Rolling-1s-20px.svg' alt='...'/></div>");
            },
            success: function(data){
                $("#file_container").html(data);
            }
        });
        $.ajax({
            url:"includes/refresh_courses_count.php",
            data: {},
            beforeSend:function(){
                $('.courses_count').html("<img style='' class='avatar border-gray' src='../assets/icons/Rolling-1s-20px.svg' alt='...'/>");
            },   
            success:function(data){
                    $('.courses_count').html(data + " Courses");
            }
        });
    });   
});

    