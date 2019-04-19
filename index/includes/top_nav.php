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
                <li>
                    <a href="../../../demosite/index/<?php echo $plan ?>/profile.php?user=<?php echo $pseudo ?>">
                        <p>Account</p>
                    </a>
                </li>
                <li>
                    <a href="../../includes/logout.php">
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