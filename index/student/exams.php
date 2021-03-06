    <!-- include header -->
    <?php
        include '../includes/header.php';     
    ?>
    <?php
        if(isset($_GET['user']))
        {
            
            $username = $_GET['user'];
            if(!empty($username) && $username == $_SESSION['user'])
            {
                $row = select_index_query('*','etudient','pseudo_etu',$username);
                // get groupe id
                $grp_id = $row['groupe_id'];
        ?>
        <div class="wrapper">
       
            <div class="main-panel">
            
            <!-- include top navigation -->
            <?php include '../includes/top_nav.php'; ?>
                
            <!-- include sidebar --> 
            <?php include '../includes/sidebar.php'; ?>

        <!-- content -->
        <div class="content">
            <div class="container-fluid">
               <div class="top-panel row">
                   <span class="courses_count" style="line-height:40px;font-size:x-large;"><?php echo get_files_count($current_page = get_pageName(), $grp_id); ?> Exams</span>
                   <div class="file-controls" style="display:none">
                      <button type="button" id="delete-button" class="btn btn-primary">
                            Delete All
                        </button>
                       <label id="file-button" class="btn btn-default btn-file">
                            Upload new exam <input type="file" id="file_course" style="display: none;">
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
                        $files = load_files_query($grp_id,'exercice',$current_page);
                        if($files[0] != null){
                            foreach ($files as $file) {
                               echo $file;
                            }     
                        }
                    ?>
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
