    <!-- include header -->
    <?php
        include '../includes/header.php';     
    ?>
    <?php
        if(isset($_GET['user']) && isset($_SESSION['plan']) && isset($_SESSION['user']))
        {
            $get_username = $_GET['user'];
            if(!empty($get_username) && $get_username == $_SESSION['user'])
            {
                $row = select_index_query('*','professeur','pseudo_prof',$get_username);
    ?>
        <div class="wrapper">
        
            <div class="main-panel">
            
            <!-- include top navigation -->
            <?php include '../includes/top_nav.php'; ?>
                
            <!-- include sidebar --> 
            <?php include '../includes/sidebar.php'; ?>

            <!-- content -->
            <div class="content">
                <div id="files-container" class="container-fluid">
                    <div id="top-panel" class="top-panel row">
                        <span class="courses_count" style="line-height:40px;font-size:x-large;"><?php
                            if(isset($_SESSION['grp_id']))
                                echo get_files_count($current_page = get_pageName(), $_SESSION['grp_id']); ?> Courses</span>
                        <div class="file-controls" style="display:none">
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
                        <?php 
                            if(isset($_SESSION['grp_id'])){
                                $current_page = get_pageName();
                                $files = load_files_query($_SESSION['grp_id'],'course',$current_page);
                                if($files[0] != null){
                                    foreach ($files as $file) {
                                        echo $file;
                                    }
                                }
                            }  
                        ?>
                    </div>
                </div>
            </div>

    <!-- include footer -->
    <?php include '../includes/footer.php'; ?>
                
    <?php 
            }
            else
                header ('location: home.php?user='.$_SESSION['user']);
        }
    ?>
