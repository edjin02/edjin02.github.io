<?php
include '../include/connect1.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    // Prepare and execute a SELECT statement to retrieve user data
    $query = "SELECT * FROM tbl_user WHERE username = '$username'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $storedPassword = $data['password'];
    
        // Verify the password
        if ($password === $storedPassword) {
            // Password is correct
            $_SESSION['user_id'] = $data['id'];
            header("Location: ../admin/index.php");
            exit();
        } else {
            echo "<script type='text/javascript'>alert('Invalid username or password');
                  window.history.back();
                  </script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Invalid username or password');
              window.history.back();
              </script>";
    }
    

    $con->close();
}

?>
