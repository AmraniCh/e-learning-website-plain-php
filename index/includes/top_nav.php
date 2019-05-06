    <?php 
        if(isset($_GET['user']))
            {
                $username = $_GET['user'];
                $plan = $_SESSION['plan'];
                if(!empty($username) && $username == $_SESSION['user'])
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
                <a class="navbar-brand" href="<?php $page = lcfirst(get_pageName()); echo ''.$page.'.php?user='.$username.'' ?>"><?php echo get_pageName(); ?></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="<?php $page = lcfirst(get_pageName()); echo ''.$page.'.php?user='.$username.'' ?>" class="dropdown-toggle" data-toggle="dropdown">
                           <?php
                            $actual_pageName = lcfirst(get_pageName());
                            switch($actual_pageName){         
                                case 'courses':
                                    echo "<i class='fas fa-book-open' aria-hidden='true'></i>"; break;
                                case 'exams':
                                    echo "<i class='fas fa-file-alt' aria-hidden='true'></i>"; break;
                                case 'profile':
                                    echo "<i class='fas fa-user-circle' aria-hidden='true'></i>"; break;
                                case 'files':
                                    echo "<i class='fas fa-folder-open' aria-hidden='true'></i>"; break;
                                case 'groups';
                                    echo "<i class='fas fa-users' aria-hidden='true'></i>"; break;
                                default: echo "<i class='fa fa-home' aria-hidden='true'></i>";
                            }
                            ?>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li id="list-groupe-li" style="display:none;">
                        <a style="margin:2px 0 0 0">
                            <select id="list-groupe" name="groupe" class="form-control">
                                <?php
                                    if($plan == 'professor'){
                                        // get all groupes
                                        $rq = "SELECT * FROM groupe WHERE pseudo_prof ='$username'";
                                        $res = mysqli_query($con,$rq);

                                        // check if prof has one group or more groups
                                        if(mysqli_num_rows($res) != 0){
                                            echo '<script>show_controls()</script>';
                                            // get last groupe used
                                            $rq2 = "SELECT grp_id FROM groupe_historique WHERE pseudo_prof ='$username'";
                                            $res2 = mysqli_query($con,$rq2);
                                            $row2 = mysqli_fetch_assoc($res2);
                                            $grp_name_histo = get_groupeName($row2['grp_id']);  

                                            $grp_history_founded = false;
                                            // comparison between groups ids and last group id => get selected group in the menu  
                                            while($row = mysqli_fetch_assoc($res)){      
                                                // if one of  group id is equal to last group used id => set this one
                                                if($row['id'] == $row2['grp_id'] && mysqli_num_rows($res2) != 0){
                                                    echo '<option value='.$row2['grp_id'].' selected>'.$grp_name_histo.'</option>';
                                                    // store selected grp id
                                                    $_SESSION['grp_id'] = $row['id'];
                                                    $grp_history_founded = true;
                                                }
                                                /// if not charge those groups in the menu
                                                else{
                                                     echo '<option value='.$row['id'].'>'.$row['nom'].'</option>'; 
                                                }
                                            }

                                            // if group history is not founded => set the last one created by prof
                                            if($grp_history_founded == false)
                                            {
                                                $res = mysqli_query($con,"SELECT id FROM groupe WHERE pseudo_prof = '$username' ORDER BY date_creation DESC");
                                                if(mysqli_num_rows($res) != 0)
                                                {
                                                    $row = mysqli_fetch_assoc($res);
                                                    $_SESSION['grp_id'] = reset($row);
                                                }
                                            }
                                        }
                                        // if prof has not group
                                        else{             
                                            echo '<script>hide_controls()</script>';
                                            if(isset($_SESSION['grp_id']))
                                                unset($_SESSION['grp_id']);
                                        }
                                    }
                                ?>
                            </select>    
                        </a>
                    </li>
                    <li>
                        <a href="../../../demosite/index/<?php echo $plan ?>/profile.php?user=<?php echo $username ?>">
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