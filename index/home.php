    <!-- include header -->
    <?php
        include 'includes/header.php'; 
        include 'includes/functions.php';    
    ?>
    
    <?php
        if(isset($_GET['user']))
        {
            image_query('etudient');
            $pseudo = $_GET['user'];
            if(!empty($pseudo) && $pseudo == $_SESSION['user'])
            {
                $rq = "SELECT * FROM etudient WHERE pseudo_etu = '$pseudo'";
                $res = mysqli_query($con,$rq);
                if($row = mysqli_fetch_assoc($res))
                {
                    // get groupe name by id
                    $groupe = get_groupeName($row['groupe_etu']);
                    //image_query('etudient');
                    $imageName = $row['image_etu'];
                    $image_dir = 'images/';
                    if($imageName == 'user-male.png' || $imageName == 'user-female.png')
                        $image_dir = 'images/default/';
    ?>

    <div class="wrapper">
      
       <!-- start sidebar -->
       
        <div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">

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
                    <a href="home.php">
                        <i aria-hidden="true"><img src="icons/open-book.png"></i>
                        <p>Courses</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
    
    <!-- end sidebar -->
   
    <div class="main-panel">
       
        <!-- include navigation -->
        <?php include 'includes/navigation.php'; ?>

        <!-- content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <h2>Collapsible Sidebar Using Bootstrap 4</h2>

                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <div class="line"></div>

                    <h2>Collapsible Sidebar Using Bootstrap 4</h2>

                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <div class="line"></div>
                    <h2>Collapsible Sidebar Using Bootstrap 4</h2>

                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                    <div class="line"></div>
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
