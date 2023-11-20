<?php
require '../include/user_session.php'; // $user_id
include '../include/connect1.php'; // $con
require '../include/serverDate&Time.php'; // $$serverDateTime

if (isset($_POST['submit'])) {
    $head_id = $_POST['head_id']; // hidden display  
    $head_gender = $_POST['head_gender'];
    $head_firstName = $_POST['head_givenName'];
    $head_lastName = $_POST['head_lastName'];
    $head_middleName = $_POST['head_middleName'];
    $head_maidenName = $_POST['head_maidenName'];
    $head_extension = $_POST['head_extension'];
    $head_occupation = $_POST['head_occupation'];
    $head_monthSalary = $_POST['head_monthSalary'];
    $head_birthDate = $_POST['head_birthDate'];
    $year_stay = $_POST['year_stay'];
    $relocated = $_POST['relocated'];
    $relocUnavailable = $_POST['relocUnavailable'];
    $head_civilStatus = $_POST['head_civilStatus'];

    $pagibigBox = isset($_POST["head_pag-ibigBox"]) && $_POST["head_pag-ibigBox"] === 'checked' ? 1 : 0;
    $sssBox = isset($_POST["head_sssBox"]) && $_POST["head_sssBox"] === 'checked' ? 1 : 0;
    $other = isset($_POST["head_other"]) ? $_POST["head_other"] : "";

    $structOwner = isset($_POST["structOwner"]) && $_POST["structOwner"] === 'checked' ? 1 : 0;

    if ($structOwner == 1) {
        $tenurStatus = 'OWNER';
        $origOwner = $head_firstName . " " . $head_middleName . " " . $head_lastName;
    }
    else {
        $tenurStatus = isset($_POST["tenurStatus"]) ? $_POST["tenurStatus"] : "";
        $origOwner = isset($_POST["origOwner"]) ? $_POST["origOwner"] : "";
    }

    $sql = "UPDATE `tbl_headinfo` 
            SET 
                `gender` = '$head_gender',
                `firstname` = '$head_firstName',
                `lastname` = '$head_lastName',
                `middlename` = '$head_middleName', 
                `maidenname` = '$head_maidenName',
                `extension` = '$head_extension',
                `occupation` = '$head_occupation',
                `monthIncome` = '$head_monthSalary',
                `birthdate` = '$head_birthDate',
                `yearStay` = '$year_stay',
                `relocated` = '$relocated', 
                `relocUnavailable` = '$relocUnavailable',
                `civilStatus` = '$head_civilStatus',
                `pagIbig` = '$pagibigBox',
                `sss` = '$sssBox',
                `other` = '$other',
                `tenurStatus` = '$tenurStatus',
                `origOwner` = '$origOwner'  
             
            WHERE `id` = '$head_id'";


    if ($con->query($sql) === TRUE) {

        //AUDIT TRAIL
        $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
        VALUES ('$serverDateTime','$user_id','MODIFIED A HOUSEHOLD HEAD','$head_id')";
        $result = $con->query($sql);
        
        $_SESSION['head_id'] = $head_id;
        header("Location: ../admin/memberview.php");
        exit();
        
    } else {
        echo "Error updating record: " . $con->error;
    }
}
?>