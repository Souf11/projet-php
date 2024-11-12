<?php
session_start(); // Start the session
include 'db.php'; // Include the database connection file

// Handle Sign-Up
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign_up'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists
    $check_email = $conn->prepare("SELECT * FROM users WHERE email=?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        echo "This email is already registered.";
    } else {
        // Insert the user data into the database
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "Sign Up successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Handle Sign-In
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign_in'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to find user by email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            header("../projet/proj/homep.php");
            // Redirect to another page after successful login (e.g., dashboard)
            // header("Location: dashboard.php");
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "No user found with that email!";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Car Repair | Maintenance</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen">
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Vegur_500.font.js" type="text/javascript"></script>
<script src="js/FF-cash.js" type="text/javascript"></script>
<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    $(".lightbox").append("<span></span>");
    $("a[data-gal^='prettyVideo']").prettyPhoto({
        animation_speed: 'normal',
        theme: 'facebook',
        slideshow: false,
        autoplay_slideshow: false
    });
});
</script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->
</head>
<body id="page3">
<div class="main-bg">
  <div class="bg">
    <!--==============================header=================================-->
    <header>
      <div class="main">
        <div class="wrapper">
          <h1><a href="index.html">Car Repair</a></h1>
          <div class="fright">
            <div class="indent"> <span class="address">8901 Marmora Road, Glasgow, D04 89GR</span> <span class="phone">Tel: +1 959 552 5963</span> </div>
          </div>
        </div>
        <nav>
          <ul class="menu">
            <li><a href="homep.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a class="active" href="maintenance.php">Maintenance </a></li>
            <li><a href="repair.php">Repair</a></li>
            <li><a href="price.php">Price List</a></li>
            <li><a href="locations.php">Locations</a></li>
            <!-- Profile Element -->
        <?php if (isset($_SESSION['user_email'])): ?>
            <li><a href="profile.php">Profile: <?php echo htmlspecialchars($_SESSION['user_email']); ?></a></li>
        <?php else: ?>
            <li><a href="login.php">Login</a></li>
        <?php endif; ?>
          </ul>
        </nav>
      </div>
    </header>
    <!--==============================content================================-->
    <section id="content">
      <div class="main">
        <div class="container_12">
          <div class="wrapper p4">
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
                  <article class="grid_4">
                    <div class="indent-left">
                      <h3>Why is Maintenance <strong>Important?</strong></h3>
                      <h6>Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</h6>
                      <p class="indent-bot">Sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua vero eos et accusam et justo duo dolores et ea rebum. </p>
                      <figure class="indent-bot"><img src="images/page3-img1.png" alt=""></figure>
                      <p class="prev-indent-bot2">Stet clita kasd gubergren, no sea takimata sanctus est:</p>
                      <ul class="list-2">
                        <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="#">Consetetur sadipscing elitr, sed diam </a></li>
                        <li><a href="#">Nonumy eirmod tempor invidunt ut labore </a></li>
                        <li><a href="#">Dolore magna aliquyam erat</a></li>
                      </ul>
                    </div>
                  </article>
                  <article class="grid_8">
                    <div class="indent-left2">
                      <h3 class="p1">Car Care Video Tutorials</h3>
                      <div class="wrapper img-indent-bot">
                        <figure class="img-indent3"><a class="lightbox" href="images/video-dummy.gif" data-gal="prettyVideo[prettyVideo-1]" title="Video 1"><img src="images/page3-img2.png" alt=""></a></figure>
                        <div class="extra-wrap">
                          <p class="p1">Video 1</p>
                          <h6><strong>Consetetur sadipscing elitr sed diam </strong></h6>
                          Nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est. </div>
                      </div>
                      <div class="wrapper img-indent-bot">
                        <figure class="img-indent3"><a class="lightbox" href="images/video-dummy.gif" data-gal="prettyVideo[prettyVideo-2]" title="Video 2"><img src="images/page3-img3.png" alt=""></a></figure>
                        <div class="extra-wrap">
                          <p class="p1">Video 2</p>
                          <h6><strong>Lorem ipsum dolor amet consetetur sadipscing </strong></h6>
                          Sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata. </div>
                      </div>
                      <div class="wrapper img-indent-bot">
                        <figure class="img-indent3"><a class="lightbox" href="images/video-dummy.gif" data-gal="prettyVideo[prettyVideo-3]" title="Video 3"><img src="images/page3-img4.png" alt=""></a></figure>
                        <div class="extra-wrap">
                          <p class="p1">Video 3</p>
                          <h6><strong>Dorem ipsum dolor sit amet</strong></h6>
                          Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum stet clita kasd gubergren. </div>
                      </div>
                      <div class="wrapper">
                        <figure class="img-indent3"><a class="lightbox" href="images/video-dummy.gif" data-gal="prettyVideo[prettyVideo-4]" title="Video 4"><img src="images/page3-img5.png" alt=""></a></figure>
                        <div class="extra-wrap">
                          <p class="p1">Video 4</p>
                          <h6><strong>Nam liber tempor cum soluta nobis eleifend </strong></h6>
                          Option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore. </div>
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