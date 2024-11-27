<?php 
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
        echo "<script>alert('This email is already registered. Please use another one.');</script>";
    } else {
        // Insert the user data into the database
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashed_password);

        if ($stmt->execute()) {
            // Refresh the page after sign-up
            echo "<script>alert('Sign Up successful! Please log in.'); window.location.href = '';</script>";
            exit();
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
            // Start session and set user session variable
            session_start();
            $_SESSION['user_email'] = $email; // Store email in session
            header("Location: homep.php"); // Redirect to home page after successful login
            exit();
        } else {
            echo "<script>alert('Incorrect password!');</script>";
        }
    } else {
        echo "<script>alert('No user found with that email!');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Sign In/Sign Up</title>
</head>
<body>
<div class="container" id="container">
    <!-- Sign Up Form -->
    <div class="form-container sign-up-container">
        <form method="POST" action="">
            <h1>Create Account</h1>
            <input type="text" name="name" placeholder="Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" id="signup-password" required />
            <label>
                <input type="checkbox" id="show-signup-password" /> Show Password
            </label>
            <button name="sign_up" type="submit">Sign Up</button>
        </form>
    </div>

    <!-- Sign In Form -->
    <div class="form-container sign-in-container">
        <form method="POST" action="">
            <h1>Sign In</h1>
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" id="login-password" required />
            <label>
                <input type="checkbox" id="show-login-password" /> Show Password
            </label>
            <a href="#">Forgot your password?</a>
            <button name="sign_in" type="submit">Sign In</button>
        </form>
    </div>

    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us, please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello!</h1>
                <p>Welcome to TechTemple</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<script src="www.js"></script> <!-- Ensure this path is correct -->
</body>
</html>
