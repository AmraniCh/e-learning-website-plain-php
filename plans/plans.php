<!DOCTYPE HTML>
<html>
<head>
    <title>Register options</title> 
    <link href="style/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <script>
         $(document).ready(function() {
                $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
                });
         });
    </script>							
    <div class="plans">
        <div class="wrap">
            <div class="pricing-grids">
				<div class="pricing-grid1">
				    <div class="price-value">
                        <h2><a href="#">Administrator</a></h2>
				        <div class="container">
				            <img src="images/admin.png">
				        </div>
                        <div class="sale-box">
				            <span class="on_sale title_shop">NEW</span>
				        </div>

				    </div>
				    <div class="price-bg">
				        <ul>
				            <li class="whyt"><a href="#">kouskous </a></li>
				            <li><a href="#">kouskous</a></li>
				            <li class="whyt"><a href="#">kouskous</a></li>
				            <li><a href="#">kouskous</a></li>
				            <li class="whyt"><a href="#">kouskous</a></li>
				        </ul>
				        <div class="cart1">
				    		<form action="" method="post">
				        	    <a class="popup-with-zoom-anim" href="../register.php?plan=admin">Register Now!</a>
                            </form>
				        </div>
				    </div>
				</div>
				<div class="pricing-grid2">
				    <div class="price-value two">
				        <h3><a href="#">Professor</a></h3>
        	    		<div class="container">
            			    <img src="images/prof.png">
                		</div>
        				<div class="sale-box two">
		    				<span class="on_sale title_shop">NEW</span>
				        </div>
				    </div>
				    <div class="price-bg">
						<ul>
            				<li class="whyt"><a href="#">kouskous</a></li>
            				<li><a href="#">kouskous</a></li>
        					<li class="whyt"><a href="#">kouskous</a></li>
    						<li><a href="#">kouskous</a></li>
				            <li class="whyt"><a href="#">kouskous</a></li>
				        </ul>
				    	<div class="cart2">
                		    <style scoped>
                                @media (max-width:768px)
                                {
                                    .cart1, .cart2, .cart3, .price-value, .price-value.two, .price-value.three{
                                        text-align: center;
                                    }    
                                }
                            </style>
                            <form action="" method="post">
				        	    <a class="popup-with-zoom-anim" href="../register.php?plan=professor">Register Now!</a>
                            </form>
				        </div>
                    </div>
                </div>
				<div class="pricing-grid3">
				    <div class="price-value three">
				        <h4><a href="#">Student</a></h4>
				    		<div class="container">
							    <img src="images/student.png">
            				</div>
				            <div class="sale-box three">
							    <span class="on_sale title_shop">NEW</span>
							</div>
				    </div>
				    <div class="price-bg">
				        <ul>
				            <li class="whyt"><a href="#">kouskous</a></li>
				            <li><a href="#">kouskous</a></li>
				        	<li class="whyt"><a href="#">kouskous</a></li>
				    		<li><a href="#">kouskous</a></li>
							<li class="whyt"><a href="#">kouskous</a></li>
				        </ul>
				        <div class="cart3">
				            <form action="" method="post">
				    		    <a class="popup-with-zoom-anim" href="../register.php?plan=student">Register Now!</a>
                            </form>
				        </div>
                    </div>
				</div>
            </div>
        </div>
    </div>
</body>
</html>		