<!DOCTYPE html>
<html lang="en">
    <head>
        <title>bootstrap template page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="../js/jquery-3.3.1.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- nav -->
        <nav class="navbar navbar-inverse" style="border-radius:0;background-color:#5a4e97;color:#fff;border:0;padding:.5% 0;font-size:1.1em;margin-bottom:0">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" aria-expanded="false" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
              </button>
              <a class="navbar-brand" style="padding:0px 15px 5px;float:left" href="#"><img style="height:110%" src="../ressources/w3newbie.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#about">About</a></li> 
                <li><a href="#">Contact</a></li> 
              </ul>
            </div>
          </div>
        </nav>   
        <!-- end nav -->
        
        <!-- slider -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            </ol>

              <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img id="slideimg" src="ressources/mountains.png" alt="Los Angeles">
                    <div class="carousel-caption">
                        <h1>exemple1</h1><br>
                        <button type="button" class="btn btn-outline-primary">Get started</button>
                    </div>
                </div>
            </div>
        </div>    
        <!-- end slider -->
        
        <!-- features -->
        <div class="container text-center" id="features">
            <h2>Features</h2>
            <div class="row">
                <div class="col-sm-4">
                    <img src="ressources/html5.png" id="icon"> 
                    <h4>HTML5</h4>
                </div>
                <div class="col-sm-4">
                    <img src="ressources/css3.png" id="icon"> 
                    <h4>CSS3</h4>
                </div>
                <div class="col-sm-4">
                    <img src="ressources/bootstrap.png" id="icon"> 
                    <h4>BOOTSTRAP4</h4>
                </div>
            </div>
        </div>
        <!-- end features -->
        
        <!-- about us -->
        <div class="container" id="about">
            <div class="row">
                <div class="col-sm-6">
                    <h4>About us</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint vitae aspernatur excepturi a, vel cum dolorem laudantium commodi, impedit consequatur mollitia maiores quasi iusto explicabo amet reiciendis. Aut voluptates, a.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint vitae aspernatur excepturi a, vel cum dolorem laudantium commodi, impedit consequatur mollitia maiores quasi iusto explicabo amet reiciendis. Aut voluptates, a.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint vitae aspernatur excepturi a, vel cum dolorem laudantium commodi, impedit consequatur mollitia maiores quasi iusto explicabo amet reiciendis. Aut voluptates, a.</p>
                </div>
                <div class="col-sm-6">
                    <img src="ressources/bootstrap2.jpg" class="img-responsive">
                </div>
            </div>
        </div>
        
       <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <h4>About us</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint vitae aspernatur excepturi a, vel cum dolorem laudantium commodi, impedit consequatur mollitia maiores quasi iusto explicabo amet reiciendis. Aut voluptates, a.</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <img src="ressources/sass.png" class="img-responsive">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <h4>About us</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint vitae aspernatur excepturi a, vel cum dolorem laudantium commodi, impedit consequatur mollitia maiores quasi iusto explicabo amet reiciendis. Aut voluptates, a.</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <img src="ressources/less.png" class="img-responsive">
                </div>
            </div>
        </div>
        <!-- about us -->
        
        <!-- hidden -->
        <div class="container">
            <div class="row">
                <h4><a href="#hidden" data-toggle="collapse">hidden content here ?</a></h4>
                <div class="collapse" id="hidden">
                    <h4>About us</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint vitae aspernatur excepturi a, vel cum dolorem laudantium commodi, impedit consequatur mollitia maiores quasi iusto explicabo amet reiciendis. Aut voluptates, a.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint vitae aspernatur excepturi a, vel cum dolorem laudantium commodi, impedit consequatur mollitia maiores quasi iusto explicabo amet reiciendis. Aut voluptates, a.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint vitae aspernatur excepturi a, vel cum dolorem laudantium commodi, impedit consequatur mollitia maiores quasi iusto explicabo amet reiciendis. Aut voluptates, a.</p>
                </div>
            </div>
        </div>
        <!-- end hidden -->
        
        <!-- footer -->
        <footer class="container-fluid text-center">
           <div class="row">
                <div class="col-sm-4">
                    <h3>Contact us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint vitae aspernatur excepturi a, vel cum dolorem laudantium commodi, impedit consequatur mollitia maiores quasi iusto explicabo amet reiciendis. Aut voluptates, a.</p>
                </div>
                <div class="col-sm-4">
                    <h3>Connect</h3>
                    <a href="#" class="fab fa-facebook"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-google"></a>
                    <a href="#" class="fab fa-youtube "></a>
                </div>
                <div class="col-sm-4">
                    <img src="ressources/bunny.png">
                </div>
            </div>
        </footer>
        
        
    </body>
</html>
