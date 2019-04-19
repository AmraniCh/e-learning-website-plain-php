<?php
        if(isset($_GET['user']))
        {
            image_query();
            $pseudo = $_GET['user'];
            if(!empty($pseudo) && $pseudo == $_SESSION['user'])
            {
                $res = select_home_query('*','etudient','pseudo_etu',$pseudo);
                $row = mysqli_fetch_assoc($res);
                // get groupe name by id
                $groupe = get_groupeName($row['groupe_id']);
                // get image name
                $imageName = $row['image_etu'];
                if($res != NULL)
                {
                    $image_dir = 'assets/images/';
                    if($imageName == 'user-male.png' || $imageName == 'user-female.png')
                        $image_dir = 'assets/images/default/'; ?>
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
                    <div class="username"><i class="fa fa-user" aria-hidden="true"></i><span class="username-text"><?php echo $pseudo ?></span></div>
                    <div class="groupe"><i class="fa fa-users" aria-hidden="true"></i><span class="groupe-text"><?php echo $groupe ?></span></div>
                </div>
            </div>
            <ul class="nav">
                <li class="active">
                    <a href="home.php?user=<?php echo $pseudo ?>">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="active">
                    <a href="courses.php?user=<?php echo $pseudo ?>">
                        <i aria-hidden="true"><img src="assets/icons/open-book.png"></i>
                        <p>Courses</p>
                    </a>
                </li>
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
                    else 
                    header ('location: ../login.php');
                }
                else
                    redirect_url('home.php');
        ?>