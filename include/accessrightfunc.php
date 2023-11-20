<?php
function checkAccessRights($user_id, $module)
{
    require '../include/connect1.php'; //$con
    $query = "SELECT * FROM tbl_user WHERE id = '$user_id'";
    $result = $con->query($query);

    $data = $result->fetch_assoc();
    $ar_module = $data[$module];


    if ($ar_module != 1) {
        header("Location: ../admin/index.php");
        exit();
    }
}

