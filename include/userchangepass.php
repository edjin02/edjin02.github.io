<?php
    session_start();

    $cur_pass = $_POST['cur_pass'];
    $new_pass = $_POST['new_pass'];
    $con_pass = $_POST['con_pass'];

    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        require '../include/connect.php'; //$con

        $query = "SELECT password FROM user WHERE id = $user_id";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            $password = $user_data['password'];

            if (password_verify($cur_pass, $password)) {
                if ($new_pass == $con_pass) {

                    $encryptedPassword = password_hash($new_pass, PASSWORD_DEFAULT);

                    $sql = "UPDATE `user` SET `password` = '$encryptedPassword' WHERE `user`.`id` = $user_id";
                    
                    if ($con->query($sql) === TRUE) {
                        mysqli_close($con);
                        echo "Password changed successfully";    

                    } else {
                        echo "Error updating record: " . $con->error;
                    }
               
                }
                else {
                    echo "Error: New password and confirm password do not match";
                  }
            }
            else {
                echo "Error: Current password is incorrect";
          }
            
        }
    }

?>

