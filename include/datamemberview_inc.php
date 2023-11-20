<?php

//for household head data
include '../include/connect1.php'; //$con
include '../include/serverdate.php'; //$serverdate

$query = "SELECT * FROM tbl_headinfo WHERE id = $head_id";
$result = $con->query($query);

$row = $result->fetch_assoc();
$head_firstname = $row["firstname"];
$head_middlename = $row["middlename"];
$head_lastname = $row["lastname"];
$head_maidenname = $row["maidenname"];
$head_extension = $row["extension"];
$head_barangay = $row["barangay"];
$head_community = $row["community"];
$head_tag = $row["tag"];
$head_birthdate = $row["birthdate"];
$head_birthdatename = date("Y-F-d", strtotime($row["birthdate"]));
$head_age = date_diff(date_create($row["birthdate"]), date_create($serverdate))->y;
$head_gender = $row["gender"];
$head_civilStatus = $row["civilStatus"];
$head_occupation = $row["occupation"];
$head_monthIncome = $row["monthIncome"];
$head_structure = $row["structure"];
$head_yearStay = $row["yearStay"];
$head_yearStayname = date("Y-F-d", strtotime($row["yearStay"]));
$head_lengthStay = date_diff(date_create($row["yearStay"]), date_create($serverdate))->y;
$head_relocUnavailable = $row["relocUnavailable"];
$head_relocated = $row["relocated"];

$head_pagIbigName = ($row["pagIbig"] == 1) ? 'Pag-IBIG/HDMF' : '';
$head_sssName = ($row["sss"] == 1) ? 'SSS/GSIS' : '';
$head_otherName = $row["other"];
$head_pagIbig = ($row["pagIbig"] == 1) ? true : false;
$head_sss = ($row["sss"] == 1) ? true : false; 
$head_otherCheck = ($row["other"] == '') ? false : true; 

$head_tenurStatus = $row["tenurStatus"];
$head_origOwner = $row["origOwner"];
$head_tenurCheck = ($row["tenurStatus"] == 'OWNER') ? true : false;


// spouse data
$query = "SELECT * FROM tbl_spouseinfo WHERE head_id = $head_id";
$result = $con->query($query);

$row = $result->fetch_assoc();
$spouse_id = $row["id"];
$spouse_firstname = $row["firstname"];
$spouse_middlename = $row["middlename"];
$spouse_lastname = $row["lastname"];
$spouse_maidenname = $row["maidenname"];
$spouse_extension = $row["extension"];
$spouse_birthdate = $row["birthdate"];
$spouse_birthname = !empty($row["birthdate"]) ? date("Y-F-d", strtotime($row["birthdate"])) : '';
$spouse_age = date_diff(date_create($row["birthdate"]), date_create($serverdate))->y;
$spouse_gender = $row["gender"];
$spouse_civilStatus = $row["civilStatus"];
$spouse_occupation = $row["occupation"];
$spouse_monthIncome = $row["monthIncome"];

$spouse_pagIbigName = ($row["pagIbig"] == 1) ? 'Pag-IBIG/HDMF' : '';
$spouse_sssName = ($row["sss"] == 1) ? 'SSS/GSIS' : '';
$spouse_otherName = $row["other"];

$spouse_pagIbig = ($row["pagIbig"] == 1) ? true : false;
$spouse_sss = ($row["sss"] == 1) ? true : false; 
$spouse_otherCheck = ($row["other"] == '') ? false : true; 

// FACILITY data
$query = "SELECT * FROM tbl_facility WHERE head_id = $head_id";
$result = $con->query($query);

$row = $result->fetch_assoc();
$facility_id = $row["id"];
$electricity = $row["electricity"];
$water = $row["water"];
$toilet = $row["toilet"];
$kitchen = $row["kitchen"];

// interview data
$query = "SELECT * FROM tbl_interinfo WHERE head_id = $head_id";
$result = $con->query($query);

$row = $result->fetch_assoc();
$respondent_id = $row["id"];
$respondent_firstname = $row["res_Fname"];
$respondent_middlename = $row["res_Mname"];
$respondent_lastname = $row["res_Lname"];
$respondent_relationship = $row["relationship"];

$interviewer_firstname = $row["int_Fname"];
$interviewer_middlename = $row["int_Mname"];
$interviewer_lastname = $row["int_Lname"];
$interviewer_date = $row["date"];
$interviewer_remarks = $row["remarks"];


// minor children count
$query = "SELECT * FROM tbl_childminor WHERE head_id = $head_id";
$result = $con->query($query);
$minor_count = $result->num_rows;

// working children count
$query = "SELECT * FROM tbl_childwork WHERE head_id = $head_id";
$result = $con->query($query);
$work_count = $result->num_rows;

// working children total monthincome
$childwork_Income = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $income = $row["monthIncome"];
    $childwork_Income[] = $income;
  }
}
$workchildren_total_income = array_sum($childwork_Income);

//total monthly income
$total_monthIncome = $head_monthIncome + $spouse_monthIncome + $workchildren_total_income;
$formatted_total_monthIncome = number_format($total_monthIncome);

?>
