<?php 
    if(isset($_GET['user']))
    {
            if(!empty($_GET['user']) && $_GET['user'] == $_SESSION['user'])
            {
                $pseudo = $_GET['user'];
            
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
                    <a class="navbar-brand" href="#">Home</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                        
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="../../../demosite/index/profile.php?user=<?php echo $pseudo ?>">
                               Account
                            </a>
                        </li>
                        <li>
                            <a href="../includes/logout.php">
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