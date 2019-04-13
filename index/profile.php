    <!-- include header -->
    <?php 
        include 'includes/header.php'; 
        include 'includes/functions.php'; 
    ?>
    
    <?php

        // update
        if(isset($_POST['update']))
        {
         
            //$email = $_POST['email'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $adress = $_POST['adress'];
            $city = $_POST['city'];
            $country = $_POST['country'];
            $phone = $_POST['phone'];
            $about = $_POST['about'];
            $rq = "UPDATE etudient SET prenom = '$fname', nom = '$lname', adresse = '$adress', ville = '$city', pays = '$country', tele = '$phone', propos = '$about' WHERE pseudo_etu = 'kamal88'";
            $res = mysqli_query($con,$rq);
        }

        // getting 
        if(isset($_GET['user']))
        {
            $pseudo = $_GET['user'];
            if(!empty($pseudo) && $pseudo == $_SESSION['user'])
            {
                $rq = "SELECT * FROM etudient WHERE pseudo_etu = '$pseudo'";
                $res = mysqli_query($con,$rq);
                if($row = mysqli_fetch_assoc($res))
                {
                    // get grpupe name by id
                    $groupe = get_groupeName($row['groupe_etu']);
                    // user info
                    $username = $row['pseudo_etu'];
                    $fname = $row['prenom'];
                    $lname = $row['nom'];
                    $email = $row['email'];
                    $adress = $row['adresse'];
                    $city = $row['ville'];
                    $country = $row['pays'];
                    $about = $row['propos'];
                    $tele = $row['tele'];
                    //image_query('etudient');
                    $imageName = $row['image_etu'];
                    $image_dir = 'images/';
                    if($imageName == 'user-male.png' || $imageName == 'user-female.png')
                        $image_dir = 'images/default/';
    ?>

    <div class="wrapper">
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
                <div class="profile-img" id="profile-img" style="background-image: url(<?php echo $image_dir.$imageName ?>)"></div>
                <div class="profile-info">
                    <div class="username"><i class="fa fa-user" aria-hidden="true"></i><span class="username-text"><?php echo $pseudo ?></span></div>
                    <div class="groupe"><i class="fa fa-users" aria-hidden="true"></i><span class="groupe-text"><?php echo $groupe ?></span></div>
                </div>
            </div>
            <ul class="nav">
                <li class="active">
                    <a href="home.php?pseudo=<?php echo $pseudo ?>">
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
   
    <div class="main-panel">
        <!-- include navigation -->
        <?php include 'includes/navigation.php'; ?>

        <!-- content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form action="profile.php" method="post">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Actual groupe</label>
                                                <input type="text" class="form-control" disabled placeholder="Company" value="<?php echo $groupe ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control" disabled placeholder="Username" value="<?php echo $username ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name="email" class="form-control" disabled placeholder="Email" value="<?php echo $email ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="fname" class="form-control" placeholder="Company" value="<?php echo $fname ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $lname ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="adress" class="form-control" placeholder="Home Address" value="<?php echo $adress ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" placeholder="City" value="<?php echo $city ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" name="country" class="form-control" placeholder="Country" value="<?php echo $country ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control" placeholder="Phone number" value="<?php echo $tele ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" name="about" class="form-control" placeholder="Here can be your description"><?php echo $about ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" name="update" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                     <script src="">
                                        
                                    </script>
                                        <div id="uploaded_image" class="image">
                                            <img class="avatar border-gray" src='<?php echo $image_dir.$imageName ?>' alt="..."/>
                                        </div>
                                       <label id="file-button" class="btn btn-default btn-file">
                                            Change My picture <input type="file" id="file" name="file" style="display: none;">
                                        </label>
                                      <h4 class="title"><?php echo $lname.' '.$fname ?><br/>
                                         <small><?php echo $username ?></small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"><?php echo $about ?>
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
                            </div>
                        </div>
                    </div>

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
                    redirect_url('profile.php');
        ?>

    <!-- include footer -->
    <?php include 'includes/footer.php'; ?>
