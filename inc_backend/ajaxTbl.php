<?php
global $con;
include '../include/connect1.php';

$GLOBALS['head_value'] = $_POST['head_value'];
$GLOBALS['minor_value']  = $_POST['minor_value'];
$tbl_value = $_POST['tbl_value'];

switch ($tbl_value) {
    case 'work':
        work();
        break;

    case 'minor':
        minor();
        break;

    case 'senior':
        senior();
        break;

    default:
        break;
}

function work() {
    $query = "SELECT * FROM tbl_childwork WHERE head_id = {$GLOBALS['head_value']} AND id = {$GLOBALS['minor_value']}";
    $result = $GLOBALS['con']->query($query);

    $row = $result->fetch_assoc();

    $id = $row["id"];
    $lastname = $row["lastname"];
    $middlename = $row["middlename"];
    $firstname = $row["firstname"];
    $gender = $row["gender"];
    $birthdate = $row["birthdate"];
    $civilStatus = $row["civilStatus"];
    $occupation = $row["occupation"];
    $monthIncome = $row["monthIncome"];
    $extension = $row["extension"];
    $maidenname = $row["maidenname"];
    $pagIbig = ($row["pagIbig"] == 1) ? true : false;
    $sss = ($row["sss"] == 1) ? true : false; 
    $otherCheck = ($row["other"] == '') ? false : true;
    $other = $row["other"]; 

    $response = array(
        'id' => $id,
        'lastname' => $lastname,
        'middlename' => $middlename,
        'firstname' => $firstname,
        'gender' => $gender,
        'birthdate' => $birthdate,
        'civilStatus' => $civilStatus,
        'occupation' => $occupation,
        'monthIncome' => $monthIncome,
        'extension' => $extension,
        'maidenname' => $maidenname,
        'pagIbig' => $pagIbig,
        'sss' => $sss,
        'othercheck' => $otherCheck,
        'other' => $other
    );

    echo json_encode($response);
}

function minor() {
    $query = "SELECT * FROM tbl_childminor WHERE head_id = {$GLOBALS['head_value']} AND id = {$GLOBALS['minor_value']}";
    $result = $GLOBALS['con']->query($query);

    $row = $result->fetch_assoc();
    $id = $row["id"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $middlename = $row["middlename"];
    $extension = $row["extension"];
    $gender = $row["gender"];
    $birthdate = $row["birthdate"];

    $response = array(
        'id' => $id,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'middlename' => $middlename,
        'extension' => $extension,
        'gender' => $gender,
        'birthdate' => $birthdate
    );

    echo json_encode($response);
}

function senior() {
    $query = "SELECT * FROM tbl_seniorpwd WHERE head_id = {$GLOBALS['head_value']} AND id = {$GLOBALS['minor_value']}";
    $result = $GLOBALS['con']->query($query);

    $row = $result->fetch_assoc();

    $id = $row["id"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $middlename = $row["middlename"];
    $extension = $row["extension"];
    $maidenname = $row["maidenname"];
    $gender = $row["gender"];
    $birthdate = $row["birthdate"];

    $senior = ($row["senior"] == 1) ? true : false;
    $pwd = ($row["pwd"] == 1) ? true : false;


    $response = array(
        'id' => $id,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'middlename' => $middlename,
        'extension' => $extension,
        'maidenname' => $maidenname,
        'gender' => $gender,
        'birthdate' => $birthdate,
        'senior' => $senior,
        'pwd' => $pwd
    );

    echo json_encode($response);
}

?>
