<?php
include 'db.php'; // Include the database connection class

class User {
    private $conn;

    // Constructor to get the database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Handle Sign-Up logic
    public function signUp($name, $email, $password) {
        // Check if the email already exists
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);
        
        if ($stmt->rowCount() > 0) {
            return "This email is already registered.";
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into the database
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->conn->prepare($sql);
        $params = [':name' => $name, ':email' => $email, ':password' => $hashed_password];

        if ($stmt->execute($params)) {
            return "Sign-up successful!";
        } else {
            return "Error during sign-up.";
        }
    }

    // Handle Sign-In logic
    public function signIn($email, $password) {
        // Query user by email
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':email' => $email]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // Verify password
            if (password_verify($password, $user['password'])) {
                return true; // Successful login
            } else {
                return "Incorrect password!";
            }
        } else {
            return "No user found with that email.";
        }
    }
}

// Initialize the database connection
$db = new Database();
$conn = $db->getConnection();

// Initialize the User class
$user = new User($conn);

// Handle the sign-up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign_up'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $message = $user->signUp($name, $email, $password);
    echo "<script>alert('$message');</script>";
}

// Handle the sign-in form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign_in'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $result = $user->signIn($email, $password);
    
    if ($result === true) {
        session_start();
        $_SESSION['user_email'] = $email;
        header("Location: homep.php");
        exit();
    } else {
        echo "<script>alert('$result');</script>";
    }
}
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
                <p>Welcome</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<script src="www.js"></script> 
</body>
</html>
