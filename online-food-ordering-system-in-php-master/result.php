<!-- result.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> 

    <style>  
        #header {
    width: 100%; /* Chiều rộng của phần header sẽ chiếm toàn bộ chiều rộng của trang */
    top: 0; /* Đặt phần header ở đỉnh trang */
    z-index: 999; /* Đảm bảo phần header hiển thị trên cùng của tất cả các yếu tố khác */
}
        /* Thêm kiểu cho phần hiển thị kết quả */
        h1 {
            padding-top:100px;
            margin: 30px ; /* Điều chỉnh margin-top để tạo khoảng cách giữa header và h1 */
            text-align: center;
            color: #f30;
            font-weight:500;
        }
        .food-item {
            margin-top:100px;
        }

        .food-item-wrap {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .food-item-wrap:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .figure-wrap {
            position: relative;
            overflow: hidden;
            border-radius: 5px;
        }

        .figure-wrap img {
            width: 100%;
            height: auto;
            display: block;
        }

        .content {
            padding-top: 15px;
        }

        .content h5 {
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 10px;
        }

        .product-name {
            font-size: 14px;
            color: #777;
        }

        .price-btn-block {
            margin-top: 10px;
            overflow: hidden;
        }

        .price {
            font-size: 18px;
            color: #333;
            font-weight: bold;
            float: left;
        }

        .btn {
            float: right;
        }
        /* CSS cho phần footer */



    </style>
</head>
<header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded"  src="images/logo.png" alt="" width=40px height=40px> </a>
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
        <h1>Search Results</h1>
<body>


        
    <div class="container">
       
        <?php
        
        include("connection/connect.php");  //include connection file
        error_reporting(0);  // using to hide undefine undex errors
        session_start(); //start temp session until logout/browser closed
        $servername = "localhost"; //server
        $username = "root"; //username
        $password = ""; //password
        $dbname = "online_rest";  //database
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        
        
        if(isset($_POST['search'])) {
            $search = $_POST['search'];
            
            // Truy vấn cơ sở dữ liệu để lấy kết quả tìm kiếm
            $query_res= mysqli_query($db, "SELECT * FROM dishes WHERE title LIKE '%$search%'");
            
            // Hiển thị kết quả tìm kiếm
            while($r=mysqli_fetch_array($query_res)) {
                echo '<div class="col-xs-12 col-sm-6 col-md-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/'.$r['img'].'">
                                <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                <div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="review pull-right"><a href="#">198 reviews</a> </div>
                            </div>
                            <div class="content">
                                <h5><a href="dishes.php?res_id='.$r['rs_id'].'">'.$r['title'].'</a></h5>
                                <div class="product-name">'.$r['slogan'].'</div>
                                <div class="price-btn-block"> <span class="price">$'.$r['price'].'</span> <a href="dishes.php?res_id='.$r['rs_id'].'" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                        </div>
                    </div>';
            }
        } else {
            echo "<p>No results found.</p>";
        }
        ?>
    </div>
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
