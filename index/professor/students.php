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
            <div class="groups-content">
                <div class="container-fluid">
                    <div id="top-panel" class="top-panel row">
                        <span class="courses_count" style="line-height:40px;font-size:x-large;"><?php 
                            if(isset($_SESSION['grp_id'])){
                                $res = mysqli_query($con, "SELECT nbr_etudient FROM groupe WHERE id = '".$_SESSION['grp_id']."'");
                                $row = mysqli_fetch_row($res);
                                echo $row[0];
                            }
                            else
                                echo '0'?> 
                        Students</span>
                        <div class="file-controls">
                            <button type="button" id="delete-button" class="btn btn-primary">
                                Delete All Students
                            </button>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div id="groups-content" class="col-12" style="margin-top:20px">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Students Admin Panel</h4>
                                <p class="category">Here you can manage your students </p>
                            </div>
                            <div class="groups-content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Picture</th>
                                        <th>First name</th>
                                        <th>Last Name</th>
                                    	<th>Email</th>
                                    	<th>Adress</th>
                                    	<th>Country</th>
                                        <th>City</th>
                                        <th>Phone</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if(isset($_SESSION['grp_id'])){
                                                
                                                $res = mysqli_query($con, "select e.* from groupe p inner join etudient e where e.groupe_id = '".$_SESSION['grp_id']."' limit 1");
                                                while($row = mysqli_fetch_assoc($res)){
                                                    $imageName = $row['image_etu'];
                                                    // get image directory 
                                                    $image_dir = '../student/assets/images/';
                                                    if($imageName == 'user-male.png' || $imageName == 'user-female.png')
                                                        $image_dir = '../assets/default-images/';
                                                    // setting
                                                    echo '<tr><td id="img-group-td"><img id="group-pic" src="'.$image_dir.$row['image_etu'].'" class="img-responsive" style="height:60px;border-radius:50%"><style scoped>@media (max-width:768px){
                                                    #group-pic{height:auto!important;}
                                                    }</style></td>';
                                                    echo '<td>'.$row['prenom_etu'].'</td>';
                                                    echo '<td>'.$row['nom_etu'].'</td>';
                                                    echo '<td>'.$row['email_etu'].'</td>';
                                                    echo '<td>'.$row['adresse_etu'].'</td>';
                                                    echo '<td>'.$row['pays_etu'].'</td>';
                                                    echo '<td>'.$row['ville_etu'].'</td>';
                                                    echo '<td>'.$row['tele_etu'].'</td>';
                                                    echo '<td><button style="color: #fff;background-color: #138496; border: none;" type="button" id="btn-edit" class="btn btn-primary">Edit</button></td>';
                                                    echo '<td><button style="color: #fff;background-color: #dc3545; border: none;" type="button" id='.$row['email_etu'].' class="btn-delete btn btn-danger">delete</button></td></tr>';
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
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
