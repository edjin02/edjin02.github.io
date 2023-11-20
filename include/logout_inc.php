<?php
session_start(); // Start the session

// Check if the logout form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    // Destroy all session data
    session_destroy();

    // Redirect to a desired location after logout
    header("Location: ../admin/login.php"); // Replace "index.php" with the desired location
    exit(); // Terminate the script
}
?>
