    <!-- include header -->
    <?php 
        include 'includes/header.php'; 
    ?>
    
    <?php
        // global session variables
        $pseudo = $_SESSION['user'];
        
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
            $rq = "UPDATE professeur SET prenom_prof = '$fname', nom_prof = '$lname', adresse_prof = '$adress', ville_prof '$city', pays_prof = '$country', tele_prof = '$phone', propos_prof = '$about' WHERE pseudo_prof = '$pseudo'";
            $res = mysqli_query($con,$rq);
        }

        // getting 
        if(isset($_GET['user']))
        {
            if(!empty($pseudo) && $pseudo == $_SESSION['user'])
            {
                $res = select_home_query('*','professeur','pseudo_prof',$pseudo);
                $count_student = mysqli_num_rows($res);
                $row = mysqli_fetch_assoc($res);
                // get iinfo
                $imageName = $row['image_prof'];
                $username = $row['pseudo_prof'];
                $fname = $row['prenom_prof'];
                $lname = $row['nom_prof'];
                $email = $row['email_prof'];
                $adress = $row['adresse_prof'];
                $city = $row['ville_prof'];
                $country = $row['pays_prof'];
                $about = $row['propos_prof'];
                $tele = $row['tele_prof'];
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
                                                <input type="text" class="form-control" disabled placeholder="N/A" value="<?php ?>">
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
                                        <div id="uploaded_image" class="image">
                                            <img class="avatar border-gray" src='<?php echo $image_dir.$imageName ?>' alt="..."/>
                                        </div>
                                       <label id="file-button" class="btn btn-default btn-file" style="margin-bottom:5px;margin-top:5px;font-size:15px;">
                                            Change My picture <input type="file" id="file_image" style="display: none;">
                                        </label>
                                      <h4 class="user-name"><?php echo $lname.' '.$fname ?><br/>
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
