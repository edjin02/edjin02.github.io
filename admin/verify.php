<?php
require '../include/user_session.php';

include '../include/accessrightfunc.php'; //dashboard access
checkAccessRights($user_id, 'ar_record');
include 'nav-bar.php';


include '../functions/scripts.php';
include 'option.php';
include '../include/serverdate.php'; //$serverdate
include '../functions/verify-function.php'; //query
// include '../functions/verify-select.php'; //table data
?>

<!-- barangay editing on the modal -->
<!-- <script src="../functions/verify-modal-drop.js"></script> -->
<script src="../functions/verify-drop.js"></script>
<script src="../admin/verifunction.js"></script>
<script src="../functions/verify-filter.js"></script>


<title> CUDHO | Encode </title>
<style>

</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 820px;">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-1 text-dark">Search Record <a style="font-size:13px">Verify, Search or/and Add a new
                            Member</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item">Records</li>
                        <li class="breadcrumb-item">Verification</li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <div class="content">
        <div class="col-md-15">
            <div class="card card">
                <div class="card-header" style="background-color:maroon;"></div>
                <div class="card-body">
                    <div class="form-group" style="display:flex; align-items: center; justify-content:center">
                        <div class="col-sm-7">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-search"></span>
                                    </span>
                                </div>
                                <input type="search" id="search" class="form-control" name="search"
                                    placeholder="Search">
                                    <button type="button" class="btn btn-block" data-toggle="modal" data-target="#encode"
                            style="margin-left:10px;height:36px; width:100px; color:white; background-color:maroon">
                            Add
                        </button>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <input type="text" id="barangay-select" class="form-control"
                                    onfocus="showAllSuggestions()" oninput="showSuggestions(this.value)"
                                    onkeydown="handleKeyDown(event)" onblur="changePlaceholder()"
                                    placeholder="Search by Barangay" style="display: none;">
                                <div id="suggestionBox" style='display:none'></div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <input type="text" name="community-selectSearch" id="community-selectSearch"
                                    class="form-control" onfocus="showAllSuggestionsCommunity()"
                                    oninput="showfilterCommunitySuggestions(this.value)"
                                    onkeydown="handlefilterCommunityKeyDown(event)"
                                    onblur="changefilterCommunityPlaceholder()" onkeyup="convertToUppercase(this)"
                                    placeholder="Search by Community Association" style="display: none;">
                                <div id="communitysearchSuggestionBox" style="display:none"></div>
                            </div>
                        </div>
                        


                    </div>
                </div>
                <div class="row">
                    <button type="button" id="householdButton" class="btnVerif btn-primary" style="margin-left: 20px; position: relative;" onclick="showHouseholdTable()">
                        Household
                        <span id="householdLabel" style="position: absolute; top: -5px; right: -10px; background-color: red; color: white; border-radius:50%; width: 25px; height: 25px; display: none;">0</span>
                    </button>
                    <button type="button" id="spouseButton" class="btnVerif btn-primary"  style="margin-left: 10px; position: relative;" onclick="showSpouseTable()">
                        Spouse
                        <span id="spouseLabel" style="position: absolute; top: -5px; right: -10px; background-color: red; color: white; border-radius:50%; width: 25px; height: 25px; display: none;">0</span>
                    </button>
                    <button type="button" id="MinorButton"class="btnVerif btn-primary" style="margin-left: 10px; position: relative;" onclick="showMinorTable()">
                        Minor Children
                        <span id="minorLabel" style="position: absolute; top: -5px; right: -10px; background-color: red; color: white; border-radius:50%; width: 25px; height: 25px; display: none;">0</span>
                    </button>
                    <button type="button" id="WorkingButton" class="btnVerif btn-primary" style="margin-left: 10px; position: relative;" onclick="showWorkingTable()">
                        Working Adult
                        <span id="workLabel" style="position: absolute; top: -5px; right: -10px; background-color: red; color: white; border-radius:50%; width: 25px; height: 25px; display: none;">0</span>
                    </button>
                    <button type="button" id="SeniorButton" class="btnVerif btn-primary" style="margin-left: 10px; position: relative;" onclick="showSeniorTable()">
                        Senior/PWD
                        <span id="seniorLabel" style="position: absolute; top: -5px; right: -10px; background-color: red; color: white; border-radius:50%; width: 25px; height: 25px; display: none;">0</span>
                    </button>
                </div>

                <script>
                     // Set the "Household" button as active by default when the page loads
                    document.addEventListener("DOMContentLoaded", function () {
                        var householdButton = document.getElementById("householdButton");
                        householdButton.classList.add("pressed"); // Add the "active" class to the button
                        showHouseholdTable(); // Show the household table by default
                    });

                    
                    function toggleTextboxes() {
                        var barangayTextbox = $("#barangay-select");
                        var communityTextbox = $("#community-selectSearch");
                        
                        // Toggle the display of the textboxes based on the current state
                        if (barangayTextbox.css("display") === "none") {
                            barangayTextbox.show();
                            communityTextbox.show();
                            document.getElementById("householdTable").style.display = "block";
                        }
                        
                    }

                    function initializeButtons() {
                        const buttons = document.querySelectorAll(".btnVerif");

                        function handleButtonClick(button) {
                            buttons.forEach((btn) => {
                                if (btn !== button) {
                                    btn.classList.remove("pressed");
                                }
                            });
                            button.classList.toggle("pressed");
                        }

                        buttons.forEach((button) => {
                            button.addEventListener("click", () => {
                                handleButtonClick(button);
                            });
                        });
                    }

                    
                    function hideTextboxes() {
                        var barangayTextbox = $("#barangay-select");
                        var communityTextbox = $("#community-selectSearch");
                        
                        // Hide the textboxes
                        barangayTextbox.hide();
                        communityTextbox.hide();
                        document.getElementById("householdTable").style.display = "none"
                    }

                    function showHouseholdTable() {
                        // Show the household table
                        document.getElementById("minorTable").style.display = "none";
                        document.getElementById("spouseTable").style.display = "none";
                        document.getElementById("seniorTable").style.display = "none";
                        document.getElementById("workingTable").style.display = "none";
                        document.getElementById("householdTable").style.display = "block";

                        // Call toggleTextboxes() to toggle visibility of barangay-select and community-selectSearch
                        toggleTextboxes();
                    }
                    

                    function showSpouseTable(){
                        document.getElementById("minorTable").style.display = "none";
                        document.getElementById("householdTable").style.display = "none";
                        document.getElementById("workingTable").style.display = "none";
                        document.getElementById("seniorTable").style.display = "none";
                        document.getElementById("spouseTable").style.display = "block";
                        hideTextboxes();
                    }

                    function showMinorTable(){
                        document.getElementById("minorTable").style.display = "block";
                        document.getElementById("workingTable").style.display = "none";
                        document.getElementById("householdTable").style.display = "none";
                        document.getElementById("seniorTable").style.display = "none";
                        document.getElementById("spouseTable").style.display = "none";
                        hideTextboxes();
                    }

                    function showWorkingTable(){
                        document.getElementById("workingTable").style.display = "block";
                        document.getElementById("minorTable").style.display = "none";
                        document.getElementById("householdTable").style.display = "none";
                        document.getElementById("spouseTable").style.display = "none";
                        document.getElementById("seniorTable").style.display = "none";
                        hideTextboxes();
                    }

                    function showSeniorTable(){
                        document.getElementById("minorTable").style.display = "none";
                        document.getElementById("householdTable").style.display = "none";
                        document.getElementById("workingTable").style.display = "none";
                        document.getElementById("seniorTable").style.display = "block";
                        document.getElementById("spouseTable").style.display = "none";
                        hideTextboxes();
                    }
                    
                    function openMemberview(event) {
                    var row = event.currentTarget;
                    var id = row.getAttribute('value');
                    
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'memberview.php';

                    var hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'id';
                    hiddenInput.value = id;
                    form.appendChild(hiddenInput);

                    document.body.appendChild(form);
                    form.submit();
                    }   

                    initializeButtons();
                </script>

                <div id="householdTable" class="box box-primary" style="padding-top: auto; margin:10px; display: none;">
                    <div class="box-body table-responsive" style="padding: 1px">
                        <table class="table table-hover text-bordered table-condensed table-striped" id="getHouseholdData">
                            <thead class="btn-yellow">
                                <th class="text-center">Tag</th>
                                <th class="text-center">Household Head</th>
                                <th class="text-center">Samahan</th>
                                <th class="text-center">Barangay</th>
                                <th class="text-center">Monthly Income</th>

                            </thead>
                            <tbody id="verifTable">
                                <?php
                                    $sql = "SELECT * FROM tbl_headinfo";
                                    $result = $con->query($sql);
                                
                                        while ($r = $result->fetch_assoc()) {
                                            echo "<tr style='vertical-align: middle;' id='engrlink' onclick='openMemberview(event);' value='" . $r['id'] . "'>";
                                            echo "<td><span>" . $r['tag'] . "</span></td>";
                                            echo "<td><span>" . $r['firstname'] . " " . $r['middlename'] . " " . $r['lastname'] . " " . $r['extension'] . "</span></td>";
                                            echo "<td><span>" . $r['community'] . "</span></td>";
                                            echo "<td><span>" . $r['barangay'] . "</span></td>";
                                            echo "<td><span>" . $r['monthIncome'] . "</span></td>";
                                            
                                            echo "</tr>";
                                        }
                                ?>
                            </tbody>
                        </table>
                        <div id="no-data-message" class="centered-text" style="display: none;"><span>No Data Available for Household Head</span></div>
                    </div>
                </div>
                <div id="spouseTable" class="box box-primary" style="padding-top: auto; margin:10px; display: none;">
                    <div class="box-body table-responsive" style="padding: 1px">
                        <table class="table table-hover text-bordered table-condensed table-striped" id="getSpouseData">
                            <thead class="btn-yellow">
                                <th class="text-center;" style="width: 40%">Name</th>
                                <th class="text-center;" style="width: 20%">Birth Date</th>
                                <th class="text-center;" style="width: 10%">Gender</th>
                                <th class="text-center;" style="width: 20%">Occupation</th>
                                <th class="text-center;" style="width: 10%">Civil Status</th>

                            </thead>
                            <tbody id="spouseTbl">
                                <?php
                                    $sql = "SELECT * FROM tbl_spouseInfo";
                                    $result = $con->query($sql);
                                
                                        while ($r = $result->fetch_assoc()) {
                                            echo "<tr style='vertical-align: middle;' id='engrlink' onclick='openMemberview(event);' value='" . $r['head_id'] . "'>";
                                            echo "<td><span>" . $r['firstname'] . " " . $r['middlename'] . " " . $r['lastname'] . " " . $r['extension'] . " ". $r['maidenname'] . "</span></td>";
                                            echo "<td><span>" . $r['birthdate'] . "</span></td>";
                                            echo "<td><span>" . $r['gender'] . "</span></td>";
                                            echo "<td><span>" . $r['occupation'] . "</span></td>";
                                            echo "<td><span>" . $r['civilStatus'] . "</span></td>";
                                            echo "</tr>";
                                        }
                                ?>
                            </tbody>
                        </table>
                        <div id="no-data-message1" class="centered-text" style="display: none;"><span>No Data Available for Spouse</span></div>
                    </div>
                </div>
                <div id="minorTable" class="box box-primary" style="padding-top: auto; margin:10px; display: none;">
                    <div class="box-body table-responsive" style="padding: 1px">
                        <table class="table table-hover text-bordered table-condensed table-striped" id="getMinorData">
                            <thead class="btn-yellow">
                                <th class="text-center;" style="width: 60%">Name</th>
                                <th class="text-center;" style="width: 20%">Birth Date</th>
                                <th class="text-center;" style="width: 20%">Gender</th>
                            </thead>
                            <tbody id="minorTbl">
                                <?php
                                    $sql = "SELECT * FROM tbl_childminor";
                                    $result = $con->query($sql);
                                
                                        while ($r = $result->fetch_assoc()) {
                                            echo "<tr style='vertical-align: middle;' id='engrlink' onclick='openMemberview(event);' value='" . $r['head_id'] . "'>";
                                            echo "<td><span>" . $r['firstname'] . " " . $r['middlename'] . " " . $r['lastname'] . " " . $r['extension'] . " </span></td>";
                                            echo "<td><span>" . $r['birthdate'] . "</span></td>";
                                            echo "<td><span>" . $r['gender'] . "</span></td>";
                                            echo "</tr>";
                                        }
                                ?>
                            </tbody>
                        </table>
                        <div id="no-data-message2" class="centered-text" style="display: none;"><span>No Data Available for Minor Children</span></div>
                    </div>
                </div>
                <div id="workingTable" class="box box-primary" style="padding-top: auto; margin:10px; display: none;">
                    <div class="box-body table-responsive" style="padding: 1px">
                        <table class="table table-hover text-bordered table-condensed table-striped" id="getWorkData">
                            <thead class="btn-yellow">
                                <th class="text-center;" style="width: 40%">Name</th>
                                <th class="text-center;" style="width: 20%">Birth Date</th>
                                <th class="text-center;" style="width: 10%">Gender</th>
                                <th class="text-center;" style="width: 20%">Occupation</th>
                                <th class="text-center;" style="width: 10%">Civil Status</th>
                            </thead>
                            <tbody id="workTbl">
                                <?php
                                    $sql = "SELECT * FROM tbl_childwork";
                                    $result = $con->query($sql);
                                
                                        while ($r = $result->fetch_assoc()) {
                                            echo "<tr style='vertical-align: middle;' id='engrlink' onclick='openMemberview(event);' value='" . $r['head_id'] . "'>";
                                            echo "<td><span>" . $r['firstname'] . " " . $r['middlename'] . " " . $r['lastname'] . " " . $r['extension'] . " " . $r['maidenname'] . " </span></td>";
                                            echo "<td><span>" . $r['birthdate'] . "</span></td>";
                                            echo "<td><span>" . $r['gender'] . "</span></td>";
                                            echo "<td><span>" . $r['occupation'] . "</span></td>";
                                            echo "<td><span>" . $r['civilStatus'] . "</span></td>";
                                            echo "</tr>";
                                        }
                                ?>
                            </tbody>
                        </table>
                        <div id="no-data-message3" class="centered-text" style="display: none;"><span>No Data Available for Working Adult</span></div>
                    </div>
                </div>
                <div id="seniorTable" class="box box-primary" style="padding-top: auto; margin:10px; display: none;">
                    <div class="box-body table-responsive" style="padding: 1px">
                        <table class="table table-hover text-bordered table-condensed table-striped" id="getSeniorData">
                            <thead class="btn-yellow">
                                <th class="text-center;" style="width: 60%">Name</th>
                                <th class="text-center;" style="width: 20%">Birth Date</th>
                                <th class="text-center;" style="width: 20%">Gender</th>
                            </thead>
                            <tbody id="seniorTbl">
                                <?php
                                    $sql = "SELECT * FROM tbl_seniorpwd";
                                    $result = $con->query($sql);
                                
                                        while ($r = $result->fetch_assoc()) {
                                            echo "<tr style='vertical-align: middle;' id='engrlink' onclick='openMemberview(event);' value='" . $r['head_id'] . "'>";
                                            echo "<td><span>" . $r['firstname'] . " " . $r['middlename'] . " " . $r['lastname'] . " " . $r['extension'] . " " . $r['maidenname'] . " </span></td>";
                                            echo "<td><span>" . $r['birthdate'] . "</span></td>";
                                            echo "<td><span>" . $r['gender'] . "</span></td>";
                                            echo "</tr>";
                                        }
                                ?>
                            </tbody>
                        </table>
                        <div id="no-data-message4" class="centered-text" style="display: none;"><span>No Data Available for Senior/PWD</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="../inc_backend/verifyAdd.php" method="POST">
    <div class="modal" id="encode" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Member</h5>
                </div>
                <!-- convert to php  -->
                <div class="modal-body">
                    <div class="card" style="border: 2px solid maroon;">
                        <div class="card-body">
                            <div class="form-row">

                                <div class="col-md-12">
                                    <label>Address (Tirahan):</label>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="barangay">Barangay (Bario):</label>
                                    <div class="input-group">
                                        <input type="text" name="barangay-select-modal" id="barangay-select-modal"
                                            class="form-control" onfocus="showAllSuggestionsModal()"
                                            oninput="showSuggestionsModal(this.value)" onkeydown="handleKeyModal(event)"
                                            onblur="changePlaceholderModal()" onkeyup="convertToUppercase(this)"
                                            placeholder="Barangay">
                                        <div id="suggestionBoxModal" style='display:none'></div>
                                    </div>
                                    <!-- <div class="input-group">
                    <input type="text" class="input-border form-control" name="barangay" id="barangay"
                    placeholder="Barangay">
                </div> -->
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="comAss">Community Association:</label>
                                    <div class="input-group">
                                        <input type="text" name="community-select" id="community-select"
                                            class="form-control" onfocus="showAllSuggestionsCommunityModal()"
                                            oninput="showSuggestionsCommunityModal(this.value)"
                                            onkeydown="handleCommunityModalKeyDown(event)"
                                            onblur="changeCommunityPlaceholder()" onkeyup="convertToUppercase(this)"
                                            placeholder="Community Association">
                                        <div id="communitySuggestionBox" style="display:none"></div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="basicHouse">Basic Housing Data:</label>
                                    <div class="input-group">
                                        <input type="text" name="basicHouse" id="basicHouse" class="form-control"
                                            onfocus="showAllSuggestionsHouseModal()"
                                            oninput="showSuggestionsHouseModal(this.value)"
                                            onkeydown="handleKeyHouseModal(event)"
                                            onblur="changePlaceholderHouseModal()" onkeyup="convertToUppercase(this)"
                                            placeholder="Basic Housing Data">
                                        <div id="suggestionBoxHouseModal" style='display:none'></div>
                                    </div>

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tag">Tag:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="tag" id="tag"
                                            placeholder="Tag" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card" style="border: 1px solid maroon;">
                                    </div>
                                </div>

                                <!--Head -->

                                <div class="col-md-12">
                                    <label>Household Head:</label>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" value="checked" name="structOwner" id="structOwner" checked>
                                    <label for="structOwner" style="margin-top:6px;">Structure Owner</label>
                                </div>
                           
                                <div class="col-md-4 mb-3">
                                    <div class="input-group">
                                        <select class="input-border form-control" name="tenurStatus" id="tenurStatus" style="display:none" required>
                                            <option value="NEW OWNER">NEW OWNER</option>
                                            <option value="SHARER">SHARER</option>
                                            <option value="RENTER">RENTER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="input-border form-control" name="origOwner" id="origOwner"
                                        placeholder="Name in Original Masterlist" style="display:none" onkeyup="convertToUppercase(this)">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="head_gender">Gender:</label>
                                    <div class="input-group">
                                        <select class="input-border form-control" name="head_gender" id="head_gender">
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="head_birthDate">Birthdate:</label>
                                    <div class="input-group">
                                        <input type="date" class="input-border form-control" name="head_birthDate"
                                            id="head_birthDate" placeholder="Birthdate">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="head_civilStatus">Civil Status:</label>
                                    <div class="input-group">
                                        <select class="input-border form-control" name="head_civilStatus" id="head_civilStatus" required>
                                            <option value="SINGLE">SINGLE</option>
                                            <option value="MARRIED">MARRIED</option>
                                            <option value="DIVORCED">DIVORCED</option>
                                            <option value="WIDOWED">WIDOWED</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="head_lastName">LastName:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="head_lastName"
                                            id="head_lastname" placeholder="Last Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="head_givenName">Given Name:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="head_givenName"
                                            id="head_givenName" placeholder="Given Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="head_middleName">Middle Name:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="head_middleName"
                                            id="head_middleName" placeholder="Middle Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3" id="headMaidenNameCont">
                                    <label for="head_maidenName">Maiden Name:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="head_maidenName"
                                            id="head_maidenName" placeholder="Maiden Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3" id="headextensionCont">
                                    <label for="head_extension">Extension:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="head_extension"
                                            id="head_extension" placeholder="Extension" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="head_occupation">Occupation:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="head_occupation"
                                            id="head_occupation" placeholder="Occupation" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="head_monthSalary">Monthly Salary:</label>
                                    <div class="input-group">
                                        <input type="number" class="input-border form-control" name="head_monthSalary"
                                            id="head_monthSalary" placeholder="Monthly Salary"
                                            oninput="updateTotalMonthly()">
                                    </div>
                                </div>

                                <div class="col-md-11" style="margin-left:20px;">
                                    <label>Membership in (Kasapi ng):</label>
                                </div>

                                <div class="col-md-1 mb-3">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" value="checked" name="head_pag-ibigBox"
                                        id="head_pag-ibigBox">
                                    <label for="head_pag-ibigBox" style="margin-top:6px;">Pag-IBIG/HDMF</label>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" value="checked" name="head_sssBox" id="head_sssBox">
                                    <label for="head_sssBox" style="margin-top:6px;">SSS/GSIS</label>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <div class="checkbox-container">
                                        <input type="checkbox" value="checked" name="head_othersBox"
                                            id="head_othersBox">
                                        <label for="head_othersBox">Others</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="other-textbox-container">
                                        <input type="text" class="input-border form-control" name="head_other"
                                            id="head_other" placeholder="Other" style="display: none;" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="card" style="border: 1px solid maroon;">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Spouse (Asawa):</label>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="spouse_gender">Gender:</label>
                                    <div class="input-group">
                                        <select class="input-border form-control" name="spouse_gender"
                                            id="spouse_gender">
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="spouse_birthDate">Birthdate:</label>
                                    <div class="input-group">
                                        <input type="date" class="input-border form-control" name="spouse_birthDate"
                                            id="spouse_birthDate" placeholder="Birthdate">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="spouse_civilStatus">Civil Status:</label>
                                    <div class="input-group">
                                        <select class="input-border form-control" name="spouse_civilStatus" id="spouse_civilStatus" required>
                                            <option value="SINGLE">SINGLE</option>
                                            <option value="MARRIED">MARRIED</option>
                                            <option value="DIVORCED">DIVORCED</option>
                                            <option value="WIDOWED">WIDOWED</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="spouse_lastName">LastName:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="spouse_lastName"
                                            id="spouse_lastname" placeholder="Last Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="spouse_givenName">Given Name:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="spouse_givenName"
                                            id="spouse_givenName" placeholder="Given Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="spouse_middleName">Middle Name:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="spouse_middleName"
                                            id="spouse_middleName" placeholder="Middle Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3" id="spouseMaidenNameCont">
                                    <label for="spouse_maidenName">Maiden Name:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="spouse_maidenName"
                                            id="spouse_maidenName" placeholder="Maiden Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3" id="spouseextensionCont">
                                    <label for="spouse_extension">Extension:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="spouse_extension"
                                            id="spouse_extension" placeholder="Extension" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="spouse_occupation">Occupation:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="spouse_occupation"
                                            id="spouse_occupation" placeholder="Occupation" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="spouse_monthSalary">Monthly Salary:</label>
                                    <div class="input-group">
                                        <input type="number" class="input-border form-control" name="spouse_monthSalary"
                                            id="spouse_monthSalary" placeholder="Monthly Salary"
                                            oninput="updateTotalMonthly()">
                                    </div>
                                </div>

                                <div class="col-md-11" style="margin-left:20px;">
                                    <label>Membership in (Kasapi ng):</label>
                                </div>

                                <div class="col-md-1 mb-3">
                                </div>

                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" value="checked" name="spouse_pag-ibigBox"
                                        id="spouse_pag-ibigBox">
                                    <label for="spouse_pag-ibigBox" style="margin-top:6px;">Pag-IBIG/HDMF</label>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" value="checked" name="spouse_sssBox" id="spouse_sssBox">
                                    <label for="spouse_sssBox" style="margin-top:6px;">SSS/GSIS</label>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <input type="checkbox" value="checked" name="spouse_othersBox"
                                        id="spouse_othersBox">
                                    <label for="spouse_othersBox" style="margin-top:6px;">Others</label>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="other-textbox-container">
                                        <input type="text" class="input-border form-control" name="spouse_other"
                                            id="spouse_other" placeholder="Other" style="display: none;" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card" style="border: 1px solid maroon;">
                                    </div>
                                </div>

                                <div class="col-md-12 mb">
                                    <div class="row">
                                        <label class="col-md-4" for="total_children_label">Total Number of
                                            Children:</label>
                                        <div class="col-md-1 input-group">
                                            <!-- Adjust the "col-md-2" to your desired width -->
                                            <input type="number" class="input-border form-control"
                                                style="height: 25px; margin-left: -160px; margin-right: 185px"
                                                name="total_children_label" id="total_children_label" value="0"
                                                disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card" style="border: 1px solid maroon;">
                                    </div>
                                </div>

                                <div class="col-md-12 mb">
                                    <div class="row">
                                        <label class="col-md-6" for="num_children">Number of Minor Children Living with
                                            Parents:</label>
                                        <div class="col-md-1 input-group">
                                            <!-- Adjust the "col-md-2" to your desired width -->
                                            <input type="number" class="input-border form-control"
                                                style="height: 25px; margin-left: -180px; margin-right: 200px"
                                                name="num_children" id="num_children" value="0" placeholder="No."
                                                min="0" max="50" oninput="generateChildFields()">
                                        </div>
                                    </div>
                                </div>

                                <!-- Minor Children field COdes
                <div class="container">
                <div class="col-md-2 mb-3">
                <label for="Mchild_gender">Gender:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Mchild_gender" id="Mchild_gender"
                    placeholder="Gender">
                </div>
                </div>
                <div class="col-md-2 mb-3">
                <label for="Mchild_lastName">Last Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Mchild_lastName" id="Mchild_lastName"
                    placeholder="Last Name">
                </div>
                </div>
                <div class="col-md-2 mb-3">
                <label for="Mchild_givenName">Given Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Mchild_givenName" id="Mchild_givenName"
                    placeholder="Given Name">
                </div>
                </div>
                <div class="col-md-2 mb-3">
                <label for="Mchild_middleName">Middle Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Mchild_middleName" id="Mchild_middleName"
                    placeholder="Middle Name">
                </div>
                </div>
                <div class="col-md-2 mb-3">
                <label for="Mchild_maidenName">Maiden Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Mchild_maidenName" id="Mchild_maidenName"
                    placeholder="Maiden Name">
                </div>
                </div>
                <div class="col-md-2 mb-3">
                <label for="Mchild_birthDate">Birthdate:</label>
                <div class="input-group">
                    <input type="date" class="input-border form-control" name="Mchild_birthDate" id="Mchild_birthDate"
                    placeholder="Birthdate">
                </div>
                </div></div>
                 -->

                                <div id="child_fields_container"></div>

                                <div class="col-md-12">
                                    <div class="card" style="border: 1px solid maroon;">
                                    </div>
                                </div>

                                <div class="col-md-12 mb">
                                    <div class="row">
                                        <label class="col-md-6" for="num_workChildren">Number of Children Working and
                                            Living with Parents:</label>
                                        <div class="col-md-1 input-group">
                                            <!-- Adjust the "col-md-2" to your desired width -->
                                            <input type="number" class="input-border form-control"
                                                style="height: 25px; margin-left: -130px; margin-right: 150px"
                                                name="num_workChildren" id="num_workChildren" value="0"
                                                placeholder="No." min="0" max="50" oninput="generateWorkChildFields()">
                                        </div>
                                    </div>
                                </div>

                                <!-- working child field codes
                <div class="container">
                <div class="col-md-4 mb-3">
                <label for="Wchild_gender">Gender:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_gender" id="Wchild_gender"
                    placeholder="Bakla">
                </div>
                </div>
                <div class="col-md-4 mb-3">
                <label for="Wchild_birthDate">Birthdate:</label>
                <div class="input-group">
                    <input type="date" class="input-border form-control" name="Wchild_birthDate" id="Wchild_birthDate"
                     placeholder="Birthdate">
                </div>
                </div>
                <div class="col-md-4 mb-3">
                <label for="Wchild_civilStatus">Civil Status:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_civilStatus" id="Wchild_civilStatus"
                    placeholder="Civil Status">
                </div>
                </div>

                <div class="col-md-3 mb-3">
                <label for="Wchild_lastName">LastName:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_lastName" id="Wchild_lastname"
                    placeholder="Last Name">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="Wchild_givenName">Given Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_givenName" id="Wchild_givenName"
                     placeholder="Given Name">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="Wchild_middleName">Middle Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_middleName" id="Wchild_middleName"
                    placeholder="Middle Name">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="Wchild_maidenName">Maiden Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_maidenName" id="Wchild_maidenName"
                    placeholder="Maiden Name">
                </div>
                </div>

                <div class="col-md-6 mb-3">
                <label for="Wchild_occupation">Occupation:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_occupation" id="Wchild_occupation"
                    placeholder="Occupation">
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="Wchild_monthSalary">Monthly Salary:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_monthSalary" id="Wchild_monthSalary"
                    placeholder="Monthly Salary">
                </div>
                </div>
                
                <div class="col-md-11" style="margin-left:20px;">
                    <label>Membership in (Kasapi ng):</label>
                </div>
                
                <div class="col-md-1 mb-3">
                </div>

                <div class="col-md-2 mb-3">
                    <input type="checkbox" value="checked" name="Wchild_pag-ibigBox" id="Wchild_pag-ibigBox">
                    <label for="Wchild_pag-ibigBox" style="margin-top:6px;">Pag-IBIG/HDMF</label>
                </div>

                <div class="col-md-2 mb-3">
                    <input type="checkbox" value="checked" name="Wchild_sssBox" id="Wchild_sssBox">
                    <label for="Wchild_sssBox" style="margin-top:6px;">SSS/GSIS</label>
                </div>
            
                <div class="col-md-4 mb-2">
                    <div class="Wother-textbox-container">
                        <input type="text" class="input-border form-control" name="Wchild_other" id="Wchild_other" placeholder="Other">
                    </div>
                </div>
                </div> -->

                                <!-- container where the script execute -->
                                <div id="work_child_fields_container"></div>


                                <div class="col-md-12">
                                    <div class="card" style="border: 1px solid maroon;">
                                    </div>
                                </div>

                                <!-- Senior Citizen -->
                                <div class="col-md-12 mb">
                                    <div class="row">
                                        <label class="col-md-6" for="num_senior">Total Number of Senior Citizen and
                                            PWD:</label>
                                        <div class="col-md-1 input-group">
                                            <input type="number" class="input-border form-control"
                                                style="height: 25px; margin-left: -220px; margin-right: 240px"
                                                name="num_senior" id="num_senior" value="0" placeholder="No." min="0"
                                                max="50" oninput="generateSeniorFields()">
                                        </div>
                                    </div>
                                </div>

                                <div id="senior_fields_container">
                                    <!-- The dynamically generated fields will be placed here -->
                                </div>

                                <!-- Senior/PWD Field Codes
                <div class="container">
                <div class="col-md-3 mb-3">
                <label for="gender">Gender:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="gender" id="gender"
                    placeholder="Gender">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="birthDate">Birthdate:</label>
                <div class="input-group">
                    <input type="date" class="input-border form-control" name="birthDate" id="birthDate"
                     placeholder="BirthDate">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="checkbox" value="checked" name="seniorBox" id="seniorBox">
                    <label for="seniorBox" style="margin-top:6px;">Senior Citizen</label>                              
                </div>
                <div class="col-md-3 mb-3">
                    <input type="checkbox" value="checked" name="pwdBox" id="pwdBox">
                    <label for="pwdBox" style="margin-top:6px;">PWD</label>                              
                </div>

                <div class="col-md-3 mb-3">
                <label for="SP_lastName">LastName:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="SP_lastName" id="SP_lastname"
                    placeholder="Last Name">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="SP_givenName">Given Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="SP_givenName" id="SP_givenName"
                     placeholder="Given Name">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="SP_middleName">Middle Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="SP_middleName" id="SP_middleName"
                    placeholder="Middle Name">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="SP_maidenName">Maiden Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="SP_maidenName" id="SP_maidenName"
                    placeholder="Maiden Name">
                </div>
                </div></div>
                 -->

                                <div class="col-md-12">
                                    <div class="card" style="border: 1px solid maroon;">
                                    </div>
                                </div>

                                <div class="col-md-12 mb">
                                    <div class="row">
                                        <label class="col-md-4" for="totalMonthly">Total Monthly Income:</label>
                                        <div class="col-md-2 input-group">
                                            <input type="number" class="input-border form-control"
                                                style="height: 25px; margin-left: -180px; margin-right: 100px"
                                                name="totalMonthly" id="totalMonthly" value="0" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card" style="border: 1px solid maroon;">
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <label class="col-md-2" for="yearStay">Year of Stay:</label>
                                        <div class="col-md-2 input-group">
                                        <input type="date" class="input-border form-control" style="height: 25px; margin-left: -70px; margin-right: 90px"
                                            name="yearStay" id="yearStay" placeholder="Year of Stay">
                                        </div>
                                        <div class="col-md-4"></div> <!-- Empty column to create space -->
                                        <label class="col-md-2" for="yearLength">Length of Stay:</label>
                                        <div class="col-md-2 input-group">
                                        <input type="number" class="input-border form-control" style="height: 25px; margin-left: -50px; margin-right: 50px"
                                            value="0" name="yearLength" id="yearLength" placeholder="Length of Stay" readonly>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="card" style="border: 1px solid maroon;">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Facilities:</label>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="electricity">Electricity:</label>
                                    <div class="input-group">
                                        <select class="input-border form-control" name="electricity" id="electricity" required>
                                            <option value="OWN">OWN</option>
                                            <option value="SUB-METER">SUB-METER</option>
                                            <option value="NONE">NONE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="water_serv">Water Services:</label>
                                    <div class="input-group">
                                        <select class="input-border form-control" name="water_serv" id="water_serv" required>
                                            <option value="LAGUNA WATERS">LAGUNA WATERS</option>
                                            <option value="DEEPWELL">DEEPWELL</option>
                                            <option value="NONE">NONE</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="toilet">Toilet:</label>
                                    <div class="input-group">
                                        <select class="input-border form-control" name="toilet" id="toilet" required>
                                            <option value="OWN">OWN</option>
                                            <option value="SHARED">SHARED</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="kitchen">Kitchen:</label>
                                    <div class="input-group">
                                        <select class="input-border form-control" name="kitchen" id="kitchen" required>
                                            <option value="OWN">OWN</option>
                                            <option value="SHARED">SHARED</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card" style="border: 1px solid maroon;">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>In case Relocation is unavailable, what will you choose?:</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input type="radio" value="FINANCIAL ASSISTANCE" name="relocationChoice"
                                        id="financialAssistance">
                                    <label for="financialAssistance" style="margin-top: 6px;">Financial
                                        Assistance</label>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <input type="radio" value="BALIK PROBISNYA PROGRAM" name="relocationChoice"
                                        id="balikProbinsya">
                                    <label for="balikProbinsya" style="margin-top: 6px;">Balik Probinsya Program</label>
                                </div>

                                <div class="col-md-2 mb-3">
                                    <input type="radio" value="UNDECIDED" name="relocationChoice" id="undecided">
                                    <label for="undecided" style="margin-top: 6px;">Undecided</label>
                                </div>


                                <div class="col-md-12">
                                    <div class="card" style="border: 1px solid maroon;">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Respondent (Tumugon):</label>
                                </div>
                                
                                <div class="col-md-4 mb-3">
                                    <label for="respondent_lastName">LastName:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="respondent_lastName"
                                            id="respondent_lastname" placeholder="Last Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="respondent_givenName">Given Name:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="respondent_givenName"
                                            id="respondent_givenName" placeholder="Given Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="respondent_middleName">Middle Name:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control"
                                            name="respondent_middleName" id="respondent_middleName"
                                            placeholder="Middle Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="respondent_relation">Relationsip to Household Head:</label>
                                    <div class="input-group">
                                        <select class="input-border form-control" name="respondent_relation" id="respondent_relation" required>
                                            <option value="PERSON LISTED IN MASTERLIST">PERSON LISTED IN MASTERLIST</option>
                                            <option value="SPOUSE">SPOUSE</option>
                                            <option value="CHILD">CHILD</option>
                                            <option value="SIBLING">SIBLING</option>
                                            <option value="OTHERS">OTHERS</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card" style="border: 1px solid maroon;">
                                    </div>
                                </div>

                                <div class="col-md-12 mb">
                                    <label>Interviewer (Nakipagpanayam):</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="interviewer_lastName">Last Name:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="interviewer_lastName"
                                            id="interviewer_lastName" placeholder="Last Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="interviewer_givenName">Given Name:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control"
                                            name="interviewer_givenName" id="interviewer_givenName"
                                            placeholder="Given Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="interviewer_middleName">Middle Name:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control"
                                            name="interviewer_middleName" id="interviewer_middleName"
                                            placeholder="Middle Name" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                <label for="int_date">Date:</label>
                                <div class="input-group">
                                    <input type="date" class="input-border form-control" name="int_date" id="int_date">
                                </div>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="remark">Remark:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="remark" id="remark"
                                            placeholder="Remark" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card" style="border: 1px solid maroon;">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="type_structure">Type of Structure:</label>
                                    <div class="input-group">
                                        <select class="input-border form-control" name="type_structure" id="type_structure">
                                            <option value="CONCRETE">CONCRETE</option>
                                            <option value="SEMI-CONCRETE">SEMI-CONCRETE</option>
                                            <option value="LIGHT MATERIALS">LIGHT MATERIALS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="relocated">Relocated:</label>
                                    <div class="input-group">
                                        <input type="text" class="input-border form-control" name="relocated" id="relocated"
                                        placeholder="Relocated" onkeyup="convertToUppercase(this)">
                                    </div>
                                </div>
                     
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning mr-auto btn-sm" tyle="margin-left:10px;"
                        data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm" style="margin-right:10px;"
                    data-dismiss="modal" data-toggle="modal" data-target="#confirmationModal">Save</button>
                </div>

            </div>
        </div>
    </div>

      <!-- Confirmation Modal -->
        <div class="modal" id="confirmationModal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure you want to save these data?</h5>
            </div>
            <div class="modal-body d-flex justify-content-end">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" data-toggle="modal" data-target="#encode">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>

