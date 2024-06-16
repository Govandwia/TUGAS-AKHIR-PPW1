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
            <h6>lorem ipsum dolor sit amet!</h6>
            <h4>Quam temporibus accusam <br> hic ducimus quia</h4>
            <p>Magni deserunt dolorem consectetur adipisicing elit. Corporis molestiae optio, laudantium odio quod rerum
              maiores, omnis unde quae illo.</p>
            <a href="products.html" class="filled-button">Products</a>
          </div>
        </div>
      </div>
      <!-- // Item -->
      <!-- Item -->
      <div class="item item-2">
        <div class="img-fill">
          <div class="text-content">
            <h6>magni deserunt dolorem harum quas!</h6>
            <h4>Aliquam iusto harum <br> ratione porro odio</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At culpa cupiditate mollitia adipisci assumenda
              laborum eius quae quo excepturi, eveniet. Dicta nulla ea beatae consequuntur?</p>
            <a href="about.html" class="filled-button">About Us</a>
          </div>
        </div>
      </div>
      <!-- // Item -->
      <!-- Item -->
      <div class="item item-3">
        <div class="img-fill">
          <div class="text-content">
            <h6>alias officia qui quae vitae natus!</h6>
            <h4>Lorem ipsum dolor <br>sit amet, consectetur.</h4>
            <p>Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate mi. Sed nec cursus augue. Phasellus lacinia ac
              sapien vitae dapibus. Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</p>
            <a href="contact.html" class="filled-button">Contact Us</a>
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
          <h4>Request a call back right now ?</h4>
          <span>Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</span>
        </div>
        <div class="col-md-4">
          <a href="contact.html" class="border-button">Contact Us</a>
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
            <span>Aliquam id urna imperdiet libero mollis hendrerit</span>
          </div>
        </div>

        <?php
        for ($i = 1; $i <= 3; $i++) {
          $sql = "SELECT * FROM products WHERE id = $i";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<div class="col-md-4">
              <div class="service-item" style="height: 400px;">
                <img src="' . $row["image_url"] . '" alt="">
                <div class="down-content">
                  <h4>' . $row["name"] . '</h4>
                  <p>' . $row["description"] . '</p>
                  <div class="price-stock">
                    <span>Price: ' . $row["price"] . '$</span><br>
                    <span>Stock: ' . $row["stock"] . '</span>
                  </div>
                  <a href="page/product-details.php?id='. $row['id'] . '" class="filled-button">View More</a>
                </div>
              </div>
            </div>';
          } else {
            echo "No products found.";
          }
        }
        ?>
      </div>
    </div>
  </div>
  <br><br><br><br><br><br>  <br><br><br><br><br><br>  
  
  <div class="new-arrivals">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>New Arrivals</h2>
            <span>Check out our latest products</span>
          </div>
        </div>

        <?php
        for ($i = 4; $i <= 6; $i++) {
          $sql = "SELECT * FROM products WHERE id = $i";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<div class="col-md-4">
              <div class="service-item" style="height: 400px;">
                <img src="' . $row["image_url"] . '" alt="">
                <div class="down-content">
                  <h4>' . $row["name"] . '</h4>
                  <p>' . $row["description"] . '</p>
                  <div class="price-stock">
                    <span>Price: $' . $row["price"] . '</span><br>
                    <span>Stock: ' . $row["stock"] . '</span>
                  </div>
                  <a href="page/product-details.php?id=' . $row['id'] . '" class="filled-button">View More</a>
                </div>
              </div>
            </div>';
          } else {
            echo "No products found.";
          }
        }
        ?>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <br><br><br><br><br><br>
  <br><br><br><br><br><br>
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>What they say <em>about us</em></h2>
          <span>testimonials from our greatest clients</span>
        </div>
      </div>
      <div class="col-md-12">
        <div class="owl-testimonials owl-carousel">

          <div class="testimonial-item">
            <div class="inner-content">
              <h4>George Walker</h4>
              <span>Chief Financial Analyst</span>
              <p>"Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem
                sit amet quam. Pellentesque in sagittis lacus."</p>
            </div>
            <img src="http://placehold.it/60x60" alt="">
          </div>

          <div class="testimonial-item">
            <div class="inner-content">
              <h4>John Smith</h4>
              <span>Market Specialist</span>
              <p>"In eget leo ante. Sed nibh leo, laoreet accumsan euismod quis, scelerisque a nunc. Mauris accumsan,
                arcu id ornare malesuada, est nulla luctus nisi."</p>
            </div>
            <img src="http://placehold.it/60x60" alt="">
          </div>

          <div class="testimonial-item">
            <div class="inner-content">
              <h4>David Wood</h4>
              <span>Chief Accountant</span>
              <p>"Ut ultricies maximus turpis, in sollicitudin ligula posuere vel. Donec finibus maximus neque, vitae
                egestas quam imperdiet nec. Proin nec mauris eu tortor consectetur tristique."</p>
            </div>
            <img src="http://placehold.it/60x60" alt="">
          </div>

          <div class="testimonial-item">
            <div class="inner-content">
              <h4>Andrew Boom</h4>
              <span>Marketing Head</span>
              <p>"Curabitur sollicitudin, tortor at suscipit volutpat, nisi arcu aliquet dui, vitae semper sem turpis
                quis libero. Quisque vulputate lacinia nisl ac lobortis."</p>
            </div>
            <img src="http://placehold.it/60x60" alt="">
          </div>

        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="callback-form">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Request a <em>call back</em></h2>
            <span>Etiam suscipit ante a odio consequat</span>
          </div>
        </div>
        <div class="col-md-12">
          <div class="contact-form">
            <form id="contact" action="" method="post">
              <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                  </fieldset>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*"
                      placeholder="E-Mail Address" required="">
                  </fieldset>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject"
                      required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message"
                      required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="submit" id="form-submit" class="border-button">Send Message</button>
                  </fieldset>
                </div>
              </div>
            </form>
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
                    <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*"
                      placeholder="E-Mail Address" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message"
                      required=""></textarea>
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