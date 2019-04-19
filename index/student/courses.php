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
                $res = select_home_query('*','etudient','pseudo_etu',$pseudo);
                $count_student = mysqli_num_rows($res);
                $row = mysqli_fetch_assoc($res);
                // get groupe name by id
                $grp_name = get_groupeName($row['groupe_id']);
                // get image name
                $imageName = $row['image_etu'];
                // get groupe id
                $grp_id = $row['groupe_id'];
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
                       <!-- download animation -->
                        <script>
                            $(document).ready(function(){     
                                $(".btn-download").click(function(e){
                                    downloadAnimation(e);                     
                                });
                            });
                        </script>
                        <!-- load courses -->
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
                </div>
            </div>
        </div>
        <?php 
                    }
                    else 
                    header ('location: ../../login.php');
                }
                else
                    redirect_url('home.php');
        ?>

    <!-- include footer -->
    <?php include 'includes/footer.php'; ?>
