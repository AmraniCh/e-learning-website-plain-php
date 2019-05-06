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
                            $res = mysqli_query($con, "SELECT count(id) FROM groupe WHERE pseudo_prof = '$get_username'");
                            $row = mysqli_fetch_row($res);
                            echo $row[0]?> Groups</span>
                        <div class="file-controls" style="display:none">
                            <button type="button" id="delete-button" class="btn btn-primary">
                                Delete All groups
                            </button>
                            <button type="button" id="file-button" class="btn btn-primary" onclick=" load_add_groupe_form()">
                                Add group
                            </button>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div id="groups-content" class="col-12" style="margin-top:20px">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Groups Admin Panel</h4>
                                <p class="category">Here you can manage your groups </p>
                            </div>
                            <div class="groups-content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Picture</th>
                                        <th>Name</th>
                                    	<th>Description</th>
                                    	<th>Creation date</th>
                                    	<th>Files number</th>
                                        <th>Group key</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $res = mysqli_query($con, "SELECT * FROM groupe WHERE pseudo_prof = '$username'");
                                            while($row = mysqli_fetch_assoc($res)){
                                                echo '<tr><td id="img-group-td"><img id="group-pic" src="assets/groups-images/'.$row['image_groupe'].'" class="img-responsive" style="height:60px;border-radius:50%"><style scoped>@media (max-width:768px){
                                                #group-pic{height:auto!important;}
                                                }</style></td>';
                                                echo '<td>'.$row['nom'].'</td>';
                                                echo '<td>'.$row['description'].'</td>';
                                                echo '<td>'.$row['date_creation'].'</td>';
                                                echo '<td>'.$row['nbr_fichier'].'</td>';
                                                echo '<td>key</td>';
                                                echo '<td><button style="color: #fff;background-color: #138496; border: none;" type="button" id="btn-edit" class="btn btn-primary">Edit</button></td>';
                                                echo '<td><button style="color: #fff;background-color: #dc3545; border: none;" type="button" id='.$row['id'].' class="btn-delete btn btn-danger">delete</button></td></tr>';
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
