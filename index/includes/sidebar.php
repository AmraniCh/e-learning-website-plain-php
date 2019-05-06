    <?php

        $username = $_GET['user'];
        $plan = $_SESSION['plan'];
        if(!empty($username) && $username == $_SESSION['user'])
        {
            image_query();
            // getting data -- image profile -- directory image -- groupe id
            if($plan == 'professor'){
                $row = select_index_query('*','professeur','pseudo_prof',$username);
                $imageName = $row['image_prof'];
                $image_dir = '../professeur/assets/images/';
            }
            else{
                $row = select_index_query('*','etudient','pseudo_etu',$username);
                $imageName = $row['image_etu'];
                $image_dir = '../student/assets/images/';
                // get groupe id
                $grp_id = $row['groupe_id'];
            }

            if($row)
            {
                $image_dir = 'assets/images/';
                if($imageName == 'user-male.png' || $imageName == 'user-female.png')
                    $image_dir = '../assets/default-images/'; ?>
        <div class="sidebar" >

        <!--
            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag
        -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <div class="simple-text">
                    Sharing files
                </div>
            </div>
            <div class="profile">
                <div class="profile-img" id="profile-img" style="background-image: url(<?php echo $image_dir.$imageName?>)"></div>
                <div class="profile-info">
                    <div class="username"><i class="fa fa-user" aria-hidden="true"></i><span class="username-text"><?php echo $username ?></span></div>
                    <div class="groupe"><i class="fas fa-users" aria-hidden="true"></i><span class="groupe-text"><?php 
                        if($plan == 'professor'){
                            if(isset($_SESSION['grp_id']))
                                echo get_groupeName($_SESSION['grp_id']);
                            else 
                                echo 'N/A';
                        }
                        else
                            echo get_groupeName($grp_id);
                        ?></span></div>
                </div>
            </div>
            <ul class="nav">
                <?php 
                    $page_name = get_pageName();    
                ?>
                <li <?php if($page_name == 'Home') echo 'class="active"'; ?> >
                    <a href="home.php?user=<?php echo $username ?>">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li <?php if($page_name == 'Courses') echo 'class="active"'; ?> >
                    <a href="courses.php?user=<?php echo $username ?>">
                        <i aria-hidden="true"><img src="../assets/icons/open-book.png"></i>
                        <p>Courses</p>
                    </a>
                </li>
                <li <?php if($page_name == 'Exams') echo 'class="active"'; ?> >
                    <a href="exams.php?user=<?php echo $username ?>">
                        <i aria-hidden="true"><img src="../assets/icons/report.png"></i>
                        <p>Exams</p>
                    </a>
                </li>
                <li <?php if($page_name == 'Files') echo 'class="active"'; ?> >
                    <a href="files.php?user=<?php echo $username ?>">
                        <i aria-hidden="true"><img src="../assets/icons/folder.png"></i>
                        <p>Other files</p>
                    </a>
                </li>
                <?php if($plan == 'professor') {?>
                <li <?php if($page_name == 'Groups') echo 'class="active"'; ?> >
                    <a href="groups.php?user=<?php echo $username ?>">
                        <i aria-hidden="true"><img src="../assets/icons/gear.png"></i>
                        <p>Groups admin</p>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <ul class="list-unstyled CTAs">
                <li>
                    <a href="#" class="download">Download code</a>
                </li>
   		    </ul>
    	</div>
    </div>
    <?php 
            }
        }
    ?>