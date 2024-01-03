<?php
session_start();
$_SESSION['ch']=false;
include('php/config.php');
if(isset( $_SESSION['logged_in'] )){
$stmt = $conn->prepare("SELECT order_id,order_status,order_date FROM orders where user_id= ? ");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$orders = $stmt->get_result();

// Include the configuration file
include 'php/config.php';
require 'server/cox.php';

if (isset($_GET['logout'])) {
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();
    header('Location: index.php');
    exit;
}

$conn = cnx_pdo();
$errorMsg = '';
$successMsg = '';

$reqUser = $conn->prepare("SELECT * FROM users WHERE user_email = :user_email");
$reqUser->bindValue(':user_email', $_SESSION['user_email']);
$reqUser->execute();
$user = $reqUser->fetch();


function updateUserName($conn, $newName, $userEmail) {
    $reqName = $conn->prepare("UPDATE users SET user_name = :name WHERE user_email = :user_email");
    $reqName->bindValue(':name', $newName);
    $reqName->bindValue(':user_email', $userEmail);
    $reqName->execute();
}

function updateUserPassword($conn, $newPassword, $userEmail) {
    $reqPass = $conn->prepare("UPDATE users SET user_password = :pass WHERE user_email = :user_email");
    $reqPass->bindValue(':user_email', $userEmail);
    $reqPass->bindValue(':pass', $newPassword);
    $reqPass->execute();
}

}else{
    header('location:login.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['new_name'])) {
        $updatename = $_POST['new_name'];
        updateUserName($conn, $updatename, $_SESSION['user_email']);
        $_SESSION['successMsg'] = 'Username updated successfully.';
    }

    if (!empty($_POST['old_password']) && !empty($_POST['new_password'])) {
        $oldpass = md5($_POST['old_password']);
        $updatepass = md5($_POST['new_password']);

        if ($oldpass === $user['user_password']) {
            if (strlen($_POST['new_password']) > 6) {
            updateUserPassword($conn, $updatepass, $_SESSION['user_email']);
            $_SESSION['successMsg'] = 'Password updated successfully.';
            } else{
                $_SESSION['errorMsg'] = "The new password must be at least 6 characters long.";
            }
        } else {
            $_SESSION['errorMsg'] = 'Old password is incorrect. Password not updated.';
        }
    }

    header("Location: my-account.php");
    exit();
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
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
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
    <nav aria-label="breadcrumb" class="w-100 float-left">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="img/banner/meeh.jpg" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">my-account</li>
        </ol>
    </nav>




    


    <div class="main-content">
    <div class="container">
        <div class="edit">
        <!-- Left Section - Display User Information -->
        <div class="left-section">
        <div class="text-center">
                <h4>User Information</h4>
                <div class="user-info">
                    <p>Name: <?= $user['user_name']; ?></p>
                    <p>Email: <?= $user['user_email']; ?></p>
<br><br>        
                    <strong><p><a href="#orders" id="orders-btn"> Your Orders</a></p></strong>
                    <div class="table-responsive">
                    <table class="table product-table text-center">
                        <thead>
                            <tr>
                                <th class="table-id text-uppercase">Order ref</th>
                                <th class="table-statut text-uppercase">Statut</th>
                                <th class="table-date text-uppercase">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = $orders->fetch_assoc()){ ?>
                            <tr>
                                <td class="table-id text-uppercase"><?php echo $row['order_id']; ?></td>
                                <td class="table-statut text-uppercase"><?php echo $row['order_status']; ?></td>
                                <td class="table-date text-uppercase"><?php echo $row['order_date']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                    </div>
                </div>
            
        </div>

        <!-- Right Section - Form for Modifying Information -->
        <div class="right-section">
    <h4>Edit Account Information</h4>
    <?php
        if (isset($_SESSION['successMsg'])) {
            echo '<div style="color: green;">' . $_SESSION['successMsg'] . '</div>';
            unset($_SESSION['successMsg']);
        }

        if (isset($_SESSION['errorMsg'])) {
            echo '<div style="color: red;">' . $_SESSION['errorMsg'] . '</div>';
            unset($_SESSION['errorMsg']);
        }
        ?>
    <form action="#" method="post" class="myaccount-form">
            <!-- Update Name -->
            <div class="form-group">
                <label for="new_name">New Name</label>
                <input type="text" class="form-control" id="new_name" name="new_name" value="<?php echo $user['user_name']; ?>" required="">
            </div>

            <!-- Change Password -->
            <div class="form-group">
                <label for="old_password">Old Password</label>
                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter old password">
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password">
            </div>

            <!-- Other form fields go here -->

        <!-- Your existing form fields go here -->

        <div class="form-footer">
            <button type="submit" class="btn btn-primary" name="update_user_info">Save</button>
        </div>
        <!-- End .form-footer -->
    </form>
        </div>
    <style>
        .main-content {
            margin-top: 20px;
        }

        .edit {
            display: flex;
            justify-content: space-between;
        }

        .left-section {
            flex: 0.3;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .right-section {
            flex: 0.65;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .user-info {
            margin-bottom: 20px;
        }

        .user-info p {
            margin: 0;
        }

        .myaccount-form {
            max-width: 400px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
    </style>
    </div>
</div>

<style>
    /* Add space between the </div> and <footer> */
    .page-footer {
        margin-top: 30px; /* Adjust the value to your desired space */
    }
</style>

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
		</body>
</html>

<?php
session_write_close();
?>