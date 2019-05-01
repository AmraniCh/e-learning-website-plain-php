<?php 
    if(isset($_GET['user']))
        {
            $pseudo = $_GET['user'];
            $plan = $_SESSION['plan'];
            if(!empty($pseudo) && $pseudo == $_SESSION['user'])
            {
?>
<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php $page = lcfirst(get_pageName()); echo ''.$page.'.php?user='.$pseudo.'' ?>"><?php echo get_pageName(); ?></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="<?php $page = lcfirst(get_pageName()); echo ''.$page.'.php?user='.$pseudo.'' ?>" class="dropdown-toggle" data-toggle="dropdown">
                       <?php
                        $actual_pageName = lcfirst(get_pageName());
                        switch($actual_pageName){                          
                            case 'courses':
                                echo "<i class='fas fa-book-open' aria-hidden='true'></i>"; break;
                            case 'profile':
                                echo "<i class='fas fa-user-circle' aria-hidden='true'></i>"; break;
                            default: echo "<i class='fa fa-home' aria-hidden='true'></i>";
                        }  
                        ?>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               
                <li id="list-groupe-li" style="display:none;">
                    <a style="margin:2px 0 0 0">
                        <form id="select_groupe_form" action="includes/change_groupe.php" method="post">
                            <select id="list-groupe" name="groupe" class="form-control">
                                <?php
                                if($plan == 'professor'){
                                    // get all groupes
                                    $rq = "SELECT * FROM groupe";
                                    $res = mysqli_query($con,$rq);

                                    // get last groupe used
                                    $rq2 = "SELECT grp_id FROM groupe_historique WHERE pseudo_prof ='$pseudo'";
                                    $res2 = mysqli_query($con,$rq2);
                                    $row2 = mysqli_fetch_assoc($res2);
                                    $grp_id_histo = $row2['grp_id'];
                                    $grp_name_histo = get_groupeName($grp_id_histo);             

                                    while($row = mysqli_fetch_assoc($res)){
                                        if($row['id'] == $grp_id_histo && mysqli_num_rows($res2) != 0){
                                            echo '<option value='.$grp_id_histo.' selected>'.$grp_name_histo.'</option>';
                                            // store selected grp id
                                            $_SESSION['grp_id'] = $grp_id_histo;
                                        }
                                        else
                                             echo '<option value='.$row['id'].'>'.$row['nom'].'</option>'; 
                                    }   
                                    
                                    
                                }
                                ?>
                            </select>
                        </form>
                    </a>
                </li>
                <li>
                    <a href="../../../demosite/index/<?php echo $plan ?>/profile.php?user=<?php echo $pseudo ?>">
                        <p>Account</p>
                    </a>
                </li>
                <li>
                    <a id="logout" href="#">
                    <p>Log out</p>
                    </a>
                </li>
            </ul>
         </div>
    </div>
</nav>
<?php
            }
        }
?>