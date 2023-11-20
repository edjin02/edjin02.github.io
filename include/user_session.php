<?php
session_start();

try {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        // Rest of your code
    } else {
        throw new Exception("User ID not found in session.");
    }
} catch (Exception $e) {
    // Handle the exception
    header("Location: ../admin/login.php");
    exit();
}
?>
