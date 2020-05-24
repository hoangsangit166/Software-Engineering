<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title  -->
    <title>Cosmetics Care</title>
    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.php"><img src="img/core-img/logo.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="index.php">Home</a>
                        
                            </li>
                            <li><a href="#">Product</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="login/login.php"><img src="img/core-img/user.svg" alt=""></a>
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""></a>
                </div>
            </div>
        </div>
    </header>

    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url(img/bg-img/bg-1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h4>QuynhAnh's</h4>
                        <h2>Cosmetic</h2>
                        <a href="#" class="btn essence-btn">view product</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### --

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Popular Products</h2>
                    </div>
                </div>
            </div>

        <?php

            if(isset($_SESSION['success']) && $_SESSION['success'] != '')
            {
              echo '<h2> '. $_SESSION['success']. '</h2>';
              unset($_SESSION['success']);
            }

            if(isset($_SESSION['status']) && $_SESSION['status'] != '')
            {
              echo '<h2 class = "bg-info"> '. $_SESSION['status']. '</h2>';
              unset($_SESSION['status']);
            }    
        
        ?>

        
        <div class="row">
        <?php
          $connection = mysqli_connect("localhost","root","","cosmetic");
          $query = "SELECT * from product";
          $query_run = mysqli_query($connection,$query);
          ?>
            <?php 
        while($row = mysqli_fetch_assoc($query_run))
        {
            ?>
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="product text-center">
                  <button  class="d-block mb-0 thumbnail"><img src="<?= $row['image'] ?>" alt="Image" class="img-fluid"></button>
                  <div class="product-body">
                    <h3 class="heading mb-0"><a href="#"><?php echo $row['name'] ?></a></h3>
                    <strong class="price"><?= number_format($row['price'], 0)."$"  ?></strong><br>
          <a href="login/login.php"  data-toggle="modal" data-target="#myModal<?= $row['id'] ?>" ><button type="button" class="btn btn-info">Order Here</button></a>
                  </div>
                </div>
            </div>


            
            <div class="modal fade" id="myModal<?= $row['id'] ?>" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title"><?php echo $row['name'] ?></h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="admin/code.php" method="POST">
                    <div class="modal-body">
                    <input type="hidden" name = "producttypeID" value = "<?= $row['id']?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <b><?php echo $row['detail'] ?></b>
                            </div>
                    
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label class="font-weight-bold text-black">Name</label>
                                        <div class="field-icon-wrap">
                                            <i class="icon ion-android-person"></i>
                                            <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="font-weight-bold text-black">Phone</label>
                                        <div class="field-icon-wrap">
                                            <i class="icon ion-android-person"></i>
                                            <input type="text" class="form-control" name="phone"  placeholder="Enter phone" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="font-weight-bold text-black">Email</label>
                                        <div class="field-icon-wrap">
                                            <i class="icon ion-android-person"></i>
                                            <input type="email" class="form-control" name="email"  placeholder="Enter email" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label class="font-weight-bold text-black">Address</label>
                                        <div class="field-icon-wrap">
                                            <i class="icon ion-android-person"></i>
                                            <input type="text" class="form-control" name="address" placeholder="Enter address" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="modal-footer">
                      <button type="submit"  name="book_roombtn" class="btn btn-info">Order</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
            <?php       
        }       
        ?>
        </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="#"><img src="img/core-img/logo2.png" alt=""></a>
                        </div>
    <!-- Footer Menu -->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Payment Options</a></li>
                            <li><a href="#">Shipping and Delivery</a></li>
                            <li><a href="#">Guides</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row align-items-end">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_heading mb-30">
                            <h6>Subscribe</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="mail" placeholder="Your email here">
                                <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

<div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->


    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>
</html>