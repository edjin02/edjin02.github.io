<?php
require '../include/user_session.php'; // $user_id
include '../include/connect1.php'; // $con
require '../include/serverDate&Time.php'; // $$serverDateTime

if (isset($_POST['submit'])) {
    $head_id = $_POST['head_id']; // hidden display  
    $spouse_id = $_POST['spouse_id']; // hidden display
    $lastname = $_POST['spouse_lastName'];
    $firstname = $_POST['spouse_givenName'];
    $middlename = $_POST['spouse_middleName'];
    $occupation = $_POST['spouse_occupation'];
    $civilStatus = $_POST['spouse_civilStatus'];
    $monthIncome = $_POST['spouse_monthSalary'];
    $gender = $_POST['spouse_gender'];
    $maidenname = $_POST['spouse_maidenName'];
    $extension = $_POST['spouse_extension'];
    $birthdate = $_POST['spouse_birthDate'];

    $pagibigBox = isset($_POST["spouse_pag-ibigBox"]) && $_POST["spouse_pag-ibigBox"] === 'checked' ? 1 : 0;
    $sssBox = isset($_POST["spouse_sssBox"]) && $_POST["spouse_sssBox"] === 'checked' ? 1 : 0;
    $other = isset($_POST["spouse_other"]) ? $_POST["spouse_other"] : "";

    $sql = "UPDATE `tbl_spouseinfo` 
            SET 
                `firstname` = '$firstname', 
                `lastname` = '$lastname',
                `middlename` = '$middlename',
                `occupation` = '$occupation',
                `civilStatus` = '$civilStatus',
                `monthIncome` = '$monthIncome',
                `gender` = '$gender',
                `maidenname` = '$maidenname',
                `extension` = '$extension',
                `birthdate` = '$birthdate',
                `pagIbig` = '$pagibigBox',
                `sss` = '$sssBox',
                `other` = '$other'  
            WHERE `id` = '$spouse_id'";


    if ($con->query($sql) === TRUE) {
        
        //AUDIT TRAIL
        $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
        VALUES ('$serverDateTime','$user_id','MODIFIED A SPOUSE','$spouse_id')";
        $result = $con->query($sql);
        
        $_SESSION['head_id'] = $head_id;
        header("Location: ../admin/memberview.php");
        exit();
        
    } else {
        echo "Error updating record: " . $con->error;
    }
}
?>