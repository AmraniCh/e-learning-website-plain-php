    <!-- include header -->
    <?php
        include '../includes/header.php';     
    ?>
    <?php

        if(isset($_GET['user']))
        {
            image_query();
            $pseudo = $_GET['user'];
            if(!empty($pseudo) && $pseudo == $_SESSION['user'])
            {
                $res = select_home_query('*','professeur','pseudo_prof',$pseudo);
                $count_student = mysqli_num_rows($res);
                $row = mysqli_fetch_assoc($res);
                // get image name
                $imageName = $row['image_prof'];
                // get groupe id using function
                 $grp_id = get_grpId_byProf($row['pseudo_prof']);
    ?>
    <div class="wrapper">
        <!-- include sidebar --> 
        <?php include 'includes/sidebar.php'; ?>

        <div class="main-panel">

        <!-- include top navigation -->
        <?php include '../includes/top_nav.php'; ?>

            <!-- content -->
            <div class="content">
                <div id="container-fluid" class="container-fluid">
                    <div id="top-panel" class="top-panel row">
                        <span class="courses_count" style="line-height:40px;font-size:x-large;">
                            <?php 
                            $res = mysqli_query($con,"select count(nom) from fichier WHERE groupe_id = '$grp_id' ");
                            $row = mysqli_fetch_assoc($res);
                            echo $row['count(nom)']; 
                        ?> Courses</span>
                        <div class="file-controls" style="display:none;">
                            <button type="button" id="delete-button" class="btn btn-primary">
                                Delete All
                            </button>
                            <label id="file-button" class="btn btn-default btn-file">
                                Upload new course <input type="file" id="file_course" style="display: none;">
                            </label>
                        </div>
                    </div>
                    <div class="line"></div>
                    <?php 
                        // get group count
                        $grp_count = get_group_count($pseudo);
                        // if count = 0 => show notification no groupe founded
                        if($grp_count == 0)
                            echo '<script>
                            load_add_groupe_notification();
                            </script>
                            ';
                        else
                        {
                            $grp_id = get_grpId_byProf($pseudo);
                            $current_page = get_pageName();
                            $files = load_coures_query($grp_id,$current_page);
                            if($files[0] != null){
                                foreach ($files as $file) {
                                    echo $file;
                                }
                            }
                        }
                    ?>
                    <script>
                        // click add groupe => load group form for add group
                        $(document).ready(function() {
                            $(document).on("click", "#btn-load-groupe-form", function() {
                                $(".msg-container").css("display", "none");
                                $("#top-panel").css("display", "none");
                                $(".line").css("display", "none");
                                load_add_groupe_form();
                            });
                        });
                    </script>
                    <div id="file_container">
                        <!-- download animation -->
                        <script>
                            $(document).ready(function() {
                                $(".btn-download").click(function(e) {
                                    downloadAnimation(e);
                                });
                            });
                        </script>
                    </div>
            </div>
        </div>
    </div>
    <?php 
            }
            else 
                header ('location: ../login.php');
        }
        else
            redirect_url('home.php');
    ?>

    <!-- include footer -->
    <?php include '../includes/footer.php'; ?>