</form>





<!-- for gender change -->
<script>
    $(document).ready(function () {
        function handleGenderChange(gender, maidenNameCont, extensionCont) {
            if (gender === "FEMALE") {
                $(maidenNameCont).show();
                $(extensionCont).hide();
            } else if (gender === "MALE") {
                $(maidenNameCont).hide();
                $(extensionCont).show();
            } else {
                $(maidenNameCont).hide();
                $(extensionCont).hide();
            }
        }

        $("#head_gender").change(function () {
            var selectedGender = $(this).val();
            handleGenderChange(selectedGender, "#headMaidenNameCont", "#headextensionCont");
        });

        $("#spouse_gender").change(function () {
            var selectedGender = $(this).val();
            handleGenderChange(selectedGender, "#spouseMaidenNameCont", "#spouseextensionCont");
        });

        $("#head_gender").trigger("change"); // immediately change whether maiden or extension box
        $("#spouse_gender").trigger("change"); // immediately change whether maiden or extension box
    });
</script>

<!-- modal dropdown blur -->
<script>
    // Structure owner checkbox 
    var checkbox = document.getElementById("structOwner");
    var tenurStatusInput = document.getElementById("tenurStatus");
    var origOwnerInput = document.getElementById("origOwner");

    checkbox.addEventListener("change", function () {
        if (this.checked) {
            tenurStatusInput.style.display = "none";
            origOwnerInput.style.display = "none";
        } else {
            tenurStatusInput.style.display = "block";
            origOwnerInput.style.display = "block";
        }
    });

    // head Other checkbox
    var othercb = document.getElementById("head_othersBox");
    var othertb = document.getElementById("head_other");

    // spouse other checkbox
    var spouseothercb = document.getElementById("spouse_othersBox");
    var spouseothertb = document.getElementById("spouse_other");

    othercb.addEventListener("change", function () {
        if (this.checked) {
            othertb.style.display = "block";
        } else {
            othertb.style.display = "none";
        }
    })

    spouseothercb.addEventListener("change", function () {
        if (this.checked) {
            spouseothertb.style.display = "block";
        } else {
            spouseothertb.style.display = "none";
        }
    })
</script>

<script>
  // Retrieve the input elements
  const yearStayInput = document.getElementById('yearStay');
  const yearLengthInput = document.getElementById('yearLength');

  // Define the server date as a JavaScript Date object
  const serverDate = new Date('<?php echo $serverdate; ?>'); // Replace with your server date value

  // Add an event listener to the yearStay input
  yearStayInput.addEventListener('change', function () {
    // Retrieve the selected year from the yearStay input
    const selectedYear = new Date(this.value).getFullYear();

    // Calculate the difference in years between the selected year and the server date
    const yearDifference = serverDate.getFullYear() - selectedYear;

    // Update the value of the yearLength input
    yearLengthInput.value = yearDifference;
  });
</script>

<?php include('footer.php'); ?>