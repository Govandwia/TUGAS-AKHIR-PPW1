<?php
  include '../conect.php';

  
  $product_id = $_GET['id'];
  // Fetch the product details from the database based on the product_id
  $query = "SELECT * FROM products WHERE id = $product_id";
  $result = mysqli_query($conn, $query);
  $product = mysqli_fetch_assoc($result);

  
?>
<!DOCTYPE html>
<html lang="en">

  <head>

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
er End ***** -->

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
              <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
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
            <h1>bring your needs</h1>
            <span>
            </span>
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>" class="img-fluid">
            </div>
            <br>
            <div class="col-md-6">
                <h2><?php echo $product['name']; ?></h2>
                <p class="text-muted"><?php echo $product['description']; ?></p>
                <p class="price"><?php echo $product['price']; ?>$</p>
                <form action="" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="quantity" value="1">
                    <?php
                    if(isset($_POST['add_to_cart'])) {
                      $product_id = $_POST['product_id'];
                      $quantity = $_POST['quantity'];
                      
                      // Insert the product into the order_items table
                      $insert_query = "INSERT INTO order_items (product_id, quantity, price) VALUES ('$product_id', '$quantity', '{$product['price']}')";
                      mysqli_query($conn, $insert_query);
                      
                      // Redirect to the cart page or any other desired page
                      header("Location: checkout.php");
                      exit();
                    }
                    ?>
                    <button type="submit" class="btn btn-primary" name="add_to_cart">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <br><br><br><br><br>
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