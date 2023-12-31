<?php
    session_start(); // Start the session if not started already
    
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
    <nav aria-label="breadcrumb" class="w-100 float-left mb-150 mb-sm-30">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="img/banner/advice.jpeg" style="background-image: url(&quot;img/banner/advice.jpeg&quot;); background-position: 50% 0.809717%;">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Style Tips</li>
        </ol>
    </nav>

  
        <section>
				<div class="center">
                    <div class="tt-title d-inline-block float-none w-100 text-center">Elevate your style with US:</div>
					<div class="category-description"> Welcome to <strong>"Style tips"</strong>, your go-to destination for style tips and fashion inspiration. Uncover the significance of understanding your body shape and learn how to choose clothing that accentuates your strengths. Stay up-to-date with the latest fashion trends, delve into the concept of a quality-focused capsule wardrobe, and discover specific advice for both men and women, ranging from haircut tips to unique style tricks. Find inspiration for every occasion, whether it's for work or casual moments, and gain insights into caring for your clothing to ensure longevity. We encourage you to share your own style tips and join our community, where the exchange of ideas and experiences is celebrated. </div>
				
			    </div>
                    <style>
                        section{
                            text-align: center;
                            padding: 22px;
                            color: black;
                        }
                    </style>
        </section>



        <section>
            <div class="center">
                <div class="category-description"> Fashion trends come and go, but style is more ethereal and personal, and it’s all about YOU. Style is an expression of who you are as an individual. It captures your character, whether you are a little bit quirky or super sophisticated. So, considering how important it is to be true to yourself, how do you adapt everyday fashion to fit in with your idea of style?</div>
                <br><br>
                <div class=" d-inline-block float-none text-center"><b><h5><strong>Here are five tips for you:</strong></h5></b></div>
            </div>
                <br><br><br>
                <img src="img/banner/trying.png" alt="center"/>
                <style>
                    section{
                        text-align: center;
                        padding: 22px;
                        color: black;
                    }
                    img{
                        height: 100%;
                        width: 80%;
                    }
                </style>
    </section>
       



    <section>
        <div class="center">
            <div class=" d-inline-block float-none text-center"><b><h5><strong>1- color Your World:</strong></h5></b></div>
            <div class="category-description">Embrace the art of subtlety by infusing your wardrobe with a diverse palette of colors. Whether you prefer muted tones for sophistication or bold hues for a statement, colors can be used strategically as accents, enhancing your overall look. Instead of making colors the focal point, consider integrating them into your ensemble through carefully chosen accessories.

                Take, for instance, the timeless and sophisticated shoulder bags from Beverly Hills Polo Club. These accessories not only exude elegance but also offer the perfect opportunity to introduce a pop of color into your workwear outfit. Opt for a rich burgundy or deep navy bag to complement a neutral business attire. This subtle infusion of color not only adds vibrancy but also showcases your style sensibility in a refined manner. Remember, it's the small details, like a tasteful pop of color, that can truly elevate your fashion game and make a lasting impression.</div>
            <br><br>
        </div>
            <br>
            <img src="img/banner/tryingg.png" alt="center"/>
            <style>
                section{
                    text-align: center;
                    padding: 22px;
                    color: black;
                }
                img{
                    height: 100%;
                    width: 80%;
                }
            </style>
</section>
<section>
    <div class="center">
        <div class=" d-inline-block float-none text-center"><b><h5><strong>2- Layer Up:</strong></h5></b></div>
        <div class="category-description">Master the art of layering to create a super-stylish look even in the heat of summer. This technique involves combining various fabrics, textures, colors, and lengths to add depth and interest to your outfit. Whether it's a lightweight scarf draped over a sundress or a stylish jacket thrown over a tank top, layering allows you to showcase your creativity and adapt to changing temperatures with ease.

            Extend this principle to your accessories, particularly jewelry, by experimenting with multiple necklaces of different lengths or stacking rings. This not only adds a personalized touch to your ensemble but also demonstrates your proficiency in the art of layering. The key is to strike a harmonious balance between elements, creating a visually appealing and well-coordinated look. So, even on the hottest days, you can effortlessly elevate your style by layering up with confidence and flair.</div>
        <br><br>
    </div>
        <br>
        <img src="img/banner/tryinggg.png" alt="center"/>
        <style>
            section{
                text-align: center;
                padding: 22px;
                color: black;
            }
            img{
                height: 100%;
                width: 80%;
            }
        </style>
</section>



<section>
    <div class="center">
        <div class=" d-inline-block float-none text-center"><b><h5><strong>3- Find your personal style:</strong></h5></b></div>
        <div class="category-description">Embark on the journey of discovering your personal style, a process that may take years to refine but is immensely rewarding. Kickstart this exploration by creating a moodboard that reflects your tastes, inspirations, and aspirations. A moodboard serves as a visual guide, helping you identify patterns and themes that resonate with you.

            Keep in mind that developing a signature style is an ongoing experiment. The thrill lies in the unexpected; you never truly know what amazing looks await you until you're in the dressing room, experimenting with different garments and accessories. Don't let traditional categories like 'menswear' or 'womenswear' limit your choices. Take the time to play with colors, shapes, and styles, allowing your unique personality to shine through.
            
            Remember, personal style is an expression of individuality, and there are no rigid rules. Embrace the joy of self-discovery in fashion, and relish the moments when you find that perfect ensemble that perfectly encapsulates who you are. So, let your wardrobe be a canvas, and enjoy the process of curating a style that is authentically and uniquely yours.</div>
        <br><br>
    </div>
        <br>
        <img src="img/banner/againn.png" alt="center"/>
        <style>
            section{
                text-align: center;
                padding: 22px;
                color: black;
            }
            img{
                height: 100%;
                width: 80%;
            }
        </style>
