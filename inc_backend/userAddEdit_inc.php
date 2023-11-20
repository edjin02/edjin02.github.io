<?php
require '../include/user_session.php'; // $user_id
include '../include/connect1.php';
require '../include/serverDate&Time.php'; // $$serverDateTime

if (isset($_POST['userOption'])) { 

    $id = $_POST['id'];
    $isactive = $_POST['isactive'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $memberof = $_POST['memberof'];
    $contactno = $_POST['contactno'];
    $dashboard = $_POST["dashboard"] === 'true' ? 1 : 0;
    $report = $_POST["report"] === 'true' ? 1 : 0;
    $record = $_POST["record"] === 'true' ? 1 : 0;
    $systmanager = $_POST["systmanager"] === 'true' ? 1 : 0;

    if ($_POST['userOption'] == 'add') {
        $sql = "INSERT INTO `tbl_user` (`isactive`,`username`,`password`,`firstname`,`middlename`,`lastname`,
                            `memberof`,`contactno`,`ar_dashboard`,`ar_record`,`ar_report`,`ar_systman`) 
                VALUES ('$isactive','$username','$password','$firstname','$middlename','$lastname',
                            '$memberof','$contactno','$dashboard','$record','$report','$systmanager')";
        $result = $con->query($sql);
        
        $incrementId = $con->insert_id; // to get the auto-increment value of user

         //AUDIT TRAIL
        $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
        VALUES ('$serverDateTime','$user_id','ADDED A USER','$incrementId')";
        $result = $con->query($sql);

        }

    elseif ($_POST['userOption'] == 'edit') {
        $sql = "UPDATE `tbl_user` 
            SET 
                `username` = '$username',
                `isactive` = '$isactive',
                `firstname` = '$firstname',
                `middlename` = '$middlename',
                `lastname` = '$lastname',
                `contactno` = '$contactno',
                `memberof` = '$memberof',
                `ar_dashboard` = '$dashboard',
                `ar_report` = '$report',
                `ar_record` = '$record',
                `ar_systman` = '$systmanager'
            WHERE `id` = $id";
        $result = $con->query($sql);

        //AUDIT TRAIL
        $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
        VALUES ('$serverDateTime','$user_id','MODIFIED A USER','$id')";
        $result = $con->query($sql);
    } 

    elseif ($_POST['userOption'] == 'delete') {
        $sql = "UPDATE `tbl_user` 
            SET 
                `isdelete` = 1

            WHERE `id` = $id";
        $result = $con->query($sql);

        //AUDIT TRAIL
        $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
        VALUES ('$serverDateTime','$user_id','DELETED A USER','$id')";
        $result = $con->query($sql);
    }

    // the response
    $query = "SELECT * FROM tbl_user";
    $result = $con->query($query);
    
    $id = array();
    $isactive = array();
    $username = array();
    $firstname = array();
    $middlename = array();
    $lastname = array();
    $contactno = array();
    $memberof = array();

    while ($row = $result->fetch_assoc()) {
        if ($row['isdelete'] == 0){
            $id[] = $row["id"];
            $isactive[] = $row["isactive"];
            $username[] = $row["username"];
            $firstname[] = $row["firstname"];
            $middlename[] = $row["middlename"];
            $lastname[] = $row["lastname"];
            $contactno[] = $row["contactno"];
            $memberof[] = $row["memberof"];
        }
    }

    $response = array('id' => $id, 'isactive' => $isactive, 'username' => $username, 'firstname' => $firstname,
            'middlename' => $middlename, 'lastname' => $lastname, 'contactno' => $contactno, 'memberof' => $memberof);
    echo json_encode($response);

} else {
    // Return an error message
    $response = array('error' => 'No username provided!');
    echo json_encode($response);
}
?>
