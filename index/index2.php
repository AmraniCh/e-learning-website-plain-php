<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <title>bootstrap 4 sidebar</title>
    </head>
<body>
    <div class="wrapper">
   	    <nav id="sidebar">
   		    <div class="sidebar-header">
   			    <h3>BOOTSTRAP SIDEBAR</h3>
   		    </div>
            <ul class="list-unstyled components">
   			    <p>Dummy Heading</p>
   			    <li class="active">
   				    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
   				    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">home1</a>
                        </li>
                        <li>
                            <a href="#">home2</a>
                        </li>
                        <li>
                            <a href="#">home3</a>
                        </li>
   				    </ul> 
   			    </li>
                <li>
                    <a href="#">About</a>
                </li>
   			    <li>
   				    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Page</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">page1</a>
                        </li>
                        <li>
                            <a href="#">page2</a>
                        </li>
                        <li>
                            <a href="#">page3</a>
                        </li>
                    </ul> 
   			    </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact Us</a>
                </li>
   		    </ul>
   		
            <ul class="list-unstyled CTAs">
                <li>
                    <a href="#" class="download">Download code</a>
                </li>
                <li>
                    <a href="#" class="article">article</a>
                </li>
   		    </ul>
   	    </nav>
   	    <div class="container-content">
   		    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fa fa-align-justify"></i> <span>toggle sidebar</span>
                </button>

                <!--<a class="navbar-brand" href="#">Navbar</a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                    </ul>
                </div>
            </nav>
  	
  	        <div class="container-fluid">
                <div class="content">
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
    </div>

    <!-- jQuery - Bootstrap JS -->
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- toogle menu -->
    <script>
	    $(document).ready(function(){
			$('#sidebarCollapse').on('click',function(){
				$('#sidebar').toggleClass('active');
			});
		});  
	</script> 
  </body>
</html>