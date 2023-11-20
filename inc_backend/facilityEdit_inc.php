<?php
require '../include/user_session.php'; // $user_id
include '../include/connect1.php'; // $con
require '../include/serverDate&Time.php'; // $$serverDateTime

if (isset($_POST['submit'])) {
    $head_id = $_POST['head_id']; // hidden display  
    $facility_id = $_POST['facility_id']; // hidden 
    $electricity = $_POST['electricity'];
    $water = $_POST['water'];
    $toilet = $_POST['toilet'];
    $kitchen = $_POST['kitchen'];

    $sql = "UPDATE `tbl_facility` 
            SET 
                `electricity` = '$electricity', 
                `water` = '$water',
                `toilet` = '$toilet',
                `kitchen` = '$kitchen'  
            WHERE `id` = '$facility_id'";


    if ($con->query($sql) === TRUE) {
        
        //AUDIT TRAIL
        $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
        VALUES ('$serverDateTime','$user_id','MODIFIED A FACILITY','$facility_id')";
        $result = $con->query($sql);
        
        $_SESSION['head_id'] = $head_id;
        header("Location: ../admin/memberview.php");
        exit();
        
    } else {
        echo "Error updating record: " . $con->error;
    }
}
?>