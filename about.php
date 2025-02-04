<?php
session_start(); // Start the session
include 'db.php'; // Include the database connection file

// Handle Sign-Up
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign_up'])) {
    $name = htmlspecialchars($_POST['name']);   // Sanitize input
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Check if the email already exists
        $check_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $check_email->execute([$email]);

        if ($check_email->rowCount() > 0) {
            echo "This email is already registered.";
        } else {
            // Insert the user data into the database
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $hashed_password]);

            echo "Sign Up successful!";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Handle Sign-In
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign_in'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    try {
        // Query to find user by email
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Start session and store user email
                $_SESSION['user_email'] = $email;

                // Redirect to home page after successful login
                header("Location: homep.php");
                exit();
            } else {
                echo "Incorrect password!";
            }
        } else {
            echo "No user found with that email!";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
<title>Car Repair | About</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style-new.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Vegur_300.font.js" type="text/javascript"></script>
<script src="js/Vegur_500.font.js" type="text/javascript"></script>
<script src="js/FF-cash.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->
</head>
<body id="page2">
<div class="main-bg">
  <div class="bg">
    <!--==============================header=================================-->
    <header>
      <div class="main">
        <div class="wrapper">
          <h1><a href="homep.html">Car Repair</a></h1>
          <div class="fright">
            <div class="indent"> <span class="address">8901 Marmora Road, Glasgow, D04 89GR</span> <span class="phone">Tel: +1 959 552 5963</span> </div>
          </div>
        </div>
        <nav>
    <ul class="menu">
        <li><a class="active" href="homep.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="maintenance.php">Maintenance</a></li>
        <li><a href="repair.php">Repair</a></li>
        <li><a href="price.php">Price List</a></li>
        <li><a href="locations.php">Locations</a></li>

        <!-- Profile Element -->
        <?php if (isset($_SESSION['user_email'])): ?>
            <li><span class="account">Profile: <?php echo htmlspecialchars($_SESSION['user_email']); ?></span></li>
            <li><a href="logout.php" class="logout">Logout</a></li>
        <?php else: ?>
            <li><a href="sign.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>
      </div>
    </header>
    <!--==============================content================================-->
    <section id="content">
      <div class="main">
        <div class="container_12">
          <div class="wrapper p5">
            <article class="grid_4">
              <div class="wrapper">
                <figure class="img-indent"><img src="images/page1-img1.png" alt=""></figure>
                <div class="extra-wrap">
                  <h4>Engine Repair</h4>
                  <p class="p2">Lorem ipsum dolosit amet, consetetur sadipng elitr sed diam nonumy eirmod.</p>
                  <a class="button" href="#">Read More</a> </div>
              </div>
            </article>
            <article class="grid_4">
              <div class="wrapper">
                <figure class="img-indent"><img src="images/page1-img2.png" alt=""></figure>
                <div class="extra-wrap">
                  <h4>Wheel Alignment</h4>
                  <p class="p2">Tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                  <a class="button" href="#">Read More</a> </div>
              </div>
            </article>
            <article class="grid_4">
              <div class="wrapper">
                <figure class="img-indent"><img src="images/page1-img3.png" alt=""></figure>
                <div class="extra-wrap">
                  <h4>Fluid Exchanges</h4>
                  <p class="p2">No sea takimata sanctus est gorem ipsum dolor sit amet forem ipsum.</p>
                  <a class="button" href="#">Read More</a> </div>
              </div>
            </article>
          </div>
          <div class="container-bot">
            <div class="container-top">
              <div class="container">
                <div class="wrapper">
                  <article class="grid_8">
                    <div class="indent-left">
                      <div class="wrapper border-bot2">
                        <figure class="img-indent2"><img src="images/page2-img1.png" alt=""></figure>
                        <div class="extra-wrap"> <strong class="text-1">Facebook</strong> <strong class="text-2">Fan Page</strong>
                          <p class="p0"><a class="link-2" href="#">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie...</a></p>
                        </div>
                      </div>
                      <h3 class="prev-indent-bot">Long-Term Business</h3>
                      <div class="wrapper img-indent-bot">
                        <figure class="img-indent3"><img src="images/page2-img2.png" alt=""></figure>
                        <div class="extra-wrap">
                          <h6>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </h6>
                          <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
                          <a class="button" href="#">Read More</a> </div>
                      </div>
                      <h3>Management Team</h3>
                      <p class="indent-bot">Vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</p>
                      <div class="wrapper">
                        <div class="col-1">
                          <figure class="indent-bot"><a href="#"><img src="images/page2-img3.png" alt=""></a></figure>
                          <h6><strong>Jason Walles</strong></h6>
                          Vero eos et accusam etsto duo dolores ea rebum tet clita kasd gubergren no sea takimata sanctus. </div>
                        <div class="col-1">
                          <figure class="indent-bot"><a href="#"><img src="images/page2-img4.png" alt=""></a></figure>
                          <h6><strong>William Torn</strong></h6>
                          Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor. </div>
                        <div class="col-2">
                          <figure class="indent-bot"><a href="#"><img src="images/page2-img5.png" alt=""></a></figure>
                          <h6><strong>Sam Smith</strong></h6>
                          Diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat sed diam. </div>
                      </div>
                    </div>
                  </article>
                  <article class="grid_4">
                    <div class="indent-left2 indent-top">
                      <div class="box indent-bot">
                        <div class="padding">
                          <div class="wrapper">
                            <figure class="img-indent"><img src="images/page1-img4.png" alt=""></figure>
                            <div class="extra-wrap">
                              <h3 class="p0">Our Hours:</h3>
                            </div>
                          </div>
                          <p class="p1"><strong>24 Hour Emergency Towing</strong></p>
                          <p class="color-1 p0">Monday - Friday: 7:30 am - 6:00</p>
                          <p class="color-1 p1">Saturday: 7:30 am - Noon</p>
                          Night Drop Available </div>
                      </div>
                      <div class="indent-left">
                        <h3 class="p0">Why Choose Us</h3>
                        <ul class="list-1">
                          <li><a href="#">Lorem ipsum dolor sit</a></li>
                          <li><a href="#">Amet consetetur sadipscing </a></li>
                          <li><a href="#">Sed diam nonumy eirmod </a></li>
                          <li><a href="#">Tempor invidunt</a></li>
                          <li><a href="#">Labore et dolore magna </a></li>
                          <li><a href="#">Aliquyam erat sed</a></li>
                          <li><a href="#">Diam voluptua vero eos et </a></li>
                          <li><a href="#">Accusam et justo duo</a></li>
                          <li><a href="#">Dolores et ea rebum</a></li>
                          <li><a href="#">Stet clita kasd gubergren</a></li>
                          <li><a href="#">No sea takimata</a></li>
                          <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                          <li><a href="#">Consetetur sadipscing</a></li>
                          <li><a href="#">Sed diam nonumy eirmod </a></li>
                          <li><a href="#">Tempor invidunt</a></li>
                          <li><a href="#">Labore et dolore magna </a></li>
                        </ul>
                      </div>
                    </div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--==============================footer=================================-->
    <footer>
      <div class="main"> <span>Copyright &copy; <a href="#">Domain Name</a> All Rights Reserved</span> Design by <a target="_blank" href="http://www.templatemonster.com/">TemplateMonster.com</a> </div>
    </footer>
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>