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
<title>Car Repair | Locations</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Vegur_500.font.js" type="text/javascript"></script>
<script src="js/FF-cash.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->
</head>
<body id="page6">
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
            <li><a href="maintenance.php">Maintenance </a></li>
            <li><a href="repair.php">Repair</a></li>
            <li><a href="price.php">Price List</a></li>
            <li><a class="active" href="locations.php">Locations</a></li>
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
                      <h3 class="p1">Feedback</h3>
                      <form id="contact-form" action="#" method="post" enctype="multipart/form-data">
                        <fieldset>
                          <label><span class="text-form">Name:</span>
                            <input name="name" type="text" />
                          </label>
                          <label><span class="text-form">Email:</span>
                            <input name="email" type="text" />
                          </label>
                          <label><span class="text-form">Phone:</span>
                            <input name="phone" type="text" />
                          </label>
                          <div class="wrapper">
                            <div class="text-form">Message:</div>
                            <div class="extra-wrap">
                              <textarea></textarea>
                              <div class="clear"></div>
                              <div class="buttons"> <a class="button" href="#">Clear</a> <a class="button" href="#">Send</a> </div>
                            </div>
                          </div>
                        </fieldset>
                      </form>
                    </div>
                  </article>
                  <article class="grid_4">
                    <div class="indent-left2 indent-top">
                      <div class="box p4">
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
                      <figure class="indent-bot">
                        <iframe width="260" height="202" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                      </figure>
                      <div class="indent-left">
                        <dl class="main-address">
                          <dt>Demolink.org 8901 Marmora Road,<br>
                            Glasgow, D04 89GR.</dt>
                          <dd><span>Telephone:</span> +1 959 552 5963;</dd>
                          <dd><span>FAX:</span> +1 959 552 5963</dd>
                          <dd><span>E-mail:</span><a href="#">mail@demolink.org</a></dd>
                        </dl>
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