<?php
session_start(); // Start the session

// Destroy all session variables
session_unset();

// Destroy the session itself
session_destroy();

// Redirect to the home page or login page
header("Location: homep.php"); // You can redirect to any page after logging out
exit();
?>
