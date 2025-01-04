<?php
session_start(); // Start the session
include 'db.php'; // Include the database connection file

// Handle Sign-Up
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign_up'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $db = new Database(); // Create an instance of the Database class
        $conn = $db->getConnection(); // Get the PDO connection

        // Check if the email already exists
        $check_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $check_email->execute([$email]);

        if ($check_email->rowCount() > 0) {
            echo "This email is already registered.";
        } else {
            // Insert the user data into the database
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            if ($stmt->execute([$name, $email, $hashed_password])) {
                echo "Sign Up successful!";
            } else {
                echo "Error: " . $stmt->errorInfo()[2];
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Handle Sign-In
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign_in'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    try {
        $db = new Database(); // Create an instance of the Database class
        $conn = $db->getConnection(); // Get the PDO connection

        // Query to find user by email
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                header("Location: ../projet/proj/homep.php");
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
    <title>Car Repair | Price</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style-new.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script>
    <script src="js/Vegur_500.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>
</head>
<body id="page5">
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
                                        <article class="grid_4">
                                            <div class="indent-left">
                                                <h3>Most Popular</h3>
                                                <h6><a class="link color-1" href="#">Product Name 1</a></h6>
                                                <p class="p3">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan.</p>
                                                <h6><a class="link color-1" href="#">Product Name 2</a></h6>
                                                <p class="img-indent-bot">Lusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                                                <h6><a class="link color-1" href="#">Product Name 3</a></h6>
                                                <p class="img-indent-bot">Sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.</p>
                                                <h6><a class="link color-1" href="#">Product Name 4</a></h6>
                                                Ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. 
                                            </div>
                                        </article>
                                        <article class="grid_8">
                                            <div class="indent-left2">
                                                <h3 class="p1">Price List</h3>
                                                <table class="price-list">
                                                    <thead>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>Dolor sit amet</td>
                                                            <td>Consetetur sadip</td>
                                                            <td>Consetetur sadip</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Lorem ipsum</td>
                                                            <td>Consetetur sadip</td>
                                                            <td>$75.00</td>
                                                            <td>$94.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dolor sit amet</td>
                                                            <td>Consetetur sadip</td>
                                                            <td>$85.00</td>
                                                            <td>$105.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Consetetur sadip</td>
                                                            <td>Dolor sit amet</td>
                                                            <td>$65.00</td>
                                                            <td>$80.00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
