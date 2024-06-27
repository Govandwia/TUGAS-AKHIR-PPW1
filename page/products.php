<?php
include '../conect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>GG LABS | Laptop Store</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../assets/css/fontawesome.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/owl.css">
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
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="../landingpage.php"><h2>GG<em> labs</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../landingpage.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="products.php">Products
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="checkout.php">Checkout</a>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="login.php">Sign In</a>
                <a class="dropdown-item" href="signup.php">Sign Up</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Page Content -->
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>Our Products</h1>
          <span>Discover the best laptops at GG LABS</span>
        </div>
      </div>
    </div>
  </div>

  <div class="services">
    <div class="container">
      <div class="row">
        <?php
        // Fetch total products count
        $total_products_sql = "SELECT COUNT(*) as total FROM products";
        $total_products_result = mysqli_query($conn, $total_products_sql);
        $total_products_row = mysqli_fetch_assoc($total_products_result);
        $total_products = $total_products_row['total'];

        // Get the current page number from the URL
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 6;
        $start = ($page - 1) * $limit;

        // Fetch products for the current page
        $sql = "SELECT * FROM products LIMIT $start, $limit";
        $result = mysqli_query($conn, $sql);

        // Check if there are any products
        if (mysqli_num_rows($result) > 0) {
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
                  <a href="product-details.php?id=<?php echo $row['id']; ?>" class="filled-button">View More</a>
                </div>
              </div>
              <br>
            </div>
            <?php
          }

          // Calculate the total number of pages
          $total_pages = ceil($total_products / $limit);

          // Display the pagination links
          ?>
          <nav>
            <ul class="pagination pagination-lg justify-content-center">
              <?php if ($page > 1) { ?>
                <li class="page-item">
                  <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
              <?php } ?>
              <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                  <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
              <?php } ?>
              <?php if ($page < $total_pages) { ?>
                <li class="page-item">
                  <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </nav>
          <?php
        } else {
          echo "<p class='text-center'>No products found.</p>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
      </div>
    </div>
  </div>
  <br><br><br><br>

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
        <div class="col-md-4 footer-item">
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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Additional Scripts -->
  <script src="../assets/js/custom.js"></script>
  <script src="../assets/js/owl.js"></script>
  <script src="../assets/js/slick.js"></script>
  <script src="../assets/js/accordions.js"></script>

  <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
      if (!cleared[t.id]) { // function makes it static and global
        cleared[t.id] = 1; // you could use true and false, but that's more typing
        t.value = ''; // with more chance of typos
        t.style.color = '#fff';
      }
    }
  </script>

</body>

</html>
