<?php 
include '../include/connect1.php';

$id = $_POST['id'];

$query = "SELECT * FROM tbl_user WHERE id = $id";
$result = $con->query($query);

$row = $result->fetch_assoc();

$response = array(
    'id' => $row["id"],
    'isactive' => $row["isactive"],
    'username' => $row["username"],
    'lastname' => $row["lastname"],
    'middlename' => $row["middlename"],
    'firstname' => $row["firstname"],
    'contactno' => $row["contactno"],
    'memberof' => $row["memberof"],
    'ar_dashboard' => ($row["ar_dashboard"] == 1) ? true : false,
    'ar_report' => ($row["ar_report"] == 1) ? true : false,
    'ar_record' => ($row["ar_record"] == 1) ? true : false,
    'ar_systman' => ($row["ar_systman"] == 1) ? true : false
);

echo json_encode($response);

?>