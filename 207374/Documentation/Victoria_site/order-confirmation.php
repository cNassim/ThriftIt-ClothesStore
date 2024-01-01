<?php
    session_start();
    include('php/config.php');
    if (isset($_SESSION['ch'])){
    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = (SELECT order_id FROM orders WHERE user_id = ? order by order_date DESC LIMIT 1)");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $products = $stmt->get_result();
    
    $stmt1 = $conn->prepare("SELECT order_cost FROM orders WHERE user_id = ? order by order_date DESC LIMIT 1");
    $stmt1->bind_param("i", $_SESSION['user_id']);
    $stmt1->execute();
    $total = $stmt1->get_result();
    $totalResult = $total->fetch_assoc();
    $totalProduct = $totalResult['order_cost'] - 20;


    $stmt2 = $conn->prepare("SELECT order_id FROM orders WHERE user_id = ? order by order_date DESC LIMIT 1");
    $stmt2->bind_param("i", $_SESSION['user_id']);
    $stmt2->execute();
    $ref = $stmt2->get_result();
    $reference = $ref->fetch_assoc();
}else{
  header("Location:index.php");
}

    // Logout logic
    if (isset($_GET['logout'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy(); 
        header('Location: index.php');
        exit;
    }
?>


<!doctype html>
<html lang="en">

<head>
    <title>ThriftIt</title>

    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,900" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/owl-carousel.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">

    <!-- Custom styles for this template -->
</head>

<body id="about-us">

    <header class="header-area header-sticky text-center header-default">
        <div class="header-main-sticky">
            <div class="header-main-head">

                <div class="header-main">
                    <div class="container">
                        <div class="header-middle float-left">
                            <div class="logo">
                                <a href="index.php"><img src="img/logos/logo.png" alt="NatureCircle"></a>
                            </div>
                        </div>
                        <div class="header-right d-flex d-xs-block d-sm-flex justify-content-end float-right">
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
    </header>
		<nav aria-label="breadcrumb" class="w-100 float-left">
  <ol class="breadcrumb parallax justify-content-center" data-source-url="img/banner/parallax.jpg" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
    <li class="breadcrumb-item active"><a href="#">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">order-confirmation</li>

  </ol>
</nav>
 <div class="order-inner float-left w-100">
 <div class="container">
 <div class="row">
<div id="order-itens" class="card float-left w-100 mb-10">
<div id="order-confirmation" class="card float-left w-100 mb-10">
		<div class="card-block p-20">
			<h3 class="card-title text-success">Your order is confirmed</h3>
		</div>
		<div class="card-block p-20">
			  <h3 class="card-title">order items</h3>
			  <div class="order-confirmation-table float-left w-100">
        <?php while ($row = $products->fetch_assoc()){ ?>  
        <div class="order-line float-left w-100">
				    <div class="row">
				      <div class="col-sm-1 col-xs-3 float-left">
				        <img src="img/products/<?php echo $row['product_image'];?>" alt="">
				      </div>
				      <div class="col-sm-5 col-xs-9 details float-left">
					      <span><?php echo $row['product_name'];?></span>
				      </div>
				      <div class="col-sm-6 col-xs-12 qty float-left d-flex">
				        <div class="col-xs-5 col-sm-5 text-sm-right text-xs-left">$<?php echo $row['product_price']?></div>
				        <div class="col-xs-2 col-sm-2"><?php echo $row['product_quantity'] ?></div>
				        <div class="col-xs-5 col-sm-5 text-sm-right bold">$<?php echo $row['product_price'] * $row['product_quantity'];?></div>
              </div>
            </div>
			  </div>
		<?php } ?>
      <hr class="float-left w-100">
			<table class="float-left w-100 mb-30">
                              <tbody><tr class="mb-10">
              <td>Products Total</td>
              <td class="text-right">$<?php echo $totalProduct; ?></td>
            </tr>
                <tr class="mb-10">
              <td>Shipping Costs</td>
              <td class="text-right">$20.00</td>
            </tr>
          <tr class="font-weight-bold">
          <td><span class="text-uppercase">Total</span></td>
          <td class="text-right">$<?php echo $totalResult['order_cost']; ?></td>
        </tr>
      </tbody></table>
<div id="order-details" class="float-left w-100">
            <h3 class="h3 card-title">Order details:</h3>
            <ul>
              <li>Order reference:<?php echo $reference['order_id']; ?> </li>
              <li>Payment method: Cash on delevry</li>
                              <li>
                  Shipping method: Home delivery<br>
                </li>
                          </ul>
          </div>
		  
			</div>
		</div>
	</div>
</div>
</div>
</div>
    <!-- Footer -->
	<div class="block-newsletter"> 
				<div class="parallax" data-source-url="img/banner/parallax.jpg" style="background-image:url(img/banner/parallax.jpg); background-position:50% 65.8718%;">
				<div class="container">
					<div class="tt-newsletter col-sm-7">
							<h2 class="text-uppercase">Subscribe to our Newsletter</h2>
					</div>
					<div class="block-content col-sm-5">
					<form method="post" action="contact-us.php">
						<div class="input-group">
							<input type="email" name="email" value="" placeholder="Email address.." required="" class="form-control">
							<span class="input-group-btn">
			 <button class="btn btn-theme text-uppercase btn-primary" type="submit">Subscribe</button>
			 </span>
						</div>
					</form>
		</div>
				</div>
				</div>
			</div>
<footer class="page-footer font-small footer-default">
    <div class="container text-center text-md-left">
      <div class="row">
        <div class="col-md-2 footer-cms footer-column">
			<div class="ttcmsfooter">
              <div class="footer-logo"><img src="img/logos/footer-logo.png" alt="footer-logo"></div>
              <div class="footer-desc">At vero eos et accusamus et iusto odio dignissimos ducimus, duis faucibus enim vitae</div>
			  </div>
		</div>
        <div class="col-md-2 footer-column">
		<div class="title">
          <a href="#company" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">company</a>		  </div>
          <ul id="company" class="list-unstyled collapse">
            <li>
              <a href="#">search</a>            </li>
            <li>
              <a href="#">New Products</a>            </li>
            <li>
              <a href="category.php">Best Collection</a>            </li>
            <li>
              <a href="wishlist.php">wishlist</a>            </li>
          </ul>
        </div>
        <div class="col-md-2 footer-column">
			<div class="title">
          <a href="#products" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">products</a>		  </div>
          <ul id="products" class="list-unstyled collapse">
            <li>
              <a href="blog-details.php">blog</a>            </li>
            <li>
              <a href="about-us.php">about us</a>            </li>
            <li>
              <a href="contact-us.php">contact us</a>            </li>
            <li>
              <a href="my-account.php">my account</a>            </li>
          </ul>

        </div>
		<div class="col-md-2 footer-column">
					<div class="title">
          <a href="#account" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">your account</a>		  </div>
  <ul id="account" class="list-unstyled collapse">
	<li>
	  <a href="blog-details.php">personal info</a>            </li>
	<li>
	  <a href="#">orders</a>            </li>
	<li>
	  <a href="contact-us.php">addresses</a>            </li>
	<li>
	  <a href="my-account.php">my wishlists</a>            </li>
  </ul>

</div>
        <div class="col-md-2 footer-column">
		<div class="title">
          <a href="#information" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">store information</a>		  </div>
          <ul id="information" class="list-unstyled collapse">
            <li class="contact-detail links">
              <span class="address">
			  		<span class="icon"><i class="material-icons">location_on</i></span>
					<span class="data"> 4030, Central Bazzar, opp. Varachha Police Station, Varachha Main Road, Surat, Gujarat 395006, India</span>			  </span>            </li>
            <li class="links">
               <span class="contact">
			  		<span class="icon"><i class="material-icons">phone</i></span>
					<span class="data"><a href="tel:(99)55669999">+ (99) 55-669-999</a></span>			  </span>            </li>
            <li class="links">
               <span class="email">
			  		<span class="icon"><i class="material-icons">email</i></span>
					<span class="data"><a href="mailto:demo.store@gmail.com">demo.store@gmail.com</a></span>  </span>          </li>
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
  <!-- Footer -->
  




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
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ac1aabb4b401e45400e4197/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->	
		
		</body>
</html>




