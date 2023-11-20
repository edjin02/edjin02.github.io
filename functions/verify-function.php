<?php 
    include "../include/connect1.php";

    function getHouseholdData($con, $id)
{
    $sql = "SELECT * FROM tbl_headinfo WHERE id = '$id'";
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

function getSpouseData($con, $id)
{
    $sql = "SELECT * FROM tbl_spouseinfo WHERE id = '$id'";
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
function getUserData($con, $id)
{
    $sql = "SELECT * FROM tbl_user WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    $r = mysqli_fetch_assoc($result);
    // echo json_encode($r);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        $name = "{$row['firstname']} {$row['middlename']} {$row['lastname']}";
        $data = [
            'id' => $row['id'],
            'isactive' => $row['isactive'],
            'username' => $row['username'],
            'name' => $name,
            'contactno' => $row['contactno'],
            'memberof' => $row['memberof']
        ];

        echo json_encode($data);
    } else {
        // Handle database query error
        echo "Error: " . mysqli_error($con);
    }
}

?>