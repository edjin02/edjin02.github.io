<?php
require '../include/user_session.php'; // $user_id
include '../include/connect1.php'; //$con
require '../include/serverDate&Time.php'; // $$serverDateTime

if (isset($_POST['submit'])) {
    $head_id = $_POST['head_id']; // hidden display  
    $optionMinor = $_POST['optionMinor'];

    $id = $_POST['minor_id'];
    $gender = $_POST['minor_gender'];
    $birthdate = $_POST['minor_birthDate'];
    $lastname = $_POST['minor_lastName'];
    $firstname = $_POST['minor_givenName'];
    $middlename = $_POST['minor_middleName'];
    $extension = $_POST['minor_extension'];

    if ($optionMinor == 'edit') {
        $sql = "UPDATE `tbl_childminor` 
            SET 
                `lastname` = '$lastname',
                `middlename` = '$middlename',
                `firstname` = '$firstname',
                `birthdate` = '$birthdate',
                `gender` = '$gender',
                `extension` = '$extension'
            WHERE `id` = $id";
        $result = $con->query($sql);

        //AUDIT TRAIL
        $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
        VALUES ('$serverDateTime','$user_id','MODIFIED A MINOR CHILD','$id')";
        $result = $con->query($sql);
    } 
    else if ($optionMinor == 'add') {
        $sql = "INSERT INTO `tbl_childminor` (`head_id`, `user_id`, `firstname`, `lastname`, `middlename`, `extension`,`gender`,`birthdate`) 
                VALUES ('$head_id', '$user_id', '$firstname', '$lastname', '$middlename', '$extension', '$gender', '$birthdate')";

        $result = $con->query($sql);
        $incrementId = $con->insert_id; // to get the auto-increment value

        //AUDIT TRAIL
        $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
        VALUES ('$serverDateTime','$user_id','ADDED A MINOR CHILD','$incrementId')";
        $result = $con->query($sql);
    }

    else if ($optionMinor == 'delete') {
        $sql = "UPDATE `tbl_childminor` 
            SET 
                `isdelete` = 1
            WHERE `id` = $id";

        $result = $con->query($sql);

        //AUDIT TRAIL
        $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
        VALUES ('$serverDateTime','$user_id','DELETED A MINOR CHILD','$id')";
        $result = $con->query($sql);

    }
    
    $_SESSION['head_id'] = $head_id;
    header("Location: ../admin/memberview.php");
    exit();


}
?>