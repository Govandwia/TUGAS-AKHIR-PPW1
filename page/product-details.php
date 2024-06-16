
<?php
  include '../conect.php';

  // Get the product ID from the URL
  $product_id = $_GET['id'];

  // Fetch the product details from the database based on the ID
  $query = "SELECT * FROM products WHERE id = $product_id";
  $result = mysqli_query($conn, $query);
  $product = mysqli_fetch_assoc($result);

  // Close the database connection
  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
  <>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Mobile Store Website Template</title>

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

    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>GG<em> labs</em></h2></a>
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
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">account</a>
              
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="login.php">sign in</a>
                    <a class="dropdown-item" href="signup.php">sign up</a>
                </div>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    
    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><small><del><sup>$</sup><?php echo $product['price']; ?></del></small> &nbsp; <sup>$</sup></h1>
            <span>
                <?php echo $product['description']; ?>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div>
              <img src="<?php echo $product['image_url']; ?>" alt="" class="img-fluid wc-image">
            </div>

            <br>
            <br>
          </div>

          <div class="col-md-5">
            <div class="sidebar-item recent-posts">
              <div class="sidebar-heading">
                <h4>Info</h4>
              </div>

              <div class="content">
                <p><?php echo $product['description']; ?></p>
              </div>
            </div>

            <br>
            <br>
          
            <h4>Add to Cart</h4>

            <br>

              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="text" value="1" required="" class="form-control">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <a href="#"class="filled-button">Add to Cart</a>
                  </div>
                </div>
              </div>
            </form>

            <br>
          </div>
        </div>

        <br>
        <div class="row">
          <div class="col-md-12">
            <h4>Reviews</h4>
            <div class="review">
              <div class="review-user">
                <img src="../assets/images/user-1.jpg" alt="">
                <span>John Doe</span>
              </div>
              <div class="review-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, voluptate.</p>
              </div>
            </div>
            <div class="review">
              <div class="review-user">
                <img src="../assets/images/user-2.jpg" alt="">
                <span>Jane Smith</span>
              </div>
              <div class="review-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, voluptate.</p>
              </div>
            </div>
            <div class="review">
              <div class="review-user">
                <img src="../assets/images/user-3.jpg" alt="">
                <span>David Johnson</span>
              </div>
              <div class="review-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, voluptate.</p>
              </div>
            </div>
          </div>
        </div>
        
        <br>
      </div>
    </div>


    <!-- Footer Starts Here -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-item">
            <h4>Mobile Store</h4>
            <p>Vivamus tellus mi. Nulla ne cursus elit,vulputate. Sed ne cursus augue hasellus lacinia sapien vitae.</p>
            <ul class="social-icons">
              <li><a rel="nofollow" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Useful Links</h4>
            <ul class="menu-list">
              <li><a href="#">Vivamus ut tellus mi</a></li>
              <li><a href="#">Nulla nec cursus elit</a></li>
              <li><a href="#">Vulputate sed nec</a></li>
              <li><a href="#">Cursus augue hasellus</a></li>
              <li><a href="#">Lacinia ac sapien</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Additional Pages</h4>
            <ul class="menu-list">
              <li><a href="#">Products</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Terms</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item last-item">
            <h4>Contact Us</h4>
            <div class="contact-form">
              <form id="contact footer-contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>
                Copyright © 2020 Company Name
                - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
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

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>