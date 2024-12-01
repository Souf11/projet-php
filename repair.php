<?php
session_start(); // Start the session

// Include the Database class
require_once 'db.php'; 

// Create a new instance of the Database class
$db = new Database();
$conn = $db->getConnection();  // Get the PDO connection

// Handle Sign-Up
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign_up'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists
    $check_email = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $check_email->bindParam(':email', $email, PDO::PARAM_STR);
    $check_email->execute();

    if ($check_email->rowCount() > 0) {
        echo "This email is already registered.";
    } else {
        // Insert the user data into the database
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Sign Up successful!";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
}

// Handle Sign-In
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign_in'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Query to find user by email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_email'] = $email;
            header("Location: homep.php"); // Redirect to homepage
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "No user found with that email!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Car Repair | Repair</title>
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
<body id="page4">
<div class="main-bg">
    <div class="bg">
        <!--==============================header=================================-->
        <header>
            <div class="main">
                <div class="wrapper">
                    <h1><a href="index.html">Car Repair</a></h1>
                    <div class="fright">
                        <div class="indent">
                            <span class="address">8901 Marmora Road, Glasgow, D04 89GR</span>
                            <span class="phone">Tel: +1 959 552 5963</span>
                        </div>
                    </div>
                </div>
                <nav>
                    <ul class="menu">
                        <li><a href="homep.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="maintenance.php">Maintenance </a></li>
                        <li><a class="active" href="repair.php">Repair</a></li>
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
                                    <a class="button" href="#">Read More</a>
                                </div>
                            </div>
                        </article>
                        <article class="grid_4">
                            <div class="wrapper">
                                <figure class="img-indent"><img src="images/page1-img2.png" alt=""></figure>
                                <div class="extra-wrap">
                                    <h4>Wheel Alignment</h4>
                                    <p class="p2">Tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                    <a class="button" href="#">Read More</a>
                                </div>
                            </div>
                        </article>
                        <article class="grid_4">
                            <div class="wrapper">
                                <figure class="img-indent"><img src="images/page1-img3.png" alt=""></figure>
                                <div class="extra-wrap">
                                    <h4>Fluid Exchanges</h4>
                                    <p class="p2">No sea takimata sanctus est gorem ipsum dolor sit amet forem ipsum.</p>
                                    <a class="button" href="#">Read More</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="container-bot">
                        <div class="container-top">
                            <div class="container">
                                <div class="wrapper">
                                    <article class="grid_8">
                                        <div class="indent-left">
                                            <h3>Repair Services</h3>
                                            <h6>Vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</h6>
                                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est.</p>
                                            <div class="wrapper margin-bot">
                                                <figure class="img-indent3"><img src="images/page4-img1.png" alt=""></figure>
                                                <div class="extra-wrap">
                                                    <h6><strong>At vero eos et accusam et justo duo dolores </strong></h6>
                                                    <p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
                                                    <a class="button" href="#">Read More</a>
                                                </div>
                                            </div>
                                            <div class="wrapper indent-bot">
                                                <figure class="img-indent3"><img src="images/page4-img2.png" alt=""></figure>
                                                <div class="extra-wrap">
                                                    <h6><strong>Duo dolores et ea rebum stet clita kasd </strong></h6>
                                                    <p>Gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                                                    <a class="button" href="#">Read More</a>
                                                </div>
                                            </div>
                                            Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                        </div>
                                    </article>
                                    <article class="grid_4">
                                        <div class="indent-left2">
                                            <h3>Services Warranty <strong>Options</strong></h3>
                                            <h6>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.</h6>
                                            <ul class="list-2 p1">
                                                <li><a href="#">Labore et dolore magna aliquyam</a></li>
                                                <li><a href="#">At vero eos et accusam et justo duo</a></li>
                                                <li><a href="#">Stet clita kasd gubergren, no sea takimata </a></li>
                                                <li><a href="#">Sanctus est lorem ipsum</a></li>
                                                <li><a href="#">Lorem ipsum dolor sit consetetur </a></li>
                                                <li><a href="#">Sadipscing elitr, sed diam</a></li>
                                            </ul>
                                            <p>Nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
                                            <h3>Spare Parts</h3>
                                            <h6>At vero eos et accusam et justo duo </h6>
                                            <p>Stet clita kasd gubergren, no sea takimata sanctus lorem ipsum. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
                                            <a class="button" href="#">Read More</a>
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
