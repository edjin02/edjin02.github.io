<?php 
include '../include/connect1.php';

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'getVerifData':
            $id = $_POST['id'];
            getVerifData($con, $id);
            break;

        default:
            // Handle unrecognized action
            break;
    }
}



function getVerifData($con, $id)
{
    $sql = "SELECT * FROM tbl_verif WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    $r = mysqli_fetch_assoc($result);
    //echo json_encode($r);

    if ($result) {
        $data = array();

        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }

        echo json_encode($data);
    } else {
        // Handle database query error
        echo "Error: " . mysqli_error($con);
    }
}

