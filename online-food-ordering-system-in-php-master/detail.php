<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>

<body class="home">
    
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/logo.png" alt="" width=40px height=40px> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Branch <span class="sr-only"></span></a> </li>
                            
                           
							<?php
						if(empty($_SESSION["user_id"])) // if user is not login
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">signup</a> </li>';
							}
						else
							{
									//if user is login
									
									echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">your orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';
							}

						?>
							 
                        </ul>
						 
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->
        </header>
        <div class="page-wrapper">
            <!-- top Links -->
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                       
                        <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="restaurants.php">Choose Branch</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Order noodles</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>
            <!-- end:Top links -->
            <!-- start: Inner page hero -->
            <div class="inner-page-hero bg-image" data-image-src="images/img/res.jpeg">
                <div class="container"> </div>
                <!-- end:Container -->
            </div>
            
            <?php 
// Include the connection file
include("connection/connect.php");

// Check if the 'd_id' parameter is set in the URL
if(isset($_GET['d_id'])) {
    // Sanitize the input to prevent SQL injection
    $d_id = mysqli_real_escape_string($db, $_GET['d_id']);

    // Fetch product details from the database based on the d_id
    $query_res = mysqli_query($db, "SELECT * FROM dishes WHERE d_id = '$d_id' LIMIT 1"); 
    if($r = mysqli_fetch_array($query_res)) {
?>
   <div class="product-container">
    <div class="row">
        <div class="col-md-6">
            <img src="admin/Res_img/dishes/<?php echo $r['img']; ?>" alt="<?php echo $r['title']; ?>" class="img-fluid">
        </div>
        <div class="col-md-6">
        
            <div class="product-details">
                <br>
                <h1><?php echo $r['title']; ?></h1>
                <br>
                <p class="price">$<?php echo $r['price']; ?></p>
                <br>
                <p class="slogan"><?php echo $r['slogan']; ?></p>
                <br>
                <p >
                    SQUEEZED NOODLES - Wheat flour (75.0%), shortening, coloring agent (curcumin (E100(i))).

SEASONING PACKET - Shrimp powder (30 g/kg), palm oil, salt, sugar, garlic powder, chili powder, dried spring onion, acid regulator (citric acid (E330)), flavor enhancer (monosodium L-glutamate (E621), disodium 5'-inosinate (E631), disodium 5'-guanylate (E627)).
                        </p>
                        <br>
                        <br>
                <label class="add-to-card"><a href="restaurants.php">Add to card</a></label>
            </div>
            
        </div>
    </div>
</div>

<?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid product id.";
}
?>

            
            <section class="app-section">
                <div class="app-wrap">
                    <div class="container">
                        <div class="row text-img-block text-xs-left">
                            <div class="container">
                                <div class="col-xs-12 col-sm-6 hidden-xs-down right-image text-center">
                                    <figure> <img src="images/app.png" alt="Right Image"> </figure>
                                </div>
                                <div class="col-xs-12 col-sm-6 left-text">
                                    <h3>The Best Food Delivery App</h3>
                                    <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use Food Delivery &amp; Takeout App.</p>
                                    <div class="social-btns">
                                        <a href="#" class="app-btn apple-button clearfix">
                                            <div class="pull-left"><i class="fa fa-apple"></i> </div>
                                            <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">App Store</span> </div>
                                        </a>
                                        <a href="#" class="app-btn android-button clearfix">
                                            <div class="pull-left"><i class="fa fa-android"></i> </div>
                                            <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">Play store</span> </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- start: FOOTER -->
            <footer class="footer">
                <div class="container">
                    <!-- top footer statrs -->
                    <div class="row top-footer">
                        <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                            <a href="#"> <img src="images/logo.png" alt="Footer logo" width=180px height=180px> </a> <span>Order Delivery &amp; Take-Out </span> </div>
                        <div class="col-xs-12 col-sm-2 about color-gray">
                            <h5>About Us</h5>
                            <ul>
                                <li><a href="#">About us</a> </li>
                                
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-2 how-it-works-links color-gray">
                            <h5>How it Works</h5>
                            <ul>
                               
                                <li><a href="#">Choose restaurant</a> </li>
                              
                                <li><a href="#">Wait for delivery</a> </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-2 pages color-gray">
                            <h5>Pages</h5>
                            <ul>
                            
                                <li><a href="#">Make order</a> </li>
                                <li><a href="#">Add to cart</a> </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-3 popular-locations color-gray">
                            <h5>Popular locations</h5>
                            <ul>
                                <li><a href="#">District 1</a> </li>
                                <li><a href="#">District 5</a> </li>
                                <li><a href="#">District 3</a> </li>
                              
                            </ul>
                        </div>
                    </div>
                    <!-- top footer ends -->
                    <!-- bottom footer statrs -->
                    <div class="row bottom-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 payment-options color-gray">
                                    <h5>Payment Options</h5>
                                    <ul>
                                        <li>
                                            <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                        </li>
                                     
                                        <li>
                                            <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                        </li>
                                     
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4 address color-gray">
                                    <h5>Address</h5>
                                    <p>Concept design of oline food order and deliveye,planned as branch directory</p>
                                    <h5>Phone: <a href="tel:+080000012222">0909 683 737</a></h5> </div>
                                <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                    <h5>Addition informations</h5>
                                    <p>Join the thousands of other restaurants who benefit from having their menus on TakeOff</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- bottom footer ends -->
                </div>
            </footer>
            <!-- end:Footer -->
        </div>
  
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>
<style>
.container {
  
  align-items: center;
}

#product-img {
  margin-right: 20px; 
  margin-top: 30px;
  width: 50px;
  height:50px;
}

#product-info {
  display: flex;
  flex-direction: column;
  margin-left: 500px;
}

#product-info h1 {
  margin-top: 0px; 
  
}

#product-info label {
  margin-top: 0px;
  font-size: 30px;
 
}
#product-detail p{
    margin-top: 100px;
    font-size: 20px;
    text-align: justify;
}

.add-to-card a {
  display: inline-block;
  padding: 8px 16px;
  background-color: #4CAF50;
  color: white;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  border-radius: 4px;
  cursor: pointer;
}

.add-to-card a:hover {
  background-color: #45a049;
}
.product-details {
    padding: 20px;
    
}
.product-container {
    margin:50px;
    padding: 50px;
    border: 1px solid #ddd; /* Viền sản phẩm */
    border-radius: 10px; /* Bo tròn viền */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Tạo hiệu ứng mờ */
    display: flex; /* Sử dụng flexbox để căn chỉnh hình ảnh và chi tiết sản phẩm */
}

.product-details h1 {
    font-size: 24px;
    margin-bottom: 10px;
}

.product-details p {
    font-size: 18px;
    margin-bottom: 10px;
}

.product-details .price {
    font-weight: bold;
}

.product-details .slogan {
    color: #777;
}

}
</style>