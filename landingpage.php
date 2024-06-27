<?php
// Include the database connection file
include 'conect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
    rel="stylesheet">

  <title>PHPJabbers.com | Free Mobile Store Website Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Header -->

  <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <h2>GG<em> labs</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
          aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="landingpage.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="page/products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="page/checkout.php">Checkout</a>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">account</a>

              <div class="dropdown-menu">
                <a class="dropdown-item" href="page/login.php">sign in</a>
                <a class="dropdown-item" href="page/signup.php">sign up</a>
              </div>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <div class="main-banner header-text" id="top">
    <div class="Modern-Slider">
      <!-- Item -->
      <div class="item item-1">
        <div class="img-fill">
          <div class="text-content">
            <h6>Free Shipping!</h6>
            <h4>Shop Laptops with No Shipping Fee</h4>
            <p>Take advantage of our free shipping promo on every laptop purchase. Valid across Indonesia.</p>
            <a href="page/products.php" class="filled-button">Products</a>
          </div>
        </div>
      </div>
      <!-- // Item -->
      <!-- Item -->
      <div class="item item-2">
        <div class="img-fill">
          <div class="text-content">
            <h6>Official Warranty</h6>
            <h4>Quality Assurance and After-Sales Service</h4>
            <p>We offer official warranties on all our laptop products. Buy with confidence and peace of mind.</p>
            <a href="page/login.php" class="filled-button">login</a>
          </div>
        </div>
      </div>
      <!-- // Item -->
      <!-- Item -->
      <div class="item item-3">
        <div class="img-fill">
          <div class="text-content">
            <h6>Best Deals This Week!</h6>
            <h4>Up to 30% Off <br> on Latest Laptops</h4>
            <p>Grab special offers on the latest laptops at the best prices. Don't miss out on this opportunity!</p>
            <a href="page/checkout.php" class="filled-button">checkout</a>
          </div>
        </div>
      </div>
      <!-- // Item -->
    </div>
  </div>
  <!-- Banner Ends Here -->

  <div class="request-form">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h4>Join Our Community Today!</h4>
          <span>Sign up now to receive the latest updates, special offers, and exclusive deals on laptops.</span>
        </div>
        <div class="col-md-4">
          <a href="page/signup.php" class="border-button">signup</a>
        </div>
      </div>
    </div>
  </div>

  <div class="services">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Featured <em>Products</em></h2>
            <span>Discover our top-rated laptops, handpicked just for you.</span>
          </div>
        </div>
        <div class="services">
          <div class="container">
            <div class="row">
              <?php
              // Fetch all products from the database
              $sql = "SELECT * FROM products WHERE id BETWEEN 1 AND 3";
              $result = mysqli_query($conn, $sql);

              // Check if there are any products
              if (mysqli_num_rows($result) > 0) {
                // Get the current page number from the URL
                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                // Calculate the starting index of the products for the current page
                $start = ($page - 1) * 6;

                // Fetch only 6 products for the current page
                $sql .= " LIMIT $start, 6";
                $result = mysqli_query($conn, $sql);

                // Loop through each product and display it
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <div class="col-md-4">
                    <div class="service-item">
                      <img src="<?php echo $row['image_url']; ?>" alt="">
                      <div class="down-content">
                        <h4><?php echo $row['name']; ?></h4>
                        <div style="margin-bottom:10px;">
                          <span>
                          <?php echo $row['price']; ?>$
                          </span>
                        </div>

                        <p><?php echo $row['description']; ?></p>
                        <p>Stock: <?php echo $row['stock']; ?></p>
                        <a href="page/product-details.php?id=<?php echo $row['id']; ?>" class="filled-button">View More</a>
                      </div>
                    </div>

                    <br>
                  </div>
                  <?php
                }
              } else {
                echo "No products found.";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="new-arrivals">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>New Arrivals</h2>
            <span>Check out our latest products</span>
          </div>
        </div>

        <div class="services">
          <div class="container">
            <div class="row">
              <?php

              // Fetch all products from the database
              $sql = "SELECT * FROM products WHERE id BETWEEN 4 AND 6";
              $result = mysqli_query($conn, $sql);

              // Check if there are any products
              if (mysqli_num_rows($result) > 0) {
                // Get the current page number from the URL
                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                // Calculate the starting index of the products for the current page
                $start = ($page - 1) * 6;

                // Fetch only 6 products for the current page
                $sql .= " LIMIT $start, 6";
                $result = mysqli_query($conn, $sql);

                // Loop through each product and display it
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <div class="col-md-4">
                    <div class="service-item">
                      <img src="<?php echo $row['image_url']; ?>" alt="">
                      <div class="down-content">
                        <h4><?php echo $row['name']; ?></h4>
                        <div style="margin-bottom:10px;">
                          <span>
                            <?php echo $row['price']; ?>$
                          </span>
                        </div>

                        <p><?php echo $row['description']; ?></p>
                        <p>Stock: <?php echo $row['stock']; ?></p>
                        <a href="page/product-details.php?id=<?php echo $row['id']; ?>" class="filled-button">View More</a>
                      </div>
                    </div>

                    <br>
                  </div>
                  <?php
                }
              } else {
                echo "No products found.";
              }
              ?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  </div>
  </div>
  </div>
  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="section-heading">
        <h2>What They Say <em>About Us</em></h2>
        <span>Testimonials from our satisfied customers</span>
      </div>
    </div>
    <div class="col-md-12">
      <div class="owl-testimonials owl-carousel">

        <div class="testimonial-item">
          <div class="inner-content">
            <h4>George Walker</h4>
            <span>Chief Financial Analyst</span>
            <p>"The laptop I purchased from here has been amazing. Great performance and excellent customer service. Highly recommend!"</p>
          </div>
          <img src="http://placehold.it/60x60" alt="George Walker">
        </div>

        <div class="testimonial-item">
          <div class="inner-content">
            <h4>John Smith</h4>
            <span>Market Specialist</span>
            <p>"Excellent range of laptops to choose from. The support team helped me pick the perfect one for my needs."</p>
          </div>
          <img src="http://placehold.it/60x60" alt="John Smith">
        </div>

        <div class="testimonial-item">
          <div class="inner-content">
            <h4>David Wood</h4>
            <span>Chief Accountant</span>
            <p>"Great prices and fast delivery. The laptop works perfectly, and the overall shopping experience was fantastic."</p>
          </div>
          <img src="http://placehold.it/60x60" alt="David Wood">
        </div>

        <div class="testimonial-item">
          <div class="inner-content">
            <h4>Andrew Boom</h4>
            <span>Marketing Head</span>
            <p>"Very satisfied with the purchase. The laptop exceeded my expectations, and the customer service was outstanding."</p>
          </div>
          <img src="http://placehold.it/60x60" alt="Andrew Boom">
        </div>

      </div>
    </div>
  </div>
</div>



  <br>
  <br>
  <br>
  <br>
  </div>
  </div>

  <!-- Footer Starts Here -->
  <footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 footer-item">
        <h4>GG LABS</h4>
        <p>Your one-stop shop for the latest and greatest laptops. Quality products and exceptional customer service.</p>
        <ul class="social-icons">
          <li><a rel="nofollow" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
      <div class="col-md-4 footer-item">
        <h4>Useful Links</h4>
        <ul class="menu-list">
          <li><a href="#">Home</a></li>
          <li><a href="#">Shop</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-34footer-item">
        <h4>Additional Pages</h4>
        <ul class="menu-list">
          <li><a href="#">Products</a></li>
          <li><a href="#">Our Team</a></li>
          <li><a href="#">Testimonials</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Terms & Conditions</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<div class="sub-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>
          Copyright © 2024 GG LABS
        </p>
      </div>
    </div>
  </div>
</div>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/slick.js"></script>
  <script src="assets/js/accordions.js"></script>

  <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0;
    function clearField(t) {
      if (!cleared[t.id]) {
        cleared[t.id] = 1;
        t.value = '';
        t.style.color = '#fff';
      }
    }
  </script>

</body>

</html>