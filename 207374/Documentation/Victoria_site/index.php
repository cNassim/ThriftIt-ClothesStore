<?php
    session_start(); // Start the session if not started already
    $_SESSION['ch']=false;
    // Logout logic
    if (isset($_GET['logout'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy(); // Optional: Destroy the session data completely
        header('Location: index.php');
        exit;
    }
?>


<!doctype html>
<html lang="en">
  <head>
  	    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Demo powered by Templatetrip">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,900" rel="stylesheet"> 
	
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	<!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/styles.css" rel="stylesheet">
	<link href="css/styles-register.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/owl-carousel.css" rel="stylesheet">
	 <link href="css/lightbox.css" rel="stylesheet">

    <!-- Custom styles for this template -->
  </head>

  <body class="index layout1">
  	
	<header class="header-area header-sticky text-center header-default">
	<div class="header-main-sticky">
	</div>
	<div class="header-main-head">
	
    <div class="header-main">
	<div class="container">
		<div class="header-middle float-lg-left float-md-left float-sm-left float-xs-none">
				<div class="logo">
								<a href="index.php"><img src="img/logos/logo.png" alt="logo" width="200" height="50" ></a>		</div>
		</div>
		<div class="header-right d-flex d-xs-flex d-sm-flex justify-content-end float-right">
		<div class="user-info">
		<?php

    // Check if the user is logged in
    $isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'];

    if ($isLoggedIn) {
        // Display 'My Account' and 'Logout' if the user is logged in
        echo '
        <button type="button" class="btn">
            <i class="material-icons">perm_identity</i>
        </button>
        <div id="user-dropdown" class="user-menu">
            <ul>
                <li><a href="my-account.php" class="text-capitalize">my account</a></li>
                <li><a href="index.php?logout=1" class="text-capitalize">Logout</a></li>
            </ul>
        </div>';
    } else {
        // Display Register and Login options if the user is not logged in
        echo '
        <button type="button" class="btn">
            <i class="material-icons">perm_identity</i>
        </button>
        <div id="user-dropdown" class="user-menu">
            <ul>
                <li><a href="register.php" class="modal-view button">Register</a></li>
                <li><a href="login.php" class="modal-view button">Login</a></li>
            </ul>
        </div>';
    }
?>
</div>


		<div class="cart-wrapper">
			
			
			<?php

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'];

if ($isLoggedIn) {
	// Display 'My Account' and 'Logout' if the user is logged in
	echo '
	<button type="button" class="btn">
				<i class="material-icons">shopping_cart</i>
				</button>
				<div id="cart-dropdown" class="user-menu">
		<ul>
			<li><a href="cart_page.php" class="modal-view button">View Cart</a></li>
			<li><a href="checkout_page.php" class="modal-view button">Checkout</a></li>
			<li><a href="wishlist.php" class="modal-view button">Wishlist</a></li>
		</ul>
	</div>';
} else {
	// Display Register and Login options if the user is not logged in
	echo '
	<button type="button" class="btn">
				<i class="material-icons">shopping_cart</i>
				</button>
				<div id="cart-dropdown" class="cart-menu">
		<ul>
			<li><a href="register.php" class="modal-view button">Register</a></li>
			<li><a href="login.php" class="modal-view button">Login</a></li>
		</ul>
	</div>';
}
?>
          </div>

		</div>
		</div>
	</div>
	</div>



	

	<div class="menu">
	<div class="container">
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light d-sm-none d-xs-none d-lg-block navbar-full">
		
            <!-- Navbar brand -->
            <a class="navbar-brand text-uppercase d-none" href="#">Navbar</a>
            
            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2"
            aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Collapsible content -->
            <div class="collapse navbar-collapse">
            
            <!-- Links -->
            <ul class="navbar-nav m-auto justify-content-center">
            <li class="nav-item dropdown active">
            <a class="nav-link text-uppercase" href="index.php">
                Home
              <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown mega-dropdown">
            <a class="nav-link text-uppercase" href="shop-main.php">Shop</a>
            <li class="nav-item dropdown active">
            <a class="nav-link text-uppercase dropdown-toggle" href="shop-main.php">
                Outfit Finder
              <span class="sr-only">(current)</span></a>
              <div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3" id="menu1">
                  <div class="sub-menu mb-xl-0 mb-4">
                      <ul class="list-unstyled">
                          <li>
                              <a class="menu-item pl-0" href="valises.php">
                            Trip Planner</a> </li>
                          <li>
                              <a class="menu-item pl-0" href="advices.php">
                            Style Tips
                            </a>
                        </li>
                        <li>
                            <a class="menu-item pl-0" href="suggest.php">
							DailyOutfitSuggestions
                          </a>
                      </li>
                      </ul>
                  </div>
              </div>
            </li>
            <li class="nav-item">   
            <a class="nav-link text-uppercase" href="about-us.php">About us </a>
            </li>
            <!-- Links -->
            </div>
            <!-- Collapsible content -->
            
            </nav>
	</div>
	</div>
	</div>
	</div>
	</header>
    <main>

      <!-- Main jumbotron for a primary marketing message or call to action -->
	  <div class="slider-wrapper my-40 my-sm-25 float-left w-100">
	  	<div class="container">
		<div class="ttloading-bg"></div>
	  	<div class="slider slider-for owl-carousel">
			<div>
				<a href="#">
					<img src="img/banner/slider.png" alt="" height="800" width="1600"/>
				</a>
				<div class="slider-content-wrap center effect_top">
				  <div class="slider-title mb-20 text-capitalize float-left w-100">Trending Now</div>
				  <div class="slider-subtitle mb-50 text-capitalize float-left w-100">fashion style</div>
				  <div class="slider-button text-uppercase float-left w-100"><a href="shop.php">Shop Now</a></div>
				</div>
			</div>
			<div>
				<a href="#">
					<img src="img/banner/homep.png" alt="" height="800" width="1600"/>
				</a>
				<div class="slider-content-wrap center effect_bottom">
				  <div class="slider-title mb-20 text-capitalize float-left w-100">Your style</div>
				  <div class="slider-subtitle mb-50 text-capitalize float-left w-100 .text-dark">fashion trend</div>
				  <div class="slider-button text-uppercase float-left w-100"><a href="shop.php">Shop Now</a></div>
				</div>
			</div>
	  </div>
	    </div>
	  </div>
      

	  



	










			<div class="main-content">
				<section>
					<!-- Modified center div with title -->
					<div class="center">
						<div class="tt-title d-inline-block float-none w-100 text-center">What We Offer :</div>
						<br><br><br>
						<p>Discover stylish and sustainable fashion at prices that won't break the bank.</p>
						<p>Explore our curated collection of pre-loved treasures and make a positive impact on the environment.</p>
						<p>At <b>ThriftIt</b>, we believe fashion should be accessible to all without compromising our planet. Explore our curated collection of pre-loved treasures and make a statement with your style.</p>
					<p>Every purchase at ThriftIt contributes to reducing textile waste and promoting a more sustainable fashion industry. Join us on this journey towards a greener and trendier tomorrow.</p>
					<p>Ready to make a difference? Start shopping now!</p>
					</div>
					<div class="slider-button text-uppercase float-left w-100"><a href="shop.php"><h3><b>Shop Now</b></h3></a></div>
				</section>
				<style>
				section {
					padding: 2em;
					text-align: center; /* Ajoutez cette ligne pour centrer le texte dans la section */
				}
				</style>


<br><br><br><br><br>


	<div id="ttcmstestimonial" class="my-40 my-sm-25 bottom-to-top hb-animate-element">
		<div class="tttestimonial-content container text-center">
			<div class="tttestimonial-inner">
				<div class="tttestimonial owl-carousel">
					<div>
						<div class="testimonial-block">
							<div class="testimonial-content">
								<div class="testimonial-desc">
									<p>Elevate your elegance with our handpicked style tips designed to turn every outfit into a masterpiece.<strong> Our style gurus</strong> have decoded the language of fashion, providing you with insider tips on color coordination, accessorizing, and embracing your unique style identity. Get ready to transform your wardrobe into a curated collection of elegance and sophistication.</p>
								</div>
								<div class="testimonial-user-title">
									<div class="user-designation"><h4><strong> Elevate Your Elegance:</strong> </h4></div>
									<div class="slider-button text-uppercase float-left w-100"><a href="advices.php"><h3><b>Click Here to start</b></h3></a></div>
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="testimonial-block">
							<div class="testimonial-content">
								<div class="testimonial-desc">
									<p>Your style is a canvas, and we're here to help you paint it with confidence.<strong> In our style tips section</strong> , discover the art of dressing to impress while staying true to yourself. Each piece of advice is a brushstroke, adding vibrancy and flair to your fashion canvas. Unleash the power of self-expression and create a style story that is uniquely yours.</p>
								</div>
								<div class="testimonial-user-title">
									<div class="user-designation"><h5><strong>Dress to Impress, Express Yourself</strong></h5></div>
									<div class="slider-button text-uppercase float-left w-100"><a href="advices.php"><h3><b>Click Here to start</b></h3></a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			<div id="ttcmssubbanner" class="ttcmssubbanner my-40 my-sm-25 bottom-to-top hb-animate-element">
  <div class="ttbannerblock container">
    <div class="row">
      <div class="ttbanner1 ttbanner col-sm-6 col-xs-6">
        <div class="ttbanner-img"><a href="#"><img src="img/banner/shop now.jpg" alt="cms-03" height="600" width="400"></a></div>
        <div class="ttbanner-inner">
          <div class="ttbanner-desc text-center">
            <span class="title text-uppercase">It's time!</span> 
            <span class="subtitle text-uppercase py-20">What are you waiting for?</span> 
            <span class="shop-now text-capitalize"><a href="shop.php" class="btn-primary">shop now</a></span>          </div>
        </div>
      </div>
      <div class="ttbanner2 ttbanner col-sm-6">
        <div class="ttbanner-img"><a href="#"><img src="img/banner/elevate.jpg" alt="cms-04" height="600" width="400"></a></div>
        <div class="ttbanner-inner">
          <div class="ttbanner-desc text-center">
            <span class="title text-uppercase">Guess what!</span> 
            <span class="subtitle text-uppercase py-20">Wanna elevate your style?</span> 
            <span class="shop-now text-capitalize"><a href="advices.php" class="btn-primary">Click Here!</a></span>          </div>
        </div>
      </div>
    </div>
  </div>
</div>			
			</div> 
			</div>
    </main>





    <!-- Footer -->
			<footer class="page-footer font-small footer-default">
				<div class="container text-center text-md-left">
					<div class="row">
						<div class="col-md-2 footer-cms footer-column">
							<div class="ttcmsfooter">
								<div class="footer-logo"><img src="img/logos/footer-logo.png" alt="footer-logo"></div>
								<div class="footer-desc">"Stylish Choices, Sustainable Impact – ThriftIt"</div>
							</div>
						</div>
						<div class="col-md-2 footer-column">
							<div class="title">
								<a href="#company" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">QUICK LINKS</a> </div>
							<ul id="company" class="list-unstyled collapse">
								<li>
									<a href="index.php">Home</a> </li>
								<li>
									<a href="about-us.php">About Us</a> </li>
								<li>
									<a href="shop-main.php">Offers</a> </li>
								<li>
									<a href="about-us.php">Contact Us</a> </li>
							</ul>
						</div>
						<div class="col-md-2 footer-column">
							<div class="title">
								<a href="#products" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">ABOUT</a> </div>
							<ul id="products" class="list-unstyled collapse">
								<li>
									<a href="about-us.php">Who are we?</a> </li>
								<li>
									<a href="about-us.php">Our story</a> </li>
								<li>
									<a href="about-us.php">Our mission</a> </li>
							</ul>
		
						</div>
						<div class="col-md-2 footer-column">
							<div class="title">
								<a href="#account" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">HELP CENTER</a> </div>
							<ul id="account" class="list-unstyled collapse">
								<li>
									<a href="my-account.php">personal info</a> </li>
								<li>
									<a href="cart_page.php">Orders</a> </li>
								<li>
									<a href="wishlist.php">my wishlists</a> </li>
								<li>
									<a href="my-account.php">Sign In / Sign Up</a> </li>
							</ul>
		
						</div>
						<div class="col-md-2 footer-column">
							<div class="title">
								<a href="#information" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">store information</a> </div>
							<ul id="information" class="list-unstyled collapse">
								<li class="contact-detail links">
									<span class="address">
							  <span class="icon"><i class="material-icons">insta</i></span>
									<span class="data">ThriftiT_Shop</span> </span>
								</li>
								<li class="links">
									<span class="contact">
							  <span class="icon"><i class="material-icons">phone</i></span>
									<span class="data"><a href="tel:(99)55669999">+(212) 788776633</a></span> </span>
								</li>
								<li class="links">
									<span class="email"> 
							  <span class="icon"><i class="material-icons">email</i></span>
									<span class="data"><a href="mailto:demo.store@gmail.com">support@thriftit.com</a></span> </span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Copyright -->
				<div class="footer-bottom-wrap">
					<div class="container">
						<div class="row">
							<div class="footer-copyright text-center py-3">
								© 2023 - Copyright Claimed -ThriftiT™
							</div>
						</div>
					</div>
				</div>
				<a href="#" id="goToTop" title="Back to top" class="btn-primary"><i class="material-icons arrow-up">keyboard_arrow_up</i></a>
		
			</footer>
  
<!-- cart-pop modal -->
<div class="modal fade" id="cart-pop" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header alert-success">
				 <h4 class="modal-title w-100w-100w-100">Product successfully added to your shopping cart</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">×</span>
		</button>
			</div>
			<div class="modal-body">
				<div class="row">
				<div class="col-md-6 divide-right">
				<div class="row">
					<div class="col-md-5 col-sm-4 col-xs-12 product-img float-left">
						<img src="img/products/01.jpg" class="img-responsive" alt="01">
					</div>
					<div class="col-md-7 col-sm-8 col-xs-12 product-desc float-left">
						<h4 class="product-title text-capitalize">Burgundy Small Dress</h4>
						<div class="rating">
						<div class="product-ratings d-inline-block align-middle">
						<span class="fa fa-stack"><i class="material-icons">star</i></span>
					   <span class="fa fa-stack"><i class="material-icons">star</i></span>
					   <span class="fa fa-stack"><i class="material-icons">star</i></span>
					   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
					   <span class="fa fa-stack"><i class="material-icons off">star</i></span></div></div>
						<h3 class="price float-left w-100"><span class="regular-price align-middle">$75.00</span><span class="old-price align-middle">$60.00</span></h3>
					</div>
				</div>
				</div>
					<div class="col-md-6 divide-left">
						<p class="cart-products-count">There are 2 items in your cart.</p>
						<p class="total-products float-left w-100">
							<strong>Total products:</strong> $150.00
						</p>
						<p class="shipping float-left w-100">
							<strong>Total shipping:</strong> free
						</p>
						<p class="total-price float-left w-100">
							<strong>Total:</strong> $150.00(tax incl.)
						</p>
						<div class="cart-content-btn float-left w-100">
						<form action="#">
						  <input class="btn pull-right mt_10 btn-primary" value="Continue shopping" type="submit">
						</form>
						<form action="checkout_page.php">
						  <input class="btn pull-right mt_10 btn-secondary" value="Proceed to checkout" type="submit">
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
 


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/parallax.js"></script>
		<script src="js/lightbox-2.6.min.js"></script>
		<script src="js/ResizeSensor.min.js"></script>
		<script src="js/theia-sticky-sidebar.min.js"></script>
		<script src="js/inview.js"></script>
		<script src="js/cookiealert.js"></script>
		<script src="js/jquery.countdown.min.js"></script>
		<script src="js/masonry.pkgd.min.js"></script>
		<script src="js/imagesloaded.pkgd.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/jquery.lazy.min.js"></script>

		</body>
</html>