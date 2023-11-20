<?php
global $con;
include '../include/connect1.php';

function minorDisplayTbl($head_id){
    $query = "SELECT * FROM tbl_childminor WHERE head_id = $head_id";
    $result = $GLOBALS['con']->query($query);

    $id = array();
    $firstname = array();
    $middlename = array();
    $lastname = array();
    $extension = array();
    $birthdate = array();

    while ($row = $result->fetch_assoc()) {
        if ($row['isdelete'] == 0){ // CHECK IF DATA IS DELETED
            $id[] = $row["id"];
            $firstname[] = $row["firstname"];
            $middlename[] = $row["middlename"];
            $lastname[] = $row["lastname"];
            $extension[] = $row["extension"];
            $birthdate[] = $row["birthdate"];
        }
    }

    //for calculating age
    $sql = "SELECT CURDATE()";
    $res = $GLOBALS['con']->query($sql);
    $row = $res->fetch_assoc();
    $currentdate = $row['CURDATE()'];

    $ages = array();
    foreach ($birthdate as $date) {
        $birthDateTime = new DateTime($date);
        $currentDateTime = new DateTime($currentdate);
        $ageInterval = $birthDateTime->diff($currentDateTime);
        $age = $ageInterval->y;
        $ages[] = $age;
    }

    $i = 0;
    while ($i < count($id)) {
        echo "<tr class='editMinorBtn' data-toggle='modal' data-target='#minorModal' minor-value='$id[$i]' head-value='$head_id' tbl-value='minor'> 
            <td>" . $firstname[$i] . " " . $middlename[$i] . " " . $lastname[$i] . " " . $extension[$i] . "</td>
            <td>" . $ages[$i] ."</td>
        </tr>";
        $i++;
    }
}

function seniorDisplayTbl($head_id){
    $query = "SELECT * FROM tbl_seniorpwd WHERE head_id = $head_id";
    $result = $GLOBALS['con']->query($query);

    $id = array();
    $firstname = array();
    $middlename = array();
    $lastname = array();
    $senior = array();
    $pwd = array();
    

    while ($row = $result->fetch_assoc()) {
        if ($row['isdelete'] == 0){ // CHECK IF DATA IS DELETED
            $id[] = $row["id"];
            $firstname[] = $row["firstname"];
            $middlename[] = $row["middlename"];
            $lastname[] = $row["lastname"];
            $senior[] = $row["senior"];
            $pwd[] = $row["pwd"];
        }
  
    }

    $status = array();
    $i = 0;

    while ($i < count($senior)) {
        if ($senior[$i] && $pwd[$i]) {
            $status[] = 'Senior and Pwd';
        } elseif ($senior[$i]) {
            $status[] = 'Senior';
        } elseif ($pwd[$i]) {
            $status[] = 'Pwd';
        } else {
            $status[] = 'None';
        }

        $i++;
    }


    $i = 0;
    while ($i < count($id)) {
        echo "<tr class='editSeniorBtn' data-toggle='modal' data-target='#seniorModal' minor-value='$id[$i]' head-value='$head_id' tbl-value='senior'> 
            <td>" . $firstname[$i] . " " . $middlename[$i] . " " . $lastname[$i] . "</td>
            <td>" . $status[$i] . "</td>
        </tr>";
        $i++;
    }
    
}

function workDisplayTbl($head_id){
    $query = "SELECT * FROM tbl_childwork WHERE head_id = $head_id";
    $result = $GLOBALS['con']->query($query);

    $id = array();
    $firstname = array();
    $middlename = array();
    $lastname = array();
    $monthIncome = array();

    while ($row = $result->fetch_assoc()) {
        if ($row['isdelete'] == 0){ // CHECK IF DATA IS DELETED
            $id[] = $row["id"];
            $firstname[] = $row["firstname"];
            $middlename[] = $row["middlename"];
            $lastname[] = $row["lastname"];
            $monthIncome[] = $row["monthIncome"];
        }
    }

    $i = 0;
    while ($i < count($id)) {
        echo "<tr class='editWorkBtn' data-toggle='modal' data-target='#workModal' minor-value='$id[$i]' head-value='$head_id' tbl-value='work'> 
            <td>" . $firstname[$i] . " " . $middlename[$i] . " " . $lastname[$i] . "</td>
            <td>" . $monthIncome[$i] . "</td>
        </tr>";
        $i++;
    }
    
}   

function userDisplayTbl(){
    $query = "SELECT * FROM tbl_user";
    $result = $GLOBALS['con']->query($query);

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

    $i = 0;
    while ($i < count($id)) {
        echo "<tr class='editUserBtn' data-toggle='modal' data-target='#myModal' id='$id[$i]'>
            <td>" . $isactive[$i] . "</td> 
            <td>" . $username[$i] . "</td> 
            <td>" . $firstname[$i] . " " . $middlename[$i] . " " . $lastname[$i] . "</td>
            <td>" . $contactno[$i] . "</td> 
            <td>" . $memberof[$i] . "</td> 
        </tr>";
        $i++;
    }
    
}

function auditDisplayTbl(){
    $query = "SELECT * FROM tbl_audit ORDER BY id DESC LIMIT 50"; // LIMIT TO 50 only
    $result = $GLOBALS['con']->query($query);
    
    $datecommit = array();
    $user_id = array();
    $actiondone = array();
    $subject = array();
    
    while ($row = $result->fetch_assoc()) {
        $datecommit[] = $row["datecommit"];
        $user_id[] = $row["user_id"];
        $actiondone[] = $row["actiondone"];
        $subject[] = $row["subject"];
    }

    $i = 0;
    while ($i < count($datecommit)) {
        echo "<tr>
            <td>" . $datecommit[$i] . "</td> 
            <td>" . $user_id[$i] . "</td> 
            <td>" . $actiondone[$i] ."</td>
            <td>" . $subject[$i] . "</td> 
        </tr>";
        $i++;
    }
    
}

?>

