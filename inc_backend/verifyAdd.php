<?php
    require '../include/user_session.php'; // $user_id
    include '../include/connect1.php'; // $con
    require '../include/serverDate&Time.php'; // $$serverDateTime

    // echo "SIR KUNG DI NIYO ITO NAIINTINDIHAN, KAMI RIN PO :D";
    $barangay = isset($_POST["barangay-select-modal"]) ? $_POST["barangay-select-modal"] : "";
    $comAss = isset($_POST["community-select"]) ? $_POST["community-select"] : "";
    $basicHouse = isset($_POST["basicHouse"]) ? $_POST["basicHouse"] : "";
    $tag = isset($_POST["tag"]) ? $_POST["tag"] : "";

    // display head fields
    $head_gender = isset($_POST["head_gender"]) ? $_POST["head_gender"] : "";
    $head_birthDate = isset($_POST["head_birthDate"]) ? $_POST["head_birthDate"] : "";
    $head_civilStatus = isset($_POST["head_civilStatus"]) ? $_POST["head_civilStatus"] : "";
    $head_lastname = isset($_POST["head_lastName"]) ? $_POST["head_lastName"] : "";
    $head_givenName = isset($_POST["head_givenName"]) ? $_POST["head_givenName"] : "";
    $head_middleName = isset($_POST["head_middleName"]) ? $_POST["head_middleName"] : "";
    $head_extension = isset($_POST["head_extension"]) ? $_POST["head_extension"] : "";
    $head_occupation = isset($_POST["head_occupation"]) ? $_POST["head_occupation"] : "";
    $head_monthSalary = isset($_POST["head_monthSalary"]) ? $_POST["head_monthSalary"] : "";
    $head_maidenName = isset($_POST["head_maidenName"]) ? $_POST["head_maidenName"] : "";
    $pagIbigCheckbox = isset($_POST["head_pag-ibigBox"]) && $_POST["head_pag-ibigBox"] === 'checked' ? 1 : 0;
    $sssCheckbox = isset($_POST["head_sssBox"]) && $_POST["head_sssBox"] === 'checked' ? 1 : 0;
    $head_other = isset($_POST["head_other"]) ? $_POST["head_other"] : "";
    
    $structOwner = isset($_POST["structOwner"]) ? $_POST["structOwner"] : "";
    if ($structOwner == 'checked') {
        $tenurStatus = 'OWNER';
        $origOwner = implode(' ', [$head_givenName, $head_middleName, $head_lastname]);

    } else {
        $tenurStatus = $_POST["tenurStatus"] ?? "";
        $origOwner = $_POST["origOwner"] ?? "";
    }
    
    $sql = "INSERT INTO `tbl_headinfo` 
                    (`user_id`,`firstname`,`lastname`,`middlename`,`maidenname`,
                    `extension`,`barangay`,`community`,`tag`,`basicHouse`,
                    `birthdate`,`gender`,`civilStatus`,`occupation`,`monthIncome`,
                    `pagIbig`,`sss`,`other`,`tenurStatus`,`origOwner`) 
            VALUES 
                    ('$user_id','$head_givenName','$head_lastname','$head_middleName','$head_maidenName',
                    '$head_extension','$barangay','$comAss','$tag','$basicHouse',
                    '$head_birthDate','$head_gender','$head_civilStatus','$head_occupation','$head_monthSalary',
                    '$pagIbigCheckbox','$sssCheckbox','$head_other','$tenurStatus','$origOwner')";


    if ($con->query($sql) === TRUE) {
        $head_id = $con->insert_id; // to get the auto-increment id
    } else {
        echo "Error updating in HouseHold Head: " . $con->error;
    }    

    // // display spouse fields
    $spouse_gender = isset($_POST["spouse_gender"]) ? $_POST["spouse_gender"] : "";
    $spouse_birthDate = isset($_POST["spouse_birthDate"]) ? $_POST["spouse_birthDate"] : "";
    $spouse_civilStatus = isset($_POST["spouse_civilStatus"]) ? $_POST["spouse_civilStatus"] : "";
    $spouse_lastname = isset($_POST["spouse_lastName"]) ? $_POST["spouse_lastName"] : "";
    $spouse_givenName = isset($_POST["spouse_givenName"]) ? $_POST["spouse_givenName"] : "";
    $spouse_middleName = isset($_POST["spouse_middleName"]) ? $_POST["spouse_middleName"] : "";
    $spouse_extension = isset($_POST["spouse_extension"]) ? $_POST["spouse_extension"] : "";
    $spouse_maidenName = isset($_POST["spouse_maidenName"]) ? $_POST["spouse_maidenName"] : "";
    $spouse_occupation = isset($_POST["spouse_occupation"]) ? $_POST["spouse_occupation"] : "";
    $spouse_monthSalary = isset($_POST["spouse_monthSalary"]) ? $_POST["spouse_monthSalary"] : "";
    $spouse_pagibigBox = isset($_POST["spouse_pag-ibigBox"]) && $_POST["spouse_pag-ibigBox"] === 'checked' ? 1 : 0;
    $spouse_sssBox = isset($_POST["spouse_sssBox"]) && $_POST["spouse_sssBox"] === 'checked' ? 1 : 0;
    $spouse_other = isset($_POST["spouse_other"]) ? $_POST["spouse_other"] : "";
    
    $sql = "INSERT INTO `tbl_spouseinfo` 
                    (`user_id`,`head_id`,`firstname`,`middlename`,`lastname`,
                    `maidenname`,`extension`,`birthdate`,`gender`,`civilStatus`,
                    `occupation`,`monthIncome`,`pagIbig`,`sss`,`other`) 
            VALUES 
                    ('$user_id','$head_id','$spouse_givenName','$spouse_middleName','$spouse_lastname',
                    '$spouse_maidenName','$spouse_extension','$spouse_birthDate','$spouse_gender','$spouse_civilStatus',
                    '$spouse_occupation','$spouse_monthSalary','$spouse_pagibigBox','$spouse_sssBox','$spouse_other')";

    if ($con->query($sql) === TRUE) {
        echo "Spouse Success";
    } else {
        echo "Error updating in Spouse Head: " . $con->error;
    }    

    
    // minor children
    $numChildren = isset($_POST["num_children"]) ? intval($_POST["num_children"]) : 0;
    
    for ($i = 1; $i <= $numChildren; $i++) {
        $child_gender = isset($_POST["Mchild_gender_" . $i]) ? $_POST["Mchild_gender_" . $i] : "";
        $child_lastName = isset($_POST["Mchild_lastName_" . $i]) ? $_POST["Mchild_lastName_" . $i] : "";
        $child_givenName = isset($_POST["Mchild_givenName_" . $i]) ? $_POST["Mchild_givenName_" . $i] : "";
        $child_middleName = isset($_POST["Mchild_middleName_" . $i]) ? $_POST["Mchild_middleName_" . $i] : "";
        $child_extension = isset($_POST["Mchild_extension_" . $i]) ? $_POST["Mchild_extension_" . $i] : "";
        $child_birthDate = isset($_POST["Mchild_birthDate_" . $i]) ? $_POST["Mchild_birthDate_" . $i] : "";

            $sql = "INSERT INTO `tbl_childminor` 
                        (`user_id`,`head_id`,`firstname`,`middlename`,`lastname`,
                        `extension`,`gender`,`birthdate`) 
                VALUES 
                        ('$user_id','$head_id','$child_givenName','$child_middleName','$child_lastName',
                        '$child_extension','$child_gender','$child_birthDate')";

            if ($con->query($sql) === TRUE) {
                echo "Child Minor Success";
            } else {
                echo "Error updating in Spouse Head: " . $con->error;
            }    
    }

    // Display working children
    $numWorkChildren = isset($_POST["num_workChildren"]) ? intval($_POST["num_workChildren"]) : 0;
    $workinglogMessage = "\n\nNumber of Working Children: " . $numWorkChildren;

    for ($i = 0; $i < $numWorkChildren; $i++) {
        $Wchild_gender = isset($_POST["Wchild_gender_" . $i]) ? $_POST["Wchild_gender_" . $i] : "";
        $Wchild_birthDate = isset($_POST["Wchild_birthDate_" . $i]) ? $_POST["Wchild_birthDate_" . $i] : "";
        $Wchild_civilStatus = isset($_POST["Wchild_civilStatus_" . $i]) ? $_POST["Wchild_civilStatus_" . $i] : "";
        $Wchild_lastname = isset($_POST["Wchild_lastName_" . $i]) ? $_POST["Wchild_lastName_" . $i] : "";
        $Wchild_givenName = isset($_POST["Wchild_givenName_" . $i]) ? $_POST["Wchild_givenName_" . $i] : "";
        $Wchild_middleName = isset($_POST["Wchild_middleName_" . $i]) ? $_POST["Wchild_middleName_" . $i] : "";
        $Wchild_extension = isset($_POST["Wchild_extension_" . $i]) ? $_POST["Wchild_extension_" . $i] : "";
        $Wchild_maidenName = isset($_POST["Wchild_maidenName_" . $i]) ? $_POST["Wchild_maidenName_" . $i] : "";
        $Wchild_occupation = isset($_POST["Wchild_occupation_" . $i]) ? $_POST["Wchild_occupation_" . $i] : "";
        $Wchild_pagIbigCheckbox = isset($_POST["Wchild_pag-ibigBox_" . $i]) && $_POST["Wchild_pag-ibigBox_" . $i] === 'checked' ? 1 : 0;
        $Wchild_sssCheckbox = isset($_POST["Wchild_sssBox_" . $i]) && $_POST["Wchild_sssBox_" . $i] === 'checked' ? 1 : 0;
        $Wchild_other = isset($_POST["Wchild_other_" . $i]) ? $_POST["Wchild_other_" . $i] : "";
        $Wchild_monthSalary = isset($_POST["Wchild_monthSalary_" . $i]) ? $_POST["Wchild_monthSalary_" . $i] : "";
        
        $sql = "INSERT INTO `tbl_childwork` 
                        (`user_id`,`head_id`,`firstname`,`middlename`,`lastname`,
                        `extension`,`maidenname`,`monthIncome`,`gender`,`birthdate`,
                        `civilStatus`,`occupation`,`pagIbig`,`sss`,`other`) 
                VALUES 
                        ('$user_id','$head_id','$Wchild_givenName','$Wchild_middleName','$Wchild_lastname',
                        '$Wchild_extension','$Wchild_maidenName','$Wchild_monthSalary','$Wchild_gender','$Wchild_birthDate',
                        '$Wchild_civilStatus','$Wchild_occupation','$Wchild_pagIbigCheckbox','$Wchild_sssCheckbox','$Wchild_other')";

            if ($con->query($sql) === TRUE) {
                echo "Child Work Success";
            } else {
                echo "Error updating in Spouse Head: " . $con->error;
            }    

    }

    // Display total monthly 
    $totalMonthly = isset($_POST["totalMonthly"]) ? intval($_POST["totalMonthly"]) : 0;
    $monthlyTotallogMessage = "Total Monthly Salary: " . $totalMonthly;
    
    // Display Senior/PWD in log
    $numSenior = isset($_POST["num_senior"]) ? intval($_POST["num_senior"]) : 0;
    $SplogMessage = "\n\nTotal Number of Senior Citizen and PWD: " . $numSenior;

    for ($i = 1; $i <= $numSenior; $i++) {
        $SP_gender = isset($_POST["SP_gender_" . $i]) ? $_POST["SP_gender_" . $i] : "";
        $SP_birthDate = isset($_POST["birthDate_" . $i]) ? $_POST["birthDate_" . $i] : "";
        $seniorBox = isset($_POST["seniorBox_" . $i]) && $_POST["seniorBox_" . $i] === 'checked' ? 1 : 0;
        $pwdBox = isset($_POST["pwdBox_" . $i]);
        $SP_lastName = isset($_POST["SP_lastName_" . $i]) ? $_POST["SP_lastName_" . $i] : "";
        $SP_givenName = isset($_POST["SP_givenName_" . $i]) ? $_POST["SP_givenName_" . $i] : "";
        $SP_middleName = isset($_POST["SP_middleName_" . $i]) ? $_POST["SP_middleName_" . $i] : "";
        $SP_maidenName = isset($_POST["SP_maidenName_" . $i]) ? $_POST["SP_maidenName_" . $i] : "";
        $SP_extension = isset($_POST["SP_extension_" . $i]) ? $_POST["SP_extension_" . $i] : "";

        $sql = "INSERT INTO `tbl_seniorpwd` 
                        (`user_id`,`head_id`,`firstname`,`middlename`,`lastname`,
                        `extension`,`maidenname`,`gender`,`birthdate`,
                        `senior`,`pwd`) 
                VALUES 
                        ('$user_id','$head_id','$SP_givenName','$SP_middleName','$SP_lastName',
                        '$SP_extension','$SP_maidenName','$SP_gender','$SP_birthDate',
                        '$seniorBox','$pwdBox')";

        if ($con->query($sql) === TRUE) {
            echo "Senior PWD Success";
        } else {
            echo "Error updating in Spouse Head: " . $con->error;
        } 

    }
    
    // Display Facilities field in log
    $electricity = isset($_POST["electricity"]) ? $_POST["electricity"] : "";
    $water_serv = isset($_POST["water_serv"]) ? $_POST["water_serv"] : "";
    $toilet = isset($_POST["toilet"]) ? $_POST["toilet"] : "";
    $kitchen = isset($_POST["kitchen"]) ? $_POST["kitchen"] : "";

    $sql = "INSERT INTO `tbl_facility` 
                    (`user_id`,`head_id`,`electricity`,`water`,`toilet`,`kitchen`) 
            VALUES 
                    ('$user_id','$head_id','$electricity','$water_serv','$toilet','$kitchen')";

    if ($con->query($sql) === TRUE) {
    echo "Facility Success";
    } else {
    echo "Error updating in Spouse Head: " . $con->error;
    } 


    // Display Respondent and Interview field 
    $respondent_relation = isset($_POST["respondent_relation"]) ? $_POST["respondent_relation"] : "";
    $respondent_lastname = isset($_POST["respondent_lastName"]) ? $_POST["respondent_lastName"] : "";
    $respondent_givenName = isset($_POST["respondent_givenName"]) ? $_POST["respondent_givenName"] : "";
    $respondent_middleName = isset($_POST["respondent_middleName"]) ? $_POST["respondent_middleName"] : "";
    $interviewer_lastName = isset($_POST["interviewer_lastName"]) ? $_POST["interviewer_lastName"] : "";
    $interviewer_givenName = isset($_POST["interviewer_givenName"]) ? $_POST["interviewer_givenName"] : "";
    $interviewer_middleName = isset($_POST["interviewer_middleName"]) ? $_POST["interviewer_middleName"] : "";
    $int_date = isset($_POST["int_date"]) ? $_POST["int_date"] : "";
    $remark = isset($_POST["remark"]) ? $_POST["remark"] : "";

    $sql = "INSERT INTO `tbl_interinfo` 
                    (`user_id`,`head_id`,`res_Fname`,`res_Mname`,`res_Lname`,
                    `relationship`,`int_Fname`,`int_Mname`,`int_Lname`,
                    `date`,`remarks`) 
            VALUES 
                    ('$user_id','$head_id','$respondent_givenName','$respondent_middleName','$respondent_lastname',
                    '$respondent_relation','$interviewer_givenName','$interviewer_middleName','$interviewer_lastName',
                    '$int_date','$remark')";

    if ($con->query($sql) === TRUE) {
    echo "Facility Success";
    } else {
    echo "Error updating in Spouse Head: " . $con->error;
    } 
    
    // Display another data for head info
    $type_structure = isset($_POST["type_structure"]) ? $_POST["type_structure"] : "";
    $yearStay = isset($_POST["yearStay"]) ? $_POST["yearStay"] : "";
    $relocationChoice = isset($_POST["relocationChoice"]) ? $_POST["relocationChoice"] : "";
    $relocated = isset($_POST["relocated"]) ? $_POST["relocated"] : "";

    $sql = "UPDATE `tbl_headinfo` 
            SET 
                `structure` = '$type_structure',
                `yearStay` = '$yearStay',
                `relocUnavailable` = '$relocationChoice',
                `relocated` = '$relocated'
            WHERE `id` = $head_id";

    if ($con->query($sql) === TRUE) {
        echo "Another Head info Success";
    } else {
        echo "Error updating in Spouse Head: " . $con->error;
    } 

    //AUDIT TRAIL
    $sql = "INSERT INTO `tbl_audit` (`datecommit`,`user_id`,`actiondone`,`subject`) 
    VALUES ('$serverDateTime','$user_id','ADDED A NEW MEMBER','$head_id')";
    $result = $con->query($sql);

    header("Location: ../admin/verify.php");
    exit();
?>