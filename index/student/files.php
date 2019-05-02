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
                $row = select_index_query('*','etudient','pseudo_etu',$pseudo);
                // get groupe id
                $grp_id = $row['groupe_id'];
    ?>
    <div class="wrapper">
       
        <!-- include sidebar --> 
        <?php include '../includes/sidebar.php'; ?>

        <div class="main-panel">

        <!-- include top navigation -->
        <?php include '../includes/top_nav.php'; ?>

        <!-- content -->
        <div class="content">
            <div class="container-fluid">
               <div class="top-panel row">
                   <span class="courses_count" style="line-height:40px;font-size:x-large;"><?php echo get_files_count($current_page = get_pageName(), $grp_id); ?> Files</span>
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
                        $files = load_coures_query($grp_id,'autre',$current_page);
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
    <?php include '../includes/footer.php'; ?>
