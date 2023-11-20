<?php
require '../include/user_session.php'; // $user_id
include '../include/connect1.php'; //$con
require '../include/serverDate&Time.php'; // $$serverDateTime

if (isset($_POST['submit'])) {
    $head_id = $_POST['head_id']; // hidden display  
    $option = $_POST['optionWork'];

    $id = $_POST['work_id'];
    $gender = $_POST['work_gender'];
    $birthdate = $_POST['work_birthDate'];
    $lastname = $_POST['work_lastName'];
    $firstname = $_POST['work_givenName'];
    $middlename = $_POST['work_middleName'];
    $extension = $_POST['work_extension'];
    $maidenname = $_POST['work_maidenName'];
    $occupation = $_POST['work_occupation'];
    $monthIncome = $_POST['work_monthSalary'];
    $civilStatus = $_POST['work_civilStatus'];

    $pagibigBox = isset($_POST["work_pag-ibigBox"]) && $_POST["work_pag-ibigBox"] === 'checked' ? 1 : 0;
    $sssBox = isset($_POST["work_sssBox"]) && $_POST["work_sssBox"] === 'checked' ? 1 : 0;
    $other = isset($_POST["work_other"]) ? $_POST["work_other"] : "";

    if ($option == 'edit') {
        $sql = "UPDATE `tbl_childwork` 
            SET 
                `lastname` = '$lastname',
                `middlename` = '$middlename',
                `firstname` = '$firstname',
                `birthdate` = '$birthdate',
                `gender` = '$gender',
                `extension` = '$extension',
                `maidenname` = '$maidenname',
                `occupation` = '$occupation',
                `monthIncome` = '$monthIncome',
                `civilStatus` = '$civilStatus',
                `pagIbig` = '$pagibigBox',
                `sss` = '$sssBox',
                `other` = '$other'  
            WHERE `id` = $id";

        $result = $con->query($sql);

        //AUDIT TRAIL
        $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
        VALUES ('$serverDateTime','$user_id','MODIFIED A WORKING CHILD','$id')";
        $result = $con->query($sql);
    
    } 
    else if ($option == 'add') {
        $sql = "INSERT INTO `tbl_childwork` (`head_id`, `user_id`, `firstname`, `lastname`, `middlename`, `extension`,`maidenname`,`gender`,`birthdate`,`occupation`,`monthIncome`,`civilStatus`) 
                VALUES ('$head_id', '$user_id', '$firstname', '$lastname', '$middlename', '$extension', '$maidenname', '$gender', '$birthdate', '$occupation','$monthIncome','$civilStatus')";
        $result = $con->query($sql);

        $incrementId = $con->insert_id; // to get the auto-increment value

        //AUDIT TRAIL
        $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
        VALUES ('$serverDateTime','$user_id','ADDED A WORKING CHILD','$incrementId')";
        $result = $con->query($sql);
    }

    else if ($option == 'delete') {
        $sql = "UPDATE `tbl_childwork` 
            SET 
                `isdelete` = 1
            WHERE `id` = $id";

        $result = $con->query($sql);

        //AUDIT TRAIL
        $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
        VALUES ('$serverDateTime','$user_id','DELETED A WORKING CHILD','$id')";
        $result = $con->query($sql);
    }


    // back to the page
    $_SESSION['head_id'] = $head_id;
    header("Location: ../admin/memberview.php");
    exit();
        

}
?>