    <!-- include header -->
    <?php
        include 'includes/header.php';     
    ?>
    <?php
        if(isset($_GET['user']))
        {
            image_query();
            $pseudo = $_GET['user'];
            if(!empty($pseudo) && $pseudo == $_SESSION['user'])
            {
                $plan = $_SESSION['plan'];
                if($plan == 'student'){
                    $res = select_home_query('*','etudient','pseudo_etu',$pseudo);
                    $count_student = mysqli_num_rows($res);
                    $row = mysqli_fetch_assoc($res);
                    // get groupe name by id
                    $grp_name = get_groupeName($row['groupe_id']);
                    // get image name
                    $imageName = $row['image_etu'];
                    // get groupe id
                    $grp_id = $row['groupe_id'];
                }
                if($plan == 'professor'){
                    $res = select_home_query('*','professeur','pseudo_prof',$pseudo);
                    $count_prof = mysqli_num_rows($res);
                    $row = mysqli_fetch_assoc($res);
                    // get image name
                    $imageName = $row['image_prof'];
                    // get groupe id
                    $grp_id = $row['groupe_prof'];
                }   
                if($res != NULL)
                {
                    $image_dir = 'assets/images/';
                    if($imageName == 'user-male.png' || $imageName == 'user-female.png')
                        $image_dir = 'assets/images/default/';
    ?>
    <div class="wrapper">
      
        <!-- include sidebar --> 
        <?php include 'includes/sidebar.php'; ?>
   
        <div class="main-panel">
       
        <!-- include top navigation -->
        <?php include 'includes/top_nav.php'; ?>

        <!-- content -->
        <div class="content">
            <div class="container-fluid">
               <div class="top-panel row">
                   <span class="courses_count" style="line-height:40px;font-size:x-large;">
                   <?php 
                       
                        $res = mysqli_query($con,"select count(nom) from fichier WHERE groupe_id = '$grp_id' ");
                        $row = mysqli_fetch_assoc($res);
                        echo $row['count(nom)']; 
                    ?> Courses</span>
                   <div class="upload">
                      <button type="button" id="delete-button" class="btn btn-primary">
                            Delete All
                        </button>
                       <label id="file-button" class="btn btn-default btn-file">
                            Upload new course <input type="file" id="file_course" style="display: none;">
                        </label>
                    </div>
               </div>
               <div class="line"></div>
                 <div id="file_container">
                     
                 
                    <script>

                    $(document).ready(function(){     
                        $(".btn-download").click(function(e){
                            downloadAnimation(e);                     
                        });
                    });
                      
                    function downloadAnimation(e){
                        // buttons list
                        var btns = $(".btn-download");
                        // default status
                        for(b of btns){
                            $(b).css("background-color","#333");
                        }
                        // hidden clicked button
                        $(e.target).hide();
                        // conatiner file < element < element < btn
                        var container = $(e.target).parent().parent().parent();
                        // conatiner file > ms_container
                        var ms_container = $(container).children("#ms-container");
                        $(ms_container).toggle("slide");               
                        
                        window.setTimeout(function() {
                            $(ms_container).hide();
                            $(e.target).show();
                        }, 3000);
                    </script>
                   <?php
                        $current_page = get_pageName();
                        $files = load_coures_query($grp_id,$current_page);
                        if($files[0] != null){
                            foreach ($files as $file) {
                               echo $file;
                            }     
                        }
                    ?>
                </div>
                    <!-- 
                       <div class="file col-xs-4 col-sm-4 col-md-4 col-lg-2" style="border: 1px solid #ddd;height:auto;margin-top:20px;padding:0">
                        <div class="extension" style="height:200px;border:15px solid #414141;line-height:100px;text-align:center">
                            <h5 style="line-height: 150px;font-weight: bold;font-size: 380%;color:#414141">CSS</h5>
                        </div>
                        <div class="desc" style="padding:7px;color:#fff;background-color:#333">
                            <span id="title">Javaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</span>
                        </div>
                    </div> 
                        -->  
                    <!--   test
                    <div class="file col-xs-6 col-sm-4 col-md-2 col-lg-3" style="border:1px solid #ddd;height:200px;margin-top:20px;padding:0;position:relative;background-image: url(cloud/'.$file_name.');">
                            <div class="file-date" style="padding:7px;color:#fff;background-color:#333;opacity:0.7;width:100%">
                                <span id="date">time</span>
                                <a href="courses.php?name=<?php /*echo $file_name */ ?>"><i id="delete_file" style="float:right;font-size:large;" class="fas fa-times-circle"></i></a>
                            </div>
                            <div class="desc" style="padding:7px;color:#fff;background-color:#333;bottom:0;opacity:0.7;position:absolute;width:100%"><span id="title">title</span></div></div><script>subtruct_title("#title",25);</script> -->
                    
                </div>
            </div>
        </div>
        <?php 
                        }
                    }
                    else 
                    header ('location: ../login.php');
                }
                else
                    redirect_url('home.php');
        ?>

    <!-- include footer -->
    <?php include 'includes/footer.php'; ?>
