<?php
session_start(); // Start the session if not started already
include 'php/config.php';
require 'server/cox.php';

// Logout logic
if (isset($_GET['logout'])) {
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy(); // Optional: Destroy the session data completely
    header('Location: index.php');
    exit;
}

$products = array(); // Initialisez $products en tant que tableau vide pour éviter les erreurs
$message = "";
$message1 = "";
if (isset($_POST["duree"]) && isset($_POST["generate"])) {
    $duree = $_POST['duree'];
    $meteo = $_POST['meteo'];

    switch ($duree) {
        case 1:
            if ($meteo == 'Sunny') {
                $message = "For your 1-day trip and sunny weather, you get a unique outfit composed of a :";
                $stmt = $conn->prepare("SELECT * FROM products where product_id IN (17, 16, 21);");
            } else {
                $message = "For your 1-day trip and sunny weather, you get a unique outfit composed of a :";
                $stmt = $conn->prepare("SELECT * FROM products where product_id IN (1, 19);");
            }
            break;

        case 2:
            if ($meteo == 'Sunny') {
                $message = "For your 2-days trip and sunny weather, you get a unique outfit composed of a :";
                $stmt = $conn->prepare("SELECT * FROM products where product_id IN (22, 24, 29, 28, 10);");
                $message1 = "These items can be mixed and matched to create different outfits for your trip!";
            } else {
                $message = "For your 2-days trip and sunny weather, you get a unique outfit composed of a :";
                $stmt = $conn->prepare("SELECT * FROM products where product_id IN (10, 12, 4,9, 15, 26  );");
                $message1 = "These items can be mixed and matched to create different outfits for your trip!";
            }
            break;
            
        case 3:
            if ($meteo == 'Sunny') {
                $message = "For your 3-days trip and sunny weather, you get a unique outfit composed of a :";
                $stmt = $conn->prepare("SELECT * FROM products where product_id IN (23, 13, 27, 15, 16, 17);");
                $message1 = "These items can be mixed and matched to create different outfits for your trip!";
            } else {
                $message = "For your 3-days trip and sunny weather, you get a unique outfit composed of a :";
                $stmt = $conn->prepare("SELECT * FROM products where product_id IN (7, 30, 9, 5, 22, 20, 1, 6, 5);");
                $message1 = "These items can be mixed and matched to create different outfits for your trip!";
            }
            break;
        case 4:
            if ($meteo == 'Sunny') {
                $message = "For your 4-days trip and sunny weather, you get a unique outfit composed of a :";
                $stmt = $conn->prepare("SELECT * FROM products where product_id IN (8, 30, 22, 29, 16, 17);");
                $message1 = "These items can be mixed and matched to create different outfits for your trip!";
            } else {
                $message = "For your 4-days trip and sunny weather, you get a unique outfit composed of a :";
                $stmt = $conn->prepare("SELECT * FROM products where product_id IN (2, 22, 24, 9, 10, 4, 30, 1, 19);");
                $message1 = "These items can be mixed and matched to create different outfits for your trip!";
            }
            break;
      case 5:
            if ($meteo == 'Sunny') {
                $message = "For your 5-days trip and sunny weather, you get a unique outfit composed of a :";
                $stmt = $conn->prepare("SELECT * FROM products where product_id IN (22, 24, 29, 28, 10, 23, 13, 27, 15, 16, 17);");
                $message1 = "These items can be mixed and matched to create different outfits for your trip!";
            } else {
                $message = "For your 5-days trip and sunny weather, you get a unique outfit composed of a :";
                $stmt = $conn->prepare("SELECT * FROM products where product_id IN (7, 30, 9, 5, 22, 20, 1, 19);");
                $message1 = "These items can be mixed and matched to create different outfits for your trip!";
            }
            break;
    }

    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Error in statement: " . $conn->error;
    }
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
	<button type="button" class="btn">
				<i class="material-icons">shopping_cart</i>
				</button>
				<div id="cart-dropdown" class="user-menu">
		<ul>
			<li><a href="cart_page.php" class="modal-view button">View Cart</a></li>
			<li><a href="checkout_page.php" class="modal-view button">Checkout</a></li>
			<li><a href="wishlist.php" class="modal-view button">Wishlist</a></li>
		</ul>
	</div>

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
    <div class="container text-center">
        <h1><strong>Travel Planner</strong></h1>
        <form method="POST">
            <label for="destination">Destination:</label>
            <select name="destination" required>
                <option value="Morocco">Morocco</option>
                <option value="France">France</option>
                <option value="Australia">Australia</option>
            </select>

            <label for="duree">Duration of the trip (days):</label>
            <input type="number" name="duree" required min="1" max="5">

            <label for="meteo">Expected Weather:</label>
            <select name="meteo" required>
                <option value="Sunny">Sunny</option>
                <option value="Rainy">Rainy</option>
                <option value="Snowy">Snowy</option>
            </select>

            <input type="submit" name="generate" value="Generate Outfits">
        </form>
        <br><br><br>
        <div class="text-center">
    <strong><?php echo $message; ?></strong>
</div>
<br><br>
        <div class="row d-flex flex-wrap">
            <?php
            foreach ($products as $product) {
                ?>
                <div class="product-layouts col-lg-3 col-md-4 col-sm-6 col-xs-6">
                    <div class="product-thumb">
                        <div class="image zoom">
                            <a href="<?php echo "product-details.php?product_id=" . $product['product_id']; ?>">
                                <img src="img/products/<?php echo $product['product_image']; ?>"/>
                            </a>
                        </div>
                        <div class="thumb-description">
                            <div class="caption">
                                <h4 class="product-title text-capitalize"><a
                                            href="<?php echo "product-details.php?product_id=" . $product['product_id']; ?>"><?php echo $product['product_name']; ?></a>
                                </h4>
                            </div>
                            <div class="rating">
                                <div class="product-ratings d-inline-block align-middle">
                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                    <span class="fa fa-stack"><i class="material-icons">star</i></span>
                                    <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                    <span class="fa fa-stack"><i class="material-icons off">star</i></span>
                                </div>
                            </div>
                            <div class="price">
                                <div class="regular-price">$<?php echo $product['product_price']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }

            // Si aucun produit n'est trouvé, vous pouvez afficher un message
            if (empty($products)) {
                echo '<p>No chosen duration.</p>';
            }
            ?>
        </div>
        <br><br><br><br>
        <div style="color: green;" class="text-center">
    <h6><strong><span color='Black'><?php echo $message1 ; ?></span></strong></h6>
</div>
    </div>
    <style>

        
        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        label {
            margin-bottom: 8px;
            color: #555;
        }

        input, select, textarea {
            margin-bottom: 16px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: black;
            color: #fff;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #808080;
        }

        /* Styles for the destination selector */
        select {
            justify-content: center;
            align-items: center;
            width: 50%;
            padding: 10px;
        }
    </style>
    
<br><br><br><br><br><br><br><br>
    <!-- Footer reste inchangé -->

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
                        <a href="shop.php">Offers</a> </li>
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
                        <a href="blog-details.php">personal info</a> </li>
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