</section>


<section>
    <div class="center">
        <div class=" d-inline-block float-none text-center"><b><h5><strong>4- Find Clothes That Fit:</strong></h5></b></div>
        <div class="category-description">The cornerstone of elevating your style lies in the art of finding clothes that complement your unique body type. Regardless of the price tag, a well-fitted basic outfit will always outshine its expensive counterpart if it doesn't suit your physique. Central to this process is understanding your body shape and being knowledgeable about where to discover clothing that fits you perfectly. This fundamental principle applies universally, emphasizing that style is not about conforming to trends but rather about celebrating your individuality.

            For those seeking specialized sizes, such as plus-size clothing, exploring dedicated stores like Froxx can open up a world of stylish possibilities. These stores understand the importance of fashion inclusivity, offering a range of choices that cater specifically to diverse body shapes and sizes.
            
            Furthermore, the impact of a good tailor cannot be overstated. A skilled tailor possesses the ability to transform your wardrobe, ensuring that each garment is tailored precisely to your body. This attention to detail enhances the overall fit and appearance of your clothing, allowing you to showcase your style with confidence. Remember, the key to sartorial success is not just what you wear, but how well it fits your unique silhouette.</div>
        <br><br>
    </div>
        <br>
        <img src="img/banner/fit.png" alt="center"/>
        <style>
            section{
                text-align: center;
                padding: 22px;
                color: black;
            }
            img{
                height: 100%;
                width: 80%;
            }
        </style>
</section>




<section>
    <div class="center">
        <div class=" d-inline-block float-none text-center"><b><h5><strong>5- Play with Patterns and Textures</strong></h5></b></div>
        <div class="category-description">Dare to make a statement by incorporating patterns and textures into your wardrobe. Experimenting with different prints, fabrics, and textures can add depth and visual interest to your outfits. Whether it's classic stripes, playful polka dots, or sophisticated tweed, each pattern and texture tells a unique style story.

            Mix and match patterns with confidence, keeping in mind the scale and color coordination. For example, pair a striped shirt with a floral skirt for a playful yet balanced look. Similarly, consider incorporating textured pieces like a knit sweater, a suede jacket, or a velvet accessory to add a tactile dimension to your ensemble.
            
            Understanding how to balance patterns and textures allows you to create visually appealing and dynamic outfits. Don't shy away from combining contrasting elements – it's the juxtaposition of different patterns and textures that can make your style truly stand out.
            
            Remember, fashion is a form of self-expression, and playing with patterns and textures provides an excellent opportunity to showcase your creativity. So, embrace the diversity of prints and fabrics available, and let your wardrobe become a canvas for your unique style narrative.</div>
        <br><br>
    </div>
        <br>
        <img src="img/banner/againnn.png" alt="center"/>
        <style>
            section{
                text-align: center;
                padding: 22px;
                color: black;
            }
            img{
                height: 100%;
                width: 80%;
            }
        </style>
</section>


<section>
    <div class="center">
        <div class="tt-title d-inline-block float-none w-100 text-center">The Impact of Personal Style:</div>
        <div class="category-description"> Your personal style transcends beyond just clothing; it has a profound impact on your life. When you dress well, it’s not merely about looking good; it’s about feeling good and confident in your skin. Here’s how elevating your personal style can positively affect different aspects of your life:
            <br><br>
            <b>Enhanced Self-Esteem:</b> Dressing well boosts your self-esteem. When you feel good about your appearance, it reflects in your confidence. This newfound confidence can improve your interactions with others and open doors to new opportunities.
            <br>
            <b>Professional Success:</b> Whether you’re climbing the corporate ladder or starting your own business, a well-put-together look can significantly impact your professional success. It conveys professionalism and attention to detail, which are highly regarded in the business world.
            <br>
            <b>Improved Relationships:</b> Personal style also plays a role in your personal relationships. It can enhance your life by making you feel more attractive and confident. It also influences how others perceive you, which can lead to better connections with friends and family.
            <br>
            <b>Mental Well-Being: </b>Elevating your style can contribute to your mental well-being. It’s a form of self-care, and taking the time to select outfits that make you feel great can be a therapeutic and enjoyable experience.
            <br>
            <b>Social Opportunities:</b> A stylish appearance can open doors to social opportunities. Whether you’re attending parties, networking events, or simply going out with friends, a great look can make you stand out and facilitate new connections. Kolleqtive can also help you to connect to a peer community of entrepreneurs which can be valuable for networking, sharing experiences, and gaining support and insights from fellow entrepreneurs.
            <br><br>
            These tips should help you to improve your personal style. This can have a positive impact on many areas of your life and help to improve your self-esteem so it is certainly worth considering if you feel that this is an area of your life that needs some work.
            <br>
            <b>Unlock Your Personal Style Potential with Kolleqtive! Discover the Power of Self-Reflection and Self-Empowerment. Elevate Your Fashion Game Today!</b>
            </div>
            <br><br><br><br><br>
    
    </div>
        <style>
            section{
                text-align: center;
                padding: 22px;
                color: black;
            }
        </style>
</section>


 
    
        

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
<!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->

</body>


</html>