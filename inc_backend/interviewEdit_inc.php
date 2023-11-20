<?php
require '../include/user_session.php'; // $user_id
include '../include/connect1.php'; // $con
require '../include/serverDate&Time.php'; // $$serverDateTime

if (isset($_POST['submit'])) {
    $head_id = $_POST['head_id']; // hidden display  
    $res_id = $_POST['res_id']; // hidden display
    $res_relationship = $_POST['res_relationship'];
    $res_lastname = $_POST['res_lastName'];
    $res_givenname = $_POST['res_givenName'];
    $res_middlename = $_POST['res_middleName'];

    $int_lastname = $_POST['int_lastName'];
    $int_givenname = $_POST['int_givenName'];
    $int_middlename = $_POST['int_middleName'];
    $int_date = $_POST['int_date'];
    $int_remark = $_POST['int_remark'];

    $sql = "UPDATE `tbl_interinfo` 
            SET 
                `res_Fname` = '$res_givenname',
                `res_Mname` = '$res_middlename',
                `res_Lname` = '$res_lastname',
                `relationship` = '$res_relationship',
                `int_Fname` = '$int_givenname',
                `int_Mname` = '$int_middlename',
                `int_Lname` = '$int_lastname',
                `date` = '$int_date',
                `remarks` = '$int_remark'
              
            WHERE `id` = '$res_id'";


    if ($con->query($sql) === TRUE) {
        
        //AUDIT TRAIL
        $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
        VALUES ('$serverDateTime','$user_id','MODIFIED AN INTERVIEW','$res_id')";
        $result = $con->query($sql);
        
        $_SESSION['head_id'] = $head_id;
        header("Location: ../admin/memberview.php");
        exit();
        
    } else {
        echo "Error updating record: " . $con->error;
    }
}
?>